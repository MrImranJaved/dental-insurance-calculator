<?php



/*
function wordpress_insert_record ($dataArray){

    global $wpdb; 
    $row = explode("&", $dataArray);
	//echo "Before insertion<br>";
	print_r($row);
	//die("IN");
    $table_name = $wpdb->prefix.'ij_dental_premium_leads'; 

    //Check either table exist not 
    $showtableQry = "SHOW TABLES LIKE '%ij_dental_premium_leads%'";
    $showTbl = $wpdb->query($showtableQry);
    $currentDate =  date("Y-m-d");
if($showTbl && $row) {
	
	$entryid 		= 	isset($row['0']) && !empty($row['0'])? $row['0'] : '';
	$ageinterval 	= 	isset($row['1']) && !empty($row['1'])? $row['1'] : '';
	$checkup 		= 	isset($row['2']) && !empty($row['2'])? $row['2'] : '';
	$created_at		= 	$currentDate;
	
	
	//die("BEfore");
    $wpdb->insert( 

        $table_name, 

        array( 

            'entryid' 			=> $entryid ,
            'ageinterval' 		=>  $ageinterval ,
            'checkup' 			=> $checkup ,
            'created_at' 		=>  $currentDate
        ) 

    );
	
	 $insQuery = "INSERT INTO $table_name (  `entryid` , `ageinterval` , `checkup` , `created_at`) 
				VALUES ( $entryid , $ageinterval, $checkup , $currentDate )";
				
	 $sql = $wpdb->prepare($insQuery);
die($sql);	
	echo $wpdb->query($insQuery);			
	 
}
}*/



function fetch_row_by_entryid_ ($entryid){
	
	$dental_premium_leads = $wpdb->prefix.'ij_dental_premium_leads';



	$sql = "SELECT * FROM $dental_premium_leads WHERE `entryid` LIKE $entryid";
	
	die($sql);
	$dental_premium_detail = $wpdb->get_results($sql);

	$rows = $wpdb->num_rows;
if($rows){
	
	echo '<pre>';
	print_r($dental_premium_detail);
	echo '</pre>';
	
}
	
}

