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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body { /* this is for the background image */
                background-image: url("Images/BackGround.png");
                background-size: cover;
                height: 100vh;
            }

            .expstarrating > input {display: none;}  /* Remove radio buttons */

            .expstarrating > label:before { 
                content: "\f005"; /* Star */
                margin: 2px;
                font-size: 2em;
                font-family: FontAwesome;
                display: inline-block; 
            }

            .expstarrating > label {
                color: #222222; /* Star color when not clicked */
            }

            .expstarrating > input:checked ~ label { 
                color: #ffca08 ; 
            } /* Set yellow color when star checked */

            .expstarrating > input:hover ~ label {  
                color: #ffca08 ;  
                } /*Set yellow color when star hover*/
                

            .foodstarrating > input {display: none;}  /* Remove radio buttons */

            .foodstarrating > label:before { 
                content: "\f005"; /* Star */
                margin: 2px;
                font-size: 2em;
                font-family: FontAwesome;
                display: inline-block; 
            }

            .foodstarrating > label {
                color: #222222; /* Star color when not clicked */
            }

            .foodstarrating > input:checked ~ label { 
                color: #ffca08 ; 
            } /* Set yellow color when star checked */

            .foodstarrating > input:hover ~ label {  
                color: #ffca08 ;  
                } /*Set yellow color when star hover*/

            .cleanstarrating > input {display: none;}  /* Remove radio buttons */

            .cleanstarrating > label:before { 
                content: "\f005"; /* Star */
                margin: 2px;
                font-size: 2em;
                font-family: FontAwesome;
                display: inline-block; 
            }

            .cleanstarrating > label {
                color: #222222; /* Star color when not clicked */
            }

            .cleanstarrating > input:checked ~ label { 
                color: #ffca08 ; 
            } /* Set yellow color when star checked */

            .cleanstarrating > input:hover ~ label {  
                color: #ffca08 ;  
                } /*Set yellow color when star hover*/
            
            .servicestarrating > input {display: none;}  /* Remove radio buttons */

            .servicestarrating > label:before { 
                content: "\f005"; /* Star */
                margin: 2px;
                font-size: 2em;
                font-family: FontAwesome;
                display: inline-block; 
            }

            .servicestarrating > label {
                color: #222222; /* Star color when not clicked */
            }

            .servicestarrating > input:checked ~ label { 
                color: #ffca08 ; 
            } /* Set yellow color when star checked */

            .servicestarrating > input:hover ~ label {  
                color: #ffca08 ;  
                } /*Set yellow color when star hover*/
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
                                <div class="expstarrating d-flex justify-content-around flex-row-reverse">
                                <span class="large-font green">Good 😊</span>
                                    <input type="radio" id="expstar5" name="expstar" value="5" /><label for="expstar5" title="5 star"></label>
                                    <input type="radio" id="expstar4" name="expstar" value="4" /><label for="expstar4" title="4 star"></label>
                                    <input type="radio" id="expstar3" name="expstar" value="3" /><label for="expstar3" title="3 star"></label>
                                    <input type="radio" id="expstar2" name="expstar" value="2" /><label for="expstar2" title="2 star"></label>
                                    <input type="radio" id="expstar1" name="expstar" value="1" /><label for="expstar1" title="1 star"></label>
                                <span class="large-font red">😢Bad</span>
                                </div>
                                <br><br><h2>Food Experience</h2><br>
                                <div class="foodstarrating d-flex justify-content-around flex-row-reverse">
                                    <span class="large-font green">Good 😊</span>
                                    <input type="radio" id="foodstar5" name="foodstar" value="5" /><label for="foodstar5" title="5 star"></label>
                                    <input type="radio" id="foodstar4" name="foodstar" value="4" /><label for="foodstar4" title="4 star"></label>
                                    <input type="radio" id="foodstar3" name="foodstar" value="3" /><label for="foodstar3" title="3 star"></label>
                                    <input type="radio" id="foodstar2" name="foodstar" value="2" /><label for="foodstar2" title="2 star"></label>
                                    <input type="radio" id="foodstar1" name="foodstar" value="1" /><label for="foodstar1" title="1 star"></label>
                                    <span class="large-font red">😢Bad</span>
                                </div>
                                <br><br><h2>Cleanliness</h2> <br>
                                <div class="cleanstarrating d-flex justify-content-around flex-row-reverse">
                                    <span class="large-font green">Good 😊</span>
                                    <input type="radio" id="cleanstar5" name="cleanstar" value="5" /><label for="cleanstar5" title="5 star"></label>
                                    <input type="radio" id="cleanstar4" name="cleanstar" value="4" /><label for="cleanstar4" title="4 star"></label>
                                    <input type="radio" id="cleanstar3" name="cleanstar" value="3" /><label for="cleanstar3" title="3 star"></label>
                                    <input type="radio" id="cleanstar2" name="cleanstar" value="2" /><label for="cleanstar2" title="2 star"></label>
                                    <input type="radio" id="cleanstar1" name="cleanstar" value="1" /><label for="cleanstar1" title="1 star"></label>
                                    <span class="large-font red">😢Bad</span>
                                </div>
                                <br><br><h2>Customer Service</h2><br>
                                <div class="servicestarrating d-flex justify-content-around flex-row-reverse">
                                    <span class="large-font green">Good 😊</span>
                                    <input type="radio" id="servicestar5" name="servicestar" value="5" /><label for="servicestar5" title="5 star"></label>
                                    <input type="radio" id="servicestar4" name="servicestar" value="4" /><label for="servicestar4" title="4 star"></label>
                                    <input type="radio" id="servicestar3" name="servicestar" value="3" /><label for="servicestar3" title="3 star"></label>
                                    <input type="radio" id="servicestar2" name="servicestar" value="2" /><label for="servicestar2" title="2 star"></label>
                                    <input type="radio" id="servicestar1" name="servicestar" value="1" /><label for="servicestar1" title="1 star"></label>
                                    <span class="large-font red">😢Bad</span>
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
