<?php
    session_start();
    include_once "config.php";
    $fristname = mysqli_real_escape_string($connection, $_POST['fname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    if(!empty($fristname) && !empty($lastname) && !empty($email) && !empty($password)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $connected = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($connected) > 0) {
                echo "This email already exist!";
            } else {
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true) {
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true) {
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)) {
                                $ran_id = rand(time(), 100000000);
                                $status = "Online";
                                $encrypt_password = md5($password);
                                $insert_query = mysqli_query($connection, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                VALUES ({$ran_id}, '{$fristname}','{$lastname}', '{$email}', '{$encrypt_password}', '{$new_img_name}', '{$status}')");
                                if($insert_query) {
                                    $select_sql2 = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0) {
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "success";
                                    } else {
                                        echo "This email address not Exist!";
                                    }
                                } else {
                                    echo "Something went wrong. Please try again!";
                                }
                            }
                        } else {
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    } else {
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
            }
        } else {
            echo "$email is not a valid email!";
        }
    } else {
        echo "All input fields are required!";
    }
?>