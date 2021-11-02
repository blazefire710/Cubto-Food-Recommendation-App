<?php
require_once('ConnectionManager.php');
session_start();

if (!isset($_SESSION['login_details'])) {
    header("Location: login.php");
    exit();
}

$username =  $_SESSION['login_details'][1];
// var_dump($_SESSION); // works
// var_dump($username); // works
$new = new AccountDAO();
$wishlists = $new -> retrieve_all_wishlist($username);
var_dump($wishlists); // works


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Wishlist</title>
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
        <div class="container" id='app'>
            <div class="card shadow my-5">
                <div class="card-body p-5">

                    
                    <!-- Insert Content Here -->
                    <h1><span id='username'>XXX</span>Wishlist</h1><br>

                    <div id="wishlistdata">{{wishlists}} {{test}}</div>

                    <div class="card mb-3 ">
                        <div class="row g-0">
                            <div class="col-md-4 restaurant-card">
                                <img
                                    src="Images/sarnies.jpg"
                                    class="img-fluid mh-100"
                                    alt="..."
                                />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title">Restaurant Name Here</h2>
                                    <br>
                                    <h4 class="card-text">
                                        Restaurant Address Here
                                        ABC Street Block 53
                                    </h4> 
                                    <br>
                                    <div class="card-text d-flex">
                                        <p class="pink-text">500 reviews &nbsp</p>
                                        <p class="pink-text">4.6 stars</p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 ">
                        <div class="row g-0">
                            <div class="col-md-4 restaurant-card">
                                <img
                                    src="Images/sarnies.jpg"
                                    class="img-fluid mh-100"
                                    alt="..."
                                />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title">Restaurant Name Here</h2>
                                    <br>
                                    <h4 class="card-text">
                                        Restaurant Address Here
                                        ABC Street Block 53
                                    </h4> 
                                    <br>
                                    <div class="card-text d-flex">
                                        <p class="pink-text">500 reviews &nbsp</p>
                                        <p class="pink-text">4.6 stars</p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 ">
                        <div class="row g-0">
                            <div class="col-md-4 restaurant-card">
                                <img
                                    src="Images/sarnies.jpg"
                                    class="img-fluid mh-100"
                                    alt="..."
                                />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title">Restaurant Name Here</h2>
                                    <br>
                                    <h4 class="card-text">
                                        Restaurant Address Here
                                        ABC Street Block 53
                                    </h4> 
                                    <br>
                                    <div class="card-text d-flex">
                                        <p class="pink-text">500 reviews &nbsp</p>
                                        <p class="pink-text">4.6 stars</p>
                                    </div> 
                                </div>
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


        <!-- <script> //ok so passing of single variables like this is fine
            var username = '<?= $username ?>';
            console.log('username: ', username);
            displayUsername = username.charAt(0).toUpperCase() + username.slice(1);
            document.getElementById('username').innerText = displayUsername + "'s ";
        </script>

        <script> //apparently i can do this, but the problem is that i can't loop thru this from php
            var wishlist11 = '<?= $wishlists[0][0] ?>';
            console.log('wishlist1: ', wishlist11);
        </script>

        <script> //holy !!! this works
            var wishlists = <?php echo json_encode($wishlists); ?>;
            console.log(wishlists);

            wishlistdata = document.getElementById("wishlistdata");
            wishlistdata.innerText = `${wishlists}`
        </script>

        <script>
            wishlistdata2 = document.getElementById("wishlistdata2")

            for (wish of wishlists) {
                name = wish[0]
                ratings = wish[1]
                address = wish[2]
                category = wish[3]
                experience = wish[4]
                food = wish[5]
                customer_service = wish[6]
                cleanliness = wish[7]

                wishlistdata2.innerHTML += `
                    <h1>${name}</h1>
                    <h5>${address}</h5>
                    <h6>${ratings} Stars</h6>
                    <h6>Category: ${category}</h6>
                    `

                if (experience != null) {
                    wishlistdata2.innerHTML += `
                        Your Ratings: 
                            Experience: ${experience}/5
                            Food: ${food}/5
                            Customer Service: ${customer_service}/5
                            Cleanliness: ${cleanliness}/5
                        `
                }
                else {
                    wishlistdata2.innerHTML += `
                        You haven't reviewed this restaurant :(
                        <a class="btn btn-danger" href="#" role="button">Leave a Review!</a>
                    `
                }
            }
        </script> -->

        <!-- <script>
            wishlistdata3 = document.getElementById("wishlistdata3")
            for (wish of wishlists) {
                name = wish[0]
                ratings = wish[1]
                address = wish[2]
                category = wish[3]
                experience = wish[4]
                food = wish[5]
                customer_service = wish[6]
                cleanliness = wish[7]

                wishlistdata3.innerHTML += `
                    <div class="card mb-3 ">
                        <div class="row g-0">
                            <div class="col-md-4 restaurant-card">
                                <img
                                    src="Images/sarnies.jpg"
                                    class="img-fluid mh-100"
                                    alt="..."
                                />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title">
                                        ${name}
                                    </h2><br>
                                    <h4 class="card-text">
                                        ${address}
                                    </h4> 
                                    <br>
                                    <div class="card-text d-flex">
                                        <p class="pink-text"> ⭐❌❌❌❌ Stars </p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                    
                if (parseFloat(ratings) < 2) {
                    wishlistdata3.innerHTML += `
                                    <div class="card-text d-flex">
                                        <p class="pink-text"> ⭐❌❌❌❌ Stars </p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                } else if (parseFloat(ratings) < 3) {
                    wishlistdata3.innerHTML += `
                                    <div class="card-text d-flex">
                                        <p class="pink-text"> ⭐⭐❌❌❌ Stars </p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                } else if (parseFloat(ratings) < 4) {
                    wishlistdata3.innerHTML += `
                                    <div class="card-text d-flex">
                                        <p class="pink-text"> ⭐⭐⭐❌❌ Stars </p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                } else if (parseFloat(ratings) < 4.5) {
                    wishlistdata3.innerHTML += `
                                    <div class="card-text d-flex">
                                        <p class="pink-text"> ⭐⭐⭐⭐❌ Stars </p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                } else {
                    wishlistdata3.innerHTML += `
                                    <div class="card-text d-flex">
                                        <p class="pink-text"> ⭐⭐⭐⭐⭐ Stars </p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                }
                console.log("wishlistdata3", wishlistdata3)
            }
        </script> -->

    <script>
        const app = Vue.createApp({
            data() {
            return {
                wishlists = <?php echo json_encode($wishlists); ?>,
                test = "aslkhfakjldsfklajfsdh",
            }
            },
            methods () {

            },
            created() {

            },
        })
        const vm = app.mount('#app');
    </script>

    <script src="https://unpkg.com/vue@next"></script>
    </body>
</html>
