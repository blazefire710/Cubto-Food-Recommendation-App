<?php 
    require_once('ConnectionManager.php');

    $existing_error = '1';

    if(isset($_POST['signup'])) {

        // (If username already exist.)
        $username = $_POST['username'];
        $new = new AccountDAO();
        $existing_acc = $new -> existing_account($username);

        if ($existing_acc){
            $existing_error = '2';
        }

        else{
        // -----------------------------------------------------------------------------------------------------------
        $image = $_FILES['profile_page'];
        $fileName = $_FILES['profile_page']['name'];
        $fileTmpName = $_FILES['profile_page']['tmp_name'];
        $fileSize = $_FILES['profile_page']['size'];
        $fileError = $_FILES['profile_page']['error'];
        $fileType = $_FILES['profile_page']['type'];


        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = ['jpg','jpeg','png'];

        // if the person upload a file ---------------------------------------------------------------------------------
        if (in_array($fileActualExt,$allowed)){
            if($fileError == 0) {
                if($fileSize < 50000000){
                    $fileNameNew = uniqid('',true) . "." . $fileActualExt;
                    // var_dump($fileNameNew);
                    $fileDestination = "uploads/" . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                }else{
                    $message = "Your file is too big";
                }
            }
            else{
                $message = "There was an error uploading your file!";
            }
        }
        else{
            $message= "You cannot upload files of this type!";
        }
        // --------------------------------------------------------------------------------------------------------------
        // In the order of DataBase:
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $gender = $_POST['gender'];
        $birthday =$_POST['birthday'];
        $profile_image = $fileNameNew;
        $bio = $_POST['bio'];


        // var_dump($username);
        // var_dump($password);
        // var_dump($email);
        // var_dump($first_name);
        // var_dump($last_name);
        // var_dump($gender);
        // var_dump($birthday);
        // var_dump($question);
        // var_dump($answer);
        // var_dump($profile_image);
        // var_dump($bio);
        // --------------------------------------------------------------------------------------------------------------
        
        $new = new AccountDAO();
        $executed = $new -> signup($username, $password, $email, $first_name, $last_name, $question, $answer,$gender,$birthday, $profile_image, $bio);
        // here to be redirected.
        header("Location: createdaccount.html");
        exit();
        }
    }

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
    <script src="https://unpkg.com/vue@next"></script>
    <title>SignUp</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!--bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

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
    <div id='app'>
        <div>
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
                        v-model='queryName'
                        v-on:change.prevent='isQuery()'
                    />
                    <button class="btn" type="submit" v-on:click.prevent='isQuery()'>🔍</button>

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
        </div>

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
    <!--content end of the search bar triggered-->




    <!--main content: form-->
    <div class='container' v-else>
        <div class='row'>
            <div class='col-2'></div>
            <div class='container mt-5 col-8' style='background-color: rgb(250, 250, 250);'>

                <h1 class='text-center display-4 pt-5'>Cubto</h1>
                <h3 class='lead text-center fs-3'>Sign Up</h3>

                <form class="row g-3 w-75 mx-auto mt-4" name="signup" method="POST" enctype="multipart/form-data" >
                    <div class="col-md-6 has-validation">
                        <label for="fname" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="fname" name= "first_name" v-model='first_name'>
                        <span v-if='!(check_firstname)' style='color:red; font-size:small'>First name cannot be empty</span>
                    </div>
                    <div class="col-md-6">
                        <label for="lname" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="lname" name= "last_name" v-model='last_name'>
                        <span v-if='!(check_lastname)' style='color:red; font-size:small'>Last name cannot be empty</span>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name= "email" v-model='email_input'>
                        <span v-if='!(check_email)' style='color:red; font-size:small'>Please enter a valid email</span>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="inputAddress2"
                            placeholder="Must be at least 5 characters" name = "username" v-model='username'>
                            <span v-if='!(check_username)' style='color:red; font-size:small'>Username cannot be empty</span>
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password"
                            placeholder="Must be at least 6 characters with a upper and lowercase.." 
                            name = "password" v-model="password">
                        <div style="font-size:small; color:red; ">
                        {{validate_password}}
                            <p v-if="password_status == 1">Password must be longer than 5 characters</p>
                            <p v-if="password_status == 2" style="color:orange;font-size:small">Password is moderately strong</p>
                            <p v-if="password_status == 3" style="color:green;font-size:small">Password is strong!</p>
                        </div>
                        
                    </div>
                    <div class="col-12">
                        <label for="confirm_password" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirm_password" v-model="confirm_password_input">
                        <div>
                            {{confirmed_password}}
                            <p v-if="password_confirmed_status == 2" style="font-size:small; color:red;">Password do not match!</p>
                            <p v-if="password_confirmed_status == 1" style="color:green;font-size:small;">Password match!</p>
                            <p v-if="password_confirmed_status == 3" style="color:red;font-size:small;">Confirmed Password cannot be empty!</p>
                            
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="secret_question" class="form-label" id='secret_question' >Select your secret
                            questionaire:</label>
                        <select class="form-select" aria-label="Default select example" name="question" v-model='question'>
                            <option value="What is your favourite color?" selected>What is your favourite color?</option>
                            <option value="What is your occupation?">What is your occupation?</option>
                            <option value="What is your favourite day of the week?">What is your favourite day of the week?</option>
                        </select>
                        <span v-if='!(check_question)' style='color:red; font-size:small'>Please choose a question</span>
                    </div>
                    <div class="col-12">
                        <label for="secret_answer" class="form-label">What is your answer:</label>
                        <input type="text" class="form-control" id="secret_answer" name="answer" v-model='answer'>
                        <span v-if='!(check_answer)' style='color:red; font-size:small'>Please give an answer</span>
                    </div>
                    <div class="col-12">
                        <label for="bio" class="form-label">Enter your Bio:</label>
                        <input type="text" class="form-control" id="bio" name="bio">
                    </div>

                    <div class="col-12">
                        <label for="birthday" class="form-label">Date of Birth:</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" v-model='birthday'>
                        <span v-if='!(check_birthday)' style='color:red; font-size:small'>Please enter your birthday</span>
                    </div>

                    <div class="col-12">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" aria-label="Default select example" name="gender" v-model='gender'>
                            <option selected>Prefer not to say</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                        <span v-if='!(check_gender)' style='color:red; font-size:small'>Please choose 1 of the above</span>
                    </div>

                    <div class="col-12">
                        <div class= "mb-3">
                            <div>Upload a profile image</div>
                            <input type="file" class="form-control" id="inputGroupFile01" name="profile_page">
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <button type="submit" class="btn btn-primary" name = "signup" v-if='check_firstname && check_lastname && check_username && check_email && check_password && check_confirm_password && check_question && check_answer && check_birthday && check_gender' v-on:click='checkForm()'>Sign Up</button>
                        <button type="submit" class="btn btn-primary" name = "signup" v-else disabled>Sign Up</button>
                    </div>
                </form>
            </div>
            <div class='col-2'></div>
        </div>
    </div>


    <!-- end div for the 'app' container-->
    </div>
