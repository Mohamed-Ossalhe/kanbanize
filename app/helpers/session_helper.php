<?php
    // check if user is logged in
    function isUserLogged() {
        if(isset($_SESSION["user-logged"])) {
            return true;
        }else {
            return false;
        }
    }
    // check if admin is logged in
    function isAdminLogged() {
        if(isset($_SESSION["admin-logged"])) {
            return true;
        }else {
            return false;
        }
    }
?>