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
              		<h5>
              			<i class="font-hand-right"></i>
              			<?php _e( "Dashboard", bookings_plus ); ?>
              			<span class="label label-important"><?php _e( "New Feature!", bookings_plus ); ?></span>
              		</h5>
            	</div>
			</div>
       		<div class="body">
        		<ul class="midnav">
		  			<li>
		  				<a href="#bookNewService" data-toggle="modal">
		  					<img src="<?php echo plugins_url('/images/icons/color/date.png', __FILE__) ?>" alt="">
		  					<span>
		  						<?php _e( "Book a Service", bookings_plus ); ?>
		  					</span>
		  				</a>
		  				<strong id="uxDashboardBookingsCount"></strong>
		  			</li>
                    <li>
			   			<a href="#resourcesVisiblity" data-toggle="modal">
			   				<img src="<?php echo plugins_url('/images/icons/color/my-account.png', __FILE__) ?>" alt="">
			   				<span>
			   					<?php _e( "Resources Visibilty", bookings_plus ); ?>
			   				</span>
			   			</a>
			   			<strong id="uxDashboardResourcesVisibility"></strong>
			   		</li>
					<li>
			    		<a href="#addNewService" data-toggle="modal">
			    			<img src="<?php echo plugins_url('/images/icons/color/order-149.png', __FILE__) ?>" alt="">
			    			<span>
			    				<?php _e( "Add Services", bookings_plus ); ?>
			    			</span>
			    		</a>
			    		<strong id="uxDashboardServiceCount"></strong>
			    	</li>
			    	<li>
			    		<a href="#addNewEmployee" data-toggle="modal">
			    			<img src="<?php echo plugins_url('/images/icons/color/hire-me.png', __FILE__) ?>" alt="<?php _e( "Add Employees", bookings_plus ); ?>">
			    			<span>
			    				<?php _e( "Add Resources", bookings_plus ); ?>
			    			</span>
			    		</a>
			    		<strong id="uxDashboardEmployeesCount"></strong>
			    	</li>                    
			    	<li>
			    		<a href="#allocateServices" data-toggle="modal">
			    			<img src="<?php echo plugins_url('/images/icons/color/special-offer.png', __FILE__) ?>" alt="">
			    			<span>
			    				<?php _e( "Assign Services", bookings_plus ); ?>
			    			</span>
			    		</a>
			    	</li>			   		
			    	<li>
			    		<a href="#workingHours" data-toggle="modal" onclick="employeeWorkingHours();">
			    			<img src="<?php echo plugins_url('/images/icons/color/full-time.png', __FILE__) ?>" alt="">
			    			<span>
			    				<?php _e( "Business Hours", bookings_plus ); ?>
			    			</span>
			    		</a>
			    	</li>
                	<li>
			   			<a href="#BlockOuts" data-toggle="modal">
			   				<img src="<?php echo plugins_url('/images/icons/color/busy.png', __FILE__) ?>" alt="">
			   				<span>
			   					<?php _e( "Block Outs", bookings_plus ); ?>
			   				</span>
			   			</a>
			   		</li>			   		
             		<li>
			   			<a href="#defaultSettings" data-toggle="modal">
			   				<img src="<?php echo plugins_url('/images/icons/color/settings.png', __FILE__) ?>" alt="">
			   				<span>
			   					<?php _e( "Default Settings", bookings_plus ); ?>
			   				</span>
			   			</a>
			   		</li>                                                                                        		  		
 					<li>
			   			<a href="#ReminderSettings" data-toggle="modal">
			   				<img src="<?php echo plugins_url('/images/icons/color/phone.png', __FILE__) ?>" alt="">
			   				<span>
			   					<?php _e( "Reminder Settings", bookings_plus ); ?>
			   				</span>
			   			</a>
			   			<strong id="uxDashboardReminderSettings"></strong>
			   		</li>
 				
					<li>
			   			<a href="#shortcodes" data-toggle="modal">
			   				<img src="<?php echo plugins_url('/images/icons/color/lightbulb.png', __FILE__) ?>" alt="">
			   				<span>
			   					<?php _e( "ShortCodes", bookings_plus ); ?>
			   				</span>
			   			</a>
			   			
			   		</li>			    	
                    <li>
			   			<a href="#paypalSettings" data-toggle="modal">
			   				<img src="<?php echo plugins_url('/images/icons/color/paypal.png', __FILE__) ?>" alt="">
			   				<span>
			   					<?php _e( "Paypal Settings", bookings_plus ); ?>
			   				</span>
			   			</a>
			   			<strong id="uxDashboardPaypalSettings"></strong>
			   		</li> 
                    <li>
			   			<a href="#mailChimpSettings" data-toggle="modal">
			   				<img src="<?php echo plugins_url('/images/icons/color/mailchimp.png', __FILE__) ?>" alt="">
			   				<span>
			   					<?php _e( "Mailchimp Settings", bookings_plus ); ?>
			   				</span>
			   			</a>
			   			<strong id="uxDashboardMailChimpSettings"></strong>
			   		</li>                                              
              	    <li>
			   			<a href="#facebookConnect" data-toggle="modal">
			   				<img src="<?php echo plugins_url('/images/icons/color/facebook.png', __FILE__) ?>" alt="">
			   				<span>
			   					<?php _e( "Facebook Connect", bookings_plus ); ?>
			   				</span>
			   			</a>
			   			<strong id="uxDashboardFacebookConnect"></strong>
			   		</li>			   		
              	    <li>
			   			<a href="#autoApproveBookings" data-toggle="modal">
			   				<img src="<?php echo plugins_url('/images/icons/color/check.png', __FILE__) ?>" alt="">
			   				<span>
			   					<?php _e( "Auto Approve", bookings_plus ); ?>
			   				</span>
			   			</a>
			   			<strong id="uxDashboardAutoApprove"></strong>
			   		</li>			   		
              	    <li>
			   			<a href="#deleteAllBookings" data-toggle="modal" onclick="DeleteAllBookings();">
			   				<img src="<?php echo plugins_url('/images/icons/color/brainstorming.png', __FILE__) ?>" alt="">
			   				<span>
			   					<?php _e( "Delete All Bookings", bookings_plus ); ?>
			   				</span>
			   			</a>
			   			
			   		</li> 			   		
              	    <li>
			   			<a href="#restorFactorySettings" data-toggle="modal" onclick="RestoreFactorySettings();">
			   				<img src="<?php echo plugins_url('/images/icons/color/config.png', __FILE__) ?>" alt="">
			   				<span>
			   					<?php _e( "Restore Factory Settings", bookings_plus ); ?>
			   				</span>
			   			</a>
			   		
			   		</li>  			   		  
				</ul>
				<div class="separator"><span></span></div>
        		<div class="row-fluid nested" style="margin-top:20px;">
	            	<div class="span12 well">
	      				<div class="navbar">
	      					<div class="navbar-inner">
	      						<h5><?php _e( "Statistics - Bookings (Next 15 Days)", bookings_plus ); ?></h5>
	      					</div>
	      				</div>
	      				 <div class="body">
	      				 	<div class="chart" id="placeholder1">
	      				 		
	      				 	</div>
	      				 </div>
	      			</div>
	      		</div> 				
				<div class="separator"><span></span></div>
        		<div class="row-fluid nested" style="margin-top:20px;">
	            	<div class="span12 well">
	      				<div class="navbar">
	      					<div class="navbar-inner">
	      						<h5><?php _e( "Upcoming Bookings (Next 30 Days)", bookings_plus ); ?></h5>
	      					</div>
	      				</div>
	      			
						<div class="table-overflow">
							<table class="table table-striped" id="data-table-upcoming-events">
						 		<thead>
						   			<tr>
						   		  	<?php
						   		  		$paypalEnable = $wpdb->get_var
						   		  		(
						   		  			$wpdb->prepare
						   		  			(
						   		  				"SELECT PaymentGatewayValue FROM ".payment_Gateway_settingsTable()." where PaymentGatewayKey = %s ",
						   		  				"paypal-enabled"
						   		  			)
										);
										$ResourcesEnable = $wpdb->get_var
						   		  		(
						   		  			$wpdb->prepare
						   		  			(
						   		  				"SELECT GeneralSettingsValue FROM ".generalSettingsTable()." where GeneralSettingsKey  = %s ",
						   		  				"resources-visible-enable"
						   		  			)
										);
						   		  		if($paypalEnable == 0)
										{
										?>
											<th style="width:5%"></th>
						   		  		<?php
						   		  		}
						   		  		?>
											<th style="width:12%"><?php _e( "Client Name", bookings_plus ); ?></th>
										    <th style="width:10%"><?php _e( "Mobile", bookings_plus ); ?></th>
										    <th style="width:12%"><?php _e( "Service", bookings_plus ); ?></th>
										    <?php
										    if($ResourcesEnable == 1)
											{
											?>
												<th style="width:12%"><?php _e( "Employee", bookings_plus ); ?></th>
							   		  		<?php
							   		  		}
							   		  		?>
										    <th style="width:11%"><?php _e( "Booking Date", bookings_plus ); ?></th>
										    <th style="width:9%"><?php _e( "Time Slot", bookings_plus ); ?></th>
											<th style="width:10%"><?php _e( "Status", bookings_plus ); ?></th>
											<th style="width:13%"></th>
								  	</tr>
								</thead>
						  		<tbody>
						  		<?php
						  			$currentdate = date("Y-m-d"); 
									$newDate = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")+30, date("Y")));
						   			$uxUpcomingBookings = $wpdb->get_results
			                       	(
						               	$wpdb->prepare
						               	(
								           	"SELECT CONCAT(".customersTable().".CustomerFirstName ,'  ',". customersTable().
								           	".CustomerLastName) as ClientName,".customersTable().".CustomerMobile,". servicesTable(). ".ServiceName,
								           	".employeesTable(). ".EmployeeName,".bookingTable().".Date,". bookingTable().".TimeSlot,". bookingTable().".PaymentStatus,". bookingTable().".BookingId,". bookingTable().
								       		".BookingStatus from ".bookingTable()." LEFT OUTER JOIN " .customersTable()." ON ".bookingTable().
								          	".CustomerId= ".customersTable().".CustomerId ". " LEFT OUTER JOIN " .employeesTable()." ON ".bookingTable().
								           	".EmployeeId=".employeesTable().".EmployeeId". " LEFT OUTER JOIN " .servicesTable()." ON ".bookingTable().
								           	".ServiceId=".servicesTable().".ServiceId where ".bookingTable().".Date Between '%s' AND '%s' ORDER BY ".bookingTable().".Date asc",
								           	$currentdate,
								           	$newDate
						                 )													
			                       	);
			                        $timeFormats = $wpdb->get_var
			                        (
			                        	$wpdb->prepare
						   		  		(
			                        		"SELECT GeneralSettingsValue FROM ".generalSettingsTable()." WHERE GeneralSettingsKey = %s ",
			                        		"default_Time_Format"
			                        	)
									);
			                        for($flag=0; $flag < count($uxUpcomingBookings); $flag++)
						            {
						              	if($uxUpcomingBookings[$flag]->BookingStatus == "Approved")
										{
						               	?>					                 			
											<tr class="success hovertip"  data-original-title="<?php _e("Booking Status : Approved", bookings_plus ); ?>" data-placement="left">
										<?php
										}
										else if($uxUpcomingBookings[$flag]->BookingStatus == "Disapproved")
										{
										?>
											<tr class="error hovertip"  data-original-title="<?php _e("Booking Status : Disapproved", bookings_plus ); ?>" data-placement="left">
										<?php	
										}
										else if($uxUpcomingBookings[$flag]->BookingStatus == "Pending Approval")
										{
										?>
											<tr class="warning hovertip"  data-original-title="<?php _e("Booking Status : Pending Approval", bookings_plus ); ?>" data-placement="left">
										<?php	
										}
										else if($uxUpcomingBookings[$flag]->BookingStatus == "Cancelled")
										{
										?>
											<tr class="info hovertip"  data-original-title="<?php _e("Booking Status : Cancelled", bookings_plus ); ?>" data-placement="left">
										<?php	
										}
										else
										{
										?>
											<tr>
										<?php	
										}	
											if($paypalEnable == 0)
											{
												if($uxUpcomingBookings[$flag]->PaymentStatus == "Completed")
												{																																								
												?>
													<td>
														<label style="width:10px;height:15px;background-color:green" title="Payment Recieved"></label>
													</td>
												<?php
												}
												else if($uxUpcomingBookings[$flag]->PaymentStatus == "Cancelled")
												{
												?>
													<td>
														<label style="width:10px;height:15px;background-color:red" title="Payment Cancelled"></label>
													</td>
												<?php
												}
												else 
												{
													?>
													<td>
														<label style="width:10px;height:15px;background-color:orange" title="Awaiting Payment"></label>
													</td>
												<?php
												}
											}
											?>
											<td><?php echo $uxUpcomingBookings[$flag]->ClientName?></td>
											<td><?php echo $uxUpcomingBookings[$flag]->CustomerMobile?></td>
											<td><?php echo $uxUpcomingBookings[$flag]->ServiceName?></td>
											 <?php
											    if($ResourcesEnable == 1)
												{
												?>
													<td><?php echo $uxUpcomingBookings[$flag]->EmployeeName?></td>
								   		  		<?php
								   		  		}
								   		  		$dateFormat = $wpdb->get_var
												(
													$wpdb->prepare
													(
														'SELECT GeneralSettingsValue FROM ' . generalSettingsTable() . ' where GeneralSettingsKey = %s ',
														"default_Date_Format"
													)
												);											
												if($dateFormat == 0)
												{
												?>
													<td><?php echo date("M d, Y", strtotime($uxUpcomingBookings[$flag]->Date));?></td>
												<?php
												}
												else if($dateFormat == 1)
												{
												?>
													<td><?php echo date("Y/m/d", strtotime($uxUpcomingBookings[$flag]->Date));?></td>
												<?php
												}	
												else if($dateFormat == 2)
												{
												?>
													<td><?php echo date("m/d/Y", strtotime($uxUpcomingBookings[$flag]->Date));?></td>
												<?php
												}	
												else if($dateFormat == 3)
												{
												?>
													<td><?php echo date("d/m/Y", strtotime($uxUpcomingBookings[$flag]->Date));?></td>
												<?php
												}
												$getHours_bookings = floor(($uxUpcomingBookings[$flag] -> TimeSlot)/60);
												$getMins_bookings = ($uxUpcomingBookings[$flag] -> TimeSlot) % 60;
												$hourFormat_bookings = $getHours_bookings . ":" . "00";
												if($timeFormats == 0)
												{
													$time_in_12_hour_format_bookings  = DATE("g:i a", STRTOTIME($hourFormat_bookings));
												}
												else 
												{
													$time_in_12_hour_format_bookings  = DATE("H:i", STRTOTIME($hourFormat_bookings));
												}
						                           if($getMins_bookings!=0)
					                               {
							                           	$hourFormat_bookings = $getHours_bookings . ":" . $getMins_bookings;
							                           	if($timeFormats == 0)
														{
															$time_in_12_hour_format_bookings  = DATE("g:i a", STRTOTIME($hourFormat_bookings));
														}
														else 
														{
															$time_in_12_hour_format_bookings  = DATE("H:i", STRTOTIME($hourFormat_bookings));
														}
						                           }
													?>
													<td><?php echo $time_in_12_hour_format_bookings ?></td>
													<td><?php echo $uxUpcomingBookings[$flag]->BookingStatus?></td>
													<td>
														<a class="icon-edit hovertip fancybox" data-original-title="<?php _e("Edit Booking?", bookings_plus ); ?>" data-placement="top" href="#EditBooking" onclick="editBooking(<?php echo $uxUpcomingBookings[$flag]->BookingId; ?>);"></a>&nbsp;&nbsp;
														
														<?php
														if($uxUpcomingBookings[$flag]->BookingStatus != "Cancelled")
														{
														?>
															<a class="icon-envelope hovertip" data-original-title="<?php _e("Send Email Again?", bookings_plus ); ?>" data-placement="top" href="#" onclick="resendEmail('<?php echo $uxUpcomingBookings[$flag]->BookingId;?>','<?php echo $uxUpcomingBookings[$flag]->BookingStatus;?>')"></a>&nbsp;&nbsp;
														<?php
														}
														?>
														<a class="icon-trash hovertip" data-original-title="<?php _e("Delete Booking?", bookings_plus ); ?>" data-placement="top" href="#" onclick="deleteBooking(<?php echo $uxUpcomingBookings[$flag]->BookingId; ?>)"></a>
																									
													</td>
											</tr>
									<?php
									}
									?>
								</tbody>
							</table>
					    </div>
					 </div>	      				         			               		
        		</div>
       		
			</div>
		</div>
	</div>
