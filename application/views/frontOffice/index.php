<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetHome/css/style.css">

</head>
<body>
    
<header class="header" >

    <div id="menu-btn" class="fas fa-bars"></div>

    <a href="#" class="logo"> <span>Gestion</span>Voiture </a>

    <nav class="navbar">
        <a href="#home">Acceuil</a>
        <a href="#vehicles">Element De maintenance</a>
        <a href="#featured">Voitures Du Societe</a>
        <a href="#reviews">Chauffeurs</a>
    </nav>

    <div id="login-btn" style="display: none;">
        <button class="btn">login</button>
        <i class="far fa-user"></i>
    </div>

</header> 
   
<div class="login-form-container">

    <span id="close-login-form" class="fas fa-times"></span>

    <form action="">
        <h3>user login</h3>
        <input type="email" placeholder="email" class="box">
        <input type="password" placeholder="password" class="box">
        <p> forget your password <a href="#">click here</a> </p>
        <input type="submit" value="login" class="btn">
        <p>or login with</p>
        <div class="buttons">
            <a href="#" class="btn"> google </a>
            <a href="#" class="btn"> facebook </a>
        </div>
        <p> don't have an account <a href="#">create one</a> </p>
    </form>

</div>

<section class="home" id="home">
    <img data-speed="5" class="home-parallax" src="<?php echo base_url(); ?>assetHome/image/home-img.png" alt="">
</section>

<section class="icons-container">

    <div class="icons">
        <i class="fas fa-home"></i>
        <div class="content">
            <h3>250</h3>
            <p>Employ??</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-car"></i>
        <div class="content">
            <h3>50</h3>
            <p>Voitures</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-users"></i>
        <div class="content">
            <h3>50</h3>
            <p>chauffeur</p>
        </div>
    </div>
</section>
<section class="newsletter">
    
    <h3>rechecher une Voiture</h3> 
   <form action="">
        <input type="text" placeholder="rechecher">
        <input type="submit" value="valider" style="position:relative; right: -10%; ">
   </form>

</section>

<section class="featured" id="featured" s>

    <h1 class="heading"> <span>Voitures</span> du societe </h1>

    <div class="swiper featured-slider">

       <div class="swiper-wrapper">

           <?php
           $dispo="" ;
                foreach ($allVoiture->result() as $row)
                    {
                       if($row->disponible==1)
                            {
                                $dispo="Indisponible";
                            }
                        if($row->disponible==0)
                        {
                            $dispo="Disponible";
                        }
                            echo 
                            '
                                <div class="swiper-slide box">
                                    <img src="uploads/images/'.$row->image.'" alt="">
                                    <div class="content">
                                        <h3>'.$row->marque.'</h3>
                                        <div class="price">'.$row->numero.'</div>
                                        <h3 style="color:red;">'.$dispo.'</h3>
                                        <a href="#" class="btn">Carnet De Bord</a>
                                    </div>
                                </div> 
                            ';
                    }
         ?>

       </div>

       <div class="swiper-pagination"></div>

    </div>
</section>
<section class="vehicles" id="vehicles" style="display: none">

    <h1 class="heading">Element De <span>Maintenance </span> </h1>

    <?php 
    foreach ($allVoitureMaintenance->result() as $row)
        {
                echo 
                '   <div class="swiper vehicles-slider">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide box">
                                <img src="uploads/images/'.$row->image.'" alt="">
                                <div class="content">
                                    <h3>Nom Voiture</h3>
                                    <a href="#" class="btn">Carnet de bord</a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                ';
        }
    ?>

</section>

<section class="vehicles" id="vehicles">

    <h1 class="heading">Situation <span>Echeance</span> </h1>

    <div class="swiper vehicles-slider">

        <div class="swiper-wrapper">

            <?php 
                foreach ($test->result() as $row)
                    {
                            echo 
                            '
                            <div class="swiper-slide box">
                                <img src="uploads/images/'.$row->image.'" alt="">
                                <div class="content">
                                    <h3>'.$row->numero.'</h3>
                                    <a href=" '.base_url() .'Voiture/index/'.$row->idVoiture.'" class="btn">Carnet de bord</a>
                                </div>
                            </div>
                            ';
                    }
             ?>
        <div class="swiper-pagination"></div>

    </div>

</section>

<div class="login-form-container">

    <span id="close-login-form" class="fas fa-times"></span>

    <form action="">
        <h3>user login</h3>
        <input type="email" placeholder="email" class="box">
        <input type="password" placeholder="password" class="box">
        <p> forget your password <a href="#">click here</a> </p>
        <input type="submit" value="login" class="btn">
        <p>or login with</p>
        <div class="buttons">
            <a href="#" class="btn"> google </a>
            <a href="#" class="btn"> facebook </a>
        </div>
        <p> don't have an account <a href="#">create one</a> </p>
    </form>

</div>

<section class="services" id="services" style="">

    <h1 class="heading">  <span>Maintenance A Faire</span> </h1>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-tools"></i>
            <h3>Reparation De pneu</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis, nisi.</p>
            <a href="#" class="btn"> read more</a>
        </div>

        <div class="box">
            <i class="fas fa-gas-pump"></i>
            <h3>Vidange</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis, nisi.</p>
            <a href="#" class="btn"> read more</a>
        </div>
    </div>

</section>

<section class="contact" id="contact" style="display: none;">

    <h1 class="heading"><span>contact</span> us</h1>

    <div class="row">

        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30153.788252261566!2d72.82321484621745!3d19.141690214227783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b63aceef0c69%3A0x2aa80cf2287dfa3b!2sJogeshwari%20West%2C%20Mumbai%2C%20Maharashtra%20400047!5e0!3m2!1sen!2sin!4v1632137920043!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>

        <form action="">
            <h3>get in touch</h3>
            <input type="text" placeholder="your name" class="box">
            <input type="email" placeholder="your email" class="box">
            <input type="tel" placeholder="subject" class="box">
            <textarea placeholder="your message" class="box" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>

    </div>

</section>

<section class="footer" id="footer">

    <div class="credit"> created by <a href="https://www.freewebsitecode.com">Heritiana Andrianjafison</a> | all rights reserved </div>

</section>


<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script src="<?php echo base_url(); ?>assetHome/js/script.js"></script>

</body>
</html>