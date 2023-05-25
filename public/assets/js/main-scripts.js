$(document).ready(()=>{
    // get profile info elements
    let profileImage = $(".profile-image > img");
    let profileName = $(".profile-info-text h1");
    let profileEmail = $(".profile-info-text h2");
    let headerProfileImage = $(".header-profile-image");
    let headerProfileName = $(".user-name");
    let headerProfileEmail = $(".user-email");

    // get form inputs
    // update form
    let updateForm = $(".update-profile-form");
    let inputImage = $("#user-image");
    let inputName = $("#user-name");
    let inputEmail = $("#user-email");
    let oldPassword = $("#old-password");
    let newPassword = $("#new-password");
    // data
    let profileData = {
        // profile info
        headerUserName: headerProfileName,
        headerUserEmail: headerProfileEmail,
        headerImage: headerProfileImage,
        profileImage: profileImage,
        profileName: profileName,
        profileEmail: profileEmail,
        // form-inputs
        formImage: inputImage,
        formName: inputName,
        formEmail: inputEmail,
        formOldPass: oldPassword,
        formNewPass: newPassword
    };
    getUserInfo(profileData);
    updateForm.submit((e)=>{
        e.preventDefault();
        updateUserInfo(profileData);
    });
});

function getUserInfo(data) {
    $.ajax({ // eslint-disable-line
        url: "http://localhost/kanbanize/public/user/getUserInfo",
        type: "get",
        success: (response) => {
            let dataParsed = $.parseJSON(response);
            // insert profile data into profile dom elements
            data.headerUserName.text(dataParsed.user_name);
            data.headerUserEmail.text(dataParsed.user_email);
            data.headerImage.attr("src", "http://localhost/kanbanize/public/assets/img/" + dataParsed.user_image);
            data.profileImage.attr("src", "http://localhost/kanbanize/public/assets/img/" + dataParsed.user_image);
            data.profileName.text(dataParsed.user_name);
            data.profileEmail.text(dataParsed.user_email);
            // insert profile data into form elements
            data.formName.val(dataParsed.user_name);
            data.formEmail.val(dataParsed.user_email);
        },
        error: (error) => {
            console.log(error);
        }
    });
}

function updateUserInfo(data) {
    let image = data.formImage[0].files;
    let name = data.formName.val();
    let email = data.formEmail.val();
    let oldPass = data.formOldPass.val();
    let newPass = data.formNewPass.val();
    // console.log(image, name, email, oldPass, newPass);
    let formData = new FormData();
    formData.append("user_image",image[0]);
    formData.append("user_name",name);
    formData.append("user_email",email);
    formData.append("user_old_password",oldPass);
    formData.append("user_new_password",newPass);
    // console.log(image, name, email, oldPass, newPass);
    $.ajax({ // eslint-disable-line jquery/no-ajax
        url: "http://localhost/kanbanize/public/user/updateUserInfo",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response){
            $(".error").text(response);
            console.log(response);
            getUserInfo(data);
            data.formImage.val("");
            data.formOldPass.val("");
            data.formNewPass.val("");
        },
        error: function(error){
            console.log(error);
        }
    });
}