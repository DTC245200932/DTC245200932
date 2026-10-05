# Đồ án: Website Quảng bá Sản phẩm (WordPress) - (Đề 3)

* **Họ tên:** Nguyễn Ngọc Anh
* **MSSV:** DTC245200932
* **Lớp:** CNTT K23D

## Giới thiệu Đề tài
Hệ thống triển khai bằng Docker Compose gồm WordPress, MySQL, Nginx, Prometheus, Grafana, Loki và Promtail.

## Công nghệ sử dụng
* **WordPress & PHP:** Mã nguồn ứng dụng web chính.
* **MySQL 8:** Cơ sở dữ liệu lưu trữ dữ liệu website.
* **Nginx:** Reverse proxy và cấu hình bảo mật.
* **Prometheus & Grafana:** Giám sát hiệu năng hệ thống.
* **Loki & Promtail:** Thu thập và quản lý log tập trung.
* **Docker & Docker Compose:** Đóng gói và quản lý container.

## Cấu trúc Hệ thống
Hệ thống gồm các thành phần chính:
* wordpress: Chứa mã nguồn ứng dụng WordPress.
* db: Dữ liệu cơ sở dữ liệu MySQL.
* nginx: Cổng giao tiếp và điều hướng mạng.
* monitoring: Prometheus và Grafana.
* logging: Loki và Promtail.

## Cách Chạy Ứng dụng
1. Sao chép file cấu hình môi trường bằng lệnh: cp .env.example .env (sau đó chỉnh sửa lại mật khẩu trong file .env nếu cần).
2. Khởi động toàn bộ các container bằng lệnh: docker compose up -d --build
3. Truy cập trang web trên trình duyệt:
- Website WordPress: http://localhost
- Grafana (Giám sát): http://localhost:3000
