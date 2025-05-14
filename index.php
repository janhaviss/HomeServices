<?php
require 'partials/_dbconn.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Sofia"
    />

    <!-- awesome font -->
    <script
      src="https://kit.fontawesome.com/351dd8f265.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <style>
      
      /* offer-card */

.card {
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease, transform 0.3s ease;
        background-color: #f9f9f9;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        transform: translateY(-5px);
    }

    .card-title {
        color: #333;
        font-size: 1.25rem;
        margin-bottom: 10px;
    }

    .card-text {
        color: #666;
        font-size: 1rem;
        margin-bottom: 5px;
    }

    .card-header {
        background-color: #487f78;
        color: #fff;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        padding: 10px;
        font-size: 1.1rem;
    }

    .card-body {
        padding: 15px;
    }

    .row {
        justify-content: center;
    }


.container1 {
  width: 100%; 
  /* margin: 0 auto;  */
  padding: 18px; 
  box-sizing: border-box; 
  margin-top: 20px;
}

.divMainOffers{
    width: 100%; float:left ; height: auto;
    background-color: #fff;
  }

  .divMainOffers h2{
    text-align: center;
  }
  
  .divLeftOffers{
    width: 20%; float:left ; height: 500px; position: relative;
  }
  .divRightOffers{
    width: 70%; float:right; 
    height: 500px;
    background-color: #fff;
    
  }

.divLeftOffers img{
    margin-top: 85px;
    margin-left: 60px;
}

.container2 {
    width: 100%;
    height: 100vh;
    color: #000;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    background-color: #d1baa1;
    font-family: "Fira Sans", sans-serif;
}

h2 {
    font-size: 2rem;
    margin-bottom: 1rem;
    text-align: center;
}

.description {
    text-align: center;
    width: 43%;
}

.clientImage {
    display: flex;
    flex-direction: row;
    align-items: center;
}

.clientImage span {
    margin-left: 10px;
}

.clientImage img {
    width: 40px;
}

.reviewSection {
    padding: 1rem;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-around;
}

.reviewItem {
    width: 300px;
    padding: 10px;
    margin: 1rem;
    cursor: pointer;
    border-radius: 10px;
    background-color: #487f78;
    border: 1px solid #487f78;
    transition: all .2s linear;
}

.review{
  font-family: 'Montserrat', sans-serif;
}

.reviewItem:hover {
    border-color: aqua;
    transform: scale(1.01);
    background-color: #fdf2e7;
    box-shadow: 0 0px 5px 0px #cbc0c0;
}

.top {
    margin-bottom: 1rem;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
}

.top ul {
    display: flex;
    list-style: none;
}

.top ul li {
    padding-left: 4px;
}

article p {
    font-size: 15px;
    font-weight: 100;
    margin-bottom: 1rem;
    font-family: system-ui;
}


@media screen and (max-width:700px) {
    .container {
        height: auto;
    }

    .description {
        width: 90%;
    }
}

@media screen and (max-width:375px) {
    .reviewSection {
        padding: 0;
    }

    .reviewItem {
        width: 100%;
    }

    .clientImage {
        margin-bottom: 0.6rem;
    }

    .top {
        align-items: center;
        flex-direction: column;
        justify-content: center;
    }
}

    </style>
</head>

