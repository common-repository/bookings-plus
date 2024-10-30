<div class="sidebar" id="left-sidebar">
	<ul class="navigation standard">
		
    	<li id="Dashboard">
        	<a href="admin.php?page=baseFunction" title="">
        		<span class="menu-dashboard"></span>
        		<?php _e( "Dashboard", bookings_plus ); ?>
        	</a>
        </li>
        <li id="Bookings">
        	<a href="admin.php?page=manageBookings" title="">
        		<span class="menu-calendar"></span>
        		<?php _e( "Bookings", bookings_plus ); ?>
        		<strong id="uxBookingsCount"></strong>
        	</a>
    	</li>
        <li id="Employees">
        	<a href="admin.php?page=manageResources" title="">
        		<span class="menu-tables"></span>
        		<?php _e( "Resources", bookings_plus ); ?>
        		<strong id="uxEmployeesCount"></strong>
        	</a>
        </li>
        <li id="Services">
        	<a href="admin.php?page=manageServices" title="">
        		<span class="menu-files"></span>
        		<?php _e( "Services", bookings_plus ); ?>
        		<strong id="uxServiceCount"></strong>
        	</a>
        </li>
        <li id="Customers">
        	<a href="admin.php?page=manageClients" title="">
				<span class="menu-typo"></span>
        		<?php _e( "Clients", bookings_plus ); ?><strong id="uxCustomersCount"></strong>
        	</a>
        </li>
        <li id="BookingForm">
        	<a href="admin.php?page=manageBookingForm" title="">
        		<span class="menu-layouts"></span>
        		
        		<?php _e( "Form Setup", bookings_plus ); ?>
        	</a>
        </li>
        <li id="EmailTemplate">
        	<a href="admin.php?page=manageEmailTemplate" title="">
        		<span class="menu-messages"></span>
        		<?php _e( "Email Templates", bookings_plus ); ?>
        	</a>
        </li> 
		<li id="ReportBug">
        	<a href="admin.php?page=manageReportBug" title="">
        		<span class="menu-errors"></span>
        		<?php _e( "Report a Bug", bookings_plus ); ?>
        	</a>
        </li> 
		<li id="Affiliates">
        	<a href="admin.php?page=manageAffiliates" title="">
        		<span class="menu-charts"></span>
        		<?php _e( "Become an Affiliate", bookings_plus ); ?>
        	</a>
        </li>
    </ul>  
</div>
	
<script type="text/javascript">

	jQuery.ajax
	({
		type: "POST",
		data: "target=getServiceCount&action=getAjaxExecuted",
		url:  ajaxurl,
		success: function(data) 
		{
			jQuery("#uxServiceCount").html(data);
			jQuery("#uxDashboardServiceCount").html(data);									
		}
	});
	jQuery.ajax
	({
		type: "POST",
		data: "target=getEmployeeCount&action=getAjaxExecuted",
		url:  ajaxurl,
		success: function(data) 
		{
			jQuery("#uxEmployeesCount").html(data);
			jQuery("#uxDashboardEmployeesCount").html(data);														
		}
	});
	jQuery.ajax
	({
		type: "POST",
		data: "target=getCustomerCount&action=getAjaxExecuted",
		url:  ajaxurl,
		success: function(data) 
		{
			
			jQuery("#uxCustomersCount").html(data);
			jQuery("#uxDashboardCustomersCount").html(data);									
		}
	});
	jQuery.ajax
	({
		type: "POST",
		data: "target=getBookingCount&action=getAjaxExecuted",
		url:  ajaxurl,
		success: function(data) 
		{
			
			jQuery("#uxBookingsCount").html(data);
			jQuery("#uxDashboardBookingsCount").html(data);
									
		}
	});
</script>