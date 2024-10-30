<?php
global $wpdb;
if (!current_user_can('edit_posts') && ! current_user_can('edit_pages') )
{
 return;
}
else
{	
?>
<div class="content">	
	<div class="body">    	
    	<div class="well-smoke block" style="margin-top:0px">
    		<div class="navbar">
    			<div class="navbar-inner">
             		 <h5><i class="font-hand-right"></i><?php _e( "Bookings", bookings_plus ); ?></h5>
            	</div>
			</div>	
			<div class="body">
        		<div class="row-fluid nested">      		
	            			<div class="span12 well" style="margin:10px 0px">
	      						<div class="navbar">
	      							<div class="navbar-inner">
	      								<h5><?php _e( "Advanced Booking Calendar Filter", bookings_plus ); ?></h5>
	      								<div class="nav pull-right">
	                    	        		<a class="just-icon" data-toggle="collapse" data-target="#calenderFilter">
	                    	        			<i class="font-resize-vertical"></i>
	                    	        		</a>
	                    	    		</div>
	      							</div>
	      						</div>
	      						<div class="collapse in" id="calenderFilter">	 
									<div class="body" style="padding:0px">
										<div class="row-fluid form-horizontal">
							             	<div class="control-group">
						                 		<label class="control-label"><?php _e( "Employee :", bookings_plus ); ?>
						                    	
						                    	</label>
						                        <div class="controls">
													<?php
														$employees = $wpdb->get_results
														(
															$wpdb->prepare
															(
																"SELECT * FROM ".employeesTable()." order by EmployeeName ASC",''
															)
														);
													?>
													<select name="uxDdlBookingEmployees" class="style required" id="uxDdlBookingEmployees" onchange="showEmployeeBooking();">
							                        	<option value ="allEmployee"><?php _e( "All Employees", bookings_plus ); ?></option>	
							                            <?php
							                            	for( $flagEmployeeDropdown = 0; $flagEmployeeDropdown < count($employees); $flagEmployeeDropdown++)
														    {
														?>
																<option value ="<?php echo $employees[$flagEmployeeDropdown]->EmployeeId;?>"><?php echo $employees[$flagEmployeeDropdown]->EmployeeName;?></option>
														<?php 
															} 
														?>
						                            </select>							                        	
												</div>
											</div>
							                <div class="control-group">
						                    	<label class="control-label"><?php _e( "Booking Status :", bookings_plus ); ?>
						                    		
						                    	</label>
						                    	<div class="controls">
						                    		<table>
						                    			<tr>
						                    				<td>
						                    					<input type="checkbox" class="style" name="uxBookingStatus1" id="uxBookingStatus1" onclick="showEmployeeBooking();" checked="checked"/><?php _e( "Pending Approval", bookings_plus ); ?>
						                    				</td>
						                    			</tr>
						                    			<tr>
						                    				<td>
						                    					<input type="checkbox" class="style" name="uxBookingStatus2" id="uxBookingStatus2" onclick="showEmployeeBooking();" checked="checked"/><?php _e( "Approved", bookings_plus ); ?>
						                    				</td>
						                    			</tr>
						                    			<tr>
						                    				<td>
						                    					<input type="checkbox" class="style" name="uxBookingStatus3" id="uxBookingStatus3" onclick="showEmployeeBooking();" checked="checked"/><?php _e( "Disapproved", bookings_plus ); ?>
						                    				</td>
						                    			</tr>
						                    			<tr>
						                    				<td>
						                    					<input type="checkbox" class="style" name="uxBookingStatus4" id="uxBookingStatus4" onclick="showEmployeeBooking();" checked="checked"/><?php _e( "Cancelled", bookings_plus ); ?>
						                    				</td>
						                    			</tr>
					                    			
						                    		</table>
						                    		
						                    	</div>				                    												
											</div>
											<div class="control-group">
						                    	<label class="control-label"><?php _e( "Book a Service :", bookings_plus ); ?>
						                    		
						                    	</label>
						                    	<div class="controls">
						                    		<a href="#bookNewService" class="fancybox">
						                    			<img src="<?php echo $url;?>/images/bookingImages/bookNow.jpg" style="width: 130px;" />
						                    		</a>
						                    		
						                    	</div>				                    												
											</div>								               												
										</div>
									</div>
								</div>
                  			</div>      	        		
	            			<div class="span12 well" style="margin:10px 0px">
	      						<div class="navbar">
	      							<div class="navbar-inner">
	      								<h5><?php _e( "Booking Calendar", bookings_plus ); ?></h5>
	      							</div>
	      						</div>	 
                 				<div id="calendar"></div>
                 				<div id="dynamicCalendar"></div>
                  			</div>
                		</div>
               		</div>
                </div>
            </div>
</div>
<div id="bookNewService" style="width:800px;display:none">
	<?php include_once 'bookingCalendarByBackend.php' ?>		
</div>
<script type="text/javascript">
jQuery("#Bookings").attr("class","active");
	//===== Calendar =====//
var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();
jQuery(document).ready(function()
{			
	showEmployeeBooking();
	 	
});
			
function showEmployeeBooking()
{
	var employeeId = jQuery('#uxDdlBookingEmployees').val();
	var uxBookingStatus1 = jQuery('input:checkbox[name=uxBookingStatus1]:checked').val();
	var uxBookingStatus2 = jQuery('input:checkbox[name=uxBookingStatus2]:checked').val();
	var uxBookingStatus3 = jQuery('input:checkbox[name=uxBookingStatus3]:checked').val();
	var uxBookingStatus4 = jQuery('input:checkbox[name=uxBookingStatus4]:checked').val();
	var uxBookingStatus5 = jQuery('input:checkbox[name=uxBookingStatus5]:checked').val();
	var uxBookingStatus6 = jQuery('input:checkbox[name=uxBookingStatus6]:checked').val();
	if(uxBookingStatus1 == "on")
	{
		var status1 = "true";
	}
	else
	{
		var status1 = "false";
	}
	if(uxBookingStatus2 == "on")
	{
		var status2 = "true";
	}
	else
	{
		var status2 = "false";
	}
	if(uxBookingStatus3 == "on")
	{
		var status3 = "true";
	}
	else
	{
		var status3 = "false";
	}
	if(uxBookingStatus4 == "on")
	{
		var status4 = "true";
	}
	else
	{
		var status4 = "false";
	}
	if(uxBookingStatus5 == "on")
	{
		var status5 = "true";
	}
	else
	{
		var status5 = "false";
	}
	if(uxBookingStatus6 == "on")
	{
		var status6 = "true";
	}
	else
	{
		var status6 = "false";
	}
	if(employeeId == "allEmployee")
	{
		var id = "allEmployee";
	}
	else
	{
		var id = employeeId;
	}
	jQuery.ajax
	({
				type: "POST",
				data: "action=getAjaxExecuted&target=getBookings&EmployeeId="+id+"&status1="+status1+"&status2="+status2+
				"&status3="+status3+"&status4="+status4+"&status5="+status5+"&status6="+status6,
				url:ajaxurl,
				success: function(data) 
				{					
					jQuery('#dynamicCalendar').html(data);					
				}
	});
}
jQuery('#btnNextStep').live('click',function()
		{
			var block = 'block';
			var step1Action = jQuery('#serviceGrid').css('display');
			var step2Action = jQuery('#staffGrid').css('display');
			var step3Action = jQuery('#calendarGrid').css('display');
			var step4Action = jQuery('#formGrid').css('display');
			var step5Action = jQuery('#confirmGrid').css('display');
			
			switch(block)
			{
				case step1Action:
					if(!nextSelectEmployee())
					{
						break;						
					}
					else
					{										
						jQuery('#serviceGrid').css('display','none');			
						jQuery('#staffGrid').css('display','block');
						jQuery('#step1Menu').removeAttr('class');					
						jQuery('#step2Menu').attr('class','active');
						jQuery('#btnBackStep').css('display','block');
						jQuery.fancybox.update();		
					}					
						break;
				case step2Action:
				
						var employeeId = jQuery('input:radio[name=radioEmployees]:checked').val();
						var serviceId = jQuery('input:radio[name=radioservice]:checked').val();
						if(employeeId != undefined)
						{
							jQuery('#staffGrid').css('display','none');			
							jQuery('#calendarGrid').css('display','block');
							jQuery('#step2Menu').removeAttr('class');					
							jQuery('#step3Menu').attr('class','active');
							CalendarBind();
							var date = new Date();
							if((employeeId != jQuery('#hdEmployeeId').val()) || (serviceId != jQuery('#hdServiceId').val()))
							{
								funcBindTime(date.getFullYear()+'-'+(date.getMonth() + 1)+'-'+date.getDate());
								jQuery('.ui-state-active').attr('class','ui-state-default');								
							}
							
						}										
						else
						{
							bootbox.alert("<?php _e( "Please choose atleast one Staff Member.", bookings_plus ); ?>");
							return false;
						}						
						break;
						
				case step3Action:
						
						if(jQuery("#hdDate").val() == "")
						{
								bootbox.alert("<?php _e( "Please choose atleast Booking Date.", bookings_plus ); ?>");
								return false;
						}
						else if(jQuery("#hdTimeControlValue").val() == "")
						{
								bootbox.alert("<?php _e( "Please choose atleast Booking Time.", bookings_plus ); ?>");
								return false;
						}
						else
						{
								jQuery('#calendarGrid').css('display','none');			
								jQuery('#formGrid').css('display','block');
								jQuery('#step3Menu').removeAttr('class');					
								jQuery('#step4Menu').attr('class','active');
								jQuery.fancybox.update();	
								
						}
													
						break;
						
				case step4Action:
				
						_validator = jQuery("#uxBookingFrm").valid();   
						if(_validator)
						{		
							jQuery('#formGrid').css('display','none');			
							jQuery('#confirmGrid').css('display','block');
							jQuery('#step4Menu').removeAttr('class');					
							jQuery('#step5Menu').attr('class','active');
							
						}
						jQuery.fancybox.update();								
							break;
							
							
				case step5Action:
						insertCustomer();					
						jQuery('#confirmGrid').css('display','none');
						jQuery('#thankyouGrid').css('display','block');
						jQuery('#btnBackStep').css('display','none');
						jQuery('#btnNextStep').css('display','none');					
						jQuery('#navBookNow').css('display','none');
						jQuery('#navThankyou').css('display','block');
						break;
			}		
		});
			
		jQuery('#btnBackStep').live('click',function()
		{
			var block = 'block';
			var step1Action = jQuery('#serviceGrid').css('display');
			var step2Action = jQuery('#staffGrid').css('display');
			var step3Action = jQuery('#calendarGrid').css('display');
			var step4Action = jQuery('#formGrid').css('display');
			var step5Action = jQuery('#confirmGrid').css('display');
			
			switch(block)
			{
	
				case step2Action:
						
						jQuery('#staffGrid').css('display','none');			
						jQuery('#serviceGrid').css('display','block');
						jQuery('#step2Menu').removeAttr('class');					
						jQuery('#step1Menu').attr('class','active');
						jQuery('#btnBackStep').css('display','none');
						jQuery.fancybox.update();					
						break;
				case step3Action:
						jQuery('#calendarGrid').css('display','none');			
						jQuery('#staffGrid').css('display','block');
						jQuery('#step3Menu').removeAttr('class');					
						jQuery('#step2Menu').attr('class','active');
						jQuery.fancybox.update();								
						break;
				case step4Action:
						jQuery('#formGrid').css('display','none');			
						jQuery('#calendarGrid').css('display','block');
						jQuery('#step4Menu').removeAttr('class');					
						jQuery('#step3Menu').attr('class','active');
						jQuery.fancybox.update();								
						break;		
				case step5Action:
						jQuery('#formGrid').css('display','block');
						jQuery('#confirmGrid').css('display','none');
						jQuery('#step5Menu').removeAttr('class');					
						jQuery('#step4Menu').attr('class','active');
						jQuery.fancybox.update();							
						break;
			}		
		});    
	jQuery('.timeCol').live('click',function()
	{
		jQuery(".timeCol").each(function()
		{
			jQuery(this).attr('style','');
	
		});
		jQuery(this).attr('style','background-color:rgb(174, 199, 30) !important;color:#fff !important');
		jQuery('#hdTimeControl').val(jQuery(this).html());
		jQuery('#hdTimeControlValue').val(jQuery(this).attr('value'));
		
	});
	oTable = jQuery('#services-table-grid').dataTable
	({
		"bJQueryUI": false,
		"bAutoWidth": true,
		"sPaginationType": "full_numbers",
		"sDom": 't<"datatable-footer"ip>',
		"oLanguage": 
		{
			"sLengthMenu": "<span>Show entries:</span> _MENU_"
		},
		"aaSorting": [[ 3, "asc" ]]
		
	});
</script>
<?php
}
?>