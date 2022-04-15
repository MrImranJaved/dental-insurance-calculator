
function fetch_model_view (recordid){

 
    console.log(recordid); 
    var dataString = 'recordid='+ recordid;
    jQuery.post({  
        type: 'POST',  
        url: premium_dental_fetch_leads_data_ajax_object.ajax_url+'?action=func_fetch_leads_detail_ajax',  
        data: dataString,  
        success: function(res) {  
            
             
            // console.log(res);
            jQuery(".dental_leads_admin_screen_model").html('')
            jQuery(".dental_leads_admin_screen_model").append(res)
            jQuery(".dental_leads_admin_screen_model").show()
            
        } 
    });

}

 


function fetch_page_data(){

     
        
        
		
    $('.pageno').on("click", function (e) {

        e.preventDefault(); 
		$("#to").val('');
		$("#from").val('');
		$("#searchleads").val('');
        var pageno = $(this).data('pageno'); 
        $('.pageno').removeClass('active');
        $(this).addClass('active')
        console.log(pageno);

        var dataString = 'pageno='+ pageno;
        jQuery.post({  
            type: 'POST',  
            url: premium_dental_fetch_leads_data_ajax_object.ajax_url+'?action=admin_fetch_sales_record_on_page_click',  
            data: dataString,  
            success: function(res) {  
                
               //  console.log(res)
			   
                 jQuery('.danskTableBody').html('');
                 jQuery('.danskTableBody').append(res);
                 $("html").animate({ scrollTop: 0 }, "slow"); 
                
            } 
        });
    });
    
    
}



function fetch_leads_data_for_search_box(){

     

    
}


function todaysDate(){


    var d = new Date();
    var NoTimeDate = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();
    return NoTimeDate;
//console.log(NoTimeDate);
}



jQuery( document ).ready(function($) { 


    fetch_page_data();

	 jQuery("[data-pageno=1]").addClass('active');
   	 
  jQuery( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: false,
          showButtonPanel: false,
          numberOfMonths: 2
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        showButtonPanel: false,
        numberOfMonths: 2
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  
  
 
	 $('#searchCVR_number').on("click", function (e) { 
	 
	 e.preventDefault;
        console.log("Search tool active")
        let searchboxVal =  jQuery("#searchleads").val();
        var flag = false;
		if( searchboxVal ==''){
				flag = true;
			jQuery("#searchleads").css( "border" ,"1px solid red"  );
			
		}else {
			
			flag = false;
			jQuery("#searchleads").css( "border" ,"1px solid #8c8f94"  );
		}
		if(flag == false){
        console.log(searchboxVal);


        var dataString = 'searchquery='+ searchboxVal;
            jQuery.post({  
                type: 'POST',  
                url: premium_dental_fetch_leads_data_ajax_object.ajax_url+'?action=admin_fetch_sales_record_on_page_click',  
                data: dataString,  
                success: function(res) {  
                    
				console.log(res)
				jQuery('.homepage-paginition').hide();
				jQuery('.danskTableBody').html('');
				jQuery('.danskTableBody').append(res);
				$("#to").val('');
				$("#from").val('');  
                    
                } 
            }); 
    
		}else {
			return
		}
	 
	 });
	 $('#searchbydate').on("click", function (e) {
		 
			let fromDateVal = $("#from").val(); 
			let toDateVal = $("#to").val(); 
			let flag = false;
		
		if(fromDateVal=="" ){
			flag = true;
			$('#from').css("border", "1px solid red"); 
		}else {
			flag = false;
			let fromDateVal = $("#from").val(); 
			var FromdateArr = fromDateVal.split("/");
			// rearrange dateFormat 2022-03-21
			var rearragedFromDate =  FromdateArr[2]+'-'+FromdateArr[0]+'-'+FromdateArr[1];
			//console.log(rearragedFromDate);
			$('.fromdatereq').hide();
			
			
		}
		
		if(toDateVal=="" ){
			flag = true;
			 
			$('#to').css("border", "1px solid red");
			
		}else {
			flag = false;
			let toDateVal = $("#to").val(); 
			var TodateArr = toDateVal.split("/");
			// rearrange dateFormat 2022-03-21
			var rearragedToDate =  TodateArr[2]+'-'+TodateArr[0]+'-'+TodateArr[1];
			
			//console.log(rearragedToDate);
			$('.todatereq').hide();
			
			
		}
		 if(toDateVal &&  fromDateVal){
			//console.log("From date  "+ rearragedFromDate +"  To  " + rearragedToDate);
			
			
			     var dataString = `fromDateValue=${rearragedFromDate}&toDateValue=${rearragedToDate}`;
				 
				// console.log(dataString);
            jQuery.post({  
                type: 'POST',  
                url: premium_dental_fetch_leads_data_ajax_object.ajax_url+'?action=admin_fetch_sales_record_on_page_click',  
                data: dataString,  
                success: function(res) {  
                    
				jQuery('.homepage-paginition').hide();
				jQuery('.danskTableBody').html('');
				jQuery('.danskTableBody').append(res); 
				$("#searchleads").val('');
					
                    
                } 
            }); 
		 }
	});
	
	
	
	 $('#todaysale').on("click", function (e) {
		 
		let ajjkidate = $(this).data("ajjkidate");
		jQuery("#to").css("border" , "1px solid #8c8f94");			
		jQuery("#from").css("border" , "1px solid #8c8f94");			 
		jQuery("#searchleads").css("border" , "1px solid #8c8f94");			 
		
		 
		 if(ajjkidate  ){
			 
			     var dataString = `ajjkidate=${ajjkidate}`;
				 
				  console.log(dataString);
            jQuery.post({  
                type: 'POST',  
                url: premium_dental_fetch_leads_data_ajax_object.ajax_url+'?action=admin_fetch_sales_record_on_page_click',  
                data: dataString,  
                success: function(res) {  
                    
                  //   console.log(res)
                     jQuery('.homepage-paginition').hide();
                     jQuery('.danskTableBody').html('');
                     jQuery('.danskTableBody').append(res);
                    //  jQuery('.navigation').hide() 
					$("#to").val('');
					$("#from").val('');
					$("#searchleads").val('');
					
                    
                } 
            }); 
		 }
	});
	
	
	 $('#downloadcsv').on("click", function (e) {
		 
			let csv = $(this).data("csv");  
		
		 
		
		 
		 if(csv  ){
			//console.log("From date  "+ rearragedFromDate +"  To  " + rearragedToDate);
			
			
			     var dataString = `csv=${csv}`;
				 
				  console.log(dataString);
            jQuery.post({  
                type: 'POST',  
                url: premium_dental_fetch_leads_data_ajax_object.ajax_url+'?action=download_csv_file',  
                data: dataString,  
                success: function(data) { 

				
						var d = new Date().getTime();
					  
					  /*
					   * Make CSV downloadable
					   */
					  var downloadLink = document.createElement("a");
					  var fileData = ['\ufeff'+data];

					  var blobObject = new Blob(fileData,{
						 type: "text/csv;charset=utf-8;"
					   });

					  var url = URL.createObjectURL(blobObject);
					  downloadLink.href = url;
					  downloadLink.download = "dansk-insurance-leads-"+d+".csv";

					  /*
					   * Actually download CSV
					   */
					  document.body.appendChild(downloadLink);
					  downloadLink.click();
					  document.body.removeChild(downloadLink);
					
                    
                } 
            }); 
		 }
	});
	
});