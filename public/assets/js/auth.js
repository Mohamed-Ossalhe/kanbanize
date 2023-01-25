$(document).ready(function () {
    // sign up form
    $(".sign-up").submit((e)=>{
        e.preventDefault();
        let userName = $("#sign-name").val();
        let userEmail = $("#sign-email").val();
        let userPassword = $("#sign-password").val();
        let userImage = $("#image")[0].files;
        let role = 2;
        let formData = new FormData();
        formData.append("user_image",userImage[0]);
        formData.append("user_name",userName);
        formData.append("user_email",userEmail);
        formData.append("user_password",userPassword);
        formData.append("role",role);
        $.ajax({ // eslint-disable-line jquery/no-ajax
            url: "http://localhost/task-board/public/user/signUp",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(responce){
                $("#sign-name").val("");
                $("#sign-email").val("");
                $("#sign-password").val("");
                $("#image").val("");
                $(".error").text(responce);
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    // log-in form
    $(".log-in").submit((e)=>{
        e.preventDefault();
        let userEmail = $("#log-email").val();
        let userPassword = $("#log-password").val();
        $.ajax({ // eslint-disable-line jquery/no-ajax
            url: "http://localhost/task-board/public/user/logIn",
            type: "post",
            data: {
                user_email: userEmail,
                user_password: userPassword
            },
            success: function(response, status) {
                if(response === "user logged" && status === "success") {
                    // console.log(response);
                    location.assign("http://localhost/task-board/public/home/");
                }
                $(".error").text(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // switch between login form and sign up form
    $(".switch-sign").click(function() {
        $(".sign-up-form").removeClass("hidden");
        $(".log-in-form").addClass("hidden");
    });
    $(".switch-log").click(function(){
        $(".log-in-form").removeClass("hidden");
        $(".sign-up-form").addClass("hidden");
    });
});