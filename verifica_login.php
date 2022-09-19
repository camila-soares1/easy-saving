<?php
//session_start();
if(!$_SESSION['utilizador']) {
    header('Location: login.html');
    exit();
}