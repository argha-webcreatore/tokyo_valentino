<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tokyo Valantino</title>
    <?php require 'includes/header-assets.php'; ?>
    <style>
        .playerWraper {
            position: relative;
        }
        .playerWraper .playVid {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2.9em;
            height: 1.7em;
            width: 1.7em;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            padding-left: 0.5em;
            border: 5px solid currentColor;
        }
    </style>
  </head>
  <body>
        <?php include 'includes/header.php'; ?>
    

    <div class="swiper slideBanner">
        <div class="swiper-wrapper">
            <div class="swiper-slide" >
                <div class="imgBG" style="--bg-url: url('<?php echo base_url('assets/frontend/img/intro_slide-1.png');?>')"></div> 
                <div class="slide-cont">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 mx-auto text-center">
                                <img class="img-fluid" src="<?php echo base_url('assets/frontend/img/banner-icon.png');?>" alt="">
                                <h2 class="text-white fw-bold">Welcome to Tokyo Valentino</h2>
                                <span class="text-white d-block">Definitely makes the "BEST CRAZY DATE NIGHT"</span>
                                <button class="btn btn-light rounded-pill btn-theme--fill-dark--reverse btn-sm btn-pill mt-4 px-3">Learn More <i class="fa-solid fa-circle-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide" >
                <div class="imgBG" style="--bg-url: url('<?php echo base_url('assets/frontend/img/intro_slide-1.png');?>')"></div> 
                <div class="slide-cont">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 mx-auto text-center">
                                <img class="img-fluid" src="<?php echo base_url('assets/frontend/img/banner-icon.png');?>" alt="">
                                <h2 class="text-white fw-bold">Welcome to Tokyo Valentino</h2>
                                <span class="text-white d-block">Definitely makes the "BEST CRAZY DATE NIGHT"</span>
                                <button class="btn btn-light rounded-pill btn-theme--fill-dark--reverse btn-sm btn-pill mt-4 px-3">Learn More <i class="fa-solid fa-circle-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>

    <section class="remodal" data-remodal-id="modalVid">
        <button data-remodal-action="close" class="remodal-close"></button>
        <video id="play-aboutVid" class="video-js vjs-big-play-centered vjs-16-9"
            controls
            preload="auto"
            poster="assets/frontend/img/about.png"
            data-setup='{}'>
                <source src="<?= base_url('uploads/aboutVideo/'.$about_video);?>" type="video/mp4"></source>
                <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank">
                    supports HTML5 video
                    </a>
                </p>
        </video>
    </section>

    <section class="about sec-dark text-light" style="--data-coverBG: url(../img/bg-about.png)">
      <div class="container">
        <div class="row g-5 align-items-center my-auto">
            <div class="col-md-4">
                <div class="playerWraper">
                    <img id="play-about" class="img-fluid" src="assets/frontend/img/about.png" alt="">
                    <a class="btn playVid" href="#modalVid"><i class="fa-solid fa-play"></i></a>
                </div>
                <!-- <video
                    id="play-aboutVid"
                    class="video-js vjs-big-play-centered vjs-16-9"
                    
                    controls
                    preload="auto"
                    poster="assets/frontend/img/about.png"
                    data-setup='{}'>
                        <source src="<?= base_url('uploads/aboutVideo/'.$about_video);?>" type="video/mp4"></source>
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank">
                            supports HTML5 video
                            </a>
                        </p>
                </video> -->
            </div>
            <div class="col-md-8" style="z-index: 1;">
                <h4 class="sec-title">ABOUT US</h4>
                <div style="font-size: 1.2rem;">
                    <?php echo $about_description; ?>
                </div>
            </div>
            
        </div>
      </div>
    </section>

    <section class="store">
      <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto text-center mb-3">
                <h4 class="sec-title">STORE LOCATIONS</h4>
                <span class="bg-primary rounded-pill text-light px-3 py-1"><?= count($stores);?> Stores in Southeast Georgia</span>
            </div>
        </div>
        <div class="row g-3">
            <?php
                if(!empty($stores))
                {
                    for($i = 0; $i < count($stores); $i++)
                    {
                        ?>
                        <div class="col-lg-4 col-md-6 store-list-item">
                            <div class="card">
                                <!-- <img src="" alt="" class="img-fluid masker"> -->
                                <img src="<?= base_url('uploads/storeImages/'.$stores[$i]['image']);?>" alt="" class="img-fluid masker">
                                <div class="card-body text-center">
                                    <h5><?= $stores[$i]['name'];?></h5>
                                    <span class="addr text-theme d-block"><i class="fas fa-location-dot"></i> <?= $stores[$i]['address'];?></span>
                                    <span class="contact text-theme d-block"><i class="fas fa-phone"></i> <?= $stores[$i]['contact'];?></span>
                                    <a href="<?= base_url('store/'.$stores[$i]['slug']);?>" class="btn btn-sm btn-theme--fill-dark text-uppercase mt-3">Read More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>
      </div>
    </section>


    <section class="product sec-dark text-light">
      <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto text-center mb-3">
                <h4 class="sec-title">FEATURED PRODUCTS</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="swiper homeProd">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="card text-dark">
                            <div class="card-header">
                                <div class="rating text-light">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <img src="assets/frontend/img/prod/prod-1.png" alt="" class="img-fluid d-flex mx-auto">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <h6 class="item-title col-md-10">California Dreaming Santa Monica Starlet</h6>
                                    <i class="fas fa-heart col-md-2 d-flex justify-content-end"></i>
                                </div>
                                <div class="row">
                                    <div class="col-7">
                                        <span class="item-price">$22.20</span>
                                    </div>
                                    <div class="col-5 d-flex justify-content-end">
                                        <a class="btn btn-sm btn-dark me-2" href="#"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-sm btn-theme--fill-dark" href="#"><i class="fas fa-cart-shopping"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="card text-dark">
                            <div class="card-header">
                                <div class="rating text-light">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <img src="assets/frontend/img/prod/prod-1.png" alt="" class="img-fluid d-flex mx-auto">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <h6 class="item-title col-md-10">California Dreaming Santa Monica Starlet</h6>
                                    <i class="fas fa-heart col-md-2 d-flex justify-content-end"></i>
                                </div>
                                <div class="row">
                                    <div class="col-7">
                                        <span class="item-price">$22.20</span>
                                    </div>
                                    <div class="col-5 d-flex justify-content-end">
                                        <a class="btn btn-sm btn-dark me-2" href="#"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-sm btn-theme--fill-dark" href="#"><i class="fas fa-cart-shopping"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="card text-dark">
                            <div class="card-header">
                                <div class="rating text-light">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <img src="assets/frontend/img/prod/prod-1.png" alt="" class="img-fluid d-flex mx-auto">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <h6 class="item-title col-md-10">California Dreaming Santa Monica Starlet</h6>
                                    <i class="fas fa-heart col-md-2 d-flex justify-content-end"></i>
                                </div>
                                <div class="row">
                                    <div class="col-7">
                                        <span class="item-price">$22.20</span>
                                    </div>
                                    <div class="col-5 d-flex justify-content-end">
                                        <a class="btn btn-sm btn-dark me-2" href="#"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-sm btn-theme--fill-dark" href="#"><i class="fas fa-cart-shopping"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="card text-dark">
                            <div class="card-header">
                                <div class="rating text-light">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <img src="assets/frontend/img/prod/prod-1.png" alt="" class="img-fluid d-flex mx-auto">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <h6 class="item-title col-md-10">California Dreaming Santa Monica Starlet</h6>
                                    <i class="fas fa-heart col-md-2 d-flex justify-content-end"></i>
                                </div>
                                <div class="row">
                                    <div class="col-7">
                                        <span class="item-price">$22.20</span>
                                    </div>
                                    <div class="col-5 d-flex justify-content-end">
                                        <a class="btn btn-sm btn-dark me-2" href="#"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-sm btn-theme--fill-dark" href="#"><i class="fas fa-cart-shopping"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="card text-dark">
                            <div class="card-header">
                                <div class="rating text-light">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <img src="assets/frontend/img/prod/prod-1.png" alt="" class="img-fluid d-flex mx-auto">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <h6 class="item-title col-md-10">California Dreaming Santa Monica Starlet</h6>
                                    <i class="fas fa-heart col-md-2 d-flex justify-content-end"></i>
                                </div>
                                <div class="row">
                                    <div class="col-7">
                                        <span class="item-price">$22.20</span>
                                    </div>
                                    <div class="col-5 d-flex justify-content-end">
                                        <a class="btn btn-sm btn-dark me-2" href="#"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-sm btn-theme--fill-dark" href="#"><i class="fas fa-cart-shopping"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                  </div>
            </div>
            
        </div>
      </div>
    </section>


    <section class="testimonial bg-dark text-light" style="--data-coverBG: url('<?php echo base_url('assets/frontend/img/testimo/testi-bg.jpg');?>')">
      <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto text-center mb-3">
                <h4 class="sec-title">TESTIMONIALS</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="swiper testimoSlide">
                    <div class="swiper-wrapper">
                        <?php
                            if(!empty($testimonials))
                            {
                                for($i = 0; $i < count($testimonials); $i++)
                                {
                                    ?>
                                    <div class="swiper-slide testi-item">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="user-cont">
                                                    <div class="user-img"><img src="<?= base_url('uploads/testiMonialsImages/'.$testimonials[$i]['image']);?>" alt="" class="img-fluid"></div>
                                                    <span class="userName"><?=$testimonials[$i]['name'];?></span>
                                                    <span class="userLoc"><?=$testimonials[$i]['location'];?></span>
                                                </div>
                                                <div class="testi-cont">
                                                    <p><?=$testimonials[$i]['description'];?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                      
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                  </div>
            </div>
            
        </div>
      </div>
    </section>

    <section>
        <div class="container">
          <div class="row">
              <div class="col-md-12 mx-auto text-center">
                  <h4 class="sec-title">Signup to be notified of specials and events.</h4>
              </div>
              <div class="col-md-8 mx-auto">
                <form class="d-flex justify-content-center" action="post">
                    <input id="" class="form-control flex-grow-1 me-2 w-auto" name="" type="email" placeholder="Email Address" />
                    <button type="submit" class="btn btn-theme--fill-dark">SIGN UP NOW</button>
                </form>
              </div>
          </div>
          
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
    

    <?php require 'includes/footer-assets.php'; ?>
    
  </body>
</html>