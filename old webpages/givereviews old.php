<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Give Review</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="/css/styling.css" />
        <link rel="stylesheet" href="/css/components.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <style>
            body { /* this is for the background image */
                background-image: url("Images/BackGround.png");
                background-size: cover;
                height: 100vh;
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
    </header>


    <body>
    <div class="container">
        <div class="card shadow my-5">
                <div class="card-body p-5">
                    <!-- Insert Content Here -->
                    <h1>Leave a Review!</h1>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Insert Restaurant Card Here -->
                            <div class="card">
                                <img src="Images/sarnies.jpg" class="card-img-top">
                                <div class="card-body">
                                    <h2>Restaurant Name</h2><br>
                                    <h4>Address</h4>
                                    <br><br>
                                    <h5>Description Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio soluta tempora nisi laboriosam quod placeat blanditiis. Officia, in sunt odit reprehenderit corrupti eligendi dignissimos earum tempore nam iusto ex asperiores!</h5>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <!-- Insert Rating Form Here -->
                            <form action="">
                                <h2>Your Experience</h2><br>
                                <div class="d-flex justify-content-around">
                                    <span class="large-font red">😢Bad</span>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <span class="large-font green">Good 😊</span>
                                </div>
                                <br><br><h2>Food Experience</h2><br>
                                <div class="d-flex justify-content-around">
                                    <span class="large-font red">😢Bad</span>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <span class="large-font green">Good 😊</span>
                                </div>
                                <br><br><h2>Cleanliness</h2> <br>
                                <div class="d-flex justify-content-around">
                                    <span class="large-font red">😢Bad</span>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <span class="large-font green">Good 😊</span>
                                </div>
                                <br><br><h2>Customer Service</h2><br>
                                <div class="d-flex justify-content-around">
                                    <span class="large-font red">😢Bad</span>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <input type=radio></input>
                                    <span class="large-font green">Good 😊</span>
                                </div>

                                <br><label for="exampleFormControlTextarea1" class="form-label"><h2>Additional Comments</h2></label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                
                                <div class="row justify-content-center mt-4"> <!-- this is to center the button-->
                                    <div class="col-3">
                                        <button type="button" class="btn btn-secondary" id="submitButton">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



















                </div>
        </div>
    </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
