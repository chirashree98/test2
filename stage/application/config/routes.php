<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'frontend/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
///////////////////////////////    FRONT END     //////////////////////////////
$route['login'] = 'frontend/home/login';
$route['signup'] = 'frontend/home/signup';
$route['reg-form-succ'] = 'frontend/home/reg_form_succ';
$route['client-login-suc'] = 'frontend/home/client_login_suc';
$route['client-dashboard'] = 'frontend/home/client_dashboard';
$route['google-sign-up'] = 'frontend/home/google_sign_up';
$route['facebook-sign-up'] = 'frontend/home/facebook_sign_up';
$route['cli-logout'] = 'frontend/home/cli_logout';
$route['my-profile'] = 'frontend/customer';
//$route['professional-registration2'] = 'frontend/home/professional_registration';
$route['professional-registration'] = 'frontend/home/professional_registration';
$route['professional-registration-succ'] = 'frontend/home/professional_registration_success';
$route['professional-registration-contact'] = 'frontend/home/professional_registration_contact';
$route['professional-registration-contact-succ'] = 'frontend/home/professional_registration_contact_succ';
$route['professional-registration-bank'] = 'frontend/home/professional_registration_bank';
$route['professional-registration-complete'] = 'frontend/home/professional_registration_complete';
$route['professional-login'] = 'frontend/home/professional_login';
$route['professional-login-success'] = 'frontend/home/professional_login_success';
$route['supplier-login']= 'frontend/home/supplier_login';
$route['professional-profile'] = 'frontend/professional_controller';
$route['professional/updateinfo/personal'] = 'frontend/professional_controller/professional_updateinfo_personal';
$route['professional/updateinfo/personal/success'] = 'frontend/professional_controller/professional_updateinfo_personal_success';
$route['professional/updateinfo/about-us'] = 'frontend/professional_controller/professional_updateinfo_about_us';
$route['professional/updateinfo/about-us/success'] = 'frontend/professional_controller/professional_updateinfo_about_us_success';
$route['professional/updateinfo/company-details'] = 'frontend/professional_controller/professional_updateinfo_company_details';
$route['professional/updateinfo/company-details/success'] = 'frontend/professional_controller/professional_updateinfo_company_details_success';
$route['professional/updateinfo/work-info'] = 'frontend/professional_controller/professional_updateinfo_work_info';
$route['professional/updateinfo/work-info/success'] = 'frontend/professional_controller/professional_updateinfo_work_info_success';
$route['delete/professional/project/(:any)/(:any)'] = 'frontend/professional_controller/delete_professional_project/$1/$2';
$route['professional/updateinfo/upload-pictures'] = 'frontend/professional_controller/professional_updateinfo_upload_pictures';
$route['professional/updateinfo/upload-pictures/success'] = 'frontend/professional_controller/professional_updateinfo_upload_pictures_success';
$route['professional/updateinfo/bank-details'] = 'frontend/professional_controller/professional_updateinfo_bank_details';
$route['professional/updateinfo/bank-details/success'] = 'frontend/professional_controller/professional_updateinfo_bank_details_success';
$route['supplier-profile'] = 'frontend/professional_controller/supplier_profile';
$route['supplier/updateinfo/personal'] = 'frontend/professional_controller/supplier_updateinfo_personal';
$route['supplier/updateinfo/personal/success'] = 'frontend/professional_controller/supplier_updateinfo_personal_success';
$route['supplier/updateinfo/about-us'] = 'frontend/professional_controller/supplier_updateinfo_about_us';
$route['supplier/updateinfo/about-us/success'] = 'frontend/professional_controller/supplier_updateinfo_about_us_success';
$route['supplier/updateinfo/company-details'] = 'frontend/professional_controller/supplier_updateinfo_company_details';
$route['supplier/updateinfo/company-details/success'] = 'frontend/professional_controller/supplier_updateinfo_company_details_success';
$route['supplier/updateinfo/work-info'] = 'frontend/professional_controller/supplier_updateinfo_work_info';
$route['supplier/updateinfo/work-info/success'] = 'frontend/professional_controller/supplier_updateinfo_work_info_success';
$route['supplier/updateinfo/upload-pictures'] = 'frontend/professional_controller/supplier_updateinfo_upload_pictures';
$route['supplier/updateinfo/upload-pictures/success'] = 'frontend/professional_controller/supplier_updateinfo_upload_pictures_success';
$route['supplier/updateinfo/bank-details'] = 'frontend/professional_controller/supplier_updateinfo_bank_details';
$route['supplier/updateinfo/bank-details/success'] = 'frontend/professional_controller/supplier_updateinfo_bank_details_success';
$route['professional-mail-verify/(:any)'] = 'frontend/home/professional_mail_verify/$1';
$route['supplier/add-new-product'] = 'frontend/professional_controller/add_new_product';
$route['supplier/add-new-product-succ'] = 'frontend/professional_controller/add_new_product_success';
$route['my-products'] = 'frontend/professional_controller/product_list';
$route['supplier-registration'] = 'frontend/home/supplier_registration';
$route['forget-password'] = 'frontend/home/forget_password';
$route['forget-password-success'] = 'frontend/home/forget_password_success';
$route['forget-password-verify-otp/(:any)'] = 'frontend/home/forget_password_verify_otp/$1';
$route['forget-password-verify-otp-succ'] = 'frontend/home/forget_password_verify_otp_success';
//////////////////////////////    ADMIN PANEL ////////////////////////////////
//$route['smart-admin'] = 'admin/admin_master_con';
$route['admin'] = 'admin/admin_master_con';
$route['smart-login-success'] = 'admin/admin_master_con/smart_login_success';
$route['admin/dashboard'] = 'admin/admin_master_con/smart_dashboard';
$route['smart-dashboard'] = 'admin/admin_master_con/smart_dashboard';
$route['logout'] = 'admin/admin_master_con/logout';
         /////////////   User Management //////////////
