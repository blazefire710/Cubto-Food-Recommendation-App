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
        <link rel="stylesheet" href="/css/components.css" />
        <link rel="stylesheet" href="/css/styling.css" />
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
            <!-- ANOTHER V-ELSE HERE -->
            <div class="container">
                <div class="card shadow my-5">
                    <div class=" card-body p-5" style="background-image: url(https://img.freepik.com/free-photo/healthy-ingredients-white-wooden-desk_23-2148194994.jpg?size=626&ext=jpg); background-size: cover; background-position: center top;opacity:1;">
                    <!-- INSERT YOUR PAGE CONTENT HERE -->
                        <div style="margin-bottom:50px">
                            <h1 class="fw-light text-center mb-6">
                                My Account
                            </h1>
                        </div>          

                        <div class="row my-6">


                            <div class=" order-sm-last col-md-2" >
                                <div class="row ">
                                    <div class="col-1"></div>
                                    <div class="col-10"><img src="Images/family-pic.jpg" alt="" class="img-fluid" style="border-radius:50%"></div>
                                    <div class="col-1"></div>
                                </div>
                                <div class="row" style="margin-top:30px;">
                                    <div class=" col rounded-3" style="background-color: #FFE6EE">
                                        <div style="text-align:center; margin-top:30px">About me</div>
                                        <hr>
                                        <div class="rounded m-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, quos deleniti mollitia ex sint voluptatum non temporibus voluptatem dolorum quam illo maxime in eveniet praesentium quo at, nemo quidem rerum.</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-1 order-2"></div>

                            <div class="col-md-9 col-md-9 bg-white rounded-3">
                                <div class="d-flex justify-content-between" style="margin-top:20px">
                                    <div class="fs-4">John's Account</div>
                                    <div><button type="button" class="btn btn-outline-info me-2">Edit Profile</button></div>
                                </div>
                                <hr>
                                <div class="bg-light rounded-3 m-2">
                                    <div class="fw-light fs-6" style="color:grey; text-align:center">User information</div>
                                    
                                    <!-- 1st Row -->
                                    <div class="row m-2">
                                        <div class="col-sm-6">
                                            <label for="basic-url" class="form-label">Username</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon3">@</span>
                                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="Htreborn" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="basic-url" class="form-label">Email</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="example@gmail.com" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2nd Row  -->
                                    <div class="row m-2">
                                        <div class="col-sm-6">
                                            <label for="basic-url" class="form-label">First Name</label>
                                            <div class="input-group mb-3">
                                                
                                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="John" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="basic-url" class="form-label">Last Name</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="Tan" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- 3rd Row  -->
                                    <div class="row m-2 mb-4">
                                        <div class="col-sm-6">
                                            <label for="basic-url" class="form-label">Gender</label>
                                            <div class="input-group mb-3">
                                                
                                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="Male" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="basic-url" class="form-label">Birthday</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="24/03/1999" readonly>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                            


                        
                </div>
            </div>
        </div>

    </header>




    <body>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
