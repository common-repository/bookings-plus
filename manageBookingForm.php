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
             		 <h5><i class="font-hand-right"></i><?php _e( "Booking Form Setup", bookings_plus ); ?></h5>
            	</div>
			</div>
			<div class="body">
        		<div class="note note-success" id="bookingFieldsSuccessMessage" style="display:none">
					<strong><?php _e( "Success! The Booking Fields has been updated Successfully.", bookings_plus ); ?></strong>
	        	</div>
  				<div class="row-fluid nested">
					<div class="well-smoke block" style="margin-top:10px">
						<div class="navbar">
						   	<div class="navbar-inner">
							   	<h5>
						      		<?php _e( "Booking Form Fields", bookings_plus ); ?>
						       	</h5>
						        <div class="nav pull-right">
						            <a class="just-icon" data-toggle="collapse" data-target="#bookingFormFields">
						            	<i class="font-resize-vertical"></i>
						            </a>
						        </div>
						    </div>
						</div>
						<div class="collapse in" id="bookingFormFields">
							<div class="body"> 
						    	<form id="uxFrmbookingFormFields" class="form-horizontal" method="post" action="#">        		
									<div class="row-fluid nested form-horizontal">
										<div class="span12 well">
											<div class="table-overflow">
												<table class="table table-striped" id="data-table-clients">
													<thead>
														<tr>
														    <th><?php _e( "Field Name", bookings_plus ); ?></th>
														    <th><?php _e( "Visibility", bookings_plus ); ?></th>
														    <th><?php _e( "Validation", bookings_plus ); ?></th>
														</tr>
													</thead>
													<tbody>
													<?php
													$bookingFeild = $wpdb->get_results
													(
														$wpdb->prepare
														(
															"SELECT * FROM ".bookingFormTable(),""
														)
													);
													for ($flag = 0; $flag < count($bookingFeild); $flag++) 
													{
														$bookingFeildName = $bookingFeild[$flag]->BookingFormField ;
														$bookingStatus = $bookingFeild[$flag]->status;
														$BookingRequired = $bookingFeild[$flag]->required;
														$checked = "";
														$check = "";
														if ($bookingStatus == 1) 
														{
															$checked = "checked=\"checked\"";
														} 
														else 
														{
															$check = "checked=\"checked\"";
														}
														$check1 = "";
														$check0 = "";
														if ($BookingRequired == 1) 
														{
															$check1 = "checked=\"checked\"";
														} 
														else 
														{
															$check0 = "checked=\"checked\"";
														}
														?>
														<tr>
														    <td><?php _e($bookingFeildName, bookings_plus ); ?><input type="hidden" id="bookingFeildNameHidden<?php echo $flag;?>" value="<?php echo $bookingFeildName;?>"/></td>	
															   	<?php
																   	if($bookingFeildName != "First Name :" && $bookingFeildName != "Email :" )													
																	{
																	?>
																	   	<td>
																	       	<label class="radio">
																	       		<input type="radio" id="bookingStatus_<?php echo $flag;?>" name="bookingStatusSaved<?php echo $flag;?>" class="style" onchange="setaction(this)" value="1" <?php echo $checked;?> />  <?php _e( "Visible", bookings_plus ); ?>
																	       	</label>
																			<label class="radio">
																				<input type="radio" id="bookingStatus1_<?php echo $flag;?>" name="bookingStatusSaved<?php echo $flag;?>" class="style" onchange="setaction(this)" value="0" <?php echo $check;?> />  <?php _e( "Invisible", bookings_plus ); ?>
																			</label>                                     		 									
																		</td>
																		<td>
														            		<label class="radio">
														            			<input type="radio" id="bookingRequiredOpen<?php echo $flag;?>" name="bookingRequiredSaved<?php echo $flag;?>" class="style" value="1"   <?php echo $check1;?> /> <?php _e( "Required", bookings_plus ); ?>
														                	</label>	
																			<label class="radio">
																				<input type="radio" id="bookingRequiredClose<?php echo $flag;?>" name="bookingRequiredSaved<?php echo $flag;?>" class="style" value="0" <?php echo $check0;?> /> <?php _e( "Not Required", bookings_plus ); ?>
																			</label>
													                    </td>
										                    		<?php
										                    		}
																	else 
																	{
																	?>
																		<td>
															            	<label class="radio">
															            		<input type="radio" disabled="disabled" id="bookingStatus_<?php echo $flag;?>" name="bookingStatusSaved<?php echo $flag;?>" class="style" onchange="setaction(this)" value="1" <?php echo $checked;?> />  <?php _e( "Visible", bookings_plus ); ?>
															            	</label>
																			<label class="radio">
																				<input type="radio" disabled="disabled"id="bookingStatus1_<?php echo $flag;?>" name="bookingStatusSaved<?php echo $flag;?>" class="style" onchange="setaction(this)" value="0" <?php echo $check;?> />  <?php _e( "Invisible", bookings_plus ); ?>
																			</label>                                     		 									
																		</td>
																		<td>
											                 				<label class="radio">
											                 					<input type="radio" disabled="disabled" id="bookingRequiredOpen<?php echo $flag;?>" name="bookingRequiredSaved<?php echo $flag;?>" class="style" value="1"   <?php echo $check1;?> /> <?php _e( "Required", bookings_plus ); ?>
											                 				</label>	
																			<label class="radio">
																				<input type="radio" disabled="disabled" id="bookingRequiredClose<?php echo $flag;?>" name="bookingRequiredSaved<?php echo $flag;?>" class="style" value="0" <?php echo $check0;?> /> <?php _e( "Not Required", bookings_plus ); ?>
																			</label>
										                                </td>
																	<?php
																	}
										                            ?>
														</tr>
													<?php
													}
													?>
													</tbody>
												</table>
											</div>
										</div>							
									</div>
									<div class="form-actions" style="padding:10px 0px 0px 10px;">
										<input type="submit"  id="btnSaveFields" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
									</div>
								</form>					            		
							</div>		
						</div>
					</div>
					<div class="well-smoke block" style="margin-top:10px">
			   			<div class="navbar">
					    	<div class="navbar-inner">
	                	    	<h5>
	                	    		<?php _e( "Booking Form Header", bookings_plus ); ?>
	                	    	</h5>
	                            <div class="nav pull-right">
	                    	        <a class="just-icon" data-toggle="collapse" data-target="#bookingFormHeader">
	                    	        	<i class="font-resize-vertical"></i>
	                    	        </a>
	                    	    </div>
	                		</div>
	            		</div>
	            		<div class="note note-success" id="bookingFormHeaderSuccessMessage" style="display:none">
							<strong><?php _e( "Success! Booking form header has been updated Successfully.", bookings_plus ); ?></strong>
				        </div>
	            		<div class="collapse" id="bookingFormHeader">
	            			<div class="body"> 
	            				<form id="uxFrmbookingFormHeader" class="form-horizontal" method="post" action="#">       		
				        		<div class="row-fluid form-horizontal">
									<?php
										$bookingHeader = $wpdb -> get_var('SELECT GeneralSettingsValue FROM ' . 
		         						generalSettingsTable() . ' where GeneralSettingsKey = "booking-header-message"');
		         						$content = stripslashes($bookingHeader);
										the_editor($content, $id = 'bookingFormHeaderEditor', $prev_id = 'title', $media_buttons = true, $tab_index = 1); 
									?>							   					   
								</div>
								<div class="form-actions" style="padding:10px 0px 0px 10px;">
									<input type="submit" id="btnSaveHeader" value="<?php _e( "Save & Submit Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
								</div>	
								</form>							
							</div>
						</div>
					</div>
	        		<div class="well-smoke block" style="margin-top:10px">
			   			<div class="navbar">
					    	<div class="navbar-inner">
	                	    	<h5>
	                	    		<?php _e( "Booking Form Footer", bookings_plus ); ?>
	                	    	</h5>
	                            <div class="nav pull-right">
	                    	        <a class="just-icon" data-toggle="collapse" data-target="#bookingFormFooter">
	                    	        	<i class="font-resize-vertical"></i>
	                    	        </a>
	                    	    </div>
	                		</div>
	            		</div>
	            		<div class="note note-success" id="bookingFormFooterSuccessMessage" style="display:none">
							<strong><?php _e( "Success! Booking form footer message has been updated Successfully.", bookings_plus ); ?></strong>
				       	</div>
	            		<div class="collapse" id="bookingFormFooter">
	            			<div class="body">
	            				<form id="uxFrmbookingFormFooter" class="form-horizontal" method="post" action="#">             		
				        			<div class="row-fluid form-horizontal">
									<?php
										$bookingFooter = $wpdb -> get_var('SELECT GeneralSettingsValue FROM ' . 
		         						generalSettingsTable() . ' where GeneralSettingsKey = "booking-Footer-message"');
		         						$content = stripslashes($bookingFooter);
										the_editor($content, $id = 'bookingFormFooterEditor', $prev_id = 'title', $media_buttons = true, $tab_index = 1); 
									?>							   					   
									</div>
								<div class="form-actions" style="padding:10px 0px 0px 10px;">
									<input type="submit"  value="<?php _e( "Save & Submit Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
								</div>	
								</form>							
							</div>
						</div>
					</div>					
	        		<div class="well-smoke block" style="margin-top:10px">
			   			<div class="navbar">
					    	<div class="navbar-inner">
	                	    	<h5>
	                	    		<?php _e( "Booking Form Thank you Message", bookings_plus ); ?>
	                	    	</h5>
	                            <div class="nav pull-right">
	                    	        <a class="just-icon" data-toggle="collapse" data-target="#bookingFormThankyou">
	                    	        	<i class="font-resize-vertical"></i>
	                    	        </a>
	                    	    </div>
	                		</div>
	            		</div>
	            		<div class="note note-success" id="bookingFormThankyouSuccessMessage" style="display:none">
						    <strong><?php _e( "Success! Thank you message has been updated Successfully.", bookings_plus ); ?></strong>
				        </div>
	            		<div class="collapse" id="bookingFormThankyou">
	            			<div class="body"> 
	            				<form id="uxFrmbookingFormThankyou" class="form-horizontal" method="post" action="#">                  		
				        		<div class="row-fluid form-horizontal">
									<?php
										$bookingThankYou = $wpdb -> get_var('SELECT GeneralSettingsValue FROM ' . 
		         						generalSettingsTable() . ' where GeneralSettingsKey = "booking-ThankYou-message"');
										$content = stripslashes($bookingThankYou);
										the_editor($content, $id = 'bookingFormThankyouEditor', $prev_id = 'title', $media_buttons = true, $tab_index = 1); 
									?>							   					   
								</div>
							<div class="form-actions" style="padding:10px 0px 0px 10px;">
									<input type="submit" value="<?php _e( "Save & Submit Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
								</div>
								</form>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
