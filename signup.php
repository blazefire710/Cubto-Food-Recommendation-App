<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background-image: url("../images/Local-Food-Illo_Project-file_2072020-1400x1000-01.webp");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
       
    </style>

    <!--bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <!--  
    <div class='navbar navbar-light bg-light'>
        
        <div class=''>
            <a class="navbar-brand" href="#">
                <img src="images/—Pngtree—food icon design vector_4996277.png" style="width:80px;" alt="" width="30"
                    height="24" class="d-inline-block align-text-top">
            Cubto
            </a>
        </div>

        
        <div class=''>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style='width: 500px;'>
            </form>
        </div>

        
        <div class=''>
            <a href="#" class="btn btn-outline-success" role="button" data-bs-toggle="button">Login</a>
            <a href="#" class="btn btn-outline-success" role="button" data-bs-toggle="button">Sign Up</a>
        </div>
    </div>

    
    <div style='background-color: rgb(250, 250, 250);'>
        <nav class="nav">
            <a class="nav-link" style='color: black;' aria-current="page" href="#">Explore</a>
            <a class="nav-link" style='color: black;' href="#">What'sNext</a>
            <a class="nav-link" style='color: black;' href="#">About Us</a>
            <i class="fas fa-user"></i>
            <a class="nav-link" style='color: black;' href="#">Guest</a>
        </nav>
    </div> -->

    <nav id="top-navbar" class="navbar navbar-light bg-light pb-2 border-bottom border-dark">
        <div class="container-fluid">
            <a class="navbar-brand"><img id="logo" style="width: 150px; height: auto;"
                    src="../Images/Logo photo.PNG"></a>
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

    <nav id="bottom-navbar" class="
                navbar navbar-expand-lg navbar-light
                bg-light
                pb-2
                border-bottom border-dark
            ">
        <div class="container-fluid">
            <div class="">
                <a class="navbar-brand" href="#">Explore</a>
                <a class="navbar-brand" href="#">What'sNext?</a>
                <a class="navbar-brand" href="#">About us</a>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">Guest
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Favourites</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Edit Profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Booking-History</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!--main content: form-->
    <div class='container'>
        <div class='row'>
            <div class='col-2'></div>
            <div class='container mt-5 col-8' style='background-color: rgb(250, 250, 250);'>

                <h1 class='text-center display-4 pt-5'>Cubto</h1>
                <h3 class='lead text-center fs-3'>Sign Up</h3>

                <form class="row g-3 w-75 mx-auto mt-4">
                    <div class="col-md-6">
                        <label for="fname" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="fname">
                    </div>
                    <div class="col-md-6">
                        <label for="lname" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="lname">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="inputAddress2"
                            placeholder="Must be at least 5 characters">
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password"
                            placeholder="Must be at least 6 characters with a upper and lowercase..">
                    </div>
                    <div class="col-12">
                        <label for="confirm_password" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirm_password">
                    </div>
                    <div class="col-12">
                        <label for="secret_question" class="form-label" id='secret_question'>Select your secret
                            questionaire:</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1" selected>What is your favourite color?</option>
                            <option value="2">What is your occupation?</option>
                            <option value="3">What is your favourite day of the week?</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="secret_answer" class="form-label">What is your answer:</label>
                        <input type="text" class="form-control" id="secret_answer">
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
                        <button type="submit" class="btn btn-primary">Sign Up</button>
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