<body>
    <div class="containers" id="mainpart">
        <nav>
            <img src="img/logo.png" alt="logo">
            
            <ul>
              <div class="gap"><p id="city"><i href="#" class="fa-solid fa-location-dot"></i><b></b></p></div>

                <li><a href="#">Home</a></li>
                <li><a data-toggle="modal" href="#exampleModalCenter">Login</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contactUs.php">Contact</a></li>
               
                <!-- <li><a href="#"> <div class="gap">
                    <p id="city"><i class="fa-solid fa-location-dot"></i></p>
                  </div></a></li> -->
            </ul>
            
        </nav>

        <!-- Modal for three modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background: #487f78;">
          <h5 class="modal-title" id="exampleModalLongTitle"><b>Login</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
           <button type="button" class="btn" id="modbtn" onclick="window.location.href='users/login.php';"><i class="far fa-user pr-2" aria-hidden="true"></i>User</button><br>
          <button type="button" class="btn" id="modbtn"  onclick="window.location.href='admin/login.php';"><i class="fa-solid fa-user-tie" aria-hidden="true"></i> Admin</button><br>
      <button type="button" class="btn" id="modbtn" onclick="window.location.href='provider/login.php';"><i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i> Service Provider</button>
         
    </div>
      </div>
      </div>
    </div>
  </div>

        <div class="right">
            <div class="box">
                <div class="image">
                    <img src="img/clean.png" alt="">
                </div>
                <div class="inner-box">
                    <h3>Cleaner</h3>
                    <p>Full home cleaning & more.</p>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="img/carpenter.png" alt="">
                </div>
                <div class="inner-box">
                    <h3>Carpenter</h3>
                    <p>Furniture assembly & more.</p>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="img/electrician.png" alt="">
                </div>
                <div class="inner-box">
                    <h3>Electrician</h3>
                    <p>Haircut, Styling and more.</p>
                </div>
            </div>

            <div class="box">
              <div class="image">
                  <img src="img/plumber.png" alt="">
              </div>
              <div class="inner-box">
                  <h3>Plumber</h3>
                  <p>Leak Detection,Repair & more.</p>
              </div>
          </div>

          <div class="box">
            <div class="image">
                <img src="img/painter.png" alt="">
            </div>
            <div class="inner-box">
                <h3>Painter</h3>
                <p>Painting, Waterproofing & more</p>
            </div>
        </div>
        </div>
      
        <div class="main-content">

            <div class="containers" id="scroll">

                <!-- Full-width images with number text -->
                <div class="mySlides">
                  <!-- <div class="numbertext">1 / 6</div> -->
                    <img src="img/acscroll.png" style="width:100%">
                </div>
              
                <div class="mySlides">
                  <!-- <div class="numbertext">2 / 6</div> -->
                    <img src="img/elescroll.png" style="width:100%">
                </div>
              
                <div class="mySlides">
                  <!-- <div class="numbertext">3 / 6</div> -->
                    <img src="img/cleanscroll.png" style="width:100%">
                </div>
              
                <div class="mySlides">
                  <!-- <div class="numbertext">4 / 6</div> -->
                    <img src="img/paintscroll.png" style="width:100%">
                </div>
              
                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
              </div>
                    
            <div class="main-text">
                <h1>Soobin Solutions</h1>
                <p>Providing Home Services</p>
                <a href="bookServices.php"> <button type="button" class="btn btn-brwServ" > <b>Browse Services</b></button></a></p>

            </div>
        </div>

        <div class="container" id="jstext">
            <div class="centerss" >
              <h1 class="ml10">
                <span class="text-wrapper">
                  <span class="letters"  style="color:white">Your Home, Our Expertise: Seamless Solutions at Your Doorstep!</span>
                </span>
              </h1>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
          </div>
        
    </div>

    <div style="background-color: #d1baa1;">
        <div class="blockquote-wrapper">
          <div class="blockquote">
            <h1 >
              Unlock the door to convenience. Welcome to your one-stop solution for home services. From hair care to home repair, we've got you covered. At<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#000;font-family: 'Sofia', sans-serif;";><b>숩</b>  SoobinSolutions,</span> <br> we bring professional services to your doorstep. <span style="color:#000; font-size: large;"><b>Let us take care of the little things,</b></span>&nbsp;so you can focus on what matters most.
             </h1>
            <h4>&mdash;<br><em>Elevate your everyday with us</em></h4>
          </div>
        </div>
  </div>
  <hr style=" border: 0;height: 1px;background-color: #ccc; margin: 20px 0;">
  <div width="100%" class="divMainOffers" >
    <div class="seven">
        <h3>Offers</h3>
