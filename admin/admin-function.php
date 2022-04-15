<?php



/**
 * 
 * 	Exclude certain elements from a give array 
 * 
 */

 function exclude_array_elements($mainArray , $excludeArray){

	// $files = array("a-file","b-file","meta-file-1", "meta-file-2", "z-file");
	// $exclude_file_1 = "meta-file-1";
	// $exclude_file_2 = "meta-file-2";
	
	// $excludeArray = array($exclude_file_1, $exclude_file_2);
	$filteredArray = array_diff($mainArray, $excludeArray);
	return $filteredArray;

 }

/*
*	Display images
*/ 

function display_images_from_admin($filename, $classname){

		$strImageTag = '<img class="'.$classname.'" src=" '. DENTALINSURANCE__PLUGIN_URL.'admin/images/'.$filename.' " />    ';  
		return $strImageTag;

}
/**
 * Include admin js 
 * 
 */
function admin_script_enqueue() {

    
   // wp_enqueue_script( 'admin-moment-script', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js', array('jquery') );
    wp_enqueue_script( 'admin-datepicker-script', 'https://code.jquery.com/ui/1.13.1/jquery-ui.js', array('jquery') );
    wp_enqueue_script( 'admin-ajax-script', DENTALINSURANCE__PLUGIN_URL .'admin/js/admin-ajax-call.js', array('jquery') );
	wp_localize_script( 'admin-ajax-script', 'premium_dental_fetch_leads_data_ajax_object',
	array( 
		'ajax_url' => admin_url( 'admin-ajax.php' ) ,
		'loadingmessage' => '<span class="alert alert-info">'.esc_html__('Please wait...','imran.javed11').'<i class="fa fa-spinner fa-spin"></i></span>', ) );
 
 }
add_action( 'admin_enqueue_scripts', 'admin_script_enqueue'  );



/*
*   include admin css
*/ 
function admin_style_enqueue() {

wp_enqueue_style( 'admin-styles', DENTALINSURANCE__PLUGIN_URL .'admin/css/admin.css' );
wp_enqueue_style( 'admin-date-picker-styles', 'https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css' );
wp_enqueue_style( 'admin-date-picker-styles' );
wp_enqueue_style( 'dashicons' );


}
add_action( 'admin_enqueue_scripts', 'admin_style_enqueue' );


function ij_dental_premium_calculation_leads() 

{

	add_menu_page('Dansk Tandforsikring', 'Dansk Tandforsikring', 'manage_options', 'dansk-dashboard', 'ij_dental_premium_sale_leads_page',   '');
	//  DENTALINSURANCE__PLUGIN_URL .'admin/images/menuicon.png' );

	add_submenu_page('dansk-dashboard', 'Dashboard', 'Dashboard', 'manage_options', 'dansk-dashboard', 'ij_dental_premium_sale_leads_page');

	 
}

add_action( 'admin_menu', 'ij_dental_premium_calculation_leads' );



