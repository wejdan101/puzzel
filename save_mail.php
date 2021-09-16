<?php

include_once './dbconnect.php';
if (isset($_POST['email'])) {
    $step = mysqli_real_escape_string($con, $_POST['step']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    


    if (mysqli_query($con, "
    INSERT INTO `users` (`id`, `email`, `created_at`, `updated_at`,`time`,`step`,`phone`) VALUES (NULL, '$email', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP,'$time','$step','$phone');
    ")) {
        header("Location: ./index.php?msg=success");
    } else {
        header("Location: ./index.php?msg=faild");
    }
}
