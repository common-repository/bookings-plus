<?php
global $wpdb;
function bookingPlusSystemInstall()
{
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
 	if ($wpdb->get_var('SHOW TABLES LIKE ' . servicesTable()) != servicesTable()) 
	{
		$sql = 'CREATE TABLE ' . servicesTable() . '( 
            ServiceId INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            ServiceName VARCHAR(200) NOT NULL,
            ServiceCost DECIMAL(10, 2) NOT NULL,
			ServiceDisplayOrder INTEGER(5) NOT NULL,
			ServiceMaxBookings INTEGER(10),
			ServiceShortCode VARCHAR(50) NOT NULL,
			ServiceTotalTime INTEGER(10) NOT NULL,
			ServiceColorCode VARCHAR(10) NOT NULL,
			Type INTEGER(2) NOT NULL,
            PRIMARY KEY (ServiceId),
            KEY `idx_ServiceName` (`ServiceName`)			 
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		dbDelta($sql);
	}
	if ($wpdb->get_var('SHOW TABLES LIKE ' . employeesTable()) != employeesTable()) 
	{
		$sql = 'CREATE TABLE ' . employeesTable() . '( 
            EmployeeId INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            EmployeeName VARCHAR(200) NOT NULL,
            EmployeeEmail VARCHAR(100) NOT NULL,
			EmployeePhone VARCHAR(20) NOT NULL,
			Date DATE NOT NULL,
            PRIMARY KEY (EmployeeId),
            KEY `idx_EmployeeName` (`EmployeeName`)			 
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		dbDelta($sql);
	}
	if ($wpdb->get_var('SHOW TABLES LIKE ' . services_AllocationTable()) != services_AllocationTable()) 
	{
		$sql = 'CREATE TABLE ' . services_AllocationTable() . '( 
            AllocationId INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            EmployeeId INTEGER(10) NOT NULL,
            ServiceId INTEGER(10) NOT NULL,
            PRIMARY KEY (AllocationId)		 
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		dbDelta($sql);
	}
	if ($wpdb->get_var('SHOW TABLES LIKE ' . customersTable()) != customersTable()) 
	{
		$sql = 'CREATE TABLE ' . customersTable() . '( 
            CustomerId INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            CustomerFirstName VARCHAR(50) NOT NULL,
            CustomerLastName VARCHAR(50) NOT NULL,
            CustomerEmail VARCHAR(100) NOT NULL,
            CustomerTelephone VARCHAR(20) NOT NULL,
            CustomerMobile VARCHAR(20) NOT NULL,
            CustomerAddress1 VARCHAR(100) NOT NULL,
            CustomerAddress2 VARCHAR(100) NOT NULL,
            CustomerCity VARCHAR(50) NOT NULL,
            CustomerZipCode VARCHAR(50) NOT NULL,
            CustomerCountry INTEGER(5) NOT NULL,
            CustomerComments TEXT NOT NULL,
            DateTime DATE NOT NULL,
            PRIMARY KEY (CustomerId),
            KEY `idx_CustomerFirstName` (`CustomerFirstName`),
            KEY `idx_CustomerLastName` (`CustomerLastName`),
            KEY `idx_CustomerEmail` (`CustomerEmail`),
            KEY `idx_CustomerMobile` (`CustomerMobile`),
            KEY `idx_CustomerCity` (`CustomerCity`)							 
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		dbDelta($sql);
	}
	if ($wpdb->get_var('SHOW TABLES LIKE ' . bookingTable()) != bookingTable()) 
	{
		$sql = 'CREATE TABLE ' . bookingTable() . '( 
            BookingId INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            CustomerId INTEGER(10) NOT NULL,
            ServiceId INTEGER(10) NOT NULL,
            EmployeeId INTEGER(10) NOT NULL,
            TimeSlot INTEGER(10) NOT NULL,
            Date DATETIME NOT NULL,
            BookingStatus VARCHAR(50),
            DateofBooking DATE NOT NULL,
            Comments VARCHAR(250),
            TransactionId VARCHAR(50),
            PaymentStatus VARCHAR(20),
            PaymentDate DATETIME,
            PRIMARY KEY (BookingId)
          ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		dbDelta($sql);
	}
	if ($wpdb->get_var('SHOW TABLES LIKE ' . social_Media_settingsTable()) != social_Media_settingsTable()) 
	{
		$sql = 'CREATE TABLE ' . social_Media_settingsTable() . '( 
            SocialMediaId INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            SocialMediaKey VARCHAR(100) NOT NULL,
            SocialMediaValue VARCHAR(100) NOT NULL,
            PRIMARY KEY (SocialMediaId),
            KEY `idx_SocialMediaKey` (`SocialMediaKey`),
            KEY `idx_SocialMediaValue` (`SocialMediaValue`)
          ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		dbDelta($sql);
	}

	if ($wpdb->get_var('SHOW TABLES LIKE ' . payment_Gateway_settingsTable()) != payment_Gateway_settingsTable()) 
	{
		$sql = 'CREATE TABLE ' . payment_Gateway_settingsTable() . '( 
            PaymentGatewayId INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            PaymentGatewayKey VARCHAR(100) NOT NULL,
            PaymentGatewayValue text NOT NULL,
            PRIMARY KEY (PaymentGatewayId),
            KEY `idx_PaymentGatewayKey` (`PaymentGatewayKey`)
          ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		dbDelta($sql);
	}
	if ($wpdb->get_var('SHOW TABLES LIKE ' . auto_Responders_settingsTable()) != auto_Responders_settingsTable()) 
	{
		$sql = 'CREATE TABLE ' . auto_Responders_settingsTable() . '( 
            AutoResponderId INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            AutoResponderKey VARCHAR(100) NOT NULL,
            AutoResponderValue VARCHAR(100) NOT NULL,
            PRIMARY KEY (AutoResponderId),
            KEY `idx_AutoResponderKey` (`AutoResponderKey`),
            KEY `idx_AutoResponderValue` (`AutoResponderValue`)
          ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		dbDelta($sql);
	}
	if ($wpdb->get_var('SHOW TABLES LIKE ' . generalSettingsTable()) != generalSettingsTable()) 
	{
		$sql = 'CREATE TABLE ' . generalSettingsTable() . '( 
            GeneralSettingsId INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            GeneralSettingsKey TEXT NOT NULL,
            GeneralSettingsValue TEXT NOT NULL,
            PRIMARY KEY (GeneralSettingsId)
          ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		dbDelta($sql);
	}
	if ($wpdb->get_var('SHOW TABLES LIKE ' . employees_TimingsTable()) != employees_TimingsTable()) 
	{
		$sql = 'CREATE TABLE ' . employees_TimingsTable() . '( 
            TimingId INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            EmployeeId INTEGER(10) NOT NULL,
            Day VARCHAR(20) NOT NULL,
            StartTime int(10) NOT NULL,
            EndTime int(10) NOT NULL,
            Status int,
            PRIMARY KEY (TimingId)		 
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		dbDelta($sql);
	}
	if ($wpdb->get_var('SHOW TABLES LIKE ' . currenciesTable()) != currenciesTable()) 
	{
		$sql = 'CREATE TABLE ' . currenciesTable() . '( 
            CurrencyId INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            CurrencyName VARCHAR(50) NOT NULL,
            CurrencySymbol VARCHAR(10) NOT NULL,
            CurrencyCode VARCHAR(10) NOT NULL,
            CurrencyUsed INTEGER(1) NOT NULL,
            PRIMARY KEY (CurrencyId),
            KEY `idx_CurrencyName` (`CurrencyName`)
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		dbDelta($sql);
	}
	
 	if ($wpdb->get_var('SHOW TABLES LIKE ' . countriesTable()) != countriesTable()) 
	{
		$sql = 'CREATE TABLE ' . countriesTable() . '( 
            CountryId INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            CountryName VARCHAR(100) NOT NULL,
            CountryUsed INTEGER(1) NOT NULL,
            CountryDefault INTEGER(1) NOT NULL,
            PRIMARY KEY (CountryId),
            KEY `idx_CountryName` (`CountryName`)
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		dbDelta($sql);
	}
	if ($wpdb->get_var('SHOW TABLES LIKE ' . bookingFormTable()) != bookingFormTable()) 
	{
		$sql = 'CREATE TABLE ' . bookingFormTable() . '( 
            BookingFormId INTEGER(10) UNSIGNED AUTO_INCREMENT,
			BookingFormField VARCHAR(100),
			status INT(1),
			required INT(1),
			type VARCHAR(50),
			validation VARCHAR(15),
            PRIMARY KEY (BookingFormId)
          ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		dbDelta($sql);
	}
	if ($wpdb->get_var('SHOW TABLES LIKE ' . email_templatesTable()) != email_templatesTable()) 
	{
		$sql = 'CREATE TABLE ' . email_templatesTable() . '( 
            EmailId INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            EmailContent text NOT NULL,
            EmailSubject VARCHAR(500) NOT NULL,
            EmailType VARCHAR(100) NOT NULL,
            PRIMARY KEY (EmailId),
            KEY `idx_EmailSubject` (`EmailSubject`),
            KEY `idx_EmailType` (`EmailType`)
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		dbDelta($sql);
	}
	$wpdb->query
	(
		$wpdb->prepare
		(  
			"INSERT INTO ".social_Media_settingsTable()."(SocialMediaKey,SocialMediaValue) VALUES(%s, %s)",
			"facebook-connect-enable",
			"0"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(  
			"INSERT INTO ".social_Media_settingsTable()."(SocialMediaKey,SocialMediaValue) VALUES(%s, %s)", 
			"facebook-api-id",
			""
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(  
			"INSERT INTO ".social_Media_settingsTable()."(SocialMediaKey,SocialMediaValue) VALUES(%s, %s)",
			"facebook-secret-key",
			""
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		( 
			"INSERT INTO ".payment_Gateway_settingsTable()."(PaymentGatewayKey,PaymentGatewayValue) VALUES(%s, %s)",
			"paypal-enabled",
			"0"
	    )
	);
	$wpdb->query
	(
		$wpdb->prepare
		( 
			"INSERT INTO ".payment_Gateway_settingsTable()."(PaymentGatewayKey,PaymentGatewayValue) VALUES(%s, %s)", 
			"paypal-merchant-email-address",
			""
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		( 
			"INSERT INTO ".payment_Gateway_settingsTable()."(PaymentGatewayKey,PaymentGatewayValue) VALUES(%s, %s)",
			"paypal-thankyou-page-url",
			""
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		( 
			"INSERT INTO ".payment_Gateway_settingsTable()."(PaymentGatewayKey,PaymentGatewayValue) VALUES(%s, %s)", 
			"paypal-ipn-url",
			""
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		( 
			"INSERT INTO ".payment_Gateway_settingsTable()."(PaymentGatewayKey,PaymentGatewayValue) VALUES(%s, %s)", 
			"paypal-payment-image-url",
			""
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		( 
			"INSERT INTO ".payment_Gateway_settingsTable()."(PaymentGatewayKey,PaymentGatewayValue) VALUES(%s, %s)",  
			"paypal-payment-cancellation-Url",
			""
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		( 
			"INSERT INTO ".payment_Gateway_settingsTable()."(PaymentGatewayKey,PaymentGatewayValue) VALUES(%s, %s)",  
			"paypal-Test-Url",
			"https://paypal.com/cgi-bin/webscr"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		( 
			"INSERT INTO ".auto_Responders_settingsTable()."(AutoResponderKey,AutoResponderValue) VALUES(%s, %s)", 
			"mail-chimp-enabled",
			"0"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		( 
			"INSERT INTO ".auto_Responders_settingsTable()."(AutoResponderKey,AutoResponderValue) VALUES(%s, %s)",
			"mail-chimp-api-key",
			""
	    )
	);
	$wpdb->query
	(
		$wpdb->prepare
		( 
			"INSERT INTO ".auto_Responders_settingsTable()."(AutoResponderKey,AutoResponderValue) VALUES(%s, %s)",
			"mail-chimp-unique-id",
			""
	    )
	);
    $wpdb->query
	(
		$wpdb->prepare
		( 
			"INSERT INTO ".auto_Responders_settingsTable()."(AutoResponderKey,AutoResponderValue) VALUES(%s, %s)", 
			"mail-double-optin-id",
			""
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		( 
			"INSERT INTO ".auto_Responders_settingsTable()."(AutoResponderKey,AutoResponderValue) VALUES(%s, %s)",
			"mail-welcome-email",
 	       	""
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		( 
			"INSERT INTO ".generalSettingsTable()."(GeneralSettingsKey,GeneralSettingsValue) VALUES(%s, %s)",
			"resources-visible-enable",
 	       	"0"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ".generalSettingsTable()."(GeneralSettingsKey,GeneralSettingsValue) VALUES(%s, %s)",
			"default_Time_Format",
			"0"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ".generalSettingsTable()."(GeneralSettingsKey,GeneralSettingsValue) VALUES(%s, %s)", 
			"booking_image",
			"bookNow.jpg"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ".generalSettingsTable()."(GeneralSettingsKey,GeneralSettingsValue) VALUES(%s, %s)", 
			"default_Slot_Total_Time_Format",
			"30"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ".generalSettingsTable()."(GeneralSettingsKey,GeneralSettingsValue) VALUES(%s, %s)", 
			"default_Date_Format",
			"0"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ".generalSettingsTable()."(GeneralSettingsKey,GeneralSettingsValue) VALUES(%s, %s)", 
			"default_Time_Zone",
			"-5.0"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ".generalSettingsTable()."(GeneralSettingsKey,GeneralSettingsValue) VALUES(%s, %s)", 
			"default_Time_Zone_Name",
			"(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima"
		)
	);	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ".generalSettingsTable()."(GeneralSettingsKey,GeneralSettingsValue) VALUES(%s, %s)", 
			"auto-approve-enable",
			"0"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ".generalSettingsTable()."(GeneralSettingsKey,GeneralSettingsValue) VALUES(%s, %s)", 
			"booking-ThankYou-message",
			"Thank you for requesting an appointment with us.<br>You will shortly receive an email acknowledging your request  and a member of staff will later contact you to confirm your<br>appointment has been booked.<br>(Please ensure to check your Spam / Junk folders as sometimes emails are caught there).<br><br>Thank you for using our online booking service.<br>The Support Team"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ".generalSettingsTable()."(GeneralSettingsKey,GeneralSettingsValue) VALUES(%s, %s)", 
			"booking-Footer-message",
			"booking Footer message Here"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ".generalSettingsTable()."(GeneralSettingsKey,GeneralSettingsValue) VALUES(%s, %s)", 
			"booking-header-message",
			"booking Header message Here"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ".generalSettingsTable()."(GeneralSettingsKey,GeneralSettingsValue) VALUES(%s, %s)", 
			"reminder-settings",
			"0"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ".generalSettingsTable()."(GeneralSettingsKey,GeneralSettingsValue) VALUES(%s, %s)", 
			"reminder-settings-interval",
			""
		)
	);	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Afganisthan",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Akrotiri",
		    "0",
		    "0"		  
		) 
	);
	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Aland Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Albania",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Algeria",
		     0,
		     0		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "American Samoa",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Andorra",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Angola",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Anguilla",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Antarctica",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Antigua and Barbuda",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Argentina",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
		 	"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Armenia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Aruba",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Ashmore and Cartier Islands",
		    "0",
		    "0"		  
		) 
	);
	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Australia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Austria",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Azerbaijan",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Bahamas, The",
		    "0",
		    "0"		  
		) 
	);
	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Bahamas",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Bahrain",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Bangladesh",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Barbados",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Bassas da India",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Belarus",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Belgium",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Belize",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Benin",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Bermuda",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Bhutan",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Bolivia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Bosnia and Herzegovina",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Botswana",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Bouvet Island",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Brazil",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "British Indian Ocean territory",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "British Virgin Islands",
		    "0",
		    "0"		  
		) 
	);
	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Brunei",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Bulgaria",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Burkina Faso",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Burma",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Burundi",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Cambodia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Cameroon",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Canada",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Cape Verde",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Cayman Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Central African Republic",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Chad",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Chile",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "China",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Christmas Island",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Clipperton Island",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Cocos (Keeling) Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Colombia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Comoros",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Congo, Democratic Republic of the",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Congo, Republic of the",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Congo",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Democratic Republic",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Cook Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Coral Sea Islands",
		    "0",
		    "0"		  
		) 
	);
	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Costa Rica",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Cote d'Ivoire",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Côte d Ivoire (Ivory Coast)",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Croatia (Hrvatska)",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Cuba",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Cyprus",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Czech Republic",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Denmark",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Dhekelia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Djibouti",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Dominica",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Dominican Republic",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "East Timor",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Ecuador",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Egypt",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "El Salvador",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Equatorial Guinea",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Eritrea",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Estonia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Ethiopia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Europa Island",
		    "0",
		    "0"		  
		) 
	);
	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Falkland Islands (Islas Malvinas)",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(     
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Faroe Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Fiji",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Finland",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "France",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "French Guiana",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "French Polynesia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "French Southern and Antarctic Lands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "French Southern Territories",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Gabon",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Gambia, The",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Gaza Strip",
		    "0",
		    "0"		  
		) 
	);
	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Gambia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Georgia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Germany",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Ghana",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Gibraltar",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Glorioso Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Greece",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Greenland",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Grenada",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Guadeloupe",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Guam",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Guatemala",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Guernsey",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Guinea",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Guinea-Bissau",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Guyana",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Haiti",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Heard Island and McDonald Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Holy See (Vatican City)",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Heard and McDonald Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Honduras",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Hong Kong",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Hungary",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Iceland",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "India",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Indonesia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Iran",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Iraq",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Ireland",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Isle of Man",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Israel",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Italy",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Jamaica",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Japan",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Jersey",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Jordan",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Juan de Nova Island",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Kazakhstan",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Kenya",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Kiribati",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Korea, North",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Korea, South",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Kuwait",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Kyrgyzstan",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Laos",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Lao Peoples Democratic Republic",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Latvia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Lebanon",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Lesotho",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Liberia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Libya",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Liechtenstein",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Lithuania",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Luxembourg",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Macau",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Macedonia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Madagascar",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Malawi",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Malaysia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Maldives",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Mali",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Malta",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Marshall Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Martinique",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Mauritania",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Mauritius",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Mayotte",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Mexico",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Micronesia, Federated States of",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Micronesia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Moldova",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Monaco",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Mongolia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Montserrat",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Morocco",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Mozambique",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Myanmar",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Namibia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Nauru",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Navassa Island",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Nepal",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Netherlands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Netherlands Antilles",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "New Caledonia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "New Zealand",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Nicaragua",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Niger",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Nigeria",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Niue",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Norfolk Island",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Northern Mariana Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Norway",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Oman",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Pakistan",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Palau",
		    "0",
		    "0"		  
		) 
			
			
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Palestinian Territories",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Panama",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Papua New Guinea",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Paracel Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Paraguay",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Peru",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Philippines",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Pitcairn Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Pitcairn",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Poland",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Portugal",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Puerto Rico",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Qatar",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Reunion",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Réunion",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Romania",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Russian Federation",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Rwanda",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Saint Helena",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Saint Kitts and Nevis",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Saint Lucia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Saint Pierre and Miquelon",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Saint Vincent and the Grenadines",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Samoa",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "San Marino",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Sao Tome and Principe",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Saudi Arabia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Senegal",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Serbia and Montenegro",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Seychelles",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Sierra Leone",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Singapore",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Slovakia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Slovenia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Solomon Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Somalia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "South Africa",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "South Georgia and the South Sandwich Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Spain",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Spratly Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Sri Lanka",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Sudan",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Suriname",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Svalbard and Jan Mayen Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Swaziland",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Sweden",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Switzerland",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Syria",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Taiwan",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Tajikistan",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Tanzania",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Thailand",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Timor-Leste",
		    "0",
		    "0"		  
		) 
	);
    $wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Togo",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Tokelau",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Tonga",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Trinidad and Tobago",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Tromelin Island",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Tunisia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Turkey",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Turkmenistan",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Turks and Caicos Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Tuvalu",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Uganda",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Ukraine",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "United Arab Emirates",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "United Kingdom",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "United States of America",
		    "1",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Uruguay",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Uzbekistan",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Vanuatu",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Vatican City",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Venezuela",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Vietnam",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Virgin Islands (British)",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Virgin Islands (US)",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Wake Island",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Wallis and Futuna Islands",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "West Bank",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Western Sahara",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Yemen",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Zaire",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Zambia",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". countriesTable() ."(CountryName,CountryUsed,CountryDefault)VALUES(%s, %d, %d)",
		    "Zimbabwe",
		    "0",
		    "0"		  
		) 
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Albania Lek",
			"0",
			"Lek",
			"ALL"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Afghanistan Afghani",
			"0",
			"؋",
			"AFN"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Argentina Peso",
			"0",
			"$",
			"ARS"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Aruba Guilder",
			"0",
			"ƒ",
			"AWG"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Australia Dollar",
			"0",
			"$",
			"AUD"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Azerbaijan New Manat",
			"0",
			"ман",
			"AZN"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Bahamas Dollar",
			"0",
			"$",
			"BSD"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Barbados Dollar",
			"0",
			"$",
			"BBD"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Belarus Ruble",
			"0",
			"p.",
			"BYR"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Belize Dollar",
			"0",
			"BZ$",
			"BZD"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Bermuda Dollar",
			"0",
			"$",
			"BMD"
		)
	);
    
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Bosnia and Herzegovina Convertible Marka",
			"0",
			"KM",
			"BAM"
		)
	);	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Botswana Pula",
			"0",
			"P",
			"BWP"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Bulgaria Lev",
			"0",
			"лв",
			"BGN"
		)
	);	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Brazil Real",
			"0",
			"R$",
			"BRL"
			
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Brunei Darussalam Dollar",
			"0",
			"$",
			"BND"
			
		)
	);
	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Canada Dollar",
			"0",
			"$",
			"CAD"
		)
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Cayman Islands Dollar",
			"0",
			"$",
			"KYD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Chile Peso",
			"0",
			"$",
			"CLP"
         )
	);
	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"China Yuan Renminbi",
			"0",
			"¥",
			"CNY"
         )
	);	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Colombia Peso",
			"0",
			"$",
			"COP"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Costa Rica Colon",
			"0",
			"₡",
			"CRC"
         )
	);
	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Croatia Kuna ",
			"0",
			"kn",
			"HRK"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Cuba Peso",
			"0",
			"₱",
			"CUP"
         )
	);
	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Czech Republic Koruna",
			"0",
			"Kč",
			"CZK"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Denmark Krone",
			"0",
			"kr",
			"DKK"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Dominican Republic Peso",
			"0",
			"RD$",
			"DOP"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"East Caribbean Dollar",
			"0",
			"$",
			"XCD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Egypt Pound",
			"0",
			"£",
			"EGP"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"El Salvador Colon",
			"0",
			"$",
			"SVC"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Estonia Kroon",
			"0",
			"kr",
			"EEK"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Euro Member Countries",
			"0",
			"€",
			"EUR"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Falkland Islands (Malvinas) Pound",
			"0",
			"£",
			"FKP"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Fiji Dollar",
			"0",
			"$",
			"FJD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Ghana Cedis",
			"0",
			"¢",
			"GHC"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Gibraltar Pound",
			"0",
			"£",
			"GIP"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Guatemala Quetzal",
			"0",
			"Q",
			"GTQ"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Guernsey Pound",
			"0",
			"£",
			"GGP"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Guyana Dollar",
			"0",
			"$",
			"GYD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Honduras Lempira",
			"0",
			"L",
			"HNL"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Hong Kong Dollar",
			"0",
			"$",
			"HKD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Hungary Forint",
			"0",
			"Ft",
			"HUF"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Iceland Krona",
			"0",
			"kr",
			"ISK"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"India Rupee",
			"0",
			"Rs",
			"INR"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Indonesia Rupiah",
			"0",
			"Rp",
			"IDR"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Iran Rial",
			"0",
			"﷼",
			"IRR"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Isle of Man Pound",
			"0",
			"£",
			"IMP"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Israel Shekel",
			"0",
			"₪",
			"ILS"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Jamaica Dollar",
			"0",
			"J$",
			"JMD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Japan Yen",
			"0",
			"¥",
			"JPY"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Jersey Pound",
			"0",
			"£",
			"JEP"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Kazakhstan Tenge",
			"0",
			"лв",
			"KZT"
         )
	);
	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Kyrgyzstan Som",
			"0",
			"лв",
			"KGS"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Laos Kip",
			"0",
			"₭",
			"LAK"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Latvia Lat",
			"0",
			"Ls",
			"LVL"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Lebanon Pound",
			"0",
			"£",
			"LBP"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Liberia Dollar",
			"0",
			"$",
			"LRD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Lithuania Litas",
			"0",
			"Lt",
			"LTL"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Macedonia Denar",
			"0",
			"ден",
			"MKD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Malaysia Ringgit",
			"0",
			"RM",
			"MYR"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Mauritius Rupee",
			"0",
			"₨",
			"MUR"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Mexico Peso",
			"0",
			"$",
			"MXN"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Mongolia Tughrik",
			"0",
			"₮",
			"MNT"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Mozambique Metical",
			"0",
			"MT",
			"MZN"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Namibia Dollar",
			"0",
			"$",
			"NAD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Nepal Rupee",
			"0",
			"₨",
			"NPR"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Netherlands Antilles Guilder",
			"0",
			"ƒ",
			"ANG"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"New Zealand Dollar",
			"0",
			"$",
			"NZD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Nicaragua Cordoba",
			"0",
			"C$",
			"NIO"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Nigeria Naira",
			"0",
			"₦",
			"NGN"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Korea (North) Won",
			"0",
			"₩",
			"KPW"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Norway Krone",
			"0",
			"kr",
			"NOK"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Oman Rial",
			"0",
			"﷼",
			"OMR"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Pakistan Rupee",
			"0",
			"₨",
			"PKR"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Panama Balboa",
			"0",
			"B/.",
			"PAB"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Paraguay Guarani",
			"0",
			"Gs",
			"PYG"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Peru Nuevo Sol",
			"0",
			"S/.",
			"PEN"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Philippines Peso",
			"0",
			"₱",
			"PHP"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Poland Zloty",
			"0",
			"zł",
			"PLN"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Qatar Riyal",
			"0",
			"﷼",
			"QAR"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Romania New Leu",
			"0",
			"lei",
			"RON"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Russia Ruble",
			"0",
			"руб",
			"RUB"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Saint Helena Pound",
			"0",
			"£",
			"SHP"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Saudi Arabia Riyal",
			"0",
			"﷼",
			"SAR"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Serbia Dinar",
			"0",
			"Дин.",
			"RSD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Seychelles Rupee",
			"0",
			"₨",
			"SCR"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Singapore Dollar",
			"0",
			"$",
			"SGD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Solomon Islands Dollar",
			"0",
			"$",
			"SBD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Somalia Shilling",
			"0",
			"S",
			"SOS"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"South Africa Rand",
			"0",
			"R",
			"ZAR"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Korea (South) Won",
			"0",
			"₩",
			"KRW"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Sri Lanka Rupee",
			"0",
			"₨",
			"LKR"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Sweden Krona",
			"0",
			"kr",
			"SEK"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Switzerland Franc",
			"0",
			"CHF",
			"CHF"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Suriname Dollar",
			"0",
			"$",
			"SRD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Syria Pound",
			"0",
			"£",
			"SYP"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Taiwan New Dollar",
			"0",
			"NT$",
			"TWD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Thailand Baht",
			"0",
			"฿",
			"THB"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Trinidad and Tobago Dollar",
			"0",
			"TT$",
			"TTD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Turkey Lira",
			"0",
			"₤",
			"TRL"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Tuvalu Dollar",
			"0",
			"$",
			"TVD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Ukraine Hryvna",
			"0",
			"₴",
			"UAH"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"United Kingdom Pound",
			"0",
			"£",
			"GBP"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"United States Dollar",
			"1",
			"$",
			"USD"
         )
	);
	
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Uzbekistan Som",
			"0",
			"лв",
			"UZS"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Venezuela Bolivar",
			"0",
			"Bs",
			"VEF"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Viet Nam Dong",
			"0",
			"₫",
			"VND"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Yemen Rial",
			"0",
			"﷼",
			"YER"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ". currenciesTable() ."(CurrencyName,CurrencyUsed,CurrencySymbol,CurrencyCode) VALUES(%s, %d, %s, %s)",
			"Zimbabwe Dollar",
			"0",
			"Z$",
			"ZWD"
         )
	);
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ".employees_TimingsTable()."(EmployeeId,Day,StartTime,EndTime,Status) VALUES( %d, %s, %d, %d, %d)",
		     "0",
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
		    "0",
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
		    "0",
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
		     "0",
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
		    "0",
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
		    "0",
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
		    "0",
		    "Sun",
		    "540",
		    "1020",
		    "0"
		)
	);
	$wpdb->query
	(      
		$wpdb->prepare
		(
		      "INSERT INTO ".bookingFormTable(). "(BookingFormField,status,required,type,validation)VALUES(%s, %d, %d, %s, %s)",
		      "Email :",
		      "1",
		      "1",
		      "textbox",
		      "email"
		)
	);
	$wpdb->query
	(      
		$wpdb->prepare
		(
		       "INSERT INTO ".bookingFormTable(). "(BookingFormField,status,required,type,validation)VALUES(%s, %d, %d, %s, %s)",
		       "First Name :",
		       "1",
		       "1",
		       "textbox",
		        ""
		 )
	);
	$wpdb->query
	(      
		$wpdb->prepare
		(
		     "INSERT INTO ".bookingFormTable(). "(BookingFormField,status,required,type,validation)VALUES(%s, %d, %d, %s, %s)",
		     "Last Name :",
		     "0",
		     "0",
		     "textbox",
		     ""
		)
	);
			$wpdb->query
			(      
			      $wpdb->prepare
			      (
		                "INSERT INTO ".bookingFormTable(). "(BookingFormField,status,required,type,validation)VALUES(%s, %d, %d, %s, %s)",
		                "Mobile :",
		                "0",
		                "0",
		                "textbox",
		                ""
		          )
			);
			$wpdb->query
			(      
			      $wpdb->prepare
			      (
		               "INSERT INTO ".bookingFormTable(). "(BookingFormField,status,required,type,validation)VALUES(%s, %d, %d, %s, %s)",
		                "Phone :",
		                "0",
		                "0",
		                "textbox",
		                ""
		          )
			);
			$wpdb->query
			(      
			      $wpdb->prepare
			      (
		               "INSERT INTO ".bookingFormTable(). "(BookingFormField,status,required,type,validation)VALUES(%s, %d, %d, %s, %s)",
		                "Skype Id :",
		                "0",
		                "0",
		                "textbox",
		                ""
		          )
			);
			$wpdb->query
			(      
			      $wpdb->prepare
			      (
		               "INSERT INTO ".bookingFormTable(). "(BookingFormField,status,required,type,validation)VALUES(%s, %d, %d, %s, %s)",
		                "Notes :",
		                "0",
		                "0",
		                "textarea",
		                ""
		          )
			);
			$wpdb->query
			(      
			      $wpdb->prepare
			      (
		               "INSERT INTO ".bookingFormTable(). "(BookingFormField,status,required,type,validation)VALUES(%s, %d, %d, %s, %s)",
		                "Coupon Code :",
		                "0",
		                "0",
		                "textbox",
		                ""
		          )
			);
			$wpdb->query
			(      
			      $wpdb->prepare
			      (
		               "INSERT INTO ".bookingFormTable(). "(BookingFormField,status,required,type,validation)VALUES(%s, %d, %d, %s, %s)",
		                "Address Line 1 :",
		                "0",
		                "0",
		                "textbox",
		                ""
		          )
			);
			$wpdb->query
			(      
			      $wpdb->prepare
			      (
		              	"INSERT INTO ".bookingFormTable(). "(BookingFormField,status,required,type,validation)VALUES(%s, %d, %d, %s, %s)",
		                "Address Line 2 :",
		                "0",
		                "0",
		                "textbox",
		                ""
		          )
			);
			$wpdb->query
			(      
			      $wpdb->prepare
			      (
		                "INSERT INTO ".bookingFormTable(). "(BookingFormField,status,required,type,validation)VALUES(%s, %d, %d, %s, %s)",
		                "City :",
		                "0",
		                "0",
		                "textbox",
		                ""
		          )
			);
			$wpdb->query
			(      
			      $wpdb->prepare
			      (
		                "INSERT INTO ".bookingFormTable(). "(BookingFormField,status,required,type,validation)VALUES(%s, %d, %d, %s, %s)",
		                "Post Code :",
		                "0",
		                "0",
		                "textbox",
		                ""
		         )
			);
			$wpdb->query
			(      
			      $wpdb->prepare
			      (
		                "INSERT INTO ".bookingFormTable(). "(BookingFormField,status,required,type,validation)VALUES(%s, %d, %d, %s, %s)",
		                "Country :",
		                "0",
		                "0",
		                "dropdown",
		                ""
		          )
			);
			$url = plugins_url('', __FILE__);
	$url1 = site_url();
	$wpdb->insert(email_templatesTable(), array('EmailType' => "booking-pending-confirmation", 'EmailContent' => "<style type=\"text/css\">body {margin:0;padding:0;background-color:#eeeeee;color:#777777;font-family:Arial, Helvetica, sans-serif;font-size:12px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;}h1, h2 {color:#3b5167;margin-bottom:10px !important;}a, a:link, a:visited {color:#82ad0f;text-decoration:none;}a:hover, a:active {text-decoration:none;color:#6d8c1b !important;}p {margin:0 0 14px 0;}img {border:0;}table td {border-collapse:collapse;}.highlighted {background-color:#ffe69e;color:#3b5167;padding:2px 4px;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px;}.ReadMsgBody {width: 100%;}.ExternalClass {width: 100%;}.yshortcuts {color: #82ad0f;}.yshortcuts a span {color: #82ad0f; border-bottom: none !important; background: none !important;}</style><table id=\"pageContainer\" style=\"border-collapse: collapse; background-repeat: repeat; background-color: #eeeeee;\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><tbody><tr><td style=\"padding: 30px 20px 40px 20px;\"><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #777777;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><tbody><tr><td style=\"font-size: 2px; line-height: 0px;\" colspan=\"2\" bgcolor=\"#82ad0f\" height=\"7\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"600\" height=\"7\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr><tr><td style=\"padding: 40px 30px 35px 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 100%; color: #82ad0f;\" valign=\"middle\" bgcolor=\"#ffffff\" width=\"255\"><img style=\"display: block;\" alt=\"Logo\" src=\"$url/images/logo.png\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td style=\"padding: 20px 30px 15px 0; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 100%; color: #777777; text-align: right;\" valign=\"middle\" bgcolor=\"#ffffff\" width=\"255\"><table style=\"border-collapse: collapse; text-align: center; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 100%; color: #777777;\" width=\"254\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\"><tbody><tr><td style=\"line-height: 100%; color: #82ad0f;\" valign=\"top\" width=\"66\"></td><td style=\"padding: 0 10px; line-height: 100%; text-align: center;\" width=\"20\"></td><td style=\"line-height: 100%;\" valign=\"top\" width=\"54\"></td>
			<td style=\"padding: 0 10px; line-height: 100%; text-align: center;\" width=\"20\"></td><td style=\"line-height: 100%;\" valign=\"top\" width=\"54\"><a style=\"text-decoration: none; color: #82ad0f; display: block; line-height: 100%;\" target=\"_blank\" href=\"$url1\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/websiteIcon.png\" width=\"32\" height=\"32\" border=\"0\" hspace=\"11\" vspace=\"0\" /> Website</a></td></tr></tbody></table></td></tr><tr><td style=\"font-size: 2px; line-height: 0px;\" colspan=\"2\" height=\"11\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/divider.png\" width=\"600\" height=\"11\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #777777;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#ffffff\"><tbody><tr><td style=\"padding-right: 30px; padding-left: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #777777;\"><p style=\"font-family: 'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 36px; line-height: 30pt; color: #3b5167; font-weight: 300; margin-top: 0; margin-bottom: 0px !important; padding: 0; text-indent: -3px;\">Pending Confirmation.</p><p style=\"font-family: 'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 20px; line-height: 30pt; color: #3b5167; font-weight: 300; margin-top: 0; margin-bottom: 20px !important; padding: 0; text-indent: -3px;\">Thank you for your booking request!</p><p><strong>As soon as your booking will be approved we will notify you by email.</strong><br/><br/>Your Booking Details are as follows:<br/><br/>Service By: <strong>[employee_name]</strong><br/>For: <strong>[service_name]</strong><br/>At: <strong>[companyName]</strong>
			On:<strong>[booked_date] [booked_time]</strong></p><br/>
			<p><strong>[Transaction Id:] [transaction_id]</strong></p>
			<p><strong>[Payment Date:] [payment_date]</strong></p>
			<p><strong>[Payment Status:] [payment_status]</strong></p>
			
			</td></tr><tr><td style=\"padding-right: 30px; padding-bottom: 30px; padding-left: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #777777;\">Best Regards,<br/><br/>[employee_name]<br/><strong>[companyName]</strong></p></td></tr><tr>
			<td style=\"font-size: 2px; line-height: 0px;\" height=\"11\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/divider.png\" width=\"600\" height=\"11\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table><!-- End of content with author bio -->
			<!-- Start of footer --><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #cccccc;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#444444\"><tbody><tr><td><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #cccccc;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\"><tbody><tr><td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td style=\"padding-top: 30px; padding-bottom: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #cccccc;\" valign=\"top\" width=\"160\">Copyright <img style=\"vertical-align: -1px;\" alt=\"©\" src=\"$url/images/copyright.png\" width=\"11\" height=\"12\" border=\"0\" /> 2013 <a style=\"text-decoration: underline; color: #82ad0f;\" href=\"http://bookings-plus.com\">Bookings-Plus.com</a> all rights reserved.13 Park Steakhouse, New Jersey, USA</td><td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td style=\"padding-top: 34px; padding-bottom: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #cccccc;\" valign=\"top\" width=\"160\"><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 100%; color: #cccccc;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tbody><tr><td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/homeIcon.png\" width=\"13\" height=\"12\" align=\"left\" border=\"0\" /></td><td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\"><a style=\"text-decoration: underline; color: #82ad0f; line-height: 9pt;\" href=\"#\">www.bookings-plus.com</a></td></tr><tr><td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/emailIcon.png\" width=\"12\" height=\"12\" align=\"left\" border=\"0\" /></td><td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\"><a style=\"text-decoration: underline; color: #82ad0f; line-height: 9pt;\" href=\"mailto:\">info@bookings-plus.com</a></td></tr><tr><td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/phoneIcon.png\" width=\"11\" height=\"12\" align=\"left\" border=\"0\" /></td><td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\">+1- 888 4110 572</td></tr></tbody></table>
			</td><td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table></td></tr><tr><td style=\"font-size: 2px; line-height: 0px;\" bgcolor=\"#82ad0f\" height=\"7\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"600\" height=\"7\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table>
			<!-- End of footer --></td></tr></tbody></table>", 'EmailSubject' => "Your Booking is Pending Approval"));
    
	$wpdb->insert(email_templatesTable(), array('EmailType' => "booking-confirmation", 'EmailContent' => "<style type=\"text/css\">body {margin:0;padding:0;background-color:#eeeeee;color:#777777;font-family:Arial, Helvetica, sans-serif;font-size:12px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;}h1, h2 {color:#3b5167;margin-bottom:10px !important;}a, a:link, a:visited {color:#82ad0f;text-decoration:none;}a:hover, a:active {text-decoration:none;color:#6d8c1b !important;}p {margin:0 0 14px 0;}img {border:0;}table td {border-collapse:collapse;}.highlighted {background-color:#ffe69e;color:#3b5167;padding:2px 4px;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px;}.ReadMsgBody {width: 100%;}.ExternalClass {width: 100%;}.yshortcuts {color: #82ad0f;}.yshortcuts a span {color: #82ad0f; border-bottom: none !important; background: none !important;}</style>
			<table id=\"pageContainer\" style=\"border-collapse: collapse; background-repeat: repeat; background-color: #eeeeee;\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><tbody><tr><td style=\"padding: 30px 20px 40px 20px;\"><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #777777;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><tbody><tr><td style=\"font-size: 2px; line-height: 0px;\" colspan=\"2\" bgcolor=\"#82ad0f\" height=\"7\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"600\" height=\"7\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr><tr><td style=\"padding: 40px 30px 35px 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 100%; color: #82ad0f;\" valign=\"middle\" bgcolor=\"#ffffff\" width=\"255\"><img style=\"display: block;\" alt=\"Logo\" src=\"$url/images/logo.png\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td style=\"padding: 20px 30px 15px 0; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 100%; color: #777777; text-align: right;\" valign=\"middle\" bgcolor=\"#ffffff\" width=\"255\"><table style=\"border-collapse: collapse; text-align: center; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 100%; color: #777777;\" width=\"254\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\"><tbody><tr><td style=\"line-height: 100%; color: #82ad0f;\" valign=\"top\" width=\"66\"></td><td style=\"padding: 0 10px; line-height: 100%; text-align: center;\" width=\"20\"></td><td style=\"line-height: 100%;\" valign=\"top\" width=\"54\"></td><td style=\"padding: 0 10px; line-height: 100%; text-align: center;\" width=\"20\"></td><td style=\"line-height: 100%;\" valign=\"top\" width=\"54\"><a style=\"text-decoration: none; color: #82ad0f; display: block; line-height: 100%;\" target=\"_blank\" href=\"$url1\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/websiteIcon.png\" width=\"32\" height=\"32\" border=\"0\" hspace=\"11\" vspace=\"0\" /> Website</a></td></tr></tbody></table></td></tr><tr><td style=\"font-size: 2px; line-height: 0px;\" colspan=\"2\" height=\"11\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/divider.png\" width=\"600\" height=\"11\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table>
			<table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #777777;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#ffffff\"><tbody><tr><td style=\"padding-top: 30px; padding-right: 30px; padding-left: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 100%; color: #aaaaaa;\"><img style=\"vertical-align: -1px;\" alt=\"\" src=\"$url/images/dateIcon.png\" width=\"12\" height=\"14\" border=\"0\" hspace=\"0\" vspace=\"0\" />&nbsp;&nbsp;[date]</td></tr><tr><td style=\"padding-right: 30px; padding-left: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #777777;\"><p style=\"font-family: 'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 36px; line-height: 30pt; color: #3b5167; font-weight: 300; margin-top: 0; margin-bottom: 20px !important; padding: 0; text-indent: -3px;\">Booking has been Confirmed!</p></td></tr><tr><td style=\"padding-right: 30px; padding-bottom: 30px; padding-left: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #777777;\">Hi [client_name],<p>Your Booking for [service_name] on [booked_date] at [booked_time] is now <strong>CONFIRMED!</strong></p><p>I look forward to seeing you, please ensure to be 5 minutes early for your appointment.</p><p><span style=\"color: red;\">**Cancellation Policy: Booking must be cancelled at least 48 hours prior to your appointment.</span>
			<p><strong>[Transaction Id:] [transaction_id]</strong></p>
			<p><strong>[Payment Date:] [payment_date]</strong></p>
			<p><strong>[Payment Status:] [payment_status]</strong></p>
			
			
			</p><p>Best Regards,<br/><br/>[employee_name]<br/><strong>[companyName]</strong></p></td></tr><tr><td style=\"font-size: 2px; line-height: 0px;\" height=\"11\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/divider.png\" width=\"600\" height=\"11\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table><!-- End of content with author bio -->
			<!-- Start of footer --><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #cccccc;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#444444\"><tbody><tr><td><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #cccccc;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\"><tbody><tr><td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td style=\"padding-top: 30px; padding-bottom: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #cccccc;\" valign=\"top\" width=\"160\">Copyright <img style=\"vertical-align: -1px;\" alt=\"©\" src=\"$url/images/copyright.png\" width=\"11\" height=\"12\" border=\"0\" /> 2013 <a style=\"text-decoration: underline; color: #82ad0f;\" href=\"http://bookings-plus.com\">Bookings-Plus.com</a> all rights reserved.13 Park Steakhouse, New Jersey, USA</td><td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td style=\"padding-top: 34px; padding-bottom: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #cccccc;\" valign=\"top\" width=\"160\"><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 100%; color: #cccccc;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tbody><tr><td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/homeIcon.png\" width=\"13\" height=\"12\" align=\"left\" border=\"0\" /></td><td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\"><a style=\"text-decoration: underline; color: #82ad0f; line-height: 9pt;\" href=\"#\">www.bookings-plus.com</a></td></tr><tr><td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/emailIcon.png\" width=\"12\" height=\"12\" align=\"left\" border=\"0\" /></td><td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\"><a style=\"text-decoration: underline; color: #82ad0f; line-height: 9pt;\" href=\"mailto:\">info@bookings-plus.com</a></td></tr><tr><td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/phoneIcon.png\" width=\"11\" height=\"12\" align=\"left\" border=\"0\" /></td><td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\">+1- 888 4110 572</td></tr></tbody></table></td>
			<td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table></td></tr><tr><td style=\"font-size: 2px; line-height: 0px;\" bgcolor=\"#82ad0f\" height=\"7\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"600\" height=\"7\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table><!-- End of footer --></td></tr></tbody></table>", 'EmailSubject' => "Your Booking has been Confirmed"));
                 
	$wpdb->insert(email_templatesTable(), array('EmailType' => "admin-control", 'EmailContent' => "<style type=\"text/css\">body {margin:0;padding:0;background-color:#eeeeee;color:#777777;font-family:Arial, Helvetica, sans-serif;font-size:12px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;}h1, h2 {color:#3b5167;margin-bottom:10px !important;}a, a:link, a:visited {color:#82ad0f;text-decoration:none;}a:hover, a:active {text-decoration:none;color:#6d8c1b !important;}p {margin:0 0 14px 0;}img {border:0;}table td {border-collapse:collapse;}.highlighted {background-color:#ffe69e;color:#3b5167;padding:2px 4px;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px;}.ReadMsgBody {width: 100%;}.ExternalClass {width: 100%;}.yshortcuts {color: #82ad0f;}.yshortcuts a span {color: #82ad0f; border-bottom: none !important; background: none !important;}</style>
			<table id=\"pageContainer\" style=\"border-collapse: collapse; background-repeat: repeat; background-color: #eeeeee;\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><tbody><tr><td style=\"padding: 30px 20px 40px 20px;\"><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #777777;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><tbody><tr><td style=\"font-size: 2px; line-height: 0px;\" colspan=\"2\" bgcolor=\"#82ad0f\" height=\"7\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"600\" height=\"7\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr><tr><td style=\"padding: 40px 30px 35px 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 100%; color: #82ad0f;\" valign=\"middle\" bgcolor=\"#ffffff\" width=\"255\"><img style=\"display: block;\" alt=\"Logo\" src=\"$url/images/logo.png\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td style=\"padding: 20px 30px 15px 0; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 100%; color: #777777; text-align: right;\" valign=\"middle\" bgcolor=\"#ffffff\" width=\"255\"><table style=\"border-collapse: collapse; text-align: center; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 100%; color: #777777;\" width=\"254\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\"><tbody><tr><td style=\"line-height: 100%; color: #82ad0f;\" valign=\"top\" width=\"66\"></td><td style=\"padding: 0 10px; line-height: 100%; text-align: center;\" width=\"20\"></td><td style=\"line-height: 100%;\" valign=\"top\" width=\"54\"></td><td style=\"padding: 0 10px; line-height: 100%; text-align: center;\" width=\"20\"></td><td style=\"line-height: 100%;\" valign=\"top\" width=\"54\"><a style=\"text-decoration: none; color: #82ad0f; display: block; line-height: 100%;\" href=\"#\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/websiteIcon.png\" width=\"32\" height=\"32\" border=\"0\" hspace=\"11\" vspace=\"0\" /> Website</a></td></tr></tbody></table></td></tr><tr><td style=\"font-size: 2px; line-height: 0px;\" colspan=\"2\" height=\"11\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/divider.png\" width=\"600\" height=\"11\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table>
			<table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #777777;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#ffffff\"><tbody><tr><td style=\"padding-right: 30px; padding-left: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #777777;\"><p style=\"font-family: 'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 36px; line-height: 30pt; color: #3b5167; font-weight: 300; margin-top: 0; margin-bottom: 20px !important; padding: 0; text-indent: -3px;\">A New Booking has been made</p><p>Dear Admin,</p><p>A new booking request was made by [client_name] for [service_name] on the [booked_date] at [booked_time] .</p><p>The Contact Details are as follows:</p><p>Email: [email_address]<br/>Mobile: [mobile_number]</p><p>You now need to [approve] or [deny] the booking via these links.</p></td></tr><tr><td style=\"padding-right: 30px; padding-bottom: 30px; padding-left: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #777777;\">Best Regards,<br/><br/>[employee_name]<br/><strong>[companyName]</strong></p></td></tr><tr><td style=\"font-size: 2px; line-height: 0px;\" height=\"11\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/divider.png\" width=\"600\" height=\"11\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table><!-- End of content with author bio --><!-- Start of footer -->
			<table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #cccccc;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#444444\"><tbody><tr><td><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #cccccc;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\"><tbody><tr><td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td style=\"padding-top: 30px; padding-bottom: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #cccccc;\" valign=\"top\" width=\"160\">Copyright <img style=\"vertical-align: -1px;\" alt=\"©\" src=\"$url/images/copyright.png\" width=\"11\" height=\"12\" border=\"0\" /> 2013 <a style=\"text-decoration: underline; color: #82ad0f;\" href=\"http://bookings-plus.com\">Bookings-Plus.com</a> all rights reserved.13 Park Steakhouse, New Jersey, USA</td><td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td style=\"padding-top: 34px; padding-bottom: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #cccccc;\" valign=\"top\" width=\"160\"><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 100%; color: #cccccc;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tbody><tr><td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/homeIcon.png\" width=\"13\" height=\"12\" align=\"left\" border=\"0\" /></td><td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\"><a style=\"text-decoration: underline; color: #82ad0f; line-height: 9pt;\" href=\"#\">www.bookings-plus.com</a></td></tr><tr><td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/emailIcon.png\" width=\"12\" height=\"12\" align=\"left\" border=\"0\" /></td><td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\"><a style=\"text-decoration: underline; color: #82ad0f; line-height: 9pt;\" href=\"mailto:\">info@bookings-plus.com</a></td></tr><tr><td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/phoneIcon.png\" width=\"11\" height=\"12\" align=\"left\" border=\"0\" /></td><td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\">+1- 888 4110 572</td></tr></tbody></table></td><td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table></td></tr>
			<tr><td style=\"font-size: 2px; line-height: 0px;\" bgcolor=\"#82ad0f\" height=\"7\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"600\" height=\"7\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table><!-- End of footer --></td></tr></tbody></table>", 'EmailSubject' => "Hi Admin - A New Booking was made"));
			
    $wpdb->insert(email_templatesTable(), array('EmailType' => "booking-disapproved", 'EmailContent' => "<style type=\"text/css\">body {margin:0;padding:0;background-color:#eeeeee;color:#777777;font-family:Arial, Helvetica, sans-serif;font-size:12px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;}h1, h2 {color:#3b5167;margin-bottom:10px !important;}a, a:link, a:visited {color:#82ad0f;text-decoration:none;}a:hover, a:active {text-decoration:none;color:#6d8c1b !important;}p {margin:0 0 14px 0;}img {border:0;}table td {border-collapse:collapse;}.highlighted {background-color:#ffe69e;color:#3b5167;padding:2px 4px;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px;}.ReadMsgBody {width: 100%;}.ExternalClass {width: 100%;}.yshortcuts {color: #82ad0f;}.yshortcuts a span {color: #82ad0f; border-bottom: none !important; background: none !important;}</style><table id=\"pageContainer\" style=\"border-collapse: collapse; background-repeat: repeat; background-color: #eeeeee;\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><tbody><tr><td style=\"padding: 30px 20px 40px 20px;\"><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #777777;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
			<tbody><tr><td style=\"font-size: 2px; line-height: 0px;\" colspan=\"2\" bgcolor=\"#82ad0f\" height=\"7\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"600\" height=\"7\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr><tr><td style=\"padding: 40px 30px 35px 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 100%; color: #82ad0f;\" valign=\"middle\" bgcolor=\"#ffffff\" width=\"255\"><img style=\"display: block;\" alt=\"Logo\" src=\"$url/images/logo.png\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td style=\"padding: 20px 30px 15px 0; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 100%; color: #777777; text-align: right;\" valign=\"middle\" bgcolor=\"#ffffff\" width=\"255\"><table style=\"border-collapse: collapse; text-align: center; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 100%; color: #777777;\" width=\"254\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\"><tbody><tr><td style=\"line-height: 100%; color: #82ad0f;\" valign=\"top\" width=\"66\"></td><td style=\"padding: 0 10px; line-height: 100%; text-align: center;\" width=\"20\"></td><td style=\"line-height: 100%;\" valign=\"top\" width=\"54\"></td><td style=\"padding: 0 10px; line-height: 100%; text-align: center;\" width=\"20\"></td><td style=\"line-height: 100%;\" valign=\"top\" width=\"54\"><a style=\"text-decoration: none; color: #82ad0f; display: block; line-height: 100%;\" target=\"_blank\" href=\"$url1\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/websiteIcon.png\" width=\"32\" height=\"32\" border=\"0\" hspace=\"11\" vspace=\"0\" /> Website</a></td></tr></tbody></table></td></tr><tr><td style=\"font-size: 2px; line-height: 0px;\" colspan=\"2\" height=\"11\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/divider.png\" width=\"600\" height=\"11\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #777777;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#ffffff\"><tbody><tr><td style=\"padding-right: 30px; padding-left: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #777777;\">
			<p style=\"font-family: 'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 36px; line-height: 30pt; color: #3b5167; font-weight: 300; margin-top: 0; margin-bottom: 20px !important; padding: 0; text-indent: -3px;\">Booking Disapproved</p><p>Hi [first name],</p><p>Sorry but your appointment for [service] on [date] of at [time] is unfortunately unavailable.</p><p>You are receiving this email because the Administrator has just decline your appointment which can be for a verity of different reasons that has to do with availability on that specific time or service.</p><p>We recommend that you either try to book for another time or date or alternatively contact us for further information.</p>
			<p><strong>[Transaction Id:] [transaction_id]</strong></p>
			<p><strong>[Payment Date:] [payment_date]</strong></p>
			<p><strong>[Payment Status:] [payment_status]</strong></p>
			
			<p>Thank you for your understanding and we look forward seeing soon.</p></td></tr><tr><td style=\"padding-right: 30px; padding-bottom: 30px; padding-left: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #777777;\">Best Regards,<br/><br/>[employee_name]<br/><strong>[companyName]</strong></p></td></tr><tr><td style=\"font-size: 2px; line-height: 0px;\" height=\"11\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/divider.png\" width=\"600\" height=\"11\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table><!-- End of content with author bio --><!-- Start of footer --><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #cccccc;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#444444\"><tbody><tr><td><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #cccccc;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\"><tbody><tr><td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td style=\"padding-top: 30px; padding-bottom: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #cccccc;\" valign=\"top\" width=\"160\">Copyright <img style=\"vertical-align: -1px;\" alt=\"©\" src=\"$url/images/copyright.png\" width=\"11\" height=\"12\" border=\"0\" /> 2013 <a style=\"text-decoration: underline; color: #82ad0f;\" href=\"http://bookings-plus.com\">Bookings-Plus.com</a> all rights reserved.13 Park Steakhouse, New Jersey, USA</td><td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td style=\"padding-top: 34px; padding-bottom: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #cccccc;\" valign=\"top\" width=\"160\"><table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 100%; color: #cccccc;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tbody><tr><td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/homeIcon.png\" width=\"13\" height=\"12\" align=\"left\" border=\"0\" /></td><td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\"><a style=\"text-decoration: underline; color: #82ad0f; line-height: 9pt;\" href=\"#\">www.bookings-plus.com</a></td></tr>
			<tr><td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/emailIcon.png\" width=\"12\" height=\"12\" align=\"left\" border=\"0\" /></td><td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\"><a style=\"text-decoration: underline; color: #82ad0f; line-height: 9pt;\" href=\"mailto:\">info@bookings-plus.com</a></td></tr><tr><td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/phoneIcon.png\" width=\"11\" height=\"12\" align=\"left\" border=\"0\" /></td><td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\">+1- 888 4110 572</td></tr></tbody></table></td><td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td><td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table></td></tr><tr><td style=\"font-size: 2px; line-height: 0px;\" bgcolor=\"#82ad0f\" height=\"7\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"600\" height=\"7\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td></tr></tbody></table><!-- End of footer --></td></tr></tbody></table>", 'EmailSubject' => "You Booking has been disapproved."));
	
   $wpdb->insert(email_templatesTable(), array('EmailType' => "paypal-payment-notification", 'EmailContent' => "<style type=\"text/css\"><!--
body {margin:0;padding:0;background-color:#eeeeee;color:#777777;font-family:Arial, Helvetica, sans-serif;font-size:12px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;}h1, h2 {color:#3b5167;margin-bottom:10px !important;}a, a:link, a:visited {color:#82ad0f;text-decoration:none;}a:hover, a:active {text-decoration:none;color:#6d8c1b !important;}p {margin:0 0 14px 0;}img {border:0;}table td {border-collapse:collapse;}.highlighted {background-color:#ffe69e;color:#3b5167;padding:2px 4px;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px;}.ReadMsgBody {width: 100%;}.ExternalClass {width: 100%;}.yshortcuts {color: #82ad0f;}.yshortcuts a span {color: #82ad0f; border-bottom: none !important; background: none !important;}
--></style>
<table id=\"pageContainer\" style=\"border-collapse: collapse; background-repeat: repeat; background-color: #eeeeee;\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
<tbody>
<tr>
<td style=\"padding: 30px 20px 40px 20px;\">
<table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #777777;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
<tbody>
<tr>
<td style=\"font-size: 2px; line-height: 0px;\" colspan=\"2\" bgcolor=\"#82ad0f\" height=\"7\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"600\" height=\"7\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
</tr>
<tr>
<td style=\"padding: 40px 30px 35px 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 100%; color: #82ad0f;\" valign=\"middle\" bgcolor=\"#ffffff\" width=\"255\"><img style=\"display: block;\" alt=\"Logo\" src=\"$url/images/logo.png\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
<td style=\"padding: 20px 30px 15px 0; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 100%; color: #777777; text-align: right;\" valign=\"middle\" bgcolor=\"#ffffff\" width=\"255\">
<table style=\"border-collapse: collapse; text-align: center; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 100%; color: #777777;\" width=\"254\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\">
<tbody>
<tr>
<td style=\"line-height: 100%; color: #82ad0f;\" valign=\"top\" width=\"66\"></td>
<td style=\"padding: 0 10px; line-height: 100%; text-align: center;\" width=\"20\"></td>
<td style=\"line-height: 100%;\" valign=\"top\" width=\"54\"></td>
<td style=\"padding: 0 10px; line-height: 100%; text-align: center;\" width=\"20\"></td>
<td style=\"line-height: 100%;\" valign=\"top\" width=\"54\"><a style=\"text-decoration: none; color: #82ad0f; display: block; line-height: 100%;\" href=\"$url1\" target=\"_blank\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/websiteIcon.png\" width=\"32\" height=\"32\" border=\"0\" hspace=\"11\" vspace=\"0\" /> Website</a></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style=\"font-size: 2px; line-height: 0px;\" colspan=\"2\" height=\"11\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/divider.png\" width=\"600\" height=\"11\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
</tr>
</tbody>
</table>
<table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #777777;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#ffffff\">
<tbody>
<tr>
<td style=\"padding-right: 30px; padding-left: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #777777;\">
<p style=\"font-family: 'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 36px; line-height: 30pt; color: #3b5167; font-weight: 300; margin-top: 0; margin-bottom: 20px !important; padding: 0; text-indent: -3px;\">PayPal Payment Notification </p>
<p style=\"font-family: arial,helvetica,sans-serif; font-size: 11px;\">Dear Admin,</p>
This email is a NOTIFICATION ONLY email.You do not need to do anything at this stage.

This is to update you that a new payment was initiated by [client_name] for [service_name] at [booked_date] on [booked_time] and its status is now Pending.
<p style=\"font-family: arial,helvetica,sans-serif; font-size: 11px;\">Their contact details are:</p>
<p style=\"font-family: arial,helvetica,sans-serif; font-size: 11px;\">Email: [email_address]
Mobile: [mobile_number]</p>
<p style=\"font-family: arial,helvetica,sans-serif; font-size: 11px;\">Within the next few minutes you should get an email with a Payment Transaction Status.</p>
<p style=\"font-family: arial,helvetica,sans-serif; font-size: 11px;\">NOTE: if within the next 30 min you did not receive any email update for the above transaction please check your Admin Agenda status.</p>
<p style=\"font-family: arial,helvetica,sans-serif; font-size: 11px;\">Thank you
System Notification.</p>
</td>
</tr>
<tr>
<td style=\"font-size: 2px; line-height: 0px;\" height=\"11\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/divider.png\" width=\"600\" height=\"11\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
</tr>
</tbody>
</table>
<!-- End of content with author bio --><!-- Start of footer -->
<table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #cccccc;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#444444\">
<tbody>
<tr>
<td>
<table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #cccccc;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\">
<tbody>
<tr>
<td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
<td style=\"padding-top: 30px; padding-bottom: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #cccccc;\" valign=\"top\" width=\"160\">Copyright <img style=\"vertical-align: -1px;\" alt=\"©\" src=\"$url/images/copyright.png\" width=\"11\" height=\"12\" border=\"0\" /> 2013 <a style=\"text-decoration: underline; color: #82ad0f;\" href=\"http://bookings-plus.com\">Bookings-Plus.com</a> all rights reserved.13 Park Steakhouse, New Jersey, USA</td>
<td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
<td style=\"padding-top: 34px; padding-bottom: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #cccccc;\" valign=\"top\" width=\"160\">
<table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 100%; color: #cccccc;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
<tbody>
<tr>
<td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/homeIcon.png\" width=\"13\" height=\"12\" align=\"left\" border=\"0\" /></td>
<td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\"><a style=\"text-decoration: underline; color: #82ad0f; line-height: 9pt;\" href=\"#\">www.bookings-plus.com</a></td>
</tr>
<tr>
<td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/emailIcon.png\" width=\"12\" height=\"12\" align=\"left\" border=\"0\" /></td>
<td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\"><a style=\"text-decoration: underline; color: #82ad0f; line-height: 9pt;\" href=\"mailto:\">info@bookings-plus.com</a></td>
</tr>
<tr>
<td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/phoneIcon.png\" width=\"11\" height=\"12\" align=\"left\" border=\"0\" /></td>
<td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\">+1- 888 4110 572</td>
</tr>
</tbody>
</table>
</td>
<td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
<td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style=\"font-size: 2px; line-height: 0px;\" bgcolor=\"#82ad0f\" height=\"7\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"600\" height=\"7\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
</tr>
</tbody>
</table>
<!-- End of footer --></td>
</tr>
</tbody>
</table>", 'EmailSubject' => "Admin PayPal Payment Notification"));
	
   $wpdb->insert(email_templatesTable(), array('EmailType' => "paypal-cancellation-notification", 'EmailContent' => "<style type=\"text/css\"><!--
body {margin:0;padding:0;background-color:#eeeeee;color:#777777;font-family:Arial, Helvetica, sans-serif;font-size:12px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;}h1, h2 {color:#3b5167;margin-bottom:10px !important;}a, a:link, a:visited {color:#82ad0f;text-decoration:none;}a:hover, a:active {text-decoration:none;color:#6d8c1b !important;}p {margin:0 0 14px 0;}img {border:0;}table td {border-collapse:collapse;}.highlighted {background-color:#ffe69e;color:#3b5167;padding:2px 4px;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px;}.ReadMsgBody {width: 100%;}.ExternalClass {width: 100%;}.yshortcuts {color: #82ad0f;}.yshortcuts a span {color: #82ad0f; border-bottom: none !important; background: none !important;}
--></style>
<table id=\"pageContainer\" style=\"border-collapse: collapse; background-repeat: repeat; background-color: #eeeeee;\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
<tbody>
<tr>
<td style=\"padding: 30px 20px 40px 20px;\">
<table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #777777;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
<tbody>
<tr>
<td style=\"font-size: 2px; line-height: 0px;\" colspan=\"2\" bgcolor=\"#82ad0f\" height=\"7\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"600\" height=\"7\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
</tr>
<tr>
<td style=\"padding: 40px 30px 35px 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 100%; color: #82ad0f;\" valign=\"middle\" bgcolor=\"#ffffff\" width=\"255\"><img style=\"display: block;\" alt=\"Logo\" src=\"$url/images/logo.png\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
<td style=\"padding: 20px 30px 15px 0; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 100%; color: #777777; text-align: right;\" valign=\"middle\" bgcolor=\"#ffffff\" width=\"255\">
<table style=\"border-collapse: collapse; text-align: center; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 100%; color: #777777;\" width=\"254\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\">
<tbody>
<tr>
<td style=\"line-height: 100%; color: #82ad0f;\" valign=\"top\" width=\"66\"></td>
<td style=\"padding: 0 10px; line-height: 100%; text-align: center;\" width=\"20\"></td>
<td style=\"line-height: 100%;\" valign=\"top\" width=\"54\"></td>
<td style=\"padding: 0 10px; line-height: 100%; text-align: center;\" width=\"20\"></td>
<td style=\"line-height: 100%;\" valign=\"top\" width=\"54\"><a style=\"text-decoration: none; color: #82ad0f; display: block; line-height: 100%;\" href=\"$url1\" target=\"_blank\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/websiteIcon.png\" width=\"32\" height=\"32\" border=\"0\" hspace=\"11\" vspace=\"0\" /> Website</a></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style=\"font-size: 2px; line-height: 0px;\" colspan=\"2\" height=\"11\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/divider.png\" width=\"600\" height=\"11\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
</tr>
</tbody>
</table>
<table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #777777;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#ffffff\">
<tbody>
<tr>
<td style=\"padding-right: 30px; padding-left: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #777777;\">
<p style=\"font-family: 'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 36px; line-height: 30pt; color: #3b5167; font-weight: 300; margin-top: 0; margin-bottom: 20px !important; padding: 0; text-indent: -3px;\">PayPal Cancellation Notification </p>
<p>Dear Admin,</p>
<p>This email is a PAYPAL CANCELLATION NOTIFICATION. You do not need to do anything.</p>
<p>This is to update you that <strong> [client_name] </strong>has just cancelled their Payment process for <strong> [service_name] </strong></p>
<p>This means that no payment was made and that the booking slot for this time and date is now available again on your calendar.</p>
<p>If you wished to contact <strong>[client_name]</strong> their information is:</p><p>Email : <strong>[client_email]</strong></p>
<p>Mobile : <strong>[client_mobile]</strong></p>
<p>Thank you</p>
<p>System Notification.</p>
</td>
</tr>
<tr>
<td style=\"font-size: 2px; line-height: 0px;\" height=\"11\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/divider.png\" width=\"600\" height=\"11\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
</tr>
</tbody>
</table>
<!-- End of content with author bio --><!-- Start of footer -->
<table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #cccccc;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#444444\">
<tbody>
<tr>
<td>
<table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 15pt; color: #cccccc;\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\">
<tbody>
<tr>
<td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
<td style=\"padding-top: 30px; padding-bottom: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #cccccc;\" valign=\"top\" width=\"160\">Copyright <img style=\"vertical-align: -1px;\" alt=\"©\" src=\"$url/images/copyright.png\" width=\"11\" height=\"12\" border=\"0\" /> 2013 <a style=\"text-decoration: underline; color: #82ad0f;\" href=\"http://bookings-plus.com\">Bookings-Plus.com</a> all rights reserved.13 Park Steakhouse, New Jersey, USA</td>
<td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
<td style=\"padding-top: 34px; padding-bottom: 30px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 15pt; color: #cccccc;\" valign=\"top\" width=\"160\">
<table style=\"border-collapse: collapse; text-align: left; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; line-height: 100%; color: #cccccc;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
<tbody>
<tr>
<td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/homeIcon.png\" width=\"13\" height=\"12\" align=\"left\" border=\"0\" /></td>
<td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\"><a style=\"text-decoration: underline; color: #82ad0f; line-height: 9pt;\" href=\"#\">www.bookings-plus.com</a></td>
</tr>
<tr>
<td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/emailIcon.png\" width=\"12\" height=\"12\" align=\"left\" border=\"0\" /></td>
<td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\"><a style=\"text-decoration: underline; color: #82ad0f; line-height: 9pt;\" href=\"mailto:\">info@bookings-plus.com</a></td>
</tr>
<tr>
<td class=\"footer_list_image\" style=\"padding: 0 0 9px 0;\" valign=\"top\" width=\"20\"><img style=\"display: block;\" alt=\"●\" src=\"$url/images/phoneIcon.png\" width=\"11\" height=\"12\" align=\"left\" border=\"0\" /></td>
<td class=\"footer_list\" style=\"padding: 0 0 9px 0; line-height: 9pt;\" valign=\"top\" width=\"140\">+1- 888 4110 572</td>
</tr>
</tbody>
</table>
</td>
<td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
<td width=\"30\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"30\" height=\"10\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style=\"font-size: 2px; line-height: 0px;\" bgcolor=\"#82ad0f\" height=\"7\"><img style=\"display: block;\" alt=\"\" src=\"$url/images/blank.gif\" width=\"600\" height=\"7\" align=\"left\" border=\"0\" hspace=\"0\" vspace=\"0\" /></td>
</tr>
</tbody>
</table>
<!-- End of footer --></td>
</tr>
</tbody>
</table>", 'EmailSubject' => "Admin PayPal Cancellation Notification"));
   			
}
?>