</div>
<div id="facebookConnect" class="modal hide fade" role="dialog" aria-hidden="true">
	<form id="uxFrmFacebookSettings" class="form-horizontal" method="post" action="#">
		<div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		    <h5><?php _e( "Facebook Connect Settings",bookings_plus ); ?></h5>
		</div>		
		<div class="body">
			<div class="block well" style="margin-top:10px;">
				<div class="note note-success" id="successFacebookSettingsMessage" style="display:none;margin:10px;">
					<strong><?php _e( "Success! Facebook Settings has been saved.", bookings_plus ); ?></strong>
				</div>	 				
				<div class="row-fluid form-horizontal">
			    	<div class="control-group">
				        <?php
				        	$facebookStatus = $wpdb->get_var
				        	(
				        		$wpdb->prepare
				        		(
				        			'SELECT SocialMediaValue FROM ' . social_Media_settingsTable() . ' where SocialMediaKey = %s',
				        			"facebook-connect-enable"
								)
							);
						?>
			            <label class="control-label"><?php _e( "Facebook Connect :", bookings_plus );?>
							<span class="req">*</span>
		               	</label>
						<div class="controls">
				       		<?php
								if($facebookStatus == 1)
								{
							?>
									<label class="radio">
										<input type="radio" id="uxFacebookConnectEnable" name="uxFacebookConnect" class="style" value="1" onclick="enableFBText();" checked="checked"><?php _e( "Enabled", bookings_plus );?>
									</label>
									<label class="radio">
										<input type="radio" id="uxFacebookConnectDisable" name="uxFacebookConnect" onclick="disableFBText();" class="style" value="0"><?php _e( "Disabled", bookings_plus );?>
									</label>		
							<?php
								}
								else 
								{
							?>
									<label class="radio">
										<input type="radio" id="uxFacebookConnectEnable" name="uxFacebookConnect" class="style" onclick="enableFBText();" value="1" ><?php _e( "Enabled", bookings_plus );?>
									</label>
									<label class="radio">
										<input type="radio" id="uxFacebookConnectDisable" name="uxFacebookConnect" class="style" onclick="disableFBText();" value="0" checked="checked"><?php _e( "Disabled", bookings_plus );?>
									</label>	
							<?php
								}
							?>
						</div>
		            </div>
		            <div class="control-group" id="facebookAPI" style="display:none;">
		            	<label class="control-label"><?php _e( "App Id :", bookings_plus ); ?>
		               		<span class="req">*</span>
		               	</label>
						<div class="controls">
							<?php
									$facebookApiKey = $wpdb->get_var
									(
										$wpdb->prepare
				        				(
											'SELECT SocialMediaValue FROM ' . social_Media_settingsTable() . ' where SocialMediaKey = %s',
											"facebook-api-id"
										)
									);
							?>
							<input type="text" class="required span12" name="uxFacebookAppId" id="uxFacebookAppId" value="<?php echo $facebookApiKey;  ?>"/>
						</div>
		          	</div>
			        <div class="control-group" id="facebookSecret" style="display:none;">
		            	<label class="control-label">
		            		<?php _e( "Secret Key :", bookings_plus ); ?>
		            		<span class="req">*</span>
		            	</label>
						<div class="controls">
							<?php
									$facebookSecretKey = $wpdb->get_var
									(
										$wpdb->prepare
										(
											'SELECT SocialMediaValue FROM ' . social_Media_settingsTable() . ' where SocialMediaKey = %s',
											"facebook-secret-key"
										)
									);
							?>
							<input type="text" class="required span12" name="uxFacebookSecretKey" id="uxFacebookSecretKey" value="<?php echo $facebookSecretKey;  ?>"/>
						</div>
		          	</div>  
		        </div>	        
		    </div>		        
		</div>
		<div class="form-actions" style="padding:0px 10px 10px 0px;">
			<input type="submit" value="<?php _e( "Save Changes", bookings_plus ); ?>" class="btn btn btn-danger pull-right">
		</div>			
	</form>
</div>
<div id="mailChimpSettings" class="modal hide fade" role="dialog" aria-hidden="true">	
	<form id="uxFrmMailChimpSettings" class="form-horizontal" method="post" action="#">
		<div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		    <h5><?php _e( "Mailchimp Settings",bookings_plus ); ?></h5>
		</div>		 	
		<div class="body">
			<div class="block well" style="margin-top:10px;">
				<div class="note note-success" id="successMailChimpSettingsMessage" style="display:none;margin:10px;">
					<strong><?php _e( "Success! Mail Chimp Settings has been saved.", bookings_plus ); ?></strong>
				</div>				
				<div class="row-fluid form-horizontal">
					<div class="control-group">
						<?php
			    			$autoResponderStatus = $wpdb->get_var
			    			(
			    				$wpdb->prepare
			    				(
			    					'SELECT AutoResponderValue FROM ' . auto_Responders_settingsTable() . ' where AutoResponderKey  = %s',
			    					"mail-chimp-enabled"
			    				)
							);
						?>
						<label class="control-label"><?php _e( "Mail Chimp :", bookings_plus ); ?>
			            	<span class="req">*</span>
			            </label>
			            <div class="controls">
			            <?php
							if($autoResponderStatus == 1)
							{
						?>
								<label class="radio">
									<input type="radio" id="enableuxMailChimp" name="uxMailChimp" class="style" value="1" onclick="enableMailChimpText()"  checked="checked"><?php _e( "Enabled", bookings_plus );?>
								</label>
								<label class="radio">
									<input type="radio" id="disableuxMailChimp" name="uxMailChimp" onclick="disableMailChimpText()" class="style" value="0"><?php _e( "Disabled", bookings_plus );?>
								</label>	
						<?php
							}
							else 
							{
						?>
								<label class="radio">
									<input type="radio" id="enableuxMailChimp" name="uxMailChimp" class="style" onclick="enableMailChimpText()" value="1"><?php _e( "Enabled", bookings_plus );?>
								</label>
								<label class="radio">
									<input type="radio" id="disableuxMailChimp" name="uxMailChimp" onclick="disableMailChimpText()" class="style" value="0" checked="checked"><?php _e( "Disabled", bookings_plus );?>
								</label>	
						<?php
							}
						?>
				        </div>
			        </div>	      							
					<div class="control-group" id="mailApiKey" style="display: none;">
				    	<label class="control-label"><?php _e( "Api Key :", bookings_plus ); ?>
				    		<span class="req">*</span>
				    	</label>
				    	<div class="controls">
				        	<?php
				         		$MailChimpApiKey = $wpdb->get_var
				         		(
				         			$wpdb->prepare
				         			(
				         				'SELECT AutoResponderValue FROM ' . auto_Responders_settingsTable() . ' where AutoResponderKey  = %s',
				         				"mail-chimp-api-key"
				         			)
								);
							?>
							<input type="text" class="required span12" name="uxMailChimpApiKey" id="uxMailChimpApiKey" value="<?php echo $MailChimpApiKey; ?>"/>	
						</div>
					</div>
					<div class="control-group" id="mailUniqueId" style="display: none;">
				    	<label class="control-label"><?php _e( "List Unique Id :", bookings_plus ); ?>
				        	<span class="req">*</span>
				        </label>
						<div class="controls">
							<?php
				         		$MailChimpUniqueId = $wpdb -> get_var
				         		(
				         			$wpdb->prepare
				         			(
				         				'SELECT AutoResponderValue FROM ' . auto_Responders_settingsTable() . ' where AutoResponderKey  = %s',
										"mail-chimp-unique-id"
									)
								);
							?>
							<input type="text" class="required span12" name="uxMailChimpUniqueId" id="uxMailChimpUniqueId" value="<?php echo $MailChimpUniqueId; ?>"/>
						</div>
					</div>
					<div class="control-group" id="mailOptIn" style="display: none;">
				    	<label class="control-label"><?php _e( "Double Opt-In :", bookings_plus ); ?>
				    		
				    	</label>
						<div class="controls">
							<?php
				         		$DoubleOptIn = $wpdb -> get_var
				         		(
									$wpdb->prepare
				         			(
				         				'SELECT AutoResponderValue FROM ' . auto_Responders_settingsTable() . ' where AutoResponderKey  = %s',
				         				"mail-double-optin-id"
									)
								);
								
								if($DoubleOptIn == "true")
								{
				         	?>
									<input type="checkbox" class="style" name="uxDoubleOptIn" checked="checked" id="uxDoubleOptIn"/>
							<?php
								}
								else 
								{
							?>
									<input type="checkbox" class="style" name="uxDoubleOptIn" id="uxDoubleOptIn"/>
							<?php
								}
							?>
						</div>
				    </div>          	
					<div class="control-group" id="mailEmail" style="display: none;">
				    	<label class="control-label">
				        	<?php _e( "Welcome Email :", bookings_plus ); ?>
				        
				        </label>
						<div class="controls">
							<?php
							$WelcomeEmail = $wpdb -> get_var
							(
				        		$wpdb->prepare
				        			(
				        				'SELECT AutoResponderValue FROM ' . auto_Responders_settingsTable() . '  where AutoResponderKey  = %s',
				        				"mail-welcome-email"
				        			)
							);
								if($WelcomeEmail == "true")
								{
							?>
									<input type="checkbox" class="style" name="uxWelcomeEmail" id="uxWelcomeEmail" checked="checked"/>
				         	<?php
								}
								else 
								{
							?>
									<input type="checkbox" class="style" name="uxWelcomeEmail" id="uxWelcomeEmail" />
							<?php
								}
							?>
						</div>
				    </div>
			    </div>    
			</div>
		</div>
		<div class="form-actions" style="padding:0px 10px 10px 0px;">
			<input type="submit" value="<?php _e( "Save Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
		</div>			
	</form>
</div>
<div id="addNewService" class="modal hide fade" role="dialog" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>	
        <h5><?php _e( "Add New Service", bookings_plus ); ?></h5>
    </div>
	<form id="uxFrmAddServices" class="form-horizontal" method="post" action="#">
		<div class="body">
			<div class="note note-success" id="successMessage" style="display:none">
				<strong><?php _e( "Success! Service has been saved.", bookings_plus ); ?></strong>
            </div>
   	  		<div class="note note-error" id="errorMessageServices" style="display:none">
				<strong><?php _e( "Error! Max Bookings should be greater than 1", bookings_plus ); ?></strong>
            </div>
          	<div class="block well" style="margin-top:10px;">
                <div class="row-fluid form-horizontal">  
                	<div class="control-group">
                    	<label class="control-label"><?php _e( "Service Color :", bookings_plus ); ?>
                    		<span class="req">*</span>
                    	</label>
                        <div class="controls">
  							<div class="input-append color" data-color="rgb(255, 141, 180)" data-color-format="rgb" >
  								<span class="add-on"><i id="picker" style="background-color: rgb(255, 146, 180)"></i></span>
                                 <input type="text" value=""  id="uxServiceColor" name="uxServiceColor" >
                            </div>                        	
                        </div>
                    </div>                             
                	<div class="control-group">
                    	<label class="control-label">
                    		<?php _e( "Service Name :", bookings_plus ); ?><span class="req">*</span>
                    	</label>
                        <div class="controls"><input type="text" class="required span12" name="uxServiceName" id="uxServiceName"/></div>
                    </div>
                    <div class="control-group">
                    	<?php
                    	$costIcon = $wpdb->get_var
                    	(
                    		$wpdb->prepare
                    		(
                    			"SELECT CurrencySymbol FROM ".currenciesTable()." where CurrencyUsed = %d",
                    			1
                    		)
						);
                    	?>
                    	<label class="control-label"><?php _e( "Service Cost (".$costIcon."):", bookings_plus ); ?>
                    		<span class="req">*</span>
                    	</label>
                        <div class="controls">
                        	<input type="text" class="required span12" name="uxServiceCost" id="uxServiceCost"/>
                        </div>
                    </div>
                    <div class="control-group">
		         		<label class="control-label"><?php _e( "Service Type :", bookings_plus );?>
	               			<span class="req">*</span>
	               		</label>
						<div class="controls">
			            
							<label class="radio">
								<input type="radio" id="uxServiceTypeEnable" name="uxServiceType" class="style" value="0" onclick="singleBooking();" checked="checked"><?php _e( "Single Booking", bookings_plus );?>
							</label>
							<label class="radio">
								<input type="radio" id="uxServiceTypeDisable" name="uxServiceType" onclick="groupBooking();" class="style" value="1"><?php _e( "Group Bookings", bookings_plus );?>
							</label>		
						</div>
	           		</div>
                    <div class="control-group" id="maxBooking" Style="display: none;">
                    	<label class="control-label">
                    		<?php _e( "Max Bookings<br/>(Each Slot) :", bookings_plus ); ?><span class="req">*</span>
                        </label>
                        <div class="controls">
                        	<input type="text" class="required span12" name="uxMaxBookings" id="uxMaxBookings" value="1"/>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label"><?php _e( "Service Time :", bookings_plus ); ?>
                    		<span class="req">*</span>
                        </label>
                        <div class="controls">
                        	<select name="uxServiceHours" class="required" id="uxServiceHours" style="width:100px;" >
                            	<?php
								for ($hr = 0; $hr <= 23; $hr++) 
								{
									if ($hr < 10) 
									{
										echo "<option value=0" . $hr . " >0" . $hr . "  Hours</option>";
									}
									else 
									{
										echo "<option value=" . $hr . ">" . $hr . "  Hours</option>";
									}
								}
								?>
                            </select>
                            <select name="uxServiceMins" class="required" id="uxServiceMins" style="width:100px;" >
                            	<?php
								for ($min = 0; $min < 60; $min += 5) 
								{
									if ($min < 10) 
									{
										echo "<option value=0" . $min . ">0" . $min . " Minutes</option>";
									}
									else
									{
										echo "<option value=" . $min . ">" . $min . "  Minutes</option>";
									}
								}
								?>
                            </select>
                        </div>
                    </div>
                </div>
          	</div>
          	<div class="form-actions" style="padding:10px 0px;">
            	<input type="submit" id="btnAddNewService" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
            </div>
		</div>
	</form>
</div>
<div id="resourcesVisiblity" class="modal hide fade" role="dialog" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>	
        <h5><?php _e( "Resources Visbility", bookings_plus ); ?></h5>
    </div>
	<form id="uxFrmResourcesVisibility" class="form-horizontal" method="post" action="#">
		<div class="body">
			<div class="note note-success" id="successResourcesMessage" style="display:none">
				<strong><?php _e( "Success! Resources Visiblity has been saved.", bookings_plus ); ?></strong>
            </div>
   	  		<div class="block well" style="margin-top:10px;">
                <div class="row-fluid form-horizontal">                            
                	<div class="control-group">
                    	<label class="control-label">
                    		<?php _e( "Resources Visibility :", bookings_plus ); ?><span class="req">*</span>
                    	</label>
                        <div class="controls">
                        	<label class="radio">
								<input type="radio" id="uxResourceVisibilityEnable" name="uxResourceVisibility"  value="1" ><?php _e( "Enabled", bookings_plus );?>
							</label>
							<label class="radio">
								<input type="radio" id="uxResourceVisibilityDisable" name="uxResourceVisibility"  value="0"><?php _e( "Disabled", bookings_plus );?>
							</label>		                        	
                        </div>
                    </div>
				</div>
             </div>
          	 <div class="form-actions" style="padding:10px 0px;">
	            	<input type="submit" id="btnResourcesVisibility" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
	         </div>
		</div>
	</form>
</div>
<div id="addNewEmployee" class="modal hide fade" role="dialog" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>	
		<h5><?php _e( "Add New Resource", bookings_plus ); ?></h5>
    </div>
	<form id="uxFrmAddEmployees" class="form-horizontal" method="post" action="#">
		<div class="body">
			<div class="note note-success" id="addEmployeeSuccessMessage" style="display:none">
				<strong><?php _e( "Success! Staff Member has been saved.", bookings_plus ); ?></strong>
            </div>
            <div class="note note-danger" id="errorMessageCheckEmail" style="display:none">
				<strong><?php _e( "Error! This Email already exists in our Database. Please try with new one.", bookings_plus ); ?></strong>
            </div>
	           
          	<div class="block well" style="margin-top:10px;">
                <div class="row-fluid form-horizontal">        
                    <div class="control-group">
                    	<label class="control-label"><?php _e( "Resource Name :", bookings_plus ); ?>
                    		<span class="req">*</span>
                    	</label>
                        <div class="controls">
                        	<input type="text" class="required span12" name="uxEmployeeName" id="uxEmployeeName"/>
                        </div>
                    </div>
                    <div class="control-group" id="groupEmailAddress">
                    	<label class="control-label"><?php _e( "Resource Email :", bookings_plus ); ?>
                    		<span class="req">*</span>
                    	</label>
                        <div class="controls">
                        	<input type="text" class="required span12" name="uxEmployeeEmail" id="uxEmployeeEmail"/>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label"><?php _e( "Resource Phone :", bookings_plus ); ?>
                    		<span class="req">*</span>
                    	</label>
                        <div class="controls">
                        	<input type="text" class="required span12" name="uxEmployeePhone" id="uxEmployeePhone"/>
                        </div>
                    </div>                 
                </div>                  
          	</div>
            <div class="form-actions" style="padding:10px 0px 0px 0px;">
            	<input type="submit" id="btnAddNewEmployee" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
            </div>          	
		</div>
	</form>
