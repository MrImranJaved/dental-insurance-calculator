// document.getElementById("proceedstep2").addEventListener("click", premium_cal_step_two);

 



function ValidateEmail(mail) 
{

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(mail.match(mailformat)) {
        // alert("You have entered valid email address!")

    return (true)
  }
    // alert("You have entered an invalid email address!")
    return (false)
}


function validate_form_step_three(){

    console.log("Step Three");
    
    var flag = false; 
    var cp_name = document.getElementById('cp_name').value;
    var cp_email = document.getElementById('cp_email').value;
    var cp_phone = document.getElementById('cp_phone').value;


    
      
    if( cp_name == ''  ){
        flag = true;
        jQuery('span.step3validation').eq(0).show()

    }else {
        jQuery('span.step3validation').eq(0).hide()
    } 
    
    if( cp_email == ''  ){
        
        flag = true;
        jQuery('span.step3validation').eq(1).text("Enter  Email address")
        jQuery('span.step3validation').eq(1).show();
        
    }else {
        var checkemailFormat = ValidateEmail(cp_email);
        if(checkemailFormat == false){
            
            flag = true;
            jQuery('span.step3validation').eq(1).text("Enter correct Email address")
            jQuery('span.step3validation').eq(1).show();
            console.log(checkemailFormat)
            
        }else {
            jQuery('span.step3validation').eq(1).hide()


        }
    }
    
    
    if( cp_phone == ''  ){

        flag = true;
        jQuery('span.step3validation').eq(2).show()

    }else {
        jQuery('span.step3validation').eq(2).hide()
    } 

    let catchentryid_in_step3 = window.localStorage.getItem('useridNumber');

    if(flag == false){
        var dataString =   'cp_name='+cp_name+'&cp_email='+cp_email+'&cp_phone='+cp_phone+'&catchentryid_in_step3='+catchentryid_in_step3;
    console.log(dataString); 

     jQuery.post({  
        type: 'POST',  
        url: premium_dental_calculator_ajax_object.ajax_url+'?action=step_three_calculate_dental_premium_update_form',  
        data: dataString,  
        success: function(res) {  
            
             
            console.log(res); 
            jQuery(".step-three").hide()
            jQuery(".step-four").show()
            jQuery("#catchentryid_in_step4").html('<input type="hidden"  value="'+res+'" />')
			window.localStorage.setItem('thirdstep', 'done');
			window.localStorage.setItem('secondstep', 'null');
			window.localStorage.setItem('firststep', 'secondsteppassed');
            
            
        } 
    }); 
    }

 }
 function validate_form_step_four(){
    var flag = false;

    var sta_name = document.getElementById('sta_name').value;
    var sta_email = document.getElementById('sta_email').value;
    var csta_phone = document.getElementById('csta_phone').value;


    
     
    if( sta_name == ''  ){

        flag = true;
        jQuery('span.step4validation').eq(0).show()

    }else {
        jQuery('span.step4validation').eq(0).hide()
    } 
    
    if( sta_email == ''  ){
        

        flag = true;
        jQuery('span.step4validation').eq(1).text("Enter Email address")
        jQuery('span.step4validation').eq(1).show()

    }else {

        var checkemailFormat = ValidateEmail(sta_email);
        if(checkemailFormat == false){
            
            flag = true;
            jQuery('span.step4validation').eq(1).text("Enter correct Email address")
            jQuery('span.step4validation').eq(1).show();
            console.log(checkemailFormat)
            
        }else {
            jQuery('span.step4validation').eq(1).hide()


        }
        
   } 
    if( csta_phone == ''  ){

        flag = true;
        jQuery('span.step4validation').eq(2).show()

    }else {
        jQuery('span.step4validation').eq(2).hide()
    } 

    
    let catchentryid_in_step4 = window.localStorage.getItem('useridNumber');
    if(flag == false){
        var dataString =   'sta_name='+sta_name+'&sta_email='+sta_email+'&csta_phone='+csta_phone+'&catchentryid_in_step4='+catchentryid_in_step4;
    console.log(dataString); 

     jQuery.post({  
        type: 'POST',  
        url: premium_dental_calculator_ajax_object.ajax_url+'?action=step_four_calculate_dental_premium_update_form',  
        data: dataString,  
        success: function(res) {  
            
             
            console.log(res); 
            jQuery(".step-four").hide()
            jQuery(".step-five").show()
            jQuery("#catchentryid_in_step5").html('<input type="hidden"  value="'+res+'" />')
			
			window.localStorage.setItem('fourthstep', 'done');
			window.localStorage.setItem('secondstep', 'null');
			window.localStorage.setItem('thirdstep', 'null');
			window.localStorage.setItem('firststep', 'secondsteppassed');

            
            
        } 
    }); 
    }
    
 }


 function validate_form_step_five(){
    var flag = false;

    
 
    var aots_name = document.getElementById('aots_name').value;
    var aots_email = document.getElementById('aots_email').value;
    var aots_phone = document.getElementById('aots_phone').value; 
    var memberoflf = document.getElementById('memberoflf').value; 
    var danks_share_my_info = document.getElementById('danks_share_my_info').value; 
    var weareregistered = document.getElementById('weareregistered').value; 

    
    if( aots_name == ''  ){

        flag = true;
        jQuery('span.step5validation').eq(0).show()

    }else {
        jQuery('span.step5validation').eq(0).hide()
    } 
    
    if( aots_email == ''  ){
             flag = true;
           jQuery('span.step5validation').eq(1).text("Enter Email address")
           jQuery('span.step5validation').eq(1).show()

    }else {
        var checkemailFormat = ValidateEmail(aots_email);
        if(checkemailFormat == false){
            
            flag = true;
            jQuery('span.step5validation').eq(1).text("Enter correct Email address")
            jQuery('span.step5validation').eq(1).show();
            console.log(checkemailFormat)
            
        }else {
            jQuery('span.step5validation').eq(1).hide()


        }
    }

    if( aots_phone == ''  ){

        flag = true;
        jQuery('span.step5validation').eq(2).show()

    }else {
        jQuery('span.step5validation').eq(2).hide()
    }
	
	
	 if( jQuery("#memberoflf").prop('checked') == false ){

        flag = true;
        jQuery('span.step5validation').eq(3).show()

    }else {
        jQuery('span.step5validation').eq(3).hide()
    }
	
	
	if( jQuery("#danks_share_my_info").prop('checked') == false ){

        flag = true;
        jQuery('span.step5validation').eq(4).show()

    }else {
        jQuery('span.step5validation').eq(4).hide()
    }
	
	if( jQuery("#weareregistered").prop('checked') == false ){

        flag = true;
        jQuery('span.step5validation').eq(5).show()

    }else {
        jQuery('span.step5validation').eq(5).hide()
    }
	
	
	
	
	
	
    let catchentryid_in_step4 = window.localStorage.getItem('useridNumber');
 
    if(flag == false){
        var dataString =   'aots_name='+aots_name+'&aots_email='+aots_email+'&aots_phone='+aots_phone+'&catchentryid_in_step4='+catchentryid_in_step4 ;
    console.log(dataString); 

     jQuery.post({  
        type: 'POST',  
        url: premium_dental_calculator_ajax_object.ajax_url+'?action=step_five_calculate_dental_premium_update_form',  
        data: dataString,  
        success: function(res) {  
            
             
            console.log(res); 
            jQuery(".step-five").html("")
            jQuery(".step-five").html("<h1 class='thankyoumessage'>Du vil blive kontaktet hurtigst muligt af en af vores medarbejdere.</h1>")
			
			
			window.localStorage.setItem('firststep', 'null');
			window.localStorage.setItem('secondstep', 'null');
			window.localStorage.setItem('thirdstep', 'null');
			window.localStorage.setItem('fourthstep', 'null');
			window.localStorage.setItem('fivestep', 'done');
			window.localStorage.setItem('useridNumber', 'done');
			 
           
		   
		   
        } 
    }); 
    }

 }
