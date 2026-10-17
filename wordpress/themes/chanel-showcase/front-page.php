<?php
get_header();

$lead_status = isset( $_GET['lead'] ) ? sanitize_key( wp_unslash( $_GET['lead'] ) ) : '';
$cart_status = isset( $_GET['cart'] ) ? sanitize_key( wp_unslash( $_GET['cart'] ) ) : '';
$order_status = isset( $_GET['chanel_order'] ) ? sanitize_key( wp_unslash( $_GET['chanel_order'] ) ) : '';
$products = chanel_showcase_products();
$cart_items = chanel_showcase_cart();
$cart_total = 0;
foreach ( $cart_items as $cart_item ) {
	$cart_total += $cart_item['line_total'];
}
$order_number = '';
if ( 'success' === $order_status && isset( $_GET['chanel_order_id'] ) ) {
	$order_id = absint( $_GET['chanel_order_id'] );
	if ( 0 === $order_id ) {
		$order_status = '';
	}
}
if ( 'success' === $order_status && isset( $_GET['chanel_order_id'] ) ) {
	global $wpdb;
	$order_number = (string) $wpdb->get_var(
		$wpdb->prepare(
			'SELECT order_number FROM ' . chanel_showcase_orders_table() . ' WHERE id = %d',
			$order_id
		)
	);
}
?>