</body>

    <script>
        const app = Vue.createApp({
            data() {
                return {
                first_name: "",
                last_name: "",
                username: "",
                email_input: "",
                password: "",
                confirm_password_input: "",
                question : '',
                answer: "",
                birthday : '',
                gender : '',
                password_status: false,
                password_confirmed_status: false,
                message: "",
                valid : false,
                have_firstname : false,
                have_lastname : false,
                have_username : false,
                have_email : false,
                have_password : false,
                have_confirm_password : false,
                have_question : false,
                have_answer : false,
                have_birthday : false,
                //newly added 
                username : '',
                key : '',
                hasQuery : false,
            }

            },

            computed: {
                isUser(){
                    this.key = '<?=$key?>';
                    if(this.key == 1){
                        this.username = '<?= $username ?>'; 
                        return true;
                    }
                    return false;
                },

                validate_password() {
                    if (this.password.length < 5) {
                        this.password_status = 1;
                    }
                    else if (this.password.length >= 5 && this.password.length <= 10){
                        this.password_status = 2;
                    }
                    else{
                        this.password_status = 3;
                    }
                },

                confirmed_password() {
                    if(this.password == this.confirm_password_input && this.confirm_password_input.length > 0){
                        console.log(this.password);
                        console.log(this.confirm_password_input);
                        this.password_confirmed_status = 1;
                    }
                    else if(this.confirm_password_input.length == 0){
                        this.password_confirmed_status = 3;
                    }
                    else if(this.password != this.confirm_password_input){
                        this.password_confirmed_status = 2;
                    }
                },
                check_firstname(){
                    if(this.first_name.length != 0){
                        this.have_firstname = true;
                        return this.have_firstname;
                    }
                },
                check_lastname(){
                    if(this.last_name.length != 0){
                        this.have_lastname = true;
                        return this.have_lastname;
                    }
                },
                check_username(){
                    if(this.username.length != 0){
                        this.have_username = true;
                        return this.have_username;
                    }
                },
                check_email(){
                    if(this.email_input.length != 0 && this.email_input.includes('@')){
                        this.have_email = true;
                        return this.have_email;
                    }
                },
                check_password(){
                    if(this.password.length != 0){
                        this.have_password = true;
                        return this.have_password;
                    }
                },
                check_confirm_password(){
                    if(this.confirm_password_input === this.password){
                        this.have_confirm_password = true;
                        return this.have_confirm_password;
                    }
                },
                check_question(){
                    if(this.question != ''){
                        this.have_question = true;
                        return this.have_question;
                    }
                },
                check_answer(){
                    if(this.answer != ''){
                        this.have_answer = true;
                        return this.have_answer;
                    }
                },
                check_birthday(){
                    if(this.birthday != ''){
                        this.have_birthday = true;
                        return this.have_birthday;
                    }
                },
                check_gender(){
                    if(this.gender != ''){
                        this.have_gender = true;
                        return this.have_gender;
                    }
                },


            },
            methods : {
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
        app.mount("#app")

    </script>

    <script>
        var existing_error = '<?=$existing_error?>';
        if (existing_error == "2"){
            alert("username already existed");
        }
    </script>

    <!--bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
</body>

</html>