<?php


    if(isset($_POST['signup_submit']))
    {
        
        require 'dbhinc.php';

        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $sexe = $_POST["sexe"];



        if(empty($username) || empty($password) || empty($email) || empty($phone) || empty($sexe) ){
            header("Location: ../s'incrire.php?error=emptyfields");
            exit();
        }

        else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username) ){
            header("Location: ../s'incrire.php?error=invalidmailname");
            exit();

        }

        else if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
            header("Location: ../s'incrire.php?error=invalidmail&name=".$username);
            exit();

        }
        else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
            header("Location: ../s'incrire.php?error=invalidname&mail=".$email);
            exit();

        }
        else
        {

            $sql="SELECT username FROM clients WHERE username=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){

                header("Location: ../s'incrire.php?error=sqlerror");
                exit();
            }
            else{

                mysqli_stmt_bind_param($stmt , "s" ,$username );
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck=mysqli_stmt_num_rows($stmt);
                if($resultCheck>0){
                    header("Location: ../s'incrire.php?error=usernamealredytaken&mail=".$email);
                    exit();
                }
                else{

                    

                    $sql="INSERT INTO clients (username,password,email,phone,sexe) VALUES ( ? , ? , ? , ? , ?) ";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                
                        header("Location: ../s'incrire.php?error=sqlerror");
                        exit();
                    }
                    else{
                    
                        mysqli_stmt_bind_param($stmt , "sssss" ,$username , $password ,$email , $phone , $sexe );
                        mysqli_stmt_execute($stmt);

                        header("Location: ../s'inscrire.php?signup=success");
                        exit();
                    
                    }

                }

            }
                
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }
    else
    {
        header('Location=../index.php');
        exit();
    }

?>
