<?php 
$this->load->helper('metavalues_helper');

$this->load->helper('common_helper');

echo $this->load->view('common/refer_left_wrapper');

//echo validation_errors('<div class="error1">', '</div>');
?>
<script>

    $siteurl = '<?php echo site_url(); ?>';

    $baseurl = '<?php echo base_url(); ?>';

</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/public_js/enrol_some_one.js"></script>



<div class="ref_col ref_col_tax_code">  
    <h2 class="panel_heading_style">
        <span aria-hidden="true" class="glyphicon glyphicon-user"></span> 
          <?php if(!empty($user_id)){?> Enroll For Someone<?php }else{?> Registration Form <?php }?>

    </h2>
    <?php

    if (!empty($error_message)) {
                    echo '<div style="color:red;font-weight: bold;">' . $error_message . '</div>';
                }
    if ($this->session->flashdata('error')) {
                    echo '<div style="color:red;font-weight: bold;">
                            ' . $this->session->flashdata('error') . '
                        </div>';
                }
    ?>
<!--    <div class="tax_col">
</div>-->

    <?php 
            $atr = 'id="trainee_form" name="trainee_form" onsubmit="return(validate(\'refer_form\'));"';
           // echo form_open_multipart("course/enrol_once", $atr);
            echo form_open_multipart("user/add_trainee", $atr);
           //  echo form_open_multipart("user/add_trainee1", $atr);
             $user_id;
            echo form_hidden('r_user_id', $user_id);
            if(!empty($user_id)){
                 echo form_hidden('loggedin', 1);
            }
            
            echo form_hidden('country_of_residence', 'SGP');
            echo form_hidden('course_id', $course_id);
            echo form_hidden('class_id', $class_id);
            echo form_hidden('registration', '1');
            
    ?>  
