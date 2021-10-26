<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>    
    <style>
        .logo {
            width: 130px;
            height: 50px;
        }

        body {
            background-image: url("Images/BackGround.png");
            background-size: cover;
            
        }
        .edit_page_profile {
            max-width: 200px;
            width: 100%;
            height: auto;
        }


    </style>
<body>



    <!-- Top Navigation Bar -->
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
                    <a class="navbar-brand" href="restaurantdetails.php">What'sNext?</a>
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
                            <a class="dropdown-item" href="favourites.php">Favourites</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="editprofile.php">Edit Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="bookinghistory.php"
                                >Booking-History</a
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
    <!-- End of Top Navigation Bar  -->
    <!-- Start of Edit Page Content  -->


    <!-- End of Edit Page Content -->
    <div class="container-fluid">
        <div class="card shadow my-5">
                <div class="card-body p-5">
                    <!-- INSERT YOUR PAGE CONTENT HERE -->


                    <h1 class="fw-light text-center">
                        Edit Profile
                    </h1>
                    <br>

                    <!-- Splitting of Left and Right Side. -->
                    <div class="row">
                        <div class="col-sm-1"><img class= "edit_page_profile" src="Images/user.png"></div>
                        <!-- Left Hand Form -->
                        <div class="col-sm-4">
                            <form>
                                <form>
                                    <div class="mb-3">
                                      <input type="text" class="form-control" id="FirstName" placeholder="Enter Your First Name">
                                      <input type="text" class="form-control" id="LastName" placeholder="Enter Your Last Name">
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                        
                                      </div>                            
                                    <div class="mb-3">
                                        <label for="Bio" class="form-label">Bio</label>
                                        <textarea class="form-control" id="Bio" rows="3"></textarea>
                                    </div>
                                    <div class="form-text">These information will be shared to the public.</div>

                            </form>
                        </div>
                        <div class="col-sm-1"></div>
                        <!-- Right Hand Side Form  -->
                        <div class="col-sm-5">
                            <div class="form-label fs-6 text">
                                Your Personal Information
                                <div class="form-text">Tell us more about yourself! <br>This segment will not be visible to the public</div>
                            </div>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Not Selected</option>
                                <option value="Male" >Male</option>
                                <option value="Female">Female</option>
                                <option value="None">Prefer not to say</option>
                                <option value="Others">Others</option>
                            </select>
                            <div>
                                <br>
                            <label for="birthday">Birthday:</label>
                            <input class="form-control" type="date" id="birthday" name="birthday">
                            </div>
                            <br>
                            <div class="mb-3">
                                <label for="Email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="Email" placeholder="name@example.com">
                            </div>

                            <div class="mb-3">
                                <label for="Address1" class="form-label">Address 1</label>
                                <input type="text" class="form-control" id="Address1" placeholder="123 Main St">
                            </div>
                            <div class="mb-3">
                                <label for="Address2" class="form-label">Address 2</label>
                                <input type="text" class="form-control" id="Address2" placeholder="Apartment, Studio, or Floor">
                            </div>
                            <div class="mb-3 d-inline-flex">
                                <div class="col-4 mx-1">
                                    <label for="City" class="form-label">City</label>
                                    <input type="text" class="form-control" id="Address2" placeholder="">
                                </div>
                                <div class="col-4 mx-1">
                                    <label for="State" class="form-label">State</label>
                                    <input type="text" class="form-control" id="Address2" placeholder="">
                                </div>
                                <div class="col-4 mx-1">
                                    <label for="Zip" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="Address2" placeholder="">
                                </div>
                            </div>

                        <!-- Submit Button -->
                        <button type="button" class="btn" style="float:right; background-color: pink;">Save</button>
                        </div>
                        
                        <div class="col-sm-1"></div>
                    </div>
        </div>




    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</html>