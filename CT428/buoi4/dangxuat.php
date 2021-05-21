<?php
session_start();
if(session_destroy()) {
    header("Location: dangnhap_js.html");
 }
 else{
    header("Location: tuychon.php");
 }