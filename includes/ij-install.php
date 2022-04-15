<?php
 
// die("Install file");

global $wpdb; 
global $ij_db_version;

$ij_db_version = '1.0.0';

add_option("ij_db_version", $ij_db_version);

require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

$charset_collate = $wpdb->get_charset_collate();        
$table_name = $wpdb->prefix.'ij_dental_premium_leads'; 

$sql= "CREATE TABLE IF NOT EXISTS `$table_name` 

(

`ij_lead_id` int(11) NOT NULL AUTO_INCREMENT,

`entryid` varchar(25) NOT NULL,
`ageinterval` varchar(15) NOT NULL,
`checkup` varchar(10) NOT NULL, 

`company_name` varchar(100) NOT NULL,
`company_address` varchar(100) NOT NULL,
`company_postnumber` varchar(100) NOT NULL,
`company_by` varchar(100) NOT NULL,
`cvr_number` varchar(100) NOT NULL,
 
`name_cp` varchar(100) NOT NULL,
`email_cp` varchar(100) NOT NULL,
`phone_cp` varchar(100) NOT NULL,
 
`name_sta` varchar(100) NOT NULL,
`email_sta` varchar(100) NOT NULL,
`phone_sta` varchar(100) NOT NULL,
 
`name_aots` varchar(100) NOT NULL,
`email_aots` varchar(100) NOT NULL,
`phone_aots` varchar(100) NOT NULL ,
`created_at` varchar(100) NOT NULL , 
PRIMARY KEY (`ij_lead_id`)

) $charset_collate";

dbDelta($sql);