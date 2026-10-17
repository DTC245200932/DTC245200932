<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
	<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Trang chủ Chanel Showcase', 'chanel-showcase' ); ?>">CHANEL</a>
	<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Điều hướng chính', 'chanel-showcase' ); ?>">
		<a href="<?php echo esc_url( home_url( '/#collection' ) ); ?>"><?php esc_html_e( 'Bộ sưu tập', 'chanel-showcase' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/#story' ) ); ?>"><?php esc_html_e( 'Câu chuyện', 'chanel-showcase' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/#cart' ) ); ?>"><?php echo esc_html( sprintf( __( 'Giỏ hàng (%d)', 'chanel-showcase' ), chanel_showcase_cart_count() ) ); ?></a>
		<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Tư vấn', 'chanel-showcase' ); ?></a>
	</nav>
</header>
