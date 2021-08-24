
    $("#submitForm").click(function(){
        alert('hii');
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var zipcode = $("#zipcode").val();
        var mobile= $("#phone").val();
        var email = $("#email").val();
        var token = $("#csrf").val();

        var APP_URL = "<?php echo {{url('/')}} ?>"; 

       $.ajax({
        url: APP_URL+'customer/submitRegisterForm',
        type:'POST',
        data:{
            _token:token,
            first_name:first_name,
            last_name:last_name,
            zipcode:zipcode,
            mobile:mobile,
            email:email},
        success:function(result){
            var result = JSON.parse(result);
            // alert(result);
            if(result.statusCode == 200){
                    $("#formdiv").removeClass('show');
                    $("#formdiv").addClass('hide');
                    $("#otpdiv").removeClass('hide'); 
                    $("#otpdiv").addClass('show'); 
                    }
            else{
                alert("something wrong... please try later");
            }
        }
       })
    })

    $("#otpSubmit").click(function(){
        var otp = $("#otp").val();
        otp = otp.trim();
        var token = $("#csrf").val();
        console.log("---",otp);
        var APP_URL = "<?php echo {{url('/')}} ?>"; 
        $.ajax({
            type:"post",
            url:APP_URL+'/submitotp',
            data:{
                _token:token,
                otp:otp
            },
            success:function(otpResult){
                otpResult = JSON.parse(otpResult);
                if(otpResult.statusCode == 200){
                    location.replace("/showresult");
                }
                else{
                    alert("otp not match. Please try again");
                }
            }
        })
    })