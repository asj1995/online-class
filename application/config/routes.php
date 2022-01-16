<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Admin_Login_Controller';

//Admin Login and Registrion and forget password
    //login
    $route['Login_Submit'] = 'Admin_Login_Controller/Login_Submit';

    //Registration
    $route['Registration'] = 'admin/Registration_controller/RegistrationPageView';
    $route['Add_Registration_Data'] = 'admin/Registration_controller/Add_Registration_Data';

//Dashboard
$route['Dashboard'] = 'admin/dashboard/dashboard/dashboard_view';






$route['404_override'] = 'Admin_Login_Controller/page404';
$route['translate_uri_dashes'] = FALSE;
