<?php
/*
Plugin Name: Bookings Plus [Restricted Version]
Plugin URI: http://bookings-plus.com
Description: The Bookings Plus is an Advanced Booking Calendar Plugin that will enable Wordpress running sites to manage all their business bookings/appointments from one place.
Author: Bookings Plus
Version: 1.0.3
Author URI: http://bookings-plus.com
Copyright 2013 Bookings-Plus.com (email : info@bookings-plus.com)
*/
function createDatabaseHook()
{
	include_once 'installPlugin.php';
	bookingPlusSystemInstall();
}
function deleteDatabaseHook()
{
 	global $wpdb;
	$sql = "DROP TABLE " .servicesTable();
    $wpdb->query($sql);
	
	$sql = "DROP TABLE " .employeesTable();
    $wpdb->query($sql);
	
	$sql = "DROP TABLE " .services_AllocationTable();
    $wpdb->query($sql);
	
	$sql = "DROP TABLE " .customersTable();
    $wpdb->query($sql);
	
	$sql = "DROP TABLE " .bookingTable();
    $wpdb->query($sql);
	
	$sql = "DROP TABLE " .social_Media_settingsTable();
    $wpdb->query($sql);
	
	$sql = "DROP TABLE " .payment_Gateway_settingsTable();
    $wpdb->query($sql);
	
	$sql = "DROP TABLE " .auto_Responders_settingsTable();
    $wpdb->query($sql);
	
	$sql = "DROP TABLE " .generalSettingsTable();
    $wpdb->query($sql);
	
	$sql = "DROP TABLE " .services_AllocationTable();
    $wpdb->query($sql);
	
	$sql = "DROP TABLE " .employees_TimingsTable();
    $wpdb->query($sql);
	
	$sql = "DROP TABLE " .currenciesTable();
    $wpdb->query($sql);
	
	$sql = "DROP TABLE " .countriesTable();
    $wpdb->query($sql);
	
	$sql = "DROP TABLE " .bookingFormTable();
    $wpdb->query($sql);
	
	$sql = "DROP TABLE " .email_templatesTable();
    $wpdb->query($sql);
}
function servicesTable()
{
	global $wpdb;
	return $wpdb->prefix . 'bp_Services';
}
function employeesTable()
{
	global $wpdb;
	return $wpdb->prefix . 'bp_Employees_Details';
}
function services_AllocationTable()
{
	global $wpdb;
	return $wpdb->prefix . 'bp_Services_Allocation';
}
function employees_TimingsTable()
{
	global $wpdb;
	return $wpdb->prefix . 'bp_Employees_Timings';
}
function customersTable()
{
	global $wpdb;
	return $wpdb->prefix . 'bp_Customers';
}
function currenciesTable()
{
	global $wpdb;
	return $wpdb->prefix . 'bp_Currencies';
}
function countriesTable()
{
	global $wpdb;
	return $wpdb->prefix . 'bp_Countries';
}
function email_templatesTable()
{
	global $wpdb;
	return $wpdb->prefix . 'bp_email_templates';
}
function social_Media_settingsTable()
{
	global $wpdb;
	return $wpdb->prefix . 'bp_social_media_Settings';
}
function payment_Gateway_settingsTable()
{
	global $wpdb;
	return $wpdb->prefix . 'bp_payment_gateway_Settings';
}
function auto_Responders_settingsTable()
{
	global $wpdb;
	return $wpdb->prefix . 'bp_auto_responders_settings';
}
function generalSettingsTable()
{
	global $wpdb;
	return $wpdb->prefix . 'bp_general_settings';
}
function bookingTable()
{
	global $wpdb;
	return $wpdb->prefix . 'bp_booking';
}
function bookingFormTable()
{
	global $wpdb;
	return $wpdb->prefix . 'bp_booking_form';
}
function createPluginMenus()
{
	$icon_path = get_option('siteurl') . '/wp-content/plugins/' . basename(dirname(__FILE__));
	add_menu_page('Bookings Plus', 'Bookings Plus', 'manage_options', 'baseFunction', 'baseFunction', $icon_path . '/icon.png');
	$manageBookings = add_submenu_page('Bookings Plus', 'Bookings Plus','', 'manage_options', 'manageBookings', 'manageBookings');
	$manageStaffMembers = add_submenu_page('Bookings Plus', 'Bookings Plus','', 'manage_options', 'manageResources', 'manageResources');
	$manageServices = add_submenu_page('Bookings Plus', 'Bookings Plus','', 'manage_options', 'manageServices', 'manageServices');
	$manageClients = add_submenu_page('Bookings Plus', 'Bookings Plus','', 'manage_options', 'manageClients', 'manageClients');
	$manageBookingForm = add_submenu_page('Bookings Plus', 'Bookings Plus','', 'manage_options', 'manageBookingForm', 'manageBookingForm');
	$manageEmailTemplate = add_submenu_page('Bookings Plus', 'Bookings Plus','', 'manage_options', 'manageEmailTemplate', 'manageEmailTemplate');
	$manageSettings = add_submenu_page('Bookings Plus', 'Bookings Plus','', 'manage_options', 'manageSettings', 'manageSettings');
	$manageReportBug = add_submenu_page('Bookings Plus', 'Bookings Plus','', 'manage_options', 'manageReportBug', 'manageReportBug');
	$manageAffiliates = add_submenu_page('Bookings Plus', 'Bookings Plus','', 'manage_options', 'manageAffiliates', 'manageAffiliates');
}
function enqueue_css_func() 
{
    wp_enqueue_style('main', plugins_url('/css/main.css', __FILE__));	
}
function global_enqueue_js_func()
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-draggable');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('bootstrap.min.js', plugins_url('/js/plugins/bootstrap/bootstrap.min.js',__FILE__));
 	wp_enqueue_script('bootstrap-bootbox.min.js', plugins_url('/js/plugins/bootstrap/bootstrap-bootbox.min.js',__FILE__));
 	wp_enqueue_script('jquery.validate.js', plugins_url('/js/plugins/forms/jquery.validate.js',__FILE__));
	wp_enqueue_script('bootstrap-colorpicker.js', plugins_url('/js/plugins/bootstrap/bootstrap-colorpicker.js',__FILE__));
	wp_enqueue_script('jquery.dataTables.min.js', plugins_url('/js/plugins/tables/jquery.dataTables.min.js',__FILE__));
	wp_enqueue_script('excanvas.min.js', plugins_url('/js/plugins/charts/excanvas.min.js',__FILE__));
	wp_enqueue_script('jquery.flot.js', plugins_url('/js/plugins/charts/jquery.flot.js',__FILE__));
	wp_enqueue_script('jquery.flot.orderBars.js', plugins_url('/js/plugins/charts/jquery.flot.orderBars.js',__FILE__));
}
function getAjaxExecuted()
{
	global $wpdb;
	include_once 'functions.php'; 
}
function baseFunction()
{
	include_once 'header.php';
	include_once 'menus.php';
	include_once 'dashboard.php';
}
function manageBookings()
{
	include_once 'header.php';
	include_once 'menus.php';
	include_once 'manageBookings.php';
}
function manageResources()
{
	include_once 'header.php';
	include_once 'menus.php';
	include_once 'manageResources.php';
}
function manageServices()
{
	include_once 'header.php';
	include_once 'menus.php';
	include_once 'manageServices.php';
}
function manageClients()
{
	include_once 'header.php';
	include_once 'menus.php';
	include_once 'manageClients.php';
}
function manageAffiliates()
{
	include_once 'header.php';
	include_once 'menus.php';
	include_once 'manageAffiliates.php';
}
function manageReportBug()
{
	include_once 'header.php';
	include_once 'menus.php';
	include_once 'manageReportBug.php';
}
function manageBookingForm()
{
	include_once 'header.php';
	include_once 'menus.php';
	include_once 'manageBookingForm.php';
}
function manageEmailTemplate()
{
	include_once 'header.php';
	include_once 'menus.php';
	include_once 'manageEmailTemplate.php';
}
add_action('admin_menu','createPluginMenus');
add_action('admin_init','enqueue_css_func');
add_action('init','global_enqueue_js_func');
add_action('admin_init','getAjaxExecuted');
register_activation_hook(__FILE__,'createDatabaseHook');
register_uninstall_hook(__FILE__,'deleteDatabaseHook');
?>