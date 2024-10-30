<?php
if (!current_user_can('edit_posts') && ! current_user_can('edit_pages') )
{
 return;
}
else 
{
	if(isset($_REQUEST['target']) && isset($_REQUEST['action']))
	{
		if($_REQUEST['target'] == "UpdateFacebookSocialMedia")
		{
				$uxFacebookAppId = esc_attr($_REQUEST['uxFacebookAppId']);
				$uxFacebookSecretKey = esc_attr($_REQUEST['uxFacebookSecretKey']);
				$uxFacebookConnectRadio = esc_attr($_REQUEST['uxFacebookConnectRadio']);
				$wpdb->query
			    (
			          $wpdb->prepare
			          (
			                    "UPDATE ".social_Media_settingsTable()." SET SocialMediaValue = %s WHERE SocialMediaKey = %s",
			                    $uxFacebookAppId,
			                    "facebook-api-id"
			          )
			    );
				$wpdb->query
			    (
			          $wpdb->prepare
			          (
			                    "UPDATE ".social_Media_settingsTable()." SET SocialMediaValue = %s WHERE SocialMediaKey = %s",
			                    $uxFacebookSecretKey,
			                    "facebook-secret-key"
			          )
			    );
			    $wpdb->query
			    (
			          $wpdb->prepare
			          (
			                    "UPDATE ".social_Media_settingsTable()." SET SocialMediaValue = %s WHERE SocialMediaKey = %s",
			                    $uxFacebookConnectRadio,
			                    "facebook-connect-enable"
			          )
			    );
			
				die();
		}
		else if($_REQUEST['target'] == "UpdateAutoResponder")
		{
				
				$uxuxMailChimpRadio = esc_attr($_REQUEST['uxuxMailChimpRadio']);
				$uxMailChimpApiKey = esc_attr($_REQUEST['uxMailChimpApiKey']);
				$uxMailChimpUniqueId = esc_attr($_REQUEST['uxMailChimpUniqueId']);
				$uxDoubleOptIn = esc_attr($_REQUEST['uxDoubleOptIn']);
				$uxWelcomeEmail = esc_attr($_REQUEST['uxWelcomeEmail']);
				$wpdb->query
				(
						$wpdb->prepare
						(
								"UPDATE ".auto_Responders_settingsTable()." SET AutoResponderValue = %s WHERE AutoResponderKey = %s",
								$uxuxMailChimpRadio,
								"mail-chimp-enabled"
						)
				);
				$wpdb->query
				(
						$wpdb->prepare
						(
								"UPDATE ".auto_Responders_settingsTable()." SET AutoResponderValue = %s WHERE AutoResponderKey = %s",
								$uxMailChimpApiKey,
								"mail-chimp-api-key"
						)
				);
				$wpdb->query
				(
						$wpdb->prepare
						(
								"UPDATE ".auto_Responders_settingsTable()." SET AutoResponderValue = %s WHERE AutoResponderKey = %s",
								$uxMailChimpUniqueId,
								"mail-chimp-unique-id"
						)
				);
				$wpdb->query
				(
						$wpdb->prepare
						(
								"UPDATE ".auto_Responders_settingsTable()." SET AutoResponderValue = %s WHERE AutoResponderKey = %s",
								$uxDoubleOptIn,
								"mail-double-optin-id"
						)
				);
				$wpdb->query
				(
						$wpdb->prepare
						(
								"UPDATE ".auto_Responders_settingsTable()." SET AutoResponderValue = %s WHERE AutoResponderKey = %s",
								$uxWelcomeEmail,
								"mail-welcome-email"
						)
				);
				die();
		}
		else if($_REQUEST['target'] == "cancelBooking")
		{
				$bookingId = intval($_REQUEST['bookingId']);
				$wpdb->query
			    (
				     $wpdb->prepare
				     (
				     	"UPDATE ".bookingTable()." SET BookingStatus  = %s WHERE BookingId = %d",
				        "Cancelled",
				        $bookingId
				     )
			    );
				die();
		}
		else if($_REQUEST['target'] == "deleteBooking")
		{
				$bookingId = intval($_REQUEST['bookingId']);
				$wpdb->query
			    (
				    $wpdb->prepare
				    (
				        "DELETE FROM ".bookingTable()." WHERE BookingId = %d",
						$bookingId
				    )
			    );
				die();
		}
		else if($_REQUEST['target'] == 'resendBookingEmail')
		{
				include_once 'mailmanagement.php';
				$bookingId = intval($_REQUEST['bookingId']);
				$uxBookingStaus = esc_attr($_REQUEST['status']);
				if($uxBookingStaus == "Pending Approval")
				{
					MailManagement($bookingId,"approval_pending");	
					MailManagement($bookingId,"admin");			
				}
				else if($uxBookingStaus == "Approved")
				{
					MailManagement($bookingId,"approved");			
				}
				else if($uxBookingStaus == "Disapproved")
				{
					MailManagement($bookingId,"disapproved");		
				}
				die();
		}
		else if($_REQUEST['target'] == "addService")
		{
				$uxServiceNameEncode = html_entity_decode($_REQUEST['uxServiceNameEncode']);
				$uxServiceCost = doubleval($_REQUEST['uxServiceCost']);
				$uxServiceHours = intval($_REQUEST['uxServiceHours']);
				$uxServiceMins = intval($_REQUEST['uxServiceMins']);
				$uxServicesTotalTime = $uxServiceHours  * 60 + $uxServiceMins;
				$uxMaxBookings = intval($_REQUEST['uxMaxBookings']);
				$uxServiceType = intval($_REQUEST['uxServiceType']);
				$uxServiceColor = esc_attr($_REQUEST['uxServiceColor']);
				$wpdb->query
			    (
			          	$wpdb->prepare
			            (
			                   "INSERT INTO ".servicesTable()."(ServiceName,ServiceCost,ServiceTotalTime,ServiceMaxBookings,Type,ServiceColorCode ) 
			                   VALUES( %s, %f, %d, %d, %d, %s)",
			                   $uxServiceNameEncode,
			                   $uxServiceCost,
			                   $uxServicesTotalTime,
			                   $uxMaxBookings,
			                   $uxServiceType,
			                   $uxServiceColor
			            )
			     );
				 $lastid = $wpdb->insert_id;
				 $wpdb->query
		     	 (
			            $wpdb->prepare
			            (
			                    "UPDATE ".servicesTable()." SET ServiceDisplayOrder = %d WHERE ServiceId = %d",
			                    $lastid,
			                    $lastid
			            )
		      	 );
				 die();
		}
		else if($_REQUEST['target'] == "getServiceCount")
		{
				$count = $wpdb->get_var
				(
					$wpdb->prepare
					(
						'SELECT count(ServiceId) FROM ' . servicesTable(),''
					)
				);
				echo $count;
				die();
		}	
		else if($_REQUEST['target'] == "getFacebookStatus")
		{
				$FBStatus = $wpdb->get_var
				(
					$wpdb->prepare
					(
						'SELECT SocialMediaValue FROM ' . social_Media_settingsTable() . ' where SocialMediaKey = %s',
						"facebook-connect-enable"
					)
				);
				if($FBStatus == 0)
				{
					echo "Off";
				}
				else 
				{
					echo "On";	
				}
				die();
		}
		else if($_REQUEST['target'] == "getMailChimpStatus")
		{
				$MCStatus = $wpdb->get_var
				(
					$wpdb->prepare
					(
						'SELECT AutoResponderValue FROM ' . auto_Responders_settingsTable() . ' where AutoResponderKey = %s',
						"mail-chimp-enabled"
					)
				);
				if($MCStatus == 0)
				{
					echo "Off";
				}
				else 
				{
					echo "On";	
				}
				die();
		}
		else if($_REQUEST['target'] == "getEmployeeCount")
		{
				$count = $wpdb->get_var
				(
					$wpdb->prepare
					(
						'SELECT count(EmployeeId) FROM ' . employeesTable(),''
					)
				);
				echo $count;
				die();
		}
		else if($_REQUEST['target'] == "getCustomerCount")
	    {
			 $count = $wpdb->get_var
			 (
				$wpdb->prepare
				(			 
			 		'SELECT count(CustomerId) FROM ' . customersTable() ,''
				)
			);
			echo $count;
			die();
	    }
		else if($_REQUEST['target'] == "getBookingCount")
		{
				$count = $wpdb->get_var
				(
					$wpdb->prepare
					(
						'SELECT count(BookingId) FROM ' . bookingTable(),''
					)
				);
				echo $count;
				die();
		}
		else if($_REQUEST['target'] == "getResourcesVisibilityStatus")
		{
				$RVStatus = $wpdb->get_var
				(
					$wpdb->prepare
					(
						'SELECT GeneralSettingsValue FROM ' . generalSettingsTable() . ' where   GeneralSettingsKey = %s',
						"resources-visible-enable"
					)
				);
				if($RVStatus == 0)
				{
					echo "Off";
				}
				else 
				{
					echo "On";	
				}
				die();
		}
		else if($_REQUEST['target'] == "getMultipleLocationsStatus")
		{
				$MLStatus = $wpdb->get_var
				(
					$wpdb->prepare
					(
						'SELECT GeneralSettingsValue FROM ' . generalSettingsTable() . ' where   GeneralSettingsKey = %s',
						"multiple-locations-enable"
					)
				);
				if($MLStatus == 0)
				{
					echo "Off";
				}
				else 
				{
					echo "On";	
				}
				die();
		}
		else if($_REQUEST['target'] == "ResourcesVisibile")
		{
			$uxResourceVisibility = esc_attr($_REQUEST['uxResourceVisibility']);
			$wpdb->query
		    (
			     $wpdb->prepare
			     (
			           "UPDATE ".generalSettingsTable()." SET GeneralSettingsValue = %s WHERE GeneralSettingsKey = %s",
			           $uxResourceVisibility,
			           "resources-visible-enable"
			     )
		    );
			die();
		}
		else if($_REQUEST['target'] == "ResourcesVisibileShow")
		{
			$uxResourceVisibility = esc_attr($_REQUEST['uxResourceVisibility']);
			$ResourcesVisibility = $wpdb->get_var
		    (
			     $wpdb->prepare
			     (
			           'SELECT GeneralSettingsValue FROM ' . generalSettingsTable() . ' where   GeneralSettingsKey = %s',
						"resources-visible-enable"
			     )
		    );
			if($ResourcesVisibility == 1)
			{
				echo "yes";
			}
			else 
			{
				echo "no";
			}
			die();
		}
		else if($_REQUEST['target'] == "ReminderSettingsShow")
		{
			$uxReminderSettings = esc_attr($_REQUEST['uxReminderSettings']);
			$ReminderSettings = $wpdb->get_var
		    (
			     $wpdb->prepare
			     (
			           'SELECT GeneralSettingsValue FROM ' . generalSettingsTable() . ' where   GeneralSettingsKey = %s',
						"reminder-settings"
			     )
		    );
			$ReminderSettingsInterval = $wpdb->get_var
		    (
			     $wpdb->prepare
			     (
			           'SELECT GeneralSettingsValue FROM ' . generalSettingsTable() . ' where   GeneralSettingsKey = %s',
						"reminder-settings-interval"
			     )
		    );
			if($ReminderSettings == 1)
			{
				echo "On";
			}
			else 
			{
				echo "Off";
			}
			die();
		}
		else if($_REQUEST['target'] == "UpdatePaymentGateway")
		{
			$PaypalEnableCheck = intval($_REQUEST['PaypalEnableCheck']);
			$PaypalUrlCheck = esc_attr($_REQUEST['PaypalUrlCheck']);
			$uxMerchantEmailAddress = esc_attr($_REQUEST['uxMerchantEmailAddress']);
			$uxThankyouPageUrl = esc_attr($_REQUEST['uxThankyouPageUrl']);
			$uxIPNUrl = esc_attr($_REQUEST['uxIPNUrl']);
			$uxPaymentImageUrl = esc_attr($_REQUEST['uxPaymentImageUrl']);
			$uxPaymentCancellationMessage = esc_attr($_REQUEST['uxPaymentCancellationMessage']);
			$wpdb->query
		    (
		          $wpdb->prepare
		          (
		                    "UPDATE ".payment_Gateway_settingsTable()." SET PaymentGatewayValue = %s WHERE PaymentGatewayKey = %s",
		                    $PaypalEnableCheck,
		                    "paypal-enabled"
		          )
		    );
			$wpdb->query
		    (
		          $wpdb->prepare
		          (
		                    "UPDATE ".payment_Gateway_settingsTable()." SET PaymentGatewayValue = %s WHERE PaymentGatewayKey = %s",
		                    $uxMerchantEmailAddress,
		                    "paypal-merchant-email-address"
		          )
		    );
		    $wpdb->query
		    (
		          $wpdb->prepare
		          (
		                    "UPDATE ".payment_Gateway_settingsTable()." SET PaymentGatewayValue = %s WHERE PaymentGatewayKey = %s",
		                    $uxThankyouPageUrl,
		                    "paypal-thankyou-page-url"
		          )
		    );
			 $wpdb->query
		    (
		          $wpdb->prepare
		          (
		                    "UPDATE ".payment_Gateway_settingsTable()." SET PaymentGatewayValue = %s WHERE PaymentGatewayKey = %s",
		                    $uxIPNUrl,
		                    "paypal-ipn-url"
		          )
		    );
			 $wpdb->query
		    (
		          $wpdb->prepare
		          (
		                    "UPDATE ".payment_Gateway_settingsTable()." SET PaymentGatewayValue = %s WHERE PaymentGatewayKey = %s",
		                    $uxPaymentImageUrl,
		                    "paypal-payment-image-url"
		          )
		    );
			$wpdb->query
		    (
		          $wpdb->prepare
		          (
		                    "UPDATE ".payment_Gateway_settingsTable()." SET PaymentGatewayValue = %s WHERE PaymentGatewayKey = %s",
		                    $uxPaymentCancellationMessage,
		                    "paypal-payment-cancellation-Url"
		          )
		    );
			$wpdb->query
		    (
		          $wpdb->prepare
		          (
		                    "UPDATE ".payment_Gateway_settingsTable()." SET PaymentGatewayValue = %s WHERE PaymentGatewayKey = %s",
		                    $PaypalUrlCheck,
		                    "paypal-Test-Url"
		          )
		    );
			die();
				                 
		}
		else if($_REQUEST['target'] == "getPaypalStatus")
		{
				$PPStatus = $wpdb->get_var
				(
					$wpdb->prepare
					(
						'SELECT PaymentGatewayValue FROM ' . payment_Gateway_settingsTable() . ' where   PaymentGatewayKey = %s',
						"paypal-enabled"
					)
				);
				if($PPStatus == 0)
				{
					echo "Off";
				}
				else 
				{
					echo "On";	
				}
				die();
		}
		else if($_REQUEST['target'] == 'addEmployee')
		{
				$uxEmployeeNameEncode = html_entity_decode($_REQUEST['uxEmployeeNameEncode']);
				$uxEmployeeEmail = esc_attr($_REQUEST['uxEmployeeEmail']);
				$uxEmployeePhone = esc_attr($_REQUEST['uxEmployeePhone']);
				
				
				$wpdb->query
			    (
			              $wpdb->prepare
			              (
			                       "INSERT INTO ".employeesTable()."(EmployeeName,EmployeeEmail,EmployeePhone,Date) VALUES( %s, %s, %s, CURDATE())",
			                       $uxEmployeeNameEncode,
			                       $uxEmployeeEmail,
			                       $uxEmployeePhone
			               )
			    );
			    $lastid = $wpdb->insert_id;
			    $wpdb->query
			    (
			              $wpdb->prepare
			              (
			                       "INSERT INTO ".employees_TimingsTable()."(EmployeeId,Day,StartTime,EndTime,Status) VALUES( %d, %s, %d, %d, %d)",
			                       $lastid,
			                       "Mon",
			                       "540",
			                       "1020",
			                       "1"
			               )
			    );
				$wpdb->query
			    (
			              $wpdb->prepare
			              (
			                       "INSERT INTO ".employees_TimingsTable()."(EmployeeId,Day,StartTime,EndTime,Status) VALUES( %d, %s, %d, %d, %d)",
			                       $lastid,
			                       "Tue",
			                       "540",
			                       "1020",
			                       "1"
			               )
			    );
				$wpdb->query
			    (
			              $wpdb->prepare
			              (
			                       "INSERT INTO ".employees_TimingsTable()."(EmployeeId,Day,StartTime,EndTime,Status) VALUES( %d, %s, %d, %d, %d)",
			                       $lastid,
			                       "Wed",
			                       "540",
			                       "1020",
			                       "1"
			               )
			    );
			    $wpdb->query
			    (
			              $wpdb->prepare
			              (
			                       "INSERT INTO ".employees_TimingsTable()."(EmployeeId,Day,StartTime,EndTime,Status) VALUES( %d, %s, %d, %d, %d)",
			                       $lastid,
			                       "Thu",
			                       "540",
			                       "1020",
			                       "1"
			               )
			    );
			    $wpdb->query
			    (
			              $wpdb->prepare
			              (
			                       "INSERT INTO ".employees_TimingsTable()."(EmployeeId,Day,StartTime,EndTime,Status) VALUES( %d, %s, %d, %d, %d)",
			                       $lastid,
			                       "Fri",
			                       "540",
			                       "1020",
			                       "1"
			               )
			    );
			    $wpdb->query
			    (
			              $wpdb->prepare
			              (
			                       "INSERT INTO ".employees_TimingsTable()."(EmployeeId,Day,StartTime,EndTime,Status) VALUES( %d, %s, %d, %d, %d)",
			                       $lastid,
			                       "Sat",
			                       "540",
			                       "1020",
			                       "0"
			               )
			    );
			    $wpdb->query
			    (
			              $wpdb->prepare
			              (
			                       "INSERT INTO ".employees_TimingsTable()."(EmployeeId,Day,StartTime,EndTime,Status) VALUES( %d, %s, %d, %d, %d)",
			                       $lastid,
			                       "Sun",
			                       "540",
			                       "1020",
			                       "0"
			               )
			    );
			    die();
			}
			else if($_REQUEST['target'] == 'checkExistingEmailAction')
			{
					$uxEmployeeEmail = esc_attr($_REQUEST['uxEmployeeEmail']);
					$employeeEmail = $wpdb->get_var('SELECT count(EmployeeId) FROM ' . employeesTable(). ' where EmployeeEmail = ' . "'".$uxEmployeeEmail."'");
					if($employeeEmail != 0)
					{
						echo $returnEmployeeEmailCountCheck = "existingEmployeeEmail";
					}
					else 
					{
						echo $returnEmployeeEmailCountCheck = "newEmployeeEmail";		
					}
					die();
			}
			else if($_REQUEST['target'] == 'deleteAllocationEntries')
			{
					$employeeId = intval($_REQUEST['employeeId']);
					$wpdb->query
					(
					  		$wpdb->prepare
					    	(
					    		"DELETE FROM ".services_AllocationTable()." WHERE EmployeeId = %d ",
					       		 $employeeId
					   		)
					);
					die();
			}
			else if($_REQUEST['target'] == 'allocationEntries')
			{
					$employeeId = intval($_REQUEST['employeeId']);
					$serviceId  = intval($_REQUEST['serviceId']);
					$wpdb->query
					(
						    $wpdb->prepare
						    (
						           "INSERT INTO ".services_AllocationTable()."(EmployeeId,ServiceId) VALUES(%d, %d)",
						           $employeeId,
						           $serviceId
						    )
					);
					die();
			}
			else if($_REQUEST['target'] == 'employeeDdIdOnchange')
			{
					$employeeDdId = intval($_REQUEST['employeeDdId']);
					$returnDataArrayList =$wpdb->get_results
					(
							$wpdb->prepare
							(
								  'SELECT ServiceId from ' . services_AllocationTable() .' where EmployeeId = %d',
								  $employeeDdId
							)
					);
					$scriptDynamic = '<script>var oTable = jQuery("#data-table1").dataTable();';
					for($flagAllocate = 0; $flagAllocate < count($returnDataArrayList); $flagAllocate++)
					{
						$scriptDynamic.= 'jQuery("#chkAllocation' . $returnDataArrayList[$flagAllocate] -> ServiceId .'", oTable.fnGetNodes()).each(function(){jQuery(this).attr("checked", "checked");});';
						
					}
					$scriptDynamic .= '</script>';
					echo $scriptDynamic;
					die();
			}
			else if($_REQUEST['target'] == "employeesStartWorkingHours")
			{
				$timeFormats = $wpdb->get_var
				(
					$wpdb->prepare
					(
						"SELECT GeneralSettingsValue FROM ".generalSettingsTable()." WHERE GeneralSettingsKey = %s ",
						'default_Time_Format'
					)
				);
				if($timeFormats == 0)
				{
				?>
					<option value="00">00:00 am</option>
					<option value="30">12:30 am</option>
					<option value="60">1:00 am</option>
					<option value="90">1:30 am</option>
					<option value="120">2:00 am</option>
					<option value="150">2:30 am</option>
					<option value="180">3:00 am</option>
					<option value="210">3:30 am</option>
					<option value="240">4:00 am</option>
					<option value="270">4:30 am</option>
					<option value="300">5:00 am</option>
					<option value="330">5:30 am</option>
					<option value="360">6:00 am</option>
					<option value="390">6:30 am</option>
					<option value="420">7:00 am</option>
					<option value="450">7:30 am</option>
					<option value="480" >8:00 am </option>
					<option value="510">8:30 am</option>
					<option value="540">9:00 am</option>
					<option value="570">9:30 am</option>
					<option value="600">10:00 am</option>
					<option value="630">10:30 am</option>
					<option value="660">11:00 am</option>
					<option value="690">11:30 am</option>
					<option value="720">12:00 pm</option>
					<option value="750">12:30 pm</option>
					<option value="780">1:00 pm</option>
					<option value="810">1:30 pm</option>
					<option value="840">2:00 pm</option>
					<option value="870">2:30 pm</option>
					<option value="900">3:00 pm</option>
					<option value="930">3:30 pm</option>
					<option value="960">4:00 pm</option>
					<option value="990">4:30 pm</option>
					<option value="1020">5:00 pm</option>
					<option value="1050">5:30 pm</option>
					<option value="1080">6:00 pm</option>
					<option value="1110">6:30 pm</option>
					<option value="1140">7:00 pm</option>
					<option value="1170">7:30 pm</option>
					<option value="1200">8:00 pm</option>
					<option value="1230">8:30 pm</option>
					<option value="1260">9:00 pm</option>
					<option value="1290">9:30 pm</option>
					<option value="1320">10:00 pm</option>
					<option value="1350">10:30 pm</option>
					<option value="1380">11:00 pm</option>
					<option value="1410">11:30 pm</option>
			<?php
				die();
				}
				else
				{
					?>
					<option value="00">00:00</option>
					<option value="30">00:30</option>
					<option value="60">1:00</option>
					<option value="90">1:30</option>
					<option value="120">2:00</option>
					<option value="150">2:30</option>
					<option value="180">3:00</option>
					<option value="210">3:30</option>
					<option value="240">4:00</option>
					<option value="270">4:30</option>
					<option value="300">5:00</option>
					<option value="330">5:30</option>
					<option value="360">6:00</option>
					<option value="390">6:30</option>
					<option value="420">7:00</option>
					<option value="450">7:30</option>
					<option value="480">8:00 </option>
					<option value="510">8:30</option>
					<option value="540">9:00</option>
					<option value="570">9:30</option>
					<option value="600">10:00</option>
					<option value="630">10:30</option>
					<option value="660">11:00</option>
					<option value="690">11:30</option>
					<option value="720">12:00</option>
					<option value="750">12:30</option>
					<option value="780">13:00</option>
					<option value="810">13:30</option>
					<option value="840">14:00</option>
					<option value="870">14:30</option>
					<option value="900">15:00</option>
					<option value="930">15:30</option>
					<option value="960">16:00</option>
					<option value="990">16:30</option>
					<option value="1020">17:00</option>
					<option value="1050">17:30</option>
					<option value="1080">18:00</option>
					<option value="1110">18:30</option>
					<option value="1140">19:00</option>
					<option value="1170">19:30</option>
					<option value="1200">20:00</option>
					<option value="1230">20:30</option>
					<option value="1260">21:00</option>
					<option value="1290">21:30</option>
					<option value="1320">22:00</option>
					<option value="1350">22:30</option>
					<option value="1380">23:00</option>
					<option value="1410">23:30</option>
					<?php
					die();
				}
			}
			else if($_REQUEST['target'] == "employeesEndWorkingHours")
			{
				$timeFormats = $wpdb->get_var
				(
					$wpdb->prepare
					(
						"SELECT GeneralSettingsValue FROM ".generalSettingsTable()." WHERE GeneralSettingsKey = %s ",
						'default_Time_Format'
					)
				);
				
				if($timeFormats == 0)
				{
				?>
					<option value="00">00:00 am</option>
					<option value="30">12:30 am</option>
					<option value="60">1:00 am</option>
					<option value="90">1:30 am</option>
					<option value="120">2:00 am</option>
					<option value="150">2:30 am</option>
					<option value="180">3:00 am</option>
					<option value="210">3:30 am</option>
					<option value="240">4:00 am</option>
					<option value="270">4:30 am</option>
					<option value="300">5:00 am</option>
					<option value="330">5:30 am</option>
					<option value="360">6:00 am</option>
					<option value="390">6:30 am</option>
					<option value="420">7:00 am</option>
					<option value="450">7:30 am</option>
					<option value="480" >8:00 am </option>
					<option value="510">8:30 am</option>
					<option value="540">9:00 am</option>
					<option value="570">9:30 am</option>
					<option value="600">10:00 am</option>
					<option value="630">10:30 am</option>
					<option value="660">11:00 am</option>
					<option value="690">11:30 am</option>
					<option value="720">12:00 pm</option>
					<option value="750">12:30 pm</option>
					<option value="780">1:00 pm</option>
					<option value="810">1:30 pm</option>
					<option value="840">2:00 pm</option>
					<option value="870">2:30 pm</option>
					<option value="900">3:00 pm</option>
					<option value="930">3:30 pm</option>
					<option value="960">4:00 pm</option>
					<option value="990">4:30 pm</option>
					<option value="1020">5:00 pm</option>
					<option value="1050">5:30 pm</option>
					<option value="1080">6:00 pm</option>
					<option value="1110">6:30 pm</option>
					<option value="1140">7:00 pm</option>
					<option value="1170">7:30 pm</option>
					<option value="1200">8:00 pm</option>
					<option value="1230">8:30 pm</option>
					<option value="1260">9:00 pm</option>
					<option value="1290">9:30 pm</option>
					<option value="1320">10:00 pm</option>
					<option value="1350">10:30 pm</option>
					<option value="1380">11:00 pm</option>
					<option value="1410">11:30 pm</option>
				<?php
				}
				else
				{
					?>
					<option value="00">00:00</option>
					<option value="30">00:30</option>
					<option value="60">1:00</option>
					<option value="90">1:30</option>
					<option value="120">2:00</option>
					<option value="150">2:30</option>
					<option value="180">3:00</option>
					<option value="210">3:30</option>
					<option value="240">4:00</option>
					<option value="270">4:30</option>
					<option value="300">5:00</option>
					<option value="330">5:30</option>
					<option value="360">6:00</option>
					<option value="390">6:30</option>
					<option value="420">7:00</option>
					<option value="450">7:30</option>
					<option value="480">8:00 </option>
					<option value="510">8:30</option>
					<option value="540">9:00</option>
					<option value="570">9:30</option>
					<option value="600">10:00</option>
					<option value="630">10:30</option>
					<option value="660">11:00</option>
					<option value="690">11:30</option>
					<option value="720">12:00</option>
					<option value="750">12:30</option>
					<option value="780">13:00</option>
					<option value="810">13:30</option>
					<option value="840">14:00</option>
					<option value="870">14:30</option>
					<option value="900">15:00</option>
					<option value="930">15:30</option>
					<option value="960">16:00</option>
					<option value="990">16:30</option>
					<option value="1020">17:00</option>
					<option value="1050">17:30</option>
					<option value="1080">18:00</option>
					<option value="1110">18:30</option>
					<option value="1140">19:00</option>
					<option value="1170">19:30</option>
					<option value="1200">20:00</option>
					<option value="1230">20:30</option>
					<option value="1260">21:00</option>
					<option value="1290">21:30</option>
					<option value="1320">22:00</option>
					<option value="1350">22:30</option>
					<option value="1380">23:00</option>
					<option value="1410">23:30</option>
					<?php
					die();
				}
			}
			else if($_REQUEST['target'] == "employeesWorkingHours")
			{
				
					$workingDay = $_REQUEST['workingDay'];
					$uxDayOpenClosed = intval($_REQUEST['uxDayOpenClosed']);
					$uxDdlStart = intval($_REQUEST['uxDdlStart']);
					$uxDdlEnd= intval($_REQUEST['uxDdlEnd']);
					$uxDdlWorkingEmployees = intval($_REQUEST['uxDdlWorkingEmployees']);
					$wpdb->query
					(
				          $wpdb->prepare
				          (
				                    "UPDATE ".employees_TimingsTable()." SET StartTime = %d, EndTime = %d, Status = %d WHERE Day = %s and EmployeeId = %d",
				                    $uxDdlStart,
				                    $uxDdlEnd,
				                    $uxDayOpenClosed,
				                    $workingDay,
				                    $uxDdlWorkingEmployees
				          )
					);
					die();
			}
			else if($_REQUEST['target'] == "convertTime")
			{
					$employeeId = intval($_REQUEST['uxEmployeeId']);
					$workingDay = esc_attr($_REQUEST['workingDay']);
					$getTotalMins = $wpdb->get_var
					(
						$wpdb->prepare
						(
							"SELECT StartTime FROM ".employees_TimingsTable()." where Day = %s and EmployeeId = %d ",
							$workingDay,
							$employeeId
						)
					);
					$getStatus = $wpdb->get_var
					(
						$wpdb->prepare
						(
							"SELECT Status FROM ".employees_TimingsTable()." where Day = %s and EmployeeId = %d ",
							$workingDay,
							$employeeId
						)
					);
					$timeFormats = $wpdb->get_var
					(
						$wpdb->prepare
						(					
							"SELECT GeneralSettingsValue FROM ".generalSettingsTable()." WHERE GeneralSettingsKey = %s",
							'default_Time_Format'
						)
					);
					$getHours = floor($getTotalMins / 60) ;
					$getMins = $getTotalMins % 60 ;
					if($getMins==0)
					{
						$hourFormat = $getHours . ":" . "00";
						if($timeFormats == 0)
						{
							$time_in_12_hour_format  = DATE("g:i a", STRTOTIME($hourFormat));
						}
						else 
						{
							$time_in_12_hour_format  = DATE("H:i", STRTOTIME($hourFormat));
						}
						echo $time_in_12_hour_format . "," . $getTotalMins . "," . $getStatus;
					}
					else
					{
						$hourFormat = $getHours . ":" . $getMins;
						if($timeFormats == 0)
						{
							$time_in_12_hour_format  = DATE("g:i a", STRTOTIME($hourFormat));
						}
						else 
						{
							$time_in_12_hour_format  = DATE("H:i", STRTOTIME($hourFormat));
						}
						echo $time_in_12_hour_format . "," . $getTotalMins . "," . $getStatus;	
					}
					die();
			}
			else if($_REQUEST['target'] == "convertEndTime")
			{
					$employeeId = intval($_REQUEST['uxEmployeeId']);
					$workingDay = esc_attr($_REQUEST['workingDay']);
					$getTotalMins = $wpdb->get_var
					(
							$wpdb->prepare
							(
								"SELECT EndTime FROM ".employees_TimingsTable()." where Day = %s and EmployeeId = %d ",
								$workingDay,
								$employeeId
							)
					);
					$timeFormats = $wpdb->get_var
					(
						$wpdb->prepare
						(
							"SELECT GeneralSettingsValue FROM ".generalSettingsTable()." WHERE GeneralSettingsKey = %s ",
							'default_Time_Format'
						)
					);
					$getHours = floor($getTotalMins / 60) ;
					$getMins = $getTotalMins % 60 ;
					if($getMins==0)
					{
						$hourFormat = $getHours . ":" . "00";
						if($timeFormats == 0)
						{
							$time_in_12_hour_format  = DATE("g:i a", STRTOTIME($hourFormat));
						}
						else 
						{
							$time_in_12_hour_format  = DATE("H:i", STRTOTIME($hourFormat));
						}
						echo $time_in_12_hour_format . "," . $getTotalMins;
					}
					else
					{
						$hourFormat = $getHours . ":" . $getMins;
						if($timeFormats == 0)
						{
							$time_in_12_hour_format  = DATE("g:i a", STRTOTIME($hourFormat));
						}
						else 
						{
							$time_in_12_hour_format  = DATE("H:i", STRTOTIME($hourFormat));
						}
						echo $time_in_12_hour_format . "," . $getTotalMins;		
					}
					die();
			}
			else if($_REQUEST['target'] == "updateGeneralSettings")
			{
					$uxDefaultcurrency = esc_attr($_REQUEST['uxDefaultcurrency']);
					$uxDefaultcountry = esc_attr($_REQUEST['uxDefaultcountry']);
					$uxDefaultTimeFormat = intval($_REQUEST['uxDefaultTimeFormat']);
					$uxDefaultDateFormat = $_REQUEST['uxDefaultDateFormat'];
					$valueTimeFormat = intval($_REQUEST['uxSlotHours']);
					$valueSlotFormat = intval($_REQUEST['uxSlotMins']);
					$StaffManagement = intval($_REQUEST['StaffManagement']);
					$default_Time_Zone = html_entity_decode($_REQUEST['default_Time_Zone']);
					$default_Time_Zone_Name = html_entity_decode($_REQUEST['default_Time_Zone_Name']);
					$totalTime = $valueTimeFormat * 60 + $valueSlotFormat;
					$wpdb->query
				    (
				          $wpdb->prepare
				          (
				          			"UPDATE ".currenciesTable()." SET CurrencyUsed = %d  WHERE CurrencyName = %s",
				                    1,
				                   	$uxDefaultcurrency
				          )
				    );
					$wpdb->query
				    (
				          $wpdb->prepare
				          (
				          			"UPDATE ".currenciesTable()." SET CurrencyUsed = %d  WHERE CurrencyName != %s",
				                    0,
				                   	$uxDefaultcurrency
				          )
				    );
					$wpdb->query
					(
						  $wpdb->prepare
						  (
								  "UPDATE ".countriesTable()." SET CountryUsed = %d where CountryName = %s",
								  1,
								  $uxDefaultcountry
						  )
					);	
					$wpdb->query
					(
							$wpdb->prepare
							(
								 "UPDATE ".countriesTable()." SET CountryUsed = %d where CountryName != %s",
								 0,
								 $uxDefaultcountry
							)
					);	
					$wpdb->query
				    (
				          $wpdb->prepare
				          (
				                    "UPDATE ".generalSettingsTable()." SET GeneralSettingsValue = %d  WHERE GeneralSettingsKey = %s",
				                    $uxDefaultTimeFormat,
				                    "default_Time_Format"
				          )
				    );
					$wpdb->query
				    (
				          $wpdb->prepare
				          (
				                    "UPDATE ".generalSettingsTable()." SET GeneralSettingsValue = %d  WHERE GeneralSettingsKey = %s",
				                    $totalTime,
				                    "default_Slot_Total_Time_Format"
				          )
				    );
					$wpdb->query
				    (
				          $wpdb->prepare
				          (
				                    "UPDATE ".generalSettingsTable()." SET GeneralSettingsValue = %d  WHERE GeneralSettingsKey = %s",
				                    $uxDefaultDateFormat,
				                    "default_Date_Format"
				          )
				    );
					$wpdb->query
				    (
				          $wpdb->prepare
				          (
				                    "UPDATE ".generalSettingsTable()." SET GeneralSettingsValue = %s  WHERE GeneralSettingsKey = %s",
				                    $default_Time_Zone,
				                    "default_Time_Zone"
				          )
				    );
				    $wpdb->query
				    (
				          $wpdb->prepare
				          (
				                    "UPDATE ".generalSettingsTable()." SET GeneralSettingsValue = %s  WHERE GeneralSettingsKey = %s",
				                    $default_Time_Zone_Name,
				                    "default_Time_Zone_Name"
				          )
				    );
					$wpdb->query
				    (
				          $wpdb->prepare
				          (
				                    "UPDATE ".generalSettingsTable()." SET GeneralSettingsValue = %s  WHERE GeneralSettingsKey = %s",
				                    $StaffManagement,
				                    "default_Staff_Management_Settings"
				          )
				    );
					echo $valueTimeFormat,$valueSlotFormat;
					die();
			}	
			else if($_REQUEST['target'] == "AutoApprove")
			{
				$uxAutoApprove = esc_attr($_REQUEST['uxAutoApprove']);
				$wpdb->query
			    (
				     $wpdb->prepare
				     (
				           "UPDATE ".generalSettingsTable()." SET GeneralSettingsValue = %s WHERE GeneralSettingsKey = %s",
				           $uxAutoApprove,
				           "auto-approve-enable"
				     )
			    );
				die();
			}
			else if($_REQUEST['target'] == "AutoApproveShow")
			{
				$uxAutoApprove = esc_attr($_REQUEST['uxAutoApprove']);
				$AutoApprove = $wpdb->get_var
			    (
				     $wpdb->prepare
				     (
				           'SELECT GeneralSettingsValue FROM ' . generalSettingsTable() . ' where   GeneralSettingsKey = %s',
							"auto-approve-enable"
				     )
			    );
				if($AutoApprove == 1)
				{
					echo "On";
				}
				else 
				{
					echo "Off";
				}
				die();
			}
			else if($_REQUEST['target'] == "DeleteAllBookings")
			{
				$wpdb->query
			    (
				    $wpdb->prepare
				    (
				        "TRUNCATE Table ".bookingTable()
					)
			    );
				die();
			}	
			else if($_REQUEST['target'] == "RestoreFactorySettings")
			{
				
				require_once 'bookings-plus.php';
		  		deleteDatabaseHook();
				createDatabaseHook();
				die();
			}
			else if($_REQUEST['target'] == "editService")
			{
					$serviceId = intval($_REQUEST['serviceId']);
					$uxServiceEdit = $wpdb->get_row
					(
							$wpdb->prepare
							(
									'SELECT ServiceName,ServiceCost,ServiceMaxBookings,Type,ServiceColorCode FROM ' . servicesTable() . ' where ServiceId = %d',
									$serviceId
							)
					);
					?>
						<script>
							jQuery('#uxEditServiceColorCode').colorpicker().on('changeColor', function(ev){
									jQuery('#picker2').css('background-color',ev.color.toHex());
									jQuery('#uxEditServiceColorCode').val(ev.color.toHex());
							});
							
						</script>
					    
				         <div class="control-group">
				         	<label class="control-label"><?php _e( "Service Color :", bookings_plus ); ?><span class="req">*</span></label>
				         	   <div class="controls">
							<div class="input-append color" data-color="rgb(255, 141, 180)" data-color-format="rgb" >
								<span class="add-on"><i id="picker2" style="background-color: <?php echo $uxServiceEdit->ServiceColorCode; ?>"></i></span>
								<input type="text" value="<?php echo $uxServiceEdit->ServiceColorCode; ?>"  id="uxEditServiceColorCode" name="uxEditServiceColorCode" >                                 
		                    </div>
		                    </div>  
				         </div>
						 <div class="control-group">
				         	<label class="control-label"><?php _e( "Service Name :", bookings_plus ); ?><span class="req">*</span></label>
				         	<div class="controls"><input type="text" class="required span12" name="uxEditServiceName" id="uxEditServiceName" 
				         	value="<?php echo $uxServiceEdit->ServiceName; ?>"/></div>
				         </div>
				         
				         <div class="control-group">
				         	<label class="control-label"><?php _e( "Cost :", bookings_plus ); ?><span class="req">*</span></label>
				            <div class="controls"><input type="text" class="required span12" name="uxEditServiceCost" id="uxEditServiceCost" 
				            value="<?php echo $uxServiceEdit->ServiceCost; ?>"/></div>
				         </div>
				         <div class="control-group">
				         
			             	<label class="control-label"><?php _e( "Service Type :", bookings_plus );?>
			               		<span class="req">*</span>
			               	</label>
							<div class="controls searchDrop">
					        <?php
							if($uxServiceEdit->Type == 0)
							{
							?>
								<label class="radio">
									<input type="radio" id="uxEditServiceTypeEnable" name="uxEditServiceType" class="style" value="0" onclick="singleBookingType();" checked="checked"><?php _e( "Single Booking", bookings_plus );?>
								</label>
								<label class="radio">
									<input type="radio" id="uxEditServiceTypeDisable" name="uxEditServiceType" onclick="groupBookingType();" class="style"value="1"><?php _e( "Group Bookings", bookings_plus );?>
								</label>		
							<?php
							}
							else 
							{
							?>
								<label class="radio">
									<input type="radio" id="uxEditServiceTypeEnable" name="uxEditServiceType" class="style" value="0" onclick="singleBookingType();"><?php _e( "Single Booking", bookings_plus );?>
								</label>
								<label class="radio">
									<input type="radio" id="uxEditServiceTypeDisable" name="uxEditServiceType" onclick="groupBookingType();" class="style"value="1" checked="checked"><?php _e( "Group Bookings", bookings_plus );?>
								</label>	
							<?php
							}
							?>
						</div>
			           </div>
				       <div class="control-group" id="editMaxBooking" style="display: none;">
				         	<label class="control-label"><?php _e( "Max Bookings<br/>(Each Slot) :", bookings_plus ); ?><span class="req">*</span></label>
				            <div class="controls"><input type="text" class="required span12" name="uxEditMaxBookings" id="uxEditMaxBookings" 
				            value="<?php echo $uxServiceEdit->ServiceMaxBookings; ?>"/></div>
				       </div>
						 <input type="hidden" id="hiddenServiceId" name="hiddenServiceId" value="<?php echo $serviceId; ?>" />
						
					<?php
					die();	         
			}
			else if($_REQUEST['target'] == 'checkAllServices')
			{
					
					$returnDataArrayList =$wpdb->get_results
					(
							$wpdb->prepare
							(
								  'SELECT ServiceId from ' . servicesTable(),'' 
								  
							)
					);
					$scriptDynamic = '<script>var oTable = jQuery("#data-table1").dataTable();';
					for($flagAllocate = 0; $flagAllocate < count($returnDataArrayList); $flagAllocate++)
					{
						$scriptDynamic.= 'jQuery("#chkAllocation' . $returnDataArrayList[$flagAllocate] -> ServiceId .'", oTable.fnGetNodes()).each(function(){jQuery(this).attr("checked", "checked");});';
						
					}
					$scriptDynamic .= '</script>';
					echo $scriptDynamic;
					die();
			}
			else if($_REQUEST['target'] == 'UnSelectAllServices')
			{
					
					$returnDataArrayList =$wpdb->get_results
					(
							$wpdb->prepare
							(
								  'SELECT ServiceId from ' . servicesTable(),'' 
								  
							)
					);
					$scriptDynamic = '<script>var oTable = jQuery("#data-table1").dataTable();';
					for($flagAllocate = 0; $flagAllocate < count($returnDataArrayList); $flagAllocate++)
					{
						$scriptDynamic.= 'jQuery("#chkAllocation' . $returnDataArrayList[$flagAllocate] -> ServiceId .'", oTable.fnGetNodes()).each(function(){jQuery(this).removeAttr("checked");});';
											
					}
					$scriptDynamic .= '</script>';
					echo $scriptDynamic;
					die();
			}
			else if($_REQUEST['target'] == 'deleteAllocationEntries')
			{
					$employeeId = intval($_REQUEST['employeeId']);
					$wpdb->query
					(
					  		$wpdb->prepare
					    	(
					    		"DELETE FROM ".services_AllocationTable()." WHERE EmployeeId = %d ",
					       		 $employeeId
					   		)
					);
					die();
			}
			else if($_REQUEST['target'] == "updateServiceTable")
			{
					$serviceId = intval($_REQUEST['serviceId']);
					$uxEditServiceName = html_entity_decode($_REQUEST['uxEditServiceName']);
					$uxEditServiceCost = doubleval($_REQUEST['uxEditServiceCost']);
					$uxEditMaxBookings = intval($_REQUEST['uxEditMaxBookings']);
					$uxEditServiceType = intval($_REQUEST['uxEditServiceType']);
					$uxEditServiceColorCode = esc_attr($_REQUEST['uxEditServiceColorCode']);
					$wpdb->query
			     	(
			            $wpdb->prepare
			            (
			                    "UPDATE ".servicesTable()." SET ServiceName = %s, ServiceCost = %f, ServiceMaxBookings = %d, Type = %d, ServiceColorCode = %s WHERE ServiceId = %d",
			                    $uxEditServiceName,
			                    $uxEditServiceCost,
			                    $uxEditMaxBookings,
			                    $uxEditServiceType,
			                    $uxEditServiceColorCode,
			                    $serviceId
			             )
			      	);
					die();
			}
			else if($_REQUEST['target'] == 'deleteService')
			{
					$serviceId = intval($_REQUEST['uxServiceId']);
					$countServiceId = $wpdb -> get_var('SELECT count(AllocationId ) FROM ' . services_AllocationTable() . '  where ServiceId = '. '"' . $serviceId . '"');
					if($countServiceId !=0)
					{
						echo "allocated"; 
					}
					else 
					{
						$wpdb->query
						(
								$wpdb->prepare
								(
									   "DELETE FROM ".servicesTable()." WHERE serviceId = %d",
									    $serviceId
								)
						);
					}
					die();
			} 
			else if($_REQUEST['target'] == "editEmployees")
			{
					$EmployeeId = intval($_REQUEST['employeeId']);
					$uxEmployeeEdit = $wpdb->get_row
					(
							$wpdb->prepare
							(
									'SELECT EmployeeName,EmployeeEmail,EmployeePhone FROM ' . employeesTable() . ' where EmployeeId  = %d',
									$EmployeeId
							)
					);
					
					?>
						
				         <div class="control-group">
				         	<label class="control-label"><?php _e( "Resource Name :", bookings_plus ); ?><span class="req">*</span></label>
				            <div class="controls"><input type="text" class="required span12" name="uxEditEmployeeName" id="uxEditEmployeeName" 
				            value="<?php echo $uxEmployeeEdit->EmployeeName; ?>"/></div>
				         </div>
				         <div class="control-group">
				         	<label class="control-label"><?php _e( "Resource Email :", bookings_plus ); ?><span class="req">*</span></label>
				            <div class="controls"><input type="text" class="required span12" name="uxEditEmployeeEmail" id="uxEditEmployeeEmail" 
				            value="<?php echo $uxEmployeeEdit->EmployeeEmail; ?>"/></div>
				         </div>
						 <div class="control-group">
				         	<label class="control-label"><?php _e( "Resource Phone :", bookings_plus ); ?><span class="req">*</span></label>
				            <div class="controls"><input type="text" class="required span12 " name="uxEditEmployeePhone" id="uxEditEmployeePhone" 
				            value="<?php echo $uxEmployeeEdit->EmployeePhone; ?>"/></div>
				         </div>
						 <input type="hidden" id="hiddenEmployeeId" name="hiddenEmployeeId" value="<?php echo $EmployeeId; ?>" />
					<?php
					die();	         
			}
			else if($_REQUEST['target'] == "updateExistingEmployee")
			{
					$uxEditEmployeeId = intval($_REQUEST['uxEmployeeId']);
					$uxEditEmployeeName = esc_attr($_REQUEST['uxEditEmployeeName']);
					$uxEditEmployeeEmail = esc_attr($_REQUEST['uxEditEmployeeEmail']);
					$uxEditEmployeePhone = esc_attr($_REQUEST['uxEditEmployeePhone']);
					$wpdb->query
			     	(
			            $wpdb->prepare
			            (
			                    "UPDATE ".employeesTable()." SET EmployeeName = %s, EmployeeEmail = %s, 
			                    EmployeePhone = %s WHERE EmployeeId = %d",
			                    $uxEditEmployeeName,
			                    $uxEditEmployeeEmail,
			                    $uxEditEmployeePhone,
			                    $uxEditEmployeeId
			             )
			      	);
					die();
			}
			else if($_REQUEST['target'] == 'deleteEmployees')
			{
					$employeeId= intval($_REQUEST['employeeId']);
					$date = date("Y-m-d");
					$countBooking = $wpdb->get_var('SELECT count(BookingId) FROM ' . bookingTable() . ' where EmployeeId ='. $employeeId .' and Date > '."'".$date ."'");
					$countAllocation = $wpdb->get_var('SELECT count(AllocationId ) FROM ' . services_AllocationTable(). ' where EmployeeId ='.$employeeId);
					if($countBooking != 0)
					{
						echo "bookingExist";
					}
					elseif($countAllocation !=0 )
					{
						echo "allocatedToService";
					}
					else
					{
						
						$wpdb->query
						(
						        $wpdb->prepare
						        (
						                "DELETE FROM ".employees_TimingsTable()." WHERE EmployeeId = %d",
						                 $employeeId       
								)
						);
						$wpdb->query
						(
						        $wpdb->prepare
						        (
						                "DELETE FROM ".services_AllocationTable()." WHERE EmployeeId = %d",
						                 $employeeId       
								)
						);
						$wpdb->query
						(
						        $wpdb->prepare
						        (
						                "DELETE FROM ".bookingTable()." WHERE EmployeeId = %d",
						                 $employeeId       
								)
						);
						$wpdb->query
						(
						        $wpdb->prepare
						        (
						                "DELETE FROM ".employeesTable()." WHERE EmployeeId = %d",
						                 $employeeId       
								)
						);
					}
					die();
			}
			else if($_REQUEST['target'] == "deleteBooking")
			{
				$bookingId = intval($_REQUEST['bookingId']);
				$wpdb->query
			    (
				         $wpdb->prepare
				         (
				                "DELETE FROM ".bookingTable()." WHERE BookingId = %d",
								$bookingId
				         )
			    );
				die();
			}
			else if($_REQUEST['target'] == 'resendBookingEmail')
			{
				include_once 'mailmanagement.php';
				$bookingId = intval($_REQUEST['bookingId']);
				$uxBookingStaus = esc_attr($_REQUEST['status']);
				if($uxBookingStaus == "Pending Approval")
				{
					
					MailManagement($bookingId,"approval_pending");	
					MailManagement($bookingId,"admin");			
				}
				else if($uxBookingStaus == "Approved")
				{
				
					MailManagement($bookingId,"approved");			
				}
				else if($uxBookingStaus == "Disapproved")
				{
					MailManagement($bookingId,"disapproved");		
				}
				die();
			}
			else if($_REQUEST['target'] == 'savedBookingForm')
			{
				$fieldcompare = html_entity_decode($_REQUEST['fieldcompare']);
				$bookingRadioVisible = intval($_REQUEST['bookingRadioVisible']);
				$bookingRadiooRequired = intval($_REQUEST['bookingRadiooRequired']);
				$wpdb->query
				(
				     $wpdb->prepare
				     (
				          "UPDATE ".bookingFormTable()." SET status = %d  WHERE BookingFormField = %s",
				          $bookingRadioVisible,
				          $fieldcompare
				     )
				);
				if ($bookingRadioVisible == "0") 
				{
					$wpdb->query
				   (
				         $wpdb->prepare
				         (
				               "UPDATE ".bookingFormTable()." SET required = %d  WHERE BookingFormField = %s",
				               0,
				               $fieldcompare
				         )
				   );
					
				} 
				else 
				{
					if ($bookingRadiooRequired == "1") 
					{
						$wpdb->query
				   		(
				        	 $wpdb->prepare
				        	 (
				          	     "UPDATE ".bookingFormTable()." SET required = %d  WHERE BookingFormField = %s",
				          	     1,
				          	     $fieldcompare
				        	 )
				  		 );	
						
					} 
					else 
					{
						$wpdb->query
				   		(
				        	 $wpdb->prepare
				        	 (
				          	     "UPDATE ".bookingFormTable()." SET required = %d  WHERE BookingFormField = %s",
				          	     0,
				          	     $fieldcompare
				        	 )
				  		 );
						
					}
				}
				die();
			}
			else if($_REQUEST['target'] == 'updateBookingFormHeader')
			{
				$bookingFormHeaderEditor = html_entity_decode($_REQUEST['bookingFormHeaderEditor']);
				$wpdb->query
				(
				     $wpdb->prepare
				     (
				          "UPDATE ".generalSettingsTable()." SET GeneralSettingsValue = %s WHERE GeneralSettingsKey = %s",
				          $bookingFormHeaderEditor,
				          "booking-header-message"
				     )
			    );
				die();
			}
			else if($_REQUEST['target'] == 'updateBookingFormFooter')
			{
				$bookingFormFooterEditor = html_entity_decode($_REQUEST['bookingFormFooterEditor']);
				$wpdb->query
				(
				     $wpdb->prepare
				     (
				          "UPDATE ".generalSettingsTable()." SET GeneralSettingsValue = %s WHERE GeneralSettingsKey = %s",
				          $bookingFormFooterEditor,
				          "booking-Footer-message"
				     )
			    );
				die();
			}
			else if($_REQUEST['target'] == 'updateBookingFormThankyou')
			{
				$bookingFormThankyouEditor = html_entity_decode($_REQUEST['bookingFormThankyouEditor']);
				$wpdb->query
				(
				     $wpdb->prepare
				     (
				          "UPDATE ".generalSettingsTable()." SET GeneralSettingsValue = %s WHERE GeneralSettingsKey = %s",
				          $bookingFormThankyouEditor,
				          "booking-ThankYou-message"
				     )
			    );
				die();
			}
			else if($_REQUEST['target'] == "UpdateReminderSettings")
			{
					$uxReminderSettings = esc_attr($_REQUEST['uxReminderSettings']);
					echo $uxReminderInterval = esc_attr($_REQUEST['uxReminderInterval']);
					$wpdb->query
				    (
				          $wpdb->prepare
				          (
				                    "UPDATE ".generalSettingsTable()." SET GeneralSettingsValue = %s WHERE GeneralSettingsKey = %s",
				                    $uxReminderSettings,
				                    "reminder-settings"
				          )
				    );
					$wpdb->query
				    (
				          $wpdb->prepare
				          (
				                    "UPDATE ".generalSettingsTable()." SET GeneralSettingsValue = %s WHERE GeneralSettingsKey = %s",
				                    $uxReminderInterval,
				                    "reminder-settings-interval"
				          )
				    );
				    die();
			}
			else if($_REQUEST['target'] == "updatePendingConfirmationEmailTemplate")
			{
					$PendingConfirmationEmailTemplateSubject = html_entity_decode($_REQUEST['PendingConfirmationEmailTemplateSubject']);
					$PendingConfirmationEmailTemplateContent = html_entity_decode($_REQUEST['PendingConfirmationEmailTemplateContent']);
					$wpdb->query
				    (
				          $wpdb->prepare
				          (
				                    "UPDATE ".email_templatesTable()." SET EmailSubject = %s, EmailContent = %s  WHERE EmailType = %s",
				                    $PendingConfirmationEmailTemplateSubject,
				                    $PendingConfirmationEmailTemplateContent,
				                    "booking-pending-confirmation"
				          )
				    );
					die();
				
			}
			else if($_REQUEST['target'] == "updateConfirmationEmailTemplate")
			{
					$ConfirmationEmailTemplateSubject = html_entity_decode($_REQUEST['ConfirmationEmailTemplateSubject']);
					$ConfirmationEmailTemplateContent = html_entity_decode($_REQUEST['ConfirmationEmailTemplateContent']);
					$wpdb->query
				    (
				          $wpdb->prepare
				          (
				                    "UPDATE ".email_templatesTable()." SET EmailSubject = %s, EmailContent = %s  WHERE EmailType = %s",
				                    $ConfirmationEmailTemplateSubject,
				                    $ConfirmationEmailTemplateContent,
				                    "booking-confirmation"
				          )
				    );
					die();
			}
			else if($_REQUEST['target'] == "updateDeclinedEmailTemplate")
			{
					$DeclineEmailTemplateSubject = html_entity_decode($_REQUEST['DeclineEmailTemplateSubject']);
					$DeclineEmailTemplateContent = html_entity_decode($_REQUEST['DeclineEmailTemplateContent']);
					$wpdb->query
				    (
				          $wpdb->prepare
				          (
				                    "UPDATE ".email_templatesTable()." SET EmailSubject = %s, EmailContent = %s  WHERE EmailType = %s",
				                    $DeclineEmailTemplateSubject,
				                    $DeclineEmailTemplateContent,
				                    "booking-disapproved"
				          )
				    );
					die();
			}
			else if($_REQUEST['target'] == "updateAdminApproveDisapproveEmailTemplate")
			{
					$AdminApproveDisapproveEmailTemplateSubject = html_entity_decode($_REQUEST['AdminApproveDisapproveEmailTemplateSubject']);
					$AdminApproveDisapproveEmailTemplateContent = html_entity_decode($_REQUEST['AdminApproveDisapproveEmailTemplateContent']);
					$wpdb->query
				    (
				          $wpdb->prepare
				          (
				                    "UPDATE ".email_templatesTable()." SET EmailSubject = %s, EmailContent = %s  WHERE EmailType = %s",
				                    $AdminApproveDisapproveEmailTemplateSubject,
				                    $AdminApproveDisapproveEmailTemplateContent,
				                    "admin-control"
				          )
				    );
					die();
			}
			else if($_REQUEST['target'] == "updatePaypalAdminNotificationEmailTemplate")
			{
					$PaypalAdminNotificationEmailTemplateSubject = html_entity_decode($_REQUEST['PaypalAdminNotificationEmailTemplateSubject']);
					$PaypalAdminNotificationEmailTemplateContent = html_entity_decode($_REQUEST['PaypalAdminNotificationEmailTemplateContent']);
					$wpdb->query
				    (
				          $wpdb->prepare
				          (
				                    "UPDATE ".email_templatesTable()." SET EmailSubject = %s, EmailContent = %s  WHERE EmailType = %s",
				                    $PaypalAdminNotificationEmailTemplateSubject,
				                    $PaypalAdminNotificationEmailTemplateContent,
				                    "paypal-payment-notification"
				          )
				    );
				    die();
			}
			else if($_REQUEST['target'] == "updatePaypalCancellationNotificationEmailTemplate")
			{
					$PaypalCancellationNotificationEmailTemplateSubject = html_entity_decode($_REQUEST['PaypalCancellationNotificationEmailTemplateSubject']);
					$PaypalCancellationNotificationEmailTemplateContent = html_entity_decode($_REQUEST['PaypalCancellationNotificationEmailTemplateContent']);
					$wpdb->query
				    (
				          $wpdb->prepare
				          (
				                    "UPDATE ".email_templatesTable()." SET EmailSubject = %s, EmailContent = %s  WHERE EmailType = %s",
				                    $PaypalCancellationNotificationEmailTemplateSubject,
				                    $PaypalCancellationNotificationEmailTemplateContent,
				                    "paypal-cancellation-notification"
				          )
				    );
					die();
			}
			else if($_REQUEST['target']== 'updateRecordsListings')
		 	{
				$updateRecordsArray = $_POST['recordsArray'];
			 	$listingCounter = 1;
				foreach ($updateRecordsArray as $recordIDValue)
				{
			   		$wpdb->query
			     	(
			            $wpdb->prepare
			            (
			  				"UPDATE ".servicesTable()." SET ServiceDisplayOrder  = %d WHERE ServiceId = %d",
			  				$listingCounter,
			  				$recordIDValue
						)
			      	);
					 echo  "UPDATE ".servicesTable()." set ServiceDisplayOrder =".$listingCounter." where ServiceId='" . $recordIDValue . "'";
		   
					$listingCounter = $listingCounter + 1;	
				}
				die();
		 	}
			else if($_REQUEST['target'] == 'reportABug')
			{
					$uxReportEmailAddress = esc_attr($_REQUEST['uxReportEmailAddress']);
					$uxReportBug = stripcslashes(html_entity_decode($_REQUEST['uxReportBug']));
					$uxReportSubject = stripcslashes(html_entity_decode($_REQUEST['uxReportSubject']));
					$to = "support@bookings-plus.com";
					$title=get_bloginfo('name');
					
					$headers= "From: " .$title. " <". $uxReportEmailAddress . ">" ."\n" .
							    	   "Content-Type: text/html; charset=\"" .
									    get_option('blog_charset') . "\n";
					$content = "
					<p>Email Address: ".$uxReportEmailAddress."
					</p><p>
					Bug: ".$uxReportBug."</p>";
					wp_mail($to,$uxReportSubject,$content,$headers);
					die();
			}
			else if($_REQUEST['target'] == 'becomeAff')
			{
					$uxReportEmailAddress = esc_attr($_REQUEST['uxReportEmailAddress']);
					$uxReportBug = stripcslashes(html_entity_decode($_REQUEST['uxReportBug']));
					$uxReportSubject = stripcslashes(html_entity_decode($_REQUEST['uxReportSubject']));
					$to = "aff@bookings-plus.com";
					$title=get_bloginfo('name');
					$headers= "From: " .$title. " <". $uxReportEmailAddress . ">" ."\n" .
							    	   "Content-Type: text/html; charset=\"" .
									    get_option('blog_charset') . "\n";
					$content = "
					<p>Email Address: ".$uxReportEmailAddress."
					</p><p>
					Bug: ".$uxReportBug."</p>";
					wp_mail($to,$uxReportSubject,$content,$headers);
					die();
			}
			else if($_REQUEST['target'] == "editcustomers")
			{
					$customerId = intval($_REQUEST['customerId']);
					$customer = $wpdb->get_row
					(
						$wpdb->prepare
						(
							"SELECT * FROM ".customersTable()." where CustomerId = %d",
							$customerId
						)
					);
			?>
				<div class="row-fluid nested form-horizontal">
					<div class="span6 well">
						<div class="body" style="padding:5px">
							<div class="control-group">
				        		<label class="control-label"><?php _e( "First Name :", bookings_plus ); ?>
				        			<span class="req">*</span>
				        		</label>
				        		<div class="controls">
				        			<input type="text" class="required span12" name="uxEditFirstName" id="uxEditFirstName" value="<?php echo $customer->CustomerFirstName;?>"/>
				        		</div>
				        	</div>
						    <div class="control-group">
					        	<label class="control-label"><?php _e( "Last Name :", bookings_plus ); ?>
					        		<span class="req">*</span>
					        	</label>
					        	<div class="controls">
					        		<input type="text" class="required span12" name="uxEditLastName" id="uxEditLastName" value="<?php echo $customer->CustomerLastName;?>"/>
					        	</div>
					        </div>
					        <div class="control-group">
					        	<label class="control-label"><?php _e( "Email :", bookings_plus ); ?>
					        		<span class="req">*</span>
					        	</label>
					          	<div class="controls">
					          		<input type="text" class="required span12" name="uxEditEmailAddress" id="uxEditEmailAddress" value= "<?php echo $customer->CustomerEmail;?>"/>				          	
					          	</div>
		        			</div>
		 					<div class="control-group">
		         				<label class="control-label"><?php _e( "Telephone :", bookings_plus ); ?></label>
		          				<div class="controls">
		          					<input type="text" class="required span12 maskPhone" name="uxEditTelephoneNumber" id="uxEditTelephoneNumber" value="<?php echo $customer->CustomerTelephone;?>" >	          				
		          				</div>
					       	</div>
					 	   	<div class="control-group">
					        	<label class="control-label"><?php _e( "Mobile :", bookings_plus ); ?></label>
					        	<div class="controls">
					        		<input type="text" class="required span12 maskPhone" name="uxEditMobileNumber" id="uxEditMobileNumber" value="<?php echo $customer->CustomerMobile;?>">
					        	</div>
					        </div>
					    	<div class="control-group">
					        	<label class="control-label"><?php _e( "Address 1 :", bookings_plus ); ?></label>
					            <div class="controls">
					            	<input type="text" class="required span12" name="uxEditAddress1" id="uxEditAddress1" value="<?php echo $customer->CustomerAddress1;?>">
					            </div>
					        </div>                         
				        </div>     
				    </div>
					<div class="span6 well">
						<div class="body"  style="padding:5px">
				 			<div class="control-group">
				        		<label class="control-label"><?php _e( "Address 2 :", bookings_plus ); ?></label>
				                <div class="controls">
				                	<input type="text" class="required span12" name="uxEditAddress2" id="uxEditAddress2" value="<?php echo $customer->CustomerAddress2;?>">
				                </div>
				            </div>    						
				            <div class="control-group">
				            	<label class="control-label"><?php _e( "City :", bookings_plus ); ?></label>
				                <div class="controls">
				                	<input type="text" class="required span12" name="uxEditCity" id="uxEditCity" value="<?php echo $customer->CustomerCity;?>">
				                </div>
				            </div>
				 			<div class="control-group">
				                 <label class="control-label"><?php _e( "Post Code :", bookings_plus ); ?></label>
				                 <div class="controls">
				                 	<input type="text" class="required span12" name="uxEditPostalCode" id="uxEditPostalCode" value="<?php echo $customer->CustomerZipCode;?>">
				                 </div>
				            </div>
				 			<div class="control-group">
				            	<label class="control-label"><?php _e( "Country :", bookings_plus ); ?></label>
				                <div class="controls">
				                	<select name="uxEditCountry" class="style required" id="uxEditCountry">
				                	<?php
										$country = $wpdb->get_results
										(
											$wpdb->prepare
											(
												"SELECT CountryName,CountryId From ".countriesTable()." order by CountryName ASC"
											)
										);	
										$sel_country = $wpdb->get_var
										(
											$wpdb->prepare
											(
												"SELECT CountryName From ".countriesTable()." where CountryId = ".$customer->CustomerCountry
											)
										);
										for ($flagCountry = 0; $flagCountry < count($country); $flagCountry++)
										{
										?>
											<option value="<?php echo $country[$flagCountry]->CountryId;?>"><?php echo $country[$flagCountry]->CountryName;?></option>
										<?php 
										}
									?>                   
				                   	</select>
				                    <script>
				                    	jQuery('#uxEditCountry').val("<?php echo $customer->CustomerCountry;?>");
				                    </script>
				        		</div>
				        	</div>
				 			<div class="control-group">
				            	<label class="control-label"><?php _e( "Comments :", bookings_plus ); ?></label>
				                <div class="controls">
				                	<textarea class="required span12" name="uxEditComments" id="uxEditComments"  style="height:85px"><?php echo $customer->CustomerComments;?></textarea>
				                </div>
				            </div> 
				        </div>
				    </div>
				</div>
				<input type="hidden" id="hiddenCustomerId" name="hiddenCustomerId" value="<?php echo $customer->CustomerId;?>" />
				<input type="hidden" id="hiddenCustomerName" name="hiddenCustomerName" value="<?php echo $customer->CustomerFirstName ." " . $customer->CustomerLastName ;?>" />		
				<?php
				die();		
			}
			else if($_REQUEST['target'] == "updatecustomers")
			{
				$CustomerId = intval($_REQUEST['uxEditCustomerId']);
				$uxEditFirstName=esc_attr($_REQUEST['uxEditFirstName']);
				$uxEditLastName=esc_attr($_REQUEST['uxEditLastName']);
				$uxEditEmailAddress=esc_attr($_REQUEST['uxEditEmailAddress']);
				$uxEditTelephoneNumber=esc_attr($_REQUEST['uxEditTelephoneNumber']);
				$uxEditMobileNumber=esc_attr($_REQUEST['uxEditMobileNumber']);
				$uxEditAddress1=esc_attr($_REQUEST['uxEditAddress1']);
				$uxEditAddress2=esc_attr($_REQUEST['uxEditAddress2']);
				$uxEditCity=esc_attr($_REQUEST['uxEditCity']);
				$uxEditPostalCode=esc_attr($_REQUEST['uxEditPostalCode']);
				$uxEditCountry=intval($_REQUEST['uxEditCountry']);
				$uxEditComments=esc_attr($_REQUEST['uxEditComments']);
				$updateComments = esc_attr($_REQUEST['comment']);
				if($updateComments != "no")
				{
					$wpdb->query
					(
						$wpdb->prepare
					    (
					     	"UPDATE ".customersTable()." SET CustomerFirstName= %s, CustomerLastName = %s, CustomerEmail = %s,
					        CustomerTelephone=%s, CustomerMobile = %s, CustomerAddress1=%s, CustomerAddress2=%s, CustomerCity=%s, 
					        CustomerZipCode=%s,CustomerCountry=%d, CustomerComments=%s WHERE CustomerId = %d",
				            $uxEditFirstName,
					        $uxEditLastName,
					        $uxEditEmailAddress,
					        $uxEditTelephoneNumber,
				            $uxEditMobileNumber,
					        $uxEditAddress1,
					        $uxEditAddress2,
				            $uxEditCity,
					        $uxEditPostalCode,
					        $uxEditCountry,
					        $uxEditComments,
					        $CustomerId
					    )
					);
				}
				else
				{
					$bookingFormData = $wpdb->get_results('SELECT * From '.bookingFormTable());
					for($flagField = 0; $flagField < count($bookingFormData); $flagField++)
					{
						if($bookingFormData[$flagField]->status == 1)
						{
							switch($bookingFormData[$flagField]->BookingFormId)
							{
								case 1:
								$wpdb->query
						     	(
						        	$wpdb->prepare
						        	(
						        		"UPDATE ".customersTable()." SET CustomerEmail = %s WHERE CustomerId = %d",
					            		$uxEditEmailAddress,	                
						                $CustomerId
						            )
						        );	
								break;
								case 2:
								$wpdb->query
						     	(
						        	$wpdb->prepare
						        	(
						        		"UPDATE ".customersTable()." SET CustomerFirstName = %s WHERE CustomerId = %d",
					            		$uxEditFirstName,	                
						                $CustomerId
						            )
						        );	
								break;
								case 3:
								$wpdb->query
						     	(
						        	$wpdb->prepare
						            (
						            	"UPDATE ".customersTable()." SET CustomerLastName = %s WHERE CustomerId = %d",
					                    $uxEditLastName,	                
						                $CustomerId
						            )
						       	);	
								break;
								case 4:
								$wpdb->query
						     	(
						        	$wpdb->prepare
						        	(
						        		"UPDATE ".customersTable()." SET CustomerMobile = %s WHERE CustomerId = %d",
					            		$uxEditMobileNumber,	                
						                $CustomerId
						            )
						         );	
								break;
								case 5:
								$wpdb->query
						     	(
						        	$wpdb->prepare
						        	(
						        		"UPDATE ".customersTable()." SET CustomerTelephone = %s WHERE CustomerId = %d",
					            		$uxEditTelephoneNumber,	                
						                $CustomerId
						            )
						         );	
								$customerPhone = $uxEditTelephoneNumber;
								break;
								case 6:
								$wpdb->query
						     	(
						        	$wpdb->prepare
						         	(
						         		"UPDATE ".customersTable()." SET CustomerAddress1 = %s WHERE CustomerId = %d",
					             		$uxEditAddress1,	                
						                $CustomerId
						            )
						        );	
								break;
								case 7:
								$wpdb->query
						     	(
						        	$wpdb->prepare
						        	(
						           		"UPDATE ".customersTable()." SET CustomerAddress2 = %s WHERE CustomerId = %d",
					               		$uxEditAddress2,	                
						            	$CustomerId
						            )
						        );	
								break;
								case 8:
								$wpdb->query
						     	(
						        	$wpdb->prepare
						        	(
						        		"UPDATE ".customersTable()." SET CustomerCity = %s WHERE CustomerId = %d",
					            		$uxEditCity,	                
						                $CustomerId
						            )
						         );	
								 break;
								 case 9:
								 $wpdb->query
						     	 (
						         	$wpdb->prepare
						         	(
						         		"UPDATE ".customersTable()." SET CustomerZipCode = %s WHERE CustomerId = %d",
					             		$uxEditPostalCode,	                
						                $CustomerId
						            )
						          );	
								  break;
								  case 10:
								  $wpdb->query
						     	  (
						          	$wpdb->prepare
						          	(
						            	"UPDATE ".customersTable()." SET CustomerCountry = %d WHERE CustomerId = %d",
					                    $uxEditCountry,	                
						                $CustomerId
						            )
						           );	
								   break;										
							}									
						}
				    }
				}
				die();
			}				 	
			else if($_REQUEST['target'] == "DeleteCustomer")
			{
					$customerId = intval($_REQUEST['uxcustomerId']);
					$countBooking = $wpdb->get_var('SELECT count(BookingId) FROM ' . bookingTable() . ' where CustomerId ='. $customerId);
					if($countBooking != 0)
					{
						echo "bookingExist";
					}
					else
					{
						$wpdb->query
						(
							$wpdb->prepare
							(
							   "DELETE FROM ".customersTable()." WHERE CustomerId = %d",
							    $customerId
							)
						);
					}
					die();
			}
			else if($_REQUEST['target']== 'customerBooking')
			{
				$customerId  = intval($_REQUEST['customerId']);
				$customerNameReturn = $wpdb->get_row("SELECT CustomerFirstName,CustomerLastName  FROM ".customersTable()." where CustomerId = ".$customerId);
				$customerBookingDetail = $wpdb->get_results
			    (
			          $wpdb->prepare
			          (
							"SELECT ". servicesTable(). ".ServiceName, ".employeesTable(). ".EmployeeName,
							".bookingTable().".Date,". bookingTable().".TimeSlot,". bookingTable().".Comments,". bookingTable().".DateofBooking,
							". bookingTable().".BookingStatus,". bookingTable().".BookingId from ".bookingTable()." LEFT OUTER JOIN " .customersTable()." ON ".bookingTable().
							".CustomerId= ".customersTable().".CustomerId ". " LEFT OUTER JOIN " .employeesTable()." ON ".bookingTable().
							".EmployeeId=".employeesTable().".EmployeeId". " LEFT OUTER JOIN " .servicesTable()." ON ".bookingTable().
							".ServiceId=".servicesTable().".ServiceId where ".bookingTable().".CustomerId =  ".$customerId."
							ORDER BY ".bookingTable().".Date asc"
					  )
			   );
			   for($flag = 0; $flag < count($customerBookingDetail); $flag++)
			   {
				?>
				<tr>
					<td><?php echo $customerBookingDetail[$flag]->ServiceName; ?></td>
					<td><?php echo $customerBookingDetail[$flag]->EmployeeName; ?></td>
					<?php
					$dateFormat = $wpdb -> get_var('SELECT GeneralSettingsValue FROM ' . generalSettingsTable() . ' where GeneralSettingsKey = "default_Date_Format"');											
								if($dateFormat == 0)
								{
								?>
									<td><?php echo date("M d, Y", strtotime($customerBookingDetail[$flag]->Date));?></td>
									<?php
								}
								else if($dateFormat == 1)
								{
								?>
									<td><?php echo date("Y/m/d", strtotime($customerBookingDetail[$flag]->Date));?></td>
									<?php
								}	
								else if($dateFormat == 2)
								{
									?>
									<td><?php echo date("m/d/Y", strtotime($customerBookingDetail[$flag]->Date));?></td>
									<?php
								}	
								else if($dateFormat == 3)
								{
									?>
									<td><?php echo date("d/m/Y", strtotime($customerBookingDetail[$flag]->Date));?></td>
								<?php
								}
								?>
					
					<?php
					    	$getHours = floor(($customerBookingDetail[$flag]->TimeSlot)/60);
							$getMins = ($customerBookingDetail[$flag]->TimeSlot) % 60;
				            $hourFormat = $getHours . ":" . "00";
				            if($timeFormats == 0)
							{
								$time_in_12_hour_format  = DATE("g:i a", STRTOTIME($hourFormat));
							}
							else 
							{
								$time_in_12_hour_format  = DATE("H:i", STRTOTIME($hourFormat));
							}
				            if($getMins!=0)
				            {
				               	$hourFormat = $getHours . ":" . $getMins;
				                if($timeFormats == 0)
								{
									$time_in_12_hour_format  = DATE("g:i a", STRTOTIME($hourFormat));
								}
								else 
								{
									$time_in_12_hour_format  = DATE("H:i", STRTOTIME($hourFormat));
								}
				            }
					    ?>
					<td><?php echo $time_in_12_hour_format; ?></td>
					<td><?php echo $customerBookingDetail[$flag]->BookingStatus; ?></td>
					<?php
					$dateFormat = $wpdb -> get_var('SELECT GeneralSettingsValue FROM ' . generalSettingsTable() . ' where GeneralSettingsKey = "default_Date_Format"');											
								if($dateFormat == 0)
								{
								?>
									<td><?php echo date("M d, Y", strtotime($customerBookingDetail[$flag]->DateofBooking));?></td>
									<?php
								}
								else if($dateFormat == 1)
								{
								?>
									<td><?php echo date("Y/m/d", strtotime($customerBookingDetail[$flag]->DateofBooking));?></td>
									<?php
								}	
								else if($dateFormat == 2)
								{
									?>
									<td><?php echo date("m/d/Y", strtotime($customerBookingDetail[$flag]->DateofBooking));?></td>
									<?php
								}	
								else if($dateFormat == 3)
								{
									?>
									<td><?php echo date("d/m/Y", strtotime($customerBookingDetail[$flag]->DateofBooking));?></td>
								<?php
								}
								?>
					
					<td>
					  	<a class="icon-tag fancybox" href="#customerComments" onclick="customerBookingComments(<?php echo $customerBookingDetail[$flag]->BookingId; ?>);">
					    </a>&nbsp;&nbsp;											
					    <a class="icon-trash" onclick="deleteCustomerBooking(<?php echo $customerBookingDetail[$flag]->BookingId; ?>)">
					    </a>							               												
					</td>
				</tr>
				<?php
				}
				?>
				<input id="customernameBooKing" type="hidden" value="<?php echo $customerNameReturn->CustomerFirstName . " ". $customerNameReturn->CustomerLastName ; ?>" />
				<script>
						oTable = jQuery('#data-table-customer-bookings').dataTable
						({
							"bJQueryUI": false,
							"bAutoWidth": true,
							"sPaginationType": "full_numbers",
							"sDom": '<"datatable-header"fl>t<"datatable-footer"ip>',
							"oLanguage": 
							{
								"sLengthMenu": "<span>Show entries:</span> _MENU_"
							}
							
							
						});	
				</script>
				<?php
				die();
			}
			else if($_REQUEST['target'] == 'customerPaypalBooking')
			{
					$customerId  = intval($_REQUEST['customerId']);
					$customerNameReturn = $wpdb->get_row("SELECT CustomerFirstName,CustomerLastName  FROM ".customersTable()." where CustomerId = ".$customerId);
					$currencyIcon = $wpdb->get_var("SELECT CurrencySymbol FROM ".currenciesTable()." where CurrencyUsed = 1");
					$customerPaypalBookingDetail = $wpdb->get_results
				    (
				         $wpdb->prepare
				         (
								"SELECT ". servicesTable(). ".ServiceName,". servicesTable(). ".ServiceCost, ".employeesTable(). ".EmployeeName,
								".bookingTable().".Date,". bookingTable().".TimeSlot,". bookingTable().".TransactionId,". bookingTable().".PaymentStatus,
								". bookingTable().".BookingStatus,". bookingTable().".BookingId,". bookingTable().".PaymentDate from ".bookingTable()." LEFT OUTER JOIN " .customersTable()." ON ".bookingTable().
								".CustomerId= ".customersTable().".CustomerId ". " LEFT OUTER JOIN " .employeesTable()." ON ".bookingTable().
								".EmployeeId=".employeesTable().".EmployeeId". " LEFT OUTER JOIN " .servicesTable()." ON ".bookingTable().
								".ServiceId=".servicesTable().".ServiceId where ".bookingTable().".CustomerId =  ".$customerId."
								ORDER BY ".bookingTable().".Date asc"
						  )
				     );
					 $timeFormats = $wpdb->get_var("SELECT GeneralSettingsValue FROM ".generalSettingsTable()." WHERE GeneralSettingsKey = 'default_Time_Format'");
				     for($flag = 0; $flag < count($customerPaypalBookingDetail); $flag++)
					 {
							?>
							<tr>
								<td><?php echo $customerPaypalBookingDetail[$flag]->ServiceName; ?></td>
								<td><?php echo $currencyIcon.$customerPaypalBookingDetail[$flag]->ServiceCost; ?></td>
								<?php
									$dateFormat = $wpdb -> get_var('SELECT GeneralSettingsValue FROM ' . generalSettingsTable() . ' where GeneralSettingsKey = "default_Date_Format"');											
									if($dateFormat == 0)
									{
									?>
										<td><?php echo date("M d, Y", strtotime($customerPaypalBookingDetail[$flag]->Date));?></td>
										<?php
									}
									else if($dateFormat == 1)
									{
									?>
										<td><?php echo date("Y/m/d", strtotime($customerPaypalBookingDetail[$flag]->Date));?></td>
										<?php
									}	
									else if($dateFormat == 2)
									{
										?>
										<td><?php echo date("m/d/Y", strtotime($customerPaypalBookingDetail[$flag]->Date));?></td>
										<?php
									}	
									else if($dateFormat == 3)
									{
										?>
										<td><?php echo date("d/m/Y", strtotime($customerPaypalBookingDetail[$flag]->Date));?></td>
									<?php
									}
									
								    	$getHours = floor(($customerPaypalBookingDetail[$flag]->TimeSlot)/60);
										$getMins = ($customerPaypalBookingDetail[$flag]->TimeSlot) % 60;
						                $hourFormat = $getHours . ":" . "00";
								        if($timeFormats == 0)
										{
											$time_in_12_hour_format  = DATE("g:i a", STRTOTIME($hourFormat));
										}
										else 
										{
											$time_in_12_hour_format  = DATE("H:i", STRTOTIME($hourFormat));
										}
								        if($getMins!=0)
							            {
								           	$hourFormat = $getHours . ":" . $getMins;
								            if($timeFormats == 0)
											{
												$time_in_12_hour_format  = DATE("g:i a", STRTOTIME($hourFormat));
											}
											else 
											{
												$time_in_12_hour_format  = DATE("H:i", STRTOTIME($hourFormat));
											}
								        }
								   ?>
								<td><?php echo $time_in_12_hour_format; ?></td>
								<td><?php echo $customerPaypalBookingDetail[$flag]->PaymentStatus; ?></td>
								<td><?php echo $customerPaypalBookingDetail[$flag]->TransactionId; ?></td>
								<?php
								if($customerPaypalBookingDetail[$flag]->PaymentDate != "")
								{
									
									$dateFormat = $wpdb -> get_var('SELECT GeneralSettingsValue FROM ' . generalSettingsTable() . ' where GeneralSettingsKey = "default_Date_Format"');											
									if($dateFormat == 0)
									{
									?>
										<td><?php echo date("M d, Y", strtotime($customerPaypalBookingDetail[$flag]->PaymentDate));?></td>
										<?php
									}
									else if($dateFormat == 1)
									{
									?>
										<td><?php echo date("Y/m/d", strtotime($customerPaypalBookingDetail[$flag]->PaymentDate));?></td>
										<?php
									}	
									else if($dateFormat == 2)
									{
										?>
										<td><?php echo date("m/d/Y", strtotime($customerPaypalBookingDetail[$flag]->PaymentDate));?></td>
										<?php
									}	
									else if($dateFormat == 3)
									{
										?>
										<td><?php echo date("d/m/Y", strtotime($customerPaypalBookingDetail[$flag]->PaymentDate));?></td>
									<?php
									}
									
								}
								else 
								{
								?>
								<td></td>
								<?php
								}
								?>
								</tr>
							<?php
						}
					?>
					<input id="customerNamePayment" type="hidden" value="<?php echo $customerNameReturn->CustomerFirstName . " ". $customerNameReturn->CustomerLastName ; ?>" />
					<?php
					die();
				}			
		}
}
?>