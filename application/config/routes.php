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
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Logout'] = 'Login/user_logout';

$route['Accounting'] = 'Accounting';
$route['Bank-Account'] = 'bank_account';
$route['Bank-Account-List'] = 'bank_account/list';
$route['Sub-Account/(:num)']='bank_sub_account/sub_account/$1';
$route['Sub-Account-List/(:num)']='bank_sub_account/sub_account_list/$1';
$route['Follow-Account/(:num)']='Follow_account/Follow_account/$1';

$route['Plan-Payment-Report'] = 'bank_account/report';
$route['Print-Plan-Payment-Report'] = 'bank_account/print_report';
$route['Plan-Payment-Report-By-Sub']='bank_sub_account/report';

$route['Vendor-invoice'] = 'vendor_invoice';
$route['Create-invoice-Vendor/(:num)'] = 'vendor_invoice/create_by_vendor/$1';
$route['Print-invoice-Vendor/(:num)'] = 'vendor_invoice/print_invoice/$1';
$route['Report-Vendor-Invoice'] = 'vendor_invoice/report';
$route['Print-Report-Vendor-Invoice'] = 'vendor_invoice/print_report';
$route['Report-Vendor-Invoice-Report-By-Vendor-Id'] = 'vendor_invoice/report_by_vendor';
$route['Print-Report-By-Vendor-Id'] = 'vendor_invoice/print_report_by_vendor_id';

$route['Code-accounting'] = 'code_accounting';
$route['Payment-Type'] = 'Payment_Type';
$route['Sub-Code'] = 'Sub_code'; 
$route['Deposit-Accounts'] = 'Deposit_accounts'; 
$route['Book-Accounting'] = 'Book_accounting';
$route['Money-Type'] = 'Money_type';
$route['Money-Go'] = 'money_go';

$route['Finance-IN'] = 'Finance_in';
$route['Create-Finance-IN'] = 'Finance_in/create_by_Finance_in';
$route['Edit-Finance-IN/(:num)'] = 'Finance_in/edit_by_Finance_in/$1';
$route['Print-invoice-Finance-IN/(:num)'] = 'Finance_in/print_invoice/$1';
$route['Report-Finance-IN'] = 'Finance_in/report';
$route['Print-Report-Finance-IN'] = 'Finance_in/print_report';

$route['Finance-Out'] = 'Finance_out';
$route['Create-Finance-Out'] = 'Finance_out/create_by_Finance_out';
$route['Edit-Finance-Out/(:num)'] = 'Finance_out/edit_by_Finance_out/$1';
$route['Print-invoice-Finance-Out/(:num)'] = 'Finance_out/print_invoice/$1';
$route['Report-Finance-Out'] = 'Finance_out/report';
$route['Print-Report-Finance-Out'] = 'Finance_out/print_report';




$route['Create-Voucher'] = 'Voucher/create_by_Voucher';
$route['Print-Voucher/(:num)'] = 'Voucher/print_invoice/$1';
$route['Report-Voucher'] = 'Voucher/report';
$route['Print-Report-Voucher'] = 'Voucher/print_report';


// $route['api/userlist'] = 'User/add';