$route['admin/user-list'] = 'admin/user_management';
$route['admin/user/user-type'] = 'admin/user_management/user_type';
$route['admin/add-new-user'] = 'admin/user_management/add_user';
$route['admin/user/edit-user/(:any)'] = 'admin/user_management/edit_user/$1';
$route['admin/user/edit-user-success'] = 'admin/user_management/edit_user_success';
$route['admin/user/professional-list'] = 'admin/user_management/professional_list';
$route['admin/user/add-new-professional'] = 'admin/user_management/add_new_professional';
$route['admin/user/add-new-professional-succ'] = 'admin/user_management/add_new_professional_succ';
$route['admin/user/supplier-list'] = 'admin/user_management/supplier_list';
$route['admin/user/change-customer-status/(:any)/(:any)'] = 'admin/user_management/change_customer_status/$1/$2';
$route['admin/user/delete-user/(:any)/(:any)'] = 'admin/user_management/delete_user/$1/$2';
$route['admin/user/update-professional/(:any)/(:any)'] = 'admin/user_management/update_professional/$1/$2';
$route['admin/user/update-new-professional-succ'] = 'admin/user_management/update_new_professional_success';
$route['admin/delete/professional/project/(:any)/(:any)/(:any)'] = 'admin/user_management/delete_professional_project/$1/$2/$3';

        ///////////////  CMS Management ////////////////////
