<?php 
    session_start();
    date_default_timezone_set("Asia/Kolkata");
    include "config.php";

    if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
        header('location: roof_specs.php');
        exit();
    }
    
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $captcha_field = $_POST['captcha'];
        $phone = $_POST['phone'];
        $gender = 'male'; // Consider making this dynamic based on user input
        if(isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK){
            $logo_name = $_FILES['logo']['name'];
            $logo_tmp = $_FILES['logo']['tmp_name'];
            $logo_size = $_FILES['logo']['size'];
            $logo_type = $_FILES['logo']['type'];

            // Check file type
            $allowed_types = array('image/png', 'image/jpeg');
            if(!in_array($logo_type, $allowed_types)){
                $_SESSION['error'] = 'Only PNG and JPEG images are allowed';
                header('location: register.php');
                exit();
            }

            // Check file size
            if($logo_size > 30000000){
                $_SESSION['error'] = 'Image size should not exceed 3KB';
                header('location: register.php');
                exit();
            }

            // Check dimensions
            list($width, $height) = getimagesize($logo_tmp);
            // if($width > 250 || $height > 250){
            //     $_SESSION['error'] = 'Image dimensions should not exceed 200x200 pixels';
            //     header('location: register.php');
            //     exit();
            // }

            // Generate unique filename
            $logo_extension = pathinfo($logo_name, PATHINFO_EXTENSION);
            $logo_filename = uniqid().'.'.$logo_extension;

            // Move uploaded file to desired location
            $upload_directory = 'uploads/';
            if(move_uploaded_file($logo_tmp, $upload_directory.$logo_filename)){
                // File uploaded successfully, proceed with registration
                // Use $logo_filename in your database insert query to store the filename
            }else{
                $_SESSION['error'] = 'Failed to upload logo';
                header('location: register.php');
                exit();
            }
        }else{
            $_SESSION['error'] = 'Logo is required';
            header('location: register.php');
            exit();
        }

        // Check if username or email already exists
        $stmt = $link->prepare("SELECT id FROM users WHERE email=? OR user_name=?");
        $stmt->bind_param("ss", $email, $username);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows > 0){
            $_SESSION['error'] = 'Username or Email already exists';
            $stmt->close();
            header('location: register.php');
            exit();
        }
        $stmt->close();

        // Hash the password securely
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the insert query using prepared statements
        $stmt = $link->prepare("INSERT INTO users (name, sex, email, user_name, password, phone, user_role, company, job, address, city, state, zip, logo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssisssssss", $name, $gender, $email, $username, $hashed_password, $phone, $user_role, $company, $job, $address, $city, $state, $zip, $logo_filename);
        $name = 'John'; // Consider making this dynamic based on user input
        $user_role = 2;
        $company = $_POST['company'];
        $job = $_POST['job'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $stmt->execute();
        $stmt->close();

        // Prepare and execute the select query using prepared statements
        $stmt = $link->prepare("SELECT id, name, user_role, password FROM users WHERE (email=? OR user_name=?)");
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($row = $result->fetch_assoc()){
            if(password_verify($password, $row['password'])){
                if($captcha_field == $_SESSION['captcha']){
                    unset($_SESSION['captcha']);

                    // Log successful login attempt
                    $log = getHostByName($_SERVER['HTTP_HOST']).' - '.date("F j, Y, g:i a").PHP_EOL.
                    "Login_".time().PHP_EOL.
                    "---------------------------------------".PHP_EOL;
                    file_put_contents('logs/log_'.date("j-n-Y").'.log', $log, FILE_APPEND);

                    if(isset($_POST['remember_me'])){
                        setcookie('username', $username, time()+24*60*60);
                        setcookie('password', $password, time()+24*60*60);
                    }else{
                        setcookie('username','');
                        setcookie('password','');
                    }

                    // Store user session data
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['role'] = $row['user_role'];
                    $_SESSION['timeout'] = time()+4200;
                    $_SESSION['login_at'] = date('h:m:s a');

                    header('location: roof_specs.php');
                    exit();
                }else{
                    $_SESSION['error'] = 'Wrong captcha';
                }
            }else{
                $_SESSION['error'] = 'Username or Password maybe wrong';
            }
        }else{
            $_SESSION['error'] = 'Username or Password maybe wrong';
        }

        $stmt->close();
    }

    // Shuffle captcha code
    $captcha_array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
    shuffle($captcha_array);
    $captcha_code = substr(implode('',$captcha_array),0,6);
    $_SESSION['captcha'] = $captcha_code;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Register</title>
    <style>
        #login
        {
            margin: 18% 30%;
            border: 1px solid lightgray;
            padding: 10px 20px 40px;
            box-shadow: 2px 5px 5px 2px lightgray;
        }
    </style>
</head>
<body>
<div class="container">
  <div id="login">
    <div class="mb-4"><h1 class="text-center">Register</h1></div>

    <?php if(isset($_SESSION['error'])){ ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php } ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fas fa-user'></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username" value="" required>
        </div>
        
         <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fas fa-user'></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter Email" id="email" name="email" value="" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fas fa-user'></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter Phone" id="phone" name="phone" value="" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fas fa-user'></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter Company Name" id="company" name="company" value="" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fas fa-user'></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter Job Name" id="job" name="job" value="" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fas fa-user'></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter Address" id="address" name="address" value="" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fas fa-user'></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter City" id="city" name="city" value="" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fas fa-user'></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter State" id="state" name="state" value="" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fas fa-user'></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter Zip Code" id="zip" name="zip" value="" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fas fa-key'></i></span>
            </div>
            <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" value="" required>
            <div class="input-group-append">
                <button type="button" class="input-group-text" onclick="passwordToggle()" id="toggle-btn"><i class='far fa-eye-slash'></i></button>
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fas fa-image'></i></span>
            </div>
            <input type="file" class="form-control" id="logo" name="logo" accept="image/png, image/jpeg" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-dark text-white"><strong style="letter-spacing:2px"><?php echo $_SESSION['captcha'] ?></strong></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter Captcha" id="captcha" name="captcha" required>
        </div>

        <div class="text-right mb-4">
            <input type="checkbox" id="remember_me" name="remember_me" <?php echo isset($_COOKIE['username']) || isset($_COOKIE['password']) ? 'checked' : '' ?>> Remember me
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="login">Register</button>
    </form>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
    //Password visibility
    function passwordToggle(){
        var btn = document.getElementById('toggle-btn');
        var pw = document.getElementById('password');

        if(pw.type == 'password'){
            pw.type = 'text'
            btn.innerHTML = "<i class='far fa-eye'></i>"
        }else{
            pw.type = 'password'
            btn.innerHTML = "<i class='far fa-eye-slash'></i>"
        }
    }

    //Error message hide
    setTimeout(function(){
        document.getElementsByClassName('alert')[0].style.display = 'none';
    }, 3000);
</script>