function validate_form_step_two(){

    var flag = false;

	var entryid_in = 	window.localStorage.getItem('useridNumber'); 
	var nameofcompany = document.getElementById('nameofcompany').value;
	var address_company = document.getElementById('address_company').value;
	var postnumber = document.getElementById('postnumber').value;
	var by = document.getElementById('by').value;
	var cvr_number = document.getElementById('cvr_number').value;

 

    if( nameofcompany == ''  ){

        flag = true;
        jQuery('span.required').eq(0).show()

    }else {
        jQuery('span.required').eq(0).hide()
    }


    if( address_company == ''  ){

        flag = true;
        jQuery('span.required').eq(1).show()

    }else {
        jQuery('span.required').eq(1).hide()
    } 


    if( postnumber == ''  ){

        flag = true;
        jQuery('span.required').eq(2).show()

    }else {
        jQuery('span.required').eq(2).hide()
    } 
    if( by == ''  ){

        flag = true;
        jQuery('span.required').eq(3).show()

    }else {
        jQuery('span.required').eq(3).hide()
    } 
    
    if( cvr_number == ''  ){

        flag = true;
        jQuery('span.required').eq(4).show()

    }else {
        jQuery('span.required').eq(4).hide()
    } 

     
    
    if(flag == false){
        var dataString =   'nameofcompany=' + nameofcompany + '&address_company=' + address_company+'&postnumber='+postnumber+'&by='+by+'&cvr_number='+cvr_number+'&entryid='+entryid_in;
    console.log(dataString); 

     jQuery.post({  
        type: 'POST',  
        url: premium_dental_calculator_ajax_object.ajax_url+'?action=step_two_calculate_dental_premium_update_form',  
        data: dataString,  
        success: function(res) {  
            
             
            console.log(res); 
            jQuery(".step-two").hide()
            jQuery(".step-three").show()
            jQuery("#catchentryid_in_step3").html('<input type="hidden"  value="'+res+'" />');
			window.localStorage.setItem('secondstep', 'done');
		 	window.localStorage.setItem('firststep', 'secondsteppassed');
            
        } 
    }); 
    }

    return false;
}

