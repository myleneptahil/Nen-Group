<?php include('connect.php') ?>

<?php
    if(isset($_POST["submit"])){
        echo $_POST["loginUsername"];
        echo $_POST["loginPassword"];
    }
?>


<?php
    $registerFname = $registerLname = $registerEmail = $registerPassword = "";

    $errors = array('registerFname' => '' , 'registerLname'=> '', 'registerEmail' => '', 'registerPassword'=> '');

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    if(isset($_POST['submitregister'])){

        //check First Name
        if(empty($_POST['registerFname'])){
            $errors['registerFname']= 'First name is required <br/>';
        }else{
            $registerFname = test_input($_POST['registerFname']);

            //First name must be letters and spaces only
            if(!preg_match("/^[a-zA-Z ]*$/",$registerFname)){
                $errors['registerFname'] = 'Must be a valid first name.';
            }
        }

        //check Last Name
        if(empty($_POST['registerLname'])){
            $errors['registerLname']= 'Last name is required <br/>';
        }else{
            $registerLname = test_input($_POST['registerLname']);

            //matching using reg expressions
            if(!preg_match("/^[a-zA-Z\s]*$/",$registerLname)){
                $errors['registerLname'] = 'Must be a valid last name.';
            }
        }
       
        //check email

        //validate if email is empty
        if(empty($_POST['registerEmail'])){
            $errors['registerEmail'] = 'An email is required <br/>';
        }else{
            $registerEmail = test_input($_POST['registerEmail']);

            //validate email is correct format
            if(!filter_var($registerEmail, FILTER_VALIDATE_EMAIL)){
                $errors['registerEmail'] = 'Email must be a valid email address';
            }
        }

        if(array_filter($errors)){
            //with error
        }else{
            header('Location: index.html');
        }

        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Design</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <a href="index.html" class="back-home">Back to Homepage</a>
    <div id="container">
        <main id="main">
        <form class="user" action="login.php" method="POST">
            <div id="loginuicontainer">
                <div id="login-tab" class="active">Login</div>
                <div id="register-tab">Register</div>
                <div id="logincontainer">
                    <div class="form-group">
                    <label for="logUsername">Email Address: </label>
                        <input type="text" class="form-control inputbox" name="logUsername" placeholder="Email ID/ Username">
                    </div>
                    <div class="form-group">
                    <label for="logPassword">Password: </label>
                        <input type="password" class="form-control inputbox" name="logPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="Login">
                    </div>
                    <div class="textcenter signuptxt">Don't have an account? <a href="#" class="link registerlink">Sign up</a></div>
                <p class="textcenter forgettxt"><a href="#" class="link forgetlink">Forget password</a></p>
                </div>
                
            </div>
        </form>
        <form class="user" action="login.php" method="POST">
                <div id="registercontainer" hidden>
                        <div class="form-group">
                            <label for="registerFname">First Name: </label>
                            <input type="text" class="form-control inputbox" name="registerFname" value=" <?php echo htmlspecialchars($registerFname) ?> ">

                            <div class="red-text"> 
                                <?php echo $errors['registerFname']; ?>
                            </div>
                        </div>

                    <div class="form-group">
                        <label for="registerLname">Last Name: </label>
                        <input type="text" class="form-control inputbox" name="registerLname" value=" <?php echo htmlspecialchars($registerLname) ?> ">
                   
                        <div class="red-text"> 
                                <?php echo $errors['registerLname']; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="registerEmail">Email Address: </label>
                        <input type="email" class="form-control inputbox" name="registerEmail" value=" <?php echo htmlspecialchars($registerEmail) ?> ">

                        <div class="red-text"> 
                                <?php echo $errors['registerEmail']; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="registerPassword">Password: </label>
                        <input type="password" class="form-control inputbox" name="registerPassword" value=" <?php echo htmlspecialchars($registerPassword) ?> ">
                    
                    </div>

                    <div class="form-group">
                        <label for="registerCnfmpassword">Confirm Password: </label>
                        <input type="password" class="form-control inputbox" name="registerCnfmpassword" placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submitregister" value="Register">
                    </div>

                    <div class="textcenter signuptxt">Already have an account? <a href="#" class="link loginlink">Login</a></div>

                </div>
            </div>
        </form>
        </main>
    </div>

    <script src="login.js"></script>
</body>
</html>