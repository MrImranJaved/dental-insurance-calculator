<?php


function ij_send_emails ($entryid) {

    global $wpdb;
    $table_name = $wpdb->prefix.'ij_dental_premium_leads';
    $qry = " SELECT * FROM $table_name WHERE `entryid` =  $entryid  ";
    $result = $wpdb->get_results( $qry , 'ARRAY_A' ); 

    $ageinterval =   isset($result[0]['ageinterval']) ? $result[0]['ageinterval'] :'';
    $checkup =   isset($result[0]['checkup']) ? $result[0]['checkup'] :'';
    $company_name =   isset($result[0]['company_name']) ? $result[0]['company_name'] :'';
    $company_address =   isset($result[0]['company_address']) ? $result[0]['company_address'] :'';
    $company_postnumber =   isset($result[0]['company_postnumber']) ? $result[0]['company_postnumber'] :'';
    $company_by =   isset($result[0]['company_by']) ? $result[0]['company_by'] :'';
    $cvr_number =   isset($result[0]['cvr_number']) ? $result[0]['cvr_number'] :'';
    $name_cp =   isset($result[0]['name_cp']) ? $result[0]['name_cp'] :'';
    $email_cp =   isset($result[0]['email_cp']) ? $result[0]['email_cp'] :'';
    $phone_cp =   isset($result[0]['phone_cp']) ? $result[0]['phone_cp'] :'';
    $name_sta =   isset($result[0]['name_sta']) ? $result[0]['name_sta'] :'';
    $email_sta =   isset($result[0]['email_sta']) ? $result[0]['email_sta'] :'';
    $phone_sta =   isset($result[0]['phone_sta']) ? $result[0]['phone_sta'] :'';
    $name_aots =   isset($result[0]['name_aots']) ? $result[0]['name_aots'] :'';
    $email_aots =   isset($result[0]['email_aots']) ? $result[0]['email_aots'] :'';
    $phone_aots =   isset($result[0]['phone_aots']) ? $result[0]['phone_aots'] :'';

    
    $emailTemp =  '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta content="telephone=no" name="format-detection">
    <meta content="width=mobile-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;" name="viewport">
    <meta content="IE=9; IE=8; IE=7; IE=EDGE;" http-equiv="X-UA-Compatible">
    <title>Email Newsletter01</title>
    
    <style type="text/css">
    
    /**This is to overwrite Outlook.com’s Embedded CSS************/
    table {border-collapse:separate;}
    a, a:link, a:visited {text-decoration: none; color: #00788a}
    h2,h2 a,h2 a:visited,h3,h3 a,h3 a:visited,h4,h5,h6,.t_cht {color:#000 !important}
    p {margin-bottom: 0}
    .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td {line-height: 100%}
    /**This is to center your email in Outlook.com************/
    .ExternalClass {width: 100%;}
    
    /* General Resets */
    #outlook a {padding:0;}
    body, #body-table {height:100% !important; width:100% !important; margin:0 auto; padding:0; line-height:100%; !important}
    img, a img {border:0; outline:none; text-decoration:none;}
    .image-fix {display:block;}
    table, td {border-collapse:collapse;}
    
    /* Client Specific Resets */
    .ReadMsgBody {width:100%;} .ExternalClass{width:100%;}
    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100% !important;}
    .ExternalClass * {line-height: 100% !important;}
    table, td {mso-table-lspace:0pt; mso-table-rspace:0pt;}
    img {outline: none; border: none; text-decoration: none; -ms-interpolation-mode: bicubic;}
    body, table, td, p, a, li, blockquote {-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%;}
    body.outlook img {width: auto !important;max-width: none !important;}
    
    /* Start Template Styles */
    /* Main */
    body{ -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
    body, #body-table {background-color: #000000 margin:0 auto !important;; margin:0 auto !important; text-align:center !important;}
    p {padding:0; margin: 0; line-height: 24px; font-family: Open Sans, sans-serif;}
    a, a:link {color: #1c344d;text-decoration: none !important;}
    .footer-link a, .nav-link a {color: #fff6e5;}
    
    /* Yahoo Mail */
    .thread-item.expanded .thread-body{background-color: #000000 !important;}
    .thread-item.expanded .thread-body .body, .msg-body{display:block !important;}
    #body-table .undoreset table {display: table !important;table-layout: fixed !important;}
    
    /* Start Media Queries */
    @media only screen and (max-width: 640px) {
        a[href^="tel"], a[href^="sms"] {text-decoration: none;pointer-events: none;	cursor: default;}
        .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration: default;	pointer-events: auto;cursor: default;}	
        *[class].full-width {width: 100%!important;}
        *[class].mobile-width {width: 440px !important; padding: 0 4px;}
        *[class].content-width {width: 360px!important;}
        *[class].content-width-menu {width: 360px!important;}
        *[class].center {text-align:center !important; height:auto !important;}
        *[class].center-stack {padding-bottom:30px !important; text-align:center !important; height:auto !important;}
        *[class].stack {padding-bottom:30px !important; height: auto !important;}
        *[class].gallery {padding-bottom: 20px!important;}
        *[class].fluid-img {height:auto !important; max-width:600px !important; width: 100% !important;}
        *[class].block {display: block!important;}
        *[class].midaling { width:100% !important; border:none !important; }
    }
    @media only screen and (max-width: 480px) {
        *[class].full-width {width: 100%!important;}
        *[class].mobile-width {width: 320px!important; padding: 0 4px;}
        *[class].content-width {width: 240px!important;}
        *[class].content-width-menu {width: 320px!important;}
        *[class].navlink {font-size:13px !important;}
        *[class].center {text-align:center !important; height:auto !important;}
        *[class].center-stack {padding-bottom:30px !important; text-align:center !important; height:auto !important;}
        *[class].stack {padding-bottom:30px !important; height: auto !important;}
        *[class].gallery {padding-bottom: 20px!important;}
        *[class].fluid-img {height:auto !important; max-width:600px !important; width: 100% !important; min-width:320px !important;}
        *[class].midaling { width:100% !important; border:none !important; }
        *[class].navlink{ width:600px !important; border:none !important; }
    }
    @media only screen and (max-width: 320px) {
        *[class].full-width {width: 100%!important;}
        *[class].mobile-width {width: 100%!important; padding: 0 4px;}
        *[class].content-width {width: 240px!important;}
        *[class].center {text-align:center !important; height:auto !important;}
        *[class].center-stack {padding-bottom:30px !important; text-align:center !important; height:auto !important;}
        *[class].stack {padding-bottom:30px !important; height: auto !important;}
        *[class].gallery {padding-bottom: 20px!important;}
        *[class].fluid-img {height:auto !important; max-width:600px !important; width: 100% !important; min-width:320px !important;}
        *[class].midaling { width:100% !important; border:none !important;}
    }
    </style>
    </head>
    <body bgcolor="#000000" style="background:#000;">
    
        <!-- Start of banner -->
        <table id="body-table" align="center" width="100%" bgcolor="#e6e5e7" cellspacing="0" cellpadding="0" border="0" style="table-layout:fixed;">
            <tbody>
                <tr>
                    <td valign="top" align="center">
                        <table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0" class="mobile-width">
                            <tbody>
                                <tr>
                                    <td valign="top" bgcolor="#ffffff" align="center">
                                     
                                        
                                        <!-- After Menu Start -->
                                        <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="mobile-width">
                                            <tbody>
                                                <tr>
                                                    <td align="center">	
                                                      
                                                    
                                                        <!-- Start Space -->
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                        <tbody>
                                                        <tr>
                                                            <td width="25" height="24" style="background: #e6e5e7; font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td></tr>
                                                        <tr>
                                                            <td width="25" height="24" style="background: #e6e5e7; font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td></tr>
                                                        <tr>
                                                            <td width="25" height="24" style="background: #e6e5e7; font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td></tr>
                                                            <tr><td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p></td></tr>
                                                            <tr><td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;  padding: 0 0 10px 0; text-align: center;   border-bottom:1px solid #eee;">														
                                                            <img src="https://dansktandforsikring.dk/wp-content/uploads/2014/12/DTF_logo_Global_300x55.png">
                                                            </td></tr><tr><td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td></tr><tr>
                                                            <td height="44" style="font-size:40px; mso-line-height-rule:exactly; font-weight: bold; font-family: Open Sans, sans-serif; line-height:40px; text-align: center;">Beregn din præmie</td>
                                                             
                                                        </tr>
                                                        
                                                    <tr><td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td></tr></tbody>
                                                        </table>
                                                        <!-- End Space -->
                                                    
                                                         
                                                     
                                                        <!-- Section Aldersinterval Start -->
                                                        <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="mobile-width">
                                                        <tbody>
                                                        <tr style="background:#357ebd ; padding: 10px;"><td align="left" style="font-size:20px; text-align: center; padding: 25px 0; color:#fff; font-weight:bolder; font-family: Open Sans, sans-serif;">
                                                        Aldersinterval</td></tr>
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                        <tbody>
                                                        <tr>
                                                        <td height="52">&nbsp;</td>
                                                        </tr>
                                                        </tbody>
                                                        </table><tr>	
                                                        <td align="center">														
                                                        <!-- Start Block Content -->
                                                        <table width="550" align="center" cellspacing="0" cellpadding="0" border="0" class="content-width">
                                                        <tbody>
        
                                                        <tr>
                                                        <td align="center">
                                                        <!-- Start Column 1 -->
                                                        <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                        <tbody>	
                                                        <tr><td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                        <p style="padding-left: 30px;"> </p>
                                                        </td></tr>																		
                                                        <tr>
                                                        <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">Aldersinterval</td>
                                                        </tr>																			
                                                        <tr>
                                                        <td class="center-stack"></td>
                                                        </tr>
                                                        </tbody>
                                                        </table>																		
                                                        <!-- End Column 1 -->
        
                                                        <!-- Start Space -->
                                                        <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                        <tbody>
                                                        <tr>
                                                        <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                        <p style="padding-left: 30px;"> </p>
                                                        </td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                        <!-- End Space -->
        
                                                        <!-- Start Column 2 -->
                                                        <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                        <tbody>	
                                                        <tr><td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                        <p style="padding-left: 30px;"> </p>
                                                        </td></tr>																			
                                                        <tr>
                                                        <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$ageinterval.'</td>
                                                        </tr>  
                                                        <tr>
                                                        <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                        </tr> 
                                                        <tr>
                                                        <td class="center-stack"></td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                        <!-- End Column 2 -->
                                                        <!-- Start Column 1 -->
                                                        <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                        <tbody>																			
                                                        <tr>
                                                        <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">Inkluderer checkup </td>
                                                        </tr>																			
                                                        <tr>
                                                        <td class="center-stack"></td>
                                                        </tr>
                                                        </tbody>
                                                        </table>																		
                                                        <!-- End Column 1 -->
        
                                                        <!-- Start Space -->
                                                        <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                        <tbody>
                                                        <tr>
                                                        <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                        <p style="padding-left: 30px;"> </p>
                                                        </td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                        <!-- End Space -->
        
                                                        <!-- Start Column 2 -->
                                                        <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                        <tbody>																				
                                                        <tr>
                                                        <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$checkup.' </td>
                                                        </tr>  
                                                        <tr>
                                                        <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                        </tr> 
                                                        <tr>
                                                        <td class="center-stack"></td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                        <!-- End Column 2 -->
                                                        </td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                        <!-- End Block Content -->
        
                                                        <!-- Start Space -->
                                                        
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                        <tbody>
                                                        <tr>
                                                        <td height="52">&nbsp;</td>
                                                        </tr>
                                                        </tbody>
                                                        </table><!-- End Space -->
                                                        </td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                        <!-- Section Aldersinterval End -->
        
        
                                                        <!-- Section Firma Start -->
                                                        <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="mobile-width">
                                                        <tbody>
                                                        <tr style="background:#357ebd ; padding: 10px;"><td align="left" style="font-size:20px; text-align: center; padding: 25px 0; color:#fff; font-weight:bolder; font-family: Open Sans, sans-serif;">
                                                            Firma</td></tr>
                                                        <tr>	
                                                        <td align="center">														
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                        <tbody>
                                                        <tr>
                                                        <td height="52">&nbsp;</td>
                                                        </tr>
                                                        </tbody>
                                                        </table><!-- Start Block Content -->
                                                        <table width="550" align="center" cellspacing="0" cellpadding="0" border="0" class="content-width">
                                                        <tbody>
        
                                                        <tr>
                                                        <td align="center">
                                                        <!-- Start Column 1 -->
                                                        <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                        <tbody>	
                                                        <tr><td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                        <p style="padding-left: 30px;"> </p>
                                                        </td></tr>																		
                                                        <tr>
                                                        <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">Navn </td>
                                                        </tr>																			
                                                        <tr>
                                                        <td class="center-stack"></td>
                                                        </tr>
                                                        </tbody>
                                                        </table>																		
                                                        <!-- End Column 1 -->
        
                                                        <!-- Start Space -->
                                                        <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                        <tbody>
                                                        <tr>
                                                        <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                        <p style="padding-left: 30px;"> </p>
                                                        </td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                        <!-- End Space -->
        
                                                        <!-- Start Column 2 -->
                                                        <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                        <tbody>	
                                                        <tr><td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                        <p style="padding-left: 30px;"> </p>
                                                        </td></tr>																			
                                                        <tr>
                                                        <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$company_name.'</td>
                                                        </tr>  
                                                        <tr>
                                                        <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                        </tr> 
                                                        <tr>
                                                        <td class="center-stack"></td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                        <!-- End Column 2 -->
                                                        <!-- Start Column 1 -->
                                                        <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                        <tbody>																			
                                                        <tr>
                                                        <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">Adresse </td>
                                                        </tr>																			
                                                        <tr>
                                                        <td class="center-stack"></td>
                                                        </tr>
                                                        </tbody>
                                                        </table>																		
                                                        <!-- End Column 1 -->
        
                                                        <!-- Start Space -->
                                                        <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                        <tbody>
                                                        <tr>
                                                        <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                        <p style="padding-left: 30px;"> </p>
                                                        </td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                        <!-- End Space -->
        
                                                        <!-- Start Column 2 -->
                                                        <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                        <tbody>																				
                                                        <tr>
                                                        <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$company_address.' </td>
                                                        </tr>  
                                                        <tr>
                                                        <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                        </tr> 
                                                        <tr>
                                                        <td class="center-stack"></td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                        <!-- End Column 2 -->

                                                        <!-- Start row 3 -->
                                                        <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>																			
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">Postnummer </td>
                                                            </tr>																			
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>			 
        
                                                            <!-- Start Space -->
                                                            <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                            <tbody>
                                                            <tr>
                                                            <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Space -->
         
                                                            <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>																				
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$company_postnumber.' </td>
                                                            </tr>  
                                                            <tr>
                                                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                            </tr> 
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End row 3 -->


                                                        <!-- Start row 3 -->
                                                        <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>																			
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">By </td>
                                                            </tr>																			
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>			 
        
                                                            <!-- Start Space -->
                                                            <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                            <tbody>
                                                            <tr>
                                                            <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Space -->
         
                                                            <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>																				
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$company_by.' </td>
                                                            </tr>  
                                                            <tr>
                                                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                            </tr> 
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End row 3 -->
        
                                                            <!-- Start row 4 -->
                                                        <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>																			
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">CVR Nummer </td>
                                                            </tr>																			
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>			 
        
                                                            <!-- Start Space -->
                                                            <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                            <tbody>
                                                            <tr>
                                                            <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Space -->
         
                                                            <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>																				
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$cvr_number.' </td>
                                                            </tr>  
                                                            <tr>
                                                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                            </tr> 
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End row 4 -->
                                                        </td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                        <!-- End Block Content -->
        
                                                        <!-- Start Space -->
                                                        
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                        <tbody>
                                                        <tr>
                                                        <td height="52">&nbsp;</td>
                                                        </tr>
                                                        </tbody>
                                                        </table><!-- End Space -->
                                                        </td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                        <!-- Section Firma End -->
                                                         
                                                         
        
                                                        <!-- Section Kontaktperson Start -->
                                                        <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="mobile-width">
                                                            <tbody>
                                                            <tr style="background:#357ebd ; padding: 10px;"><td align="left" style="font-size:20px; text-align: center; padding: 25px 0; color:#fff; font-weight:bolder; font-family: Open Sans, sans-serif;">
                                                                Kontaktperson</td></tr>
                                                            <tr>	
                                                            <td align="center">														
                                                            <!-- Start Block Content -->
                                                            <table width="550" align="center" cellspacing="0" cellpadding="0" border="0" class="content-width">
                                                            <tbody>
        
                                                            <tr>
                                                            <td align="center">
                                                            <!-- Start row 1 -->
                                                            <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>	
                                                            <tr><td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td></tr>																		
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">Navn</td>
                                                            </tr>																			
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>																		
                                                            <!-- End row 1 -->
        
                                                            <!-- Start Space -->
                                                            <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                            <tbody>
                                                            <tr>
                                                            <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Space -->
        
                                                            <!-- Start row 2 -->
                                                            <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>	
                                                            <tr><td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td></tr>																			
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$name_cp.'</td>
                                                            </tr>  
                                                            <tr>
                                                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                            </tr> 
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>  
                                                            <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>																			
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">E-mail </td>
                                                            </tr>																			
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>																		
                                                            <!-- End Column 1 -->
        
                                                            <!-- Start Space -->
                                                            <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                            <tbody>
                                                            <tr>
                                                            <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Space -->
        
                                                            <!-- Start Column 2 -->
                                                            <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>																				
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$email_cp.' </td>
                                                            </tr>  
                                                            <tr>
                                                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                            </tr> 
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Column 2 -->
                                                            <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                                <tbody>																			
                                                                <tr>
                                                                <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">Telefon </td>
                                                                </tr>																			
                                                                <tr>
                                                                <td class="center-stack"></td>
                                                                </tr>
                                                                </tbody>
                                                                </table>																		
                                                                <!-- End Column 1 -->
            
                                                                <!-- Start Space -->
                                                                <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                                <tbody>
                                                                <tr>
                                                                <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                                <p style="padding-left: 30px;"> </p>
                                                                </td>
                                                                </tr>
                                                                </tbody>
                                                                </table>
                                                                <!-- End Space -->
            
                                                                <!-- Start Column 2 -->
                                                                <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                                <tbody>																				
                                                                <tr>
                                                                <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$phone_cp.' </td>
                                                                </tr>  
                                                                <tr>
                                                                <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                                </tr> 
                                                                <tr>
                                                                <td class="center-stack"></td>
                                                                </tr>
                                                                </tbody>
                                                                </table>
                                                                <!-- End Column 2 -->
                                                            </td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Block Content -->
        
                                                            <!-- Start Space -->
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>
                                                            <tr>
                                                            <td height="52">&nbsp;</td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Space -->
                                                            </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                            <!-- Section Kontaktperson End -->
        
                                                        <!-- Section Underskriver på aftalen Start -->
                                                        <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="mobile-width">
                                                            <tbody>
                                                            <tr style="background:#357ebd ; padding: 10px;"><td align="left" style="font-size:20px; text-align: center; padding: 25px 0; color:#fff; font-weight:bolder; font-family: Open Sans, sans-serif;">
                                                                Underskriver på aftalen</td></tr>
                                                            <tr>	
                                                            <td align="center">														
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>
                                                            <tr>
                                                            <td height="52">&nbsp;</td>
                                                            </tr>
                                                            </tbody>
                                                            </table><!-- Start Block Content -->
                                                            <table width="550" align="center" cellspacing="0" cellpadding="0" border="0" class="content-width">
                                                            <tbody>
        
                                                            <tr>
                                                            <td align="center">
                                                            <!-- Start row 1 -->
                                                            <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>	
                                                            <tr><td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td></tr>																		
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">Navn</td>
                                                            </tr>																			
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>																		
                                                            <!-- End row 1 -->
        
                                                            <!-- Start Space -->
                                                            <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                            <tbody>
                                                            <tr>
                                                            <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Space -->
        
                                                            <!-- Start row 2 -->
                                                            <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>	
                                                            <tr><td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td></tr>																			
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$name_sta.'</td>
                                                            </tr>  
                                                            <tr>
                                                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                            </tr> 
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>  
                                                            <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>																			
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">E-mail </td>
                                                            </tr>																			
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>																		
                                                            <!-- End Column 1 -->
        
                                                            <!-- Start Space -->
                                                            <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                            <tbody>
                                                            <tr>
                                                            <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Space -->
        
                                                            <!-- Start Column 2 -->
                                                            <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>																				
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$email_sta.' </td>
                                                            </tr>  
                                                            <tr>
                                                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                            </tr> 
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Column 2 -->
                                                            <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                                <tbody>																			
                                                                <tr>
                                                                <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">Telefon </td>
                                                                </tr>																			
                                                                <tr>
                                                                <td class="center-stack"></td>
                                                                </tr>
                                                                </tbody>
                                                                </table>																		
                                                                <!-- End Column 1 -->
            
                                                                <!-- Start Space -->
                                                                <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                                <tbody>
                                                                <tr>
                                                                <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                                <p style="padding-left: 30px;"> </p>
                                                                </td>
                                                                </tr>
                                                                </tbody>
                                                                </table>
                                                                <!-- End Space -->
            
                                                                <!-- Start Column 2 -->
                                                                <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                                <tbody>																				
                                                                <tr>
                                                                <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$phone_sta.' </td>
                                                                </tr>  
                                                                <tr>
                                                                <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                                </tr> 
                                                                <tr>
                                                                <td class="center-stack"></td>
                                                                </tr>
                                                                </tbody>
                                                                </table>
                                                                <!-- End Column 2 -->
                                                            </td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Block Content -->
        
                                                            <!-- Start Space -->
                                                            
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>
                                                            <tr>
                                                            <td height="52">&nbsp;</td>
                                                            </tr>
                                                            </tbody>
                                                            </table><!-- End Space -->
                                                            </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                            <!-- Section Underskriver på aftalen End -->
                                                            
                                                            
                                                        <!-- Section Administrator på ordningen Start -->
                                                        <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="mobile-width">
                                                            <tbody>
                                                            <tr style="background:#357ebd ; padding: 10px;"><td align="left" style="font-size:20px; text-align: center; padding: 25px 0; color:#fff; font-weight:bolder; font-family: Open Sans, sans-serif;">
                                                                Administrator på ordningen</td></tr>
                                                            <tr>	
                                                            <td align="center">														
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>
                                                            <tr>
                                                            <td height="52">&nbsp;</td>
                                                            </tr>
                                                            </tbody>
                                                            </table><!-- Start Block Content -->
                                                            <table width="550" align="center" cellspacing="0" cellpadding="0" border="0" class="content-width">
                                                            <tbody>
        
                                                            <tr>
                                                            <td align="center">
                                                            <!-- Start row 1 -->
                                                            <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>	
                                                            <tr><td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td></tr>																		
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">Navn</td>
                                                            </tr>																			
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>																		
                                                            <!-- End row 1 -->
        
                                                            <!-- Start Space -->
                                                            <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                            <tbody>
                                                            <tr>
                                                            <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Space -->
        
                                                            <!-- Start row 2 -->
                                                            <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>	
                                                            <tr><td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td></tr>																			
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$name_aots.'</td>
                                                            </tr>  
                                                            <tr>
                                                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                            </tr> 
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>  
                                                            <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>																			
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">E-mail </td>
                                                            </tr>																			
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>																		
                                                            <!-- End Column 1 -->
        
                                                            <!-- Start Space -->
                                                            <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                            <tbody>
                                                            <tr>
                                                            <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                            <p style="padding-left: 30px;"> </p>
                                                            </td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Space -->
        
                                                            <!-- Start Column 2 -->
                                                            <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>																				
                                                            <tr>
                                                            <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$email_aots.' </td>
                                                            </tr>  
                                                            <tr>
                                                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                            </tr> 
                                                            <tr>
                                                            <td class="center-stack"></td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Column 2 -->
                                                            <table width="253" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                                <tbody>																			
                                                                <tr>
                                                                <td align="left" style="font-size:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">Telefon </td>
                                                                </tr>																			
                                                                <tr>
                                                                <td class="center-stack"></td>
                                                                </tr>
                                                                </tbody>
                                                                </table>																		
                                                                <!-- End Column 1 -->
            
                                                                <!-- Start Space -->
                                                                <table align="left" cellspacing="0" width="25" height="24" cellpadding="0" border="0" class="full-width">
                                                                <tbody>
                                                                <tr>
                                                                <td width="25" height="24" style="font-size:0;line-height: 0;border-collapse: collapse;">														
                                                                <p style="padding-left: 30px;"> </p>
                                                                </td>
                                                                </tr>
                                                                </tbody>
                                                                </table>
                                                                <!-- End Space -->
            
                                                                <!-- Start Column 2 -->
                                                                <table width="262" align="left" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                                <tbody>																				
                                                                <tr>
                                                                <td align="left" style="font-size:15px; color:#2c3e50;   font-family: Open Sans, sans-serif;">'.$phone_aots.'</td>
                                                                </tr>  
                                                                <tr>
                                                                <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                                                </tr> 
                                                                <tr>
                                                                <td class="center-stack"></td>
                                                                </tr>
                                                                </tbody>
                                                                </table>
                                                                <!-- End Column 2 -->
                                                            </td>
                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            <!-- End Block Content -->
        
                                                            <!-- Start Space -->
                                                            
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                            <tbody>
                                                            <tr>
                                                            <td height="52">&nbsp;</td>
                                                            </tr>
                                                            </tbody>
                                                            </table><!-- End Space -->
                                                            </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                            <!-- Section Administrator på ordningen End -->	
                                                        
                                                        
                                                         
        
                                                        <!-- Section 12 Start -->	
                                                        <table width="600" bgcolor="#16a085" align="center" cellspacing="0" cellpadding="0" border="0" class="mobile-width">
                                                            <tbody>
                                                                <tr>	
                                                                    <td align="center">														
                                                                        
                                                                        
                                                                        <!-- Start Space -->
                                                                        <table width="100%" bgcolor="#2c3e50" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="28" align="center" style="font-family: Open Sans, sans-serif;font-size:11px; font-weight:normal; color:#7f8c8d">powered by  |   <a href="https://www.techscale.io" style="color:#7f8c8d;">www.techscale.io</a></td>
                                                                                </tr>
                                                                                <tr style="background: #e6e5e7;">
                                                                                    <td height="28" align="center" style="font-family: Open Sans, sans-serif;font-size:11px;font-weight:normal;color: #e6e5e7;"> </td>
                                                                                </tr>
                                                                                <tr style="background: #e6e5e7;">
                                                                                    <td height="28" align="center" style="font-family: Open Sans, sans-serif;font-size:11px;font-weight:normal;color: #e6e5e7;"> </td>
                                                                                </tr>
                                                                                <tr style="background: #e6e5e7;">
                                                                                    <td height="28" align="center" style="font-family: Open Sans, sans-serif;font-size:11px;font-weight:normal;color: #e6e5e7;"> </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <!-- End Space -->
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!-- Section 12 End -->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- After Menu Ends -->								
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- End of banner -->
        
        </body>
    </html>';

$message = $emailTemp;


     include( DENTALINSURANCE__PLUGIN_DIR . 'includes/smtp/PHPMailerAutoload.php' );

$mail = new PHPMailer(true);
$adminemail = get_option('admin_email');
$denis = 'denis@dansktandforsikring.dk';
//$imran = 'ij.dev.techscale@gmail.com';
try {
	$mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = 'asmtp.onlinemail.io';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'dansk@techscale.io';				
	$mail->Password = 'Dansk32!234ssd';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;
	$mail->CharSet	 = 'UTF-8';
	$mail->SMTPOptions	= array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => false

            ));


    $mail->setFrom('dansk@techscale.io', 'dansktandforsikring');		
    //$mail->addAddress('kw@weiswise.com'); 
    //  $mail->addAddress('ij.dev.techscale@gmail.com'); 
    $mail->addAddress($imran); 
	
	$mail->isHTML(true);								
	$mail->Subject = 'E-mail modtaget fra dansktandforsikring.com tandforsikring beregningsskema.';
	$mail->Body = $message;
	// $mail->Body = 'HTML message body in <b>bold</b> ';
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}





 }