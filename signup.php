<?php 
    require_once('ConnectionManager.php');

    if(isset($_POST['signup'])) {

        $user_id = '';

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $question = $_POST['question'];
        $answer = $_POST['answer'];

        $new = new AccountDAO();
        $executed = $new -> signup($user_id, $username, $password, $email, $first_name, $last_name, $question, $answer);

        // here to be redirected.
        header("Location: createdaccount.html");
        exit();
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background-image: url("Images/BackGround.png");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>

    <!--bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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

                    <a href="login.php" class="btn btn-outline-primary me-2">Login</a>
                    <a href="signup.php" class="btn btn-outline-success me-2">Signup</a>

    <nav id="top-navbar" class="navbar navbar-light bg-light pb-2 border-bottom border-dark">
        <div class="container-fluid">
            <a class="navbar-brand"><img id="logo" style="width: 150px; height: auto;"
                    src="Images/Logo photo.PNG"></a>
            <!-- insert icon here -->
            <form class="d-flex w-75">
                <input class="form-control" type="search" placeholder="Search Places" aria-label="Search"/>
                <button class="btn" type="submit">
                    🔍
                </button>
                <button type="button" class="btn btn-outline-primary me-2">Login</button>
                <button type="button" class="btn btn-outline-success me-2">Signup</button>

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

    <!--main content: form-->
    <div class='container'>
        <div class='row'>
            <div class='col-2'></div>
            <div class='container mt-5 col-8' style='background-color: rgb(250, 250, 250);'>

                <h1 class='text-center display-4 pt-5'>Cubto</h1>
                <h3 class='lead text-center fs-3'>Sign Up</h3>

                <form class="row g-3 w-75 mx-auto mt-4" name="signup" method="POST">
                    <div class="col-md-6">
                        <label for="fname" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="fname" name= "first_name">
                    </div>
                    <div class="col-md-6">
                        <label for="lname" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="lname" name= "last_name">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name= "email">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="inputAddress2"
                            placeholder="Must be at least 5 characters" name = "username">
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password"
                            placeholder="Must be at least 6 characters with a upper and lowercase.." 
                            name = "password">
                    </div>
                    <div class="col-12">
                        <label for="confirm_password" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirm_password">
                    </div>
                    <div class="col-12">
                        <label for="secret_question" class="form-label" id='secret_question' >Select your secret
                            questionaire:</label>
                        <select class="form-select" aria-label="Default select example" name="question">
                            <option value="What is your favourite color?" selected>What is your favourite color?</option>
                            <option value="What is your occupation?">What is your occupation?</option>
                            <option value="What is your favourite day of the week?">What is your favourite day of the week?</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="secret_answer" class="form-label">What is your answer:</label>
                        <input type="text" class="form-control" id="secret_answer" name="answer">
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" style='font-size: 12px;' for="gridCheck">
                                I agree with the terms and condition...
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <button type="submit" class="btn btn-primary" name = "signup">Sign Up</button>
                    </div>
                </form>

            </div>
            <div class='col-2'></div>
        </div>
    </div>

    <!--bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
</body>

</html>