</div>
    <div class="divLeftOffers">
        <div class="text-center">
        <img src="img/offers.gif" height="300px" width="300px">
    </div>
        </div>
        <div class="divRightOffers">
          <div >
            <div>
                <div class="container1">
                    <div class="row">
                        <?php
                        
        
                        $sql = "SELECT * FROM offers;";
                        $result = $conn->query($sql);
        
                        if ($result && $result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='col-md-4 mb-4'>";
                                echo "<a href='NotLogin.html' style='text-decoration: none;'>   <div class='card'>";
                                echo "<div class='card-header'>" . $row["offer_name"] . "</div>";
                                echo "<div class='card-body' style='background: #fdf2e7'>";
                                echo "<p class='card-text'><strong>Description:</strong> " . $row["description"] . "</p>";
                                echo "<p class='card-text'><strong>Start Date:</strong> " . $row["start_date"] . "</p>";
                                echo "<p class='card-text'><strong>End Date:</strong> " . $row["end_date"] . "</p>";
                                echo "<p class='card-text'><strong>Discount:</strong> " . ($row["discount"] * 100) . "%</p>"; 
                                echo "<p class='card-text'><strong>Conditions:</strong> " . $row["conditions"] . "</p>";
                                echo "<p class='card-text'><strong>Availability:</strong> " . $row["availability"] . "</p>";
                                echo "<p class='card-text'><strong>Status:</strong> " . $row["status"] . "</p>";
                                echo "</div>";
                                echo "</div> </a>";
                                echo "</div> ";
                            }
                        } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>


<!-- Offer -->

    <section class="carousel">
    <div class="seven">
    <h3 class="my-3" style="text-align: center;"><u>Gallery</u></h3>
  </div>
      <div class="carousel__container">
    
        
        <div class="carousel-item">
          <img
            class="carousel-item__img"
            src="https://source.unsplash.com/1260x750/?salon,styling"
            alt="people"
          />
          <div class="carousel-item__details">
            <div class="controls">
              <span class="fas fa-play-circle"></span>
              <span class="fas fa-plus-circle"></span>
            </div>
            <h5 class="carousel-item__details--title">Salon</h5>
            <!-- <h6 class="carousel-item__details--subtitle">Date and Duration</h6> -->
          </div>
        </div>
        <div class="carousel-item">
          <img
            class="carousel-item__img"
            src="https://source.unsplash.com/1260x750/?plumber"
            alt="people"
          />
          <div class="carousel-item__details">
            <div class="controls">
              <span class="fas fa-play-circle"></span>
              <span class="fas fa-plus-circle"></span>
            </div>
            <h5 class="carousel-item__details--title">Plumbing</h5>
            <!-- <h6 class="carousel-item__details--subtitle">Date and Duration</h6> -->
          </div>
        </div>
        <div class="carousel-item">
          <img
            class="carousel-item__img"
            src="https://source.unsplash.com/1260x750/?carpenter"
            alt="people"
          />
          <div class="carousel-item__details">
            <div class="controls">
              <span class="fas fa-play-circle"></span>
              <span class="fas fa-plus-circle"></span>
            </div>
            <h5 class="carousel-item__details--title">Carpentry</h5>
            <!-- <h6 class="carousel-item__details--subtitle">Date and Duration</h6> -->
          </div>
        </div>
        <div class="carousel-item">
          <img
            class="carousel-item__img"
            src="https://source.unsplash.com/1260x750/?janitor" 
            alt="people"
          />
          <div class="carousel-item__details">
            <div class="controls">
              <span class="fas fa-play-circle"></span>
              <span class="fas fa-plus-circle"></span>
            </div>
            <h5 class="carousel-item__details--title">Cleaning</h5>
            <!-- <h6 class="carousel-item__details--subtitle">Date and Duration</h6> -->
          </div>
        </div>
        <div class="carousel-item">
          <img
            class="carousel-item__img"
            src="https://source.unsplash.com/1260x750/?painter"
            alt="people"
          />
          <div class="carousel-item__details">
            <div class="controls">
              <span class="fas fa-play-circle"></span>
              <span class="fas fa-plus-circle"></span>
            </div>
            <h5 class="carousel-item__details--title">Painting</h5>
            <!-- <h6 class="carousel-item__details--subtitle">Date and Duration</h6> -->
          </div>
        </div>
        
        </div>
  
       
      </div>
    
  
  </div>
  </section>
  <!-- <hr style=" border: 0;height: 1px;background-color: #ccc; margin: 20px 0;"> -->