function func_fetch_leads_detail_ajax(){ 
	
	global $wpdb;
	$ij_dental_premium_leads = $wpdb->prefix . 'ij_dental_premium_leads';
	$leadid =  checkvalueissetornot($_POST['recordid']);
	$sqls = "SELECT * FROM $ij_dental_premium_leads where `ij_lead_id`  = $leadid LIMIT 1 ";
	$leads_result = $wpdb->get_results($sqls, 'ARRAY_N');
	 
	 
	
?> 
				<?php

				$sectionOne = array(
 
					'Aldersinterval', 
					'Inkluderer checkup'

				);


				$sectionTwo = array(

					'Navn', 
					'Adresse',	
					'Postnummer', 
					'By', 
					'CVR Nummer'

				);
				$sectionThree = array(

					'Navn', 
					'E-mail', 
					'Telefon'

				);
				$sectionFour  = array(

					'Navn', 
					'E-mail', 
					'Telefon'

				);
				
				$sectionFive = array (

					'Navn', 
					'E-mail', 
					'Telefon',
					'Dato'

				);

				$date=date_create($leads_result[0][18]);
				$date = date_format($date,"d.m.Y");
				
				$DataSectionOne = array ();
								  array_push($DataSectionOne,  $leads_result[0][2], $leads_result[0][3]);	
				$DataSectionTwo = array ();
								  array_push($DataSectionTwo,  $leads_result[0][4], $leads_result[0][5], $leads_result[0][6], $leads_result[0][7], $leads_result[0][8]);	
				$DataSectionThree = array ();
								  array_push($DataSectionThree,  $leads_result[0][9], $leads_result[0][10], $leads_result[0][11]);	
				$DataSectionFour = array ();
								  array_push($DataSectionFour,  $leads_result[0][12], $leads_result[0][13], $leads_result[0][14]);	
			    $DataSectionFive = array ();
								  array_push($DataSectionFive,  $leads_result[0][15], $leads_result[0][16], $leads_result[0][17],  $date);	
				
				$OneSectionArray = array_combine($sectionOne, $DataSectionOne );				  
				$TwoSectionArray = array_combine($sectionTwo, $DataSectionTwo );				  
				$ThreeSectionArray = array_combine($sectionThree, $DataSectionThree );				  
				$FourSectionArray = array_combine($sectionFour, $DataSectionFour );				  
				$FiveSectionArray = array_combine($sectionFive , $DataSectionFive );				  
				
				?>

<div class="container">
	<h5>Aldersinterval</h5>

				<?php 
					foreach ( $OneSectionArray as $Title => $Value ) {
				?>
				<div class="row record-row border-bottom" >
							<div class="col-4 align-left" ><?php echo $Title; ?></div>
							<div class="col-8 align-left" ><?php echo $Value; ?></div>
						</div>

				<?php
					}
				?>


	<h5>Firma</h5>

				<?php 
					foreach ( $TwoSectionArray as $Title => $Value ) {
				?>
				<div class="row record-row border-bottom" >
							<div class="col-4 align-left" ><?php echo $Title; ?></div>
							<div class="col-8 align-left" ><?php echo $Value; ?></div>
						</div>

				<?php
					}
				?>

	<h5>Kontaktperson</h5>

				<?php 
					foreach ( $ThreeSectionArray as $Title => $Value ) {
				?>
				<div class="row record-row border-bottom" >
							<div class="col-4 align-left" ><?php echo $Title; ?></div>
							<div class="col-8 align-left" ><?php echo $Value; ?></div>
						</div>

				<?php
					}
				?>

	<h5>Underskriver på aftalen</h5>

				<?php 
					foreach ( $FourSectionArray as $Title => $Value ) {
				?>
				<div class="row record-row border-bottom" >
							<div class="col-4 align-left" ><?php echo $Title; ?></div>
							<div class="col-8 align-left" ><?php echo $Value; ?></div>
						</div>

				<?php
					}
				?>

	<h5>Administrator på ordningen</h5>

				<?php 
					foreach ( $FiveSectionArray as $Title => $Value ) {
				?>
				<div class="row record-row border-bottom" >
							<div class="col-4 align-left" ><?php echo $Title; ?></div>
							<div class="col-8 align-left" ><?php echo $Value; ?></div>
						</div>

				<?php
					}
				?>
</div>
<?php
				die();
}
add_action( 'wp_ajax_func_fetch_leads_detail_ajax', 'func_fetch_leads_detail_ajax' ); 	


function totalNumberofPage(){
	
	global $wpdb;

	$ij_dental_premium_leads = $wpdb->prefix . 'ij_dental_premium_leads'; 
	
	$sqlTP = "SELECT count(*) as totalrecords FROM $ij_dental_premium_leads"; 
	$TPrecords = $wpdb->get_var($sqlTP); 
	return $TPrecords ;
	
}


function ij_pagination($pageno , $records_per_page){


	$TPrecords = totalNumberofPage();
	$TPrecords = isset($TPrecords)? $TPrecords : 0; // 69
	$totalPages = ceil($TPrecords/$records_per_page);	  // 6.9
	
	 
	?>

<nav aria-label="Page navigation example">
					<ul class="pagination">
						
						<?php for($i=1; $i <= $totalPages; $i++) {?>
						  <li class="page-item"><a class="page-link pageno" data-pageno="<?php echo  $i; ?>" href="javascript:;"><?php echo $i; ?></a></li>
						<?php } ?>

					</ul>
					</nav>

	<?php
}

