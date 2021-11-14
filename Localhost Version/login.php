<?php
require_once('ConnectionManager.php');

if(isset($_POST['login'])){
        $password_input = $_POST['password'];
        $username = $_POST['username'];

        // echo  $password_input;
        // echo $username;
        
        $new = new AccountDAO();
        $result_login = $new -> verify_account($username,$password_input);

        // var_dump($result_login);

        if($result_login) {
            session_start();
            $_SESSION['login_details'] = $new->retrieve_all($username) ;
            // var_dump($_SESSION['login_details']);
            header("Location: index.php");
            exit();
        }
        else{
            $key = 1;
        }
}
else{
    $key = 0;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!--bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!--axios-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    

    <style>
        body {
            background-image: url("Images/BackGround.png");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;

        }

        .nav-link {
            color: black;
            padding-top: 10px;
        }

        .btn-outline-info {
            color: rgb(238, 125, 144);
            border: 1px solid rgb(238, 125, 144);
        }

        .btn-outline-info:hover {
            background-color: rgb(238, 125, 144);
            border: 1px solid rgb(238, 125, 144);
            color: white;
        }

        h5 {
            color: rgb(238, 125, 144);
            margin-left: 20px;
        }

        .tag-btn {
            background-color: rgb(238, 125, 144);
            border: 1px solid rgb(238, 125, 144);
            color: white;
            margin: 0px 20px 10px 20px;
            border-radius: 20px;
            font-size: 14px;
        }

        a {
            text-decoration: none;
        }
        .nav a{
            color: black;
        }

        .nav a.explore:hover{
            color: rgb(238, 125, 144);
        }

        .nav a.next:hover {
            color: rgb(238, 125, 144);
        }

        .nav a.about:hover{
            color: rgb(238, 125, 144);
        }

        .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
            background-color: rgb(238, 125, 144);
            color: white;
        }
    </style>
</head>

<header>
    <div>
        <nav
            id="top-navbar"
            class="navbar navbar-light bg-light pb-2 border-bottom border-dark"
        >
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"
                    ><img
                        id="logo"
                        style="width: 150px; height: auto"
                        src="Images/Logo photo.PNG"
                /></a>
                <!-- insert icon here -->
                <form class="d-flex justify-content-end">


                    <a href="login.php" class="btn btn-outline-info me-2">Login</a>
                    <a href="signup.php" class="btn btn-outline-info me-2">Signup</a>

                </form>
            </div>
        </nav>

        <nav
            id="bottom-navbar"
            class="
                navbar navbar-expand-lg navbar-light
                bg-light
                pb-2
                border-bottom border-dark
            "
        >
            <div class="container-fluid">
                <div class="nav">
                    <a class="navbar-brand explore" href="index.php">Explore</a>
                    <a class="navbar-brand next" href="whatsnext.php">What'sNext?</a>
                    <a class="navbar-brand about" href="about.php">About us</a>
                </div>
                <div class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle text-dark"
                        href="#"
                        id="navbarDropdownMenuLink"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        >Guest
                    </a>
                    
                    <ul
                        class="dropdown-menu"
                        aria-labelledby="navbarDropdownMenuLink"
                    >
                        <li>
                            <a class="dropdown-item" href="editprofile.php">Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="wishlist.php"
                                >Wishlist</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    </header>


<body>

    <!--main content-->
    <div class='container' id='app'>
        <div class='col-2'></div>
        <div class='container mt-5 col-8 pb-5' style='background-color: rgb(250, 250, 250);'>
           
                <h1 class='text-center display-4 pt-5'>Cubto</h1>
                <h3 class='lead text-center fs-3'>Login</h3>

                <form class="row g-3 w-75 mx-auto mt-1" name= "form_data" method="POST" action>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="inputAddress2" name="username"> 
                    </div>

                    <div class="col-12">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name ="password">
                    </div>

                    <div class="col-12" id="error">
                        
                    </div>
                    <div class="col-12 mb-4 p-0">
                        <div class='container text-center' style='display:flex; justify-content: space-between;'>
                            <button type="submit" class="btn btn-outline-info w-100 me-2" name='login'>Login</button>
                        
                        </div>
                    </div>
                    <div class='text-center'>
                        <a href="forgetpassword.php" style='color: rgb(238, 125, 144);'>Forget Password!</a>
                    </div>


                    <!-- <div class='col-12 text-center'>
                        <button class="btn btn-success w-100" type="button">Continue with Gmail</button>
                    </div>

                    <div class='col-12 text-center mb-4'>
                        <button class="btn btn-primary w-100" type="button">Continue with Facebook</button>
                    </div> -->

                </form>

        </div>
        <div class='col-2'></div>
    </div>
    
    <script>
        var key = '<?=$key?>';
        // console.log(key);

        if (key == 1){
            document.getElementById("error").innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol></svg>
                <div class="alert alert-danger d-flex align-items-center" 
                role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/></svg><div>
                Login is not successful!
                </div></div>`;
        }
    </script>



    <!--bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
</body>

</html>