<div class="seven">
    <h3 class="my-3" style="text-align: center;"><u>Most booked services</u></h3>
                      </div>

    <div class="card-category-1">

    <?php
    // SQL query to retrieve top 5 most frequently booked services
$sql = "SELECT sno, COUNT(*) AS booking_count
FROM booking
GROUP BY sno
ORDER BY booking_count DESC
LIMIT 5";

// SQL query to retrieve top 5 most frequently booked services
$sql = "SELECT m.*, COUNT(*) AS booking_count FROM booking b JOIN manageservices m ON b.sno = m.sno GROUP BY b.sno HAVING booking_count >= 3 ORDER BY booking_count DESC;";

$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Retrieve details for the current sno
        $sno = $row["sno"];
  
     


      // $desc = $row['services_description'];
      $serviceName = $row['service_name'];
      $subServices = $row['sub_services'];
      $fees = $row['fees'];
      // $timeRequired = $row['time_require'];
      $serviceProvider = $row['sp_name'];
      $phone = $row['phone'];

      $color=['light','aqua','lip','dark'];
      $color = $color[array_rand($color)];

      echo 
      
        '<div class="container my-3">
<div class="card">
  <div class="card-header">
  <a href="NotLogin.html" style="text-decoration: none; color: white"> 
  <h2>' .$row['service_name'].'</h2></a>
  </div>
  <div class="card-body" style="background:#fdf2e7;">
  <a href="NotLogin.html" style="text-decoration: none; color: #000">
    <p class="mb-2">
    Category: '.$row['sub_services'].'<br>
    Decription: '.$row['services_description'].'<br>
    Fees: '.$row['fees'].'<br>
    Time Requried: '.$row['time_require'].'<br>
    
    </p>
      <footer class="blockquote-footer">Service Provided By: '.$row['sp_name'].'<br>
      <cite title="Source Title">Phone: '.$row['phone'].'<br></cite></footer>
      </a>
      </div>

</div>
</div>';
      
    
    
      

        
    }
} else {
    echo "0 results";
}

    ?>

  </div>
  <!-- <hr style=" border: 0;height: 1px;background-color: #ccc; margin: 20px 0;">    -->
   
<!-- ########### REVIEW SECTION ######### -->
<div class="seven">
    <h3 class="my-3" style="text-align: center;"><u>Review Section</u></h3>
  </div>
  <div class="container2">
        <h2> Our Happy Clients </h2>
        <p class="description">Let us handle the tasks, so you can focus on enjoying your home to the fullest. Welcome to a world where home maintenance is hassle-free.</p>
    
        <!-- Clients Review Section -->
        <div class="reviewSection">

        <!-- Clients Review-1 Section Starts from Here  -->
            <div class="reviewItem">
                <div class="top">
                    <div class="clientImage">
                        <img src="img/1.jpeg" alt="">
                        <span>N Sheoran</span>
                    </div>
                    <ul>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-regular fa-star"></i></li>
                    </ul>
                </div>
                <article>
                    <p class="review">I've been using SoobinSolution for all my home cleaning needs for the past year, and I couldn't be happier with the service. The cleaners are always thorough and efficient, and scheduling appointments is a breeze. Plus, the prices are very competitive compared to other cleaning services in my area. Highly recommend!"</p>
                    <p>Jan 20, 2024</p>
                </article>
            </div>

        <!-- Clients Review-2 Section Starts from Here  -->
            <div class="reviewItem">
                <div class="top">
                    <div class="clientImage">
                        <img src="img/3.jpeg" alt="">
                        <span>Wendy</span>
                    </div>
                    <ul>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-regular fa-star"></i></li>
                        <li><i class="fa-regular fa-star"></i></li>
                    </ul>
                </div>
                <article>
                    <p class="review">I've used SoobinSolution for a variety of home services and have been impressed every time. The platform makes it easy to find reliable professionals, and I love that I can read reviews from other users before making a decision. It's saved me so much time and hassle compared to trying to find service providers on my own. Thanks, SoobinSolution!</p>
                    <p>Feb 11, 2024</p>
                </article>
            </div>

        <!-- Clients Review-3 Section Starts from Here  -->
            <div class="reviewItem">
                <div class="top">
                    <div class="clientImage">
                        <img src="img/5.jpeg" alt="">
                        <span>Ben Choi</span>
                    </div>
                    <ul>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-regular fa-star"></i></li>
                        <li><i class="fa-regular fa-star"></i></li>
                    </ul>
                </div>
                <article>
                    <p class="review">I recently used SoobinSolution to find a plumber to fix a leaky faucet in my kitchen. The process was incredibly easy within minutes I had several quotes from qualified plumbers in my area. The plumber I chose was punctual, professional, and did an excellent job. I'll definitely be using SoobinSolution again for any future home service needs!</p>
                    <p>March 18, 2023</p>
                </article>
            </div>
        </div>
    </div>



