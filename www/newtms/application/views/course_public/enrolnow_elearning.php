
<?php
$this->load->helper('form');
$this->load->helper('metavalues_helper');
$this->load->helper('common_helper');
$this->load->model('meta_values');
if ($user->role_id == 'ADMN' || $user->role_id == 'COMPACT') {
    $race_colspan = 1;
} else {
    $race_colspan = 3;
}
if (!empty($tax_error)) { 
    echo '<div class="error1">' . $tax_error . '</div>';
}
?>
<style>
    .edu_level{
        width:210px;
    }
</style>
<div class="col-md-2 col_2_style">
    <ul class="ad">
        <li><a href="#" class="thumbnail"><img src="<?php echo base_url();?>/assets/images/ad1.jpg" style="display: block;" data-src="holder.js/100%x180" alt="100%x180"></a></li>
        <li><a href="#" class="thumbnail"><img src="<?php echo base_url();?>/assets/images/ad2.jpg" style="display: block;" data-src="holder.js/100%x180" alt="100%x180"></a></li>
    </ul>
</div>
<div class="col-md-10" style='font-size: 16px;'>
    <h2 class="panel_heading_style"><img src="<?php echo base_url(); ?>/assets/images/trainee.png"/>Confirm Trainee Details:</h2>
    <div class="table-responsive">
        
        <?php echo validation_errors('<div class="error1">', '</div>'); ?> 
        <?php
        $form_attributes = array('name' => 'trainee_edit_search', 'id' => 'trainee_edit_search');
        echo form_open("course_public/referral_credentials1", $form_attributes);
     
           
               $atr = 'id="trainee_form2" name="trainee_form2" style="font-size:16px;"';
              // echo form_open_multipart("course/enrol_once", $atr);
               echo form_open_multipart("course_public/confirm_trainee_details", $atr);
              //  echo form_open_multipart("user/add_trainee1", $atr);
                $user_id;
               echo form_hidden('r_user_id', $user_id);
               if(!empty($user_id)){
                    echo form_hidden('loggedin', 1);
               }

               echo form_hidden('country_of_residence', 'SGP');
               echo form_hidden('course_id', $course_id);
               echo form_hidden('class_id', $class_id);
                echo form_hidden('user_id', $user_id);
               echo form_hidden('registration', '1');
               echo form_hidden('enrolment', 'elearning');
               echo form_hidden('taxcode_found', $nric);
               echo form_hidden('res_found1', '1');
               
   if($course_id!='' && $class_id!=''){

   ?>
   <div style="color:black;font-weight: bold; padding: 14px;text-align:center;width:100%" class="reg_tbl_div">                                
       <table class="table table-striped" style="">
                    <tbody>
                       <tr>
                           <td  class="td_heading">Class Name: 
                               <label class="label_font"><?php echo $class_details->class_name; ?></label>&nbsp;&nbsp;&nbsp;
                                  <a href="#ex12" rel="modal:open" class="small_text1"> <label class="label_font" style="cursor: pointer;">View Details</label>
                               </a>
                           </td>
                           <td class="td_heading">Unit Fees: <label class="label_font">&nbsp;&nbsp;$&nbsp;<?php echo number_format($class_details->class_fees, 2, '.', ''); ?>

                               </label></td>
                           <td class="td_heading">Discount@ : <label class="label_font">&nbsp;&nbsp;$
                               <?php echo number_format($class_details->class_discount, 2, '.', ''); ?>%</td>
                       </tr>

                       <tr style="display:none;">

                           <td class="td_heading" ><?php echo $gst_label; ?>:<label class="">$ <?php echo number_format($totalgst, 2, '.', ''); ?></label> </td>
                           <td colspan="2" class="td_heading">Net Fee: <label class=""><?php echo '$ ' . number_format($net_due, 2, '.', ''); ?></label></td>

                       </tr>  
                       <tr>

                        <td class="td_heading" ><?php echo $gst_label; ?>: <label class="label_font">$ <?php echo number_format($totalgst, 2, '.', ''); ?></label></td>
                        <td colspan="2" class="td_heading">Net Fee: <label class="label_font"><?php echo '$ ' . number_format($net_due, 2, '.', ''); ?></label></td>
                        
                       </tr>  

                   </tbody>
       </table>
   </div>

   <div class="modalnew modal13" id="ex12" style="display:none;height:280px !important; min-height: 280px !important;">
         <h2 class="panel_heading_style" style="margin-bottom: -3px !important;">Class Details </h2>
                   <div class="class_desc_course">
                       <div class="table-responsive">
                           <table class="table table-striped">     
                               <tr>
                                   <td width="40%"><span class="crse_des">Course Name :</span></td>
                                   <td><?php echo   $course_details->crse_name;?></td>
                               </tr>
                               <tr>
                                   <td><span class="crse_des">Class Name :</span></td>
                                   <td><?php echo $class_details->class_name; ?></td>
                               </tr>
                               <tr>
                                   <td><span class="crse_des">Class Start Date and Time :</span></td>
                                   <td><?php echo date('d/m/Y h:i A', strtotime($class_details->class_start_datetime)); ?></td>
                               </tr>
                               <tr>
                                   <td><span class="crse_des">Class End Date and Time :</span></td>
                                   <td><?php echo  date('d/m/Y h:i A', strtotime($class_details->class_end_datetime)); ?></td>
                               </tr>
                               <tr>
                                   <td><span class="crse_des">Classroom Location :</span></td>
                                   <td><?php echo $classloc; ?></td>
                               </tr>


                           </table>
                       </div>                                
                   </div>
                   <div class="popup_cancel11">
                       <a href="#" rel="modal:close"><button class="btn btn-primary" type="button">Close</button></a>
                   </div>
               </div>  

   <?php } ?>
        <br>
        <br>
        <div class="text-center">
            <button type='submit'class="btn btn-primary" type='button' style="padding: 3px 17px !important;font-size: 18px !important;">Enrol Now</button></div>
   <?php echo form_close(); ?>  
        
    </div>
   
    
    
    <!----------------modal by ssp start----------------------->
