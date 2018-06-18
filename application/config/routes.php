<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['404_override'] = '';
//$route['auth'] = 'users/auth';
//$route['auth/(.*)'] = 'users/auth/$1';

// public Routes

$route['default_controller'] = 'home/home';
$route['vi'] = "home/home";
$route['en'] = "home/home";

$route['en/collection'] 	   	  = 'home/collection/index';
$route['en/collection/(:any)']= 'home/collection/index/$1';

$route['vi/bo-suu-tap'] 	  = 'home/collection/index';
$route['vi/bo-suu-tap(:any)'] = 'home/collection/index/$1';

$route['en/shop'] 		= 'home/shop/index';

$route['vi/san-pham'] 	= 'home/shop/index';

$route['vi/gio-hang']  	= 'home/cart/get_carts';
$route['en/cart'] 		= 'home/cart/get_carts';

$route['vi/thanh-toan'] = 'home/checkout/index';
$route['en/checkout'] 	= 'home/checkout/index';

$route['vi/dang-nhap']  = 'home/login/index';
$route['en/login'] 	    = 'home/login/index';

$route['vi/dang-ky']    = 'home/register/index';
$route['en/register']   = 'home/register/index';

$route['vi/gioi-thieu'] = 'home/home/about';
$route['en/about-us']   = 'home/home/about';

$route['vi/team/([a-zA-Z0-9-_]+)'] 	 = 'home/home/persons/$1';
$route['en/team/([a-zA-Z0-9-_]+)']   = 'home/home/persons/$1';

$route['setup'] = 'home/setup/index';
//$route['post'] = 'posts/post';
//$route['dashboard'] = 'dashboard/index';
$route['admin'] 		 = 'admin/dashboard';
$route['account/forgot'] = 'account/auth/forgot';

$route['vi/tai-khoan']	 = 'home/account/index';
$route['en/account']	 = 'home/account/index';
$route['vi/your-orders'] = 'home/account/orders';
$route['en/your-orders'] = 'home/account/orders';

$route['vi/lien-he'] 	= 'home/page/contact';
$route['en/contact'] 	= 'home/page/contact';

$route['en/account/register'] = 'home/account/register';
$route['vi/account/register'] = 'home/account/register';
$route['en/account/finish']	  = 'home/account/finish';
$route['vi/account/finish']	  = 'home/account/finish';


// ADMIN ROUTE

$route['admin/pages'] 				= 'admin/pages/index';
$route['admin/pages/'] 				= 'admin/pages/index/0';
$route['admin/pages/(:num)'] 		= 'admin/pages/index/$1';


$route['admin/slide'] 				= 'admin/slide/index';
$route['admin/slide/'] 				= 'admin/slide/index/0';
$route['admin/slide/(:num)'] 		= 'admin/slide/index/$1';

$route['posts/controlpanel'] 		= 'posts/controlpanel/index';
$route['posts/controlpanel/']  		= 'posts/controlpanel/index/0';
$route['posts/controlpanel/(:num)'] = 'posts/controlpanel/index/$1';

$route['admin/orders'] 				= 'admin/orders/index';
$route['admin/orders/']  			= 'admin/orders/index/0';
$route['admin/orders/(:num)'] 		= 'admin/orders/index/$1';

$route['member/controlpanel'] 		= 'member/controlpanel/index';
$route['member/controlpanel']  		= 'member/controlpanel/index/0';
$route['member/controlpanel'] 		= 'member/controlpanel/index/$1';


///////////////// -----------DOWNLOAD----------- ///////////////////////member/controlpanel
 

$route['vi/([a-zA-Z0-9-_]+)-c(:num)'] 			= 'home/category/index/$1/$2';
$route['vi/([a-zA-Z0-9-_]+)-c(:num)/'] 			= 'home/category/index/$1/$2/0';
$route['vi/([a-zA-Z0-9-_]+)-c(:num)/(:num)'] 	= 'home/category/index/$1/$2/$3';

$route['en/([a-zA-Z0-9-_]+)-c(:num)'] 			= 'home/category/index/$1/$2';
$route['en/([a-zA-Z0-9-_]+)-c(:num)/'] 			= 'home/category/index/$1/$2/0';
$route['en/([a-zA-Z0-9-_]+)-c(:num)/(:num)'] 	= 'home/category/index/$1/$2/$3';


$route['vi/([a-zA-Z0-9-_]+)-a(:num)'] = 'home/post/detail/$1/$2';
$route['en/([a-zA-Z0-9-_]+)-a(:num)'] = 'home/post/detail/$1/$2'; 

$route['vi/([a-zA-Z0-9-_]+)-s(:num)'] = 'home/shop/detail/$1/$2';
$route['en/([a-zA-Z0-9-_]+)-s(:num)'] = 'home/shop/detail/$1/$2'; 


$route['vi/([a-zA-Z0-9-_]+)-n(:num)'] = 'post/post/index/$1/$2';
$route['en/([a-zA-Z0-9-_]+)-n(:num)'] = 'post/post/index/$1/$2'; 

$route['en/checkout']	= 'home/cart/checkout';
$route['vi/thanh-toan']	= 'home/cart/checkout';

$route['en/thank-you']		= 'home/cart/thanks';
$route['vi/thank-you']		= 'home/cart/thanks';

$route['en/forgot']			= 'home/account/forgot';
$route['vi/forgot']			= 'home/account/forgot';

$route['en/account/access']			= 'home/account/access';
$route['vi/tai-khoan/truy-cap']		= 'home/account/access';

$route['en/account/invoices']		= 'home/account/orders';
$route['vi/tai-khoan/lich-su-thanh-toan']= 'home/account/orders';

//http://visa.hoataytuu.vn/en/a/Iv0i8g2e

$route['sitemap\.xml'] = 'home/home/sitemap';
/* End of file routes.php */
/* Location: ./application/config/routes.php */