<?php
session_start();
if (!isset($_SESSION['login_details'])) {
    header("Location: login.php");
    exit();
}
else{

    $_SESSION['login_details'] = $_SESSION['login_details'];
    $data = $_SESSION['login_details'];
    $username = $data[0];
    $email = $data[2];
    $first_name = $data[3];
    $last_name = $data[4];
    $gender = $data[7];
    $birthday = $data[8];
    $profile_image = $data[9];
    $bio = $data[10];

    if(isset($_POST['signup'])){

    }
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Profile</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <style>
            body { /* this is for the background image */
                background-image: url("Images/BackGround.png");
                background-size: cover;
                height: 100vh;
            }
        
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
        <div id='app'>
            <!-- INSERT V-IF TO DISPLAY THIS VUE PART -->
            <nav id="top-navbar" class="navbar navbar-light bg-light pb-2 border-bottom border-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="updated_explore.html"
                        ><img
                            id="logo"
                            style="width: 150px; height: auto"
                            src="Images/Logo photo.PNG"
                    /></a>
                    <!-- insert icon here -->
                    <form class="d-flex w-75">
                        <input class="form-control" type="search" placeholder="Search Places" aria-label="Search"/>
                        <button class="btn" type="submit">🔍</button>

                        <a href="login.php" class="btn btn-outline-primary me-2">Login</a>
                        <a href="signup.php" class="btn btn-outline-success me-2">Signup</a>

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
                                <a class="dropdown-item" href="editprofile.php">Profile</a>
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
            <!-- ANOTHER V-ELSE HERE -->
            <form method="POST">
            <div class="container">
                <div class="card shadow my-5">
                    <div class=" card-body p-5" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLRvjmzVbiNIHbNHTsL8HZwNBLuyYaOzZm8w&usqp=CAU); background-size: cover; background-position: center top;opacity:1;">
                    <!-- INSERT YOUR PAGE CONTENT HERE -->
                        <div style="margin-bottom:50px">
                            <h1 class="fw-light text-center mb-6">
                                Manage Account
                            </h1>
                        </div>          

                        <div class="row my-6">

                            <div class="col-md col-md bg-white rounded-3">
                                <div class="d-flex justify-content-between" style="margin-top:20px">
                                    <div class="fs-4" id= "account_title" ></div>
                                    
                                </div>
                                <hr>
                                <div class="bg-light rounded-3 m-2">
                                    <div class="fw-light fs-6" style="color:grey; text-align:center">User information<br>
                                    <span class="form-text">These information will be visible to others</span>
                                </div>
                                    
                                    <!-- Profile Image Row -->
                                    <div class="row m-2">
                                        <div class="col-12" style="text-align:center"><img id="profile" src="" alt="Missing Profile Image" class="" style="border-radius:50%;width:150px;height:150px;object-fit:cover;border: 5px solid rgb(238, 125, 144);"></div>
                                        <div class="col-4"></div>
                                        <div class="col-4 mt-3"><input type="file" class="form-control" id="inputGroupFile01" name="profile_page"></div>
                                        <div class="col-4"></div>
                                    </div>
                                    <!-- 1st Row -->
                                    <div class="row m-2">
                                        <div class="col-sm-6">
                                            <label for="username" class="form-label" >Username</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon3">@</span>
                                                <input type="text" class="form-control" id="username" aria-describedby="basic-addon3" value="Htreborn" name="username" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="email" aria-describedby="basic-addon3" value="example@gmail.com" name="email" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2nd Row  -->
                                    <div class="row m-2">
                                        <div class="col-sm-6">
                                            <label for="first_name" class="form-label">First Name</label>
                                            <div class="input-group mb-3">
                                                
                                                <input type="text" class="form-control" id="first_name" aria-describedby="basic-addon3" value="John">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="last_name" class="form-label">Last Name</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="last_name" aria-describedby="basic-addon3" value="Tan" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- 3rd Row  -->
                                    <div class="row m-2 mb-4">
                                        <div class="col-sm-6">
                                            <label for="gender" class="form-label">Gender</label>
                                            <div class="input-group mb-3">
                                                
                                                <input type="text" class="form-control" id="gender" aria-describedby="basic-addon3" value="Male" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="birthday" class="form-label">Birthday</label>
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" id="birthday" aria-describedby="basic-addon3" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row m-2 mb-4">
                                        <div class="col-sm-12">
                                            <label for="gender" class="form-label">Bio</label>
                                            <div class="input-group mb-3">
                                                
                                                <input type="text" class="form-control" id="bio" aria-describedby="basic-addon3" value="Male" >
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row m-2 mb-4">
                                        <div class="fw-light fs-6" style="color:grey; text-align:center">Account Particulars<br>
                                        <span class="form-text"></span>
                                    </div>

                                    <!-- 4th Row DETAILS -->
                                    <div class="row m-2 mb-4">
                                        <div class="col-sm-6">
                                            <label for="gender" class="form-label">Old Password</label>
                                            <div class="input-group mb-3">
                                                
                                                <input type="password" class="form-control" id="gender" aria-describedby="basic-addon3" value="Male" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="birthday" class="form-label">New Password</label>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" id="birthday" aria-describedby="basic-addon3" value="">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <button type="submit" class="btn btn-outline-info" name = "signup">Update</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                            


                        
                </div>
            </div>
        </div>

    </header>

    <script>
        var username = '<?= $username ?>';
        var email = '<?= $email?>';
        var first_name = '<?= $first_name?>';
        var last_name = '<?= $last_name?>';
        var gender = '<?= $gender?>';
        var birthday = '<?= $birthday?>';
        var profile_image = '<?= $profile_image?>';
        var bio = '<?= $bio?>';

        document.getElementById("username").value = username;
        document.getElementById("email").value = email;
        document.getElementById("first_name").value = first_name;
        document.getElementById("last_name").value = last_name;
        document.getElementById("gender").value = gender;
        document.getElementById("birthday").value = birthday;
        document.getElementById("bio").innerText = bio;
        document.getElementById("account_title").innerText = first_name + "'s Account"

        if (profile_image == "") {
            document.getElementById("profile").src = "Images/" + user.png;
        }
        else{
            document.getElementById("profile").src = "uploads/" + profile_image;
        }
    </script>



    <body>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