</div>
<div id="allocateServices" class="modal hide fade" role="dialog" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>	
        <h5><?php _e( "Assign Services to Resources", bookings_plus ); ?></h5>
    </div>
	<form id="uxFrmAllocateServices" class="form-horizontal" method="post" action="#">
		<div class="body">
			<div class="note note-success" id="allocatedSuccessMessage" style="display:none">
				<strong><?php _e( "Success! Services has been Assigned.", bookings_plus ); ?></strong>
	        </div>
			<div class="note note-danger" id="allocatedErrorMessage" style="display:none">
				<strong><?php _e( "Error! Please Choose a Resource to Assign Services.", bookings_plus ); ?></strong>
	        </div>
     
	        <div class="block well" style="margin-top:10px;">
	            <div class="row-fluid form-horizontal">
	            	<div class="control-group">
                    	<label class="control-label">
                    		<?php _e( "Resource :", bookings_plus ); ?><span class="req">*</span>
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
							<select name="uxDdlEmployees" class="required" id="uxDdlEmployees" onchange="allocateService();">
	                        	<option value ="opt1"><?php _e( "Please Choose Resource", bookings_plus ); ?></option>	
	                            <?php
	                            	for( $flagEmployeeDropdown = 0; $flagEmployeeDropdown < count($employees); $flagEmployeeDropdown++)
								    {
								?>
										<option value ="<?php echo $employees[$flagEmployeeDropdown] -> EmployeeId;?>"><?php echo $employees[$flagEmployeeDropdown] -> EmployeeName;?></option>
								<?php 
									} 
								?>
                            </select>
                            <input type="hidden" id="hdEmployeeId" />	
						</div>
                    </div>
                    <div class="table-overflow">
                        <table class="table table-striped" id="data-table1">
                            <thead>
                                <tr>
                                    <th>
                                    	<input type="checkbox" class="style" id="headerCheckBox" onchange="headerCheckAll();" />
                                    </th>
                                    <th><?php _e( "Service Name", bookings_plus ); ?></th>
                                    <th><?php _e( "Service Time", bookings_plus ); ?></th>
                                    <th><?php _e( "Cost", bookings_plus ); ?></th>
                                    <th><?php _e( "Type", bookings_plus ); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            		$allocatedServices = $wpdb->get_results
									(
										$wpdb->prepare
										(
											'SELECT '.servicesTable().'.ServiceId, '.servicesTable().'.ServiceName,  '.servicesTable().'.Type,
											 '.servicesTable().'.ServiceCost,'.servicesTable().'.ServiceMaxBookings, '.servicesTable().'.ServiceShortCode,
											 '.servicesTable().'.ServiceTotalTime, ' . servicesTable() . '.ServiceDisplayOrder
											 FROM '.servicesTable().'  ORDER BY ' . servicesTable() . '.ServiceDisplayOrder ASC ',''
										)
									);
									
									for($flagAllocate = 0; $flagAllocate < count($allocatedServices); $flagAllocate++)
									{
										$hrs = floor(($allocatedServices[$flagAllocate] -> ServiceTotalTime) / 60);
										$mins = ($allocatedServices[$flagAllocate] -> ServiceTotalTime) % 60;
								?>
		                                <tr>
		                                	<td>
	                                			<input type="checkbox" class="style" id="chkAllocation<?php echo $allocatedServices[$flagAllocate] -> ServiceId; ?>" value="<?php echo $allocatedServices[$flagAllocate] -> ServiceId; ?>" />
		                                	</td>
		                                    <td><?php echo $allocatedServices[$flagAllocate] -> ServiceName;?></td>
												<td><?php
												if($hrs == 0)
												{
													echo $mins;
													_e( " Mins", bookings_plus ); 										
												}
												else if($mins == 0)
												{
													echo $hrs;
													_e( " Hrs", bookings_plus ); 
												}
												else 
												{
													echo $hrs; 
													_e( " Hr ", bookings_plus );
													echo $mins;
													_e( " Mins", bookings_plus );
												}
												?>
												</td>
												<td><?php echo ($costIcon).$allocatedServices[$flagAllocate] -> ServiceCost;?></td>
												<td><?php 
											if($allocatedServices[$flagAllocate]->Type == 0)
											{
												echo _e( "Single Booking", bookings_plus );
											}
											else 
											{
												echo _e( "Group Bookings (".$allocatedServices[$flagAllocate] -> ServiceMaxBookings .")", bookings_plus );
											}
											?></td>
		                               	</tr>
		                        		<?php
                               		}
										?>
                            </tbody>
                        </table> 
                    </div>                            
	            </div>
	        </div>
	        <div class="form-actions" style="padding:10px 0px;">
           		<input type="submit" id="btnAssignServices" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
            </div>
	    </div>
    </form>
</div>
<div id="workingHours" class="modal hide fade" role="dialog" aria-hidden="true">
	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>	
		    <h5><?php _e( "Business Hours", bookings_plus ); ?></h5>
    </div>
	<form id="uxFrmWorkingHours" class="form-horizontal" method="post" action="#">
		<div class="body">
			<div class="note note-success" id="workingHoursSuccessMessage" style="display:none">
				<strong><?php _e( "Success! The Working Hours has been updated Successfully.", bookings_plus ); ?></strong>
	        </div>
			<div class="note note-danger" id="WorkingHoursErrorMessage" style="display:none">
				<strong><?php _e( "Error! Please Choose a Resource to save Working Hours.", bookings_plus ); ?></strong>
	        </div>			
	        <div class="block well" style="margin-top:10px;">
	            <div class="row-fluid form-horizontal">
	            	  <?php
					$ResourcesEnable = $wpdb->get_var
					(
						$wpdb->prepare
						(
							"SELECT GeneralSettingsValue FROM ".generalSettingsTable()." where GeneralSettingsKey  = %s ",
						   	"resources-visible-enable"
						)
					);
						
				 if($ResourcesEnable == 1)
				 {
				 	
				?>	            
	                <div class="control-group">
                    	<label class="control-label"><?php _e( "Resource :", bookings_plus ); ?>
                        	<span class="req">*</span>
                        </label>
                        <div class="controls">
                        	<?php
								$employees = $wpdb->get_results
								(
									$wpdb->prepare
									(
										"SELECT * FROM " . employeesTable() . " order by EmployeeName ASC",''
									)
								);
								?>
                            	<select name="uxDdlWorkingEmployees"  class="style required" id="uxDdlWorkingEmployees" onchange="employeeWorkingHours();">
	                            	<option value ="opt1"><?php _e( "Please Choose Resource", bookings_plus ); ?></option>	
	                              	<?php
	                                	for( $flagEmployeeDropdown = 0; $flagEmployeeDropdown < count($employees); $flagEmployeeDropdown++)
									  	{
								  	?>
										  	<option value ="<?php echo $employees[$flagEmployeeDropdown] -> EmployeeId;?>"><?php echo $employees[$flagEmployeeDropdown] -> EmployeeName;?></option>
								  	<?php 
									 	} 
								  	?>
                              	</select>	
						</div>
                    </div>
                   <?php
                   }
					?>
	                <div class="table-overflow">
						<table class="table table-striped" id="data-table2">
							<style type="text/css">#data-table2 td {padding:8px 6px}</style>
							<thead>
								<tr>
									<th></th>
							     	<th><?php _e( "Monday", bookings_plus ); ?></th>
							     	<th><?php _e( "Tuesday", bookings_plus ); ?></th>
							        <th><?php _e( "Wednesday", bookings_plus ); ?></th>
							        <th><?php _e( "Thursday", bookings_plus ); ?></th>
							        <th><?php _e( "Friday", bookings_plus ); ?></th>
							        <th><?php _e( "Saturday", bookings_plus ); ?></th>
							        <th><?php _e( "Sunday", bookings_plus ); ?></th>							         
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php _e( "Open / Closed", bookings_plus ); ?></td>
									<td>
	                 					<label class="radio">
	                 						<input type="radio" id="uxDayOpenMonday" name="uxDayOpenClosedMonday" class="style" value="1" checked="checked"><?php _e( "Open", bookings_plus ); ?>
	                 					</label>
										<label class="radio">
											<input type="radio" id="uxDayClosedMonday" name="uxDayOpenClosedMonday" class="style" value="0"><?php _e( "Closed", bookings_plus ); ?>
										</label>                                     		 									
									</td>
									<td>
	                 					<label class="radio">
	                 						<input type="radio" id="uxDayOpenTuesday" name="uxDayOpenClosedTuesday" class="style" value="1" checked="checked"><?php _e( "Open", bookings_plus ); ?>
	                 					</label>
										<label class="radio">
											<input type="radio" id="uxDayClosedTuesday" name="uxDayOpenClosedTuesday" class="style" value="0"><?php _e( "Closed", bookings_plus ); ?>
										</label>
                                    </td>
									<td>
	                 					<label class="radio">
	                 						<input type="radio" id="uxDayOpenWednesday" name="uxDayOpenClosedWednesday" class="style" value="1" checked="checked"><?php _e( "Open", bookings_plus ); ?>
	                 					</label>
										<label class="radio">
											<input type="radio" id="uxDayClosedWednesday" name="uxDayOpenClosedWednesday" class="style" value="0"><?php _e( "Closed", bookings_plus ); ?>
										</label>
                                    </td>
									<td>
	                 					<label class="radio">
	                 						<input type="radio" id="uxDayOpenThursday" name="uxDayOpenClosedThursday" class="style" value="1" checked="checked"><?php _e( "Open", bookings_plus ); ?>
	                 					</label>
										<label class="radio">
											<input type="radio" id="uxDayClosedThursday" name="uxDayOpenClosedThursday" class="style" value="0"><?php _e( "Closed", bookings_plus ); ?>
										</label>
                                   	</td>
									<td>
	                 					<label class="radio">
	                 						<input type="radio" id="uxDayOpenFriday" name="uxDayOpenClosedFriday" class="style" value="1" checked="checked"><?php _e( "Open", bookings_plus ); ?>
	                 					</label>
										<label class="radio">
											<input type="radio" id="uxDayClosedFriday" name="uxDayOpenClosedFriday" class="style" value="0"><?php _e( "Closed", bookings_plus ); ?>
										</label>                                     		 	
                                    </td>
									<td>
	                 					<label class="radio">
	                 						<input type="radio" id="uxDayOpenSaturday" name="uxDayOpenClosedSaturday" class="style" value="1" checked="checked"><?php _e( "Open", bookings_plus ); ?>
	                 					</label>
										<label class="radio">
											<input type="radio" id="uxDayClosedSaturday" name="uxDayOpenClosedSaturday" class="style" value="0"><?php _e( "Closed", bookings_plus ); ?>
										</label>
                                    </td>
									<td>
	                 					<label class="radio">
	                 						<input type="radio" id="uxDayOpenSunday" name="uxDayOpenClosedSunday" class="style" value="1" checked="checked"><?php _e( "Open", bookings_plus ); ?>
	                 					</label>
										<label class="radio">
											<input type="radio" id="uxDayClosedSunday" name="uxDayOpenClosedSunday" class="style" value="0"><?php _e( "Closed", bookings_plus ); ?>
										</label>
                                    </td>
								</tr>
								<tr>
									<td><?php _e( "Start Hours", bookings_plus ); ?></td>	
									<td>
										<select name="uxDdlStartMonday" class="style required" id="uxDdlStartMonday" style="width:75px"></select>
									</td>
									<td>
										<select name="uxDdlStartTuesday" class="style required" id="uxDdlStartTuesday" style="width:75px"></select>										
									</td>
									<td>
										<select name="uxDdlStartWednesday" class="style required" id="uxDdlStartWednesday" style="width:75px"></select>											
									</td>
									<td>
										<select name="uxDdlStartThursday" class="style required" id="uxDdlStartThursday" style="width:75px"></select>											
									</td>
									<td>
										<select name="uxDdlStartFriday" class="style required" id="uxDdlStartFriday" style="width:75px"></select>											
									</td>
									<td>
										<select name="uxDdlStartSaturday" class="style required" id="uxDdlStartSaturday" style="width:75px"></select>											
									</td>
									<td>
										<select name="uxDdlStartSunday" class="style required" id="uxDdlStartSunday" style="width:75px"></select>											
									</td>
								</tr>
								<tr>
									<td><?php _e( "End Hours", bookings_plus ); ?></td>
									<td>
										<select name="uxDdlEndMonday" class="style required" id="uxDdlEndMonday" style="width:75px"></select>											
									</td>
									<td>
										<select name="uxDdlEndTuesday" class="style required" id="uxDdlEndTuesday" style="width:75px"></select>										
									</td>
									<td>
										<select name="uxDdlEndWednesday" class="style required" id="uxDdlEndWednesday" style="width:75px"></select>											
									</td>
									<td>
										<select name="uxDdlEndThursday" class="style required" id="uxDdlEndThursday" style="width:75px"></select>											
									</td>
									<td>
										<select name="uxDdlEndFriday" class="style required" id="uxDdlEndFriday" style="width:75px"></select>											
									</td>
									<td>
										<select name="uxDdlEndSaturday" class="style required" id="uxDdlEndSaturday" style="width:75px"></select>											
									</td>
									<td>
										<select name="uxDdlEndSunday" class="style required" id="uxDdlEndSunday" style="width:75px"></select>											
									</td>
								</tr>
							</tbody>
						</table>
					</div>
	            </div>
			</div>
			<div class="form-actions" style="padding:10px 0px 0px 0px;">
	    		<input type="submit"  id="btnWorkingHours"  value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
	   		</div>  
		</div>	 		
	</form>
