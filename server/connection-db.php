<?php
    echo '<link rel="stylesheet" href="../assets/css/bootstrap.min.css">';
    $conn = mysqli_connect("localhost","root","","NewsBlog-2");
    session_start();

    function echo_error($error,$link){
        echo "<div class='alert alert-danger' role='alert'>$error! <a class='alert-link' href='$link'>Вернутся</a></div>";
    }
    function echo_good($text,$link){
        echo "<div class='alert alert-success' role='alert'>$text! <a class='alert-link' href='$link'>Вернутся</a></div>";
    }
?>