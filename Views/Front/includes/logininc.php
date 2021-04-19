<?php


if (isset($_POST['login_submit'])) {


    require 'dbhinc.php';


    $username = $_POST['username'];
    $password = $_POST['password'];


    if (empty($username)  || empty($password)) {
        header("Location: ../connecter.php?error=emptyfields");
        exit();
    } else {
        
        $sql = "SELECT * FROM clients WHERE username=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("Location: ../connecter.php?error=sqlerror");
            exit();

        } else {

            
            mysqli_stmt_bind_param($stmt, "ss", $username , $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) 
            {
                
                $pwdCheck = $row["password"];

                if ($pwdCheck != $password)
                {
                    header("Location: ../connecter.php?error=wrongpassword");
                    exit();
                }
                else
                {
                    session_start();
                    $_SESSION['etat'] = 1;
                    //echo '<a href="../index.php?link=' . $etat . '></a>';
                    header("Location: ../index.php?login=success");
                    exit();
                }
            } 
            else
            {
                header("Location: ../connecter.php?error=wrongusername");
                exit();
            }
        }
    }
} else {
  
    header('refresh:1;url=../index.php');


    exit();
}
