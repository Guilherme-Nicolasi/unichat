<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    if(!empty($email) && !empty($password)) {
        $connected = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($connected) > 0){
            $row = mysqli_fetch_assoc($connected);
            $user_password = md5($password);
            $enc_password = $row['password'];
            if($user_password === $enc_password){
                $status = "Online";
                $set_status = mysqli_query($connection, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($set_status) {
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                }
            } else {
                echo "Email or Password is Incorrect!";
            }
        } else {
            echo "Email not Exist!";
        }
    } else {
        echo "All input fields are required!";
    }
?>
