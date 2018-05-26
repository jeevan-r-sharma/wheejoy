<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>img/fav.ico.png">
  <link href="<?php echo base_url(); ?>css/style1.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css">
  <!-- <link href='<?php echo base_url(); ?>css/fontGoogle800.css' rel='stylesheet' type='text/css'> -->
  <!-- <link href='<?php echo base_url(); ?>css/fontGoogle700.css' rel='stylesheet' type='text/css'> -->
  <!-- <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'> -->
  <script src="<?php echo base_url(); ?>ajax/ajax.jquery.v2.0.js"></script>

  <script type="text/javascript">
  $(document).ready(function(){
      $("#userForm").submit(function(e)
      {
        var formData = {
          'user_name'  : $("#username").val() ,
          'password'    : $("#userpassword").val()

        };
        var formURL = $(this).attr("action");
            $.ajax({
              url : formURL,
              type: "POST",
              data : formData,
              success:function(data)
              {
                if (!data) {
                    $("span#msgbox").text('Incorrect Username and Password ').show();
                    document.location = '<?php echo base_url(); ?>signin';
                } else {
                    var response = JSON.parse(data);
                    if (response['status'] == 1) {
                        $("span#msgbox").fadeTo(200, 0.1, function () {
                          $(this).html('Authenticating User...').addClass('messageboxok').fadeTo(900, 1, function() {
                            $(this).html('Logging in...').fadeTo(900, 1, function () {
                                var redirect = response['redirect'];
                                if (!redirect) {
                                    document.location = '<?php echo base_url(); ?>dashboard';
                                } else{
                                   document.location = redirect;
                                }
                            });
                          });  
                        });
                    }
                  }                                    
              },
                error: function(data){                  
                }
            });
          e.preventDefault();    //STOP default action
      });
  });

  function ajxforgot(){
     var email = document.getElementById('email').value;

     $.ajax({
      type: "post",
      url: "<?php echo base_url();?>signin/forgot_password",
      cache: false,        
      data: {email:email},
      success: function(data)
      {
                //alert(data);
                if(data == 'success')
                {
                  alert('Mail Successfully Sent,Check Your Mail');
                    //document.getElementById("error").innerHTML="Mail Successfully Sent,Check Your Mail";
                    document.getElementById('GSCCModal').style.display ="none";
                    location.href = "<?php echo base_url(); ?>SignIn";
                  }
                  else
                  {
                    document.getElementById('error').innerHTML = "This Email Id Is Not Exists In Our Database";
                  }
                },
                error: function(){

                }
              });
   }
   function validateEmail(inputvalue)
   {  
                //alert("hi");
                var pattern=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
                var OK = pattern.test(inputvalue.value);
                if (!OK){         

                  document.getElementById("error").innerHTML="Pls enter valid Email Address";
                  document.getElementById('email').value="";
                  document.getElementById('email').focus();
                }
                else
                {   
                  document.getElementById("error").innerHTML=""; 
                }
              }


            </script>
          </head>

          <body>
            <section id="header">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <a href=""><img src="<?php echo base_url(); ?>img/logo.png" alt=""/></a>
                  </div>
                </div>
              </div>
            </section>
            <section id="sign-in">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" style="    margin-left: 446px">
                     <div class="row">
                       <form id ="userForm" name="userForm" method="post" action="<?php echo base_url();?>signin/checkInputs">
                         <div class="usr-detail">
                           <div class="sign">
                            User Login
                          </div>
                          <div class="form-group1">
                           <input type="text" name="username" id="username" value ="" class="form-control" placeholder="User Name" required/>
                         </div>
                         <div class="form-group1">
                          <input type="password" name="userpassword" id="userpassword" value="" class="form-control" placeholder="Password" required/>
                        </div>
                        <div class="form-group1 text-center">
                         <input type="submit" value="sign in" id="usrsubmit"/>
                       </div>
                       <div class="f-pswd">
                        <a href="#" data-toggle="modal" data-target="#GSCCModal">I forgot my password</a>
                      </div>

                    </div>
                  </form>
                  <span id="msgbox" style="display:none;text-align:center; color: red;"></span>
                </div>
                </div><!---user details end--->
 
                <!---pop up---->
                <div id="GSCCModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content" style="margin-top:25%;">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
                      <h4 class="modal-title" id="myModalLabel"><b>Reset Your Password</b></h4>
                    </div>
                    <div class="modal-body">
                      <div class="col-lg-12">
                        <p>Enter your email address</p>
                        <div class="form-group">
                          <input type="text" placeholder="Enter your Email Id" id="email" name="email" class="form-control" onchange="validateEmail(this);"/>
                          <span style="color:red" id="error"></span>
                        </div>
                        <div class="form-group">
                          <!--<input type="button" onclick="test()" id="forg_send" value="submit">-->
                          <a href="#" class="btn btn-primary pull-right" id="send" onclick="javascript:ajxforgot()">Submit</a>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer" style="border-top:none;">
                      <!--<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>-->
                      <!---<button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                  </div>
                </div>
              </div> 
              <!---pop up end---->

            </div>
          </div>
        </div>
      </section>
      <!-- jQuery UI 1.10.3 -->
      <script src="<?php echo  base_url(); ?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="<?php echo  base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
    </body>
    </html>
