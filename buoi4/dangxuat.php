<?php
session_start();
if(session_destroy()) {
    header("Location: dangnhap.html");
 }
 else{
    header("Location: tuychon.php");
 }