<?php
if($course_id!='' && $class_id!=''){
   
?>
<div style="color:black;font-weight: bold; padding: 6px;text-align:center;" class="reg_tbl_div">                                
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

    <div id ='trainee_validation_div' class='reg_tbl_div'>
        <div class="bs-example">                    
                    <div class="table-responsive">
                        
    
    
                        <table class="table table-striped" width="100%" >   


                            <h2 class="sub_panel_heading_style"><img src="<?php echo base_url(); ?>/assets/images/personal_details.png"/>  Access Detail</h2>
                            
                             <tr>
                                <td width="20%" class="td_heading">Please Enter NRIC:<span class="required">*</span></td>
                                <td colspan="2"  >
                                  
                                    <?php                            
                                            $taxcode_nric = array(
                                                'name' => 'taxcode_nric',
                                                'id' => 'taxcode_nric',
                                                'value' => $this->input->post('taxcode_nric'),
                                                'maxlength' => '25',
                                                'class' => 'upper_case',
                                                'onblur' => 'javascript:check_taxcode_nric(this.value,this.id);',
                                                'onkeypress' =>'return IsAlphaNumeric(event);',
                                                'style' => 'width:150px',

                                            );
                                             
                                 echo form_input($taxcode_nric);
                                    ?>
                                    <input type="hidden" id="course_id" name="course_id" value="<?php echo $course_id;?>">
                                    <input type="hidden" id="class_id" name="class_id" value="<?php echo $class_id;?>">
                                    
                                    <span id="error" style="color: Red; display: none"></span>
                                    <span id="nric_found"> </span>
                                    
                                <span id="r_try" style="color: red;"> </span>
                                <span id="nric_res"> </span>
                                <span id="taxcode_nric_err"></span>
                                    
                                </td>
                            </tr>
                            
                            <tr id="nric_found_msg">
                                <td colspan="4"><strong><span id="nric_found_user_msg" style="color: green;"> </span> </strong></td> 
                            </tr>
                            
                            <tr id="user_class_msg">
                                 <td colspan="4"><strong> <span id="user_exists_class_msg" style="color:red;"></span></strong>
                                        
                            </tr>
                            
                            <tr id="nric_not_found1">
                             <td width="20%" class="td_heading">NRIC Type:<span class="required">*</span></td>
                              <!--    <td  width="15%">        
                                    <?php
                                    $meta_result = fetch_all_metavalues();

                                    $countries = $meta_result[Meta_Values::COUNTRIES];
                                    $country_options = array();
                                    $country_options[''] = 'Select';
                                    foreach ($countries as $item):
                                        $country_options[$item['parameter_id']] = $item['category_name'];
                                    endforeach;
                                  //  echo form_dropdown('country_of_residence', $country_options, $this->input->post('country_of_residence'), 'id="country_of_residence"');
                                    ?>
                                    <span id="country_of_residence_err"></span>
                                </td>-->
                                <td class="td_heading" >
                                    
                                    <!--<SPAN id="SGP" style="<?php echo ($country == 'SGP') ? '' : 'display:none;'; ?>">NRIC Type: <span class="required">* </span>-->                  
                                        <?php
                                        $nric_value = $this->input->post('NRIC');
                                        $nrics = $meta_result[Meta_Values::NRIC];
                                        $nris_options[''] = 'Select';
                                        foreach ($nrics as $item):
                                            $nris_options[$item['parameter_id']] = $item['category_name'];
                                        endforeach;

                                        $attr = $js = 'id="NRIC"';
                                        echo form_dropdown('NRIC',
                                                $nris_options,
                                                $this->input->post('NRIC'), 
                                                $attr
//                                                ,
//                                                'onChange = javascript:isunique_taxcode();'
                                                );
                                        ?>
                                        <span id="NRIC_err"></span>
                                        <span id="NRIC_msg" style="color:green;"></span>
                                    <!--</SPAN>--> 
                                    <SPAN id="SGP_OTHERS" style="<?php echo ($nric_value == 'SNG_3') ? '' : 'display:none;'; ?>">

                                        <label id="SGP_OTHERS_label"></label><span class="required">* </span>                  
                                        <?php
                                        $nric_other_value = $this->input->post('NRIC_OTHER');
                                        $nric_other = $meta_result[Meta_Values::NRIC_OTHER];
                                        $nric_other_options[''] = 'Select';
                                        foreach ($nric_other as $item):
                                            $nric_other_options[$item['parameter_id']] = $item['category_name'];
                                        endforeach;

                                        $attr = $js = 'id="NRIC_OTHER"';
                                        echo form_dropdown(
                                                'NRIC_OTHER',
                                                $nric_other_options,
                                                $this->input->post('NRIC_OTHER'),
                                                $attr 
//                                                ,
//                                                'onChange = javascript:isunique_taxcode();'
                                                );
                                                ?>
                                        <span id="NRIC_OTHER_err"></span>
                                    </SPAN>
                                    
                                </td>
                            </tr>
                             <?php if(!empty($user_id)){?> 
                            <tr id="realtion">
                                <td class="td_heading" colspan="3">Your relationship with the trainee:<span class="required">*</span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="relationship" value="KIN" checked/> Kin &nbsp;&nbsp;
                                    <input type="radio" name="relationship" value="FRIEND"  /> Friend &nbsp;&nbsp;
                                    <input  type="radio" name="relationship" value="COLLEAGUE" /> Colleague &nbsp;&nbsp;
                                    <input type="radio" name="relationship" value="OTHERS" id="other_relation"/> Others&nbsp;<span id="others_span" style="display:none;"><input type="text" name="others" id="others"/></span>
                                </td>
                            </tr>
                             <?php }?>
                        


                        </table>
<!--                        <br>-->
                        
                        <div class="table-responsive">
                            <table class="table table-striped" id="nric_not_found2" width="100%"  >      
                                <tr>
                                <td width="20%"  class="td_heading" >Username:<span class="required">*</span></td>
                                <td>
                                    <?php
                                    $un = array(
                                        'name' => 'user_name',
                                        'id' => 'user_name',
                                        'maxlength' => '15',
                                        'value' => $this->input->post('user_name'),
                                        'onblur' => 'javascript:isunique_username(this.value,this.id);',
                                        'style' => 'width:150px',
                                    );
                                    echo form_input($un);
                                    ?> 
                                    <span id="user_name_err"></span>
                                </td>
<!--                            </tr>-->
<!--                                <tr>-->
                                    <td width="20%" class="td_heading" >Name:<?php print_r($data);?><span class="required">*</span></td>
                                    <td>
                                        <?php
                                        $attr = array(
                                            'name' => 'pers_first_name',
                                            'id' => 'pers_first_name',
                                            'maxlength' => '50',
                                            'value' => $this->input->post('pers_first_name'),
                                            'class' => 'upper_case',
                                            'autocomplete' => "off",
                                            'style' => 'width:200px',
                                        );

                                        echo form_input($attr, 'javascript: text-transform: uppercase;');
                                        ?>  
                                        <span id="pers_first_name_err"></span>
                                    </td>                                                                        
                                <!--</tr>-->
                                <tr>
                                    <td class="td_heading" width="20%">Gender:<span class="required">*</span></td>
                                    <td>
                                        <?php
                                        $gender = $meta_result[Meta_Values::GENDER];
                                        $gender_options = array();
                                        $gender_options[''] = 'Select';
                                        foreach ($gender as $item):
                                            $gender_options[$item['parameter_id']] = $item['category_name'];
                                        endforeach;
                                        echo form_dropdown('pers_gender', $gender_options, $this->input->post('pers_gender'), 'id="pers_gender"');
                                        ?> 
                                        <span id="pers_gender_err"></span>
                                    </td>
                                    <td class="td_heading" width="20%">Contact Number:<span class="required">*</span></td>
                                    <td>
                                        <?php
                                        $attr = array(
                                            'name' => 'pers_contact_number',
                                            'id' => 'pers_contact_number',
                                            'maxlength' => '50',
                                            'value' => $this->input->post('pers_contact_number'),
                                            'onblur' => 'javascript:validate_pers_contact_number(this.value,this.id);',
                                            'class' => 'number',
                                            'style' => 'width:200px',
                                        );
                                        echo form_input($attr);
                                        ?> 
                                        <span id="pers_contact_number_err"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="td_heading">Email Id: <span class="required">*</span> <?php
                                        $email = array(
                                            'name' => 'frnd_registered_email',
                                            'id' => 'frnd_registered_email',
                                            'maxlength' => '50',
                                            'value' => $this->input->post('frnd_registered_email'),
                                            'onblur' => 'javascript:isunique_email(this.value,this.id);',
                                            'style' => 'width:200px',
                                        );
                                        $conf_email = array(
                                            'name' => 'frnd_conf_email',
                                            'id' => 'frnd_conf_email',
                                            'maxlength' => '50',
                                            'value' => $this->input->post('frnd_conf_email'),
                                            'onblur' => 'javascript:confirm_email(this.value,this.id);',
                                            'style' => 'width:200px',
                                        );
                                        ?>
                                    </td>
                                    <td><?php echo form_input($email); ?> <span id="frnd_registered_email_err"> </span>
                                    </td>
                                    <td class="td_heading">Confirm Email Id: <span class="required">*</span></td>
                                    <td><?php echo form_input($conf_email); ?><span id="frnd_conf_email_err"></span></td>
                                </tr>
                                 <tr>
                                    <td width="10%" class="td_heading">D.O.B.:<span class="required">*</span></td>
                                    <td>
                                        <?php
                                        $pers_dob = array(
                                                'name' => 'dob',
                                                'id' => 'dob',
                                                'maxlength' => '10',
                                                'value' => set_value('pers_dob'),
                                                'placeholder' => 'dd-mm-yyyy',
                                            );
                                        echo form_input($pers_dob);
                                        ?> 
                                        <span id="dob_err"></span>
                                    </td>
                                    <td  class="td_heading">Highest Education:<span class="required">*</span></td>
                                    <td  >
                                        <?php
                                        $highest_educ_level = $meta_result[Meta_Values::HIGHEST_EDUC_LEVEL];
                                        $highest_educ_level_options[''] = 'Select';
                                        $js = 'id="highest_educ_level" style="width:70% !important"';
                                        foreach ($highest_educ_level as $item):
                                            $highest_educ_level_options[$item['parameter_id']] = $item['category_name'];
                                        endforeach;
                                        ?>
                                        <?php echo form_dropdown('highest_educ_level', $highest_educ_level_options, $this->input->post('highest_educ_level'), $js); ?>
                                        <span id="highest_educ_level_err"></span>

                                    </td>

                                </tr>
                               <tr>
                                    <td class="td_heading">Nationality:<span class="required">*</span></td>
                                    <td colspan="3">
                                        
                                        <?php
                                        $nationality = $meta_result[Meta_Values::NATIONALITY];
                                        $nationality_options = array();
                                        $nationality_options[''] = 'Select';
                                        foreach ($nationality as $item):
                                            $nationality_options[$item['parameter_id']] = $item['category_name'];
                                        endforeach;
                                        echo form_dropdown('nationality', $nationality_options, $this->input->post('nationality'), 'id="nationality" style="width:200px"');
                                        ?>
                                        <span id="nationality_err"></span>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td   class="td_heading">Occupation:<span class="required">*</span></td>
                                    <td colspan="3">
                                        <?php
                                        $occupation = $meta_result[Meta_Values::DESIGNATION];
                                        $occupation_options[''] = 'Select';
                                        $js = 'id="occupation" style="width:60% !important"';

                                        foreach ($occupation as $item):
                                            $occupation_options[$item['parameter_id']] = $item['category_name'];
                                        endforeach;
                                        ?>
                                        <?php echo form_dropdown('occupation', $occupation_options, $this->input->post('occupation'), $js); ?>
                                        <span id="occupation_err"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td_heading" width="20%">Additional Remarks:</td>
                                    <td colspan="3">
                                        <?php
                                        $attr = array(
                                            'name' => 'pers_additional_remarks',
                                            'id' => 'pers_additional_remarks',
                                            'rows' => '5',
                                            'cols' => '95',
                                            'maxlength'=>500,
                                            'value' => $this->input->post('pers_additional_remarks'),
                                        );
                                        echo form_textarea($attr);
                                        ?> 
                                        <span id="pers_additional_remarks_err"></span>
                                    </td>                                                                        
                                </tr>
                            </table> <br />
                            
<!--                            <table class="table table-striped" id="existing_user" width="100%"  > 
                            <tr>
                                
                                    <td class="td_heading" width="20%">
                                        <?php $data = array(
                                                'id' => 'search_select2',
                                                'class' => 'search_select',
                                                'name' => 'search_select',
                                                'value' => '1',
                                                'checked' => true
                                            );
                                            echo form_radio($data);
                                            ?>&nbsp;&nbsp;
                                        D.O.B.  
                                       <?php
                                            $pers_dob = array(
                                                'name' => 'pers_dob',
                                                'id' => 'pers_dob',
                                                'maxlength' => '10',
                                                'value' => set_value('pers_dob'),
                                                'placeholder' => 'dd-mm-yyyy',
                                            );
                                           
                                        ?> 
                            
                                    </td>
                                    <td colspan="3"><?php echo form_input($pers_dob); ?> 
                                        <span id="pers_dob_err"></span>
                                    </td>
                            </tr>
                            <tr>
                                    <td class="td_heading"> <?php $data = array(
                                                'id' => 'search_select',
                                                'class' => 'search_select',
                                                'name' => 'search_select',
                                                'value' => '2'
                                            );
                                            echo form_radio($data);
                                            ?>&nbsp;&nbsp;Email
                                        <?php
                                            $e_email = array(
                                                'name' => 'e_email',
                                                'id' => 'e_email',
                                                'class'=> 'e_email',
                                                'value' => set_value('e_email') 
                                            );
                                        ?> 
                            
                                    </td>
                                    <td><?php echo form_input($e_email); ?>  <span id="e_email_err"></span>
                                    </td>
                            </tr> 
                            <tr>
                                    <td class="td_heading"><?php $data = array(
                                                'id' => 'search_select',
                                                'class' => 'search_select',
                                                'name' => 'search_select',
                                                'value' => '3'
                                            );
                                            echo form_radio($data);
                                            ?>&nbsp;&nbsp;Contact Number
                                        <?php
                                            $e_contact_no = array(
                                                'name' => 'e_contact_no',
                                                'id' => 'e_contact_no',
                                                'maxlength' => '10',
                                                'value' => set_value('e_contact_no'),
                                                'class' => 'number'
                                            );
                                            
                                        ?> 
                            
                                    </td>
                                    <td><?php echo form_input($e_contact_no); ?> <span id="e_contact_no_err"></span>
                                    </td>
                            </tr> 
                                    
                                    
                                
                            </table><br/>
                            
                            <span id="admin_msg_err" style="color: red;"><br/>* Your credentials not matched, Please Contact to Admin for  Email, contact Number or D.O.B. !</span>-->
                            <div class="button_class99">
                                <button class="btn btn-sm btn-info" id="btn_dis" type="submit" name='submit' value="exit"><span class="glyphicon"></span> <strong>
<!--                                        <span id="sub1">Register Now</span>
                                        <span id="sub2">Enroll Now</span>-->
                                         <span >Enroll Now</span>
                                    </strong></button>
                            <br/><br/></div>
                            
<!--                            <div class="button_class99">
                            <button class="btn btn-sm btn-info" type="submit" name='submit' value="exit"><span class="glyphicon"></span> <strong>Enroll Now</strong></button>
                            <br/><br/></div>

                            -->
                            <div class="clear"></div> 
                            
                        </div>

                        <?php echo form_close(); ?> 

                    </div>


                </div>
            </div>
        
     <br/><br/>
     
       
     
     <?php // echo form_close(); ?>   
    </div>

<br/><br/>
<!--<script src="<?php echo base_url(); ?>assets/js/validation_old.js" type="text/javascript"></script>-->
<script src="<?php echo base_url(); ?>assets/public_js/validation_register_enroll.js" type="text/javascript"></script>
<script>


    $("input:radio[name=relationship]").click(function() {


        var value = $(this).val();
        if (value == 'OTHERS') {
            $('#others_span').show();
        }
        else {
            $('#others_span').hide();


             $('#others').val('');


        }

    });

        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Tab
        specialKeys.push(46); //Delete
        specialKeys.push(36); //Home
        specialKeys.push(35); //End
        specialKeys.push(37); //Left
        specialKeys.push(39); //Right
        function IsAlphaNumeric(e) {
            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
            var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || 
                    (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
        }
    </script>