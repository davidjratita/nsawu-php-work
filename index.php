<?php


include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>
<?php include 'components/index_header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>nsaw.u</title>
   
   <link rel="stylesheet" href="css/swiper.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="css/fontawesome/css/all.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/boxstyle.css">
   

</head>

<body style="background-color: #fff;">
   


   <div class="container">

      <div class="gallery">
         <figure class="gallery__item gallery__item--1">
            <img src="uploaded_img/3.jpg" alt="jgfj" class="gallery__img">
             <h3 class="first-txt">NSAW.U COLLECTION</h3>
             <a href="shop.php">
              <button class="first-btn">BROWSE SHOP</button>
             </a>
         </figure>

         <figure class="gallery__item gallery__item--2">
            <img src="uploaded_img/7.jpg" alt="jgfj" class="gallery__img">
            <h3 class="second-txt">JOIN US TODAY</h3>
            <a href="user_register.php">
               <button class="second-btn">REGISTER</button>
             </a>
            
         </figure>

         <figure class="gallery__item gallery__item--3">
            <img src="uploaded_img/4.jpg" alt="jgfj" class="gallery__img">
            <h3 class="third-txt">WANT TO ROCK THIS?</h3>
            <a href="contact.php">
               <button class="third-btn">CONTACT US</button>
             </a>
         </figure>

         <figure class="gallery__item gallery__item--4">
            <img src="uploaded_img/2.jpg" alt="jgfj" class="gallery__img">
            <h3 class="fourth-txt">WHO WE ARE</h3>
            <a href="about.php">
               <button class="fourth-btn">READ OUR STORY</button>
             </a>
         </figure>

      </div>

   </div>

<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>


</body>
</html>