function render_result_string($str, $ageinterval, $checkup ){
	
	if($ageinterval =='30-34'){
               
			 
            $str .= !empty( $ageinterval )  ? 'Aldersinterval : '.$ageinterval.' <br />' :'';
			
			 if(  $checkup == 'Ja' ){
				   

				   $str .='Inkluderer ét årligt tandeftersyn og tandrensning : Ja <br />';
            $str .= ' <span class="preimumshowing"  style="color: #428bca ;   font-size: 2rem;" >Præmie : 1.230 kr. pr. medarbejder pr. år </span><br />';
				   
			   }else if( $checkup == 'Nej'){

				   $str .='tandeftersyn og tandrensning Ikke inkluderet : Nej <br />';
				   
            $str .= ' <span class="preimumshowing"  style="color: #428bca ;   font-size: 2rem;" >Præmie : 870 kr. pr. medarbejder pr. år </span><br />';
				   
			   } 
             
            
        }else if($ageinterval =='35-39'){
            
            
             
			 $str .= !empty( $ageinterval )  ? 'Aldersinterval : '.$ageinterval.' <br />' :'';
			
			 if(  $checkup == 'Ja' ){
				   

				   $str .='Inkluderer ét årligt tandeftersyn og tandrensning : Ja <br />';
            $str .= ' <span class="preimumshowing"  style="color: #428bca ;   font-size: 2rem;" >Præmie : 1.381 kr. pr. medarbejder pr. år </span><br />';
				   
			   }else if( $checkup == 'Nej'){

				   $str .='tandeftersyn og tandrensning Ikke inkluderet : Nej <br />';
				   
            $str .= ' <span class="preimumshowing"  style="color: #428bca ;   font-size: 2rem;" >Præmie : 1.021 kr. pr. medarbejder pr. år </span><br />';
				   
			   } 
			 
			 
			 
        }else if($ageinterval =='40-44'){
            
            
            $str .= !empty( $ageinterval )  ? 'Aldersinterval : '.$ageinterval.' <br />' :'';
			
			 if(  $checkup == 'Ja' ){
				   
				$str .='Inkluderer ét årligt tandeftersyn og tandrensning : Ja <br />';
				$str .= ' <span class="preimumshowing"  style="color: #428bca ;   font-size: 2rem;" >Præmie : 1.579 kr. pr. medarbejder pr. år </span><br />';
				   
			   }else if( $checkup == 'Nej'){

					$str .='tandeftersyn og tandrensning Ikke inkluderet : Nej <br />';

					$str .= ' <span class="preimumshowing"  style="color: #428bca ;   font-size: 2rem;" >Præmie : 1.219 kr. pr. medarbejder pr. år </span><br />';
				   
			   } 
			
        }else if($ageinterval =='45-49'){
            
            
           $str .= !empty( $ageinterval )  ? 'Aldersinterval : '.$ageinterval.' <br />' :'';
			
			 if(  $checkup == 'Ja' ){
				   

					$str .='Inkluderer ét årligt tandeftersyn og tandrensning : Ja <br />';
					$str .= ' <span class="preimumshowing"  style="color: #428bca ;   font-size: 2rem;" >Præmie : 1.795 kr. pr. medarbejder pr. år </span><br />';
				   
			   }else if( $checkup == 'Nej'){
				
				
				$str .='tandeftersyn og tandrensning Ikke inkluderet : Nej <br />';

				$str .= ' <span class="preimumshowing"  style="color: #428bca ;   font-size: 2rem;" >Præmie : 1.435 kr. pr. medarbejder pr. år </span><br />';

			   } 
			   
			   
        }else if($ageinterval =='50-54'){
            
            
        $str .= !empty( $ageinterval )  ? 'Aldersinterval : '.$ageinterval.' <br />' :'';
			
			 if(  $checkup == 'Ja' ){
				   

					$str .='Inkluderer ét årligt tandeftersyn og tandrensning : Ja <br />';
					$str .= ' <span class="preimumshowing"  style="color: #428bca ;   font-size: 2rem;" >Præmie : 2.056 kr. pr. medarbejder pr. år </span><br />';
				   
			   }else if( $checkup == 'Nej'){
				   
				$str .='tandeftersyn og tandrensning Ikke inkluderet : Nej <br />';

				$str .= ' <span class="preimumshowing"  style="color: #428bca ;   font-size: 2rem;" >Præmie : 1.696 kr. pr. medarbejder pr. år </span><br />';
				   
			   } 
        }else if($ageinterval =='55-59'){
            
            
            $str .= !empty( $ageinterval )  ? 'Aldersinterval : '.$ageinterval.' <br />' :'';
			
			 if(  $checkup == 'Ja' ){
				   
				   
					$str .='Inkluderer ét årligt tandeftersyn og tandrensning : Ja <br />';
					$str .= ' <span class="preimumshowing"  style="color: #428bca ;   font-size: 2rem;" >Præmie : 2.371 kr. pr. medarbejder pr. år </span><br />';
				   
			   }else if( $checkup == 'Nej'){
				     
					
					$str .='tandeftersyn og tandrensning Ikke inkluderet : Nej <br />';
					$str .= ' <span class="preimumshowing"  style="color: #428bca ;   font-size: 2rem;" >Præmie : 2.011 kr. pr. medarbejder pr. år </span><br />';
				   
			   } 
        }else if($ageinterval =='60-64'){
            
            
           $str .= !empty( $ageinterval )  ? 'Aldersinterval : '.$ageinterval.' <br />' :'';
			
			 if(  $checkup == 'Ja' ){
				   
				     
					$str .='Inkluderer ét årligt tandeftersyn og tandrensning : Ja <br />';
					$str .= ' <span class="preimumshowing"  style="color: #428bca ;   font-size: 2rem;" >Præmie : 2.686 kr. pr. medarbejder pr. år </span><br />';
				   
			   }else if( $checkup == 'Nej'){
				  
				   
				  $str .='tandeftersyn og tandrensning Ikke inkluderet : Nej <br />';
				  $str .= ' <span class="preimumshowing"  style="color: #428bca ;   font-size: 2rem;" >Præmie : 2.326 kr. pr. medarbejder pr. år </span><br />';
				   
			   } 
		   
        }
	
return $str;	
	
}

function  show_result_on_page_load_for_step_two(){
   //   print_r($_POST);
//die;
    global $wpdb;
if(  isset( $_POST['entryidonentry'] ) ){ 


 
    $entryid = $_POST['entryidonentry'];   
	$ij_dental_premium_leads = $wpdb->prefix . 'ij_dental_premium_leads'; 
	$sqls =  "SELECT * FROM $ij_dental_premium_leads where `entryid`  = $entryid LIMIT 1" ;
	$lead_result = $wpdb->get_results($sqls, 'ARRAY_A');
	$ageinterval = isset($lead_result[0]['ageinterval'])? $lead_result[0]['ageinterval']:'';
	$checkup = isset($lead_result[0]['checkup'])? $lead_result[0]['checkup']:'';
	//$checkup = $lead_result[0]['checkup'];
	


		$str = '<input type="hidden" value="'.$entryid.'" id="entryid_in" />'; 
        $str .= '<p class="premiumcalculated">';
	$str .= 	render_result_string($str, $ageinterval, $checkup );
       
        $str .='</p>';
        //$str .= '<button type="button" id="proceedstep2" onclick="premium_cal_step_two()" class="btn btn-primary">Fortsæt</button>';
        echo $str;
    }else {

        echo 'no data';
    }
    die();
}

