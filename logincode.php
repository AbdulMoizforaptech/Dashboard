<?php
session_start();
include ('config/db_con.php');
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass' LIMIT 1";
    $result = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result)>0){
        foreach ($result as $row){
            $user_id = $row['id'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $user_name = $fname." ".$lname;
            $user_email = $row['email'];
            $user_phone = $row['phone'];
        };
        $_SESSION['auth'] = true;
        $_SESSION['auth_user'] =
        [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_phone' => $user_phone
        ];
        $_SESSION['status'] = "Login Successfully";
        header('location: dashboard.php');
    }else{
        $_SESSION['status'] = "Login Failed";
        header('location: login.php');
    }
}else{
    $_SESSION['status'] = "Access Denied";
    header('location: login.php');
}
?>