<?php
    require_once('ConnectionManager.php');
    session_start();

    if(isset($_SESSION['username_fix'])){
        if(isset($_POST['submit'])){

            $username = $_SESSION['username_fix'];
            $password_input = $_POST['password'];

            $new = new AccountDAO();

            $execute = $new -> change_password($username,$password_input);

            if($execute){
                header("Location: successpassword.html");
                exit();
            }

            else{
                $key = 1;
            }


        }

    }
    else{
        header("Location: login.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
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
          
    </style>
</head>

<header>
    <nav
        id="top-navbar"
        class="navbar navbar-light bg-light pb-2 border-bottom border-dark"
    >
        <div class="container-fluid">
            <a class="navbar-brand" href="updated_explore.html"
                ><img
                    id="logo"
                    style="width: 150px; height: auto"
                    src="Images/Logo photo.PNG"
            /></a>
            <!-- insert icon here -->
            <form class="d-flex w-75">
                <input
                    class="form-control"
                    type="search"
                    placeholder="Search Places"
                    aria-label="Search"
                />
                <button class="btn" type="submit">🔍</button>

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
            <div class="">
                <a class="navbar-brand" href="updated_explore.html">Explore</a>
                <a class="navbar-brand" href="whatsnext.html">What'sNext?</a>
                <a class="navbar-brand" href="about.php">About us</a>
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
                        <a class="dropdown-item" href="editprofile.php">Edit Profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="wishlist.php"
                            >Wishlist</a
                        >
                    </li>
                    <li>
                        <a class="dropdown-item" href="login.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>

    <!--main content-->
    <div class='container' id='app'>
        <div class='col-2'></div>
        <div class='container mt-5 col-8' style='background-color: rgb(250, 250, 250);'>
           
                <h1 class='text-center display-4 pt-5'>Cubto</h1>
                <h3 class='lead text-center fs-3'>Forget Password</h3>

                <form class="row g-3 w-75 mx-auto mt-1" method="POST">
                    <div class='col-12'>
                        <label for="password" class="form-label">Please Enter Your New Password:</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <div class='col-12'>
                        <label for="confirmPassword" class="form-label">Please Confirm Your Password:</label>
                        <input type="text" class="form-control" id="confirmPassword" name="confirm_password">
                    </div>

                    

                    

                    <div class='col-12 text-center mt-4 pb-4' style='border-bottom: 1px solid rgb(193, 189, 189);'>
                        <button class="btn btn-outline-info w-100" type="submit" name="submit">Continue</button>
                    </div>

                    

                </form>

          
        </div>
        <div class='col-2'></div>
    </div>



    <!--bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
</body>

</html>