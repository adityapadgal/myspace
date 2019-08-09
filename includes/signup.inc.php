<?php
if(isset($_POST['signup-submit'])){

    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pass'];
    $number = $_POST['number'];

    if(empty($username) || empty($email) || empty($password) || empty($number)){
        header("Location: ../login.html?error=emptyfields&uid=".$username."&mail=".$email."&number=".$number);
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../login.html?error=invalidmail&uid=".$username."&number=".$number);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../login.html?error=invaliduid&number=".$number."&mail=".$email);
        exit();
    }
    else
    {
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../login.html?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("Location: ../login.html?error=usertaken&mail=".$email."&number".$number);
                exit();
            }
            else{
                $sqlAccount = "INSERT INTO account_details (accountType) VALUES ('guest')";
                $conn->query($sqlAccount);
                $sql = "INSERT INTO users (uidUsers ,emailUsers, pwdUsers ,numberUsers) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../login.html?error=sqlerror");
                    exit();
                }
                else{

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPwd, $number);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../login.html?signup=succes");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: ../login.html");
    exit();
}