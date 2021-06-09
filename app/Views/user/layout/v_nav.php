   <!--====== PRELOADER PART START ======-->
   <div class="preloader">
       <div class="loading">
           <div class="line"></div>
           <div class="line"></div>
           <div class="line"></div>
           <div class="line"></div>
           <div class="line"></div>
           <div class="line"></div>
           <div class="line"></div>
           <div class="line"></div>
       </div>
   </div>
   <!--====== PRELOADER PART START ======-->

   <!--====== HEADER PART START ======-->

   <header class="header-area header-area-2 header-area-4">
       <div class="header-top pl-30 pr-30 white-bg">
           <div class="row align-items-center">
               <div class="col-md-6 col-sm-7">
                   <div class="header-left-side text-center text-sm-left">
                       <ul>
                           <li><a href="#"><i class="fal fa-envelope"></i> ptik@fkip.uns.ac.id</a></li>
                           <li><a href="#"><i class="fal fa-phone"></i> (0271)648939</a></li>
                           <!-- <li><a href="#"><i class="fal fa-route"></i> Jl. Jend. Ahmad Yani 200A Pabelan, Kartasura</a></li> -->
                       </ul>
                   </div>
               </div>
           </div>
       </div>
       <div class="header-nav">
           <div class="navigation">
               <nav class="navbar navbar-expand-lg navbar-light ">
                   <a class="navbar-brand" href="/"><img src="/image/logo/logo.png" alt=""></a> <!-- logo -->
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="toggler-icon"></span>
                       <span class="toggler-icon"></span>
                       <span class="toggler-icon"></span>
                   </button> <!-- navbar toggler -->

                   <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                       <ul class="navbar-nav ml-auto">
                           <li class="nav-item">
                               <a class="nav-link" href="/#home">Home</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="/#statistik">Statistik</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="/DataJudul">Data Judul</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="/#tentang">Tentang</a>
                           </li>
                           <?php if (logged_in()) { ?>
                               <li class="nav-item pr-25">
                                   <a class="nav-link"><img src="/image/foto/<?= user()->user_image; ?>" style="width: 50px; height: 50px; object-fit: cover; object-position: center;" class="rounded-circle" alt="">
                                   </a>
                                   <ul class="sub-menu">
                                       <li><a href="/Profile">Profil</a></li>
                                       <li><a href="/Keranjang">Keranjang</a></li>
                                       <li><a href="/logout">Logout</a></li>
                                   </ul> <!-- sub menu -->
                               </li>
                           <?php } else { ?>
                               <li class="nav-item">
                                   <a class="nav-link" href="/login">Login</a>
                               </li>
                           <?php } ?>

                       </ul>
                   </div>
               </nav>
           </div> <!-- navigation -->
       </div>
   </header>

   <!--====== HEADER PART ENDS ======-->