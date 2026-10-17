<?php
/**
 * Plugin Name: Chanel Showcase Leads
 * Description: Stores consultation requests from the Chanel Showcase landing page.
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

const CHANEL_SHOWCASE_DB_VERSION = '5';
const CHANEL_SHOWCASE_CURRENCY = 'VND';

function chanel_showcase_leads_table() {
	global $wpdb;

	return $wpdb->prefix . 'chanel_leads';
}

function chanel_showcase_products_table() {
	global $wpdb;

	return $wpdb->prefix . 'chanel_products';
}

function chanel_showcase_orders_table() {
	global $wpdb;

	return $wpdb->prefix . 'chanel_orders';
}

function chanel_showcase_order_items_table() {
	global $wpdb;

	return $wpdb->prefix . 'chanel_order_items';
}

function chanel_showcase_product_catalog() {
	return array(
		array(
			'slug'        => 'chanel-255',
			'name'        => 'Túi xách Chanel 2.55 — Biểu tượng di sản thủ công vượt thời gian từ năm 1955',
			'description' => 'Ra đời vào tháng 2 năm 1955, chiếc túi 2.55 ghi dấu một đổi mới đầy tinh tế: dây đeo kim loại cho phép người phụ nữ tự do chuyển động mà vẫn giữ trọn vẻ thanh lịch. Nắp gập hình chữ nhật, đường chần quả trám đặc trưng và khoang túi được sắp đặt gọn gàng tạo nên một thiết kế vừa giàu câu chuyện vừa thiết thực. Phiên bản trưng bày gợi nhắc tinh thần tiên phong ấy bằng phom dáng mềm mại, bề mặt da mịn và sắc thái sang trọng dễ đi cùng năm tháng. Một lựa chọn dành cho người yêu vẻ đẹp cổ điển có chiều sâu, từ buổi gặp gỡ trang trọng đến những khoảnh khắc thường nhật đáng nhớ.',
			'heritage'    => 'Tháng 2 năm 1955, Gabrielle Chanel giới thiệu chiếc túi mang tên 2.55, kết hợp vẻ thanh lịch với sự tự do khi di chuyển. Dây đeo xích cho phép đeo vai thay vì phải cầm tay; nắp gập, đường chần quả trám và dáng túi gọn gàng dần trở thành những dấu hiệu thị giác gắn với một chương quan trọng trong lịch sử phụ kiện của nhà mốt. Thiết kế ngày nay tiếp tục được diễn giải qua nhiều kích cỡ, chất liệu và sắc màu; mỗi phiên bản là một cách đọc mới trên nền tảng kinh điển.',
			'craftsmanship' => 'Câu chuyện chế tác bắt đầu từ việc lựa chọn da và cân chỉnh độ mềm của thân túi để đường chần quả trám tạo nên nhịp nổi đều đặn mà không làm mất vẻ uyển chuyển. Các đường may, nếp gấp của nắp và phần nối dây đeo cần được xử lý chính xác để túi giữ phom khi sử dụng. Hoàn thiện một chiếc túi gồm nhiều công đoạn thủ công và kiểm tra chất lượng; thời lượng cụ thể thay đổi theo mẫu, chất liệu và quy trình của từng phiên bản nên không đưa ra số giờ khâu tay chưa được xác nhận.',
			'material'    => 'Da cừu cao cấp mềm mại, lót vải dệt; chi tiết kim loại tông vàng hoặc bạc tùy phiên bản. Chất liệu và phần cứng có thể khác theo mùa.',
			'dimensions'  => 'Kích thước tham khảo: 25,5 × 16 × 7,5 cm. Kích thước thực tế phụ thuộc phiên bản và cần xác nhận trước khi đặt.',
			'hardware'    => 'Dây đeo xích kim loại và khóa Mademoiselle hình chữ nhật trên phiên bản Reissue; màu hoàn thiện có thể thay đổi theo mùa và cấu hình.',
			'styling'     => 'Phối cùng blazer may đo, váy lụa hoặc áo sơ mi trắng và quần ống đứng. Dây đeo cho phép chuyển linh hoạt từ đeo vai ban ngày sang phong thái chỉn chu cho buổi tối.',
			'image_url'   => 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=1100&q=85',
			'price'       => 185000000,
			'menu_order'  => 10,
		),
		array(
			'slug'        => 'chanel-classic-flap',
			'name'        => 'Túi xách Chanel Classic Flap — Kiệt tác nắp gập kinh điển với khóa xoay CC huyền thoại',
			'description' => 'Classic Flap tiếp nối tinh thần thanh lịch của dòng túi nắp gập Chanel bằng một dấu ấn nhận diện không thể nhầm lẫn: khóa xoay CC, đường chần quả trám và dây đeo đan xích điểm da. Tỷ lệ cân đối giúp thiết kế giữ được vẻ trang trọng mà không cứng nhắc; từng ngăn túi được bố trí để những vật dụng thiết yếu luôn gọn gàng bên mình. Phiên bản giới thiệu kết hợp phom cấu trúc với bề mặt da cao cấp, tạo chiều sâu dưới ánh sáng và hoàn thiện vẻ ngoài tinh tế. Đây là điểm nhấn tự nhiên cho tủ đồ thanh lịch — một chiếc túi có thể đồng hành từ cuộc hẹn công việc đến bữa tối, qua nhiều mùa phong cách.',
			'heritage'    => 'Classic Flap phát triển từ ngôn ngữ túi nắp gập của Chanel và được Karl Lagerfeld diễn giải lại vào thập niên 1980 với khóa CC lồng đặc trưng cùng dây xích luồn da. Sự kết hợp giữa đường chần quả trám, nắp gập nhiều lớp và khóa xoay tạo nên diện mạo dễ nhận biết mà vẫn cân bằng, không phô trương. Qua nhiều thập kỷ, thiết kế được duy trì trong nhiều kích cỡ và chất liệu, trở thành lựa chọn tiêu biểu cho phong cách cổ điển hiện đại.',
			'craftsmanship' => 'Để tạo nên bề mặt chần đều, các lớp da và vật liệu lót được căn chỉnh cẩn thận trước khi may; những đường chần cần giữ nhịp thống nhất qua thân túi, nắp và các góc bo. Phần dây xích được luồn da, kết nối với thân túi và cân chỉnh để rủ tự nhiên trên vai. Từng mép da, đường nối và cơ cấu khóa được hoàn thiện, kiểm tra theo tiêu chuẩn của phiên bản cụ thể. Quy trình gồm nhiều bước thủ công, nhưng số giờ chế tác không được công bố thống nhất cho mọi mẫu nên không gán một con số cố định.',
			'material'    => 'Da cừu cao cấp hoặc da bê vân hạt theo phiên bản, lót vải dệt và dây xích luồn da; khóa kim loại hoàn thiện tinh xảo.',
			'dimensions'  => 'Kích thước tham khảo cỡ Medium: 25,5 × 16 × 6,5 cm. Kích thước thực tế phụ thuộc phiên bản và cần xác nhận trước khi đặt.',
			'hardware'    => 'Khóa xoay CC, dây đeo xích luồn da và chi tiết kim loại hoàn thiện tông vàng hoặc bạc tùy phiên bản.',
			'styling'     => 'Tạo điểm nhấn cho suit đơn sắc, váy cocktail hoặc phong cách thường ngày với denim tối màu và áo khoác dáng đẹp. Có thể đeo vai hoặc đeo chéo tùy cách điều chỉnh dây.',
			'image_url'   => get_theme_file_uri( 'assets/products/chanel-classic-flap/cover-20261017.png' ),
			'price'       => 215000000,
			'menu_order'  => 20,
		),
		array(
			'slug'        => 'chanel-boy',
			'name'        => 'Túi xách Boy Chanel — Tuyên ngôn cá tính mạnh mẽ và hiện đại',
			'description' => 'Boy Chanel mang đến một sắc thái táo bạo hơn cho tinh thần thanh lịch: đường viền mạnh, thân túi hình hộp và khóa cài nổi bật tạo nên nhịp điệu dứt khoát nhưng vẫn tinh tế. Cảm hứng thiết kế gắn với Arthur “Boy” Capel, người có ảnh hưởng sâu sắc trong những năm đầu của nhà mốt; tên gọi trở thành lời nhắc về cá tính độc lập và sự tự tin. Phiên bản trưng bày cân bằng bề mặt da mềm với cấu trúc rõ nét, để chiếc túi nổi bật như một chi tiết tạo phong cách chứ không chỉ là phụ kiện. Dành cho người muốn đưa chút tương phản hiện đại vào trang phục tối giản, từ ban ngày năng động đến buổi tối cá tính.',
			'heritage'    => 'Boy Chanel được giới thiệu năm 2011 dưới thời Karl Lagerfeld, lấy cảm hứng từ phong thái phóng khoáng của Arthur “Boy” Capel và những chiếc túi cartridge mang hơi hướng thực dụng. Thiết kế tạo đối thoại giữa di sản may đo thanh lịch với đường nét vuông vức, dây xích bản lớn và khóa cài nổi bật. Sự tương phản đó đem đến một góc nhìn mạnh mẽ, trẻ trung hơn về chiếc túi Chanel mà vẫn giữ lại những chi tiết thủ công đặc trưng.',
			'craftsmanship' => 'Phom hộp của Boy đòi hỏi các tấm da được cắt và ghép chính xác để đường viền dày, thân túi và nắp gập gặp nhau gọn gàng. Với phiên bản chần quả trám, độ căng bề mặt được cân chỉnh để họa tiết nổi đều; dây xích và khóa cài cần được gắn chắc chắn mà vẫn tạo chuyển động tự nhiên. Người thợ hoàn thiện các cạnh, góc và điểm nối để giữ vẻ sắc nét của thiết kế. Số giờ chế tác tùy mẫu và không được xác nhận thống nhất, vì vậy nội dung này không đưa ra thời lượng cụ thể.',
			'material'    => 'Da bê cao cấp vân mịn hoặc vân hạt tùy phiên bản, kết hợp dây xích kim loại và khóa cài bản lớn.',
			'dimensions'  => 'Kích thước tham khảo cỡ Medium: 25 × 15 × 8 cm. Kích thước thực tế phụ thuộc phiên bản và cần xác nhận trước khi đặt.',
			'hardware'    => 'Khóa cài Boy đặc trưng, dây xích kim loại bản lớn; tông vàng, bạc hoặc phối màu tùy phiên bản.',
			'styling'     => 'Phối đẹp với áo khoác da, blazer phom rộng hoặc trang phục monochrome. Đeo chéo cùng quần jeans và giày bệt cho ban ngày; kết hợp váy đen tối giản khi cần vẻ ngoài nổi bật.',
			'image_url'   => get_theme_file_uri( 'assets/products/chanel-boy/cover.png' ),
			'price'       => 198000000,
			'menu_order'  => 30,
		),
		array(
			'slug'          => 'chanel-19',
			'name'          => 'Túi xách Chanel 19 — Sự giao thoa mềm mại giữa di sản và tinh thần đương đại',
			'description'   => 'Chanel 19 tạo dấu ấn bằng phom túi mềm, đường chần bản lớn và dây xích phối nhiều sắc thái kim loại. Tỷ lệ có độ rủ tự nhiên đem lại vẻ thư thái, trong khi nắp gập và khóa CC giữ kết nối với ngôn ngữ thiết kế quen thuộc của nhà mốt. Mẫu túi dành cho người yêu vẻ sang trọng không quá nghi thức: đủ nổi bật trong ánh đèn buổi tối nhưng vẫn gần gũi khi kết hợp cùng trang phục hằng ngày.',
			'heritage'      => 'Ra mắt năm 2019, Chanel 19 được đặt tên theo năm ra đời và được thiết kế như một lời đối thoại giữa quá khứ với hiện tại. Phom mềm, đường chần nổi và chuỗi mắt xích phối tông tạo nên một diện mạo giàu kết cấu, khác với dáng hộp nghiêm cẩn của những mẫu túi cổ điển. Thiết kế tiếp nối những mã nhận diện quen thuộc bằng tỷ lệ thoải mái, hướng đến một phong thái tự tin và tự nhiên.',
			'craftsmanship' => 'Bề mặt chần bản lớn cần được căn chỉnh để độ phồng phân bố hài hòa trên thân túi; da mềm phải được xử lý vừa đủ để tạo độ rủ mà vẫn giữ cấu trúc. Dây xích phối kim loại được lắp ghép theo từng đoạn, cân bằng sắc thái và trọng lượng khi đeo. Các mép, nếp gập và điểm nối quai được hoàn thiện để chuyển tiếp mượt mà. Quy trình thủ công thay đổi theo kích cỡ và chất liệu, không có số giờ may tay cố định được xác nhận cho mọi phiên bản.',
			'material'      => 'Da cừu, da bê hoặc chất liệu dệt tùy phiên bản; bề mặt chần nổi, lót và cấu trúc bên trong có thể khác nhau theo mùa.',
			'dimensions'    => 'Kích thước tham khảo cỡ Medium: khoảng 26 × 16 × 9 cm. Cỡ và số đo thay đổi theo phiên bản; cần đối chiếu sản phẩm thực tế trước khi đặt.',
			'hardware'      => 'Khóa CC và dây xích phối các tông kim loại trên nhiều phiên bản; sắc độ, lớp hoàn thiện và cấu hình phần cứng thay đổi theo mùa.',
			'styling'       => 'Tạo lớp tương phản cùng áo khoác dáng rộng, len cashmere và quần may đo trong ngày; phối với đầm satin hoặc suit tối màu khi dự tiệc. Phom mềm phù hợp với phong cách có chủ ý nhưng không quá cứng nhắc.',
			'image_url'     => get_theme_file_uri( 'assets/products/chanel-19/cover.png' ),
			'price'         => 228000000,
			'menu_order'    => 40,
		),
		array(
			'slug'          => 'chanel-wallet-on-chain',
			'name'          => 'Túi Chanel Wallet on Chain — Vẻ thanh lịch nhỏ gọn cho những cuộc hẹn thành thị',
			'description'   => 'Wallet on Chain đưa tinh thần của một chiếc túi nắp gập vào tỷ lệ gọn nhẹ, nơi ví, ngăn thẻ và dây đeo xích cùng hiện diện trong một thiết kế linh hoạt. Bên trong được chia thành các ngăn cho vật dụng thiết yếu; bên ngoài giữ nét thanh lịch nhờ đường chần, khóa và chất liệu đặc trưng theo từng phiên bản. Đây là người bạn đồng hành cho những dịp cần mang theo vừa đủ mà vẫn hoàn thiện diện mạo.',
			'heritage'      => 'Wallet on Chain là cách diễn giải nhỏ gọn của ý tưởng kết hợp ví với dây đeo vai: phụ kiện đựng vật dụng thiết yếu có thể chuyển thành chiếc túi đeo tay rảnh. Qua nhiều mùa, thiết kế xuất hiện với các cấu hình nắp, ngăn, da và phần cứng khác nhau, nhưng vẫn giữ tinh thần thực dụng thanh lịch. Vì là một dòng có nhiều biến thể, thông số và cách sắp xếp bên trong cần được xác nhận theo đúng mẫu cụ thể.',
			'craftsmanship' => 'Tỷ lệ nhỏ khiến việc căn chỉnh đường chần, nắp gập, mép da và các ngăn bên trong đòi hỏi độ chính xác cao để các lớp vật liệu không làm mất phom. Dây xích được nối vào thân hoặc luồn qua các chi tiết da tùy cấu hình; từng điểm gắn cần được hoàn thiện để túi có thể đeo ổn định. Các ngăn ví được sắp xếp gọn trong không gian giới hạn. Thời lượng chế tác không được công bố thống nhất cho mọi cấu hình nên không nêu số giờ cụ thể.',
			'material'      => 'Da cừu, da bê vân hạt hoặc chất liệu khác tùy phiên bản; lót và cách chia ngăn bên trong cũng có thể thay đổi.',
			'dimensions'    => 'Kích thước tham khảo một số cấu hình: khoảng 19 × 12 × 4 cm. Wallet on Chain có nhiều kiểu dáng và kích thước; cần xác nhận số đo của đúng phiên bản.',
			'hardware'      => 'Dây đeo xích có thể luồn da hoặc để kim loại lộ; khóa và tông hoàn thiện thay đổi theo thiết kế, mùa và cấu hình.',
			'styling'       => 'Đeo chéo cùng áo khoác ngắn, quần ống đứng và giày bệt cho lịch trình trong ngày; tháo hoặc rút gọn dây để dùng như clutch cùng đầm dự tiệc. Hợp với phong cách tối giản cần một điểm nhấn tinh tế.',
			'image_url'     => get_theme_file_uri( 'assets/products/chanel-wallet-on-chain/cover.png' ),
			'price'         => 128000000,
			'menu_order'    => 50,
		),
		array(
			'slug'          => 'chanel-gabrielle',
			'name'          => 'Túi xách Chanel Gabrielle — Tinh thần tự do trong phom dáng linh hoạt',
			'description'   => 'Gabrielle nổi bật với phần đáy cứng cáp, thân túi mềm và dây đeo phối kim loại tạo khả năng biến đổi cách mang. Sự tương phản giữa cấu trúc và chuyển động gợi một phong thái tự do, linh hoạt giữa công việc, dạo phố và những cuộc hẹn. Thiết kế hướng đến người muốn một chiếc túi có cá tính riêng nhưng vẫn dễ hòa vào tủ đồ hằng ngày.',
			'heritage'      => 'Dòng Gabrielle được giới thiệu trong bộ sưu tập Xuân-Hè 2017, mang tên Gabrielle Chanel và phản ánh cảm hứng về sự tự do, độc lập gắn với nhà sáng lập. Đặc điểm dễ nhận biết là phần đáy định hình kết hợp thân mềm cùng dây đeo có thể chuyển cách mang. Thiết kế này mở rộng cách diễn đạt di sản Chanel bằng một hình dáng năng động, khác với cấu trúc túi nắp gập truyền thống.',
			'craftsmanship' => 'Sự tương phản giữa đáy giữ phom và thân túi mềm đòi hỏi các phần được ghép nối chính xác để chiếc túi vừa ổn định vừa chuyển động tự nhiên. Dây đeo đa điểm cần được bố trí cân xứng để thay đổi cách mang mà không kéo lệch thân. Tùy phiên bản, bề mặt có thể được chần hoặc hoàn thiện trơn; các cạnh và mối nối được kiểm tra để giữ sự liền mạch giữa các vật liệu. Số giờ chế tác phụ thuộc mẫu cụ thể và không được khẳng định khi chưa có dữ liệu xác thực.',
			'material'      => 'Da bê, da cừu hoặc phối chất liệu theo phiên bản; phần đáy định hình, lớp lót và bề mặt hoàn thiện có thể khác nhau.',
			'dimensions'    => 'Kích thước tham khảo cỡ Small: khoảng 20 × 15 × 8 cm. Có nhiều cỡ và cấu hình; số đo cần được xác nhận theo sản phẩm cụ thể.',
			'hardware'      => 'Dây đeo phối chuỗi kim loại và da, cho phép thay đổi cách đeo; tông kim loại và cấu hình chi tiết tùy phiên bản.',
			'styling'       => 'Phối cùng áo khoác trench, sơ mi và quần denim để tạo vẻ thành thị tự nhiên; khi dự sự kiện ban ngày, kết hợp với váy midi và giày thấp gót. Điều chỉnh dây đeo để chuyển giữa đeo vai và đeo chéo.',
			'image_url'     => get_theme_file_uri( 'assets/products/chanel-gabrielle/cover.png' ),
			'price'         => 205000000,
			'menu_order'    => 60,
		),
	);
}

function chanel_showcase_orders_table_schema( $charset_collate ) {
	$products_table    = chanel_showcase_products_table();
	$orders_table      = chanel_showcase_orders_table();
	$order_items_table = chanel_showcase_order_items_table();

	return array(
		"CREATE TABLE {$products_table} (
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			slug varchar(100) NOT NULL,
			name varchar(255) NOT NULL,
			description longtext NOT NULL,
			heritage longtext NOT NULL,
			craftsmanship longtext NOT NULL,
			material text NOT NULL,
			dimensions varchar(255) NOT NULL,
			hardware text NOT NULL,
			styling text NOT NULL,
			image_url varchar(500) NOT NULL,
			price bigint(20) unsigned NOT NULL,
			currency varchar(3) NOT NULL DEFAULT 'VND',
			menu_order int(11) NOT NULL DEFAULT 0,
			is_active tinyint(1) unsigned NOT NULL DEFAULT 1,
			created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			updated_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY  (id),
			UNIQUE KEY slug (slug),
			KEY is_active (is_active)
		) {$charset_collate};",
		"CREATE TABLE {$orders_table} (
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			order_number varchar(32) NOT NULL,
			customer_name varchar(100) NOT NULL,
			customer_email varchar(190) NOT NULL,
			customer_phone varchar(40) NOT NULL,
			shipping_address text NOT NULL,
			customer_note text NOT NULL,
			status varchar(24) NOT NULL DEFAULT 'pending_confirmation',
			currency varchar(3) NOT NULL DEFAULT 'VND',
			subtotal bigint(20) unsigned NOT NULL,
			total bigint(20) unsigned NOT NULL,
			created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY  (id),
			UNIQUE KEY order_number (order_number),
			KEY status (status),
			KEY created_at (created_at),
			KEY customer_email (customer_email)
		) {$charset_collate};",
		"CREATE TABLE {$order_items_table} (
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			order_id bigint(20) unsigned NOT NULL,
			product_id bigint(20) unsigned NOT NULL,
			product_slug varchar(100) NOT NULL,
			product_name varchar(255) NOT NULL,
			quantity int(10) unsigned NOT NULL,
			unit_price bigint(20) unsigned NOT NULL,
			line_total bigint(20) unsigned NOT NULL,
			PRIMARY KEY  (id),
			KEY order_id (order_id),
			KEY product_id (product_id),
			KEY product_slug (product_slug)
		) {$charset_collate};",
	);
}

function chanel_showcase_post_value( $key ) {
	if ( ! isset( $_POST[ $key ] ) || ! is_string( $_POST[ $key ] ) ) {
		return '';
	}

	return wp_unslash( $_POST[ $key ] );
}

function chanel_showcase_install_leads_table() {
	if ( get_option( 'chanel_showcase_db_version' ) === CHANEL_SHOWCASE_DB_VERSION ) {
		return;
	}

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	global $wpdb;
	$table_name      = chanel_showcase_leads_table();
	$charset_collate = $wpdb->get_charset_collate();
	$sql             = "CREATE TABLE {$table_name} (
		id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		name varchar(100) NOT NULL,
		email varchar(190) NOT NULL,
		phone varchar(40) NOT NULL DEFAULT '',
		interest varchar(40) NOT NULL,
		consent tinyint(1) unsigned NOT NULL DEFAULT 0,
		created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY  (id),
		KEY created_at (created_at)
	) {$charset_collate};";

	$schemas = array_merge( array( $sql ), chanel_showcase_orders_table_schema( $charset_collate ) );
	foreach ( $schemas as $schema ) {
		dbDelta( $schema );
	}

	foreach ( chanel_showcase_product_catalog() as $product ) {
		$product_id = $wpdb->get_var(
			$wpdb->prepare(
				'SELECT id FROM ' . chanel_showcase_products_table() . ' WHERE slug = %s',
				$product['slug']
			)
		);
		if ( '' !== $wpdb->last_error ) {
			wp_die(
				esc_html__( 'The product catalog could not be read from the database.', 'chanel-showcase' ),
				esc_html__( 'Product catalog unavailable', 'chanel-showcase' ),
				array( 'response' => 500 )
			);
		}

		$product_data = array_merge(
			$product,
			array(
				'currency'  => CHANEL_SHOWCASE_CURRENCY,
				'is_active' => 1,
			)
		);
		if ( null === $product_id ) {
			$inserted = $wpdb->insert(
				chanel_showcase_products_table(),
				$product_data,
				array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%d' )
			);
			if ( false === $inserted ) {
				wp_die(
					esc_html__( 'The product catalog could not be initialized in the database.', 'chanel-showcase' ),
					esc_html__( 'Product catalog unavailable', 'chanel-showcase' ),
					array( 'response' => 500 )
				);
			}
		} else {
			$updated = $wpdb->update(
				chanel_showcase_products_table(),
				array(
					'name'          => $product['name'],
					'description'   => $product['description'],
					'heritage'      => $product['heritage'],
					'craftsmanship' => $product['craftsmanship'],
					'material'      => $product['material'],
					'dimensions'    => $product['dimensions'],
					'hardware'      => $product['hardware'],
					'styling'       => $product['styling'],
					'image_url'     => $product['image_url'],
					'menu_order'    => $product['menu_order'],
				),
				array( 'slug' => $product['slug'] ),
				array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d' ),
				array( '%s' )
			);
			if ( false === $updated ) {
				wp_die(
					esc_html__( 'The product catalog could not be updated in the database.', 'chanel-showcase' ),
					esc_html__( 'Product catalog unavailable', 'chanel-showcase' ),
					array( 'response' => 500 )
				);
			}
		}
	}

	$required_tables = array(
		$table_name,
		chanel_showcase_products_table(),
		chanel_showcase_orders_table(),
		chanel_showcase_order_items_table(),
	);
	foreach ( $required_tables as $required_table ) {
		$table_exists = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $required_table ) ) );
		if ( $required_table !== $table_exists ) {
			wp_die(
				esc_html__( 'The showcase database tables could not be created.', 'chanel-showcase' ),
				esc_html__( 'Showcase database unavailable', 'chanel-showcase' ),
				array( 'response' => 500 )
			);
		}
	}

	update_option( 'chanel_showcase_db_version', CHANEL_SHOWCASE_DB_VERSION );
}
add_action( 'init', 'chanel_showcase_install_leads_table', 1 );

function chanel_showcase_activate_theme_once() {
	if ( get_option( 'chanel_showcase_theme_activated' ) ) {
		return;
	}

	if ( wp_get_theme( 'chanel-showcase' )->exists() ) {
		switch_theme( 'chanel-showcase' );
		update_option( 'chanel_showcase_theme_activated', 1 );
	}
}
add_action( 'after_setup_theme', 'chanel_showcase_activate_theme_once', 20 );

function chanel_showcase_start_cart_session() {
	if ( PHP_SESSION_NONE !== session_status() || headers_sent() ) {
		return;
	}

	session_set_cookie_params(
		array(
			'lifetime' => 0,
			'path'     => COOKIEPATH ? COOKIEPATH : '/',
			'domain'   => COOKIE_DOMAIN,
			'secure'   => is_ssl(),
			'httponly' => true,
			'samesite' => 'Lax',
		)
	);
	session_start();

	if ( ! isset( $_SESSION['chanel_showcase_cart'] ) || ! is_array( $_SESSION['chanel_showcase_cart'] ) ) {
		$_SESSION['chanel_showcase_cart'] = array();
	}
}
add_action( 'init', 'chanel_showcase_start_cart_session', 2 );

function chanel_showcase_products() {
	global $wpdb;

	$products = $wpdb->get_results(
		'SELECT * FROM ' . chanel_showcase_products_table() . ' WHERE is_active = 1 ORDER BY menu_order ASC, id ASC',
		ARRAY_A
	);
	if ( null === $products ) {
		wp_die(
			esc_html__( 'Products could not be loaded. Please try again later.', 'chanel-showcase' ),
			esc_html__( 'Product catalog unavailable', 'chanel-showcase' ),
			array( 'response' => 500 )
		);
	}

	return $products;
}

function chanel_showcase_cart() {
	$cart = isset( $_SESSION['chanel_showcase_cart'] ) && is_array( $_SESSION['chanel_showcase_cart'] )
		? $_SESSION['chanel_showcase_cart']
		: array();
	$products_by_slug = array();
	foreach ( chanel_showcase_products() as $product ) {
		$products_by_slug[ $product['slug'] ] = $product;
	}

	$items = array();
	foreach ( $cart as $slug => $quantity ) {
		if ( ! isset( $products_by_slug[ $slug ] ) || ! is_numeric( $quantity ) ) {
			continue;
		}

		$quantity = (int) $quantity;
		if ( $quantity < 1 || $quantity > 10 ) {
			continue;
		}

		$product       = $products_by_slug[ $slug ];
		$product['quantity'] = $quantity;
		$product['line_total'] = (int) $product['price'] * $quantity;
		$items[]       = $product;
	}

	return $items;
}

function chanel_showcase_cart_count() {
	$count = 0;
	foreach ( chanel_showcase_cart() as $item ) {
		$count += $item['quantity'];
	}

	return $count;
}

function chanel_showcase_money( $amount ) {
	return number_format( (int) $amount, 0, ',', '.' ) . ' ₫';
}

function chanel_showcase_cart_redirect( $status ) {
	wp_safe_redirect( add_query_arg( 'cart', $status, home_url( '/#cart' ) ) );
	exit;
}

function chanel_showcase_handle_cart_submission() {
	if ( ! wp_verify_nonce( chanel_showcase_post_value( 'cart_nonce' ), 'chanel_cart_action' ) ) {
		wp_die( esc_html__( 'Your session expired. Please reload the page and try again.', 'chanel-showcase' ), '', array( 'response' => 403 ) );
	}

	$action_value = sanitize_key( chanel_showcase_post_value( 'cart_action' ) );
	$action       = $action_value;
	$slug          = sanitize_title( chanel_showcase_post_value( 'product_slug' ) );
	if ( 0 === strpos( $action_value, 'remove-' ) ) {
		$action = 'remove';
		$slug   = sanitize_title( substr( $action_value, 7 ) );
	}
	if ( ! isset( $_SESSION['chanel_showcase_cart'] ) || ! is_array( $_SESSION['chanel_showcase_cart'] ) ) {
		$_SESSION['chanel_showcase_cart'] = array();
	}

	if ( 'add' === $action || 'buy' === $action ) {
		global $wpdb;
		$product = $wpdb->get_row(
			$wpdb->prepare(
				'SELECT slug FROM ' . chanel_showcase_products_table() . ' WHERE slug = %s AND is_active = 1',
				$slug
			),
			ARRAY_A
		);
		if ( null === $product ) {
			chanel_showcase_cart_redirect( 'unavailable' );
		}

		$quantity = (int) chanel_showcase_post_value( 'quantity' );
		if ( $quantity < 1 || $quantity > 10 ) {
			chanel_showcase_cart_redirect( 'invalid' );
		}

		if ( 'buy' === $action ) {
			$_SESSION['chanel_showcase_cart'] = array();
		}
		$current_quantity = isset( $_SESSION['chanel_showcase_cart'][ $slug ] )
			? (int) $_SESSION['chanel_showcase_cart'][ $slug ]
			: 0;
		if ( $current_quantity + $quantity > 10 ) {
			chanel_showcase_cart_redirect( 'limit' );
		}

		$_SESSION['chanel_showcase_cart'][ $slug ] = $current_quantity + $quantity;
		if ( 'buy' === $action ) {
			wp_safe_redirect( add_query_arg( 'cart', 'buy', home_url( '/#checkout' ) ) );
			exit;
		}
		chanel_showcase_cart_redirect( 'added' );
	}

	if ( 'remove' === $action ) {
		if ( isset( $_SESSION['chanel_showcase_cart'][ $slug ] ) ) {
			unset( $_SESSION['chanel_showcase_cart'][ $slug ] );
		}
		chanel_showcase_cart_redirect( 'updated' );
	}

	if ( 'clear' === $action ) {
		$_SESSION['chanel_showcase_cart'] = array();
		chanel_showcase_cart_redirect( 'updated' );
	}

	if ( 'update' === $action ) {
		$quantities = isset( $_POST['quantities'] ) && is_array( $_POST['quantities'] )
			? wp_unslash( $_POST['quantities'] )
			: array();
		$updated_cart = array();
		foreach ( $quantities as $item_slug => $quantity ) {
			$item_slug = sanitize_title( $item_slug );
			if ( ! is_string( $quantity ) || ! ctype_digit( $quantity ) ) {
				chanel_showcase_cart_redirect( 'invalid' );
			}
			$quantity = (int) $quantity;
			if ( $quantity < 0 || $quantity > 10 ) {
				chanel_showcase_cart_redirect( 'invalid' );
			}
			if ( 0 === $quantity ) {
				continue;
			}

			$updated_cart[ $item_slug ] = $quantity;
		}
		$_SESSION['chanel_showcase_cart'] = $updated_cart;
		chanel_showcase_cart_redirect( 'updated' );
	}

	chanel_showcase_cart_redirect( 'invalid' );
}
add_action( 'admin_post_nopriv_chanel_showcase_cart', 'chanel_showcase_handle_cart_submission' );
add_action( 'admin_post_chanel_showcase_cart', 'chanel_showcase_handle_cart_submission' );

function chanel_showcase_checkout_error( $message, $response = 400 ) {
	wp_die( esc_html( $message ), esc_html__( 'Order could not be placed', 'chanel-showcase' ), array( 'response' => $response ) );
}

function chanel_showcase_handle_checkout_submission() {
	if ( ! wp_verify_nonce( chanel_showcase_post_value( 'checkout_nonce' ), 'chanel_checkout' ) ) {
		chanel_showcase_checkout_error( __( 'Your session expired. Please reload the page and try again.', 'chanel-showcase' ), 403 );
	}

	$customer_name    = sanitize_text_field( chanel_showcase_post_value( 'customer_name' ) );
	$customer_email   = sanitize_email( chanel_showcase_post_value( 'customer_email' ) );
	$customer_phone   = sanitize_text_field( chanel_showcase_post_value( 'customer_phone' ) );
	$shipping_address = sanitize_textarea_field( chanel_showcase_post_value( 'shipping_address' ) );
	$customer_note    = sanitize_textarea_field( chanel_showcase_post_value( 'customer_note' ) );
	$consent          = '1' === chanel_showcase_post_value( 'order_consent' );

	if (
		'' === $customer_name ||
		! is_email( $customer_email ) ||
		'' === $customer_phone ||
		'' === $shipping_address ||
		! $consent
	) {
		wp_safe_redirect( add_query_arg( 'order', 'invalid', home_url( '/#checkout' ) ) );
		exit;
	}

	$items = chanel_showcase_cart();
	if ( empty( $items ) ) {
		wp_safe_redirect( add_query_arg( 'order', 'empty', home_url( '/#cart' ) ) );
		exit;
	}

	$subtotal = 0;
	foreach ( $items as $item ) {
		$subtotal += $item['line_total'];
	}

	global $wpdb;
	if ( false === $wpdb->query( 'START TRANSACTION' ) ) {
		chanel_showcase_checkout_error( __( 'The database could not start a safe order transaction. Please try again.', 'chanel-showcase' ), 500 );
	}

	$order_inserted = $wpdb->insert(
		chanel_showcase_orders_table(),
		array(
			'order_number'     => 'PENDING-' . substr( str_replace( '-', '', wp_generate_uuid4() ), 0, 20 ),
			'customer_name'    => $customer_name,
			'customer_email'   => $customer_email,
			'customer_phone'   => $customer_phone,
			'shipping_address' => $shipping_address,
			'customer_note'    => $customer_note,
			'status'           => 'pending_confirmation',
			'currency'         => CHANEL_SHOWCASE_CURRENCY,
			'subtotal'         => $subtotal,
			'total'            => $subtotal,
		),
		array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d' )
	);
	if ( false === $order_inserted ) {
		$wpdb->query( 'ROLLBACK' );
		chanel_showcase_checkout_error( __( 'The order could not be saved. Please try again later.', 'chanel-showcase' ), 500 );
	}

	$order_id = (int) $wpdb->insert_id;
	$updated  = $wpdb->update(
		chanel_showcase_orders_table(),
		array( 'order_number' => 'CHN-' . str_pad( (string) $order_id, 8, '0', STR_PAD_LEFT ) ),
		array( 'id' => $order_id ),
		array( '%s' ),
		array( '%d' )
	);
	if ( false === $updated ) {
		$wpdb->query( 'ROLLBACK' );
		chanel_showcase_checkout_error( __( 'The order number could not be assigned. Please try again later.', 'chanel-showcase' ), 500 );
	}

	foreach ( $items as $item ) {
		$item_inserted = $wpdb->insert(
			chanel_showcase_order_items_table(),
			array(
				'order_id'    => $order_id,
				'product_id'  => (int) $item['id'],
				'product_slug' => $item['slug'],
				'product_name' => $item['name'],
				'quantity'    => $item['quantity'],
				'unit_price'  => (int) $item['price'],
				'line_total'  => $item['line_total'],
			),
			array( '%d', '%d', '%s', '%s', '%d', '%d', '%d' )
		);
		if ( false === $item_inserted ) {
			$wpdb->query( 'ROLLBACK' );
			chanel_showcase_checkout_error( __( 'An item could not be saved to the order. No order was placed; please try again.', 'chanel-showcase' ), 500 );
		}
	}

	if ( false === $wpdb->query( 'COMMIT' ) ) {
		$wpdb->query( 'ROLLBACK' );
		chanel_showcase_checkout_error( __( 'The order could not be committed. Please try again later.', 'chanel-showcase' ), 500 );
	}

	$_SESSION['chanel_showcase_cart'] = array();
	wp_safe_redirect(
		add_query_arg(
			array(
				'chanel_order'    => 'success',
				'chanel_order_id' => $order_id,
			),
			home_url( '/#checkout' )
		)
	);
	exit;
}
add_action( 'admin_post_nopriv_chanel_showcase_checkout', 'chanel_showcase_handle_checkout_submission' );
add_action( 'admin_post_chanel_showcase_checkout', 'chanel_showcase_handle_checkout_submission' );

function chanel_showcase_handle_lead_submission() {
	if ( ! wp_verify_nonce( chanel_showcase_post_value( 'chanel_nonce' ), 'chanel_lead_submission' ) ) {
		wp_die( esc_html__( 'Your session expired. Please reload the page and try again.', 'chanel-showcase' ), '', array( 'response' => 403 ) );
	}

	$honeypot = sanitize_text_field( chanel_showcase_post_value( 'company_website' ) );
	if ( '' !== $honeypot ) {
		wp_die( esc_html__( 'The request could not be accepted.', 'chanel-showcase' ), '', array( 'response' => 400 ) );
	}

	$name     = sanitize_text_field( chanel_showcase_post_value( 'name' ) );
	$email    = sanitize_email( chanel_showcase_post_value( 'email' ) );
	$phone    = sanitize_text_field( chanel_showcase_post_value( 'phone' ) );
	$interest = sanitize_key( chanel_showcase_post_value( 'interest' ) );
	$consent  = '1' === chanel_showcase_post_value( 'consent' );

	$allowed_interests = array_merge( array_column( chanel_showcase_products(), 'slug' ), array( 'consultation' ) );
	if ( '' === $name || ! is_email( $email ) || ! in_array( $interest, $allowed_interests, true ) || ! $consent ) {
		wp_safe_redirect( add_query_arg( 'lead', 'invalid', home_url( '/#contact' ) ) );
		exit;
	}

	global $wpdb;
	$inserted = $wpdb->insert(
		chanel_showcase_leads_table(),
		array(
			'name'     => $name,
			'email'    => $email,
			'phone'    => $phone,
			'interest' => $interest,
			'consent'  => 1,
		),
		array( '%s', '%s', '%s', '%s', '%d' )
	);

	if ( false === $inserted ) {
		wp_die(
			esc_html__( 'We could not save your request. Please try again later.', 'chanel-showcase' ),
			esc_html__( 'Request not saved', 'chanel-showcase' ),
			array( 'response' => 500 )
		);
	}

	wp_safe_redirect( add_query_arg( 'lead', 'success', home_url( '/#contact' ) ) );
	exit;
}
add_action( 'admin_post_nopriv_chanel_showcase_lead', 'chanel_showcase_handle_lead_submission' );
add_action( 'admin_post_chanel_showcase_lead', 'chanel_showcase_handle_lead_submission' );
