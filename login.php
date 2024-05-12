<?php
session_start();
include ('include/header.php');
if(isset($_SESSION['auth'])) {
    $_SESSION['auth'] = "You are already logged in";
    header("location: dashboard.php");
}
?>

    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 my-5">
                    <?php
                    include ('message.php');
                    ?>
                    <div class="card my-5">
                        <div class="card-header bg-light">
                            <h4>Login Form</h4>
                        </div>
                        <div class="card-body">
                            <form action="logincode.php" method="post">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter your email..."><br>
                                    <label for="pass">Password</label>
                                    <input type="password" name="pass" class="form-control" placeholder="Enter your password..."><br>
                                    <div class="row justify-content-center">
                                    <input type="submit" name="login" class="btn btn-primary btn-lg" value="Login">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>