add_action( 'wp_ajax_show_result_on_page_load_for_step_two', 'show_result_on_page_load_for_step_two' );
add_action( 'wp_ajax_nopriv_show_result_on_page_load_for_step_two', 'show_result_on_page_load_for_step_two' );


function checkUserIDNumber($entryid){
	global $wpdb;
    $table_name = $wpdb->prefix.'ij_dental_premium_leads'; 
	
	
	$entryid = $wpdb->get_var("SELECT `entryid` FROM $table_name  WHERE entryid = $entryid");
	
	return $entryid;
	
}
function  calculate_dental_premium_denk(){
	
	//print_r($_POST);
	
	 
    global $wpdb;
    $table_name = $wpdb->prefix.'ij_dental_premium_leads'; 
	
if( ( isset( $_POST['ageinterval'] ) && $_POST['ageinterval'] !=0 ) && isset( $_POST['checkup'] )  ){
   
    $entryidp = isset($_POST['entryidonentry']) && !empty($_POST['entryidonentry']) ? $_POST['entryidonentry'] : '';
    $ageinterval = isset($_POST['ageinterval']) && !empty($_POST['ageinterval']) ? $_POST['ageinterval'] : '';
    $checkup = isset($_POST['checkup']) && !empty($_POST['checkup']) ? $_POST['checkup'] : '';  
    $currentDate =  date("Y-m-d"); 
	
	$entryid = checkUserIDNumber($entryidp);
   
   
   

    //Check either table exist not 
    $showtableQry = "SHOW TABLES LIKE '%ij_dental_premium_leads%'";
    $showTbl = $wpdb->query($showtableQry);
if($showTbl) {
	
	if($entryid > 0){
	   
	$data_update = array('ageinterval' => $ageinterval ,'checkup' => $checkup, 'created_at' => $currentDate );
	$data_where = array('entryid' => $entryid);
	$wpdb->update($table_name , $data_update, $data_where);
   }else {
	   
	   $wpdb->insert( 

        $table_name, 

        array( 

            'entryid' 			=>  $entryidp ,
            'ageinterval' 		=>  $ageinterval ,
            'checkup' 			=>  $checkup ,
            'created_at' 		=>  $currentDate
        ) 

    );
   }
	
	
     
}
   
	$str = '<input type="hidden" value="'.$entryid.'" id="entryid_in" />'; 
	$str .= '<p class="premiumcalculated">';
	$str .=  render_result_string($str, $ageinterval, $checkup );
	$str .='</p>';
	$str .= '<button type="button" id="proceedstep2"   onclick="premium_cal_step_two()" class="btn btn-primary">Fortsæt</button>';
        echo $str;
		
		
		
		
    }else {

        echo 'no data';
    }
    die();
}

add_action( 'wp_ajax_calculate_dental_premium_denk', 'calculate_dental_premium_denk' );
add_action( 'wp_ajax_nopriv_calculate_dental_premium_denk', 'calculate_dental_premium_denk' );



function  step_two_calculate_dental_premium_update_form(){

    
    if( !empty($_POST['entryid']) )
    $entryid =  isset($_POST['entryid']) ? $_POST['entryid'] : ''; 
    $nameofcompany =  isset($_POST['nameofcompany']) ? $_POST['nameofcompany'] : '';
    $address_company =  isset($_POST['address_company']) ? $_POST['address_company'] : '';
    $postnumber =  isset($_POST['postnumber']) ? $_POST['postnumber'] : '';
    $by =  isset($_POST['by']) ? $_POST['by'] : '';
    $cvr_number =  isset($_POST['cvr_number']) ? $_POST['cvr_number'] : '';
   
    global $wpdb;   
    $table_name = $wpdb->prefix.'ij_dental_premium_leads'; 

            
  
  
  $wpdb->update( 

    $table_name, 

    array( 
 
        'company_name' 					        => $nameofcompany, 
        'company_address' 					    => $address_company, 
        'company_postnumber' 				    => $postnumber, 
        'company_by' 				            => $by, 
        'cvr_number' 		                    => $cvr_number 
        

    ),

    array( 'entryid' => $entryid )

); 
        
       echo $entryid;
    die();
}

