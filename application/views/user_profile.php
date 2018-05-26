<!DOCTYPE html>
<html>
<?php include('common.php'); ?>    
<body> 
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">profile</li>
            </ol>
        </section>
        <aside>
            <section class="content">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="row form-3">
                            <!--<h5 class="form-title">User Details</h5>-->
                            <!-- form-3-start -->
                            <form class="form-horizontal form-shade" name="myInfo" id="myInfo" >
                                <div class="form-group">
                                    <?php
                                    $co = count($g[0]);
                                    $i = 0;
                                    while ($i < $co) {
                                        ?>
                                        <div class="form-group" style="display: none">
                                            <div class="col-lg-5 col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" placeholder="" class="form-control1" id="id" readonly="" name="id" value="<?php echo $g[0][$i]->id ; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12">First Name</label>
                                            <span style="color:red" id="errorFirstName"></span>
                                            <div class="col-lg-5 col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" placeholder="Full Name" class="form-control1" id="firstName" disabled="true" name="firstName" value="<?php echo $g[0][$i]->first_name ; ?>" onblur="validateFirstName();"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12">Last Name</label>
                                            <span style="color:red" id="errorLastName"></span>
                                            <div class="col-lg-5 col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" placeholder="Full Name" class="form-control1" id="lastName" disabled="true" name="lastName" value="<?php echo $g[0][$i]->last_name ; ?>" onblur="validateLastName();"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12">Gender</label>
                                            <span style="color:red" id="errorGender"></span>
                                            <div class="col-lg-5 col-md-8 col-sm-8 col-xs-12">
                                                <label class="ext-size"><input class="uniform-radiobox" type="radio" value="Male" name="gender" id="r1" checked="true" />&nbsp; Male</label>
                                                <label class="ext-size"><input class="uniform-radiobox" type="radio" value="Female" name="gender" id="r2"/>&nbsp;Female</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text1"
                                            class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12">Email-id/Username</label>
                                            <span style="color:red" id="errorEmail"></span>
                                            <div class="col-lg-5 col-md-8
                                            col-sm-8 col-xs-12">
                                            <input type="text" placeholder="Email" class="form-control1" id="emailId" name="emailId" value="<?php echo $g[0][$i]->email ; ?>" disabled="true" onblur="validateEmail();"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="text1" class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12">Phone/Username</label>
                                        <span style="color:red" id="errorPhone"></span>
                                        <div class="col-lg-5 col-md-8 col-sm-8 col-xs-12">
                                            <input placeholder="Your Phone" type="number" class="form-control1" value="<?php echo $g[0][$i]->phonenumber ; ?>" disabled="true" pattern="\d{3}[\-]\d{3}[\-]\d{4}" maxlength="10"  name="phone" id="phone" data-mask="999-999-9999" onblur="validatePhone()"/>
                                            <!--                                            <span style="color:red" id="error1"></span>-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="text1" class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12">Password</label>
                                        <span style="color:red" id="errorln"></span>
                                        <div class="col-lg-5 col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" placeholder="Password" class="form-control1" id="password" name="password" value="<?php echo $g[0][$i]->password ; ?>" disabled="true"/>
                                        </div>
                                    </div>

                                    <?php
                                    $i++;
                                }
                                ?>

                                <div class="form-group" id="edit_full">
                                    <div class="col-lg-9">
<a href="#" class="btn btn-primary pull-right" id="editBtn" name="bttn" onclick="edit_user_profile();">Edit</a>                        
<a href="#" class="btn btn-primary pull-right" id="updateBtn" name="bttn" onclick="update();" style="display: none;">Update</a>&nbsp;&nbsp;&nbsp;
<a href="javascript:location.reload();" id="cancelBtn" class="btn btn-primary pull-right" style="display: none;">Cancel</a>

                                    </div>	
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div> 

        </section><!-- /.content -->      
    </aside>
    <!-- </div>./wrapper -->
