<?php
include_once "db_con.php";

if(isset($_POST['adduser'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    
    $sql = "INSERT INTO users (fname, lname, email, phone, pass) VALUES ('$fname', '$lname', '$email', '$phone', '$pass')";
    
    if(mysqli_query($con, $sql)){
        header("location: ../users.php");
    }else{
        echo "Error: ". $sql. "<br>". mysqli_error($con);
    }
    
    mysqli_close($con);
}
?>