<?php
    function redirect($page) {
        header("location: " . BASE_URL . "public/" . $page);
    }
?>