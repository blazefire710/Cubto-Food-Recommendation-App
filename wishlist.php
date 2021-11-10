<?php
require_once('ConnectionManager.php');
session_start();

if (!isset($_SESSION['login_details'])) {
    header("Location: login.php");
    exit();
}
else {
    $username =  $_SESSION['login_details'][0];
    // var_dump($_SESSION); works
    // var_dump($username); // works
    $new = new AccountDAO();
    $wishlists = $new -> retrieve_all_wishlist($username);
    if (isset($_GET['submit'])) {
        // var_dump($_GET['name']); // works
        $restaurant_name = $_GET['name'];
        $new = new AccountDAO();
        $new -> delete_wishlist($username, $restaurant_name);
    }

}



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
        <!--axios-->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <!--Vue-->
        <script src="https://unpkg.com/vue@next"></script>
        
        <style>
            body { /* this is for the background image */
                background-image: url("Images/BackGround.png");
                background-size: cover;
                height: 100vh;
            }

            #restaurantImg {
                /* max-height: 260px; */
                height: 260px;
                width: 396px;
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

            #deleteform {
                margin: auto;
            }
        </style>
    </head>

    
    <body>
        <div id="app">
            
        <!-- Insert Nav Bar here -->
            <div id="navbar">
                <nav
                    id="top-navbar"
                    class="navbar navbar-light bg-light pb-2 border-bottom border-dark"
                >
                    <div class="container-fluid">
                        <a class="navbar-brand" href="v3.explorePage.php"
                            ><img
                                id="logo"
                                style="width: 150px; height: auto"
                                src="Images/Logo photo.PNG"/></a>
                        <!-- insert icon here -->
                        <form class="d-flex w-75">
                            <input
                                class="form-control"
                                type="search"
                                placeholder="Search Places"
                                aria-label="Search"
                                v-model='queryName'
                                v-on:change.prevent='isQuery()'/>
                            <button class="btn" v-on:click.prevent='isQuery()'>🔍</button>

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
                    ">
                    <div class="container-fluid">
                        <div class="">
                            <a class="navbar-brand" href="v3.explorePage.php">Explore</a>
                            <a class="navbar-brand" href="whatsnext.php">What'sNext?</a>
                            <a class="navbar-brand" href="about.php">About us</a>
                        </div>
                        <div class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle text-dark"
                                href="#"
                                id="navbarDropdownMenuLink"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"> Hi, {{user}}
                            </a>
                            
                            <ul
                                class="dropdown-menu"
                                aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="profile.php">Profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="wishlist.php"
                                        >Wishlist</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav> 
            </div>
        
        <!-- <p>{{username}}</p> -->

        <!--main content-->
    
        <!--content after the search bar is triggered-->
        <div class='container mt-4' v-if='hasQuery'>
            <!--cards-->

            <div class="row row-cols-1 row-cols-md-2 g-4 mb-3">
                <div class="col" v-for='restaurant of dataArr'>
                    <div class="card">
                        <!--should link to the restaurant details page-->
                        <a :href=' "resturant_details.php#" + restaurant.name'> 
                            <h5 class="card-title pt-3" v-bind:id='name'>
                                {{restaurant.name}}
                            </h5>
                        </a>
                        <div>
                            <h6 class="card-title" style='display: inline; margin-left: 20px; margin-right: 20px;'>
                                {{reviewCount}} Reviews</h6>
                            <h6 class="card-title " style='display: inline;'>{{restaurant.rating}}⭐️</h6>

                        </div>

                        <div class="card-body">
                            <div class='text-center'>
                                <img v-if='restaurant.type == "Restaurants"' src='https://sethlui.com/wp-content/uploads/2015/03/clubmeatballs-2-21.jpg' height="250">

                                <img v-else-if='restaurant.type == "Cafe"' src='http://sethlui.com/wp-content/uploads/2015/03/brunch-7.jpg' height="250">

                                <img v-else-if='restaurant.type == "Hawker Centres"' src='https://sethlui.com/wp-content/uploads/2018/12/Balestier-Food-Centre-13-e1545724838449.jpg' height="250" width='250'>
                                
                                <img v-else src='https://4cxqn5j1afk2facwz3mfxg5r-wpengine.netdna-ssl.com/wp-content/uploads/2020/02/Best-vagetarian-Restaurant-Singapore.jpg' height="250" width='250'>
                            </div>
                            <div>
                                <p v-if='restaurant.cuisine.length != 0' style='margin-left: 20px; margin-top: 20px;'>
                                    <b>Cuisine:</b> {{restaurant.cuisine}}
                                </p>
                                <p v-else style='margin-left: 20px; margin-top: 20px;'>
                                    <b>Cuisine: -</b>
                                </p>
                            </div>
                            <div>
                                <!--resturant tags-->
                                <button type="button" class="tag-btn" disabled v-for='tag of restaurant.tags'>{{tag}}</button>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>

    <!--wishlist page content-->
        <div class="container" v-else>
            <div class="card shadow my-5">
                <div class="card-body p-5">

                    
                    <!-- Insert Content Here -->
                    <h1 class='text-center fs-1'><span id='username'></span>Wishlist</h1>

                    <div id="wishlistdata"></div>
                    <br><div id="wishlistdata2"></div>
                    <br><div id="wishlistdata3"></div>

                        <!-- <div>
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
                        </div> -->
                    </div>
                </div>
            </div>
        </div>


    </div>

    
    <script> //ok so passing of single variables like this is fine
        var username = '<?= $username ?>';
        // console.log('username: ', username);
        displayUsername = username.charAt(0).toUpperCase() + username.slice(1);
        document.getElementById('username').innerText = displayUsername + "'s ";
    </script>
    
    <!-- <script> //apparently i can do this, but the problem is that i can't loop thru this from php
        var wishlist11 = '<?= $wishlists[0][0] ?>';
        console.log('wishlist1: ', wishlist11);
    
        var exampleArr = [4,3,5,6,3]
        console.log(exampleArr)
    </script> -->
    
    <script> //this is how to 'import' php variables to javascript variables
        var wishlists = <?php echo json_encode($wishlists); ?>;
        // console.log(wishlists);
    
        // wishlistdata = document.getElementById("wishlistdata");
        // wishlistdata.innerText = `${wishlists}`
    </script>
    

    
    <script>
        wishlistdata2 = document.getElementById("wishlistdata2")
    
        for (wish of wishlists) {
            name = wish[0]
            ratings = wish[1]
            address = wish[2]
            type = wish[3]
            experience = wish[4]
            food = wish[5]
            customer_service = wish[6]
            cleanliness = wish[7]
            description = wish[8]
            
    
            // wishlistdata2.innerHTML += `
            //     <h1>${name}</h1>
            //     <h5>${address}</h5>
            //     <h6>${ratings} Stars</h6>
            //     <h6>Type: ${type}</h6>
            //     `
    
            // if (experience != null) {
            //     wishlistdata2.innerHTML += `
            //         Your Ratings: 
            //             Experience: ${experience}/5
            //             Food: ${food}/5
            //             Customer Service: ${customer_service}/5
            //             Cleanliness: ${cleanliness}/5
            //         `
            // }
            // else {
            //     wishlistdata2.innerHTML += `
            //         You haven't reviewed this restaurant :(
            //         <a class="btn btn-danger" href="#" role="button">Leave a Review!</a>
            //     `
            // }
    
        }
    </script>
    
    <script>
        wishlistdata3 = document.getElementById("wishlistdata3")
        for (wish of wishlists) {
            name = wish[0]
            ratings = wish[1]
            address = wish[2]
            type = wish[3]
            experience = wish[4]
            // food = wish[5]
            // customer_service = wish[6]
            // cleanliness = wish[7]
            description = wish[8]
            // extraremark = wish[9]
            
            // imageSrc = 'Images/sarnies.jpg' //this one not sure cuz unsure of the categories
    
            if (type == 'Restaurants') {
                imageSrc = 'https://sethlui.com/wp-content/uploads/2015/03/clubmeatballs-2-21.jpg'
            }
            else if (type == 'Cafe') {
                imageSrc = 'http://sethlui.com/wp-content/uploads/2015/03/brunch-7.jpg';
            }
            else if (type == 'Hawker Centres') {
                imageSrc = 'https://sethlui.com/wp-content/uploads/2018/12/Balestier-Food-Centre-13-e1545724838449.jpg';
            }
            else {
                imageSrc = 'Images/sarnies.jpg'
            }
    
            wishlistdata3.innerHTML += `
                <div class="card mb-3 ">
                    <div class="row g-0">
                        <div class="col-md-4 restaurant-card">
                            <img
                                src='${imageSrc}'
                                class="img-fluid"
                                id='restaurantImg'
                            />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title lead text-center fs-3 fw-bold">
                                    ${name}
                                </h2><br>
                                <h4 class="card-text lead text-center fs-4">
                                    ${description}
                                </h4><br>
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="card-text lead text-center fs-5">
                                            ${address}
                                        </h5>
                                        <br>
                                    </div>
                                    <div class="col-4">
                                        <div class="card-text d-flex">
                                            <p class="pink-text lead text-center fs-5"> Overall Ratings: ${ratings}/5⭐ 
                                        </div> 
                                    </div>

                                </div>
                                <div id='deleteform' class='text-center'>
                                    <form method="GET">
                                        <input type="hidden" name="address" value="${address}">
                                        <input type="hidden" name="name" value="${name}">
                                        <input type="submit" class="btn-danger rounded" value="Delete from Wishlist" name="submit">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                `
        }
    </script>
    
    <!--bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>


    <!-- vue content celeste -->
    <script>
    const app = Vue.createApp({
        data() {
            return {
                dataArr: [],
                name: '',
                review: '',
                reviewCount: 0,
                rating: '',
                numResult: 0,
                searchQuery: '',
                tags: [],
                cuisines: '',
                typeImg: '',
                queryName : '',
                //newly added 
                username : '',
                key : '',
                hasQuery : false,
            }
        },
        computed : {
            user(){
                return '<?= $username ?>';
            }
                // this.username = '<?= $username ?>'; 
                // return this.username;
        },
        
        methods: {
            isQuery() {
                
                var url = 'https://tih-api.stb.gov.sg/content/v1/food-beverages/search?keyword=' + this.queryName + '&language=en&apikey=e8o8lSAcpTGJx0xnGiUDzfyZ7ksA29F8';
                url = encodeURI(url);
    
                console.log(url);
                console.log(this.queryName);
    
                axios.get(url)
                .then(response => {
                    console.log(response.data);
                    this.dataArr = response.data.data;
                    console.log(this.dataArr);
    
                    for (var restaurant of this.dataArr) {
                       
                        reviewsArr = restaurant.reviews; //an array of 5 objects
                       
    
                        var type = '';
                        type = restaurant.type;
                        //console.log(type);
    
                        this.reviewCount = 0;
    
                        for (let each of reviewsArr) {
    
                            this.reviewCount += 1;
                        }
                        
                        this.numResult += 1;
                        this.hasQuery = true;
                    }
    
                })
                .catch(error => {
                    console.log(error.message)
                })
            }
        }
    })
    const vm = app.mount('#app');
    
    </script>
    <!--end of vue instance celeste -->

</body>




    
</html>

