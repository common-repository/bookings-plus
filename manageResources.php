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
            		<h5><i class="font-hand-right"></i><?php _e( "Resources", bookings_plus ); ?></h5>
            	</div>
          	</div>
			<div class="table-overflow">
				<table class="table table-striped" id="data-table">
 					<thead>
    			    	<tr><?php
    			    		$ResourcesEnable = $wpdb->get_var
						   	(
						   		$wpdb->prepare
						   		(
						   			"SELECT GeneralSettingsValue FROM ".generalSettingsTable()." where GeneralSettingsKey  = %s ",
						   			"resources-visible-enable"
						   		)
							);
    			    		?>
     	 					<th style="width:20%"><?php _e( "Resource Name", bookings_plus ); ?></th>
                           	<th style="width:25%"><?php _e( "Resource Email", bookings_plus ); ?></th>
                           	<th style="width:15%"><?php _e( "Resource Phone", bookings_plus ); ?></th>
                           	<?php
                           	if($ResourcesEnable == 1)
                           	{
                           		?>	
                           		<th style="width:15%"><?php _e( "Assigned Services", bookings_plus ); ?></th>
                           		<?php
                           	}
                           	?>
                            <th style="width:10%"></th>
						</tr>
					</thead>
  		 			<tbody>
		      		<?php
			    	$employees = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT * FROM " . employeesTable(),""
						)
					);
					for($flag=0; $flag < count($employees); $flag++)
					{
						$serviceName = $wpdb->get_results
				        (
							$wpdb->prepare
							(
								'select '. servicesTable() . '.ServiceName, '. servicesTable() . '.ServiceColorCode from '. services_AllocationTable() .' join 
								'. servicesTable() . ' on '. services_AllocationTable() . '.ServiceId = 
								'. servicesTable() . '.ServiceId where '. services_AllocationTable() .
								'.EmployeeId  = '.$employees[$flag] -> EmployeeId ,'' 
							)
						);
						
						$allocatedEmployeeName = "<div id=\"tags1_tagsinput\" class=\"tagsinput\" style=\"width: 100%; min-height: auto; height: auto;\">";
						for($flagEmp=0; $flagEmp < count($serviceName); $flagEmp++)
						{
							$allocatedEmployeeName .= "<span style=\"background-color:".$serviceName[$flagEmp]->ServiceColorCode.";color:#fff;border:solid 1px ".$serviceName[$flagEmp]->ServiceColorCode . "\" class=\"tag\"><span>" . $serviceName[$flagEmp]->ServiceName . "</span></span>";
						}
					?>
						<tr>
							<td><?php echo $employees[$flag] -> EmployeeName;?></td>
							<td><?php echo $employees[$flag] -> EmployeeEmail;?></td>
							<td><?php echo $employees[$flag] -> EmployeePhone;?></td>
							<?php
							if($ResourcesEnable == 1)
                           	{
                           		?>	
                           		<td><?php echo $allocatedEmployeeName;?></td>
                           		<?php
                           	}
                           	?>
							
							<td>
								<a class="icon-edit hovertip" data-toggle="modal" data-original-title="<?php _e("Edit Employee?", bookings_plus ); ?>" data-placement="top"  href="#EditExistingEmployee" onclick="editEmployee(<?php echo $employees[$flag]->EmployeeId;?>);"></a>&nbsp;&nbsp;
								<a class="icon-remove hovertip" data-original-title="<?php _e("Delete Employee?", bookings_plus ); ?>" data-placement="top" onclick="deleteEmployee(<?php echo $employees[$flag]-> EmployeeId;?>)"></a>
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
<div id="EditExistingEmployee" class="modal hide fade" role="dialog" aria-hidden="true">
	<div class="modal-header">	
		 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h5><?php _e( "Update Resource", bookings_plus ); ?></h5>
    </div>	
	<form id="uxFrmEditEmployees" class="form-horizontal" method="post" action="#">
		<div class="body">
	    	<div class="note note-success" id="editEmployeeSuccessMessage" style="display:none">
		    	<strong><?php _e( "Success! The Resource has been updated Successfully.", bookings_plus ); ?></strong>
            </div>
          	<div class="block well" style="margin-top:10px;">

                <div class="row-fluid form-horizontal" id="bindEditControls"></div>  
                <input type="hidden" id="EmployeeId" name="EmployeeId" value="" /> 
            </div>
        </div>
        <div class="form-actions" style="padding:0px 10px 10px 10px">
           	<input type="submit" id="btnEditEmployee" value="<?php _e( "Submit & Save Changes", bookings_plus ); ?>" class="btn btn-danger pull-right">
        </div>        
    </form>
</div>
<script type="text/javascript">
var uri = "<?php echo $url; ?>"; 
	jQuery("#Employees").attr("class","active");
	jQuery('#btnDayOff').click(function ()
	{
		var employeeDdId = jQuery('#uxDdlDayOffEmployees').val();
		if(employeeDdId == "opt1")
		{
			jQuery('#errorMessageDayOff').css('display','block');
		}
		else
		{
			jQuery('#errorMessageDayOff').css('display','none');
		}
		var btn = jQuery(this)
		btn.button('loading')
		setTimeout(function ()
		{
			btn.button('reset')
	    }, 1000);
	});
	jQuery('#btnEditEmployee').click(function ()
	{
		var btn = jQuery(this)
		btn.button('loading')
		setTimeout(function ()
		{
			btn.button('reset')
	    }, 1000);
	});
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
				"aaSorting": [[ 2, "asc" ]],
				"aoColumnDefs": [{ "bSortable": false, "aTargets": [0] },{ "bSortable": false, "aTargets": [4] }]
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
				"aaSorting": [[ 2, "asc" ]],
				"aoColumnDefs": [{ "bSortable": false, "aTargets": [0] },{ "bSortable": false, "aTargets": [3] }]
	    	});
		}
    
	 	function deleteEmployee(employeeId) 
	 	{
	 		bootbox.confirm("Are you sure you want to delete this Employee?", function(confirmed) 
			{
				console.log("Confirmed: "+confirmed);
				if(confirmed == true)
				{
					jQuery.ajax
			    	({
			    		type: "POST",
			       	 	data: "employeeId="+employeeId+"&target=deleteEmployees&action=getAjaxExecuted",
			        	url:  ajaxurl,
			        	success: function(data) 
			        	{  
			        	
			        		var CheckExist = jQuery.trim(data);
			        		if(CheckExist == "bookingExist")
			        		{
			        			bootbox.alert('<?php _e("You cannot delete this Employee until all Bookings have been deleted.", bookings_plus ); ?>');
			        		}
			        		else if(CheckExist == "allocatedToService")
			        		{
			        			bootbox.alert('<?php _e("You cannot delete this Employee until all Allocated Services are de-allocated.", bookings_plus ); ?>');
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
 		},	 "This has to be different...");
 
		jQuery("#uxFrmEditEmployees").validate 
		({
			rules: 
			{
				uxEditEmployeeName:
				{
					required:true

				},
				uxEditEmployeeEmail: 
				{
					required: true,
					email:true
				},
				uxEditEmployeePhone: 
				{
					required: true,
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
		     	var uxEmployeeId = jQuery('#EmployeeId').val();	
		     	var uxEditEmployeeColorCode= jQuery('#uxEditEmployeeColorCode').val();
		     	var uxEditEmployeeName = jQuery('#uxEditEmployeeName').val();
			    var uxEditEmployeeEmail = jQuery('#uxEditEmployeeEmail').val();
			    var uxEditEmployeePhone = jQuery('#uxEditEmployeePhone').val();
			    jQuery.ajax
			    ({
					type: "POST",
				    data: "uxEmployeeId="+uxEmployeeId+"&uxEditEmployeeColorCode="+uxEditEmployeeColorCode+"&uxEditEmployeeName="+uxEditEmployeeName
				    +"&uxEditEmployeeEmail="+uxEditEmployeeEmail+"&uxEditEmployeePhone="+uxEditEmployeePhone+"&target=updateExistingEmployee&action=getAjaxExecuted",
				    url:  ajaxurl,
				    success: function(data) 
				    {  	
				    	jQuery('#editEmployeeSuccessMessage').css('display','block');
			            setTimeout(function() 
			            {
			            	jQuery('#editEmployeeSuccessMessage').css('display','none');
			                var checkPage = "<?php echo $_REQUEST['page']; ?>";
						    window.location.href = "admin.php?page="+checkPage;
			            }, 2000);
			        }
		   		});
		   }
		});
		function editEmployee(EmployeeId)
		{
			jQuery.ajax
			({
				type: "POST",
				data: "employeeId="+EmployeeId+"&target=editEmployees&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
			    {  	
			    	jQuery("#bindEditControls").html(data);
		        	var Employee_Id = jQuery('#hiddenEmployeeId').val();
		            jQuery('#EmployeeId').val(Employee_Id);
		        }
		                
		   	});
		}
		function AvailableDates()
		{
			var employeeId = jQuery('#uxDdlDayOffEmployees').val();
		   	jQuery.ajax
			({
				type: "POST",
				data: "employeeId="+employeeId+"&target=availableDates&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
			    {
					
					jQuery("#scriptDynamic").html(data);
		       	}
		                
		   	});		
		}
		
		function callFunction()
		{
			var employeeId = jQuery('#uxDdltimeOff').val();
		   	jQuery.ajax
			({
				type: "POST",
				data: "employeeId="+employeeId+"&target=availableTimeOffDates&action=getAjaxExecuted",
				url:  ajaxurl,
				success: function(data) 
			    {

					jQuery("#dynamicTimeOffScript").html(data);
		       	}
		                
		   	});		
		}		
</script>
<?php
}
?>