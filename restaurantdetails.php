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

  <!--main content-->
  <div class='container p-4'id='app' style='background-color: rgb(250, 250, 250);'>
    <!--food images-->
    <div class='row'>
      <div class='col'>
        <img src="images/3304f78fd0ee632deb881909793_original.jpeg" class="img-thumbnail " alt="...">
      </div>
      <div class='col'>
        <img src="images/32bdfbfc8dbe4aec72b41910946_original.jpeg" class="img-thumbnail " alt="...">
      </div>
      <div class='col'>
        <img src="images/3304f78fd0ee632deb881909793_original.jpeg" class="img-thumbnail" alt="...">
      </div>
      <div class='col'>
        <img src="images/32bdfbfc8dbe4aec72b41910946_original.jpeg" class="img-thumbnail" alt="...">
      </div>
    </div>

    <!--location info-->
    <div class='location-info'>
      <h2 class='fw-bold mt-4'>Sarines (Telok Ayer)</h2>
      <p>Rating: 4.1</p>
      <p>Category (Cafe, Brunch)</p>

      <div>
        <div class='row'>
          <div class='col'>
            <h4>Location</h4>
            <img
              src='images/data=BjYTAZyCz7hDJ9-6houHS0gVPVuzOE_6WATFjpr-cGjpNMMGV7nm637tBjkePzLP1Sekz1MAWx73X7Obo7uHIQPLmj-tdWjmeIk23u8NkDeWfcMmz9TMpVVC3GZNzRtZqHDtCFh-jlpnqp8NU0F7KbLLn9BFTAbwg_laAgcZDSFDfwz3LQPEyZb9tNKEcw.png'
              style='width: 500px;'>
            <p class='mt-3'>Address: Telok Ayer St, 136, Singapore 068601</p>

            <!--collapse opening hours-->
            <p>
              <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button"
                aria-expanded="false" aria-controls="multiCollapseExample1">Opening Hours</a>
            </p>
            <div class="row">
              <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                  <div class="card card-body w-75">
                    Friday 7:30am–10:30pm <br>
                    Saturday 8:30am–3:30pm <br>
                    Sunday 8:30am–3:30pm <br>
                    Monday 7:30am–10:30pm <br>
                    Tuesday 7:30am–10:30pm <br>
                    Wednesday 7:30am–10:30pm <br>
                    Thursday 7:30am–10:30pm
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--promotions-->
         
            <div class='promotion'>
              <h4>Promotions</h4>

              <div class='row'>
                <!--promo 1-->
                <div class='col'>
                <p>
                  <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Click here for more
                  </button>
                </p>
                <div class="collapse" id="collapseExample">
                  <div class="card card-body">
                    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                  </div>
                </div>
                </div>
           

                <!-- promo 2
                <div class='col'>
                <p>
                  <a class="btn btn-outline-primary me-4" data-bs-toggle="collapse" href="#promo2" role="button"
                    aria-expanded="false" aria-controls="promo2">Promotion</a>
                </p>
                <div class="row">
                  <div class="col">
                    <div class="collapse multi-collapse" id="promo2">
                      <div class="card card-body">
                        hello
                      </div>
                    </div>
                  </div>
                </div>
                </div> -->

                <!-- promo 3
                <div class='col'>
                <p>
                  <a class="btn btn-outline-primary me-4 text" data-bs-toggle="collapse" href="#promo3" role="button"
                    aria-expanded="false" aria-controls="promo3">Promotion 3 </a>
                </p>
                <div class="row">
                  <div class="col">
                    <div class="collapse multi-collapse" id="promo3">
                      <div class="card card-body">
                        hello
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

      <!--review-->
      <div class='review mt-4'>
        <h4>Reviews</h4>

        <!--cards-->

        <div class='row'>
          <div class='col-6'>
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="images/3304f78fd0ee632deb881909793_original.jpeg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Weekend Brunch</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class='col-6'>
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="images/32bdfbfc8dbe4aec72b41910946_original.jpeg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Miso Carbonora</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


  <!--bootstrap JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
</body>

</html>