</div>
<!-- <hr style=" border: 0;height: 1px;background-color: #ccc; margin: 20px 0;"> -->


<!-- ####### FOOTER ############## -->
<div class="center">
    <footer class="bg-body-tertiary text-center" style="background-color: #487f78;">
      <!-- Grid container -->
      <div class="container p-4" id="footer">
        <!-- Section: Images -->
        <section class="">
          <div class="row">
            <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
              <div data-mdb-ripple-init
                class="bg-image hover-overlay shadow-1-strong rounded"
                data-ripple-color="light"
              >
                <img src="img/fooimg06.png" class="w-100"  style="height: 104px; width: 157px; border-radius: 15px;" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                </a>
              </div>
            </div>
            <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
              <div data-mdb-ripple-init
                class="bg-image hover-overlay shadow-1-strong rounded"
                data-ripple-color="light"
              >
                <img src="img/fooimg01.png" class="w-100" style="height: 104px; width: 157px; border-radius: 15px;"/>
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                </a>
              </div>
            </div>
            <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
              <div data-mdb-ripple-init
                class="bg-image hover-overlay shadow-1-strong rounded"
                data-ripple-color="light"
              >
                <img src="img/fooimg02.png" class="w-100"  style="height: 104px; width: 157px; border-radius: 15px;"  />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                </a>
              </div>
            </div>
            <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
              <div data-mdb-ripple-init
                class="bg-image hover-overlay shadow-1-strong rounded"
                data-ripple-color="light"
              >
                <img src="img/fooimg03.png" class="w-100" style="border-radius: 15px;" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                </a>
              </div>
            </div>
            <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
              <div data-mdb-ripple-init
                class="bg-image hover-overlay shadow-1-strong rounded"
                data-ripple-color="light"
              >
                <img src="img/fooimg04.png" class="w-100"  style="height: 104px; width: 157px; border-radius: 15px;"/>
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                </a>
              </div>
            </div>
            <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
              <div data-mdb-ripple-init
                class="bg-image hover-overlay shadow-1-strong rounded"
                data-ripple-color="light"
              >
                <img src="img/fooimg05.png" class="w-100"  style="height: 104px; width: 157px; border-radius: 15px;"/>
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                </a>
              </div>
            </div>
          </div>
        </section>
        <!-- Section: Images -->
      </div>
      <!-- Grid container -->

    
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        All Right Reserved © 2024 Copyright:
        <a class="text-body" href="https://mdbootstrap.com/" style="color: #fff; "><b> SoobinSolutions</b></a>
      </div>
      <!-- Copyright -->
    </footer>
</div>

    <!-- Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
        crossorigin="anonymous"></script>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="./script.js"></script>

    <!-- Initialize Swiper -->
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);
        
        // Next/previous controls
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
        
        // Thumbnail image controls
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("demo");
          let captionText = document.getElementById("caption");
          if (n > slides.length) {slideIndex = 1}
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
          captionText.innerHTML = dots[slideIndex-1].alt;
        }
        </script>
        <script>
//             Domino Dreams JS
// Wrap every letter in a span
var textWrapper = document.querySelector('.ml10 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml10 .letter',
    rotateY: [-90, 0],
    duration: 1300,
    delay: (el, i) => 45 * i
  }).add({
    targets: '.ml10',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
        </script>
</body>

</html>