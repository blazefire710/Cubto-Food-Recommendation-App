<?php
session_start();
if (!isset($_SESSION['login_details'])) {
    header("Location: login.php");
    exit();
}
else{
    $data = $_SESSION['login_details'];
    $username = $data[0];
    $password = $data[1];
    $email = $data[2];
    $first_name = $data[3];
    $last_name = $data[4];
    $gender = $data[7];
    $birthday = $data[8];
    $profile_image = $data[9];
    $bio = $data[10];

    if(isset($_POST['signup'])){
        

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
        // ------------------------------------------ UPLOAD PICTURE RESTRICTIONS -----------------------------------
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
        
        $gender = $_POST['gender'];
        $bio = $_POST['bio'];
        $first_name = $_POST['first_name'];
        $last_name =$_POST['last_name'];
        $birthday = $_POST['birthday'];
        $profile_image = $fileNameNew;

        var_dump($profile_image);
        var_dump($username);
        var_dump($email);
        var_dump($gender);
        var_dump($bio);
        var_dump($first_name);
        var_dump($last_name);
        var_dump($birthday);


    }
}

?>


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

    <!-- Top Navigation Bar -->
    <header>
        <div id='app'>
            <!-- INSERT V-IF TO DISPLAY THIS VUE PART -->
            <nav id="top-navbar" class="navbar navbar-light bg-light pb-2 border-bottom border-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="updated_explore.html"
                        ><img
                            id="logo"
                            style="width: 150px; height: auto"
                            src="Images/Logo photo.PNG"
                    /></a>
                    <!-- insert icon here -->
                    <form class="d-flex w-75" >
                        <input class="form-control" type="search" placeholder="Search Places" aria-label="Search"/>
                        <button class="btn" type="submit">🔍</button>

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
            </nav>
            <!-- ANOTHER V-ELSE HERE -->
            <form method="POST" enctype="multipart/form-data">
            <div class="container">
                <div class="card shadow my-5">
                    <div class=" card-body p-5" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLRvjmzVbiNIHbNHTsL8HZwNBLuyYaOzZm8w&usqp=CAU); background-size: cover; background-position: center top;opacity:1;">
                    <!-- INSERT YOUR PAGE CONTENT HERE -->
                        <div style="margin-bottom:50px">
                            <h1 class="fw-light text-center mb-6">
                                Manage Account
                            </h1>
                        </div>          
            </div>
        </nav>
</header>

<body>

                            <div class="col-md col-md bg-white rounded-3">
                                <div class="d-flex justify-content-between" style="margin-top:20px">
                                    <div class="fs-4 mx-2" id= "account_title" ></div>
                                    
                                </div>
                                <hr>
                                <div class="bg-light rounded-3 m-2">
                                    <div class="fw-light fs-6" style="color:grey; text-align:center">User information<br>
                                    <span class="form-text">These information will be visible to others</span>
                                </div>
                                    
                                    <!-- Profile Image Row -->
                                    <div class="row m-2">
                                        <div class="col-12" style="text-align:center"><img id="profile" src="" alt="" class="" style="border-radius:50%;width:150px;height:150px;object-fit:cover;border: 5px solid rgb(238, 125, 144);"></div>
                                        <div class="col-4"></div>
                                        <div class="col-4 mt-3">
                                            <input type="file" class="form-control" id="inputGroupFile01" name="profile_page">
                                            
                                        </div>
                                        <div class="col-4"></div>
                                    </div>
                                    <!-- 1st Row -->
                                    <div class="row m-2">
                                        <div class="col-sm-6">
                                            <label for="username" class="form-label" >Username</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon3">@</span>
                                                <input type="text" class="form-control" id="username" aria-describedby="basic-addon3" value="" name="username" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="email" aria-describedby="basic-addon3" value="example@gmail.com" name="email" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2nd Row  -->
                                    <div class="row m-2">
                                        <div class="col-sm-6">
                                            <label for="first_name" class="form-label">First Name</label>
                                            <div class="input-group mb-3">
                                                
                                                <input type="text" class="form-control" id="first_name" aria-describedby="basic-addon3" value="John" name="first_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="last_name" class="form-label">Last Name</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="last_name" aria-describedby="basic-addon3" value="Tan" name="last_name">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- 3rd Row  -->
                                    <div class="row m-2 mb-4">
                                        <div class="col-sm-6">
                                            <label for="gender" class="form-label">Gender</label>
                                            <div class="input-group mb-3">
                                                
                                                <select class="form-select" aria-label="Default select example" name="gender" id='gender'>
                                                    <option selected>Prefer not to say</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="birthday" class="form-label">Birthday</label>
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" id="birthday" aria-describedby="basic-addon3" value="" name="birthday">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row m-2 mb-4">
                                        <div class="col-sm-12">
                                            <label for="gender" class="form-label">Bio</label>
                                            <div class="input-group mb-3">
                                                
                                                <input type="text" class="form-control" id="bio" aria-describedby="basic-addon3" value="" name="bio" >
                                            </div>
                                        </div>
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

    </header>

    <script>
        var username = '<?= $username ?>';
        var email = '<?= $email?>';
        var first_name = '<?= $first_name?>';
        var last_name = '<?= $last_name?>';
        var gender = '<?= $gender?>';
        var birthday = '<?= $birthday?>';
        var profile_image = '<?= $profile_image?>';
        var bio = '<?= $bio?>';
        var password = '<?= $password ?>';



        document.getElementById("username").value = username;
        document.getElementById("email").value = email;
        document.getElementById("first_name").value = first_name;
        document.getElementById("last_name").value = last_name;
        document.getElementById("gender").value = gender;
        document.getElementById("birthday").value = birthday;
        document.getElementById("bio").value = bio;
        document.getElementById("account_title").innerText = first_name + "'s Account"

        if (profile_image == "") {
            document.getElementById("profile").src = "Images/" + "user.png";
        }
        else{
            document.getElementById("profile").src = "uploads/" + profile_image;
        }
    </script>



    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</html>