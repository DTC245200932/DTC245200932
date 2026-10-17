# Đề 3 — Website quảng bá túi xách Chanel

Website showcase WordPress chạy trên Docker Compose, có form yêu cầu tư vấn lưu vào MySQL và bộ giám sát Prometheus, Grafana, Loki.
## Chạy dự án

Yêu cầu Docker Engine và Docker Compose v2. Từ thư mục dự án:

```bash
bash scripts/gen-env.sh
docker compose config --quiet
docker compose up -d
docker compose ps
```

## Truy cập

| Thành phần | Địa chỉ | Ghi chú |
|---|---|---|
| WordPress / Nginx | `http://192.168.119.128/` | Website chỉ được công bố qua reverse proxy; máy hiện tại dùng `192.168.119.128` |
| phpMyAdmin | `http://192.168.119.128:8081/` | Đăng nhập bằng tài khoản MySQL trong `.env` |
| Prometheus | `http://192.168.119.128:9090/` | Xem trạng thái scrape ở `/targets` |
| Grafana | `http://192.168.119.128:3000/` | Tên đăng nhập `admin`, mật khẩu `GRAFANA_ADMIN_PASSWORD` |
| Dashboard | `http://192.168.119.128:3000/d/chanel-showcase-system/chanel-showcase-system` | Dashboard dựng sẵn về web, container, DB và log |


### Showcase sản phẩm và giá minh họa

Mỗi sản phẩm có tên đầy đủ, câu chuyện thiết kế, mô tả quảng bá, chất liệu, kích thước tham khảo, gợi ý phối đồ, giá VNĐ, ô số lượng và hai nút **Thêm vào giỏ hàng** / **Mua ngay**. Nút Mua ngay chọn sản phẩm rồi đưa khách tới checkout; khách vẫn cần nhập thông tin và xác nhận trước khi hệ thống ghi đơn.

| Sản phẩm | Giá minh họa |
|---|---:|
| Túi xách Chanel 2.55 — Biểu tượng di sản thủ công vượt thời gian từ năm 1955 | 185.000.000 ₫ |
| Túi xách Chanel Classic Flap — Kiệt tác nắp gập kinh điển với khóa xoay CC huyền thoại | 215.000.000 ₫ |
| Túi xách Boy Chanel — Tuyên ngôn cá tính mạnh mẽ và hiện đại | 198.000.000 ₫ |
| Túi xách Chanel 19 — Sự giao thoa mềm mại giữa di sản và tinh thần đương đại | 228.000.000 ₫ |
| Túi Chanel Wallet on Chain — Vẻ thanh lịch nhỏ gọn cho những cuộc hẹn thành thị | 128.000.000 ₫ |
| Túi xách Chanel Gabrielle — Tinh thần tự do trong phom dáng linh hoạt | 205.000.000 ₫ |

**Các mức giá chỉ là dữ liệu mẫu cho đồ án, không phải giá chính thức của CHANEL hoặc lời chào bán hàng thật.** Chất liệu và kích thước cũng là thông tin tham khảo theo phiên bản; trang yêu cầu xác nhận lại trước khi đặt. Website không đại diện, không liên kết với CHANEL.

Mỗi mẫu có phần riêng về di sản/cảm hứng, nghệ thuật chế tác, chất liệu, kích thước, chi tiết phần cứng và gợi ý phối đồ. Số đo là tham khảo vì mỗi dòng có nhiều phiên bản. Nội dung chế tác không khẳng định số giờ khâu tay khi không có thông tin xác thực áp dụng cho đúng mẫu.

### Giỏ hàng, checkout và dữ liệu đơn hàng

Đây là luồng checkout minh họa không dùng WooCommerce và không xử lý thanh toán: khách thêm/xóa/cập nhật số lượng trong giỏ, nhập họ tên, email, số điện thoại, địa chỉ và ghi chú, rồi gửi yêu cầu. Hệ thống tạo đơn ở trạng thái `pending_confirmation`; không thu thập thông tin thẻ, không thu tiền và không tự gửi hàng. `Mua ngay` đưa sản phẩm đã chọn vào giỏ và cuộn tới biểu mẫu checkout.

MU-plugin tạo các bảng theo tiền tố WordPress (thường là `wp_`):

| Bảng | Nội dung |
|---|---|
| `wp_chanel_products` | Catalog, giá minh họa, câu chuyện di sản, chế tác, chất liệu, kích thước, phần cứng và gợi ý phối đồ |
| `wp_chanel_orders` | Mã đơn, thông tin liên hệ/giao hàng, trạng thái, tiền tệ, tổng tiền, thời gian |
| `wp_chanel_order_items` | `order_id`, `product_id`, mã/tên snapshot, số lượng, đơn giá và thành tiền tại thời điểm đặt |
| `wp_chanel_leads` | Yêu cầu tư vấn từ form showcase |

