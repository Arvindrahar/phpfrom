

<?php

// echo $_SERVER['REQUEST_METHOD'];

// print_r($_POST);

// echo " ".$_POST['phone'];
// $name = "9777546474";
// $name_pattern = '/^[a-zA-Z]+[ a-zA-Z]+/';

// $phone_pattern = '/^[0-9]{10}$/';

// echo preg_match($phone_pattern, $name);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // print_r($_POST);
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    // $image = $_POST['image'];
    // echo "<pre>";
    // // print_r($_POST);
    // // print_r($_FILES);
    
    // echo "</pre>";
    $name_pattern = '/^[a-zA-Z]+[ a-zA-Z]+/';
    $phone_pattern = '/^[0-9]{10}$/';
    $email_pattern = '/[a-zA-Z0-9._]+@[a-zA-Z]+\.[a-zA-Z]{2,}/';
    $isNameValid = preg_match($name_pattern, $name);
    $isPhoneValid = preg_match($phone_pattern, $phone);
    $isEmailValid = preg_match($email_pattern, $email);
    //name => Surajmugal kumar sdj
    if(!$isNameValid){
        echo 'Please enter a valid name';
    }
    if(!$isPhoneValid){
        echo 'Please enter a valid phone';
    }
    
    if(!$isEmailValid){
        echo 'Please enter a valid email';
    }
    
    if($isNameValid && $isPhoneValid && $isEmailValid){
        if(isset($_FILES)){
            $file = $_FILES['image'];
            $file_name = $file['name'];
            $file_temp = $file['tmp_name'];
            $file_size = $file['size'];
            $target = 'uploads/';
            // 'uploads/img006.jpg';
            $path = $target.$file_name;
            $file_extension = pathinfo($path, PATHINFO_EXTENSION);
            if(file_exists($path)){
                echo "file already exists";
            }else{
                if($file_extension != 'pdf'){
                    echo "please upload pdf file";
                }else{
                    if(move_uploaded_file($file_temp, $path)){
                        echo "file uploaded succesfully";
                    }else{
                        echo "something went wrong";
                    }
                }
            }
            
        }
    }
}

?>