add_action( 'wp_ajax_step_two_calculate_dental_premium_update_form', 'step_two_calculate_dental_premium_update_form' );
add_action( 'wp_ajax_nopriv_step_two_calculate_dental_premium_update_form', 'step_two_calculate_dental_premium_update_form' );



function  step_three_calculate_dental_premium_update_form(){


    
    if( !empty($_POST['cp_name']) ) 
    $cp_name =  isset($_POST['cp_name']) ? $_POST['cp_name'] : '';
    $cp_email =  isset($_POST['cp_email']) ? $_POST['cp_email'] : '';
    $cp_phone =  isset($_POST['cp_phone']) ? $_POST['cp_phone'] : '';
    $catchentryid_in_step3 =  isset($_POST['catchentryid_in_step3']) ? $_POST['catchentryid_in_step3'] : '';
 

    global $wpdb;   
    $table_name = $wpdb->prefix.'ij_dental_premium_leads'; 

            
  
  
 $updateqp =  $wpdb->update( 

    $table_name, 

    array( 
  
        'name_cp' 	=> $cp_name, 
        'email_cp'  => $cp_email, 
        'phone_cp' 	=> $cp_phone

      

    ),

    array( 'entryid' => $catchentryid_in_step3 )

); 
echo $catchentryid_in_step3;
 
        
    die();
}

add_action( 'wp_ajax_step_three_calculate_dental_premium_update_form', 'step_three_calculate_dental_premium_update_form' );
add_action( 'wp_ajax_nopriv_step_three_calculate_dental_premium_update_form', 'step_three_calculate_dental_premium_update_form' );




function  step_four_calculate_dental_premium_update_form(){


    
    if( !empty($_POST['sta_name']) ) 
    
	$sta_name =  isset($_POST['sta_name']) ? $_POST['sta_name'] : '';
	$sta_email =  isset($_POST['sta_email']) ? $_POST['sta_email'] : '';
	$csta_phone =  isset($_POST['csta_phone']) ? $_POST['csta_phone'] : '';


    $catchentryid_in_step4 =  isset($_POST['catchentryid_in_step4']) ? $_POST['catchentryid_in_step4'] : '';
 

     
    global $wpdb;   
    $table_name = $wpdb->prefix.'ij_dental_premium_leads'; 

            
  
  
 $updateqp =  $wpdb->update( 

    $table_name, 

    array( 
  
		'name_sta' 				                => $sta_name,
		'email_sta' 				            => $sta_email,
		'phone_sta' 				            => $csta_phone

        

    ),

    array( 'entryid' => $catchentryid_in_step4 )

);  

        echo $catchentryid_in_step4;
        
    die();
}

add_action( 'wp_ajax_step_four_calculate_dental_premium_update_form', 'step_four_calculate_dental_premium_update_form' );
add_action( 'wp_ajax_nopriv_step_four_calculate_dental_premium_update_form', 'step_four_calculate_dental_premium_update_form');





function  step_five_calculate_dental_premium_update_form(){


    
    if( !empty($_POST['aots_name']) ) 
    
	 


    $catchentryid_in_step4 =  isset($_POST['catchentryid_in_step4']) ? $_POST['catchentryid_in_step4'] : '';
	$aots_name =  isset($_POST['aots_name']) ? $_POST['aots_name'] : '';
    $aots_email =  isset($_POST['aots_email']) ? $_POST['aots_email'] : '';
    $aots_phone =  isset($_POST['aots_phone']) ? $_POST['aots_phone'] : '';  
	
    global $wpdb;   
    $table_name = $wpdb->prefix.'ij_dental_premium_leads'; 

            
  
  
 $updateqp =  $wpdb->update( 

    $table_name, 

    array( 
  
		'name_aots' 				            => $aots_name,
        'email_aots' 				            => $aots_email,
        'phone_aots' 				            => $aots_phone
 

    ),

    array( 'entryid' => $catchentryid_in_step4 )

);  

// ij_send_emails
// fetch_this_record($catchentryid_in_step4);

ij_send_emails($catchentryid_in_step4);
         echo "Step final";
        
    die();
}

add_action( 'wp_ajax_step_five_calculate_dental_premium_update_form', 'step_five_calculate_dental_premium_update_form' );
add_action( 'wp_ajax_nopriv_step_five_calculate_dental_premium_update_form', 'step_five_calculate_dental_premium_update_form');



add_filter( 'body_class','ij_add_class_to_body_tag' );
function ij_add_class_to_body_tag( $classes ) {
    global $post;
   // $post_slug = $post->post_name;
    $post_slug = 'dansk-insurance-calculator';
    $classes[] = $post_slug;
     
    return $classes;
     
}
?>