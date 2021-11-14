<?php 
session_start();
if (isset($_SESSION['login_details'])){
    $key = 1;
    $login_details = $_SESSION['login_details'];
    $username = $login_details[0];
}
else {
    $key = 0;
    $username = "guest";
}
// $key = 1;
// $key_false = 0; 
// $username = 'celeste'; 
// $hi = '';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>What's Next</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />
        <!-- <link rel="stylesheet" href="font.css"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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


        .btn-primary, .btn-primary:active, .btn-primary:focus, .btn-primary:hover {
            color:rgb(253, 250, 250) ;
            background-color: rgb(247, 104, 130)!important;
            border-color:  rgb(247, 104, 130)!important;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 15px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
            }

        .slidecontainer {
            width: 100%;
        }


        .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 15px;
        border-radius: 5px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
        }

        .slider:hover {
        opacity: 1;
        }

        .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background:rgb(247, 104, 130);
        cursor: pointer;
        }

        .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: rgb(247, 104, 130);
        cursor: pointer;
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

            
            a.action {
                background:rgb(247, 104, 130) ;
                color: white;
                letter-spacing: 2px;
                border-radius: 2rem;
                cursor: pointer;
                text-decoration: none;
                box-shadow: 0px 0px 50px 0px rgba(230, 37, 164, 0.65);
                transition: all 0.5s ease-in-out;
            }

            a.action:hover {
                transform: scale(1.1);
                box-shadow: 0px 0px 50px 0px rgba(230, 37, 164, 1);
            }

            h3{
                font-weight: 500;
            }

            .container {
                margin-top: 120px;
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
        <div id='app'>
            <div id='navbar'>
                <!-- Insert Navbar here -->
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
                        <form class="d-flex justify-content-end">
                            

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

            <div class="container" style="margin-top:30px">
            
                <div class = "p-2 mb-5 mt-1 border rounded-3" style= "background-color:#FFF0F5;">
                    <h2 class= "text-center mt-2 " style="font-weight: 600;">Our trusty randomiser helps you decide</h3>
                    <h2 class = "text-center" style="font-weight: 600;">your next eating destination!</h3>
                    
                    <div class="col-md-12 text-center"><img class="img-fluid mb-3" src="Images/restaurant.png" style="max-height:250px; max-width:250px"></div>
                    <div class="col-md-12 text-center mt-3 mb-3">

                        
                        <a class="action py-3 px-5 d-inline-block" id="Randresult" href="results2.php">
                            Just tell me what to eat now!
                            <i class="fas fa-chevron-right ml-3"></i>
                        </a>
                        <!-- <script type= "text/javascript">
                            document.getElementById("Randresult").onclick = function () {
                                window.open("results2.php", "_blank").focus()
                            };
                        </script>
                        -->
                    </div>
                </div>
            </div> 
        </div>
    </body>

            <!-- <hr style="height:2px; width:100%; border-width:0;"> -->

            <!-- <div class = "container mt-3 my-2">
                <div class = "p-5 mb-5 mt-5 border rounded-3" style= "background-color:white; ">
        
                    <div class = "text-center mt-3">
                        <h4>Customize Criterias (Optional)</h4>
                    </div>
            
                    <br><br><br>
            <div class="row ">

            <br><br><br> -->
            <!-- <div class="row ">
                <div class= "col-2 ms-2 mt-2 ">
                    <h6>Cuisine</h6>
                </div>

                <div class = "col-5 mb-2">
                    <button class="btn btn-outline-secondary dropdown-toggle " type="button" id="dropdownMenuButton1" v-model="Userdrop" data-bs-toggle="dropdown" aria-expanded="false">
                        <small class= "text-secondary ">Cuisine</small></button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item">Chinese</a></li>
                        <li><a class="dropdown-item">Western</a></li>
                        <li><a class="dropdown-item">Korean</a></li>
                        <li><a class="dropdown-item">Japanese</a></li>
                        <li><a class="dropdown-item">Local</a></li>
                        </ul>           
                </div>

        -->
            

        <!-- <div class="row ">
            <div class= "col-2 ms-2 mt-2">
                <h6>Location</h6>
            </div>

            <div class = "col-5">
                <button class="btn btn-outline-secondary dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <small class= "text-secondary ">Preferred location</small></button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item">Central</a></li>
                            <li><a class="dropdown-item">East</a></li>
                            <li><a class="dropdown-item">West</a></li>
                            <li><a class="dropdown-item">North</a></li>
                            <li><a class="dropdown-item">South</a></li>
                            </ul>
            </div>
        </div> -->

<!-- 
                    <div class="row justify-content-center ">
                        <div class= "col-2 ms-2">
                            <h6>Rating</h6>
                        </div>
        
                        <div class = "col-5">
                            <div class="slidecontainer">
                                <input type="range" min="1" max="5" class="slider" id="secRange">
                                <p> <i class="fas fa-star" style="color:  rgb(228, 53, 85);"></i> <span id="demotwo"></span></p>
                              </div>
                              
                              <script>
                              var sliderTwo = document.getElementById("secRange");
                              var outputTwo = document.getElementById("demotwo");
                              outputTwo.innerHTML = sliderTwo.value;
                              
                              sliderTwo.oninput = function() {
                                outputTwo.innerHTML = this.value;
                              }
                              </script>
        
                        </div> -->
                        <!-- <br>
                        <div class= "row text-center">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary mt-3 " id="resultfiltered"  v-on:click="add">Help me find such a place!</button>
                                <script type="text/javascript">
                                    document.getElementById("resultfiltered").onclick = function () {
                        // location.href = "whatsnext.html";
                                        window.open("resultsFiltered.php", "_blank").focus()
                                    }; 
                                </script> -->
               
                <!--might have 2 /div missing need to double check again -->
               

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
            // created() {
            //     //url to extract all the resturants available

            //     var url = 'https://tih-api.stb.gov.sg/content/v1/food-beverages/search?keyword=all&language=en&apikey=e8o8lSAcpTGJx0xnGiUDzfyZ7ksA29F8';

            //     axios.get(url)
            //         .then(response => {
            //             // console.log(response.data);
            //             this.dataArr = response.data.data;

            //             var uuid_Arr = [];
            //             for (var restaurant of this.dataArr) {

            //                 // console.log(restaurant.thumbnails);
            //                 if((restaurant.thumbnails).length != 0){
            //                     var uuid = restaurant.thumbnails[0].uuid;
            //                     this.uuidSrc = "https://tih-api.stb.gov.sg/media/v1/download/uuid/" + uuid + "?fileType=Thumbnail%201080h&apikey=e8o8lSAcpTGJx0xnGiUDzfyZ7ksA29F8";

            //                     this.uuidSrc_Arr.push(this.uuidSrc);

            //                     //console.log(uuid);
            //                     //console.log(this.uuidSrc);

            //                     this.hasUuid = true;
            //                 }
            //                 else{
            //                     this.uuidSrc = 'noUUID';
            //                     this.uuidSrc_Arr.push(this.uuidSrc);
            //                     this.hasUuid = false;
            //                 }
            //                 //console.log(restaurant.thumbnails[0].uuid);
                            
            //                 // if(uuid.length != 0){
            //                 //     uuid_Arr.push(uuid);
            //                 // }

                            
            //                 // uuid_Arr.push(restaurant.thumbnails[0].uuid);
                            
                            
            //                 //this.name = restaurant.name;
            //                 //console.log(name);

            //                 //this.rating = restaurant.rating;
            //                 //console.log(rating);
            //                 // var reviewsArr = [];
            //                 reviewsArr = restaurant.reviews; //an array of 5 objects

            //                 var type = '';
            //                 type = restaurant.type;
            //                 //console.log(type);

            //                 this.reviewCount = 0;

            //                 for (let each of reviewsArr) {

            //                     this.reviewCount += 1;
            //                 }
                            
            //                 this.numResult += 1;
            //             }
            //             // console.log(this.uuidSrc_Arr);
                        

            //         })
            //         .catch(error => {
            //             // alert("Search query is not found! ")
            //             console.log("error")
            //             window.location.reload(true)

            //         })
            // },

            // methods: {
            //     isQuery() {
                    
            //         var url = 'https://tih-api.stb.gov.sg/content/v1/food-beverages/search?keyword=' + this.queryName + '&language=en&apikey=e8o8lSAcpTGJx0xnGiUDzfyZ7ksA29F8';
            //         url = encodeURI(url);

            //         // console.log(url);
            //         // console.log(this.queryName);

            //         axios.get(url)
            //         .then(response => {
            //             // console.log(response.data);
            //             this.dataArr = response.data.data;
            //             // console.log(this.dataArr);

            //             for (var restaurant of this.dataArr) {
            //                 reviewsArr = restaurant.reviews; //an array of 5 objects
                    
            //                 var type = '';
            //                 type = restaurant.type;
            //                 //console.log(type);

            //                 this.reviewCount = 0;

            //                 for (let each of reviewsArr) {

            //                     this.reviewCount += 1;
            //                 }
                            
            //                 this.numResult += 1;
            //                 this.hasQuery = true;
            //             }

            //         })
            //         .catch(error => {
            //             alert("Search query is not found! ")
            //         })
            //     }
            // }
        })
        const vm = app.mount('#app');

    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
    ></script>

    
</body>
</html>