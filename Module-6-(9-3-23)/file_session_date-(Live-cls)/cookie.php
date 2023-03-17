<?php


print_r($_COOKIE);

setcookie('ostad', '16',time()+60,"/");
setcookie("ostad-secure", "32", time()+60,"/","",true,true); // secure cookie use not read js