$route['admin/city-list'] = 'admin/cms_management';
$route['admin/add-new-city'] = 'admin/cms_management/add_new_city';
$route['add-new-city-succ'] = 'admin/cms_management/add_new_city_success';
$route['admin/edit-city/(:any)'] = 'admin/cms_management/edit_city/$1';
$route['admin/edit-new-city-succ'] = 'admin/cms_management/edit_new_city_succ';
$route['admin/cms/home-banner'] = 'admin/cms_management/home_banner_view';
$route['admin/cms/update-home-banner'] = 'admin/cms_management/update_home_banner';
$route['admin/cms/why-benasmart'] = 'admin/cms_management/why_benasmart';
$route['admin/edit-why-ch-benasmart/(:any)'] = 'admin/cms_management/edit_why_ch_benasmart/$1';
$route['admin/cms/update-why-benasmart-succ'] = 'admin/cms_management/update_why_benasmart_succ';
$route['admin/cms/daily-deals-list'] = 'admin/cms_management/daily_deals_list';
$route['admin/add-new-deals'] = 'admin/cms_management/add_new_deals';
$route['add-new-deals-succ'] = 'admin/cms_management/add_new_deals_succ';
$route['admin/cms/change-deal-status/(:any)'] = 'admin/cms_management/change_deal_status/$1';
$route['admin/cms/home-logo-list'] = 'admin/cms_management/home_logo_list';
$route['admin/add-new-logo'] = 'admin/cms_management/add_new_logo';
$route['admin/add-new-logo-succ'] = 'admin/cms_management/add_new_logo_succ';
$route['admin/cms/change-logo-status/(:any)'] = 'admin/cms_management/change_logo_status/$1';
$route['admin/address/country-list'] = 'admin/cms_management/country_list';
$route['admin/address/add-new-country'] = 'admin/cms_management/add_new_country';
$route['add-new-country-succ'] = 'admin/cms_management/add_new_country_succ';
$route['admin/address/edit-country/(:any)'] = 'admin/cms_management/edit_country/$1';
$route['admin/address/edit-new-country-succ'] = 'admin/cms_management/edit_new_country_succ';
$route['admin/address/edit-country-status/(:any)'] = 'admin/cms_management/edit_country_status/$1';
$route['admin/cms/services-list'] = 'admin/cms_management/services_list';
$route['admin/cms/add-new-service'] = 'admin/cms_management/add_new_service';
$route['admin/cms/add-new-service-succ'] = 'admin/cms_management/add_new_service_succ';
$route['admin/cms/edit-service/(:any)'] = 'admin/cms_management/edit_service/$1';
$route['admin/cms/edit-new-service-succ'] = 'admin/cms_management/edit_new_service_succ';
$route['admin/address/state-list'] = 'admin/cms_management/state_list';
$route['admin/address/add-new-state'] = 'admin/cms_management/add_new_state';
$route['admin/address/add-new-state-succ'] = 'admin/cms_management/add_new_state_succ';
$route['admin/address/edit-state/(:any)'] = 'admin/cms_management/edit_state/$1';
$route['admin/address/edit-new-state-succ'] = 'admin/cms_management/edit_new_state_succ';
$route['admin/address/change-state-status/(:any)'] = 'admin/cms_management/change_state_status/$1';
$route['admin/address/edit-city-status/(:any)'] = 'admin/cms_management/edit_city_status/$1';
$route['admin/cms/expired-check'] = 'admin/cms_management/expired_check';
$route['admin/cms/category-list/(:any)'] = 'admin/cms_management/cms_category_list/$1';
$route['admin/cms/add-new-category/(:any)'] = 'admin/cms_management/add_new_category/$1';
//$route['admin/cms/add-new-category/success1'] = 'admin/cms_management/add_new_category_success1';
$route['admin/cms/edit-category-status/(:any)/(:any)'] = 'admin/cms_management/edit_category_status/$1/$2';
$route['admin/cms/edit-category/(:any)/(:any)'] = 'admin/cms_management/edit_category/$1/$2';
$route['admin/cms/edit-category1/success'] = 'admin/cms_management/edit_category_success1';
$route['admin-cms-add-new-category-success1'] = 'admin/cms_management/add_new_category_success1';
$route['admin/cms/sub-category/(:any)'] = 'admin/cms_management/sub_category/$1';
$route['admin/cms/add-new-sub-category/(:any)'] = 'admin/cms_management/add_new_sub_category/$1';
$route['admin-cms-add-sub-category-succ'] = 'admin/cms_management/admin_cms_add_sub_category_succ';
$route['admin/cms/edit-subcat-status/(:any)'] = 'admin/cms_management/edit_subcat_status/$1';
$route['admin/cms/edit-sub-category/(:any)'] = 'admin/cms_management/edit_sub_category/$1';
$route['admin-cms-update-sub-category-succ'] = 'admin/cms_management/update_sub_category_succ';
$route['admin/cms/attribute-list'] = 'admin/cms_management/attribute_list';
$route['admin/cms/add-new-attribute'] = 'admin/cms_management/add_new_attribute';
$route['admin-cms-add-new-attribute-success'] = 'admin/cms_management/add_new_attribute_success';
$route['admin/cms/edit-attribute-status/(:any)'] = 'admin/cms_management/edit_attribute_status/$1';
$route['admin/cms/edit-attribute/(:any)'] = 'admin/cms_management/edit_attribute/$1';
$route['admin-cms-update-attribute-success'] = 'admin/cms_management/admin_cms_update_attribute_success';
$route['admin/cms/child-attribute-list/(:any)'] = 'admin/cms_management/child_attribute_list/$1';
$route['admin/cms/add-child-attribute/(:any)'] = 'admin/cms_management/add_child_attribute/$1';
$route['admin-cms-add-child-attribute-success'] = 'admin/cms_management/add_child_attribute_success';
$route['admin/cms/edit-child-attribute-status/(:any)'] = 'admin/cms_management/edit_child_attribute_status/$1';
$route['admin/cms/edit-child-attribute/(:any)'] = 'admin/cms_management/edit_child_attribute/$1';
$route['admin-cms-edit-child-attribute-success'] = 'admin/cms_management/edit_child_attribute_success';
$route['admin/cms/brand-list'] = 'admin/cms_management/brand_list';
$route['admin/cms/add-new-brand'] = 'admin/cms_management/add_new_brand';
$route['admin/cms/add-new-brand-suc'] = 'admin/cms_management/add_new_brand_success';
$route['admin/cms/edit-brand-status/(:any)'] = 'admin/cms_management/edit_brand_status/$1';
$route['admin/cms/edit-brand/(:any)'] = 'admin/cms_management/edit_brand/$1';
$route['admin/cms/add-update-brand-suc'] = 'admin/cms_management/add_update_brand_success';

