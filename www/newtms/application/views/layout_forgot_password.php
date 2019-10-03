<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>  
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78372106-1', 'auto');
  ga('send', 'pageview');

</script> 
</head>
<body>
    <div class="main_container_new_top"> 
            <?php $this->load->view('common/login_header'); ?>	  
            <div class="container_nav_style">
                <div class="container container_row">
                    <div class="row row_pushdown">
                        <div class="col-md-12 col_10_height_other">
                            <div class="makecenter">
                                
                                 <?php
                                    $atr = 'id="forgot_password_form" name="forgot_password_form"';
                                    echo form_open("user/get_forgot_password", $atr);
                                ?>
                                
                                <h2 class="panel_heading_style"><span class="glyphicon glyphicon-question-sign"></span> Forgot Password</h2>
                                    
                                <?php   if($this->session->flashdata('success')){ 
                                                    echo '<div class="success">' . $this->session->flashdata('success') . '</div>';                                                               
                                                }else if($this->session->flashdata('error')){
                                                    echo '<div class="error1">' . $this->session->flashdata('error') . '</div>';                                                    
                                                }
                                                if(!empty($form_success)){ 
                                                    echo '<div class="success">' . $form_success . '</div>';                                                               
                                                }else if(!empty($form_error)){
                                                    echo '<div class="error1">' . $form_error . '</div>';
                                                    $user_name = $this->input->post('username');
                                                    $email = $this->input->post('email');
                                                }
                                        ?>        
                                
                                <div class="input-group">
                                      <span class="input-group-addon">Email<span class="required required_i">*</span></span>
                                      <input id="email" type="text" class="form-control" name="email" placeholder="Email" value='<?php echo $email;?>'>
                                      <div><span id="username_err"></span></div>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                      <span class="input-group-addon">User name<span class="required required_i">*</span></span>
                                      <input id="username" type="text" class="form-control" name="username" value='<?php echo $user_name;?>'placeholder="User Name">
                                      <div><span id="email_err"></span></div>
                                    </div>
                                    <br>
                                    <div><span class="required required_i">* Required Fields</span></div>
                                    <br>
                                    <div class="popup_cance89">
                                        <button class="btn btn-primary submit_btn" type="button" onclick="validate_form()" ><span class="glyphicon glyphicon-save"></span> Submit</button>&nbsp;&nbsp;
                                        <button style="display:none" class="btn btn-primary processing_btn" type="button"><span class="glyphicon glyphicon-save"></span> Processing...</button>&nbsp;&nbsp;
                                        <a href="<?php echo site_url()."login/"; ?>" class="btn btn-primary">
                                      <span class="glyphicon glyphicon-remove"></span> Cancel</a>
                                    </div>
                                 <?php echo form_close(); ?>
                                
                                
                                
                                
                                
                                
                                
                                <?php
                                    $atr = 'id="forgot_password_form" name="forgot_password_form"';
                                    echo form_open("login/get_forgot_password", $atr);
                                ?>
                                <div class="table-responsive">    
                                    <h2 class="panel_heading_style"><span class="glyphicon glyphicon-question-sign"></span> Forgot Password</h2>
                                    <table class="table table-striped" width="100%" border="0" cellspacing="0" cellpadding="5">
                                        <?php   if($this->session->flashdata('success')){ 
                                                    echo '<div class="success">' . $this->session->flashdata('success') . '</div>';                                                               
                                                }else if($this->session->flashdata('error')){
                                                    echo '<div class="error1">' . $this->session->flashdata('error') . '</div>';                                                    
                                                }
                                                if(!empty($form_success)){ 
                                                    echo '<div class="success">' . $form_success . '</div>';                                                               
                                                }else if(!empty($form_error)){
                                                    echo '<div class="error1">' . $form_error . '</div>';
                                                    $user_name = $this->input->post('username');
                                                    $email = $this->input->post('email');
                                                }
                                        ?>        
                                        <tr>
                                            <td class="td_heading">Username:<span class="required">*</span></td>
                                            <td>        
                                                <?php
                                                $attr = array(
                                                    'name' => 'username',
                                                    'id'   =>'username',
                                                    'value' => "$user_name",
                                                    'type' => 'text'                                                                
                                                );
                                                echo form_input($attr);
                                                ?>
                                                <span id="username_err"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td_heading">Email Id:<span class="required">*</span> </td>
                                            <td>        
                                                <?php
                                                $attr = array(
                                                    'name' => 'email',
                                                    'type' => 'email',
                                                    'maxlength' => '150',
                                                    'value' => "$email",
                                                    'id' => 'email'
                                                );
                                                echo form_input($attr);
                                                ?>
                                                <span id="email_err"></span>
                                            </td>
                                        </tr>
                                    </table>        
                                    <span class="required required_i">* Required Fields</span>
                                    <div class="popup_cance89">
                                        <button class="btn btn-primary submit_btn" type="button" onclick="validate_form()" ><span class="glyphicon glyphicon-save"></span> Submit</button>&nbsp;&nbsp;
                                        <button style="display:none" class="btn btn-primary processing_btn" type="button"><span class="glyphicon glyphicon-save"></span> Processing...</button>&nbsp;&nbsp;
                                        <a href="<?php echo site_url()."login/"; ?>" class="btn btn-primary">
                                      <span class="glyphicon glyphicon-remove"></span> Cancel</a>
                                    </div>
                                    <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div style="clear:both;"></div>
        <?php $this->load->view('common/login_footer'); ?>
    </div>
</div>        
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
    <script src="<?php echo base_url(); ?>assets/js/datepickerpwd.js"></script>    
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>        
    <script>        
        var d = new Date();        
        var currentYear = d.getFullYear(); 
        var currenyMonth=d.getMonth();
        var CurrentDate=d.getDay();
        var startYear = currentYear - 110;
        var endYear = currentYear - 10;
        $(function() {          
          $( "#dob" ).datepicker({ 
              dateFormat: 'dd/mm/yy',
              minDate: new Date(startYear,currenyMonth,CurrentDate),
              maxDate: new Date(endYear,currenyMonth,CurrentDate),
              changeMonth: true,
              changeYear: true,
              yearRange: '-110:+0'              
          });
        });
    </script>
    <script>
    function valid_email_address(emailAddress){
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);        
        return pattern.test(emailAddress);
    } 
    function isDate(txtDate){        
        var reg=/^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d+$/; 
        return reg.test(txtDate);
    }
    function validDate(dob){
        var res = dob.split('/');                 
        if(res[2]>=startYear && res[2]<=endYear){
            return true;
        }else{            
            return false;
        }    
    }
    function validate_form(){
        var email= $("#email").val();
        var username= $("#username").val();
        retVal = true;
        if(email==""){
            $("#email_err").text("[required]").addClass('error');            
            retVal = false;
        }else if(valid_email_address(email) == false){
            $("#email_err").text("[invalid]").addClass('error');            
            retVal = false;
        }else{
            $("#email_err").text("").removeClass('error'); 
        } 
        if(username.trim().length == 0){
            $("#username_err").text("[required]").addClass('error');            
            retVal = false;
        }else{
            $("#username_err").text("").removeClass('error'); 
        }
        if(retVal==true){            
            $('#forgot_password_form').submit();
            $('.submit_btn').hide();
            $('.processing_btn').show();
        }
        else{
            return retVal;
        }        
    }       
    </script>          
</body>
</html>


