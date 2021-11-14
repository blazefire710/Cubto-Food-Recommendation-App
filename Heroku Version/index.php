<?php 
header('Access-Control-Allow-Origin: *');
session_start();
if (isset($_SESSION['login_details'])){
    $key = 1;
    $login_details = $_SESSION['login_details'];
    $username = $login_details[0];
}
else {
    $key = 0;
    $username="guest";
}
$key_true = 0;
// $key_false = 0; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Page</title>
    <!--bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!--axios-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!--Vue-->
    <script src="https://unpkg.com/vue@next"></script>
</head>

<!-- There should only be one body tag, idk what is this -->


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

.card{
    border-radius: 4px;
    background: #fff;
    box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
    transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
    padding: 14px 80px 18px 36px;
    cursor: pointer;
}

.card:hover{
    transform: scale(1.02);
    box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
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
</style>

</head>

<body>
    <div id='app' >
   
        <!-- Insert Nav Bar here -->
        <div id="navbar">
        <nav
            id="top-navbar"
            class="navbar navbar-light bg-light pb-2 border-bottom border-dark"
        >
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"
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
                        v-if='notUser'> Guest
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

        <!--main content-->

        <div class='container mt-4 mb-4'>
            <!--cards-->

            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col" v-for='(restaurant,index) in dataArr'>
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
                                <div v-if='uuidSrc_Arr[index] != "noUUID"'>
                                    <img v-bind:src='uuidSrc_Arr[index]' height="250" width='250' onerror="this.onerror=null;this.src='https://sethlui.com/wp-content/uploads/2015/03/clubmeatballs-2-21.jpg'">
                                    
                                    
                                
                                    
                                </div> 

                                <div v-else>
                                    <img v-if='restaurant.type == "Restaurants"' src='https://sethlui.com/wp-content/uploads/2015/03/clubmeatballs-2-21.jpg' height="250">

                                    <img v-else-if='restaurant.type == "Cafe"' src='http://sethlui.com/wp-content/uploads/2015/03/brunch-7.jpg' height="250">

                                    <img v-else-if='restaurant.type == "Hawker Centres"' src='https://sethlui.com/wp-content/uploads/2018/12/Balestier-Food-Centre-13-e1545724838449.jpg' height="250" width='250'>

                                    <img v-else src='https://4cxqn5j1afk2facwz3mfxg5r-wpengine.netdna-ssl.com/wp-content/uploads/2020/02/Best-vagetarian-Restaurant-Singapore.jpg' height="250" width='250'>
                                </div> 

                            </div>

                            <!-- <div class='text-center' v-else>
                                <img v-if='restaurant.type == "Restaurants"' src='https://sethlui.com/wp-content/uploads/2015/03/clubmeatballs-2-21.jpg' height="250">

                                <img v-else-if='restaurant.type == "Cafe"' src='http://sethlui.com/wp-content/uploads/2015/03/brunch-7.jpg' height="250">

                                <img v-else-if='restaurant.type == "Hawker Centres"' src='https://sethlui.com/wp-content/uploads/2018/12/Balestier-Food-Centre-13-e1545724838449.jpg' height="250" width='250'>
                                
                                <img v-else src='https://4cxqn5j1afk2facwz3mfxg5r-wpengine.netdna-ssl.com/wp-content/uploads/2020/02/Best-vagetarian-Restaurant-Singapore.jpg' height="250" width='250'>
                            </div> -->
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

    </div>
    </div>
    
    </div>

        
</body>
</html>

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
                    hasUuid : false,
                    uuidSrc : '',
                    uuidSrc_Arr : [],
                    each_uuid_img : '',
                    // index : 0,
                    
                }
            },
            computed : {
                isUser(){
                    this.key = '<?=$key?>';
                    if(this.key == 1){
                        this.username = '<?= $username ?>'; 
                        return true;
                    }
                    return false;
                },
                notUser(){
                    this.key = '<?=$key?>';
                    if(this.key == 0){
                        
                        return true;
                    }
                    return false;
                },
                index_increase(){
                    this.index++;
                    return this.index;
                },
                
            },
            created() {
                //url to extract all the resturants available

                var url = 'https://tih-api.stb.gov.sg/content/v1/food-beverages/search?keyword=all&language=en&apikey=e8o8lSAcpTGJx0xnGiUDzfyZ7ksA29F8';

                axios.get(url)
                    .then(response => {
                        // console.log(response.data);
                        this.dataArr = response.data.data;

                        var uuid_Arr = [];
                        for (var restaurant of this.dataArr) {

                            // console.log(restaurant.thumbnails);
                            if((restaurant.thumbnails).length != 0){
                                var uuid = restaurant.thumbnails[0].uuid;
                                this.uuidSrc = "https://tih-api.stb.gov.sg/media/v1/download/uuid/" + uuid + "?fileType=Thumbnail%201080h&apikey=e8o8lSAcpTGJx0xnGiUDzfyZ7ksA29F8";

                                this.uuidSrc_Arr.push(this.uuidSrc);

                                //console.log(uuid);
                                //console.log(this.uuidSrc);

                                this.hasUuid = true;
                            }
                            else{
                                this.uuidSrc = 'noUUID';
                                this.uuidSrc_Arr.push(this.uuidSrc);
                                this.hasUuid = false;
                            }
                            //console.log(restaurant.thumbnails[0].uuid);
                            
                            // if(uuid.length != 0){
                            //     uuid_Arr.push(uuid);
                            // }

                            
                            // uuid_Arr.push(restaurant.thumbnails[0].uuid);
                            
                            
                            //this.name = restaurant.name;
                            //console.log(name);

                            //this.rating = restaurant.rating;
                            //console.log(rating);
                            // var reviewsArr = [];
                            reviewsArr = restaurant.reviews; //an array of 5 objects

                            var type = '';
                            type = restaurant.type;
                            //console.log(type);

                            this.reviewCount = 0;

                            for (let each of reviewsArr) {

                                this.reviewCount += 1;
                            }
                            
                            this.numResult += 1;
                        }
                        // console.log(this.uuidSrc_Arr);
                        
                        // console.log("no error")
                    })
                    .catch(error => {
                        // alert("Search query is not found! ")
                        console.log('reloading...')
                        window.location.reload(true)
                    })
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


                            if((restaurant.thumbnails).length != 0){
                                var uuid = restaurant.thumbnails[0].uuid;
                                this.uuidSrc = "https://tih-api.stb.gov.sg/media/v1/download/uuid/" + uuid + "?fileType=Thumbnail%201080h&apikey=e8o8lSAcpTGJx0xnGiUDzfyZ7ksA29F8";

                                this.uuidSrc_Arr.push(this.uuidSrc);

                                //console.log(uuid);
                                //console.log(this.uuidSrc);

                                this.hasUuid = true;
                            }
                            else{
                                this.uuidSrc = 'noUUID';
                                this.uuidSrc_Arr.push(this.uuidSrc);
                                this.hasUuid = false;
                            }
                            this.reviewCount = 0;

                            for (let each of reviewsArr) {

                                this.reviewCount += 1;
                            }
                            
                            this.numResult += 1;
                            this.hasQuery = true;
                        }

                    })
                    .catch(error => {
                        alert("Search query is not found! ")
                    })
                }
            }
        })
        const vm = app.mount('#app');

    </script>




    <!--bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>

</body>

</html>