</div>
<div id="defaultSettings" class="modal hide fade" role="dialog" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>	
        <h5><?php _e( "Default Settings", bookings_plus ); ?></h5>
    </div>
	<form id="uxFrmGeneralSettings" class="form-horizontal" method="post" action="#">
		<div class="body">
			<div class="note note-success" id="successDefaultSettingsMessage" style="display:none">
				<strong><?php _e( "Success! Default Settings has been saved.", bookings_plus ); ?></strong>
            </div>
   	  	
          	<div class="block well" style="margin-top:10px;">
                <div class="row-fluid form-horizontal">                            
					<div class="control-group">
					<label class="control-label"><?php _e( "Currency :", bookings_plus ); ?>
						<span class="req">*</span>
					</label>
					<div class="controls">
					<?php
					$currency = $wpdb->get_col
					(
						$wpdb->prepare
						(
								"SELECT CurrencyName From ".currenciesTable()." order by CurrencyName ASC",''
						)
					);	
					$currency_code = $wpdb->get_col
					(
						$wpdb->prepare
						(
								"SELECT CurrencySymbol From ".currenciesTable()." order by CurrencyName ASC",''
						)
					);	
					$currency_sel = $wpdb -> get_var
					(
						$wpdb->prepare
						(
							"SELECT CurrencyName FROM ".currenciesTable(). " where CurrencyUsed = %d",
							1
						)
					);
					?>
						<select name="uxDdlDefaultCurrency" id="uxDdlDefaultCurrency" style="width:200px;">
					<?php
					for ($flagCurrency = 0; $flagCurrency < count($currency); $flagCurrency++)
					{
						if ($currency[$flagCurrency] == $currency_sel)
						{
							$currencyCode = $currency_code[$flagCurrency];
							?>
							<option value="<?php echo $currency[$flagCurrency];?>" selected='selected'><?php echo "(" . $currencyCode . ")  ";echo $currency[$flagCurrency];?></option>
							<?php 
						}
						else
						{
						?>
							<option value="<?php echo $currency[$flagCurrency];?>"><?php echo "(" . $currency_code[$flagCurrency] . ")  ";echo $currency[$flagCurrency]; ?></option>
						<?php 
						}
					}
					?>                           		 	
				</select>	
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"><?php _e( "Country :", bookings_plus ); ?>
				<span class="req">*</span>
			</label>
			<div class="controls">
				<select name="uxDdlDefaultCountry" class="style required" id="uxDdlDefaultCountry" style="width:200px;">  
				<?php
				$country = $wpdb->get_col
				(
					$wpdb->prepare
					(
						"SELECT CountryName From ".countriesTable()."  order by CountryName ASC"
					)
				);	
				$sel_country = $wpdb -> get_var
				(
					$wpdb->prepare
					(	
						'SELECT CountryName  FROM ' . countriesTable() . ' where CountryUsed = %d',
						1
					)
				);
				for ($flagCountry = 0; $flagCountry < count($country); $flagCountry++)
				{
					if ($sel_country == $country[$flagCountry])
					{
					?>
						<option value="<?php echo $country[$flagCountry];?>" selected='selected'><?php echo $country[$flagCountry];?></option>
					<?php 
					}
																		else
													                	{
														   	?>
														    				 <option value="<?php echo $country[$flagCountry];?>"><?php echo $country[$flagCountry];?></option>
														    <?php 
													        			}
												                   }
												            ?>                      		 	
								           	                </select>	
										                </div>
						          	                </div>
						          	                <div class="control-group">
						                            		<?php
							                            		$dateFormat = $wpdb->get_var
							                            		(
																	$wpdb->prepare
																	(	
							                            				'SELECT GeneralSettingsValue   FROM ' . generalSettingsTable() . ' where GeneralSettingsKey = %s',
							                            				"default_Date_Format"
							                            			)
																);
															?>
						    	                           	<label class="control-label"><?php _e( "Date Format :", bookings_plus ); ?>
						    	                            	<span class="req">*</span>
						    	                            </label>
						                                    <div class="controls">
						                                    	<select name="uxDefaultDateFormat" class="style required" id="uxDefaultDateFormat" style="width:200px;">
																	<?php
																	$date = date('j'); 
																	$monthName = date('F');
																	$monthNumeric = date('m');
																	$year = date('Y');
																	 				                                    		
						                                    		if($dateFormat == 0)
								                            		{
								                            		?>	
						                                    			<option value="0" selected="selected"><?php echo  $monthName ." ".$date.",  ".$year; ?></option>
						                                    			<option value="1"><?php echo  $year ."/".$monthNumeric."/".$date; ?></option>
						                                    			<option value="2"><?php echo  $monthNumeric ."/".$date."/".$year; ?></option>
						                                    			<option value="3"><?php echo $date ."/".$monthNumeric."/".$year;  ?></option>
																	<?php				                                    			
						                                    		}
																	else if($dateFormat == 1)
																	{
																	?>
																		<option value="0"><?php echo  $monthName ." ".$date.",  ".$year; ?></option>
						                                    			<option value="1" selected="selected"><?php echo  $year ."/".$monthNumeric."/".$date; ?></option>
						                                    			<option value="2"><?php echo  $monthNumeric ."/".$date."/".$year; ?></option>
						                                    			<option value="3"><?php echo $date ."/".$monthNumeric."/".$year;  ?></option>
																	<?php				                                    																			
																	}
						                                    		
						                                    		else if($dateFormat == 2)
																	{
																	?>
																		<option value="0"><?php echo  $monthName ." ".$date.",  ".$year; ?></option>
						                                    			<option value="1" ><?php echo  $year ."/".$monthNumeric."/".$date; ?></option>
						                                    			<option value="2" selected="selected"><?php echo  $monthNumeric ."/".$date."/".$year; ?></option>
						                                    			<option value="3"><?php echo $date ."/".$monthNumeric."/".$year;  ?></option>
																	<?php				                                    																			
																	}
						                                    			
						                                    		else 
																	{
																	?>
																		<option value="0"><?php echo  $monthName ." ".$date.",  ".$year; ?></option>
						                                    			<option value="1" ><?php echo  $year ."/".$monthNumeric."/".$date; ?></option>
						                                    			<option value="2"><?php echo  $monthNumeric ."/".$date."/".$year; ?></option>
						                                    			<option value="3" selected="selected"><?php echo $date ."/".$monthNumeric."/".$year;  ?></option>
																	<?php				                                    																			
																	}
						                                    		?>																
						                                    	</select> 				                                   
															</div>
						                            </div>
						                            <div class="control-group">
						                            		<?php
							                            		$timeFormat = $wpdb -> get_var
							                            		(
																	$wpdb->prepare
																	(	
							                            				'SELECT GeneralSettingsValue   FROM ' . generalSettingsTable() . ' where GeneralSettingsKey = %s',
							                            				"default_Time_Format"
							                            			)
																);
							                            		$minuteFormat = $wpdb -> get_var
																(
																	$wpdb->prepare
																	(	
							                            				'SELECT GeneralSettingsValue   FROM ' . generalSettingsTable() . ' where GeneralSettingsKey = %s',
							                            				"default_Slot_Minute_Format"
							                            			)
																);
															?>
						    	                           	<label class="control-label"><?php _e( "Time Format :", bookings_plus ); ?>
						    	                            	<span class="req">*</span>
						    	                            </label>
						                                    <div class="controls">
						                                    	<select name="uxDefaultTimeFormat" class="style required" id="uxDefaultTimeFormat" style="width:200px;">
																	<?php				                                    		
						                                    		if($timeFormat == 0)
								                            		{
								                           			?>	
						                                    			<option value="0" selected="selected"><?php _e( "12 Hours", bookings_plus ); ?></option>
						                                    			<option value="1"><?php _e( "24 Hours", bookings_plus ); ?></option>
																	<?php				                                    			
						                                    		}
																	else 
																	{
																	?>
																		<option value="0"><?php _e( "12 Hours", bookings_plus ); ?></option>
						                                    			<option value="1" selected="selected"><?php _e( "24 Hours", bookings_plus ); ?></option>
																	<?php				                                    																			
																	}
						                                    		?>															
						                                    	</select> 				                                   
															</div>
						                            </div>
						                            <div class="control-group">
						                            		<?php
							                            		$default_Time_Zone = $wpdb->get_var
							                            		(
																	$wpdb->prepare
																	(	
							                            				'SELECT GeneralSettingsValue   FROM ' . generalSettingsTable() . ' where GeneralSettingsKey = %s',
							                            				"default_Time_Zone"
							                            			)
																);
							                            	?>
						    	                           	<label class="control-label"><?php _e( "Time Zone :", bookings_plus ); ?>
						    	                            	<span class="req">*</span>
						    	                            </label>
						                                    <div class="controls">
						                                    	<select name="uxDefaultTimeZone" class="style required" id="uxDefaultTimeZone" style="width:350px;">
																  <option value="-12.0">(GMT -12:00) Eniwetok, Kwajalein</option>
															      <option value="-11.0">(GMT -11:00) Midway Island, Samoa</option>
															      <option value="-10.0">(GMT -10:00) Hawaii</option>
															      <option value="-9.0">(GMT -9:00) Alaska</option>
															      <option value="-8.0">(GMT -8:00) Pacific Time (US &amp; Canada)</option>
															      <option value="-7.0">(GMT -7:00) Mountain Time (US &amp; Canada)</option>
															      <option value="-6.0">(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
															      <option value="-5.0">(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
															      <option value="-4.0">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
															      <option value="-3.5">(GMT -3:30) Newfoundland</option>
															      <option value="-3.0">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
															      <option value="-2.0">(GMT -2:00) Mid-Atlantic</option>
															      <option value="-1.0">(GMT -1:00 hour) Azores, Cape Verde Islands</option>
															      <option value="0.0">(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
															      <option value="1.0">(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
															      <option value="2.0">(GMT +2:00) Kaliningrad, South Africa</option>
															      <option value="3.0">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
															      <option value="3.5">(GMT +3:30) Tehran</option>
															      <option value="4.0">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
															      <option value="4.5">(GMT +4:30) Kabul</option>
															      <option value="5.0">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
															      <option value="5.5">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
															      <option value="5.75">(GMT +5:45) Kathmandu</option>
															      <option value="6.0">(GMT +6:00) Almaty, Dhaka, Colombo</option>
															      <option value="7.0">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
															      <option value="8.0">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
															      <option value="9.0">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
															      <option value="9.5">(GMT +9:30) Adelaide, Darwin</option>
															      <option value="10.0">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
															      <option value="11.0">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
															      <option value="12.0">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>													
						                                    	</select>
						                                    	<script>
						                                    		jQuery('#uxDefaultTimeZone').val("<?php echo html_entity_decode($default_Time_Zone); ?>");
						                                    	</script> 				                                   
															</div>
						                            </div>
						                            <?php
						                            $hourTotalFormat = $wpdb->get_var
						                            (
														$wpdb->prepare
														(	
							                            	"select GeneralSettingsValue  from ". generalSettingsTable()." where GeneralSettingsKey = %s",
							                            	"default_Slot_Total_Time_Format"
							                            )
													);
						                            $getHours = floor(($hourTotalFormat)/60);
													$getMins = ($hourTotalFormat) % 60;			
													if($getMins < 10)	
													{
														$getMins = $getMins;
													}					             
						                            ?>
							                        <div class="control-group">
							                        	<label class="control-label"><?php _e( "Booking Slot Size :", bookings_plus ); ?>
						                                       <span class="req">*</span>
						                                </label>
						                                <div class="controls">
							                               	<select name="uxSlotHours" class="style required" id="uxSlotHours" style="width:100px;">
									                        <?php
															for ($hr = 0; $hr <= 23; $hr++) 
															{
																if ($hr < 10 && $hr == $getHours) 
																{
																	echo "<option selected=\"selected\" value=0" . $hr . " >0" . $hr . "  Hours</option>";
																}
																else if($hr == $getHours) 
																{
																	echo "<option selected=\"selected\" value=" . $hr . " >" . $hr . "  Hours</option>";
																}
																else 
																{
																	echo "<option value=" . $hr . ">" . $hr . "  Hours</option>";
																}
															}
															?>
										                    </select>
										                    <select name="uxSlotMins" class="style required" id="uxSlotMins" style="width:100px;"> 
										                    <?php
															for ($min = 0; $min < 60; $min += 5) 
															{
																if ($min < 10 && $min == $getMins) 
																{
																	echo "<option selected=\"selected\" value=0" . $min . ">0" . $min . " Minutes</option>";
																}
																else if ($min == $getMins) 
																{
																	echo "<option selected=\"selected\" value=" . $min . ">" . $min . " Minutes</option>";
																}
																else
																{
																	echo "<option value=" . $min . ">" . $min . "  Minutes</option>";
																}
															}
															?>
										                    </select>
									                	</div>
						                       		</div>
				</div>
             </div>
          	 <div class="form-actions" style="padding:10px 0px;">
	            	<input type="submit" id="btnResourcesVisibility" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
	         </div>
		</div>
	</form>
</div>
<div id="paypalSettings" style="width:800px;display:none;" class="modal hide fade" role="dialog" aria-hidden="true">
	<form id="uxFrmPayPalGatewaySettings" class="form-horizontal" method="post" action="#">
		<div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		    <h5><?php _e( "PayPal Settings",bookings_plus ); ?></h5>
		</div>
		<div class="body">
			<div class="note note-success" id="successPaypalSettingsMessage" style="display:none">
				<strong><?php _e( "Success! Paypal Gateway Settings has been saved.", bookings_plus ); ?></strong>
            </div>   	  	
          	<div class="block well" style="margin-top:10px;">
                <div class="row-fluid form-horizontal">
                	<div class="control-group">
				        <?php
			         		$paypalStatus = $wpdb -> get_var
			         		(
			         			$wpdb->prepare
			         			(
			         					'SELECT PaymentGatewayValue FROM ' . payment_Gateway_settingsTable() . ' where PaymentGatewayKey  = %s',
			         					"paypal-enabled"
			         			)
							);
			         	?>	
		            	<label class="control-label"><?php _e( "PayPal :", bookings_plus ); ?>
		               		<span class="req">*</span>
		               	</label>
		                <div class="controls">
		                	<?php
							if($paypalStatus == 1)
							{
							?>
								<label class="radio">
									<input type="radio" id="uxPayPalEnable" name="uxPayPal" class="style" onclick="enablePaypalText();" value="1" checked="checked"><?php _e( "Enabled", bookings_plus );?>
								</label>
								<label class="radio">
									<input type="radio" id="uxPayPalDisable" name="uxPayPal" onclick="disablePaypalText();" class="style" value="0"><?php _e( "Disabled", bookings_plus );?>
								</label>	
							<?php
							}
							else 
							{
							?>
								<label class="radio">
									<input type="radio" id="uxPayPalEnable" name="uxPayPal" class="style" onclick="enablePaypalText();" value="1"><?php _e( "Enabled", bookings_plus );?>
								</label>
								<label class="radio">
									<input type="radio" id="uxPayPalDisable" name="uxPayPal" onclick="disablePaypalText();" class="style" value="0" checked="checked"> <?php _e( "Disabled", bookings_plus );?>
								</label>
							<?php
							}
							?>
			            </div>
		            </div>
		            <div class="control-group" id="paypalUrl" style="display: none;"> 
				        <?php
			         		$paypalURLTest = $wpdb -> get_var
			         		(
			         			$wpdb->prepare
			         			(
			         					'SELECT PaymentGatewayValue FROM ' . payment_Gateway_settingsTable() . ' where PaymentGatewayKey  = %s',
			         					"paypal-Test-Url"
			         			)
							);
			         	?>
		            	<label class="control-label"><?php _e( "PayPal Url :", bookings_plus ); ?>
		               		<span class="req">*</span>
		               	</label>
		                <div class="controls searchDrop">
		                	<?php
							if($paypalURLTest == "https://paypal.com/cgi-bin/webscr")
							{
							?>
								<label class="radio">
									<input type="radio" id="uxPaypalUrlLive" name="uxPayPalurl" class="style"  value="https://paypal.com/cgi-bin/webscr" checked="checked"><?php _e( "Live", bookings_plus );?>
								</label>
								<label class="radio">
									<input type="radio" id="uxPaypalUrlSandbox" name="uxPayPalurl" class="style" value="https://sandbox.paypal.com/cgi-bin/webscr"><?php _e( "Sandbox", bookings_plus );?>
								</label>	
							<?php
							}
							else 
							{
							?>
								<label class="radio">
									<input type="radio" id="uxPaypalUrlLive" name="uxPayPalurl" class="style"  value="https://paypal.com/cgi-bin/webscr"><?php _e( "Live", bookings_plus );?>
								</label>
								<label class="radio">
									<input type="radio" id="uxPaypalUrlSandbox" name="uxPayPalurl"  class="style" value="https://sandbox.paypal.com/cgi-bin/webscr" checked="checked"> <?php _e( "Sandbox", bookings_plus );?>
								</label>
							<?php
							}
							?>
			            </div>
		            </div>
			        <div class="control-group" id="paypalMerchantEmail" style="display: none;">
			        	<?php
		         			$paypalMarchantEmail = $wpdb -> get_var
		         			(
			         			$wpdb->prepare
			         			(
			         					'SELECT PaymentGatewayValue FROM ' . payment_Gateway_settingsTable() . '  where PaymentGatewayKey  = %s',
			         					"paypal-merchant-email-address"
			         			)
							);
		         		?>
		                 <label class="control-label"><?php _e( "Paypal Email Address :", bookings_plus ); ?>
							<span class="req">*</span>
		                 </label>
						<div class="controls">
							<input type="text" class="required span12" name="uxMerchantEmailAddress" id="uxMerchantEmailAddress" value="<?php echo $paypalMarchantEmail; ?>"/>
						</div>
		          	</div>
			        <div class="control-group" id="paypalThankYou" style="display: none;">
			        	<?php
		         			$paypalThankYouUrl = $wpdb -> get_var
		         			(
			         			$wpdb->prepare
			         			(
			         					'SELECT PaymentGatewayValue FROM ' . payment_Gateway_settingsTable() . ' where PaymentGatewayKey  = %s',
			         					"paypal-thankyou-page-url"
			         			)
							);
		         		?>
		                <label class="control-label"><?php _e( "Success Page Url :", bookings_plus ); ?>
		                	<span class="req">*</span>
		                </label>
						<div class="controls">
							<input type="text" class="required span12" name="uxThankyouPageUrl" id="uxThankyouPageUrl" value="<?php echo $paypalThankYouUrl;  ?>"/>
						</div>
					</div>          	
			        <div class="control-group" id="paypalCancellation" style="display: none;">
			        	<?php
			       		$paypalCancelUrl = $wpdb -> get_var
		         			(
			         			$wpdb->prepare
			         			(
			         					'SELECT PaymentGatewayValue FROM ' . payment_Gateway_settingsTable() . ' where PaymentGatewayKey  = %s',
			         					"paypal-payment-cancellation-Url"
			         			)
							);
							?>
						<label class="control-label"><?php _e( "Cancel Page Url :", bookings_plus ); ?>
		               		<span class="req">*</span>
		               	</label>
						<div class="controls">
							<input type="text" class="required span12" name="uxCancellationUrl" id="uxCancellationUrl" value="<?php echo $paypalCancelUrl;  ?>"/>
						</div>       	            	  
		         	</div>
			        <div class="control-group" id="paypalIPN" style="display: none;">
			        <?php
		         		$paypalIpnUrl = $url."/paypal.php?action=ipn";
		         	?>
		            	<label class="control-label"><?php _e( "IPN Url :", bookings_plus ); ?>
		            		<span class="req">*</span>
		                 </label>
						<div class="controls">
							<input type="text" class="required span12" name="uxIPNUrl" id="uxIPNUrl" value="<?php echo $paypalIpnUrl;  ?>" disabled="disabled"/>
						</div>
		          	</div>		         		
                </div>
            </div>
          	 <div class="form-actions" style="padding:10px 0px;">
	            	<input type="submit" id="btnPayaplSettings" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
	         </div>            
        </div>
               	
	</form>
</div>
<div id="autoApproveBookings" class="modal hide fade" role="dialog" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>	
        <h5><?php _e( "Auto Approve Bookings", bookings_plus ); ?></h5>
    </div>
	<form id="uxFrmAutoApprove" class="form-horizontal" method="post" action="#">
		<div class="body">
			<div class="note note-success" id="successAutoApproveMessage" style="display:none">
				<strong><?php _e( "Success! Auto Approve has been saved.", bookings_plus ); ?></strong>
            </div>
   	  		<div class="block well" style="margin-top:10px;">
                <div class="row-fluid form-horizontal">                            
                	<div class="control-group">
                    	<label class="control-label">
                    		<?php _e( "Auto Approve :", bookings_plus ); ?><span class="req">*</span>
                    	</label>
                        <div class="controls">
                        	<label class="radio">
								<input type="radio" id="uxAutoApproveEnable" name="uxAutoApprove"  value="1" ><?php _e( "Enabled", bookings_plus );?>
							</label>
							<label class="radio">
								<input type="radio" id="uxAutoApproveDisable" name="uxAutoApprove"  value="0"><?php _e( "Disabled", bookings_plus );?>
							</label>		                        	
                        </div>
                    </div>
				</div>
             </div>
          	 <div class="form-actions" style="padding:10px 0px;">
	            	<input type="submit" id="btnAutoApprove" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
	         </div>
		</div>
	</form>
</div>
<div id="ReminderSettings" class="modal hide fade" role="dialog" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>	
        <h5><?php _e( "Reminder Settings", bookings_plus ); ?></h5>
    </div>
	<form id="uxFrmReminderSettings" class="form-horizontal" method="post" action="#">
		<div class="body">
			<div class="note note-success" id="successReminderSettingsMessage" style="display:none">
				<strong><?php _e( "Success! Reminder Settings has been saved.", bookings_plus ); ?></strong>
            </div>
   	  		<div class="block well" style="margin-top:10px;">
                <div class="row-fluid form-horizontal">                            
                	<div class="control-group">
                    	<label class="control-label">
                    		<?php _e( "Reminder Settings :", bookings_plus ); ?><span class="req">*</span>
                    	</label>
                        <div class="controls">
                        	
                        		  <?php
				        	$ReminderStatus = $wpdb->get_var
				        	(
				        		$wpdb->prepare
				        		(
				        			'SELECT GeneralSettingsValue FROM ' . generalSettingsTable() . ' where GeneralSettingsKey = %s',
				        			"reminder-settings"
								)
							);
							$ReminderStatusInterval = $wpdb->get_var
				        	(
				        		$wpdb->prepare
				        		(
				        			'SELECT GeneralSettingsValue FROM ' . generalSettingsTable() . ' where GeneralSettingsKey = %s',
				        			"reminder-settings-interval"
								)
							);
								if($ReminderStatus == 1)
								{
									
							?>
									<label class="radio">
										<input type="radio" id="uxReminderSettingsEnable" name="uxReminderSettings" onclick="enableReminder();"  value="1" checked="checked" ><?php _e( "Enabled", bookings_plus );?>
									</label>
									<label class="radio">
										<input type="radio" id="uxReminderSettingsDisable" name="uxReminderSettings" onclick="disableReminder();" value="0"><?php _e( "Disabled", bookings_plus );?>
									</label>		
							<?php
								}
								else 
								{
							?>
									<label class="radio">
										<input type="radio" id="uxReminderSettingsEnable" name="uxReminderSettings" onclick="enableReminder();"  value="1" ><?php _e( "Enabled", bookings_plus );?>
									</label>
									<label class="radio">
										<input type="radio" id="uxReminderSettingsDisable" name="uxReminderSettings" onclick="disableReminder();" checked="checked" value="0"><?php _e( "Disabled", bookings_plus );?>
									</label>	
							<?php
								}
							?>
									                        	
                        </div>
                      </div>
                      <div class="control-group" id="ReminderIntervalDiv" style="display: none">
                    	<label class="control-label"><?php _e( "Reminder Interval :", bookings_plus ); ?>
                    			<span class="req">*</span>
                       		</label>
                        	<div class="controls">
                        		<select name="uxReminderInterval" class="required" id="uxReminderInterval" style="width:100px;" >
                            		<option value="1 hour">1 Hour</option>
                            		<option value="2 hour">2 Hours</option>
                            		<option value="4 hour">4 Hours</option>
                            		<option value="5 hour">5 Hours</option>
                            		<option value="10 hour">10 Hours</option>
                            		<option value="12 hour">12 Hours</option>
                            		<option value="1 Day">1 Day</option>
                            		<option value="1 week">1 week</option>
                            	</select>
                            	<script>jQuery("#uxReminderInterval").val("<?php echo $ReminderStatusInterval;?>")</script>
                        	</div>
                    	</div>
                    </div>
				</div>
				 <div class="form-actions" style="padding:10px 0px;">
	            	<input type="submit" id="btnReminderSettings" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
	        </div>
             </div>
      </form>
</div>
<div id="shortcodes" class="modal hide fade" role="dialog" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>	
        <h5><?php _e( "Shortcodes ", bookings_plus ); ?></h5>
    </div>
	<form id="uxFrmSortcodes" class="form-horizontal" method="post" action="#">
		<div class="body">
			
   	  		<div class="block well" style="margin-top:10px;">
                <div class="row-fluid form-horizontal">                            
                	<div class="control-group">
						<label class="control-label"><?php _e( "Calendar Embed :", bookings_plus ); ?></label>
						<div class="controls">
						<?php 
							$iframeLink = "<iframe src='$url/bookingCalendarByIframe.php' style='width: 800px; height:700px' scrolling='no'></iframe>";
						?>
							<textarea  id="iframeCode" rows="3" style="width:100%"><?php echo $iframeLink; ?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php _e( "Booking Link Code (Single Services) :", bookings_plus ); ?></label>
						<div class="controls">
							<textarea   id="singleServiceCode" rows="2"  style="width:100%">[booking service = 1 fore-color=red background-color=green]Book Now[/booking]</textarea>
						</div>
					</div>
					<?php
						$bookingImageName = $wpdb -> get_var
						(
							$wpdb->prepare
							(
								'SELECT GeneralSettingsValue FROM ' . generalSettingsTable().' where GeneralSettingsKey = %s',
								"booking_image"
							)
						); 	
					?>						   
					<div class="control-group">
						<label class="control-label"><?php _e( "Booking Link Code (All Services) :", bookings_plus ); ?>
						</label>
						<div class="controls">
							<textarea   id="allServicesCode" rows="2"  style="width:100%">[booking link fore-color=red background-color=green]Book Now[/booking]</textarea>
						</div>
					</div>						   
					<div class="control-group">
						<label class="control-label"><?php _e( "Image Link Code :", bookings_plus ); ?>
						</label>
						<div class="controls">
						<?php
							$imageBookingLink = "<a href=\"#bookingLink\" class=\"fancybox\"><img src=\"$url/images/bookingImages/$bookingImageName\" />[booking link fore-color=red background-color=green][/booking]</a>";
						?>
							<textarea   id="imageCode" rows="3"  style="width:100%"><?php echo $imageBookingLink; ?></textarea>						        	
						</div>
					</div>
				</div>
             </div>
         </div>
	</form>
</div>
<script type="text/javascript">

	jQuery("#Dashboard").attr("class","active"); 
	jQuery.ajax
	({
		type: "POST",
		data: "target=getFacebookStatus&action=getAjaxExecuted",
		url:  ajaxurl,
		success: function(data) 
		{
			jQuery("#uxDashboardFacebookConnect").html(data);
		}
	});
	jQuery.ajax
	({
		type: "POST",
		data: "target=getMailChimpStatus&action=getAjaxExecuted",
		url:  ajaxurl,
		success: function(data) 
		{
			jQuery("#uxDashboardMailChimpSettings").html(data);
		}
	});
	jQuery.ajax
	({
		type: "POST",
		data: "target=getResourcesVisibilityStatus&action=getAjaxExecuted",
		url:  ajaxurl,
		success: function(data) 
		{
			jQuery("#uxDashboardResourcesVisibility").html(data);
		}
	});
	jQuery.ajax
	({
		type: "POST",
		data: "target=getMultipleLocationsStatus&action=getAjaxExecuted",
		url:  ajaxurl,
		success: function(data) 
		{
			jQuery("#uxDashboardMultipleLocations").html(data);
		}
	});
	  jQuery(document).ready(function() 
	  {
	  	jQuery('.hovertip').tooltip();
	  	jQuery('#uxServiceColor').colorpicker().on('changeColor', function(ev)
	  	{
			jQuery('#picker').css('background-color',ev.color.toHex());
			jQuery('#uxServiceColor').val(ev.color.toHex());
		});
		var RSEnable = jQuery('input:radio[name=uxReminderSettings]:checked').val();
 			
 			if(RSEnable == 1)
 			{
 				
	   			jQuery('#ReminderIntervalDiv').attr('style','');
 			}
 			else
 			{
 				jQuery('#ReminderIntervalDiv').css('display','none');
	   			
 			}
 		var FBEnable = jQuery('input:radio[name=uxFacebookConnect]:checked').val();
 			
 			if(FBEnable == 1)
 			{
 				jQuery('#facebookAPI').attr('style','');
	   			jQuery('#facebookSecret').attr('style','');
 			}
 			else
 			{
 				jQuery('#facebookAPI').css('display','none');
	   			jQuery('#facebookSecret').css('display','none');
 			}
 			var MailChimp = jQuery('input:radio[name=uxMailChimp]:checked').val();
 			if(MailChimp == 1)
 			{
 				jQuery('#mailApiKey').attr('style','');
	   			jQuery('#mailUniqueId').attr('style','');
	   			jQuery('#mailOptIn').attr('style','');
	   			jQuery('#mailEmail').attr('style','');
 			}
 			else
 			{
 				jQuery('#mailApiKey').css('display','none');
	   			jQuery('#mailUniqueId').css('display','none');
	   			jQuery('#mailOptIn').css('display','none');
	   			jQuery('#mailEmail').css('display','none');
 			}
 			var PaypalEnable = jQuery('input:radio[name=uxPayPal]:checked').val();
 			if(PaypalEnable == 1)
 			{
 				jQuery('#paypalUrl').attr('style','');
 				jQuery('#paypalMerchantEmail').attr('style','');
	   			jQuery('#paypalThankYou').attr('style','');
	   			jQuery('#paypalIPN').attr('style','');	   		
	   			jQuery('#paypalCancellation').attr('style','');
 			}
 			else
 			{
 				jQuery('#paypalUrl').css('display','none');
 				jQuery('#paypalMerchantEmail').css('display','none');
	   			jQuery('#paypalThankYou').css('display','none');
	   			jQuery('#paypalIPN').css('display','none');
	   			
	   			jQuery('#paypalCancellation').css('display','none');
 			} 
 			var uxResourceVisibility =  jQuery('input:radio[name=uxResourceVisibility]:checked').val();
 			jQuery.ajax
			({
				type: "POST",
				data: "uxResourceVisibility="+uxResourceVisibility+"&target=ResourcesVisibileShow&action=getAjaxExecuted",
				url:  ajaxurl,
			    success: function(data) 
			    {
			    	
			    	if(data == "yes")
			    	{
			    		jQuery('#uxResourceVisibilityEnable').attr('checked','checked');
			    		jQuery('#ReminderIntervalDiv').attr('style','');
			    	}
			    	else
			    	{
			    		jQuery('#uxResourceVisibilityDisable').attr('checked','checked');
			    	}
			    	
			    }
			}); 
			var uxReminderSettings =  jQuery('input:radio[name=uxReminderSettings]:checked').val();
			
 			jQuery.ajax
			({
				type: "POST",
				data: "uxReminderSettings="+uxReminderSettings+"&target=ReminderSettingsShow&action=getAjaxExecuted",
				url:  ajaxurl,
			    success: function(data) 
			    {
			    	
			    	if(data == "On")
			    	{
			    		jQuery('#uxReminderSettingsEnable').attr('checked','checked');
			    		jQuery('#uxDashboardReminderSettings').html(data);
			    	}
			    	else
			    	{
			    		jQuery('#uxReminderSettingsDisable').attr('checked','checked');
			    		jQuery('#uxDashboardReminderSettings').html(data);
			    	}
			    	
			    }
			}); 
			var uxAutoApprove =  jQuery('input:radio[name=uxAutoApprove]:checked').val();
 			jQuery.ajax
			({
				type: "POST",
				data: "uxAutoApprove="+uxAutoApprove+"&target=AutoApproveShow&action=getAjaxExecuted",
				url:  ajaxurl,
			    success: function(data) 
			    {
			    	if(data == "On")
			    	{
			    		jQuery('#uxAutoApproveEnable').attr('checked','checked');
			    		jQuery('#uxDashboardAutoApprove').html(data);
			    	}
			    	else
			    	{
			    		jQuery('#uxAutoApproveDisable').attr('checked','checked');
			    		jQuery('#uxDashboardAutoApprove').html(data);
			    	}
			    	
			    }
			}); 			 			
 	   });
 	   function enableReminder()
	  {
	   		var RSEnable = jQuery('input:radio[name=uxReminderSettings]:checked').val();
	   		if(RSEnable == 1)
 			{
		   		jQuery('#ReminderIntervalDiv').attr('style','');
		   		
	   		}
	  }
	  function disableReminder()
	  {
	   		var RSEnable = jQuery('input:radio[name=uxReminderSettings]:checked').val();
	   		if(RSEnable == 0)
 			{
	   			jQuery('#ReminderIntervalDiv').css('display','none');
	   			
	   		}
	  }
	  function enableFBText()
	  {
	   		var FBEnable = jQuery('input:radio[name=uxFacebookConnect]:checked').val();
	   		if(FBEnable == 1)
 			{
		   		jQuery('#facebookAPI').attr('style','');
		   		jQuery('#facebookSecret').attr('style','');
	   		}
	  }
	  function disableFBText()
	  {
	   		var FBEnable = jQuery('input:radio[name=uxFacebookConnect]:checked').val();
	   		if(FBEnable == 0)
 			{
	   			jQuery('#facebookAPI').css('display','none');
	   			jQuery('#facebookSecret').css('display','none');
	   		}
	  }
 	  function enableMailChimpText()
	  {
	   
	   		var MailChimp = jQuery('input:radio[name=uxMailChimp]:checked').val();
	   		if(MailChimp == 1)
 			{
	   			jQuery('#mailApiKey').attr('style','');
	   			jQuery('#mailUniqueId').attr('style','');
	   			jQuery('#mailOptIn').attr('style','');
	   			jQuery('#mailEmail').attr('style','');
	   		}
	  }
	  function disableMailChimpText()
	  {
	   		var MailChimp = jQuery('input:radio[name=uxMailChimp]:checked').val();
	   		if(MailChimp == 0)
 			{
	   			jQuery('#mailApiKey').css('display','none');
	   			jQuery('#mailUniqueId').css('display','none');
	   			jQuery('#mailOptIn').css('display','none');
	   			jQuery('#mailEmail').css('display','none');
	  		}
	  }	
	   function enablePaypalText()
	  {
	   
	   		var PaypalEnable = jQuery('input:radio[name=uxPayPal]:checked').val();
	   		if(PaypalEnable == 1)
			{
				jQuery('#paypalUrl').attr('style','');
	   			jQuery('#paypalMerchantEmail').attr('style','');
	   			jQuery('#paypalThankYou').attr('style','');
	   			jQuery('#paypalIPN').attr('style','');
	   			
	   			jQuery('#paypalCancellation').attr('style','');
	   			
	   		}
	  }
	  
	  function disablePaypalText()
	  {
	   		var PaypalEnable = jQuery('input:radio[name=uxPayPal]:checked').val();
	   		if(PaypalEnable == 0)
			{
				jQuery('#paypalUrl').css('display','none');
	   			jQuery('#paypalMerchantEmail').css('display','none');
	   			jQuery('#paypalThankYou').css('display','none');
	   			jQuery('#paypalIPN').css('display','none');
	   			
	   			jQuery('#paypalCancellation').css('display','none');
	   		}
	  }
	  
	  oTable = jQuery('#data-table1').dataTable
	  ({
		"bJQueryUI": false,
		"bAutoWidth": true,
		"sPaginationType": "full_numbers",
		"sDom": 't<"datatable-footer"ip>',
		"oLanguage": 
		{
			"sLengthMenu": "<span>Show entries:</span> _MENU_"
		},
		
		
	  }); 	  
	  jQuery("#uxFrmFacebookSettings").validate
	  ({
		    	highlight: function(label) 
		    	{	    	
		    		if(jQuery(label).closest('.control-group').hasClass('success'))
		    		{
		    			jQuery(label).closest('.control-group').removeClass('success');
		    		}
		    		jQuery(label).closest('.control-group').addClass('errors');
		    	},
		    	success: function(label) 
		    	{
		    		label
		    			.text('Success!').addClass('valid')
		    			.closest('.control-group').addClass('success');
		    	},
		     	submitHandler: function(form) 
		     	{
		     		
		    	    var uxFacebookAppId = jQuery('#uxFacebookAppId').val();
		    	    var uxFacebookSecretKey = jQuery('#uxFacebookSecretKey').val();		    	    
		    	    var uxFacebookConnectRadio =  jQuery('input:radio[name=uxFacebookConnect]:checked').val();
		    	
			     	jQuery.ajax
				    ({
							type: "POST",
							data: "uxFacebookAppId="+uxFacebookAppId+"&uxFacebookSecretKey="+uxFacebookSecretKey+"&uxFacebookConnectRadio="+uxFacebookConnectRadio+"&target=UpdateFacebookSocialMedia&action=getAjaxExecuted",
							url:  ajaxurl,
				            success: function(data) 
				            { 
				            	jQuery('#successFacebookSettingsMessage').css('display','block');
								setTimeout(function() 
							    {
							       	jQuery('#successFacebookSettingsMessage').css('display','none');
							        var checkPage = "<?php echo $_REQUEST['page']; ?>";
							    	window.location.href = "admin.php?page="+checkPage;
							    }, 2000);	
							}
			        });
		   		}		   		
	  });
	  jQuery("#uxFrmMailChimpSettings").validate
	  ({
				rules: 
				{
					uxMailChimpApiKey: "required",
					uxMailChimpUniqueId: "required",
				},			
		    	highlight: function(label) 
		    	{	    	
		    		if(jQuery(label).closest('.control-group').hasClass('success'))
		    		{
		    			jQuery(label).closest('.control-group').removeClass('success');
		    		}
		    		jQuery(label).closest('.control-group').addClass('errors');
		    	},
		    	success: function(label) 
		    	{
		    		label
		    			.text('Success!').addClass('valid')
		    			.closest('.control-group').addClass('success');
		    	},
		     	submitHandler: function(form) 
		     	{
		     		 var uxuxMailChimpRadio =  jQuery('input:radio[name=uxMailChimp]:checked').val();
		    	     var uxMailChimpApiKey = jQuery('#uxMailChimpApiKey').val();
		    	     var uxMailChimpUniqueId = jQuery('#uxMailChimpUniqueId').val();
		    	     var uxDoubleOptIn = jQuery("#uxDoubleOptIn").prop('checked');
		    	     var uxWelcomeEmail = jQuery("#uxWelcomeEmail").prop('checked');
		    	    jQuery.ajax
				    ({
							type: "POST",
							data: "uxuxMailChimpRadio="+uxuxMailChimpRadio+"&uxMailChimpApiKey="+uxMailChimpApiKey+"&uxMailChimpUniqueId="+uxMailChimpUniqueId+"&uxDoubleOptIn="+uxDoubleOptIn+"&uxWelcomeEmail="+uxWelcomeEmail+"&target=UpdateAutoResponder&action=getAjaxExecuted",
							url:  ajaxurl,
				            success: function(data) 
				            {  
				            	jQuery('#successMailChimpSettingsMessage').css('display','block');
								setTimeout(function() 
							    {
									var checkPage = "<?php echo $_REQUEST['page']; ?>";
						    		window.location.href = "admin.php?page="+checkPage;
							    }, 2000);
							}
			        });
		     	}	   		
	  });
	  jQuery('#uxServiceMins').val(30);
	  jQuery("#uxFrmAddServices").validate
	  ({
			rules: 
			{
				uxServiceName: "required",
				uxServiceCost: 
				{
					required: true,
					number: true
				},
				uxMaxBookings: 
				{
					required: true,
					digits: true
				},
				uxServiceHours:
				{
					required : true,
				},
				uxServiceMins:
				{
					required : true,
				}
			},			
			highlight: function(label) 
			{	    	
				if(jQuery(label).closest('.control-group').hasClass('success'))
				{
			    	jQuery(label).closest('.control-group').removeClass('success');
			    }
			    jQuery(label).closest('.control-group').addClass('errors');
			},
			success: function(label) 
			{
				label
				.text('Success!').addClass('valid')
				.closest('.control-group').addClass('success');
			},
			submitHandler: function(form) 
			{
				var uxServiceColor = jQuery('#uxServiceColor').val();
				var uxServiceName = jQuery('#uxServiceName').val();
				var uxServiceNameEncode  = encodeURIComponent(uxServiceName);
				var uxServiceCost = jQuery('#uxServiceCost').val();
				var uxServiceHours = jQuery('#uxServiceHours').val();
				var uxServiceMins = jQuery('#uxServiceMins').val();
				var uxMaxBookings = jQuery('#uxMaxBookings').val();
				var uxServiceType = jQuery('input:radio[name=uxServiceType]:checked').val();
				if(uxServiceType == 1 && uxMaxBookings > 1)
				{
					jQuery.ajax
					({
						type: "POST",
						data: "uxServiceNameEncode="+uxServiceNameEncode+"&uxServiceCost="+uxServiceCost+"&uxServiceHours="+uxServiceHours+"&uxServiceColor="+uxServiceColor+
						"&uxServiceMins="+uxServiceMins+"&uxMaxBookings="+uxMaxBookings+"&uxServiceType="+uxServiceType+"&target=addService&action=getAjaxExecuted",
						url:  ajaxurl,
						success: function(data) 
						{  
							
							jQuery('#errorMessageServices').css('display','none');
					    	jQuery('#successMessage').css('display','block');
					    	setTimeout(function() 
					    	{
					        	jQuery('#successMessage').css('display','none');
								var checkPage = "<?php echo $_REQUEST['page']; ?>";
								window.location.href = "admin.php?page="+checkPage;
					        }, 2000);	
					    }   
					});
				}
				else if(uxServiceType == 0)
			   	{
			   		jQuery.ajax
					({
						type: "POST",
						data: "uxServiceNameEncode="+uxServiceNameEncode+"&uxServiceCost="+uxServiceCost+"&uxServiceHours="+uxServiceHours+"&uxServiceColor="+uxServiceColor+
						"&uxServiceMins="+uxServiceMins+"&uxMaxBookings="+uxMaxBookings+"&uxServiceType="+uxServiceType+"&target=addService&action=getAjaxExecuted",
						url:  ajaxurl,
						success: function(data) 
						{  
							jQuery('#errorMessageServices').css('display','none');
					    	jQuery('#successMessage').css('display','block');
					    	setTimeout(function() 
					    	{
					        	jQuery('#successMessage').css('display','none');
								var checkPage = "<?php echo $_REQUEST['page']; ?>";
								window.location.href = "admin.php?page="+checkPage;
					        }, 2000);	
					    }   
					});
			   	}
				else
				{
					jQuery('#errorMessageServices').css('display','block');
				}  
			}
	  });
	  function singleBooking()
	  {
		jQuery('#maxBooking').css('display','none');
	  }
	  function groupBooking()
	  {
		jQuery('#maxBooking').css('display','block');
	  }	
	  jQuery("#uxFrmResourcesVisibility").validate
	  ({
			submitHandler: function(form) 
		    {
		    	 var uxResourceVisibility =  jQuery('input:radio[name=uxResourceVisibility]:checked').val();
		        jQuery.ajax
			    ({
					type: "POST",
					data: "uxResourceVisibility="+uxResourceVisibility+"&target=ResourcesVisibile&action=getAjaxExecuted",
					url:  ajaxurl,
			        success: function(data) 
				    {  
				        jQuery('#successResourcesMessage').css('display','block');
						setTimeout(function() 
						{
							 jQuery('#successResourcesMessage').css('display','none');
							var checkPage = "<?php echo $_REQUEST['page']; ?>";
						    window.location.href = "admin.php?page="+checkPage;
						}, 2000);
					}
			    });
		    }	   		
	  });
	  var PaypalEnable = jQuery('input:radio[name=uxPayPal]:checked').val();
		if(PaypalEnable == 0)
		 {
		 	
		     jQuery("#uxFrmPayPalGatewaySettings").validate
			 ({
			 	
				rules: 
				{
					uxMerchantEmailAddress: 
					{
						required: true,
						email:true
					},
					uxThankyouPageUrl: "required",
					uxPaymentImageUrl: "required",
					uxPaymentCancellationMessage: "required"
				
				},			
		    	highlight: function(label) 
		    	{	    	
		    		if(jQuery(label).closest('.control-group').hasClass('success'))
		    		{
		    			jQuery(label).closest('.control-group').removeClass('success');
		    		}
		    		jQuery(label).closest('.control-group').addClass('errors');
		    	},
		    	success: function(label) 
		    	{
		    		label
		    			.text('Success!').addClass('valid')
		    			.closest('.control-group').addClass('success');
		    	},
		     	submitHandler: function(form) 
		     	{
		     		 var PaypalEnableCheck =  jQuery('input:radio[name=uxPayPal]:checked').val();
		     		 var PaypalUrlCheck =  jQuery('input:radio[name=uxPayPalurl]:checked').val();
		    	     var uxMerchantEmailAddress = jQuery('#uxMerchantEmailAddress').val();
		    	     var uxThankyouPageUrl = jQuery('#uxThankyouPageUrl').val();
		    	     var uxIPNUrl = jQuery('#uxIPNUrl').val();
		    	     var uxPaymentImageUrl = jQuery('#uxPaymentImageUrl').val();
		    	     var uxPaymentCancellationMessage = jQuery('#uxCancellationUrl').val();
		    	     jQuery.ajax
				     ({
							type: "POST",
							data: "PaypalEnableCheck="+PaypalEnableCheck+"&uxMerchantEmailAddress="+uxMerchantEmailAddress+"&PaypalUrlCheck="+PaypalUrlCheck+
							"&uxThankyouPageUrl="+uxThankyouPageUrl+"&uxIPNUrl="+uxIPNUrl+"&uxPaymentImageUrl="+uxPaymentImageUrl+
							"&uxPaymentCancellationMessage="+uxPaymentCancellationMessage+"&target=UpdatePaymentGateway&action=getAjaxExecuted",
							url:  ajaxurl,
				            success: function(data) 
				            { 
							
				            	jQuery('#successPaypalSettingsMessage').css('display','block');
								setTimeout(function() 
							    {
							       	jQuery('#successPaypalSettingsMessage').css('display','none');
							       	var checkPage = "<?php echo $_REQUEST['page']; ?>";
						    		window.location.href = "admin.php?page="+checkPage;
							    }, 2000);
							}
			        });
		     	}
		   		
		     });
		  }
		  else
		  {
		  	jQuery("#uxFrmPayPalGatewaySettings").validate
			 ({
						
		    	highlight: function(label) 
		    	{	    	
		    		if(jQuery(label).closest('.control-group').hasClass('success'))
		    		{
		    			jQuery(label).closest('.control-group').removeClass('success');
		    		}
		    		jQuery(label).closest('.control-group').addClass('errors');
		    	},
		    	success: function(label) 
		    	{
		    		label
		    			.text('Success!').addClass('valid')
		    			.closest('.control-group').addClass('success');
		    	},
		     	submitHandler: function(form) 
		     	{
		     		 var PaypalEnableCheck =  jQuery('input:radio[name=uxPayPal]:checked').val();
		     		 var PaypalUrlCheck =  jQuery('input:radio[name=uxPayPalurl]:checked').val();
		    	     var uxMerchantEmailAddress = jQuery('#uxMerchantEmailAddress').val();
		    	     var uxThankyouPageUrl = jQuery('#uxThankyouPageUrl').val();
		    	     var uxIPNUrl = jQuery('#uxIPNUrl').val();
		    	     var uxPaymentImageUrl = jQuery('#uxPaymentImageUrl').val();
		    	     var uxPaymentCancellationMessage = jQuery('#uxCancellationUrl').val();
		    	    
		    	     jQuery.ajax
				    ({
							type: "POST",
							data: "PaypalEnableCheck="+PaypalEnableCheck+"&uxMerchantEmailAddress="+uxMerchantEmailAddress+"&PaypalUrlCheck="+PaypalUrlCheck+
							"&uxThankyouPageUrl="+uxThankyouPageUrl+"&uxIPNUrl="+uxIPNUrl+"&uxPaymentImageUrl="+uxPaymentImageUrl+
							"&uxPaymentCancellationMessage="+uxPaymentCancellationMessage+"&target=UpdatePaymentGateway&action=getAjaxExecuted",
							url:  ajaxurl,
				            success: function(data) 
				            { 
				            	
				            	jQuery('#successPaypalSettingsMessage').css('display','block');
								setTimeout(function() 
							    {
							       	jQuery('#successPaypalSettingsMessage').css('display','none');
							       	var checkPage = "<?php echo $_REQUEST['page']; ?>";
						    		window.location.href = "admin.php?page="+checkPage;
							    }, 2000);
							}
			        });
		     	}
		   		
		     });
		  }
		  jQuery.ajax
		({
			type: "POST",
			data: "target=getPaypalStatus&action=getAjaxExecuted",
			url:  ajaxurl,
			success: function(data) 
			{
				jQuery("#uxDashboardPaypalSettings").html(data);
			}
		});
		function checkExistingEmail(label)
		{
			var uxEmployeeEmail = jQuery('#uxEmployeeEmail').val();
			jQuery.ajax
			({
				type: "POST",
				data: "uxEmployeeEmail="+uxEmployeeEmail+"&target=checkExistingEmailAction&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{  	
					var checkEmailEmployee = jQuery.trim(data);
					if(checkEmailEmployee == "existingEmployeeEmail")
					{
				    	jQuery('#errorMessageCheckEmail').css('display','block');
				    	jQuery('#groupEmailAddress').attr('class','control-group errors');
				    	label
			    		.text('Email already exists!').addClass('errors')
			    		.closest('.control-group').addClass('errors');
			        }
			        else
			        {
			        	jQuery('#errorMessageCheckEmail').css('display','none');
				    	jQuery('#groupEmailAddress').attr('class','control-group valid');
				    	label
		    			.text('Success!').addClass('valid')
		    			.closest('.control-group').addClass('success');
			        }
				}
			});
		}
		jQuery("#uxFrmAddEmployees").validate
		({
			rules: 
			{
				uxEmployeeName: "required",
				uxEmployeeEmail:
				{
					required : true,
					email:true
				},
				uxEmployeePhone: "required"
			},			
		    highlight: function(label) 
		    {	    	
		    	if(jQuery(label).closest('.control-group').hasClass('success'))
		    	{
		    		jQuery(label).closest('.control-group').removeClass('success');
		    	}
		    	jQuery(label).closest('.control-group').addClass('errors');
		    },
			success: function(label) 
			{
		    	if (label.attr('for') == "uxEmployeeEmail") 
		    	{
		    		checkExistingEmail(label);
		    	}
		    	else
		    	{
		    		label
		    		.text('Success!').addClass('valid')
		    		.closest('.control-group').addClass('success');
		    	}
		   	},
		    submitHandler: function(form) 
		   	{
		   		var uxEmployeeName = jQuery('#uxEmployeeName').val();
				var uxEmployeeNameEncode  = encodeURIComponent(uxEmployeeName);
				var uxEmployeeEmail = jQuery('#uxEmployeeEmail').val();
				var uxEmployeePhone = jQuery('#uxEmployeePhone').val();
				
				jQuery.ajax
				({
					type: "POST",
					data: "uxEmployeeEmail="+uxEmployeeEmail+"&target=checkExistingEmailAction&action=getAjaxExecuted",
					url:  ajaxurl,
					success: function(data) 
					{
						var checkEmailEmployee = jQuery.trim(data);
						if(checkEmailEmployee == "existingEmployeeEmail")
				    	{
				    		jQuery('#errorMessageCheckEmail').css('display','block');
				    	}
				    	else
				    	{  	
					    	jQuery.ajax
							({
								type: "POST",
								data: "uxEmployeeNameEncode="+uxEmployeeNameEncode+"&uxEmployeeEmail="+uxEmployeeEmail+"&uxEmployeePhone="+uxEmployeePhone+
								"&target=addEmployee&action=getAjaxExecuted",
								url:  ajaxurl,
								success: function(data) 
								{  
									jQuery('#errorMessageCheckEmail').css('display','none');
							    	jQuery('#addEmployeeSuccessMessage').css('display','block');
							   		setTimeout(function() 
							    	{
							        	jQuery('#addEmployeeSuccessMessage').css('display','none');
							        	var checkPage = "<?php echo $_REQUEST['page']; ?>";
							        	window.location.href = "admin.php?page="+checkPage;
							        }, 2000);	
							    }   
							});
						}
					}
				});  
			}
		});
		function allocateService()
		{
			var employeeDdId = jQuery('#uxDdlEmployees').val();
			jQuery('#hdEmployeeId').val(employeeDdId);
			jQuery('#allocatedErrorMessage').css('display','none');
			jQuery.ajax
			({
				type: "POST",
				data: "employeeDdId="+employeeDdId+"&target=employeeDdIdOnchange&action=getAjaxExecuted",
				url: ajaxurl,
				success: function(data) 
				{  	
					
					jQuery("#allocateServices").append(data);
			 	}
			});
		}
		jQuery("#uxFrmAllocateServices").validate
		({
			
			highlight: function(label) 
			{	
					
			},
			success: function(label) 
			{
					
			},
			submitHandler: function(form) 
			{
				var employeeId = jQuery('#uxDdlEmployees').val();
				jQuery.ajax
				({
					type: "POST",
					data: "employeeId="+employeeId+"&target=deleteAllocationEntries&action=getAjaxExecuted",
					url:  ajaxurl,
					success: function(data) 
					{
						var oTable = jQuery('#data-table1').dataTable();
						jQuery("input[type='checkbox']", oTable.fnGetNodes()).each(function()
						{
							
							var serviceId = jQuery(this).val();
							if(jQuery(this).is(':checked'))
							{
								jQuery.ajax
								({
									type: "POST",
									data: "employeeId="+employeeId+"&serviceId="+serviceId+"&target=allocationEntries&action=getAjaxExecuted",
									url:  ajaxurl,
									success: function(data) 
									{
									
									}
								});
							}
						});
						jQuery('#allocatedSuccessMessage').css('display','block');
						setTimeout(function() 
						{
							jQuery('#allocatedSuccessMessage').css('display','none');
							var checkPage = "<?php echo $_REQUEST['page']; ?>";
							window.location.href = "admin.php?page="+checkPage;
						}, 2000);				
					}
				});
			}
		});			
	jQuery(document).ready(function() 
	{
		<?php
		$timeFormats = $wpdb->get_var("SELECT GeneralSettingsValue FROM ".generalSettingsTable()." WHERE GeneralSettingsKey = 'default_Time_Format'");
		if($timeFormats ==0)
		{
		?>
		jQuery.ajax
		({
			type: "POST",
			data: "target=employeesStartWorkingHours&action=getAjaxExecuted",
			url:  ajaxurl,
			success: function(data) 
			{
				jQuery('#uxDdlStartMonday').html(data);
				jQuery('#uxDdlStartMonday').val(540);
				jQuery('#uxDdlStartTuesday').html(data);
				jQuery('#uxDdlStartTuesday').val(540);
				jQuery('#uxDdlStartWednesday').html(data);
				jQuery('#uxDdlStartWednesday').val(540);
				jQuery('#uxDdlStartThursday').html(data);
				jQuery('#uxDdlStartThursday').val(540);
				jQuery('#uxDdlStartFriday').html(data);
				jQuery('#uxDdlStartFriday').val(540);
				jQuery('#uxDdlStartSaturday').html(data);
				jQuery('#uxDdlStartSaturday').val(540);
				jQuery('#uxDdlStartSunday').html(data);
				jQuery('#uxDdlStartSunday').val(540);
			}
		});  
		jQuery.ajax
		({
			type: "POST",
			data: "target=employeesEndWorkingHours&action=getAjaxExecuted",
			url:  ajaxurl,
			success: function(data) 
			{
				jQuery('#uxDdlEndMonday').html(data);
				jQuery('#uxDdlEndMonday').val(1020);
				jQuery('#uxDdlEndTuesday').html(data);
				jQuery('#uxDdlEndTuesday').val(1020);
				jQuery('#uxDdlEndWednesday').html(data);
				jQuery('#uxDdlEndWednesday').val(1020);
				jQuery('#uxDdlEndThursday').html(data);
				jQuery('#uxDdlEndThursday').val(1020);
				jQuery('#uxDdlEndFriday').html(data);
				jQuery('#uxDdlEndFriday').val(1020);
				jQuery('#uxDdlEndSaturday').html(data);
				jQuery('#uxDdlEndSaturday').val(1020);
				jQuery('#uxDdlEndSunday').html(data);
				jQuery('#uxDdlEndSunday').val(1020);
				            	
			}
		});
		<?php
		}
		else
		{
		?>
		jQuery.ajax
		({
			type: "POST",
			data: "target=employeesStartWorkingHours&action=getAjaxExecuted",
			url:  ajaxurl,
			success: function(data) 
			{
				jQuery('#uxDdlStartMonday').html(data);
				jQuery('#uxDdlStartMonday').val(1020);
				jQuery('#uxDdlStartTuesday').html(data);
				jQuery('#uxDdlStartTuesday').val(1020);
				jQuery('#uxDdlStartWednesday').html(data);
				jQuery('#uxDdlStartWednesday').val(1020);
				jQuery('#uxDdlStartThursday').html(data);
				jQuery('#uxDdlStartThursday').val(1020);
				jQuery('#uxDdlStartFriday').html(data);
				jQuery('#uxDdlStartFriday').val(1020);
				jQuery('#uxDdlStartSaturday').html(data);
				jQuery('#uxDdlStartSaturday').val(1020);
				jQuery('#uxDdlStartSunday').html(data);
				jQuery('#uxDdlStartSunday').val(1020);
			}
		});  
		jQuery.ajax
		({
			type: "POST",
			data: "target=employeesEndWorkingHours&action=getAjaxExecuted",
			url:  ajaxurl,
			success: function(data) 
			{
				jQuery('#uxDdlEndMonday').html(data);
				jQuery('#uxDdlEndMonday').val(1020);
				jQuery('#uxDdlEndTuesday').html(data);
				jQuery('#uxDdlEndTuesday').val(1020);
				jQuery('#uxDdlEndWednesday').html(data);
				jQuery('#uxDdlEndWednesday').val(1020);
				jQuery('#uxDdlEndThursday').html(data);
				jQuery('#uxDdlEndThursday').val(1020);
				jQuery('#uxDdlEndFriday').html(data);
				jQuery('#uxDdlEndFriday').val(1020);
				jQuery('#uxDdlEndSaturday').html(data);
				jQuery('#uxDdlEndSaturday').val(1020);
				jQuery('#uxDdlEndSunday').html(data);
				jQuery('#uxDdlEndSunday').val(1020);
				            	
			}
		});
		<?php	
		}
		?>  
	});	
	
	function employeeWorkingHours()
	{	
		
		var uxEmployeeIdd = jQuery('#uxDdlWorkingEmployees').val();
		
		if(uxEmployeeIdd == undefined)
		{
			var uxEmployeeId = 0;
		}
		else
		{
			var uxEmployeeId = uxEmployeeIdd;
		}
		if( uxEmployeeId !="opt1")
		{
			var workingDayMon = "Mon";
			
			jQuery.ajax
			({
				type: "POST",
				data: "uxEmployeeId="+uxEmployeeId+"&workingDay="+workingDayMon+"&target=convertTime&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
					
					var format = data.split(',');
					jQuery('#uxDdlStartMonday').val(format[1]);
					if(format[2]==1)
					{
						jQuery('#uxDayOpenMonday').attr('checked','checked');
						jQuery('#uxDayClosedMonday').removeAttr('checked');
						
					}
					else
					{
						jQuery('#uxDayClosedMonday').attr('checked','checked');
						jQuery('#uxDayOpenMonday').removeAttr('checked');
						
					}
				}
			});
			var workingDayTue = "Tue";
			jQuery.ajax
			({
				type: "POST",
				data: "uxEmployeeId="+uxEmployeeId+"&workingDay="+workingDayTue+"&target=convertTime&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
				
					var format = data.split(',');
					jQuery('#uxDdlStartTuesday').val(format[1]);
					if(format[2]==1)
					{
						jQuery('#uxDayOpenTuesday').attr('checked','checked');
						jQuery('#uxDayClosedTuesday').removeAttr('checked');
					}
					else
					{
						jQuery('#uxDayClosedTuesday').attr('checked','checked');
						jQuery('#uxDayOpenTuesday').removeAttr('checked');
					}
				}
			});
			var workingDayWed = "Wed";
		   	jQuery.ajax
			({
				type: "POST",
				data: "uxEmployeeId="+uxEmployeeId+"&workingDay="+workingDayWed+"&target=convertTime&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
					var format = data.split(',');
					jQuery('#uxDdlStartWednesday').val(format[1]);
					if(format[2]==1)
					{
						jQuery('#uxDayOpenWednesday').attr('checked','checked');
						jQuery('#uxDayClosedWednesday').removeAttr('checked');
						
					}
					else
					{
						jQuery('#uxDayClosedWednesday').attr('checked','checked');
						jQuery('#uxDayOpenWednesday').removeAttr('checked');
						
					}
				}
			});
			var workingDayThu = "Thu";
		   	jQuery.ajax
			({
				type: "POST",
				data: "uxEmployeeId="+uxEmployeeId+"&workingDay="+workingDayThu+"&target=convertTime&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
					var format = data.split(',');
					jQuery('#uxDdlStartThursday').val(format[1]);
					if(format[2]==1)
					{
						jQuery('#uxDayOpenThursday').attr('checked','checked');
						jQuery('#uxDayClosedThursday').removeAttr('checked');
						
					}
					else
					{
						jQuery('#uxDayClosedThursday').attr('checked','checked');
						jQuery('#uxDayOpenThursday').removeAttr('checked');
					
					}
				}
			});
			var workingDayFri = "Fri";
		   	jQuery.ajax
			({
				type: "POST",
				data: "uxEmployeeId="+uxEmployeeId+"&workingDay="+workingDayFri+"&target=convertTime&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
					var format = data.split(',');
					jQuery('#uxDdlStartFriday').val(format[1]);
					if(format[2]==1)
					{
						jQuery('#uxDayOpenFriday').attr('checked','checked');
						jQuery('#uxDayClosedFriday').removeAttr('checked');
						
					}
					else
					{
						jQuery('#uxDayClosedFriday').attr('checked','checked');
						jQuery('#uxDayOpenFriday').removeAttr('checked');
						
					}
				}
			});
			var workingDaySat = "Sat";
		   	jQuery.ajax
			({
				type: "POST",
				data: "uxEmployeeId="+uxEmployeeId+"&workingDay="+workingDaySat+"&target=convertTime&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
					var format = data.split(',');
					jQuery('#uxDdlStartSaturday').val(format[1]);
					if(format[2]==1)
					{
						jQuery('#uxDayOpenSaturday').attr('checked','checked');
						jQuery('#uxDayClosedSaturday').removeAttr('checked');
						
					}
					else
					{
						jQuery('#uxDayClosedSaturday').attr('checked','checked');
						jQuery('#uxDayOpenSaturday').removeAttr('checked');
						
					}
				}
			});
			var workingDaySun = "Sun";
		   	jQuery.ajax
			({
				type: "POST",
				data: "uxEmployeeId="+uxEmployeeId+"&workingDay="+workingDaySun+"&target=convertTime&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
					var format = data.split(',');
					jQuery('#uxDdlStartSunday').val(format[1]);
					if(format[2]==1)
					{
						jQuery('#uxDayOpenSunday').attr('checked','checked');
						jQuery('#uxDayClosedSunday').removeAttr('checked');
						
					}
					else
					{
						jQuery('#uxDayClosedSunday').attr('checked','checked');
						jQuery('#uxDayOpenSunday').removeAttr('checked');
						
					}
				}
			});
			var workingDayMon = "Mon";
			
			jQuery.ajax
			({
				type: "POST",
				data: "uxEmployeeId="+uxEmployeeId+"&workingDay="+workingDayMon+"&target=convertEndTime&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
					
					var format = data.split(',');
					jQuery('#uxDdlEndMonday').val(format[1]);
					
				}
			});
			var workingDayTue = "Tue";
		   	jQuery.ajax
			({
				type: "POST",
				data: "uxEmployeeId="+uxEmployeeId+"&workingDay="+workingDayTue+"&target=convertEndTime&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
					var format = data.split(',');
					jQuery('#uxDdlEndTuesday').val(format[1]);
				}
			});
			
			var workingDayWed = "Wed";
			jQuery.ajax
			({
				type: "POST",
				data: "uxEmployeeId="+uxEmployeeId+"&workingDay="+workingDayWed+"&target=convertEndTime&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
					
					var format = data.split(',');
					jQuery('#uxDdlEndWednesday').val(format[1]);
					
				}
			});
			var workingDayThu = "Thu";
		 	jQuery.ajax
			({
				type: "POST",
				data: "uxEmployeeId="+uxEmployeeId+"&workingDay="+workingDayThu+"&target=convertEndTime&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
					var format = data.split(',');
					jQuery('#uxDdlEndThursday').val(format[1]);
				
				}
			});
			var workingDayFri = "Fri";
			jQuery.ajax
			({
				type: "POST",
				data: "uxEmployeeId="+uxEmployeeId+"&workingDay="+workingDayFri+"&target=convertEndTime&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
					
					var format = data.split(',');
					jQuery('#uxDdlEndFriday').val(format[1]);
					
				}
			});
			var workingDaySat = "Sat";
			jQuery.ajax
			({
				type: "POST",
				data: "uxEmployeeId="+uxEmployeeId+"&workingDay="+workingDaySat+"&target=convertEndTime&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
					var format = data.split(',');
					jQuery('#uxDdlEndSaturday').val(format[1]);
					
				}
			});
			var workingDaySun = "Sun";
		 	jQuery.ajax
			({
				type: "POST",
				data: "uxEmployeeId="+uxEmployeeId+"&workingDay="+workingDaySun+"&target=convertEndTime&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
					var format = data.split(',');
					jQuery('#uxDdlEndSunday').val(format[1]);
					
				}
			});
		}
	}
	
	jQuery("#uxFrmWorkingHours").validate
	({
		submitHandler: function(form) 
		{
			var uxDayOpenClosedMonday = jQuery('input:radio[name=uxDayOpenClosedMonday]:checked').val();
			var uxDdlStartMonday = jQuery('#uxDdlStartMonday').val();
			var uxDdlEndMonday = jQuery('#uxDdlEndMonday').val();
			var workingDayMonday = "Mon";
			var uxDdlWorkingEmployee = jQuery('#uxDdlWorkingEmployees').val();
			if(uxDdlWorkingEmployee == undefined)
			{
				var uxDdlWorkingEmployee = 0;
			}
			
			jQuery.ajax
			({
				type: "POST",
				data: "uxDayOpenClosed="+uxDayOpenClosedMonday+"&uxDdlStart="+uxDdlStartMonday+"&uxDdlEnd="+uxDdlEndMonday+
				"&workingDay="+workingDayMonday+"&uxDdlWorkingEmployees="+uxDdlWorkingEmployee+"&target=employeesWorkingHours&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
					
				}
			});
			var uxDayOpenClosedTuesday = jQuery('input:radio[name=uxDayOpenClosedTuesday]:checked').val();
			var uxDdlStartTuesday = jQuery('#uxDdlStartTuesday').val();
		 	var uxDdlEndTuesday = jQuery('#uxDdlEndTuesday').val();
			var workingDayTuesday = "Tue";
			jQuery.ajax
			({
				type: "POST",
				data: "uxDayOpenClosed="+uxDayOpenClosedTuesday+"&uxDdlStart="+uxDdlStartTuesday+"&uxDdlEnd="+uxDdlEndTuesday+
				"&workingDay="+workingDayTuesday+"&uxDdlWorkingEmployees="+uxDdlWorkingEmployee+"&target=employeesWorkingHours&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
							
				}
			});
			var uxDayOpenClosedWednesday = jQuery('input:radio[name=uxDayOpenClosedWednesday]:checked').val();
			var uxDdlStartWednesday = jQuery('#uxDdlStartWednesday').val();
		 	var uxDdlEndWednesday = jQuery('#uxDdlEndWednesday').val();
			var workingDayWednesday = "Wed";
			jQuery.ajax
			({
				type: "POST",
				data: "uxDayOpenClosed="+uxDayOpenClosedWednesday+"&uxDdlStart="+uxDdlStartWednesday+"&uxDdlEnd="+uxDdlEndWednesday+
				"&workingDay="+workingDayWednesday+"&uxDdlWorkingEmployees="+uxDdlWorkingEmployee+"&target=employeesWorkingHours&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
						        	
				}
			});
			var uxDayOpenClosedThursday = jQuery('input:radio[name=uxDayOpenClosedThursday]:checked').val();
		 	var uxDdlStartThursday = jQuery('#uxDdlStartThursday').val();
		  	var uxDdlEndThursday = jQuery('#uxDdlEndThursday').val();
			var workingDayThursday = "Thu";
			jQuery.ajax
			({
				type: "POST",
				data: "uxDayOpenClosed="+uxDayOpenClosedThursday+"&uxDdlStart="+uxDdlStartThursday+"&uxDdlEnd="+uxDdlEndThursday+
				"&workingDay="+workingDayThursday+"&uxDdlWorkingEmployees="+uxDdlWorkingEmployee+"&target=employeesWorkingHours&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
						        	
				 }
			});
			var uxDayOpenClosedFriday = jQuery('input:radio[name=uxDayOpenClosedFriday]:checked').val();
			var uxDdlStartFriday = jQuery('#uxDdlStartFriday').val();
			var uxDdlEndFriday = jQuery('#uxDdlEndFriday').val();
			var workingDayFriday = "Fri";
			jQuery.ajax
			({
				type: "POST",
				data: "uxDayOpenClosed="+uxDayOpenClosedFriday+"&uxDdlStart="+uxDdlStartFriday+"&uxDdlEnd="+uxDdlEndFriday+
				"&workingDay="+workingDayFriday+"&uxDdlWorkingEmployees="+uxDdlWorkingEmployee+"&target=employeesWorkingHours&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
						        	
				}
			});
			var uxDayOpenClosedSaturday = jQuery('input:radio[name=uxDayOpenClosedSaturday]:checked').val();
		 	var uxDdlStartSaturday = jQuery('#uxDdlStartSaturday').val();
		 	var uxDdlEndSaturday = jQuery('#uxDdlEndSaturday').val();
		 	var workingDaySaturday = "Sat";
			jQuery.ajax
			({
				type: "POST",
				data: "uxDayOpenClosed="+uxDayOpenClosedSaturday+"&uxDdlStart="+uxDdlStartSaturday+"&uxDdlEnd="+uxDdlEndSaturday+
				"&workingDay="+workingDaySaturday+"&uxDdlWorkingEmployees="+uxDdlWorkingEmployee+"&target=employeesWorkingHours&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
						        	
				}
			});
			var uxDayOpenClosedSunday = jQuery('input:radio[name=uxDayOpenClosedSunday]:checked').val();
			var uxDdlStartSunday = jQuery('#uxDdlStartSunday').val();
			var uxDdlEndSunday = jQuery('#uxDdlEndSunday').val();
			var workingDaySunday = "Sun";
			
			jQuery.ajax
			({
				type: "POST",
				data: "uxDayOpenClosed="+uxDayOpenClosedSunday+"&uxDdlStart="+uxDdlStartSunday+"&uxDdlEnd="+uxDdlEndSunday+
				"&workingDay="+workingDaySunday+"&uxDdlWorkingEmployees="+uxDdlWorkingEmployee+"&target=employeesWorkingHours&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
				{
					jQuery('#workingHoursSuccessMessage').css('display','block');
					setTimeout(function() 
					{
						jQuery('#workingHoursSuccessMessage').css('display','none');
						var checkPage = "<?php echo $_REQUEST['page']; ?>";
						window.location.href = "admin.php?page="+checkPage;
					}, 2000);
				}
			});
		}
	});
	jQuery("#uxFrmGeneralSettings").validate
	({
		submitHandler: function(form) 
	    {
			var uxDefaultcurrency  = jQuery('#uxDdlDefaultCurrency').val();
	    	var uxDefaultcountry  = jQuery('#uxDdlDefaultCountry').val();
	    	var uxDefaultTimeFormat =   jQuery('#uxDefaultTimeFormat').val();
	    	var uxDefaultDateFormat =   jQuery('#uxDefaultDateFormat').val();
	    	var uxSlotHours =  jQuery('#uxSlotHours').val();
	    	var uxSlotMins =  jQuery('#uxSlotMins').val();
	    	var StaffManagement = jQuery('input:radio[name=uxStaffManagement]:checked').val();
	    	var default_Time_Zone = encodeURIComponent(jQuery('#uxDefaultTimeZone').val());
	    	var default_Time_Zone_Name =  encodeURIComponent(jQuery("#uxDefaultTimeZone option[value='"+default_Time_Zone+"']").text());
    	    jQuery.ajax
		    ({
					type: "POST",
					data: "default_Time_Zone_Name="+default_Time_Zone_Name+"&default_Time_Zone="+default_Time_Zone+"&StaffManagement="+StaffManagement+"&uxDefaultcurrency="+uxDefaultcurrency+"&uxDefaultcountry="+uxDefaultcountry+"&uxDefaultTimeFormat="+uxDefaultTimeFormat+
					"&uxSlotHours="+uxSlotHours+"&uxDefaultDateFormat="+uxDefaultDateFormat+"&uxSlotMins="+uxSlotMins+"&target=updateGeneralSettings&action=getAjaxExecuted",
					url:  ajaxurl,
		            success: function(data) 
		            {  
		            	var format = data.split(',');
						jQuery('#uniform-uxSlotHours span').val(format[0]);
						jQuery('#uniform-uxSlotMins span').html(format[1]);
		            	jQuery('#successDefaultSettingsMessage').css('display','block');
						setTimeout(function() 
					    {
					       	jQuery('#successDefaultSettingsMessage').css('display','none');
					       	var checkPage = "<?php echo $_REQUEST['page']; ?>";
							window.location.href = "admin.php?page="+checkPage;
					    }, 2000);				            	
	                }
	        });
		}
	});
	 jQuery("#uxFrmAutoApprove").validate
	  ({
			submitHandler: function(form) 
		    {
		    	 var uxAutoApprove =  jQuery('input:radio[name=uxAutoApprove]:checked').val();
		        jQuery.ajax
			    ({
					type: "POST",
					data: "uxAutoApprove="+uxAutoApprove+"&target=AutoApprove&action=getAjaxExecuted",
					url:  ajaxurl,
			        success: function(data) 
				    {  
				        jQuery('#successAutoApproveMessage').css('display','block');
						setTimeout(function() 
						{
							 jQuery('#successAutoApproveMessage').css('display','none');
							var checkPage = "<?php echo $_REQUEST['page']; ?>";
						    window.location.href = "admin.php?page="+checkPage;
						}, 2000);
					}
			    });
		    }	   		
	  });
	  function DeleteAllBookings()
	  {
	  	bootbox.confirm("<?php _e("Are you sure you want to Delete All Bookings?", bookings_plus ); ?>", function(confirmed) 
		{
			console.log("Confirmed: "+confirmed);
			if(confirmed == true)
			{
		  		jQuery.ajax
				({
					type: "POST",
					data: "target=DeleteAllBookings&action=getAjaxExecuted",
					url:  ajaxurl,
				    success: function(data) 
					{
						var checkPage = "<?php echo $_REQUEST['page']; ?>";
						window.location.href = "admin.php?page="+checkPage;
					}
				});
			}
		});  
	  }
	  function RestoreFactorySettings()
	  {
	  	bootbox.confirm("<?php _e("Are you sure you want to Restore Factory Settings ?", bookings_plus ); ?>", function(confirmed) 
		{
			console.log("Confirmed: "+confirmed);
			if(confirmed == true)
			{
				jQuery.ajax
				({
					type: "POST",
					data: "target=RestoreFactorySettings&action=getAjaxExecuted",
					url:  ajaxurl,
				    success: function(data) 
					{
						var checkPage = "<?php echo $_REQUEST['page']; ?>";
						window.location.href = "admin.php?page="+checkPage;
					}
				});
				
			}
		});  
	  }
	  function deleteBooking(bookingId)
    {
    	bootbox.confirm("<?php _e("Are you sure you want to delete this Booking?", bookings_plus ); ?>", function(confirmed) 
		{
			console.log("Confirmed: "+confirmed);
			if(confirmed == true)
			{
				jQuery.ajax
				({
					type: "POST",
					data: "bookingId="+bookingId+"&target=deleteBooking&action=getAjaxExecuted",
					url:ajaxurl,
					success: function(data) 
				    {  
				    	var checkPage = "<?php echo $_REQUEST['page']; ?>";
						window.location.href = "admin.php?page="+checkPage;

				    }
				});
			}
		});
    }
    function resendEmail(bookingId,status)
	{
		jQuery.ajax
		({
			type: "POST",
			data: "bookingId="+bookingId+"&status="+status+"&target=resendBookingEmail&action=getAjaxExecuted",
			url:ajaxurl,
			success: function(data) 
			{	
				bootbox.alert('<?php _e("Email has been Sent successfully.", bookings_plus ); ?>');	
			}
		})
	}
	  <?php
		$paypalEnable = $wpdb->get_var("SELECT PaymentGatewayValue FROM ".payment_Gateway_settingsTable()." where PaymentGatewayKey = 'paypal-enabled'");
		if($paypalEnable == 0)
		{
	?>
			oTable = jQuery('#data-table-upcoming-events').dataTable
			({
				"bJQueryUI": false,
				"bAutoWidth": true,
				"sPaginationType": "full_numbers",
				"sDom": '<"datatable-header"fl>t<"datatable-footer"ip>',
				"oLanguage": 
				{
						"sLengthMenu": "<span>Show entries:</span> _MENU_"
				},
				"aaSorting": [[ 5, "asc" ]],
				"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0 ] },{ "bSortable": false, "aTargets": [ 7 ] }]
			});
	<?php
		}
		else
		{
	?>
			oTable = jQuery('#data-table-upcoming-events').dataTable
			({
					"bJQueryUI": false,
					"bAutoWidth": true,
					"sPaginationType": "full_numbers",
					"sDom": '<"datatable-header"fl>t<"datatable-footer"ip>',
					"oLanguage": 
					{
						"sLengthMenu": "<span>Show entries:</span> _MENU_"
					},
					"aaSorting": [[ 4, "asc" ]],
					"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 7 ] }]
			});
		<?php
		}
		?>
		function headerCheckAll()
		{
			var headerCheck = jQuery("#headerCheckBox").is(':checked');
			
			
			if(headerCheck)
			{		
				jQuery.ajax
				({
					type: "POST",
					data: "&target=checkAllServices&action=getAjaxExecuted",
					url:ajaxurl,
					success: function(data) 
					{  	
	
						jQuery("#allocateServices").append(data);
				 	}
				});
			}
			else
			{
				jQuery.ajax
				({
					type: "POST",
					data: "target=UnSelectAllServices&action=getAjaxExecuted",
					url:  ajaxurl,
					success: function(data) 
					{  	
						jQuery("#allocateServices").append(data);
				 	}
				});
			}
			
		}
		jQuery("#uxFrmReminderSettings").validate
	  	({
		    	highlight: function(label) 
		    	{	    	
		    		if(jQuery(label).closest('.control-group').hasClass('success'))
		    		{
		    			jQuery(label).closest('.control-group').removeClass('success');
		    		}
		    		jQuery(label).closest('.control-group').addClass('errors');
		    	},
		    	success: function(label) 
		    	{
		    		label
		    			.text('Success!').addClass('valid')
		    			.closest('.control-group').addClass('success');
		    	},
		     	submitHandler: function(form) 
		     	{
		     		var uxReminderInterval = jQuery('#uxReminderInterval').val();		    	    
		    	    var uxReminderSettings =  jQuery('input:radio[name=uxReminderSettings]:checked').val();
		    	   
		    	
			     	jQuery.ajax
				    ({
							type: "POST",
							data: "uxReminderSettings="+uxReminderSettings+"&uxReminderInterval="+uxReminderInterval+"&target=UpdateReminderSettings&action=getAjaxExecuted",
							url:  ajaxurl,
				            success: function(data) 
				            { 
				            	
				            	jQuery('#successReminderSettingsMessage').css('display','block');
								setTimeout(function() 
							    {
							    	
							       	jQuery('#successReminderSettingsMessage').css('display','none');
							        var checkPage = "<?php echo $_REQUEST['page']; ?>";
							    	window.location.href = "admin.php?page="+checkPage;
							    }, 2000);	
							}
			        });
		   		}		   		
	  	});
	  	jQuery(function() 
	  	{
	  		var previousPoint;
 		    var d1 = [];
    		for (var i = 0; i <= 15; i += 1)
        		d1.push([i, parseInt(Math.random() * 40)]);
 			var d2 = [];
    		for (var i = 0; i <= 15; i += 1)
        		d2.push([i, parseInt(Math.random() * 40)]);
 			var d3 = [];
			for (var i = 0; i <= 15; i += 1)
				d3.push([i, parseInt(Math.random() * 40)]);
			var d4 = [];
			for (var i = 0; i <= 15; i += 1)
				d4.push([i, parseInt(Math.random() * 40)]);        
			var ds = new Array();
 
     		ds.push
     		({
        		data:d1,
        		bars: 
        		{
		            show: true, 
		            barWidth: 0.1, 
		            order: 1,
        		}
    		});
    		ds.push
    		({
        		data:d2,
		        bars: 
		        {	
		            show: true, 
		            barWidth: 0.1, 
		            order: 2
        		}
    		});
    		ds.push
    		({
        		data:d3,
        		bars: 
        		{
            		show: true, 
            		barWidth: 0.1, 
            		order: 3
        		}
    		});
     		ds.push
     		({
        		data:d4,
        		bars: 
        		{
		            show: true, 
		            barWidth: 0.1, 
		            order: 4
        		}
    		});
    		
    		function showTooltip(x, y, contents, areAbsoluteXY) 
    		{
        		var rootElt = 'body';
		        jQuery('<div id="tooltip4" class="chart-tooltip">' + contents + '</div>').css
		        ({
		            position: 'absolute',
		            display: 'none',
		            top: y - 35,
		            left: x - 5,
					'z-index': '9999',
					'color': '#fff',
					'font-size': '11px',
		            opacity: 0.9
        		}).prependTo(rootElt).show();
    		}
		    var plot = jQuery.plot(jQuery("#placeholder1"), ds, 
		    {
	        	grid:{ hoverable:true },
        	});
         	jQuery("#placeholder1").bind("plothover", function (event, pos, item) 
         	{
    			if (item) 
    			{
        			if (previousPoint != item.datapoint) 
        			{
            			previousPoint = item.datapoint;
 			            jQuery('.chart-tooltip').remove();
 			            var x = item.datapoint[0];
 			           if(item.series.bars.order)
 			           {
                			for(var i=0; i < item.series.data.length; i++)
                			{
                    			if(item.series.data[i][3] == item.datapoint[0])
                        		x = item.series.data[i][0];
                			}
	  	          		}	
			            var y = item.datapoint[1];
 	           			showTooltip(item.pageX+5, item.pageY+5,y);
			        }
    			}
    			else 
    			{
        			jQuery('.chart-tooltip').remove();
        			previousPoint = null;
    			}
 			});
 		});			  
</script>
<?php
}
?>