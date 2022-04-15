<?php
if (!defined('ABSPATH')) exit;


function recordid(){

	global $wpdb;
	$ij_dental_premium_leads = $wpdb->prefix . 'ij_dental_premium_leads';
	$sqls = "SELECT * FROM $ij_dental_premium_leads";
	$leads_result = $wpdb->get_results($sqls, 'ARRAY_N');
	$numberOfLeadsFound =  count($leads_result); 
	$leadid ='';
	for( $i =0; $i <= $numberOfLeadsFound; $i++){ 
		$leadid = $leads_result[$i][0];
	}
		return $leadid;
}
function checkValueIssetOrNot($val){


	$val = isset($val) && !empty($val) ?  $val : '';
	return $val;
}

function ij_dental_premium_sale_leads_page()

{

	global $wpdb;

	$ij_dental_premium_leads = $wpdb->prefix . 'ij_dental_premium_leads';
	
	 
	
	 
	$NumberOfRecords = totalNumberofPage();
	 
	$page = 1;
	$records_per_page = 5;
	$start_from =  ($page - 1)* $records_per_page;
	
	$sqlP = "SELECT * FROM $ij_dental_premium_leads  ORDER BY ij_lead_id DESC   LIMIT $records_per_page OFFSET  $start_from";  
	$leadsP = $wpdb->get_results($sqlP, 'ARRAY_A');
	
	?>
<div class="ij-admin-container">
		<h1 class="ij-admin-heading" style=" margin: 0px 0 20px 0; font-size: 1.5rem;" >Dansk Tandforsikring - Tandpræmie - Salgsledere</h1>
		<div class="header_containerr"> 
		<div class="date_range flex">
		<div class="datelabel mlf10">
			<label for="from">Fra </label>
		</div>
		<div class="mlf10">
			<input type="text" id="from" name="from">
		</div>
		
		<div class="mlf10">
			<label for="to">Til </label>
		</div>
		<div class=" mlf10">
			<input type="text" id="to" name="to">
		</div>  
<button id="searchbydate" class=" searchbtn mlf10">Search</button>
<button id="todaysale" class="searchbtn mlf10" data-ajjkidate="1">Today</button>
<button id="downloadcsv" class="searchbtn mlf10" data-csv="1">Download CSV</button>
</div>
		<input value="" id="searchleads" maxlength="20" type="text" placeholder="enter cvr number to search"  />
		<button id="searchCVR_number" onclick="fetch_leads_data_for_search_box()" class=" searchbtn mlf10">Search by CVR </button>
		</div>
		<div style="clear:both;"></div>

		<hr />


		<table id="dental_leads_admin_screen" class="display" cellspacing="0" width="100%">

			<thead>

				<tr>


					<th>Seriel #</th>

					<th>Aldersinterval</th>

					<th>Inkluderer checkup</th>

					<th>Firma adresse</th>

					<th>Postnummer</th>

					<th>By</th>

					<th>CVR Nummer</th>  
					<th>Se detaljer</th>

				</tr>

			</thead>



			<tbody class="danskTableBody"><?php 
					foreach ($leadsP as  $single_lead) {

					?>
					
					<tr class="ui-state-default">
						<td>
							<?php echo checkValueIssetOrNot( $single_lead['ij_lead_id']);  ?>
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
							<button style="    padding: 10px 20px;" type="button"  class="btn btn-primary viewdetail" onclick="fetch_model_view(<?php echo checkValueIssetOrNot( $single_lead['ij_lead_id']) ?>);" data-toggle="modal" data-recordid="<?php echo checkValueIssetOrNot($single_lead['ij_lead_id']) ; ?>" data-target="#viewleaddetail">
							Se detaljer
							</button>
						</td>



					</tr>

				<?php
					}

				?></tbody> 

		</table>
		<br>
		<br>
		
		<?php if( $NumberOfRecords >= 10  ){  ?>
		<div class="homepage-paginition">
		<?php ij_pagination($page, $records_per_page); ?>
		</div>
		<?php } ?>
	</div> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	<!-- Modal -->
	<div class="modal fade" id="viewleaddetail" tabindex="-1" role="dialog" aria-labelledby="dentalpremiumsalesleads" aria-hidden="true">
		<div class="modal-dialog  modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="dentalpremiumsalesleads"> Beregnet præmie</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div> 

				<div class="modal-body dental_leads_admin_screen_model" style="display: none;" data-modelid=""> 
			</div>
			</div>
		</div>
	</div> 
<?php 
}

?>