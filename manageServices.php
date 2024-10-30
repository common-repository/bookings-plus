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
              				<h5><i class="font-hand-right"></i><?php _e( "Services", bookings_plus ); ?></h5>
            			</div>
          			</div>
					<div class="table-overflow">
						<table class="table table-striped" id="data-table">
 							<thead>
     							<tr>
     								<?php
     								$ResourcesEnable = $wpdb->get_var
						   		  		(
						   		  			$wpdb->prepare
						   		  			(
						   		  				"SELECT GeneralSettingsValue FROM ".generalSettingsTable()." where GeneralSettingsKey  = %s ",
						   		  				"resources-visible-enable"
						   		  			)
										);
     								?>
     								<th style="display:none;"><?php _e( "Service Display Order", bookings_plus ); ?></th>
     								<th style="width:9%"><?php _e( "Color Code", bookings_plus ); ?></th>
        							<th style="width:17%"><?php _e( "Service Name", bookings_plus ); ?></th>
        							<?php
        							if($ResourcesEnable == 1)
									{
										?>
										<th style="width:22%"><?php _e( "Assigned Resources", bookings_plus ); ?></th>
										<?php
									}
        							?>
        							<th style="width:12%"><?php _e( "Service Time", bookings_plus ); ?></th>
         							<th style="width:8%"><?php _e( "Cost", bookings_plus ); ?></th>
								    <th style="width:15%"><?php _e( "Type", bookings_plus ); ?></th>
		 							<th style="width:8%"></th>
								</tr>
							</thead>
  		 					<tbody>
		      					<?php
			       					$service = $wpdb->get_results
			       					(
										$wpdb->prepare
										(
											 'SELECT '.servicesTable().'.ServiceId, '.servicesTable().'.ServiceName, ' . servicesTable() . '.ServiceDisplayOrder,
											 '.servicesTable().'.ServiceCost,'.servicesTable().'.ServiceMaxBookings, '.servicesTable().'.Type,
											 '.servicesTable().'.ServiceTotalTime,'.servicesTable().'.ServiceColorCode FROM '.servicesTable().'  ORDER BY ' . servicesTable() . '.ServiceDisplayOrder ASC',''
										)
									);
									$costIcon = $wpdb->get_var("SELECT CurrencySymbol FROM ".currenciesTable()." where CurrencyUsed = 1");
									for($flag=0; $flag < count($service); $flag++)
									{
										$employeeName = $wpdb->get_results
				        				(
											$wpdb->prepare
											(
												'select '. employeesTable() . '.EmployeeName from '. services_AllocationTable() .' join 
												'. employeesTable() . ' on '. services_AllocationTable() . '.EmployeeId = 
												'. employeesTable() . '.EmployeeId where '. services_AllocationTable() .
							   					'.ServiceId = '.$service[$flag] -> ServiceId ,'' 
											)
										);
										$serviceColor = $service[$flag]->ServiceColorCode;
										$allocatedEmployeeName = "<div id=\"tags1_tagsinput\" class=\"tagsinput\" style=\"width: 100%; min-height: auto; height: auto;\">";
										
										for($flagEmp=0; $flagEmp < count($employeeName); $flagEmp++)
										{
											$allocatedEmployeeName .= "<span style=\"background-color:".$serviceColor.";color:#fff;border:solid 1px ".$serviceColor. "\" class=\"tag\"><span>" . $employeeName[$flagEmp]->EmployeeName . "</span></span>";
										}
										
										$hrs = floor(($service[$flag] -> ServiceTotalTime) / 60);
										$mins = ($service[$flag] -> ServiceTotalTime) % 60;
										$allocatedEmployeeName.= "</div>";
										?>
										

						
										<tr id="recordsArray_<?php echo $service[$flag] -> ServiceId ; ?>">
											<?php
											$serviceColorCode = "<label style=\"width:40px;height:15px;cursor:default;background-color:$serviceColor;color:$serviceColor\">";
											?>
											<td style="display: none;"><?php echo $service[$flag] -> ServiceDisplayOrder;?></td>
											<td><?php echo $serviceColorCode;?></td>
											<td><?php echo $service[$flag] -> ServiceName;?></td>
											<?php
		        							if($ResourcesEnable == 1)
											{
												?>
												<td><?php echo $allocatedEmployeeName; ?></td>
												<?php
											}
		        							?>
											
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
													_e( " Hrs ", bookings_plus );
													echo $mins;
													_e( " Mins", bookings_plus );
												}
											?>
											</td>
											<td><?php echo ($costIcon).$service[$flag] -> ServiceCost;?></td>
											<td><?php 
											if($service[$flag]->Type == 0)
											{
												echo "Single Booking";
											}
											else 
											{
												echo "Group Bookings (".$service[$flag] -> ServiceMaxBookings .")";
											}
											?></td>
											<td><a class="icon-edit  hovertip" data-toggle="modal" data-original-title="<?php _e("Edit Service?", bookings_plus ); ?>" data-placement="top" href="#editNewService" onclick="editServices(<?php echo $service[$flag]->ServiceId;?>);"></a>&nbsp;&nbsp;<a class="icon-remove hovertip" data-original-title="<?php _e("Delete Service?", bookings_plus ); ?>" data-placement="top"  href="#" onclick="deleteServices(<?php echo $service[$flag]->ServiceId;?>)"></a</td>
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
<div id="editNewService" class="modal hide fade" role="dialog" aria-hidden="true">
	<div class="modal-header">	
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	    <h5><?php _e( "Update Existing Service", bookings_plus ); ?></h5>	    	
    </div>	
	<form id="uxFrmEditServices" class="form-horizontal" method="post" action="#">
		<div class="body">
			<div class="note note-success" id="editSuccessMessage" style="display:none">
				<strong><?php _e( "Success! The Service has been updated Successfully.", bookings_plus ); ?></strong>
	        </div>
	        <div class="note note-error" id="errorMessageEditServices" style="display:none">
				<strong><?php _e( "Error! Max Bookings should be greater than 1", bookings_plus ); ?></strong>
            </div>
	        <div class="block well" style="margin-top:10px;">
	            <div class="row-fluid form-horizontal" id="bindEditControls"></div>                            
	            <input type="hidden" id="serviceId" name="serviceId" value="" />
	        </div>
	        <div class="form-actions" style="padding:10px 0px;">
	        	<input data-loading-text="<?php _e( "Processing Data...", bookings_plus ); ?>" id="btnEditServices" type="submit" value="<?php _e( "Save & Submit Changes", bookings_plus ); ?>"   class="btn btn-danger pull-right">
	        </div>
		</div>
	</form>
