<?php
include_once "db_con.php";

//Add User to database
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


//Edit Uder to database
if(isset($_POST['edituser'])){
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    
    $sql = "UPDATE users SET fname = '$fname', lname = '$lname', email = '$email', phone = '$phone', pass = '$pass' WHERE id = '$id'";
    
    if(mysqli_query($con, $sql)){
        header("location: ../users.php");
    }else{
        echo "Error: ". $sql. "<br>". mysqli_error($con);
    }
    
    mysqli_close($con);
}
?>