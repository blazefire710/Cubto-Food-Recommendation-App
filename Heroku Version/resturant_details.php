<?php
session_start();
require_once("ConnectionManager.php");

if (isset($_SESSION['login_details'])){
    $key = 1;
    $login_details = $_SESSION['login_details'];
    $username = $login_details[0];

    $alr_added = false;
    // $added = $new -> existing_wishlist($username,$name); //returns true or false  //sadly this is not possible...because we can't do this before we press the form
    // $new = new AccountDAO();
    // echo $name = $_COOKIE['restaurant_name'];
    // var_dump($_COOKIE);
    // $alr_added = $new -> existing_wishlist($username,$name);

    if (isset($_GET['submit'])) {
      // var_dump($_GET['address']);
      $restaurant_address = $_GET['address'];
      $new = new AccountDAO();
      $name = $_GET['name'];
      $rating = $_GET['rating'];
      $description = $_GET['description'];
      $restaurant_image = $_GET['restaurant_image'];
      // var_dump($name);
      $added = $new -> existing_wishlist($username,$name);
      // var_dump($added);
      if ($added == false) {
        $new -> add_to_wishlist($username, $name, $rating, $restaurant_address, $description, $restaurant_image);
        // var_dump($sthvariable);
        $_GET = [];
        echo "<meta http-equiv='refresh' content='0'>";  //this is to ensure that the page refreshes after clicking on add to wishlist
      }
      else {
        $alr_added_string = "already in wishlist";
        // var_dump($alr_added_string);
        $alr_added = true;
      }
    }

}
else {
    $key = 0;
    $added = '';
    $username = "Guest";
    $alr_added = false;
    if (isset($_GET['submit'])) {
      header("location: login.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Details</title>
  <!--bootstrap css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!--axios-->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!--Vue-->
  <script src="https://unpkg.com/vue@next"></script>

</head>

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

    h2,
    h4,
    h6 {
      margin-left: 20px;
    }

    .tag-btn {
      background-color: rgb(238, 125, 144);
      border: 1px solid rgb(238, 125, 144);
      color: white;
      margin: 5px 10px 30px 20px;
      border-radius: 20px;
      font-size: 14px;
    }

    a {
      text-decoration: none;
    }

    #mapImg {
      display: block;
      width:100%;
      height:auto;
      margin: auto;
    }

    #wishlistform {
      margin: auto;
    }

    .nav a{
            color: black;
        }

    .nav a.explore:hover{
        color: rgb(238, 125, 144);
    }

    .nav a.next:hover {
        color: rgb(238, 125, 144);
    }

    .nav a.about:hover{
        color: rgb(238, 125, 144);
    }

    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
        background-color: rgb(238, 125, 144);
        color: white;
    }

    .btn-danger{
                background-color: rgb(238, 125, 144);
                color:white;
                cursor: pointer;
                text-decoration: none;
                transition: all 0.25s ease-in-out;
    }

    .btn-danger:hover{
        transform: scale(1.01);
        box-shadow: 0px 0px 20px 0px rgba(238, 125, 144, 1);
    }

    .btn-success{
                background-color: rgb(0, 117, 0);
                color:white;
                cursor: pointer;
                text-decoration: none;
                transition: all 0.25s ease-in-out;
    }

    img:before {
      content: ' ';
      display: block;
      /* position: absolute; */
      width: 300px;
      height: 200px;
      background-size: cover;
      /* background-image: url('https://sethlui.com/wp-content/uploads/2015/03/clubmeatballs-2-21.jpg'); */
      background-image: url('http://sethlui.com/wp-content/uploads/2015/03/brunch-7.jpg');
    }

  </style>

  </head>

  <body>
    <div id='app'>
      <div id="navbar">
        <!-- Insert Nav Bar here -->
        <nav
            id="top-navbar"
            class="navbar navbar-light bg-light pb-2 border-bottom border-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"
                    ><img
                        id="logo"
                        style="width: 150px; height: auto"
                        src="Images/Logo photo.PNG"/></a>
                <!-- insert icon here -->
                <form class="d-flex justify-content-end">
                    <!-- <input
                        class="form-control"
                        type="search"
                        placeholder="Search Places"
                        aria-label="Search"
                        v-model='queryName'
                        v-on:change.prevent='isQuery()'/>
                    <button class="btn" v-on:click.prevent='isQuery()'>🔍</button> -->

                    <a v-if="!isUser" href="login.php" class="btn btn-outline-info me-2">Login</a>
                    <a v-if="!isUser" href="signup.php" class="btn btn-outline-info me-2">Signup</a>
                    <a v-if="isUser" href="logout.php" class = "btn btn-outline-info me-2">LogOut</a>

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
                <div class="nav">
                    <a class="navbar-brand explore" href="index.php">Explore</a>
                    <a class="navbar-brand next" href="whatsnext.php">What'sNext?</a>
                    <a class="navbar-brand about" href="about.php">About us</a>
                </div>
                <div class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-dark"
                        href="#"
                        id="navbarDropdownMenuLink"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        v-if='isUser'> Hi, {{username}}
                    </a>
                    <a
                        class="nav-link dropdown-toggle text-dark"
                        href="#"
                        id="navbarDropdownMenuLink"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        v-else> Guest
                    </a>
                    <ul
                        class="dropdown-menu"
                        aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="editprofile.php">Profile</a>
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
      
      <!-- search bar activated -->
      <!-- <div class='container mt-4' v-if='hasQuery'>

            <div class="row row-cols-1 row-cols-md-2 g-4 mb-3">
                <div class="col" v-for='restaurant of dataArr'>
                    <div class="card">

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

                                <button type="button" class="tag-btn" disabled v-for='tag of restaurant.tags'>{{tag}}</button>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
    </div>-->

      <!--main content-->
      <div class='container p-5 mt-4' id='app' style='background-color: rgb(250, 250, 250);'>
        <!--food images-->
        <div class="row">


        </div>
        <div class='text-center'>
          <!-- <img v-bind:src='uuidSrc' height="200" onerror="this.onerror=null;this.src='https://sethlui.com/wp-content/uploads/2015/03/clubmeatballs-2-21.jpg'"> -->
          <img v-bind:src='uuidSrc' height="200" style="background-image: url('https://sethlui.com/wp-content/uploads/2015/03/clubmeatballs-2-21.jpg')">
          <!-- <img style="background-image: url({{uuidSrc}}), url('https://sethlui.com/wp-content/uploads/2015/03/clubmeatballs-2-21.jpg'); background-size: cover;" class="img-fluid"></img> -->
          <br><br>
          <form method="GET">
              <input type="hidden" name="address" :value="this.address">
              <input type="hidden" name="name" :value="this.name">
              <input type="hidden" name="rating" :value="this.rating">
              <input type="hidden" name="description" :value="this.description">
              <input type="hidden" name="restaurant_image" :value="this.uuidSrc">

              <!-- <input type="text" id="addresstest" :value="this.address">
              <input type="text" id="ratingtest" :value="this.rating">
              <input type="text" id="descriptiontest" :value="this.description">
              <input type="text" id="nametest" :value="this.name">
              <input type="text" id="cuisinetest" :value="this.cuisine"> -->
              <input v-if="added" type="submit" class="btn-success rounded" value="Added to Wishlist" name="submit" disabled>
              <input v-else type="submit" class="btn-danger rounded" value="Add to Wishlist" name="submit" >
          </form>
        </div>

        <!--location info-->
        <div class='location-info'>
          <h2 class='fw-bold mt-4'><span id='restaurant_name'>{{this.name}}</span> <span style="font-size:20px; color:grey">{{mrt}}</span>
          </h2>
          <h4 class='fs-5'>Rating: <span class='lead'>{{this.rating}} </span>⭐️</h4>
          <div>
            <!--resturant tags-->
            <button type="button" class="tag-btn" disabled v-for='tag of this.tags'>{{tag}}</button>
          </div>
          

          <div>
            <div class='row'>
              <div class='col'>
                <h6 class='mt-3 fs-5'>Nearest MRT: 
                  <span class='lead fs-5'>{{mrt}} Station</span>
                </h6><br>
                <h6 class='mt-3  fs-5'>Address:
                  
                  <br><span class='lead fs-5'>{{address}}</span>
                </h6><br>
                <h6 class='mt-3 fs-5'>Opening Hours:
                  <span class='lead fs-5' v-if='haveHour'>{{openTime}}am - {{closeTime}}pm</span>
                  <span class='lead fs-5' v-else>Hours are not available</span>
                </h6>
              </div>
              <div class="col-md-7 col-sm-12">
                <!-- <h4 class='display-6 fs-4'>Map</h4> -->
                <img id="mapImg" v-bind:src="mapURL"> 
                <!-- <p>{{mapURL}}</p> --> <!--this was to check the url is working properly-->
              </div>

            </div>
          </div>

          <!--review-->
          <div class='review mt-4'>
            <h6 class='mt-3 display-6 fs-4'>Reviews</h6>

            <!--cards-->

            <div class='row' style='margin-left: 10px;'>

              <div class='col-6' v-for='review of this.reviewsArr'>
                <div class="card mb-3" style="max-width: 540px;">
                  <div class="row g-0">
                    <div class="col-md-4 pt-3 text-center">
                        <img v-bind:src='review.profilePhoto' class="img-fluid" alt="..."
                          style='border-radius: 100px; height: 80px;'>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="card-text" style='font-size: 14px;'>{{review.text}}</p>
                        <p class="card-text">Rating: {{review.rating}}/5</p>
                        <p class="card-text">
                          <small class="text-muted">{{review.authorName}}</small>
                          <br>
                          <small class="text-muted">Last updated on {{review.time.slice(0,-10)}}</small>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
    </body>

    <script>
      const app = Vue.createApp({
        data() {
          return {
            dataArr: [],
            name: '',
            reviewCount: 0,
            reviewsArr: [],
            rating: '',
            streetName: '',
            block: '',
            latitude:0,
            longitude:0,
            postalcode: '',
            buildingName: '',
            searchQuery: '',
            tags: [],
            cuisines: '',
            typeImg: '',
            mrt: '',
            businessHour: [],
            openTime: '',
            closeTime: '',
            authorName: '',
            reviewRating: '',
            reviewText: '',
            reviewDate: '',
            reviewProfileSrc: '',
            haveHour: false,
            mapURL: '',
            description: '',
            //newly added 
            username : '',
            key : '',
            hasQuery : false,
            uuidSrc: '',
          }
        },
        computed: {
          address() {
            return this.streetName + " " + this.block + " " + this.buildingName + " " + "Singapore" + " " + this.postalcode;
          },
          
          isUser(){
            this.key = '<?=$key?>';
            if(this.key == 1){
                this.username = '<?= $username ?>'; 
                  return true;
            }
              return false;
          },
          added() {
            return '<?= $alr_added ?>';
          }
        },
        methods: {
          isQuery() {
                    
                    var url = 'https://tih-api.stb.gov.sg/content/v1/food-beverages/search?keyword=' + this.queryName + '&language=en&apikey=e8o8lSAcpTGJx0xnGiUDzfyZ7ksA29F8';
                    url = encodeURI(url);

                    // console.log(url);
                    // console.log(this.queryName);

                    axios.get(url)
                    .then(response => {
                        // console.log(response.data);
                        this.dataArr = response.data.data;
                        // console.log(this.dataArr);

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
                        // console.log(error.message)
                    })
                },

        },
        created() {
          //need to figure out how to get the name id from the explore page to here, to render the correct page
          var arr = window.location.href.split('#');
          var queryName = arr[1];
          queryName = decodeURI(queryName);

          //var url = 'https://tih-api.stb.gov.sg/content/v1/food-beverages/search?keyword=Alley on 25 at Andaz Singapore&language=en&apikey=e8o8lSAcpTGJx0xnGiUDzfyZ7ksA29F8';

          var url = 'https://tih-api.stb.gov.sg/content/v1/food-beverages/search?keyword=' + queryName + '&language=en&apikey=e8o8lSAcpTGJx0xnGiUDzfyZ7ksA29F8';
          url = encodeURI(url);

          axios.get(url)
            .then(response => {
              // console.log(response.data);
              this.dataArr = response.data.data;
              var restaurant = this.dataArr[0];

              this.name = restaurant.name;
              this.rating = restaurant.rating;
              this.tags = restaurant.tags;
              this.streetName = restaurant.address.streetName;
              this.buildingName = restaurant.address.buildingName;
              this.block = restaurant.address.block;
              this.postalcode = restaurant.address.postalCode;
              this.description = restaurant.body;
              // console.log(this.description)
              
              this.businessHour = restaurant.businessHour;
              if (this.businessHour.length == 0) {
                //console.log(this.businessHour);
                haveHour = false;
              }
              else {
                haveHour = true;
                // this.openTime = this.businessHour[0].openTime;
                // this.closeTime = this.businessHour[0].closeTime;
              }

              this.reviewsArr = restaurant.reviews; //an array of 5 objects

              this.latitude = restaurant.location.latitude; //Coordinate data for google maps API to load
              this.longitude = restaurant.location.longitude;
              this.mrt = restaurant.nearestMrtStation;
              this.mapURL += "https://maps.googleapis.com/maps/api/staticmap?center=";

              this.mapURL += this.latitude + "," + this.longitude;
              this.mapURL += "&zoom=20&size=1000x300&maptype=hybrid&markers=color:red%7C%7C";
              this.mapURL += this.latitude + "," + this.longitude;
              this.mapURL += "&key=AIzaSyChD1BmL1SDUnX5-KmIg5Kr60tLpIBB4q4";
              // console.log(this.mapURL);

              var uuid = restaurant.thumbnails[0].uuid;

              this.uuidSrc = "https://tih-api.stb.gov.sg/media/v1/download/uuid/" + uuid + "?fileType=Thumbnail%201080h&apikey=e8o8lSAcpTGJx0xnGiUDzfyZ7ksA29F8";
              // console.log(this.uuidSrc);

              //console.log(this.reviewsArr);

              // for(var review of this.reviewsArr){
              //   this.reviewProfileSrc = '';
              //   this.reviewProfileSrc = review.profilePhoto;
              //   //console.log(this.reviewProfileSrc);

              //   // this.reviewDate = review.time;
              //   // this.reviewDate = this.reviewDate.slice(0,10);
              //   //console.log(this.reviewDate);
              // }

              var type = '';
              type = restaurant.type;

              if (type == 'Restaurants') {
                this.typeImg = 'https://sethlui.com/wp-content/uploads/2015/03/clubmeatballs-2-21.jpg';

              }
              if (type == 'Cafe') {
                this.typeImg = 'http://sethlui.com/wp-content/uploads/2015/03/brunch-7.jpg';
              }
              if (type == 'Hawker Centres') {
                this.typeImg = 'https://sethlui.com/wp-content/uploads/2018/12/Balestier-Food-Centre-13-e1545724838449.jpg';
              }

            })
            .catch(error => {
              // console.log(error.message);
            })
        },
      })
      const vm = app.mount('#app');
    </script>

    <script> 
      var restaurant_name = document.getElementById("restaurant_name").innerText;
      // document.cookie = "restaurant_name = " + restaurant_name ;
    </script>

    <!-- <script>
      fixBrokenImages = function( url ){
          var img = document.getElementsByTagName('img');
          var i=0, l=img.length;
          for(;i<l;i++){
              var t = img[i];
              if(t.naturalWidth === 0){
                  //this image is broken
                  t.src = url;
              }
          }
      }
      window.onload = function() {
        fixBrokenImages('https://sethlui.com/wp-content/uploads/2015/03/clubmeatballs-2-21.jpg');
      }
    </script> -->

    <!-- <script 
    defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChD1BmL1SDUnX5-KmIg5Kr60tLpIBB4q4&callback=initMap"
  ></script> don't remove this it is the google API link apparently this calls initMap() immediately -->

    <!--bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
      crossorigin="anonymous"></script>
  

  <!-- <script 
  defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChD1BmL1SDUnX5-KmIg5Kr60tLpIBB4q4&callback=initMap"
></script>  -->
<!-- old google map API, replaced with the other google map api -->
<!-- don't remove this it is the google API link--> <!-- apparently this calls initMap() immediately-->

</html>