</aside>
</body>
<script type="text/javascript">

    function edit_user_profile(){
        console.log("in Edit");
         $("#firstName").attr("disabled", false); 
         $("#lastName").attr("disabled", false); 
         $("#emailId").attr("disabled", false); 
         $("#phone").attr("disabled", false); 
         $("#password").attr("disabled", false); 
         document.getElementById("editBtn").style.display = "none";
         document.getElementById("updateBtn").style.display = "block";
         document.getElementById("cancelBtn").style.display = "block";
        // var userId = document.getElementById('id').value ;
        // var firstName = document.getElementById('firstName').value ;
        // var lastName = document.getElementById('lastName').value ;
        // // var r_gender = $("input[name=gender]").is(":checked");
        // if (document.getElementById('r1').checked) {
        //     var gender = document.getElementById('r1').value;
        //     //                alert(g_value);
        // }
        // if (document.getElementById('r2').checked) {
        //     var gender = document.getElementById('r2').value;
        //     //                alert(g_value);
        // }
        // var emailId = document.getElementById('emailId').value ;
        // var phone = document.getElementById('phone').value ;
        // var password = document.getElementById('password').value ;
    }

    function validateFirstName()
    {
        var fn=document.getElementById("firstName").value;
        var name=(/^([a-z ,A-Z])+$/);
        if(!fn.match(name))
        {
            document.getElementById("errorFirstName").innerHTML="Please enter a valid first name";
            document.getElementById("firstName").value="";
            document.getElementById("firstName").focus();
        }
        else
        {
            document.getElementById("errorFirstName").innerHTML="";
        }
    }

    function validateLastName()
    {
        var ln=document.getElementById("lastName").value;
        var name=(/^([a-z ,A-Z])+$/);
        if(!ln.match(name))
        {
            document.getElementById("errorLastName").innerHTML="Please enter a valid last name";
            document.getElementById("lastName").value="";
            document.getElementById("lastName").focus();
        }
        else
        {
            document.getElementById("errorLastName").innerHTML="";
        }
    }

function validatePhone()
{

 var ph=document.getElementById("phone").value;
 var checPhoneExistStatus = 0;
 if(ph.length!=10)
 {
     document.getElementById("errorPhone").innerHTML="Please enter a valid phone number";
     document.getElementById("phone").value="";
     // document.getElementById("phone").focus();
     checPhoneExistStatus = 0;
 }
 else
 {
    document.getElementById("errorPhone").innerHTML="";
    checPhoneExistStatus = 1;
}
if(checPhoneExistStatus == 1){
        checkPhoneAlreadyExist(ph);
    }

}
function checkPhoneAlreadyExist(phone){
    // alert(phone);
    var readPhone = phone;
    $.ajax({
     type: "POST",
     url: "<?php echo base_url(); ?>admin/checkUserPhoneExist",
     cache: false,              
     data: {readPhone:readPhone},
     success: function(data){
        // alert(data);
       obj = jQuery.parseJSON(data);
        if (obj[0]['result_status'] == 0) {
            // alert("failed");
            document.getElementById("errorPhone").innerHTML="Phone Number already exist";
            document.getElementById("phone").value=readPhone;
             document.getElementById("updateBtn").style.display = "none";
            // document.getElementById("emailId").focus();
        }
        else if(obj[0]['result_status'] == 1){
            // alert("success");
            document.getElementById("errorphone").innerHTML = "";
             document.getElementById("updateBtn").style.display = "block";
        }
    },
    error: function (err)
    {
        alert("Error while request");
        alert(JSON.stringify(err));
    }
    });
}

function validateEmail()
{
    var readEmail = document.getElementById("emailId").value;
    var pattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
    var chechEmailExistStatus = 0;
    if (pattern.test(readEmail)) {
        document.getElementById("errorEmail").innerHTML = "";
        chechEmailExistStatus = 1;
    }
    else
    {
        document.getElementById("errorEmail").innerHTML = "Pls enter valid Email Address";
        document.getElementById("emailId").value="";
        // document.getElementById("emailId").focus();
        chechEmailExistStatus = 0;
    }
    if(chechEmailExistStatus == 1){
        checkEmailAlreadyExist(readEmail);
    }
    
}

