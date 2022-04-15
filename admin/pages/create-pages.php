<?php
function dental_premium_calculator_page_creation () 
{


	$pagecontent = '<div class="appointment-form">
	<div class="appointment-form-holder">
			  <div class="step-one">
<script>


</script>
<input type="hidden" value=""  id="entryid-onentry" />
<input type="hidden" value="one"  id="thisStepOne" />
<input type="hidden" value=""  id="StepOneSubmitted" />
<h2>Beregn virksomhedens præmie pr. medarbejder</h2>
			</label>Vælg den gennemsnitlige aldersgruppe for medarbejderne<span class="ageintervalerror_step1" style="display:none;">Vælg den gennemsnitlige aldersgruppe for medarbejderne er påkrævet.</span></label>
			<select id="ageinterval" class="form-control form-control-sm">
			  <option value="0">Vælg den gennemsnitlige aldersgruppe for medarbejderne</option>
			  <option value="30-34">30 - 34</option>
			  <option value="35-39">35 - 39</option>
			  <option value="40-44">40 - 44</option>
			  <option value="45-49">45 - 49</option>
			  <option value="50-54">50 - 54</option>
			  <option value="55-59">55 - 59</option>
			  <option value="60-64">60 - 64</option> 
			</select>
			</label>Inkluderer ét årligt tandeftersyn og tandrensning</label>
			<select id="checkup" class="form-control form-control-sm">
			  <option value="Ja">Ja</option>
			  <option value="Nej">Nej</option>
			</select>
			<button type="button" id="showresult" class="btn btn-primary">Vis præmie</button>
			</div> <!-- End of left box -->
			<div class="step-two"  style="display: none;">
				<div class="form-group">
					<h2 class="formheading">Firma</h2>
				  </div>
				  <div class="form-group">
					<label for="nameofcompany">Firmanavn:<span class="required">Firmanavn er påkrævet.</span> </label>
					<input type="text" class="form-control" maxlength="30" id="nameofcompany">
				  </div>
				  <div class="form-group">
					<label for="address_company">Firma Adresse:<span class="required">Firma Adresse er påkrævet.</span></label>
					<input type="text" class="form-control"  maxlength="30" id="address_company">
				  </div>
				  <div class="form-group">
					<label for="postnumber">Postnummer: <span class="required"> Postnummer er påkrævet.</span></label>
					<input type="text" class="form-control" maxlength="10" id="postnumber">
				  </div>
				  <div class="form-group">
					<label for="by">By: <span class="required">By er påkrævet.</span></label>
					<input type="text" class="form-control" maxlength="30"  id="by">
				  </div>
				  <div class="form-group">
					<label for="cvr_number">CVR Nummer: <span class="required">CVR Nummer er påkrævet.</span></label>
					<input type="text" class="form-control" maxlength="16" id="cvr_number">
				  </div>
				  <button type="button" id="submitstep2" class="btn btn-primary" onclick="validate_form_step_two()">Næste</button>
				  </div>
				  <div class="step-three"  style="display: none;">
				  <div class="form-group">
				  <h2 class="formheading">Kontaktperson</h2>
				  </div>
				  <div class="form-group">
					<label for="cp_name">Navn: <span class="required step3validation"> Navn er påkrævet.</span></label>
					<input type="text" class="form-control" maxlength="30" id="cp_name">
				  </div>
				  <div class="form-group">
					<label for="cp_email">E-mail: <span class="required step3validation"> E-mail er påkrævet.</span></label>
					<input type="email" class="form-control" maxlength="30" id="cp_email">
				  </div>
				  <div class="form-group">
					<label for="cp_phone">Telefon: <span class="required step3validation"> Telefon er påkrævet.</span></label>
					<input type="number" class="form-control" maxlength="16" id="cp_phone">
				  </div>
				  <div class="hide" id="catchentryid_in_step3"></div>
				  <button type="button" id="submitstep3" class="btn btn-primary" onclick="validate_form_step_three()">Næste</button>
			</div>
			<div class="step-four"  style="display: none;">
				  <div class="form-group">
				  <h2 class="formheading">Underskriver på aftalen</h2>
				  </div>
				  <div class="form-group">
					<label for="sta_name">Navn: <span class="required step4validation">Navn er påkrævet.</span></label>
					<input type="text" class="form-control" maxlength="30" id="sta_name">
				  </div>
				  <div class="form-group">
					<label for="sta_email">E-mail: <span class="required step4validation">E-mail er påkrævet.</span></label>
					<input type="email" class="form-control" maxlength="30" id="sta_email">
				  </div>
				  <div class="form-group">
					<label for="csta_phone">Telefon:<span class="required step4validation">Telefon er påkrævet.</span></label>
					<input type="number" class="form-control" maxlength="16" id="csta_phone">
				  </div>
				  <button type="button" id="submitstep4" class="btn btn-primary" onclick="validate_form_step_four()">Næste</button>
				  <div class="hide" id="catchentryid_in_step4"></div>
		</div>
		<div class="step-five"  style="display: none;">
				  <div class="form-group">
					 	<h2 class="formheading">Administrator på ordningen</h2>
				  </div>
				  <div class="form-group">
					<label for="aots_name">Navn: <span class="required step5validation">Navn er påkrævet.</span></label>
					<input type="text" class="form-control" maxlength="30" id="aots_name">
				  </div>
				  <div class="form-group">
					<label for="aots_email">E-mail: <span class="required step5validation">E-mail er påkrævet.</span></label>
					<input type="email" class="form-control" maxlength="30" id="aots_email">
				  </div>
				  <div class="form-group">
					<label for="aots_phone">Telefon:<span class="required step5validation">Telefon er påkrævet.</span></label>
					<input type="number" class="form-control" maxlength="16" id="aots_phone">
				  </div>
<div class="form-group">
<input type="checkbox" id="memberoflf" name="memberoflf" value="no"><label for="memberoflf"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bekræfter, at jeg er aktivt medlem af L&F</font></font></font></font><span class="required step5validation" style="display: none;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dette er påkrævet.</font></font></font></font></span></label> 
					

				  </div>
<div class="form-group">
<input type="checkbox" id="danks_share_my_info" name="danks_share_my_info" value="no"><label for="danks_share_my_info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Bekræfter, at Dansk Tandforsikring og L&F må udveksle oplysninger </font></font></font></font></font></font><span class="required step5validation" style="display: none;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dette er påkrævet.</font></font></font></font></font></font></span></label>
					

				  </div>
<div class="form-group">
<input type="checkbox" id="weareregistered" name="weareregistered" value="no"><label for="weareregistered"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bekræfter at alle i organisationen tilmeldes og at vi er minimum 3 personer</font></font></font></font></font></font></font></font><span class="required step5validation" style="display: none;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dette er påkrævet.</font></font></font></font></font></font></font></font></span></label> 
					

				  </div>
				  <button type="button" id="submitstep5" class="btn btn-primary" onclick="validate_form_step_five()">Indsend</button>
				  <div class="hide" id="catchentryid_in_step5"></div>
		</div>
		</div>

			 <div class="result" style="display:none">
</div>
		</div>';

	$user_id	= get_current_user_id();
	$pages		= array ( 
					 
							'lf-beregner_slug' 	=> array(
							'title' 	=> 'LF Beregner'  
 						) 
				);
	foreach( $pages as $slug => $page )
	{
		$page_checker = get_option( $slug );
		if( empty( $page_checker ) )
		{
			$page_data = array(
				'post_type'		=> 'page',
				'post_title'	=> $page['title'],
				'post_content'	=> $pagecontent ,
				'post_status'	=> 'publish',
				'post_author'	=> $user_id
				
			);
			$new_page_id = wp_insert_post( $page_data );
			if ( $new_page_id && ! is_wp_error( $new_page_id ) ){

				update_option( $slug, $new_page_id );
				update_post_meta( $new_page_id, '_wp_page_template', 'fullwidth-template.php' ); 
			}
		}
	}
}
add_action('admin_init', 'dental_premium_calculator_page_creation');