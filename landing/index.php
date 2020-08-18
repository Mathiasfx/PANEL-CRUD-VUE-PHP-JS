<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Lista de Precios Tecnologia Educativa, Pizarras Digitales, Pizarra Digital TOMI, THSCREEN, Mimio, Aulas Digitales">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="La Clase digital " /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>La Clase Digital - Lista de Precios Tecnologia Educativa</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.html"><img src="images/logo.png" alt="alternative"></a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://www.laclasedigital.com.ar/pizarras-digitales-digital/">Pizarras Digitales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://www.laclasedigital.com.ar/productos/">Tienda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://www.laclasedigital.com.ar/laboratorios/">Laboratorios</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://www.laclasedigital.com.ar/contacto-pizarras-interactivas/">Contacto</a>
                </li>
            </ul>
            <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="https://www.facebook.com/laclasedigital/?__tn__=%2Cd%2CP-R&eid=ARAyha7KWM_cehDJ9oI-orghK9DiQ335u662tcYBdE3ceHK0VRzk-Et5m-qLCUCUinxV6D0EaH7w1ltU">
                        <i class="fas fa-circle fa-stack-2x facebook"></i>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>

            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->
    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                    <a class="navbar-brand logo-image" href="https://www.laclasedigital.com.ar"><img src="images/logo.png" height="90rem" alt="alternative"></a>
                        <div class="text-container">
                            <h1><span class="turquoise">Un Puente entre la </span>Tecnología y la Educación</h1>
                            <p class="p-large">Si estas pensando en equipar tu escuela o comprar algunos elementos para mejorar tus clases<br>¡Estas ofertas son las que estabas buscando!</p>
                            <a class="btn-solid-lg page-scroll" href="#">Descargar Lista</a>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="images/productos.png" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

    <div id="app">

        <div class="container" v-for="producto in productos">

            <!-- Details 1 -->
            <div class="basic-1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-container">
                                <h2>{{ producto.NombreProducto }}</h2>
                                <p>{{producto.Descripcion}}</p>
                                <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-1"> 
                                    {{producto.Prefijo}}
                                    {{producto.Precio}}</a>

                                    <a class="btn-solid-reg2 popup-with-move-anim" :href="''+producto.Link"> 
                                   Ver Más</a>
                            </div> <!-- end of text-container -->
                        </div> <!-- end of col -->
                        <div class="col-lg-6">
                            <div class="image-container">
                                <a href="https://www.laclasedigital.com.ar/contacto-pizarras-interactivas/">
                                <!-- <img :src="'../productImages/'+producto.Imagen" width="350px"> -->
                                     <img :src="'https://www.laclasedigital.com.ar/paneldecontrol/productImages/'+producto.Imagen" width="350px"> 
                            </div> <!-- end of image-container -->
                        </div> <!-- end of col -->
                    </div> <!-- end of row -->
                </div> <!-- end of container -->
            </div> <!-- end of basic-1 -->

        </div>

         <!-- Pricing -->
    <div id="pricing" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contactanos</h2>
                    <p class="p-heading p-large">Para recibir más información o coordinar una 
                        visita 0810-333-4878 o envía este <a href="http://www.laclasedigital.com.ar/contacto-pizarras-interactivas/">Formulario
                    </a></p>
                    <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="http://www.laclasedigital.com.ar/contacto-pizarras-interactivas/">CLICK AQUÍ
                            </a>
</div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of pricing -->




        <!--AXIOS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.1/axios.min.js"></script>
        <!-- VUE -->
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script type="text/javascript" src="js/main.js"></script>
</body>

</html>

</div>
</div>

<!-- /.banner -->
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="copyright text-muted small">
                    Copyright © la clase digital 2020. All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</footer>


<!-- Scripts -->
<script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
<script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
<script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
<script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
<script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
<script src="js/scripts.js"></script> <!-- Custom scripts -->


</div>
</div>
</div>