function premium_cal_step_two (){
    console.log("setp 2")
    jQuery('.step-one').hide()
    jQuery('#proceedstep2').hide()
	var entryid =  window.localStorage.getItem('useridNumber');
	window.localStorage.setItem('yourentrysaved', entryid);
	var entryTagForStepTwo = '<input type="hidden" value="'+entryid+'"  id="entryid_on_steptwo"/>';
	jQuery('.step-two').append(entryTagForStepTwo);
	
   jQuery('.step-two').show()
   return false;
    

}

function   premium_cal_step_one(){

   

}
function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
	
	
	
	function showResult (){
		
		
         
	var useridNumber = window.localStorage.getItem('useridNumber');
        var dataString = `entryidonentry=${useridNumber}`;
         console.log(dataString);
        
        jQuery.post({  
            type: 'POST',  
            url: premium_dental_calculator_ajax_object.ajax_url+'?action=show_result_on_page_load_for_step_two',  
            data: dataString,  
            success: function(res) {  
                
	console.log(res);
                if(res!='no data'){
                jQuery(".result").css('display',    'block');
                jQuery(".ageintervalerror_step1").css('display',    'none');
               // jQuery(".result-container").show();
                jQuery(".result").html('');
				jQuery("#StepOneSubmitted").val('1');
                //window.localStorage.setItem('firststep', 'done');

                function firstFormRes(res){
				return res;
				}
				
                jQuery(".result").show();
                jQuery(".result").append('<h2>Detaljer</h2>');
                
                // console.log(res);
                jQuery(".result").append(res)
            }else {
                    jQuery(".ageintervalerror_step1").css('display',    'block');
                    jQuery(".ageintervalerror_step1").css('color',    'red');
                    jQuery(".result").css('display',    'none');



                }
            } 
        }); 
        // return false;
       
           
		
	}
 function removeNulleditemsFromLocalStorage (){
	 
	var firststep = window.localStorage.getItem('firststep');
	var secondstep = window.localStorage.getItem('secondstep');
	var thirdstep = window.localStorage.getItem('thirdstep');
	var fourthstep = window.localStorage.getItem('fourthstep');
	var fifthstep = window.localStorage.getItem('fifthstep');
	 
	 
	 if(firststep=='null'){
		  
	  window.localStorage.removeItem('firststep');
		 
	 }else if(secondstep=='null'){
		  
	  window.localStorage.removeItem('secondstep');

		 
		 
	 }else if(thirdstep=='null'){
		  
	 window.localStorage.removeItem('thirdstep');
	 
	 } else if(fourthstep=='null'){
		  
	 window.localStorage.removeItem('fourthstep');
		 
		 
	 }else if(fifthstep=='null'){
		  
	 window.localStorage.removeItem('fifthstep');
		 
		 
	 }
	 
	 
 }
 
 function generate_random_number(){
	 
	  var randomNumber = getRandomInt(1000000 , 9999999);
        
		return randomNumber;
		//console.log( 'Random Number  ' +randomNumber);
 }
    jQuery( document ).ready(function($) {
  
  
	 jQuery("#showresult").on( "click" , function(e){ 
        e.preventDefault(); 
	
		 
			 console.log("HHH")
		var entryidonentry =  window.localStorage.getItem('useridNumber');
		if(entryidonentry > 0) {
			
			console.log(entryidonentry)
		
		var entryidonentry =  window.localStorage.getItem('useridNumber');
			
			
		} else {
			
		var entryidonentry = jQuery('#entryid-onentry').val();
			
		}

        
        var ageinterval =  jQuery("select#ageinterval option:selected").val();
         if( ageinterval == 0 ){
			 console.log(ageinterval)
			 jQuery(".ageintervalerror_step1").show();
			 
		 }else{
			 
			 jQuery(".ageintervalerror_step1").hide();
			 
        var ageinterval =  jQuery("select#ageinterval option:selected").val();
			 
		 }
        var checkup =  jQuery("select#checkup option:selected").val();
        var dataString = `ageinterval=${ageinterval}&checkup=${checkup}&entryidonentry=${entryidonentry}`;
         console.log(dataString);
        
        jQuery.post({  
            type: 'POST',  
            url: premium_dental_calculator_ajax_object.ajax_url+'?action=calculate_dental_premium_denk',  
            data: dataString,  
            success: function(res) {  
                
	console.log(res);
                if(res!='no data'){
                jQuery(".result").css('display',    'block');
                jQuery(".ageintervalerror_step1").css('display',    'none');
               // jQuery(".result-container").show();
                jQuery(".result").html('');
				jQuery("#StepOneSubmitted").val('1');
                window.localStorage.setItem('firststep', 'ok');
                window.localStorage.setItem('useridNumber', entryidonentry);

                function firstFormRes(res){
				return res;
				}
				
                jQuery(".result").show();
                jQuery(".result").append('<h2>Detaljer</h2>');
                
                // console.log(res);
                jQuery(".result").append(res)
            }else {
                    jQuery(".ageintervalerror_step1").css('display',    'block');
                    jQuery(".ageintervalerror_step1").css('color',    'red');
                    jQuery(".result").css('display',    'none');



                }
            } 
        }); 
         return false;
       
           

    } );
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
        jQuery('.required').hide()
     //   premium_cal_step_one();
		removeNulleditemsFromLocalStorage();
		var randomNumber = generate_random_number();
		jQuery('#entryid-onentry').val(randomNumber); 

		
		 
	 
	
		var yourentrysaved = window.localStorage.getItem('yourentrysaved');
		
        var firststep = window.localStorage.getItem('firststep');
        var secondstep = window.localStorage.getItem('secondstep');
        var thirdstep = window.localStorage.getItem('thirdstep');
        var fourthstep = window.localStorage.getItem('fourthstep');
        var fifthstep = window.localStorage.getItem('fivestep');
		
		
			
	
		
		
		if ( window.localStorage.getItem('firststep') === null ){
		
		jQuery('.full-width-contents').show(); 
			jQuery('.appointment-form').show(); 
			jQuery('.step-one').show();
		 console.log(' First step State  '+firststep)
		
	} else if ( firststep == 'ok' ){
		

			console.log(yourentrysaved);
			jQuery('.step-one').hide();
			jQuery('.appointment-form').show(); 
			jQuery('.full-width-contents').show(); 
			jQuery('.step-two').show(); 
			console.log( " GEt entry id in step two   " +yourentrysaved);
			showResult(yourentrysaved); 
		
		
		
		}  else if(secondstep == 'done' ){
			
			
			jQuery('.step-one').hide();
			jQuery('.step-two').hide();
			jQuery('.full-width-contents').show(); 
			jQuery('.appointment-form').show(); 
			jQuery('.step-three').show();
			showResult(yourentrysaved);
			console.log("three");
			window.localStorage.setItem('firststep', 'secondsteppassed');  
			
		} else if(thirdstep == 'done' ){
			
			
			jQuery('.step-one').hide();
			jQuery('.step-two').hide();
			jQuery('.step-three').hide();
			jQuery('.full-width-contents').show(); 
			jQuery('.appointment-form').show(); 
			jQuery('.step-four').show();
			showResult(yourentrysaved);
			console.log("four")
			window.localStorage.setItem('firststep', 'secondsteppassed');
			window.localStorage.setItem('secondstep', 'null');  
			
		} else if(fourthstep == 'done' ){
			
			
			jQuery('.step-one').hide();
			jQuery('.step-two').hide();
			jQuery('.step-three').hide();
			jQuery('.step-four').hide();
			jQuery('.full-width-contents').show(); 
			jQuery('.appointment-form').show(); 
			jQuery('.step-five').show();
			showResult(yourentrysaved);
			console.log("four")
			window.localStorage.setItem('firststep', 'secondsteppassed');
			window.localStorage.setItem('secondstep', 'null'); 
			window.localStorage.setItem('thirdstep', 'null'); 
			window.localStorage.setItem('Developer info', 'plugin Developed and designed by Imran Javed -> ij.dev.techscale@gmail.com');  
		}   
		
       
		const StepOneSubmitted = jQuery('#StepOneSubmitted').val();
         
		// console.log("First " + StepOneSubmitted);
		 //show first form if this is submitted
		 
		 if(StepOneSubmitted=='1'){
		 
		 console.log("First form submitted");
		  
		 
		 }
        
        var thisStepOne = jQuery('#thisStepOne').val();
        
        
        
		console.log("Ajax for Calculator Page ready");
        

        // $(window).scroll(function() {
        //     $(".result").css({
        //       "margin-top": ($(window).scrollTop()) + "px",
        //       "margin-left": ($(window).scrollLeft()) + "px"
        //     });
        //   });
        
        //jQuery('#page .banner').hide();        
     
});