function download_csv_file(){
	
	global $wpdb;

			$ij_dental_premium_leads = $wpdb->prefix . 'ij_dental_premium_leads';
			// Fetch records from database 
			$sqlcsv = "SELECT * FROM $ij_dental_premium_leads   ORDER BY created_at DESC   ";  
			$leadsPp = $wpdb->get_results($sqlcsv, 'ARRAY_A'); 
		
		
		
if($leadsPp > 0){ 
    $delimiter = ","; 
    $filename = "dansk-insurance-leads_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://output', 'w'); 
     
    // Set column headers 
    $fields = array(
	'ID',   
	'AGE', 
	'CHECKUP', 
	'COMPANY_NAME', 
	'COMPANY_ADDRESS', 
	'COMPANY_POSTNUMBER', 
	'COMPANY_BY', 
	'CVR_NUMBER',
	'CONTACT PERSON - NAME',
	'CONTACT PERSON - EMAIL',
	'CONTACT PERSON - PHONE',
	'SIGNS THE AGREEMENT - NAME',
	'SIGNS THE AGREEMENT - EMAIL',
	'SIGNS THE AGREEMENT - PHONE',
	'ADMINISTRATOR OF THE SCHEME  - NAME',
	'ADMINISTRATOR OF THE SCHEME  - EMAIL',
	'ADMINISTRATOR OF THE SCHEME  - PHONE' 
	
	); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    foreach ($leadsPp as  $single_lead){  
        $lineData = array( 
		checkValueIssetOrNot( $single_lead['ij_lead_id']),     
		checkValueIssetOrNot( $single_lead['ageinterval']),   
		checkValueIssetOrNot( $single_lead['checkup']),   
		checkValueIssetOrNot( $single_lead['company_name']),   
		checkValueIssetOrNot( $single_lead['company_address']),   
		checkValueIssetOrNot( $single_lead['company_postnumber']),   
		checkValueIssetOrNot( $single_lead['company_by']), 
		checkValueIssetOrNot( $single_lead['cvr_number']) ,  
		checkValueIssetOrNot( $single_lead['name_cp']) ,  
		checkValueIssetOrNot( $single_lead['email_cp']) ,  
		checkValueIssetOrNot( $single_lead['phone_cp']) ,  
		checkValueIssetOrNot( $single_lead['name_sta']) ,  
		checkValueIssetOrNot( $single_lead['email_sta']) ,  
		checkValueIssetOrNot( $single_lead['phone_sta']) ,  
		checkValueIssetOrNot( $single_lead['name_aots']) ,  
		checkValueIssetOrNot( $single_lead['email_aots']) ,  
		checkValueIssetOrNot( $single_lead['phone_aots'])  
		); 
       fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Set headers to download file rather than displayed 
	header("Pragma: public");
	header("Expires: 0"); 
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
      
	 
    //output all remaining data on a file pointer 
    fpassthru($f); 
	exit;
} 
 die();
}
add_action( 'wp_ajax_download_csv_file', 'download_csv_file' ); 

function admin_fetch_sales_record_on_page_click () {

 
 

	global $wpdb;

	$ij_dental_premium_leads = $wpdb->prefix . 'ij_dental_premium_leads';
	$valInPostArray=0;
	$searchStr='';
	$records_per_page = 5;
	$leadsP=''; 
	
	
	    
	 
	   
	  
	
		 
	$todayDate = isset($_POST['ajjkidate']) && !empty($_POST['ajjkidate']) ? $_POST['ajjkidate'] : 0; 
	$fromDateValue = isset($_POST['fromDateValue']) && !empty($_POST['fromDateValue']) ? $_POST['fromDateValue'] : "";
	$toDateValue = isset($_POST['toDateValue']) && !empty($_POST['toDateValue'])? $_POST['toDateValue'] : "";
	$pageno = isset($_POST['pageno']) && !empty($_POST['pageno']) ? $_POST['pageno'] : 0;
	$searchStr = isset($_POST['searchquery']) && !empty($_POST['searchquery']) ? $_POST['searchquery'] : ''; 
 
	/*
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	die;
	*/
	
	if ( $pageno >= 1 ) {
		
		
	
	//echo "Page No Sent ".$pageno ."<br>";
		$start_from =  ($pageno - 1)* $records_per_page; // 25, 25
		//echo "Start from ".$start_from."<br>";
		$sqlP =  "SELECT * FROM $ij_dental_premium_leads  ORDER BY `ij_lead_id` DESC   LIMIT $records_per_page OFFSET  $start_from";  
		 
		$leadsP = $wpdb->get_results($sqlP, 'ARRAY_A');
		if($leadsP){
		$leadsP = $wpdb->get_results($sqlP, 'ARRAY_A'); 
			
			
		}else {
			
			echo "No record found";
		}
		
	} else if ( $searchStr) {

			$sqlS = "SELECT * FROM $ij_dental_premium_leads  WHERE cvr_number LIKE '%$searchStr%' ORDER BY `ij_lead_id` DESC "; 	
			$leadsP = $wpdb->get_results($sqlS, 'ARRAY_A');
		 
		  

	} else if ($fromDateValue && $toDateValue) { 
	 
	  
		$sqlD = "SELECT * FROM $ij_dental_premium_leads WHERE `created_at` BETWEEN '$fromDateValue'  AND  '$toDateValue' ORDER BY `ij_lead_id` DESC "; 
		 
		$leadsP = $wpdb->get_results($sqlD, 'ARRAY_A'); 
		if($leadsP){
		$leadsP = $wpdb->get_results($sqlD, 'ARRAY_A'); 
			
			
		}else {
			
			echo "No record found";
		}
		 
		
	}  else if ( $todayDate == 1 ) { 
		$todayDate =  date("Y-m-d");
		$start_from =  ( $valInPostArray - 1) * $records_per_page; 
		$sqlTD = "SELECT * FROM $ij_dental_premium_leads WHERE `created_at` = '$todayDate' ORDER BY `ij_lead_id` DESC ";  
		 
		$leadsP = $wpdb->get_results($sqlTD, 'ARRAY_A'); 
		
		if($leadsP){
		
			$leadsP = $wpdb->get_results($sqlTD, 'ARRAY_A'); 
			
		}else {
			
			echo "No record found";
		}
		
		
	
	} 
	
	//if( !empty($result) )
	foreach ($leadsP as  $single_lead) {
		?>


<tr class="ui-state-default">



<td>
	<?php echo  checkValueIssetOrNot( $single_lead['ij_lead_id']); ?>
</td>
<td>

	<?php   echo checkValueIssetOrNot( $single_lead['ageinterval']);  ?>

</td>

<td>

	<?php  echo checkValueIssetOrNot( $single_lead['checkup']);   ?>

</td>



<td>

	<?php  echo checkValueIssetOrNot( $single_lead['company_address']);  ?>

</td>
<td>

	<?php  echo checkValueIssetOrNot( $single_lead['company_postnumber']);  ?>

</td>

<td>

	<?php echo checkValueIssetOrNot( $single_lead['company_by']);  ?>

</td>
<td>

	<?php  echo checkValueIssetOrNot( $single_lead['cvr_number']);   ?>

</td>  
<td style="text-align: center;">
	<button type="button" style="padding: 10px 20px;"  class="btn btn-primary ddd viewdetail" onclick="fetch_model_view(<?php echo checkValueIssetOrNot($single_lead['ij_lead_id']) ; ?>);" data-toggle="modal" data-recordid="" data-target="#viewleaddetail">
	Se detaljer
	</button>
</td>



</tr>



		<?php 
		  
}
?>
 

<?php
	die();

}

add_action( 'wp_ajax_admin_fetch_sales_record_on_page_click', 'admin_fetch_sales_record_on_page_click' );


 function cleanUserInput($userinput) {
  
  		// Open your database connection
      //	$dbConnection = databaseConnect();
  
  		// check if input is empty
        if (empty($userinput)) {
          return;
        } else {
          
        // Strip any html characters
        $userinput = htmlspecialchars($userinput);
        
		// Clean input using the database  
        //$userinput = mysqli_real_escape_string($dbConnection, $userinput);
        }
       
  	  // Return a cleaned string
      return $userinput;
    }

function clean($data)
{
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}

function the_slug_exists($post_name) {
    global $wpdb;
	$tablename = $wpdb->prefix . 'posts';
	echo $wpdb->get_var("SELECT post_name FROM $tablename WHERE post_name = '" . $post_name . "'");
	die();
    if($wpdb->get_row("SELECT post_name FROM $tablename WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
        return true;
    } else {
        return false;
    }
}