<?php
    require_once "./nav.php";

    if(isset($_GET['SCRIPT_NAME'])){
        $necessary_page = $_GET['SCRIPT_NAME'];
        if ($necessary_page == "About"){
            require_once "./about.php";
        }elseif($necessary_page == "Home")
            require_once "./home.php";
        elseif($necessary_page == "Price"){
            require_once "./price.php";
        }elseif($necessary_page == "Tours"){
            require_once "./contacts.php";
        }elseif($necessary_page == "Lab2") {
            require_once "./Lab2.php";
        }else{
            require_once "./Lab2.php";
        }
    }
?>
