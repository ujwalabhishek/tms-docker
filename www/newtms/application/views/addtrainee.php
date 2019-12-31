<?php





 $this->load->helper('metavalues_helper');





 $this->load->helper('common_helper');





 echo $this->load->view('common/refer_left_wrapper');





?>

<?php echo validation_errors('<div class="error1">', '</div>'); ?>   





<script>





var refer_friend = 0;    





</script>   





<div class="ref_col ref_col_tax_code" style="min-height: 500px;">	



    <div class="container_row">





        <div class="col-md-12 min-pad">



            <?php

            $country = $this->input->post('country_of_residence');

            $atr = 'id="trainee_form" name="trainee_form" onsubmit="return(validate(\'refer_form\'));"';

//            echo form_open_multipart("user/add_trainee", $atr);
//            echo form_hidden('user_id', $user_id);
            
            echo form_open_multipart("user/reg_trainee", $atr);
            echo form_hidden('user_id', $user_id);

            ?>











          <h2 class="panel_heading_style"><img src="<?php  echo base_url(); ?>/assets/images/trainee.png"/> Registration Form</h2>





              





                 <?php





            echo validation_errors('<div style="color:red;text-align:center;font-size:14px;">', '</div>');

            if (!empty($error_message)) {

                echo '<div style="color:red;text-align:center;font-size:14px;">' . $error_message . '</div>';

            }

            if (!empty($success_message)) {

                echo '<div style="color:green;text-align:center;font-size:14px; ">' . $success_message . '</div>';

            }
            
            if ($this->session->flashdata('error')) {
                
                        echo '<center><div style="color:red;font-weight: bold;">' . $this->session->flashdata('error') . '</div>';
            
                        
            }
            if ($this->session->flashdata('invalid_captcha')) {
                    echo '<center><div class="error">' . $this->session->flashdata('invalid_captcha') . '</div></center>';
                    
                }
            ?>

            <br>

            <div id ='trainee_validation_div' class='reg_tbl_div'>

                <div class="bs-example">                    

                    <div class="table-responsive">

                        <table class="table table-striped" width="100%" >   





                             <h2 class="sub_panel_heading_style"><img src="<?php  echo base_url(); ?>/assets/images/other_details.png"/> Access Detail</h2>





                            <tr>

                                <td width="20%" class="td_heading">Country of Residence:<span class="required">*</span></td>

                                <td  width="15%">        

                                    <?php

                                    $meta_result = fetch_all_metavalues();



                                    $countries = $meta_result[Meta_Values::COUNTRIES];

                                    $country_options = array();

                                    $country_options[''] = 'Select';

                                    foreach ($countries as $item):

                                        $country_options[$item['parameter_id']] = $item['category_name'];

                                    endforeach;

                                    echo form_dropdown('country_of_residence', $country_options, $this->input->post('country_of_residence'), 'id="country_of_residence"');

                                    ?>

                                    <span id="country_of_residence_err"></span>

                                </td>

                                <td class="td_heading" >

                                    <SPAN id="IND" style="<?php echo ($country == 'IND') ? '' : 'display:none;'; ?>">PAN : <span class="required">* </span>

                                        <?php

                                        $attr = array('name' => 'PAN', 'autocomplete' => "off", 'class' => 'upper_case alphanumeric', 'id' => 'PAN', 'onblur' => 'javascript:isunique_taxcode(this.value,this.id,uid=\'REFER_TRAINEE\');', 'maxlength' => '50');

                                        echo form_input($attr, $this->input->post('PAN'));

                                        ?>

                                        <span id="PAN_err"></span>

                                    </SPAN>

                                    <SPAN id="SGP" style="<?php echo ($country == 'SGP') ? '' : 'display:none;'; ?>">NRIC Type: <span class="required">* </span>                  

                                        <?php

                                        $nric_value = $this->input->post('NRIC');

                                        $nrics = $meta_result[Meta_Values::NRIC];

                                        $nris_options[''] = 'Select';

                                        foreach ($nrics as $item):

                                            $nris_options[$item['parameter_id']] = $item['category_name'];

                                        endforeach;



                                        $attr = 'id="NRIC"';

                                        echo form_dropdown('NRIC', $nris_options, $this->input->post('NRIC'), $attr);

                                        ?>

                                        <span id="NRIC_err"></span>

                                    </SPAN> 

                                    <SPAN id="SGP_OTHERS" style="<?php echo ($nric_value == 'SNG_3') ? '' : 'display:none;'; ?>">



                                        <label id="SGP_OTHERS_label"></label><span class="required">* </span>                  

                                        <?php

                                        $nric_other_value = $this->input->post('NRIC_OTHER');

                                        $nric_other = $meta_result[Meta_Values::NRIC_OTHER];

                                        $nric_other_options[''] = 'Select';

                                        foreach ($nric_other as $item):

                                            $nric_other_options[$item['parameter_id']] = $item['category_name'];

                                        endforeach;



                                        $attr = 'id="NRIC_OTHER"';

                                        echo form_dropdown('NRIC_OTHER', $nric_other_options, $this->input->post('NRIC_OTHER'), $attr);

                                        ?>

                                        <span id="NRIC_OTHER_err"></span>

                                    </SPAN>

                                    <SPAN id="SGP_ID" style="<?php echo (!empty($nric_value) && ($country == 'SGP')) ? '' : 'display:none;'; ?>">



                                        <label id="SGP_ID_label"></label><span class="required">* </span>                  

                                        <?php

                                        $attr = array('name' => 'NRIC_ID', 'autocomplete' => "off", 'class' => 'upper_case alphanumeric', 'id' => 'NRIC_ID', 'onblur' => 'javascript:isunique_taxcode(this.value,this.id,uid=\'REFER_TRAINEE\');', 'maxlength' => '50');

                                        echo form_input($attr, $this->input->post('NRIC_ID'));

                                        ?>

                                        <span id="NRIC_ID_err"></span>

                                    </SPAN>

                                    <SPAN id="USA" style="<?php echo ($country == 'USA') ? '' : 'display:none;'; ?>">SSN : <span class="required">* </span>

                                        <?php

                                        $attr = array('name' => 'SSN', 'autocomplete' => "off", 'class' => 'upper_case alphanumeric', 'id' => 'SSN', 'onblur' => 'javascript:isunique_taxcode(this.value,this.id,uid=\'REFER_TRAINEE\');', 'maxlength' => '50');

                                        echo form_input($attr, $this->input->post('SSN'));

                                        ?>    

                                        <span id="SSN_err"></span>

                                    </SPAN>

                                </td>

                            </tr>

                            <tr>

                                <td width="20%" class="td_heading">Username:<span class="required">*</span></td>

                                <td colspan="2"  >

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

                            </tr>





                        





                        </table>

                        <br>

                        <h2 class="sub_panel_heading_style"><img src="<?php echo base_url(); ?>/assets/images/personal_details.png"/> Personal Details</h2>

                        <div class="table-responsive">

                            <table class="table table-striped" width="100%"  >      

                                <tr>

                                    <td class="td_heading" width="20%">Name:<?php print_r($data);?><span class="required">*</span></td>

                                    <td>

                                        <?php

                                        $course_id = array(

                                                            'type' => 'hidden',

                                                            'name' => 'course_id',

                                                            'id' => 'course_id',

                                                            'value' => $course_id                              

                                                            );

                                        $class_id = array(

                                                            'type' => 'hidden',

                                                            'name' => 'class_id',

                                                            'id' => 'class_id',

                                                            'value' => $class_id

                                                        );

                                        $attr = array(

                                            'name' => 'pers_first_name',

                                            'id' => 'pers_first_name',

                                            'maxlength' => '50',

                                            'value' => $this->input->post('pers_first_name'),

                                            'class' => 'upper_case',

                                            'autocomplete' => "off",

                                            'style' => 'width:200px',

                                        );

                                        echo form_input($course_id);

                                        echo form_input($class_id);

  

                                        echo form_input($attr, 'javascript: text-transform: uppercase;');

                                        ?>  

                                        <span id="pers_first_name_err"></span>

                                    </td>  

                                    <td class="td_heading">D.O.B.:<span class="required">*</span></td>

                                    <td>

                                        <?php

                                        $pers_dob = array(

                                                'name' => 'dob',

                                                'id' => 'pers_dob',

                                                'maxlength' => '10',

                                                'value' => set_value('dob'),

                                                'placeholder' => 'dd-mm-yyyy',

                                            );

                                        echo form_input($pers_dob);

                                        ?> 

                                        <span id="pers_dob_err"></span>

                                    </td>

                                </tr>

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

                                    <td class="td_heading">Email Id:  <span class="required">*</span><?php

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

                                    <td width="10%" class="td_heading">Nationality:<span class="required">*</span></td>

                                    <td >

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
                                <tr>
                                     <td class="td_heading" width="20%">Captcha Code:</td>
                                    <td>
                                        <?php echo $captcha;?>
                                        <a href="register" title="Refresh">
                                        &nbsp;<span class="glyphicon glyphicon-refresh" style="font-size: 20px;color: #486d90;font-weight:bold;top:6px;"></span>
                                        </a>
                                    </td>
                                    
                                    <td class="td_heading" width="20%">Enter Captcha Code:</td>
                                    
                                    <td>
                                        <input type="captcha" placeholder="Enter captcha code" name="captcha" id='captcha' class='form-control' style='width:162px' value="<?php //echo $this->session->userdata('public_captcha_key')?>" required>
                                    </td>
                                </tr>

                            </table> <br />

                            <span class="required required_i">* Required Fields</span>                    

                            <div class="button_class99" >

                                <button class="btn btn-sm btn-info" type="submit" name='submit' value="exit"><span class="glyphicon"></span> <strong>Register Now</strong></button>





                            </div>                  

                            <br /><br /> <div class="clear"></div>  </div>



                        <?php echo form_close(); ?> 



                    </div>





                </div>

            </div>



        </div>

    </div>

</div>

<script src="<?php echo base_url(); ?>assets/public_js/add_tainee_validation.js" type="text/javascript"></script>