<script>
	jQuery("#BookingForm").attr("class","active");
	jQuery("#uxFrmbookingFormFields").validate
	({
		rules:
		{
			
		},
		submitHandler: function(form) 
	    { 
			<?php $bookingFeilds = $wpdb->get_var
				  (
						$wpdb->prepare
						(
							'SELECT count(BookingFormId) FROM ' . bookingFormTable(),''
						)
				  );
				  ?>
			var countbBokingFields = "<?php echo $bookingFeilds;?>";
			for(var flag=0; flag<countbBokingFields; flag++)
			{
				var bookingRadioVisible;
				var bookingRadiooRequired;
				var radios = document.getElementsByName('bookingStatusSaved'+flag);
				for (var j = 0; j < radios.length; j++) 
				{
					if(radios[j].type == 'radio' && radios[j].checked)
					{
						bookingRadioVisible = radios[j].value;
						break;
					}
				}
				var radioss = document.getElementsByName('bookingRequiredSaved'+flag);
				for (var k = 0; k < radioss.length; k++) 
				{
					if (radioss[k].type == 'radio' && radioss[k].checked)
					{
						bookingRadiooRequired = radioss[k].value;
						break;
					}
				}	
				var fieldname= jQuery("#bookingFeildNameHidden"+flag).val();
				var field_name = encodeURIComponent(fieldname);
				jQuery.ajax
				({
					type: "POST",
					data: "fieldcompare="+field_name+"&bookingRadioVisible="+bookingRadioVisible+"&bookingRadiooRequired="+bookingRadiooRequired+"&target=savedBookingForm&action=getAjaxExecuted",
					url:  ajaxurl,
					success: function(data)
					{
						jQuery('#bookingFieldsSuccessMessage').css('display','block');
						setTimeout(function() 
			            {
		    	        	jQuery('#bookingFieldsSuccessMessage').css('display','none');
		        	    }, 2000);
					}
				});
			}
		}
	});
	function setaction(e) 
	{
		var t = e.id;
		
		var radioid = t.split("_");
		value = e.value;
		
		if(value == 0) 
		{
			jQuery('#bookingRequiredClose' + radioid[1]).attr("checked", "checked");
			jQuery('#bookingRequiredOpen' + radioid[1]).removeAttr("checked");
		} 
		else if(value == 1)
		{
			
			jQuery('#bookingRequiredClose' + radioid[1]).removeAttr("checked");
			jQuery('#bookingRequiredOpen' + radioid[1]).attr("checked", "checked");
		}
	}
	jQuery("#uxFrmbookingFormHeader").validate
	({
		submitHandler: function(form) 
	    {
			if (jQuery("#wp-bookingFormHeaderEditor-wrap").hasClass("tmce-active"))
			{
		    	var bookingFormHeaderEditor  = encodeURIComponent(tinyMCE.get('bookingFormHeaderEditor').getContent());
		    }
		    else
		    {
		    	var bookingFormHeaderEditor  = encodeURIComponent(jQuery('#bookingFormHeaderEditor').val());
		    }	    	 
			jQuery.ajax
			({
				type: "POST",
				data: "bookingFormHeaderEditor="+bookingFormHeaderEditor+"&target=updateBookingFormHeader&action=getAjaxExecuted",
				url:  ajaxurl,
			    success: function(data) 
			    {  
			      	jQuery('#bookingFormHeaderSuccessMessage').css('display','block');
			       	setTimeout(function() 
				    {
					   	jQuery('#bookingFormHeaderSuccessMessage').css('display','none');
					   
				    }, 2000);
			    }
			});
		}
	});
	jQuery("#uxFrmbookingFormFooter").validate
	({
		submitHandler: function(form) 
	    {
			if (jQuery("#wp-bookingFormFooterEditor-wrap").hasClass("tmce-active"))
			{
		    	var bookingFormFooterEditor  = encodeURIComponent(tinyMCE.get('bookingFormFooterEditor').getContent());
		    }
		    else
		    {
		    	var bookingFormFooterEditor  = encodeURIComponent(jQuery('#bookingFormFooterEditor').val());
		    }	 	    	 
			jQuery.ajax
			({
				type: "POST",
				data: "bookingFormFooterEditor="+bookingFormFooterEditor+"&target=updateBookingFormFooter&action=getAjaxExecuted",
				url:  ajaxurl,
			    success: function(data) 
			    {  
			      	jQuery('#bookingFormFooterSuccessMessage').css('display','block');
			       	setTimeout(function() 
				    {
					   	jQuery('#bookingFormFooterSuccessMessage').css('display','none');
					    
				    }, 2000);
			    }
			});
		}
	});
	jQuery("#uxFrmbookingFormThankyou").validate
	({
		submitHandler: function(form) 
	    { 
			if (jQuery("#wp-bookingFormThankyouEditor-wrap").hasClass("tmce-active"))
			{
		    	var bookingFormThankyouEditor  = encodeURIComponent(tinyMCE.get('bookingFormThankyouEditor').getContent());
		    }
		    else
		    {
		    	var bookingFormThankyouEditor  = encodeURIComponent(jQuery('#bookingFormThankyouEditor').val());
		    }	 	    	 
			
			jQuery.ajax
			({
				type: "POST",
				data: "bookingFormThankyouEditor="+bookingFormThankyouEditor+"&target=updateBookingFormThankyou&action=getAjaxExecuted",
				url:  ajaxurl,
			    success: function(data) 
			    {  
			      	jQuery('#bookingFormThankyouSuccessMessage').css('display','block');
			       	setTimeout(function() 
				    {
					   	jQuery('#bookingFormThankyouSuccessMessage').css('display','none');
					   
				    }, 2000);
			    }
			});
		}
	});
</script>
<?php
}
?>								  				