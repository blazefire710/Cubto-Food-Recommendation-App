<?php
session_start();
if (isset($_SESSION['login_details'])){
    $key = 1;
    $login_details = $_SESSION['login_details'];
    $username = $login_details[0];

}
else {
    $key = 0;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!--bootstrap css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!--axios-->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!--Vue-->
  <script src="https://unpkg.com/vue@next"></script>

</head>

<body>
  <!--bootstrap css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!--axios-->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!--Vue-->
  <script src="https://unpkg.com/vue@next"></script>

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
  </style>

  </head>

  <body>
    <div id='app'>
      <div id="navbar">
        <!-- Insert Nav Bar here -->
      </div>
      

      <!--main content-->
      <div class='container p-5 mt-4' id='app' style='background-color: rgb(250, 250, 250);'>
        <!--food images-->
        <div class='text-center'>
          <img v-bind:src='typeImg' height="200">
        </div>

        <!--location info-->
        <div class='location-info'>
          <h2 class='fw-bold mt-4'>{{this.name}} ({{mrt}})</h2>
          <h4 class='display-6 fs-4'>Rating: <span class='lead'>{{this.rating}} </span>⭐️</h4>
          <div>
            <!--resturant tags-->
            <button type="button" class="tag-btn" disabled v-for='tag of this.tags'>{{tag}}</button>
          </div>


          <div>
            <div class='row'>
              <div class='col'>
                <h6 class='mt-3 display-6 fs-3'>Nearest MRT: 
                  <span class='lead fs-4'>{{mrt}} Station</span>
                </h6><br>
                <h6 class='mt-3 display-6 fs-3'>Address:
                  <span class='lead fs-4'>{{streetName}}, {{block}}, {{buildingName}}, Singapore {{postalcode}}</span>
                </h6><br>
                <h6 class='mt-3 display-6 fs-3'>Opening Hours:
                  <span class='lead fs-4' v-if='haveHour'>{{openTime}}am - {{closeTime}}pm</span>
                  <span class='lead fs-4' v-else>Hours are not available</span>
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
                          <small class="text-muted">Last updated on {{review.time}}</small>
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
          }
        },
        methods () {
          // function initMap() {
          //   console.log(this.latitude, this.longitude)
          //   // The location of the restaurant
          //   // var coordinates = { lat: 1.2892953, lng: 103.8556476}; // this is chinese restaurant location
          //   var coordinates = {lat: toFloat(this.latitude), lng: toFloat(this.longitude)};
          //   // The map, centered at restaurant location
          //   var map = new google.maps.Map(document.getElementById("map"), {
          //       zoom: 26,
          //       center: coordinates,
          //   });
          //   // The marker, positioned at the restaurant
          //   var marker = new google.maps.Marker({
          //       position: coordinates,
          //       map: map,
          //   });
          // }
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
              console.log(response.data);
              this.dataArr = response.data.data;
              var restaurant = this.dataArr[0];

              this.name = restaurant.name;
              this.rating = restaurant.rating;
              this.tags = restaurant.tags;
              this.streetName = restaurant.address.streetName;
              this.buildingName = restaurant.address.buildingName;
              this.block = restaurant.address.block;
              this.postalcode = restaurant.address.postalCode;
              
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

              this.latitude = restaurant.location.latitude //Coordinate data for google maps API to load
              this.longitude = restaurant.location.longitude
              this.mrt = restaurant.nearestMrtStation;
              this.mapURL += "https://maps.googleapis.com/maps/api/staticmap?center="

              this.mapURL += this.latitude + "," + this.longitude
              this.mapURL += "&zoom=20&size=1000x300&maptype=hybrid&markers=color:red%7C%7C"
              this.mapURL += this.latitude + "," + this.longitude
              this.mapURL += "&key=AIzaSyChD1BmL1SDUnX5-KmIg5Kr60tLpIBB4q4"
              console.log(this.mapURL)



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
              console.log(error.message)
            })
        },
      })
      const vm = app.mount('#app');
    </script>

<script>
    var key = '<?=$key?>';

    if (key == 0){
        document.getElementById('navbar').innerHTML = `
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
            "
        >
            <div class="container-fluid">
                <div class="">
                    <a class="navbar-brand" href="v3.explorePage.php">Explore</a>
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
                        > Guest
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
                    </ul>
                </div>
            </div>
        </nav>`;
    }
    else{
        var username = '<?= $username ?>';
        document.getElementById('navbar').innerHTML = `
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

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

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
                    <a class="navbar-brand" href="v3.explorePage.php">Explore</a>
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
                        > Hi, ${username}
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
        </nav>`
    }
    </script>


    <!-- <script 
    defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChD1BmL1SDUnX5-KmIg5Kr60tLpIBB4q4&callback=initMap"
  ></script> don't remove this it is the google API link apparently this calls initMap() immediately -->

    <!--bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
      crossorigin="anonymous"></script>
  </body>

  <!-- <script 
  defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChD1BmL1SDUnX5-KmIg5Kr60tLpIBB4q4&callback=initMap"
></script>  -->
<!-- old google map API, replaced with the other google map api -->
<!-- don't remove this it is the google API link--> <!-- apparently this calls initMap() immediately-->

</html>