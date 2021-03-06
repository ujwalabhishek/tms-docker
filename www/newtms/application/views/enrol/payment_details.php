<?php echo $this->load->view('common/refer_left_wrapper'); ?>
<div >
    <?php
    if (!empty($error_message)) {
            echo '<div style="color:#a94442;font-weight: bold;text-align:center;margin:1px 14px 20px 20px;padding:10px;background-color:#f2dede"><img src="' . base_url() . 'assets/images/no-result.png"> ' . $error_message . '</div>';
    }
    ?>
    <div id="pay_details" class="receipt-div col-md-12"  style="margin: 0px 0 auto 70px;">
        <?php
        
        if ($this->session->flashdata('success')) {
            echo '<div  style="background-color:#CEFADE;padding:10px;">
                                <div style="color:green;font-weight: bold;">
                                    ' . $this->session->flashdata('success') . '
                                </div>
                            </div>';
        }

        
        ?>
        <h2 class="panel_heading_style">Payment Details for 


            ' <?php echo ($trainee_data->gender == 'MALE') ? 'Mr. ' : 'Ms. '; ?>


<?php echo $trainee_data->first_name . ' ' . $trainee_data->last_name; ?>'


            (NRIC/FIN No.:<?php echo $trainee_data->tax_code; ?>)
        </h2>
        <h2 class="sub_panel_heading_style">Class Details</h2>
        <div class="table-responsive">
       <table class="table table-striped">
                <tbody>
                    <tr>
                        <td class="td_heading">Course Name:</td>
                        <td><label class="label_font"><?php echo $course_details->crse_name; ?></label></td>
                        <td class="td_heading">Class Name:</td>
                        <td><label class="label_font"><?php echo $class_details->class_name; ?></label></td>
                        <td class="td_heading">Class Type:</td>
                        <td ><label class="label_font"><?php echo $class_type; ?></label></td>
                    </tr>
                    <tr>
                        <td class="td_heading">Start Date & Time:</td>
                        <td><label class="label_font"><?php echo date('d/m/Y h:i A', strtotime($class_details->class_start_datetime)); ?></label></td>
 
                        <td class="td_heading">End Date & Time:</td>
                        <td colspan="3"><label class="label_font"><?php echo date('d/m/Y h:i A', strtotime($class_details->class_end_datetime)); ?></label></td>
                    </tr>
                    <tr>
                        <td class="td_heading">Classroom Venue:</td>
                        <td colspan="5"><?php echo $classloc;?></td>
 
                        
                    </tr>
                </tbody>
            </table>
        </div><br>
        <h2 class="sub_panel_heading_style">Payment Details</h2>
        <div class="table-responsive">
         <table class="table table-striped">
                <tbody>

                    <tr>
                        <td class="td_heading" width='100px;'>Unit Fees:</td>
                        <td><label class="label_font">$ &nbsp;<?php echo number_format($class_details->class_fees, 2, '.', ''); ?></label></td>
                        <td class="td_heading"  width='150px;'>Discount@ <?php echo number_format($class_details->class_discount, 2, '.', ''); ?>%: </td>
                        <td><?php echo '$ ' . number_format($discount_total, 2, '.', ''); ?></td>
                        <td class="td_heading" width="165px"><?php echo $gst_label; ?>: </td>
                        <td>$ <?php echo number_format($totalgst, 2, '.', ''); ?>
                            
                        </td>
 
                    </tr>  
                    <tr>
                        <td class="td_heading">Net Fees Due:</td>
                        <td colspan="5"><label class="label_font" style="color: blue"><?php echo '$ ' . number_format($net_due, 2, '.', ''); ?></label></td>
                    </tr>   
                                        <tr>
                        <td class="td_heading">Additional Remarks:</td>
                        <td colspan="5">
                            <?php
                            $attr = array(
                                'name' => 'pers_additional_remarks',
                                'id' => 'pers_additional_remarks',
                                'rows' => '3',
                                'cols' => '95',
                                'value' => $additional_remarks,
                                'maxlength' => 500,
                            );
                            echo form_textarea($attr);
                            ?>  
                            <span id="pers_additional_remarks_err"></span>
                        </td>                                                                        
                    </tr>
                </tbody>
            </table>
        </div>
        <br/>
        <span style="float:right;">
            <?php 
                $refer_id = $user_data->user_id; // refrance
                $user_id =  $trainee_data->user_id // referal
            ?>
            <?php $query_string = (SANDBOX ? '?sandbox=1' : ''); ?>
            <?php echo form_open("course/create_enroll$query_string", 'id="enroll_now"'); ?>
            <!--STEP1 ST-->
            <?php 
              if($user_id!='')
              {
                echo form_hidden('user_id', $user_id);
                echo form_hidden('refer_id', $refer_id);
                echo "<input type='hidden' name ='relation' value='$relation'>";
              } 
              else
              { 
                echo form_hidden('user_id', $this->session->userdata('refer_friend_id'));
                echo form_hidden('refer_id', $this->session->userdata('refer_user_id'));
              } ?>
            <!--STEP1 ED-->
            <?php // echo form_hidden('user_id', $this->session->userdata('refer_friend_id')) ?>
            <?php echo form_hidden('additional_remarks', $additional_remarks) ?>
            <?php //echo form_hidden('refer_id', $this->session->userdata('refer_user_id')) ?>
            <?php echo form_hidden('class_id', $class_details->class_id) ?>
            <?php echo form_hidden('class_name', $class_details->class_name) ?>


            <?php echo form_hidden('cmd', '_xclick') ?>


            <?php echo form_hidden('course_id', $class_details->course_id) ?>
            <?php echo form_hidden('class_fees', $class_details->class_fees) ?>
            <?php echo form_hidden('discount_rate', $class_details->class_discount) ?>
            <?php echo form_hidden('discount_amount', $discount_total) ?>
            <?php echo form_hidden('gst_rate', $gst_rate) ?>
            <?php echo form_hidden('gst_amount', $totalgst) ?>
            <?php echo form_hidden('gst_onoff', $course_details->gst_on_off) ?>
            <?php echo form_hidden('gst_rule', $course_details->subsidy_after_before) ?>
            <?php echo form_hidden('net_due', $net_due) ?>
            <?php if ($class_details->class_pymnt_enrol == PAY_A_ENROL) { ?>
                <button type="submit" name="submit" value="book_now" class="btn btn-sm btn-info" style="float: right;margin-left: 10px;"><strong>Book Now & Pay Later</strong></button>
            <?php } ?>
<!--            <button type="submit" name="submit" value="pay_now" class="btn btn-sm btn-info" style="float: right;"><strong>Pay Now</strong></button>-->
<?php echo form_close(); ?>
        </span>
    </div>
</div>
<script type="text/javascript">
    $("#enroll_now").submit(function (event) {
        var addlRemark = $('#pers_additional_remarks').val();
        $( "input[name='additional_remarks']" ).val(addlRemark);
        return;
    });
</script>
