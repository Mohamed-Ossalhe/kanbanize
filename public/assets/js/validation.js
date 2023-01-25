$(document).ready(()=>{
    // ! validating form inputs fields
    let rgxPatterns = {
        "email" : /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/, // eslint-disable-line
        "password": /^[\w@-]{8,20}$/,
        "phone_n": /^[0-9]{3}[0-9]{3}[0-9]{4}$/,
        "name": /^[A-Za-z\d]{5,20}$/
    };
    function validateInput(field, regex){
        if(regex.test(field.value)) {
            $(`p.${field.name}-error`).text("valide " + field.name);
            $(`p.${field.name}-error`).css("color","green");
        }else {
            $(`p.${field.name}-error`).text("invalide " + field.name);
            $(`p.${field.name}-error`).css("color","red");
        }
    }

    // check if inputs are empty
    const inputFields = $(".form-inputs");
    for(let element of inputFields) {
        element.addEventListener("keyup",function(e){
            if(e.target.value === "") {
                $(`p.${e.target.name}-error`).text("This Field Can't be Empty").css("color", "black");
            }else {
                validateInput(e.target, rgxPatterns[e.target.name]);
            }
        });
    }
});