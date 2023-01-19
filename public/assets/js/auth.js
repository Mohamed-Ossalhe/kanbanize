$(document).ready(function () {
    // sign up form
    $(".sign-up").submit((e)=>{
        e.preventDefault();
        let userName = $("#sign-name").val();
        let userEmail = $("#sign-email").val();
        let userPassword = $("#sign-password").val();

        // console.log(userName);
        // console.log(userEmail);
        // console.log(userPassword);
        $.ajax({ // eslint-disable-line jquery/no-ajax
            url: "http://localhost/task-board/public/user/signUp",
            type: "post",
            data: {
                user_name: userName,
                user_email: userEmail,
                user_password: userPassword,
                role: 2
            },
            success: function(responce, status){
                console.log(status);
                console.log(responce);
                $("#sign-name").val("");
                $("#sign-email").val("");
                $("#sign-password").val("");
                location.assign("http://localhost/task-board/public/home/");
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

        // console.log(userEmail);
        // console.log(userPassword);
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