function checkEmailAlreadyExist(readEmail){
    // alert(readEmail);
    $.ajax({
     type: "POST",
     url: "<?php echo base_url(); ?>admin/checkUserEmailExist",
     cache: false,              
     data: {readEmail:readEmail},
     success: function(data){
        obj = jQuery.parseJSON(data);
        if (obj[0]['result_status'] == 0) {
            // alert("failed");
            document.getElementById("errorEmail").innerHTML = "Email Already exist";
            document.getElementById("emailId").value=readEmail;
             document.getElementById("updateBtn").style.display = "none";
            // document.getElementById("emailId").focus();
        }
        else if(obj[0]['result_status'] == 1){
            // alert("success");
            document.getElementById("errorEmail").innerHTML = "";
             document.getElementById("updateBtn").style.display = "block";
        }
    },
    error: function (err)
    {
        alert("Error while request");
        alert(JSON.stringify(err));
    }
    });
}


$('#save').click(function (e)
{

    document.getElementById("save").disabled = true;

    if ($("#first_name").val() == "")
    {
//                alert("hi");
document.getElementById("errorfn").innerHTML="Please enter a valid first name";
}
else
{
    document.getElementById("errorfn").innerHTML="";
}
if ($("#last_name").val() == "")
{
 document.getElementById("errorln").innerHTML="Please enter a valid last name";
}
else
{
    document.getElementById("errorln").innerHTML="";
} 

if ($("#contact").val() == "")
{
    document.getElementById("errorphone").innerHTML="Please enter your phone number";
}
else
{
    document.getElementById("errorphone").innerHTML="";
}
if ($("#emailid").val() == "")
{
    document.getElementById("error-email").innerHTML="Please enter your email";
}
else
{
    document.getElementById("error-email").innerHTML="";
}
});

function update(){

    $("#error_message").empty();
    if ($("#firstName").val() == '')
    {
        $("#popup_button2").click();
        $("#error_message").append("Please Fill First Name Field");
        return;
    }
    else if ($("#lastName").val() == '')
    {
        $("#popup_button2").click();
        $("#error_message").append("Please Fill Last Name Field");
        return;
    }
    else if ($('#email').val() == 0)
    {
        $("#popup_button2").click();
        $("#error_message").append("Please Fill Email-id Field");
        return;
    }
    else if ($('#password').val() == '')
    {
        $("#popup_button2").click();
        $("#error_message").append("Please Fill Password Field");
        return;
    }
    else if ($('#phone').val() == '')
    {
        $("#popup_button2").click();
        $("#error_message").append("Please Fill phone Field");
        return;
    }
    else 
    var g_value = '';
    if (document.getElementById('r1').checked) {
    var g_value = document.getElementById('r1').value;
    //                alert(g_value);
    }
    if (document.getElementById('r2').checked) {
    var g_value = document.getElementById('r2').value;
    //                alert(g_value);
    }
    var userId = '<?php echo $g[0][0]->userid ?>';
    var firstName = document.getElementById('firstName').value;
    var lastName = document.getElementById('lastName').value;
    var phone = document.getElementById('phone').value;
    var emailId = document.getElementById('emailId').value;
    var password = document.getElementById('password').value;
    $.ajax({
     type: "POST",
     url: "<?php echo base_url(); ?>admin/editUserProfile",
     cache: false,				
     data: {userId:userId,firstName:firstName ,lastName:lastName,phone:phone,emailId:emailId,password:password, g_value:g_value},
     success: function(data){
        // alert(data);
        obj = jQuery.parseJSON(data);
        if (obj[0]['result_status'] == 1) {
            alert("Updated Successfully");
            location.reload();
        }
        else{
            alert("Something went wrong, please try again")
        }
    },
    error: function (err)
    {
        alert("Error while request");
        alert(JSON.stringify(err));
    }
});
} 
</script>
</html>
