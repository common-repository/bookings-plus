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
    				 	<?php _e( "Email Templates", bookings_plus ); ?>
    				 </h5>
            	</div>
			</div>
			<div class="body">
				<div class="well-smoke block"  style="margin-top:10px">
					<div class="navbar">
					   	<div class="navbar-inner">
					    	<h5><?php _e( "Booking Pending Confirmation Email Template [Sent to Client]",bookings_plus ); ?></h5>
					    	<div class="nav pull-right">
					   	    	<a class="just-icon" data-toggle="collapse" data-target="#socialMediaSettings">
					   	    		<i class="font-resize-vertical"></i>
					            </a>
					       </div>
					    </div>
					</div>
				 	<div class="collapse" id="socialMediaSettings">
						<form id="uxFrmPendingConfirmationEmailTemplate" class="form-horizontal" method="post" action="#">
							<div class="body">
								<div class="note note-success" id="PendingConfirmationSuccess" style="display:none">
									<strong>
										<?php _e( "Success! The Email has been saved Successfully.", bookings_plus ); ?>
									</strong>
						       </div>
						       <?php
						       		$result = $wpdb->get_row
									(
										$wpdb->prepare
										(
											"SELECT * FROM ".email_templatesTable()." where EmailType = %s",
											"booking-pending-confirmation"
										)
									);
								    ?>
						            <div class="block well" style="margin-top:10px;">
					
						                <div class="row-fluid form-horizontal">
							            	<div class="control-group">
							                	<label class="control-label">
							                		<?php _e( "Email Subject :", bookings_plus ); ?>
							                        <span class="req">*</span>
							                    </label>
							                    <div class="controls">
							                    	<input type="text" class="required span12"name="uxPendingConfirmationEmailTemplateSubject" value="<?php echo $result->  EmailSubject ;?>" id="uxPendingConfirmationEmailTemplateSubject"/>
							                    </div>
							                </div>
							                <div class="control-group">        
					    						<?php   
					    						   $content = stripslashes($result->EmailContent);
												   wp_editor($content, $id = 'uxPendingConfirmationEmailTemplate', $prev_id = 'title', $media_buttons = true, $tab_index = 1); 
					    						?>
											</div>
										</div>
									</div>
						          	<div class="form-actions" style="padding:10px 0px;">
						         		<input type="submit" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>"   class="btn btn-danger pull-right">
						         	</div>
							</div>
						</form>
						<style type="text/css">
							#uxPendingConfirmationEmailTemplate_ifr{height:250px !important;}
						</style>
					</div>
				</div>
				<div class="well-smoke block"  style="margin-top:10px">
					<div class="navbar">
					   	<div class="navbar-inner">
					    	<h5><?php _e( "Booking Confirmation Email Template [Sent to Client]",bookings_plus ); ?></h5>
					        <div class="nav pull-right">
					   	    	<a class="just-icon" data-toggle="collapse" data-target="#ConfirmationMediaSettings">
					   	    		<i class="font-resize-vertical"></i>
					            </a>
					       </div>
					    </div>
					</div>
				 	<div class="collapse" id="ConfirmationMediaSettings">
						<form id="uxFrmConfirmationEmailTemplate" class="form-horizontal" method="post" action="#">
							<div class="body">
								<div class="note note-success" id="ConfirmationSuccess" style="display:none">
									<strong>
										<?php _e( "Success! The Email has been saved Successfully.", bookings_plus ); ?>
									</strong>
						        </div>
						        <?php
						        	$result = $wpdb->get_row
									(
										$wpdb->prepare
										(
											"SELECT * FROM ".email_templatesTable()." where EmailType = %s",
											"booking-confirmation"
										)
									);
								?>
						        <div class="block well" style="margin-top:10px;">
						     
						            <div class="row-fluid form-horizontal">
							        	<div class="control-group">
							            	<label class="control-label"><?php _e( "Email Subject :", bookings_plus ); ?>
							                    	<span class="req">*</span>
							                </label>
							                <div class="controls">
							                	<input type="text" class="required span12" name="uxConfirmationEmailTemplateSubject" value="<?php echo $result->  EmailSubject ;?>" id="uxConfirmationEmailTemplateSubject"/>
							                </div>
							            </div>								
										<div class="control-group">        
					    						<?php   
					    						 	$content = stripslashes($result->EmailContent);
					    							wp_editor($content, $id = 'uxConfirmationEmailTemplate', $prev_id = 'title', $media_buttons = true, $tab_index = 1); 
					    						?>
										</div>                     
						            </div>
						    	</div>
						        <div class="form-actions" style="padding:10px 0px;">
						        	<input type="submit" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
						        </div>
							</div>
						</form>
						<style type="text/css">
							#uxConfirmationEmailTemplate_ifr{height:250px !important;}
						</style>
					</div>
				</div>
				<div class="well-smoke block"  style="margin-top:10px">
					<div class="navbar">
					   	<div class="navbar-inner">
					    	<h5><?php _e( "Booking Decline Email Template [Sent to Client]",bookings_plus ); ?></h5>
					        <div class="nav pull-right">
					   	    	<a class="just-icon" data-toggle="collapse" data-target="#DeclineSettings">
					   	    		<i class="font-resize-vertical"></i>
					            </a>
					       </div>
					    </div>
					</div>
				 	<div class="collapse" id="DeclineSettings">
						<form id="uxFrmBookingDeclinedEmailTemplate" class="form-horizontal" method="post" action="#">
							<div class="body">
								<div class="note note-success" id="BookingDeclinedSuccess" style="display:none">
									<strong><?php _e( "Success! The Email has been saved Successfully.", bookings_plus ); ?></strong>
						        </div>
						        <?php
						        	$result = $wpdb->get_row
									(
										$wpdb->prepare
										(
											"SELECT * FROM ".email_templatesTable()." where EmailType = %s","booking-disapproved"
										)
									);
								?>
						        <div class="block well" style="margin-top:10px;">
					
						            <div class="row-fluid form-horizontal">
							        	<div class="control-group">
							            	<label class="control-label"><?php _e( "Email Subject :", bookings_plus ); ?>
							            		<span class="req">*</span>
							                </label>
							                <div class="controls">
							                	<input type="text" class="required span12" name="uxBookingDeclinedEmailTemplateSubject" value="<?php echo $result->  EmailSubject ;?>" id="uxBookingDeclinedEmailTemplateSubject"/>
							                </div>
							        	</div>								
										<div class="control-group">        
					    				<?php   
					    				 	$content = stripslashes($result->EmailContent);
					    					wp_editor($content, $id = 'uxBookingDeclinedEmailTemplate', $prev_id = 'title', $media_buttons = true, $tab_index = 1); 
					    				?>
										</div>                 
						            </div>
						        </div>
						        <div class="form-actions" style="padding:10px 0px;">
						        	<input type="submit" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>"   class="btn btn-danger pull-right">
						        </div>
							</div>
						</form>
						<style type="text/css">
							#uxBookingDeclinedEmailTemplate_ifr{height:250px !important;}
						</style>
					</div>
				</div>
				<div class="well-smoke block"  style="margin-top:10px">
					<div class="navbar">
					   	<div class="navbar-inner">
					    	 <h5><?php _e( "Admin Approve/Disapprove Email Template [Sent to Admin]",bookings_plus ); ?></h5>
					        <div class="nav pull-right">
					   	    	<a class="just-icon" data-toggle="collapse" data-target="#AdminSettings">
					   	    		<i class="font-resize-vertical"></i>
					            </a>
					       </div>
					    </div>
					</div>
				 	<div class="collapse" id="AdminSettings">
						<form id="uxFrmAdminApproveDisapproveEmailTemplate" class="form-horizontal" method="post" action="#">
							<div class="body">
								<div class="note note-success" id="AdminApproveDisapproveSuccess" style="display:none">
									<strong>
										<?php _e( "Success! The Email has been saved Successfully.", bookings_plus ); ?>
									</strong>
						        </div>
						        <?php
						        	$result = $wpdb->get_row
										(
											$wpdb->prepare
											(
												"SELECT * FROM ".email_templatesTable()." where EmailType = %s","admin-control"
											)
										);
								?>
						        <div class="block well" style="margin-top:10px;">
					
						            <div class="row-fluid form-horizontal">
							        	<div class="control-group">
							            	<label class="control-label"><?php _e( "Email Subject :", bookings_plus ); ?>
							                    	<span class="req">*</span>
							                </label>
							                <div class="controls">
							                	<input type="text" class="required span12" name="uxAdminApproveDisapproveEmailTemplateSubject" value="<?php echo $result->  EmailSubject ;?>" id="uxAdminApproveDisapproveEmailTemplateSubject"/>
							                </div>
							            </div>								
										<div class="control-group">        
					    				<?php   
					    				 	$content = stripslashes($result->EmailContent);
					    					wp_editor($content, $id = 'uxAdminApproveDisapproveEmailTemplate', $prev_id = 'title', $media_buttons = true, $tab_index = 1); 
					    				?>
										</div>                       
						            </div>
						      	</div>
						        <div class="form-actions" style="padding:10px 0px;">
						        	<input type="submit" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>"   class="btn btn-danger pull-right">
						        </div>
							</div>
						</form>
						<style type="text/css">
							#uxAdminApproveDisapproveEmailTemplate_ifr{height:250px !important;}
						</style>
					</div>
				</div>
				<div class="well-smoke block"  style="margin-top:10px">
					<div class="navbar">
					   	<div class="navbar-inner">
					    	 <h5><?php _e( "Paypal Admin Notification Email Template [Sent to Admin]", bookings_plus ); ?></h5>
					        <div class="nav pull-right">
					   	    	<a class="just-icon" data-toggle="collapse" data-target="#PaypalNotifySettings">
					   	    		<i class="font-resize-vertical"></i>
					            </a>
					       </div>
					    </div>
					</div>
				 	<div class="collapse" id="PaypalNotifySettings">
						<form id="uxFrmPaypalAdminNotificationEmailTemplate" class="form-horizontal" method="post" action="#">
							<div class="body">
								<div class="note note-success" id="PaypalAdminNotificationSuccess" style="display:none">
									<strong>
										<?php _e( "Success! The Email has been saved Successfully.", bookings_plus ); ?>
									</strong>
						        </div>
						        <?php
						        	$result = $wpdb->get_row
									(
										$wpdb->prepare
										(
											"SELECT * FROM ".email_templatesTable()." where EmailType = %s","paypal-payment-notification"
											           	
										)
									);
								?>
						        <div class="block well" style="margin-top:10px;">
						   
						            <div class="row-fluid form-horizontal">
							        	<div class="control-group">
							            	<label class="control-label"><?php _e( "Email Subject :", bookings_plus ); ?>
							                    	<span class="req">*</span>
							                </label>
							                <div class="controls">
							                	<input type="text" class="required span12" name="uxPaypalAdminNotificationEmailTemplateSubject" value="<?php echo $result->  EmailSubject ;?>" id="uxPaypalAdminNotificationEmailTemplateSubject"/>
							                </div>
							            </div>								
										<div class="control-group">        
					    				<?php   
					    				 	$content = stripslashes($result->EmailContent);
					    					wp_editor($content, $id = 'uxPaypalAdminNotificationEmailTemplate', $prev_id = 'title', $media_buttons = true, $tab_index = 1); 
					    				?>
										</div>                      
						            </div>
						        </div>
						        <div class="form-actions" style="padding:10px 0px;">
						        	<input type="submit" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>"   class="btn btn-danger pull-right">
						        </div>
							</div>
						</form>
						<style type="text/css">
							#uxPaypalAdminNotificationEmailTemplate_ifr{height:250px !important;}
						</style>
					</div>
				</div>
				<div class="well-smoke block"  style="margin-top:10px">
					<div class="navbar">
					   	<div class="navbar-inner">
					    	  <h5><?php _e( "Paypal Cancellation Notification Email Template [Sent to Admin]", bookings_plus ); ?></h5>
					        <div class="nav pull-right">
					   	    	<a class="just-icon" data-toggle="collapse" data-target="#PaypalCancelSettings">
					   	    		<i class="font-resize-vertical"></i>
					            </a>
					       </div>
					    </div>
					</div>
				 	<div class="collapse" id="PaypalCancelSettings">
						<form id="uxFrmPaypalCancellationNotificationEmailTemplate" class="form-horizontal" method="post" action="#">
							<div class="body">
								<div class="note note-success" id="PaypalCancellationNotificationSuccess" style="display:none">
									<strong>
										<?php _e( "Success! The Email has been saved Successfully.", bookings_plus ); ?>
									</strong>
						        </div>
						        <?php
						        	$result = $wpdb->get_row
									(
										$wpdb->prepare
										(
											"SELECT * FROM ".email_templatesTable()." where EmailType = %s","paypal-cancellation-notification"
											           	
										)
									);
								?>
						        <div class="block well" style="margin-top:10px;">
					
						            <div class="row-fluid form-horizontal">
							        	<div class="control-group">
							            	<label class="control-label"><?php _e( "Email Subject :", bookings_plus ); ?>
							                    <span class="req">*</span>
							                </label>
							                <div class="controls">
							                	<input type="text" class="required span12" name="uxPaypalCancellationNotificationEmailTemplateSubject" value="<?php echo $result->  EmailSubject ;?>" id="uxPaypalCancellationNotificationEmailTemplateSubject"/>
							                </div>
							            </div>								
										<div class="control-group">        
					    				<?php   
					    				 	$content = stripslashes($result->EmailContent);
					    					wp_editor($content, $id = 'uxPaypalCancellationNotificationEmailTemplate', $prev_id = 'title', $media_buttons = true, $tab_index = 1); 
					    				?>
										</div>                     
						            </div>
						        </div>
						        <div class="form-actions" style="padding:10px 0px;">
						        	<input type="submit" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>"   class="btn btn-danger pull-right">
						        </div>
							</div>
						</form>
						<style type="text/css">
							#uxPaypalCancellationNotificationEmailTemplate_ifr{height:250px !important;}
						</style>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	jQuery("#EmailTemplate").attr("class","active");
	jQuery("#uxFrmPendingConfirmationEmailTemplate").validate
		({
			submitHandler: function(form) 
	     	{ 
				var PendingConfirmationEmailTemplateSubject =  encodeURIComponent(jQuery("#uxPendingConfirmationEmailTemplateSubject").val());
				if (jQuery("#wp-uxPendingConfirmationEmailTemplate-wrap").hasClass("tmce-active"))
				{
		    		var PendingConfirmationEmailTemplateContent  = encodeURIComponent(tinyMCE.get('uxPendingConfirmationEmailTemplate').getContent());
		    	}
		    	else
		    	{
		    		var PendingConfirmationEmailTemplateContent  = encodeURIComponent(jQuery('#uxPendingConfirmationEmailTemplate').val());
		    	}									
				jQuery.ajax
			    ({
						type: "POST",
						data: "PendingConfirmationEmailTemplateSubject="+PendingConfirmationEmailTemplateSubject+
						"&PendingConfirmationEmailTemplateContent="+PendingConfirmationEmailTemplateContent+
						"&target=updatePendingConfirmationEmailTemplate&action=getAjaxExecuted",
						url:  ajaxurl,
			            success: function(data) 
			            {  
			            	jQuery('#PendingConfirmationSuccess').css('display','block');
			            	setTimeout(function() 
						    {
						    	jQuery('#PendingConfirmationSuccess').css('display','none');
						         var checkPage = "<?php echo $_REQUEST['page']; ?>";
						    	window.location.href = "admin.php?page="+checkPage;
						   }, 2000);
			            }
			    });
			}
		});
		
		jQuery("#uxFrmConfirmationEmailTemplate").validate
		({
			submitHandler: function(form) 
	     	{
				var ConfirmationEmailTemplateSubject =  encodeURIComponent(jQuery("#uxConfirmationEmailTemplateSubject").val());
				if (jQuery("#wp-ConfirmationEmailTemplateContent-wrap").hasClass("tmce-active"))
				{
		    		var ConfirmationEmailTemplateContent  = encodeURIComponent(tinyMCE.get('ConfirmationEmailTemplateContent').getContent());
		    	}
		    	else
		    	{
		    		var ConfirmationEmailTemplateContent  = encodeURIComponent(jQuery('#ConfirmationEmailTemplateContent').val());
		    	}					
				
		     	jQuery.ajax
			    ({
						type: "POST",
						data: "ConfirmationEmailTemplateSubject="+ConfirmationEmailTemplateSubject+
						"&ConfirmationEmailTemplateContent="+ConfirmationEmailTemplateContent+"&target=updateConfirmationEmailTemplate&action=getAjaxExecuted",
						url:  ajaxurl,
			            success: function(data) 
			            {  
			            	jQuery('#ConfirmationSuccess').css('display','block');
			            	setTimeout(function() 
						    {
						    	jQuery('#ConfirmationSuccess').css('display','none');
						         var checkPage = "<?php echo $_REQUEST['page']; ?>";
						    	window.location.href = "admin.php?page="+checkPage;
						   }, 2000);
			            }
			    });
			}
		});
		
		jQuery("#uxFrmBookingDeclinedEmailTemplate").validate
		({
			submitHandler: function(form) 
	     	{
				var DeclineEmailTemplateSubject =  encodeURIComponent(jQuery("#uxBookingDeclinedEmailTemplateSubject").val());
				if (jQuery("#wp-uxBookingDeclinedEmailTemplate-wrap").hasClass("tmce-active"))
				{
		    		var DeclineEmailTemplateContent  = encodeURIComponent(tinyMCE.get('uxBookingDeclinedEmailTemplate').getContent());
		    	}
		    	else
		    	{
		    		var DeclineEmailTemplateContent  = encodeURIComponent(jQuery('#uxBookingDeclinedEmailTemplate').val());
		    	}				
		     	jQuery.ajax
			    ({
						type: "POST",
						data: "DeclineEmailTemplateSubject="+DeclineEmailTemplateSubject+
						"&DeclineEmailTemplateContent="+DeclineEmailTemplateContent+"&target=updateDeclinedEmailTemplate&action=getAjaxExecuted",
						url:  ajaxurl,
			            success: function(data) 
			            {  
			            	jQuery('#BookingDeclinedSuccess').css('display','block');
			            	setTimeout(function() 
						    {
						    	jQuery('#BookingDeclinedSuccess').css('display','none');
						         var checkPage = "<?php echo $_REQUEST['page']; ?>";
						    	window.location.href = "admin.php?page="+checkPage;
						   }, 2000);
			            }
			    });
			}
		});
		jQuery("#uxFrmAdminApproveDisapproveEmailTemplate").validate
		({
			submitHandler: function(form) 
	     	{
				var AdminApproveDisapproveEmailTemplateSubject =  encodeURIComponent(jQuery("#uxAdminApproveDisapproveEmailTemplateSubject").val());
				if (jQuery("#wp-uxAdminApproveDisapproveEmailTemplate-wrap").hasClass("tmce-active"))
				{
		    		var AdminApproveDisapproveEmailTemplateContent  = encodeURIComponent(tinyMCE.get('uxAdminApproveDisapproveEmailTemplate').getContent());
		    	}
		    	else
		    	{
		    		var AdminApproveDisapproveEmailTemplateContent  = encodeURIComponent(jQuery('#uxAdminApproveDisapproveEmailTemplate').val());
		    	}				
		     	jQuery.ajax
			    ({
						type: "POST",
						data: "AdminApproveDisapproveEmailTemplateSubject="+AdminApproveDisapproveEmailTemplateSubject+
						"&AdminApproveDisapproveEmailTemplateContent="+AdminApproveDisapproveEmailTemplateContent+
						"&target=updateAdminApproveDisapproveEmailTemplate&action=getAjaxExecuted",
						url:  ajaxurl,
			            success: function(data) 
			            {  
			            	jQuery('#AdminApproveDisapproveSuccess').css('display','block');
			            	setTimeout(function() 
						    {
						    	jQuery('#AdminApproveDisapproveSuccess').css('display','none');
						         var checkPage = "<?php echo $_REQUEST['page']; ?>";
						    	window.location.href = "admin.php?page="+checkPage;
						   }, 2000);
			            }
			    });
			}
		});
		
		jQuery("#uxFrmPaypalAdminNotificationEmailTemplate").validate
		({
			submitHandler: function(form) 
	     	{
				var PaypalAdminNotificationEmailTemplateSubject =  encodeURIComponent(jQuery("#uxPaypalAdminNotificationEmailTemplateSubject").val());
				if (jQuery("#wp-uxPaypalAdminNotificationEmailTemplate-wrap").hasClass("tmce-active"))
				{
		    		var PaypalAdminNotificationEmailTemplateContent  = encodeURIComponent(tinyMCE.get('uxPaypalAdminNotificationEmailTemplate').getContent());
		    	}
		    	else
		    	{
		    		var PaypalAdminNotificationEmailTemplateContent  = encodeURIComponent(jQuery('#uxPaypalAdminNotificationEmailTemplate').val());
		    	}				
		     	jQuery.ajax
			    ({
						type: "POST",
						data: "PaypalAdminNotificationEmailTemplateSubject="+PaypalAdminNotificationEmailTemplateSubject+
						"&PaypalAdminNotificationEmailTemplateContent="+PaypalAdminNotificationEmailTemplateContent+
						"&target=updatePaypalAdminNotificationEmailTemplate&action=getAjaxExecuted",
						url:  ajaxurl,
			            success: function(data) 
			            {  
			            	jQuery('#PaypalAdminNotificationSuccess').css('display','block');
			            	setTimeout(function() 
						    {
						    	jQuery('#PaypalAdminNotificationSuccess').css('display','none');
						        var checkPage = "<?php echo $_REQUEST['page']; ?>";
						    	window.location.href = "admin.php?page="+checkPage;
						   }, 2000);
			            }
			    });
			}
		});
		
		jQuery("#uxFrmPaypalCancellationNotificationEmailTemplate").validate
		({
			submitHandler: function(form) 
	     	{
				var PaypalCancellationNotificationEmailTemplateSubject =  encodeURIComponent(jQuery("#uxPaypalCancellationNotificationEmailTemplateSubject").val());
				if (jQuery("#wp-uxPaypalCancellationNotificationEmailTemplate-wrap").hasClass("tmce-active"))
				{
		    		var PaypalCancellationNotificationEmailTemplateContent  = encodeURIComponent(tinyMCE.get('uxPaypalCancellationNotificationEmailTemplate').getContent());
		    	}
		    	else
		    	{
		    		var PaypalCancellationNotificationEmailTemplateContent  = encodeURIComponent(jQuery('#uxPaypalCancellationNotificationEmailTemplate').val());
		    	}				
				jQuery.ajax
			    ({
						type: "POST",
						data: "PaypalCancellationNotificationEmailTemplateSubject="+PaypalCancellationNotificationEmailTemplateSubject+
						"&PaypalCancellationNotificationEmailTemplateContent="+PaypalCancellationNotificationEmailTemplateContent+
						"&target=updatePaypalCancellationNotificationEmailTemplate&action=getAjaxExecuted",
						url:  ajaxurl,
			            success: function(data) 
			            {  
			            	jQuery('#PaypalCancellationNotificationSuccess').css('display','block');
			            	setTimeout(function() 
						    {
						    	jQuery('#PaypalCancellationNotificationSuccess').css('display','none');
						         var checkPage = "<?php echo $_REQUEST['page']; ?>";
						    	window.location.href = "admin.php?page="+checkPage;
						   }, 2000);
			            }
			    });
			}
		});
	
</script>		
<?php
}
?>					       