</div>
<script type="text/javascript">
	jQuery("#Services").attr("class","active");
	var uri = "<?php echo $url; ?>"; 
	<?php
     $ResourcesEnable = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SELECT GeneralSettingsValue FROM ".generalSettingsTable()." where GeneralSettingsKey  = %s ",
			"resources-visible-enable"
		)
	);
     ?>
	var ResourceVisibility = "<?php echo $ResourcesEnable;?>";
	if(ResourceVisibility == 1)  
	{   
		oTable = jQuery('#data-table').dataTable
		({
			"bJQueryUI": false,
			"bAutoWidth": true,
			"sPaginationType": "full_numbers",
			"sDom": '<"datatable-header"fl>t<"datatable-footer"ip>',
			"oLanguage": 
			{
				"sLengthMenu": "<span>Show entries:</span> _MENU_"
			},
			"aaSorting": [[ 0, "asc" ]],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [7] }]
	    });
	 }
	 else
	 {
	 	oTable = jQuery('#data-table').dataTable
		({
			"bJQueryUI": false,
			"bAutoWidth": true,
			"sPaginationType": "full_numbers",
			"sDom": '<"datatable-header"fl>t<"datatable-footer"ip>',
			"oLanguage": 
			{
				"sLengthMenu": "<span>Show entries:</span> _MENU_"
			},
			"aaSorting": [[ 0, "asc" ]],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [6] }]
	    });
	 }
	jQuery('#btnEditServices').click(function ()
	{
		var btn = jQuery(this)
		btn.button('loading')
		setTimeout(function ()
		{
			btn.button('reset')
	    }, 1000);
	});
   
   
	function deleteServices(serviceId) 
	{
		bootbox.confirm("Are you sure you want to delete this Service?", function(confirmed) 
		{
			console.log("Confirmed: "+confirmed);
			if(confirmed == true)
			{
				jQuery.ajax
			    ({
			    	type: "POST",
			    	data: "uxServiceId="+serviceId+"&target=deleteService&action=getAjaxExecuted",
			    	url:  ajaxurl,
			    	success: function(data) 
			        {  
			        	var checkAllocated = jQuery.trim(data);
			        	if(checkAllocated == "allocated")
			        	{
			        			bootbox.alert('<?php _e("This Service cannot be deleted until de-allocated from the Employees.", bookings_plus ); ?>');
			        	}
			        	else
			        	{
			        		var checkPage = "<?php echo $_REQUEST['page']; ?>";
						    window.location.href = "admin.php?page="+checkPage;
			        	}
			        	
			        }
			    });
		    }
		});
	}    	
	jQuery.validator.addMethod("notEqualTo", function(value, element, param) 
	{
 		return this.optional(element) || value != param;
 	}, 
 	"This has to be different...");
 
	jQuery("#uxFrmEditServices").validate
	({
		rules: 
		{
			uxEditServiceName: "required",
			uxEditServiceCost: 
			{
				required: true,
				number: true
			},
			uxEditMaxBookings: 
			{
				required: true,
				digits: true
			},
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
	    	var serviceId = jQuery('#serviceId').val();	
	    	var uxServiceNameEdit= jQuery('#uxEditServiceName').val();
	    	var uxEditServiceColorCode= jQuery('#uxEditServiceColorCode').val();
	    	var uxEditServiceName  = encodeURIComponent(uxServiceNameEdit);
			var uxEditServiceCost = jQuery('#uxEditServiceCost').val();
			var uxEditMaxBookings = jQuery('#uxEditMaxBookings').val();
			var uxEditServiceType = jQuery('input:radio[name=uxEditServiceType]:checked').val();
			if(uxEditServiceType == 1 && uxEditMaxBookings > 1)
			{
		     	jQuery.ajax
			    ({
					type: "POST",
					data: "serviceId="+serviceId+"&uxEditServiceName="+uxEditServiceName+"&uxEditServiceCost="+uxEditServiceCost+"&uxEditServiceColorCode="+uxEditServiceColorCode+
					"&uxEditMaxBookings="+uxEditMaxBookings+"&uxEditServiceType="+uxEditServiceType+"&target=updateServiceTable&action=getAjaxExecuted",
					url:  ajaxurl,
					success: function(data) 
				    {  	
				    	jQuery('#errorMessageEditServices').css('display','none');
				    	jQuery('#editSuccessMessage').css('display','block');
			        	setTimeout(function() 
			            {
			            	jQuery('#editSuccessMessage').css('display','none');
			            	var checkPage = "<?php echo $_REQUEST['page']; ?>";
							window.location.href = "admin.php?page="+checkPage;
			            }, 2000);
			        }
		   		});
		   	}
		    else if(uxEditServiceType == 0)
			{
		   		jQuery.ajax
			    ({
					type: "POST",
					data: "serviceId="+serviceId+"&uxEditServiceName="+uxEditServiceName+"&uxEditServiceCost="+uxEditServiceCost+"&uxEditServiceColorCode="+uxEditServiceColorCode+
					"&uxEditMaxBookings="+uxEditMaxBookings+"&uxEditServiceType="+uxEditServiceType+"&target=updateServiceTable&action=getAjaxExecuted",
					url:  ajaxurl,
					success: function(data) 
				    {  	
				    	jQuery('#errorMessageEditServices').css('display','none');
				    	jQuery('#editSuccessMessage').css('display','block');
			        	setTimeout(function() 
			            {
			            	jQuery('#editSuccessMessage').css('display','none');
			            	var checkPage = "<?php echo $_REQUEST['page']; ?>";
							window.location.href = "admin.php?page="+checkPage;
			            }, 2000);
			        }
		   		});
		   	}
		   	else
			{
				jQuery('#errorMessageEditServices').css('display','block');
			}  
	    }
	});

	function editServices(serviceId)
	{
		jQuery.ajax
		({
			type: "POST",
			data: "serviceId="+serviceId+"&target=editService&action=getAjaxExecuted",
			url:  ajaxurl,
		 	success: function(data) 
		    {  	
	        	jQuery("#bindEditControls").html(data);
	        	
	        	var service_id 	= jQuery('#hiddenServiceId').val();
	        	jQuery('#serviceId').val(service_id);
	        	var uxEditServiceType = jQuery('input:radio[name=uxEditServiceType]:checked').val();
	        	if(uxEditServiceType == 1)
	        	{
	        		jQuery('#editMaxBooking').css('display','block');
	        	}
	        }
	    });
	}
	jQuery(document).ready(function()
	{ 
		jQuery(function() 
		{
        	jQuery("#data-table tbody").sortable({ opacity: 0.6, cursor: 'move', update: function()
        	{
	        	var order = jQuery(this).sortable("serialize")+'&target=updateRecordsListings&action=getAjaxExecuted';
	        	jQuery.ajax
				({
					type: "POST",
					data: order,
					url:  ajaxurl,
					success: function(data) 
					{
					
					}
				});
           	}								  
		});
		});
	});
function singleBookingType()
{
	jQuery('#editMaxBooking').css('display','none');
}
function groupBookingType()
{
	jQuery('#editMaxBooking').css('display','block');
}
</script>
<style type="text/css">
	#data-table tbody:hover
	{
		cursor:move;
		
	}
</style>
<?php
}
?>