Đơn hàng và các dòng sản phẩm được ghi trong một transaction MySQL: nếu không lưu đủ các mặt hàng hoặc không commit được, đơn bị rollback và website trả lỗi thay vì báo thành công. Dữ liệu cá nhân chỉ được lưu theo sự đồng ý trong biểu mẫu. Có thể xem database và đối chiếu `chanel_orders` với `chanel_order_items` trong phpMyAdmin tại cổng 8081. Hãy dùng `SHOW TABLES LIKE '%chanel_%';` để tìm tên bảng nếu WordPress dùng tiền tố khác `wp_`.

Plugin `wordpress/mu-plugins/chanel-showcase.php` tự chạy mà không cần bật trong trang quản trị. Khi nâng cấp schema, plugin bổ sung trường nội dung editorial, đồng bộ mô tả của sản phẩm hiện có và thêm các mẫu mới theo slug; giá các sản phẩm hiện hữu được giữ nguyên. Form kiểm tra nonce, lọc/kiểm tra dữ liệu, yêu cầu đồng ý liên hệ và ghi bằng `$wpdb->insert` vào bảng `<tiền_tố_WordPress>chanel_leads` (thường là `wp_chanel_leads`). Trường được lưu: họ tên, email, số điện thoại tùy chọn, mẫu quan tâm, xác nhận đồng ý và thời gian gửi. Danh sách mẫu quan tâm lấy trực tiếp từ catalog đang hiển thị. Lỗi lưu DB trả HTTP 500 thay vì hiển thị thông báo thành công.

Gửi form tạo request POST qua Nginx tới WordPress; request sẽ xuất hiện trong access log Nginx và được Promtail chuyển tới Loki. Có thể xác nhận dữ liệu trong phpMyAdmin bằng cách chọn database `MYSQL_DATABASE` rồi mở bảng `wp_chanel_leads` (tiền tố có thể khác).

## Kiểm tra hạ tầng

### Reverse proxy

`nginx/nginx.conf` là cấu hình duy nhất được mount vào Nginx. Nginx chuyển tiếp website tới dịch vụ WordPress; WordPress không mở cổng host riêng. phpMyAdmin được publish riêng trên cổng 8081. Cổng 8080 chỉ phục vụ `stub_status` nội bộ cho nginx-prometheus-exporter. Có các security headers `X-Frame-Options`, `X-Content-Type-Options`, `Referrer-Policy` và `Permissions-Policy`, đồng thời ẩn phiên bản Nginx.

Hiện tại Nginx phục vụ HTTP trên cổng 80, **chưa bật HTTPS**. HSTS không được gửi khi chưa cấu hình TLS. Headers cơ bản đáp ứng phương án reverse proxy của bài; nếu yêu cầu HTTPS, cần cấu hình chứng chỉ và publish cổng 443 trước khi bật HSTS.

### Metrics

Prometheus đọc `prometheus/prometheus.yml`, scrape mỗi 15 giây và lưu dữ liệu tối đa 7 ngày. Các job được cấu hình:

| Job | Nguồn |
|---|---|
| `prometheus` | Prometheus |
| `node-exporter` | Tài nguyên máy host |
| `cadvisor` | Tài nguyên từng container |
| `nginx` | Nginx qua `stub_status` và nginx-prometheus-exporter |
| `mysql` | MySQL qua mysqld-exporter |

Grafana tự provision datasource `prometheus` và `loki` cùng dashboard **Chanel Showcase — System** từ `grafana-datasources/` và `grafana-dashboards/`. Dashboard hiển thị CPU/bộ nhớ container, request và kết nối Nginx, trạng thái/kết nối/truy vấn MySQL và log gần đây. Mở Prometheus `/targets` để xác nhận các target là `UP`; trong Grafana Explore có thể chọn datasource `prometheus` hoặc `loki`.

Tài khoản mysqld-exporter riêng chỉ được cấp `PROCESS`, `REPLICATION CLIENT`, `SELECT` toàn cục; không dùng tài khoản ứng dụng WordPress. Với volume DB mới, user được tạo từ `db/setup-exporter-user.sh`. Script init của MySQL chỉ tự chạy khi volume `db_data` được khởi tạo lần đầu. Nếu đang dùng volume cũ chưa có user này, chạy một lần:

```bash
docker compose exec db /bin/sh /docker-entrypoint-initdb.d/01-create-exporter-user.sh
```

Sau đó kiểm tra job `mysql` ở Prometheus `/targets`.

### Logs

Promtail dùng Docker service discovery qua socket, ánh xạ container ID tới Docker JSON log files, lưu positions qua volume và gắn nhãn `container` cùng `service`; log được gửi tới Loki. Loki lưu log bằng filesystem trong volume `loki_data`, với retention 72 giờ. Loki không publish cổng ra host.

Ví dụ LogQL trong Grafana Explore:

```logql
{service="nginx"}
{service="wordpress"}
{service="nginx"} |~ " [45][0-9]{2} "
```

Gửi thử form rồi tìm request POST trong stream `{service="nginx"}`; đây là cách kiểm tra luồng HTTP request → access log → Promtail → Loki.

