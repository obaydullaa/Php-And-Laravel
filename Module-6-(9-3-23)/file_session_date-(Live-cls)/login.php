<?php

if($_COOKIE['loggedin'] ==1) {
    echo "User is Logged In";
}else {
    echo "User is Logged Out";
}

if(isset($_GET['login']) && $_GET['login']=1) {
    setcookie("loggedin", "1", time()+600, "/");
}


if(isset($_GET['login']) && $_GET['login']=1) {
    unset($_COOKIE['loggedin']);
}