$route['user-list'] = 'admin/admin_user_con';
$route['add-new-user'] = 'admin/admin_user_con/add_new_user';
$route['add-user-success'] = 'admin/admin_user_con/add_user_success';
////////////////////////////  PRODUCT ADMIN MANAGEMENT START  ////////////////////////
$route['admin/product/product-list'] = 'admin/product_management';
$route['admin/product/add-product'] = 'admin/product_management/add_product';
$route['admin/product/add-new-product-succ'] = 'admin/product_management/add_new_product_succ';
$route['admin/cms/edit-product-status/(:any)'] = 'admin/product_management/edit_product_status/$1';
////////////////////////////  PRODUCT ADMIN MANAGEMENT END  //////////////////////////

//////////////////////////// AJAX ROUTES START /////////////////////////////////
$route['ajax-get-state-using-country'] = 'admin/admin_ajax_con';
$route['ajax-get-state-using-country-front'] = 'admin/admin_ajax_con/ajax_get_state_using_country_front';
$route['ajax-get-city-using-state-front'] = 'admin/admin_ajax_con/ajax_get_city_using_state_front';
$route['ajax-get-state-using-country-admin'] = 'admin/admin_ajax_con/ajax_get_state_using_country_admin';
$route['ajax-get-city-using-state-admin'] = 'admin/admin_ajax_con/ajax_get_city_using_state_admin';
$route['ajax-get-work-field-using-usertype'] = 'admin/admin_ajax_con/ajax_get_work_field_using_usertype';
$route['ajax-get-work-field-using-usertype-admin'] = 'admin/admin_ajax_con/ajax_get_work_field_using_usertype_admin';
$route['ajax-get-sub-category'] = 'admin/admin_ajax_con/ajax_get_sub_category';
$route['ajax-get-child-attribute'] = 'admin/admin_ajax_con/ajax_get_child_attribute';
$route['ajax-get-skill'] = 'admin/admin_ajax_con/ajax_get_skill';
$route['ajax-make-all-notification-old'] = 'admin/admin_ajax_con/ajax_make_all_notification_old';
//////////////////////////// AJAX ROUTES END ///////////////////////////////////

///////////////////////////    WEBSERVICE ROUTES START /////////////////////////
$route['app-user-normal-registration'] = 'webservices/Web_master';
$route['app-user-login'] = 'webservices/Web_master/login';
$route['forget-otp-generation'] = 'webservices/web_master/forget_otp_generation';
$route['forget-verify-otp'] = 'webservices/web_master/forget_verify_otp';
///////////////////////////    WEBSERVICE ROUTES END //////////////////////////


$route['cart'] = 'frontend/product/cart';