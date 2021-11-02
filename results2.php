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
    <script type='text/javascript' src='queryName.js'></script>

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

<body>
    <div id="app">
        <nav id="top-navbar" class="navbar navbar-light bg-light pb-2"
            style='border-bottom: 1px solid rgb(193, 190, 190);'>
            <div class="container-fluid">
                <a class="navbar-brand"><img id="logo" style="width: 150px; height: auto;"
                        src="Images/Logo photo.PNG"></a>
                <!-- insert icon here -->
                <form class="d-flex w-75">
                    <input class="form-control " type="search" placeholder="Search Places" aria-label="Search" v-model='queryName' v-on:change='isQuery()'/>
                    <button class="btn" type="submit" v-on:click='isQuery()' >
                        🔍
                    </button>
                    <button type="button" class="btn btn-outline-info me-2">Login</button>
                    <button type="button" class="btn btn-outline-info me-2">Signup</button>

                </form>
            </div>
        </nav>

        <nav id="bottom-navbar" class="
                navbar navbar-expand-lg navbar-light
                bg-light
                pb-2" style='border-bottom: 1px solid rgb(193, 190, 190);'>
            <div class="container-fluid">
                <div class="">
                    <a class="navbar-brand" href="v3.explorePage.php">Explore</a>
                    <a class="navbar-brand" href="whatsnext.html">What'sNext?</a>
                    <a class="navbar-brand" href="about.php">About us</a>
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

        <!--main content-->

        <div class='container mt-4'>
            <!--cards-->

            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card">
                        <!--should link to the restaurant details page-->
                        <a :href=' "resturant_details.html#" + chosenRest.name'> 
                            <h5 class="card-title pt-3" v-bind:id='name'>
                                {{chosenRest.name}}
                                {{test}}
                            </h5>
                        </a>
                        <div>
                            <h6 class="card-title" style='display: inline; margin-left: 20px; margin-right: 20px;'>
                                {{reviewCount}} Reviews</h6>
                            <h6 class="card-title " style='display: inline;'>{{chosenRest.rating}}⭐️</h6>

                        </div>

                        <div class="card-body">
                            <div class='text-center'>
                                <img v-if='chosenRest.type == "Restaurants"' src='https://sethlui.com/wp-content/uploads/2015/03/clubmeatballs-2-21.jpg' height="250">

                                <img v-else-if='chosenRest.type == "Cafe"' src='http://sethlui.com/wp-content/uploads/2015/03/brunch-7.jpg' height="250">

                                <img v-else-if='chosenRest.type == "Hawker Centres"' src='https://sethlui.com/wp-content/uploads/2018/12/Balestier-Food-Centre-13-e1545724838449.jpg' height="250" width='250'>
                                
                                <img v-else src='https://4cxqn5j1afk2facwz3mfxg5r-wpengine.netdna-ssl.com/wp-content/uploads/2020/02/Best-vagetarian-Restaurant-Singapore.jpg' height="250" width='250'>
                            </div>
                            <div>
                                <p v-if='chosenRest.cuisine.length != 0' style='margin-left: 20px; margin-top: 20px;'>
                                    <b>Cuisine:</b> {{chosenRest.cuisine}}
                                </p>
                                <p v-else style='margin-left: 20px; margin-top: 20px;'>
                                    <b>Cuisine: -</b>
                                </p>
                            </div>
                            <div>
                                <!--resturant tags-->
                                <button type="button" class="tag-btn" disabled v-for='tag of chosenRest.tags'>{{tag}}</button>
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
                    review: '',
                    reviewCount: 0,
                    rating: '',
                    numResult: 0,
                    searchQuery: '',
                    tags: [],
                    cuisines: '',
                    typeImg: '',
                    queryName : '',
                    chosenRest: '',
                    test="test",
                }

            },

            created() {
                //url to extract all the resturants available

                var url = 'https://tih-api.stb.gov.sg/content/v1/food-beverages/search?keyword=all&language=en&apikey=e8o8lSAcpTGJx0xnGiUDzfyZ7ksA29F8';

                axios.get(url)
                    .then(response => {
                        // console.log(response.data);
                        // this.dataArr = response.data.data; //array -> randomise from here
                        // const chosenNumber = Math.floor(Math.random() * this.dataArr.length);
                        // var chosenRest = this.dataArr[chosenNumber]; 
                        this.choose()

                        for (var restaurant of this.dataArr) {
                            if ((restaurant.name) == chosenRest){
                                reviewsArr = chosenRest.reviews;
                                console.log("randomized restaurant is found")

                                var type = '';
                                type = chosenRest.type;

                                this.reviewCount = 0;

                                for (let each of reviewsArr) {

                                    this.reviewCount += 1;
                                    }

                                    this.numResult += 1;
                                    }

                            }})

            
                    .catch(error => {
                        console.log(error.message)
                    })
            },

            methods() {
                        choose(){
                            this.dataArr = response.data.data; //array -> randomise from here
                            const chosenNumber = Math.floor(Math.random() * this.dataArr.length);
                            var chosenRest = this.dataArr[chosenNumber]; 
                        } 
                    },
        })
        
        const vm = app.mount('#app');

    </script>
    


    <!--bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>

</body>

</html>
