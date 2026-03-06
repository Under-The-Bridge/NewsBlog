<?php
session_start();
setcookie("auth",'',time()-3600,"/");
unset($_SESSION["auth"]);

header("Location: /");

?>