<?php
if(isset($_POST['login-submit'])){

    require 'dbh.inc.php';
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if(empty($mailuid) || empty($password)){
        header("Location: ../login.html?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../login.html?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if($pwdCheck == false){
                    header("Location: ../login.html?error=wrongpwd");
                    exit();
                }
                else if($pwdCheck == true){    
                    session_start();
                    $result1=$conn->query($sqlrow);
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['useruid'] = $row['uidUsers'];
                    header("Location: ../home.php?login=success");
                    exit();
                }
                else{
                    header("Location: ../login.html?error=wrongpwd");
                    exit();
                }
            }
            else{
                header("Location: ../login.html?error=nouser");
                exit();
            }
        }
    }
}
else{
    header("Location: ../login.html?error=bad");
    exit();
}