<?php if (TENANT_ID == 'T02'){$show='display:block';}else{$show='display:none';}?>
<div class="modal" id="ex1011" style="<?php echo $show;?>;margin:auto;margin-top:20px;margin-bottom:20px;height: auto;left: 0px !important;">
<p>
  <h2 class="panel_heading_style">Declaration</h2>
    <!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <!--<h2 class="h1-responsive font-weight-bold text-center my-4">Declaration Form</h2>-->
    <!--Section description-->
    <p class="text-center alert alert-danger">You must fill this form to continue for the enrollment,I consent for Xprienz to collect and use my personal data for the purposes of the company policy.</p>
  
    <div class="row">

        <!--Grid column-->
        <div class="col-md-12 mb-md-0 mb-5">
           
        
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="name" class="">Your Name<span style='color:red'>*</span></label>
                            <input type="text" id="dec_name" class="form-control" required>
                            
                        </div>
                    </div>
                    <!--Grid column-->
                </div>
                
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                             <label for="email" class="">Your Email</label>
                             <input type="email" id="dec_email" class="form-control" pattern=".+@gmail.com" size="30" required>
                           
                        </div>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                             <label for="email" class="">Your Mobile<span style='color:red'>*</span></label>
                            <input type="tel" id="dec_mobile" class="form-control" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                           
                        </div>
                    </div>
                    <!--Grid column-->
                    
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="subject" class="">Lesson Date:<span style='color:red'>*</span></label>
                            <input type="date" id="dec_les_time" class="form-control" required>
                            
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <label for="message">Do you have any relatives who returned from China on 15th January or later and is staying together? <span style='color:red'>*</span></label>
                            <div><input type="radio" value="1" class="" name='dec_res' id='dec_res' style='height: 1.7em;width: 20px;' checked><b style='padding:2px'>Yes</b></div>
                            <div><input type="radio" value="0" class="" name='dec_res' id='dec_res1' style='height: 1.7em;width: 20px;'><b style='padding:2px'>No</b> </div> 
                        </div>

                    </div>
                    <div class="col-md-12">

                        <div class="md-form">
                            <label for="message">Have you travelled overseas in the past 14 days? <span style='color:red'>*</span></label>
                            <input type="text" id="dec_overseas" placeholder='Please State' class="form-control" required>
                        </div>

                    </div>
                </div>
                
                 <div class="statuserr"></div>
                 <br>
                 <br>
                <!--Grid row-->
                 <div class="text-center">
                    <a href='#' class="btn btn-primary" id='declarations' type='button'>Submit & Continue</a></div>
                  
           
        </div>
        <!--Grid column-->
    </div>
         
</section>
<!--Section: Contact v.2-->

</p>
</div>