<main>
	<section class="hero" aria-labelledby="hero-title">
		<div class="hero-content">
			<p class="eyebrow"><?php esc_html_e( 'Di sản thủ công · Từ năm 1910', 'chanel-showcase' ); ?></p>
			<h1 id="hero-title"><?php esc_html_e( 'Vẻ đẹp vượt thời gian.', 'chanel-showcase' ); ?></h1>
			<p class="hero-description"><?php esc_html_e( 'Khám phá thế giới túi xách Chanel — nơi kỹ nghệ thủ công tinh xảo gặp gỡ phong cách thanh lịch không tuổi.', 'chanel-showcase' ); ?></p>
			<a class="button" href="#collection"><?php esc_html_e( 'Khám phá bộ sưu tập', 'chanel-showcase' ); ?></a>
		</div>
	</section>

	<section class="section" id="collection" aria-labelledby="collection-title">
		<div class="section-heading">
			<p class="eyebrow"><?php esc_html_e( 'Biểu tượng phong cách', 'chanel-showcase' ); ?></p>
			<h2 id="collection-title"><?php esc_html_e( 'Dấu ấn riêng của bạn', 'chanel-showcase' ); ?></h2>
			<p><?php esc_html_e( 'Khám phá câu chuyện, chất liệu và vẻ đẹp riêng trong từng thiết kế. Chọn chiếc túi bạn yêu thích để thêm vào giỏ hoặc đặt mua ngay.', 'chanel-showcase' ); ?></p>
			<p class="price-disclaimer"><?php esc_html_e( ' Chất liệu, kích thước và phần cứng thay đổi theo phiên bản; vui lòng xác nhận thông tin sản phẩm thực tế trước khi đặt.', 'chanel-showcase' ); ?></p>
		</div>
		<div class="collection-grid">
			<?php foreach ( $products as $product ) : ?>
				<article class="collection-card product-card">
					<img src="<?php echo esc_url( $product['image_url'] ); ?>" alt="<?php echo esc_attr( $product['name'] ); ?>" loading="lazy">
					<div class="product-content">
						<p class="product-kicker"><?php esc_html_e( 'Túi xách biểu tượng', 'chanel-showcase' ); ?></p>
						<h3><?php echo esc_html( $product['name'] ); ?></h3>
						<p class="product-description"><?php echo esc_html( $product['description'] ); ?></p>
						<div class="product-editorial">
							<section class="editorial-note">
								<h4><?php esc_html_e( 'Di sản & cảm hứng', 'chanel-showcase' ); ?></h4>
								<p><?php echo esc_html( $product['heritage'] ); ?></p>
							</section>
							<section class="editorial-note">
								<h4><?php esc_html_e( 'Nghệ thuật chế tác', 'chanel-showcase' ); ?></h4>
								<p><?php echo esc_html( $product['craftsmanship'] ); ?></p>
							</section>
						</div>
						<dl class="product-specs">
							<div><dt><?php esc_html_e( 'Chất liệu', 'chanel-showcase' ); ?></dt><dd><?php echo esc_html( $product['material'] ); ?></dd></div>
							<div><dt><?php esc_html_e( 'Kích thước', 'chanel-showcase' ); ?></dt><dd><?php echo esc_html( $product['dimensions'] ); ?></dd></div>
							<div><dt><?php esc_html_e( 'Phần cứng & chi tiết', 'chanel-showcase' ); ?></dt><dd><?php echo esc_html( $product['hardware'] ); ?></dd></div>
							<div><dt><?php esc_html_e( 'Gợi ý phối đồ', 'chanel-showcase' ); ?></dt><dd><?php echo esc_html( $product['styling'] ); ?></dd></div>
						</dl>
						<p class="product-price"><?php echo esc_html( chanel_showcase_money( $product['price'] ) ); ?></p>
						<form class="product-cart-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
							<input type="hidden" name="action" value="chanel_showcase_cart">
							<input type="hidden" name="product_slug" value="<?php echo esc_attr( $product['slug'] ); ?>">
							<?php wp_nonce_field( 'chanel_cart_action', 'cart_nonce' ); ?>
							<label for="quantity-<?php echo esc_attr( $product['slug'] ); ?>"><?php esc_html_e( 'Số lượng', 'chanel-showcase' ); ?></label>
							<input id="quantity-<?php echo esc_attr( $product['slug'] ); ?>" type="number" name="quantity" min="1" max="10" value="1" required>
							<div class="product-actions">
								<button class="button button-outline" type="submit" name="cart_action" value="add"><?php esc_html_e( 'Thêm vào giỏ hàng', 'chanel-showcase' ); ?></button>
								<button class="button" type="submit" name="cart_action" value="buy"><?php esc_html_e( 'Mua ngay', 'chanel-showcase' ); ?></button>
							</div>
						</form>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="section cart-section" id="cart" aria-labelledby="cart-title">
		<div class="section-heading">
			<p class="eyebrow"><?php esc_html_e( 'Lựa chọn của bạn', 'chanel-showcase' ); ?></p>
			<h2 id="cart-title"><?php esc_html_e( 'Giỏ hàng & đặt hàng', 'chanel-showcase' ); ?></h2>
			<p><?php esc_html_e( 'Kiểm tra sản phẩm và thông tin đơn trước khi gửi yêu cầu đặt hàng.', 'chanel-showcase' ); ?></p>
		</div>

		<?php if ( 'success' === $order_status && '' !== $order_number ) : ?>
			<p class="form-notice" role="status"><?php echo esc_html( sprintf( __( 'Đơn hàng %s đã được ghi nhận và đang chờ xác nhận. ', 'chanel-showcase' ), $order_number ) ); ?></p>
		<?php elseif ( 'invalid' === $order_status ) : ?>
			<p class="form-notice" role="alert"><?php esc_html_e( 'Vui lòng điền đầy đủ họ tên, email, điện thoại, địa chỉ giao hàng và xác nhận đồng ý.', 'chanel-showcase' ); ?></p>
		<?php elseif ( 'empty' === $order_status ) : ?>
			<p class="form-notice" role="alert"><?php esc_html_e( 'Giỏ hàng đang trống. Hãy chọn ít nhất một sản phẩm trước khi đặt hàng.', 'chanel-showcase' ); ?></p>
		<?php endif; ?>

		<?php if ( 'added' === $cart_status ) : ?>
			<p class="form-notice" role="status"><?php esc_html_e( 'Sản phẩm đã được thêm vào giỏ hàng.', 'chanel-showcase' ); ?></p>
		<?php elseif ( 'updated' === $cart_status ) : ?>
			<p class="form-notice" role="status"><?php esc_html_e( 'Giỏ hàng đã được cập nhật.', 'chanel-showcase' ); ?></p>
		<?php elseif ( 'limit' === $cart_status ) : ?>
			<p class="form-notice" role="alert"><?php esc_html_e( 'Mỗi mẫu có thể đặt tối đa 10 sản phẩm trong một giỏ hàng.', 'chanel-showcase' ); ?></p>
		<?php elseif ( 'invalid' === $cart_status ) : ?>
			<p class="form-notice" role="alert"><?php esc_html_e( 'Số lượng không hợp lệ. Hãy chọn từ 1 đến 10 sản phẩm.', 'chanel-showcase' ); ?></p>
		<?php elseif ( 'unavailable' === $cart_status ) : ?>
			<p class="form-notice" role="alert"><?php esc_html_e( 'Sản phẩm này hiện không khả dụng. Vui lòng tải lại trang và thử lại.', 'chanel-showcase' ); ?></p>
		<?php elseif ( 'buy' === $cart_status ) : ?>
			<p class="form-notice" role="status"><?php esc_html_e( 'Sản phẩm đã được chọn. Hoàn tất thông tin bên dưới để tạo đơn hàng chờ xác nhận.', 'chanel-showcase' ); ?></p>
		<?php endif; ?>

		<?php if ( empty( $cart_items ) ) : ?>
			<p class="empty-cart"><?php esc_html_e( 'Giỏ hàng của bạn đang trống. Hãy khám phá bộ sưu tập và chọn thiết kế yêu thích.', 'chanel-showcase' ); ?></p>
		<?php else : ?>
			<form class="cart-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
				<input type="hidden" name="action" value="chanel_showcase_cart">
				<input type="hidden" name="cart_action" value="update">
				<?php wp_nonce_field( 'chanel_cart_action', 'cart_nonce' ); ?>
				<div class="cart-table-wrap">
					<table class="cart-table">
						<thead><tr>
							<th scope="col"><?php esc_html_e( 'Sản phẩm', 'chanel-showcase' ); ?></th>
							<th scope="col"><?php esc_html_e( 'Đơn giá', 'chanel-showcase' ); ?></th>
							<th scope="col"><?php esc_html_e( 'Số lượng', 'chanel-showcase' ); ?></th>
							<th scope="col"><?php esc_html_e( 'Thành tiền', 'chanel-showcase' ); ?></th>
							<th scope="col"><span class="screen-reader-text"><?php esc_html_e( 'Xóa', 'chanel-showcase' ); ?></span></th>
						</tr></thead>
						<tbody>
							<?php foreach ( $cart_items as $cart_item ) : ?>
								<tr>
									<th scope="row"><?php echo esc_html( $cart_item['name'] ); ?></th>
									<td><?php echo esc_html( chanel_showcase_money( $cart_item['price'] ) ); ?></td>
									<td><label class="screen-reader-text" for="cart-quantity-<?php echo esc_attr( $cart_item['slug'] ); ?>"><?php echo esc_html( sprintf( __( 'Số lượng %s', 'chanel-showcase' ), $cart_item['name'] ) ); ?></label><input id="cart-quantity-<?php echo esc_attr( $cart_item['slug'] ); ?>" class="cart-quantity" type="number" name="quantities[<?php echo esc_attr( $cart_item['slug'] ); ?>]" min="0" max="10" value="<?php echo esc_attr( $cart_item['quantity'] ); ?>"></td>
									<td><?php echo esc_html( chanel_showcase_money( $cart_item['line_total'] ) ); ?></td>
									<td><button class="text-button" type="submit" name="cart_action" value="remove-<?php echo esc_attr( $cart_item['slug'] ); ?>"><?php esc_html_e( 'Xóa', 'chanel-showcase' ); ?></button></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="cart-summary">
					<button class="button button-outline" type="submit" name="cart_action" value="update"><?php esc_html_e( 'Cập nhật giỏ hàng', 'chanel-showcase' ); ?></button>
					<p><span><?php esc_html_e( 'Tạm tính', 'chanel-showcase' ); ?></span><strong><?php echo esc_html( chanel_showcase_money( $cart_total ) ); ?></strong></p>
				</div>
			</form>

			<form class="checkout-form" id="checkout" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
				<h3><?php esc_html_e( 'Thông tin đặt hàng', 'chanel-showcase' ); ?></h3>
				
				<input type="hidden" name="action" value="chanel_showcase_checkout">
				<?php wp_nonce_field( 'chanel_checkout', 'checkout_nonce' ); ?>
				<div class="checkout-grid">
					<div class="form-field">
						<label for="customer-name"><?php esc_html_e( 'Họ và tên', 'chanel-showcase' ); ?></label>
						<input id="customer-name" type="text" name="customer_name" maxlength="100" autocomplete="name" required>
					</div>
					<div class="form-field">
						<label for="customer-email"><?php esc_html_e( 'Email', 'chanel-showcase' ); ?></label>
						<input id="customer-email" type="email" name="customer_email" maxlength="190" autocomplete="email" required>
					</div>
					<div class="form-field">
						<label for="customer-phone"><?php esc_html_e( 'Số điện thoại', 'chanel-showcase' ); ?></label>
						<input id="customer-phone" type="tel" name="customer_phone" maxlength="40" autocomplete="tel" required>
					</div>
					<div class="form-field checkout-address">
						<label for="shipping-address"><?php esc_html_e( 'Địa chỉ liên hệ / giao hàng', 'chanel-showcase' ); ?></label>
						<textarea id="shipping-address" name="shipping_address" rows="3" maxlength="1000" autocomplete="street-address" required></textarea>
					</div>
					<div class="form-field checkout-address">
						<label for="customer-note"><?php esc_html_e( 'Ghi chú cho đơn hàng (không bắt buộc)', 'chanel-showcase' ); ?></label>
						<textarea id="customer-note" name="customer_note" rows="2" maxlength="1000"></textarea>
					</div>
					<label class="consent-field checkout-consent" for="order-consent">
						<input id="order-consent" type="checkbox" name="order_consent" value="1" required>
						<span><?php esc_html_e( 'Tôi đồng ý để thông tin được sử dụng nhằm tiếp nhận và xác nhận yêu cầu đặt hàng này.', 'chanel-showcase' ); ?></span>
					</label>
				</div>
				<div class="checkout-submit">
					<p><span><?php esc_html_e( 'Tổng cộng', 'chanel-showcase' ); ?></span><strong><?php echo esc_html( chanel_showcase_money( $cart_total ) ); ?></strong></p>
					<button class="button" type="submit"><?php esc_html_e( 'Gửi đơn hàng', 'chanel-showcase' ); ?></button>
				</div>
			</form>
		<?php endif; ?>
	</section>

	<section class="story" id="story" aria-labelledby="story-title">
		<div class="story-image" role="img" aria-label="<?php esc_attr_e( 'Chi tiết túi xách da cao cấp', 'chanel-showcase' ); ?>"></div>
		<div class="story-copy">
			<p class="eyebrow"><?php esc_html_e( 'Nghệ thuật chế tác', 'chanel-showcase' ); ?></p>
			<h2 id="story-title"><?php esc_html_e( 'Được tạo nên để lưu giữ.', 'chanel-showcase' ); ?></h2>
			<p><?php esc_html_e( 'Từ đường kim mũi chỉ đến từng chi tiết hoàn thiện, mỗi chiếc túi là sự kết tinh của kỹ nghệ và niềm đam mê với cái đẹp.', 'chanel-showcase' ); ?></p>
			<a class="button" href="#contact"><?php esc_html_e( 'Đặt lịch tư vấn', 'chanel-showcase' ); ?></a>
		</div>
	</section>

	<section class="section contact-section" id="contact" aria-labelledby="contact-title">
		<div class="section-heading">
			<p class="eyebrow"><?php esc_html_e( 'Dịch vụ cá nhân hóa', 'chanel-showcase' ); ?></p>
			<h2 id="contact-title"><?php esc_html_e( 'Một trải nghiệm dành riêng cho bạn', 'chanel-showcase' ); ?></h2>
			<p><?php esc_html_e( 'Để lại thông tin, đội ngũ tư vấn sẽ liên hệ để chia sẻ thêm về thiết kế bạn yêu thích.', 'chanel-showcase' ); ?></p>
		</div>

		<?php if ( 'success' === $lead_status ) : ?>
			<p class="form-notice" role="status"><?php esc_html_e( 'Cảm ơn bạn. Yêu cầu tư vấn đã được ghi nhận.', 'chanel-showcase' ); ?></p>
		<?php elseif ( 'invalid' === $lead_status ) : ?>
			<p class="form-notice" role="alert"><?php esc_html_e( 'Vui lòng kiểm tra lại thông tin và xác nhận đồng ý trước khi gửi.', 'chanel-showcase' ); ?></p>
		<?php endif; ?>

		<form class="lead-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
			<input type="hidden" name="action" value="chanel_showcase_lead">
			<?php wp_nonce_field( 'chanel_lead_submission', 'chanel_nonce' ); ?>
			<div class="honeypot" aria-hidden="true">
				<label for="company-website"><?php esc_html_e( 'Để trống trường này', 'chanel-showcase' ); ?></label>
				<input id="company-website" type="text" name="company_website" tabindex="-1" autocomplete="off">
			</div>
			<div class="form-field">
				<label for="lead-name"><?php esc_html_e( 'Họ và tên', 'chanel-showcase' ); ?></label>
				<input id="lead-name" type="text" name="name" maxlength="100" autocomplete="name" required>
			</div>
			<div class="form-field">
				<label for="lead-email"><?php esc_html_e( 'Email', 'chanel-showcase' ); ?></label>
				<input id="lead-email" type="email" name="email" maxlength="190" autocomplete="email" required>
			</div>
			<div class="form-field">
				<label for="lead-phone"><?php esc_html_e( 'Số điện thoại (không bắt buộc)', 'chanel-showcase' ); ?></label>
				<input id="lead-phone" type="tel" name="phone" maxlength="40" autocomplete="tel">
			</div>
			<div class="form-field">
				<label for="lead-interest"><?php esc_html_e( 'Thiết kế bạn quan tâm', 'chanel-showcase' ); ?></label>
				<select id="lead-interest" name="interest" required>
					<option value=""><?php esc_html_e( 'Chọn một thiết kế', 'chanel-showcase' ); ?></option>
					<?php foreach ( $products as $product ) : ?>
						<option value="<?php echo esc_attr( $product['slug'] ); ?>"><?php echo esc_html( $product['name'] ); ?></option>
					<?php endforeach; ?>
					<option value="consultation"><?php esc_html_e( 'Tư vấn chung', 'chanel-showcase' ); ?></option>
				</select>
			</div>
			<label class="consent-field" for="lead-consent">
				<input id="lead-consent" type="checkbox" name="consent" value="1" required>
				<span><?php esc_html_e( 'Tôi đồng ý để thông tin trên được sử dụng nhằm liên hệ và tư vấn theo yêu cầu của tôi.', 'chanel-showcase' ); ?></span>
			</label>
			<button class="button form-submit" type="submit"><?php esc_html_e( 'Gửi yêu cầu tư vấn', 'chanel-showcase' ); ?></button>
		</form>
	</section>
</main>

<?php
get_footer();
