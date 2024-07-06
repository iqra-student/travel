
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Travel Agency :: Best Agency</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css"rel="stylesheet"/>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <script>
      $(document).ready(function(){
          $(".scroll-top").click(function() {
              $("html, body").animate({ 
                  scrollTop: 0 
              }, "slow");
              return false;
          });
      });
   </script>

</head>
<body>

<?php session_start(); ?>   
<!-- header section starts  -->
<section class="header">
   <a href="home.php" class="logo"><img src="images/logo.jpg"></a>
   <nav class="navbar">
      <a href="home.php">home</a>
      <a href="about.php">about</a>
      <a href="package.php">Packages</a>
      <?php
       // Check if the user is logged in, then display the logout option
      if (isset($_SESSION['user_id'])) {
         echo '<a href="login-reg-main\index.php"><i class="ri-user-3-fill"></i> Hi, ' . $_SESSION['Username'] . '!</a> <a href="login-reg-main/logout.php" class="btn btn-warning">Logout</a>';
      } else {
         // If not logged in, display the login and register options
         echo '<a href="login-reg-main/login.php" class="btn btn-warning">Login</a>';
         echo '<a href="login-reg-main/registration.php" class="btn btn-warning">Register</a>';
      }
      ?>
   </nav>
   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<!-- header section ends -->

<div class="heading" style="background:url(images/header-bg-3.png) no-repeat">
   <h1>book now</h1>
</div>

<!-- booking section starts  -->

<section class="booking">

   <h1 class="heading-title">book your trip!</h1>

   <?php if (isset($_SESSION['user_id'])) { ?>
      <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
         <div class="success-message" style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
         <?php
         unset($_SESSION['success_message']);
      }
      ?>


   <form action="book_form.php" method="post" class="book-form">

      <div class="flex">
      <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">   
      <input type="hidden" name="package_id" value="<?php echo $_GET['package_id'];?>">
      <input type="hidden" name="costperson" value="<?php echo $_GET['costperson'];?>">
      
         <!-- <div class="inputBox">
            <span>name :</span>
            <input type="text" placeholder="enter your name" name="name">
         </div>
         <div class="inputBox">
            <span>email :</span>
            <input type="email" placeholder="enter your email" name="email">
         </div> -->
         <!-- <div class="inputBox">
            <span>phone :</span>
            <input type="number" placeholder="enter your number" name="phone">
         </div> -->
         <!-- <div class="inputBox">
            <span>address :</span>
            <input type="text" placeholder="enter your address" name="address">
         </div> -->
         <!-- <div class="inputBox">
            <span>where to :</span>
            <input type="text" placeholder="place you want to visit" name="location">
         </div> -->
         <div class="inputBox">
            <span>how many :</span>
            <input type="number" placeholder="number of guests" name="guests" min= "1" required>
         </div>
         <div class="inputBox">
            <span>Start Date: :</span>
            <input type="date" name="arrivals" required>
         </div>
         <div class="inputBox">
            <span>End date: :</span>
            <input type="date" name="leaving" required>
         </div>
      </div>

      <input type="submit" value="submit" class="btn" name="send">

   </form>
   <?php } 
   else { ?>
      <!-- If the user is not logged in, display a message and a link to the login/registration page -->
      <div class="notloggedin">
         <p style= "font-size: large; text-align: center;">Please <a href="login-reg-main/login.php">log in</a> or <a href="login-reg-main/registration.php">register</a> to book a trip.</p>
      </div>
   <?php } ?>
</section>
<button type="button" class="scroll-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>
<!-- booking section ends -->
<!-- footer section starts  -->
<section class="footer">
   <div class="box-container">
      <div class="box">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
      </div>
      <div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
         <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
         <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
      </div>
      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> +880-1517-089144 </a>
         <a href="#"> <i class="fas fa-phone"></i> +111-2222-333333 </a>
         <a href="#"> <i class="fas fa-envelope"></i> sagorcse38@gmail.com </a>
         <a href="#"> <i class="fas fa-map"></i> dhaka, Bangladesh - 1215  </a>
      </div>
      <div class="box">
         <h3>follow us</h3>
         <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
         <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
      </div>
   </div>
   <div class="credit"> Project by <span>Iqra Yasmeen</span> | all rights reserved! </div>
</section>

<!-- footer section ends -->
<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>