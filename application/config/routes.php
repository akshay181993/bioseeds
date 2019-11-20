<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Admin Routes Start here
$route['default_controller'] = 'AdminController/adminlogin';
$route['login'] = "AdminController/adminlogin";
$route['chklogin'] = "AdminController/chklogin";
$route['dashboard'] = "AdminController";
$route['change_password'] = "AdminController/change_password";
$route['update_password'] = "AdminController/reset_password";
$route['profile'] = "AdminController/profile";
$route['update_profile'] = "AdminController/Update_Profile";
$route['enquiry_list'] = "AdminController/enquiry_list";
$route['all_users'] = "AdminController/users_list";
$route['new_enquiry']	=	"AdminController/new_enquiry";
$route['enquiry_status'] = "AdminController/Change_status_enquiry";
$route['forgot_password'] = "AdminController/Forgot_Password";
$route['resetpassword'] = "AdminController/SaveResetPassword";
$route['logout'] = "AdminController/logout";
//end here admin

// Dealers start here
$route['add'] = "dealer/DealersController/add_dealer";
$route['save_dealers'] = "dealer/DealersController/SaveDealers";
$route['edit_dealer/(:num)'] = "dealer/DealersController/edit_dealer";
$route['update_dealers'] = "dealer/DealersController/update_dealer";
// end here dealers

// start category routes
$route['categories'] = "category/CategoriesController";
$route['add_category'] = "category/CategoriesController/add_category";
$route['show_category/(:num)'] = "category/CategoriesController/show_category";
$route['update_category'] = "category/CategoriesController/update_category";
//end here

//start product routes here
$route['product_details'] = "product/ProductController";
$route['add_product'] = 	"product/ProductController/add_product";
$route['store_product'] = "product/ProductController/StoreProduct";
$route['edit_product/(:num)'] = "product/ProductController/edit_product";
$route['update_product'] = "product/ProductController/update_product";
$route['add_variety'] = "product/ProductController/add_variety";
$route['store_variety'] = "product/ProductController/store_variety";
$route['product_varieties'] = "product/ProductController/show_varieties";
$route['edit_variety/(:num)'] = "product/ProductController/edit_variety";
$route['update_variety'] = "product/ProductController/update_variety";


//end here product

// success stories start here
$route['success_stories'] = "stories/SuccessstoriesController";
$route['add_story'] = "stories/SuccessstoriesController/add_story";
$route['save_story'] = "stories/SuccessstoriesController/save_stories";
$route['edit_story/(:num)'] = "stories/SuccessstoriesController/edit_story";
$route['update_story'] = "stories/SuccessstoriesController/update_story";

// end here 

// News routes start here
$route['all_news_list'] = "news/NewsController";
$route['add_news'] = "news/NewsController/add_news";
$route['store_news'] = 'news/NewsController/store_news';
$route['edit_news/(:num)'] = "news/NewsController/edit_news";
$route['update_news'] = "news/NewsController/update_news";

// end here

// common routes
$route['image_upload'] = 'CommonController/do_upload';
$route['all_delete/(:num)/(:any)'] = 'CommonController/AllDelete';
$route['all_status/(:num)/(:any)'] = "CommonController/ChangeAllStatus";
$route['add_tech_support'] = "CommonController/show_techsupport";
$route['edit_tech_support/(:num)'] = "CommonController/edit_techsupport";
$route['tech_support'] = "CommonController/All_TechSupport";
$route['save_numbers']	=	"CommonController/SaveNumbers";
$route['update_numbers']	=	"CommonController/UpdateNumbers";
// end here


// All Rest Api Routes
$route['user-register'] 	= 	'ApiController/user_registration';
$route['update-profile'] 	= 	'ApiController/update_profile';
$route['user-login'] 		= 	'ApiController/user_login';
$route['user-logout'] 		= 	'ApiController/user_logout';
$route['enquiry'] 			= 	'ApiController/enquiry';
$route['ask-questions'] 	= 	'ApiController/ask_questions';
$route['success-stories'] 	= 	'ApiController/success_stories';
$route['news-api'] 			= 	'ApiController/news';
$route['all-categories'] 	= 	'ApiController/categories';
$route['all-products'] 		= 	'ApiController/products';
$route['products-variety'] 	= 	'ApiController/products_varieties';
$route['search']			=	'ApiController/product_search';
$route['technical-support']	=	'ApiController/technical_support';