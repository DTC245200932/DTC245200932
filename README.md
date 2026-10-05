# Cấu trúc hệ thống (Đề 3: Website Quảng bá Sản phẩm - WordPress)

Hệ thống gồm các thành phần:
* WordPress (Website giới thiệu sản phẩm)
* MySQL Database
* phpMyAdmin
* Nginx
* Prometheus
* Grafana
* Loki
* Promtail

## Cách chạy

1. Sao chép file cấu hình: `cp .env.example .env` (sau đó sửa mật khẩu tùy ý).
2. Chạy: `docker compose up -d --build`
3. Truy cập:
   * Giao diện WordPress: `http://192.168.119.128:80`
   * phpMyAdmin: `http://192.168.119.128:8081`

---

## Nginx

* Reverse proxy tới app WordPress, HTTPS chứng chỉ tự ký (TLS 1.2/1.3)
* Security headers: HSTS, X-Frame-Options, X-Content-Type-Options, CSP, Referrer-Policy, Permissions-Policy
* Ẩn phiên bản Nginx (`server_tokens off`), đóng cổng truy cập trực tiếp của app WordPress.

---

## Giám sát (Prometheus + Grafana)

* Prometheus thu số liệu từ: cAdvisor (container), nginx-prometheus-exporter (web server), mysqld-exporter (database).
* Grafana: `http://192.168.119.128:3000` (tài khoản: `admin`, mật khẩu là `GRAFANA_ADMIN_PASSWORD` trong `.env`).
* Prometheus: `http://192.168.119.128:9090`
* Phần giám sát nằm trong file `docker-compose.monitoring.yml`, được ghép từ dòng biến `COMPOSE_FILE` trong `.env`.
* Mạng: Prometheus, Grafana, cAdvisor ở mạng `default`; hai exporter nối thêm vào `backend-network` để đo đạc dữ liệu từ Nginx, WordPress và MySQL, nên Prometheus/Grafana không truy cập trực tiếp độc lập ngoài mạng nội bộ.
* Giới hạn bộ nhớ từng container, lưu dữ liệu Prometheus tối đa 3 ngày.

---

## Log tập trung (Loki + Promtail)

* Promtail đọc log các container (qua `docker.sock`), đẩy sang Loki; Grafana xem log qua data source Loki.
* Phần log nằm trong file `docker-compose.logging.yml`, được ghép nhỏ bởi biến `COMPOSE_FILE` trong `.env`.
* Loki không mở cổng ra ngoài; log giữ 72 giờ.
* Truy vấn LogQL mẫu (Grafana > Explore > chọn Loki):
  * `{container="wp_app"}`: log truy cập ứng dụng WordPress.
  * `{container="wp_app"} |= "45|[0-9][0-9]"`: các request lỗi 4xx/5xx.
  * `sum by (container) (rate({container=~"wp-.*"}[1m]))`: tốc độ sinh log theo dịch vụ.

---

## Hardening

* **Container non-root:** WordPress chạy UID 1000, bỏ toàn bộ capability (`cap_drop: ALL`), hệ thống file chỉ đọc (`read_only`), cấm leo thang đặc quyền (`no-new-privileges`)[cite: 13].
* **Cách ly mạng:** `frontend` (nginx, wordpress, phpmyadmin) và `backend` (wordpress, mysql, phpmyadmin) là mạng `internal`; MySQL không có đường ra Internet, Nginx không nói chuyện trực tiếp tới MySQL[cite: 13].
* **Mật khẩu mạnh:** Sinh ngẫu nhiên bằng `openssl rand`, tối thiểu 20 ký tự, lưu trong `.env` (không đưa lên GitHub), đổi mật khẩu ứng dụng bằng `security/rotate-app-password.sh`[cite: 13].
* **Hạn chế quyền database:** User ứng dụng chỉ `SELECT, INSERT, UPDATE, DELETE` trên database của ứng dụng, khoá root đang nhập từ xa (`security/harden-db.sh`); user exporter chỉ đọc thống kê[cite: 13].
* **Security headers Nginx:** HSTS, X-Frame-Options, X-Content-Type-Options, CSP, Referrer-Policy, Permissions-Policy; ẩn phiên bản Nginx và header `X-Powered-By`[cite: 13].
* **Kiểm tra:** `bash security/audit.sh`[cite: 13]
* Phần hardening nằm trong file `docker-compose.hardening.yml`, ghép nhỏ theo biến `COMPOSE_FILE`[cite: 13].
