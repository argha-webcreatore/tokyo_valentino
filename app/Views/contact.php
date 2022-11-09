<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tokyo Valantino</title>
    <?php require 'includes/header-assets.php'; ?>
  </head>
  <body>
        <?php include 'includes/header.php'; ?>


    <section class="contact-area sec-dark text-light">
      <div class="container overflow-hidden">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 mx-auto text-center mb-3">
                <h4 class="sec-title">Contact Us</h4>
            </div>
        </div>
        <div class="row g-4">
            <div id="map" class="col-md-8" data-title="Tokyo Valantino" data-lat="33.80764237387731" data-long="-84.3651854178269" data-marker="assets/img/favicon.ico">
                <div class="map-data">
                    <?= $gmap;?>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="list-group list-group-flush cont-list">
                    <li class="list-group-item">
                        <h5 class="item-title"><i class="fas fa-location-dot"></i> Address</h5>
                        <p class="mb-0"><?= $address;?></p>
                    </li>
                    <li class="list-group-item">
                        <h5 class="item-title"><i class="fas fa-phone"></i> Telephone</h5>
                        <p class="mb-0"><?= $telephone;?></p>
                    </li>
                    <li class="list-group-item">
                        <h5 class="item-title"><i class="fas fa-envelope"></i> Email</h5>
                        <p class="mb-0"><?= $email;?></p>
                    </li>
                    <li class="list-group-item">
                        <h5 class="item-title"><i class="fas fa-clock"></i> Store Hours</h5>
                        <p class="mb-0"><?= $store_hours;?></p>
                    </li>
                </ul>
            </div>
        </div>
      </div>
    </section>

    <section class="contact-support sec-dark text-light mb-0">
      <div class="container">
        <div class="overflow-hidden">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 mx-auto text-center mb-3">
                    <h4 class="sec-title">Customer Support</h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <!-- <div class="col-lg-4 mb-3 mb-lg-0">
                <div class="card card-body supportBox">
                    <h6>Order Related Information</h6>
                    <a href="#" class="phone">
                        <i class="fas fa-phone"></i> 404-875-9200
                    </a>
                    <a href="#" class="mail">
                        <i class="fas fa-envelope"></i> orders@tokyovalentino.com
                    </a>
                </div>
            </div> -->
            <div class="col-lg-4">
                <div class="card card-body supportBox">
                    <h6>General Information</h6>
                    <a href="#" class="phone">
                        <i class="fas fa-phone"></i> <?= $telephone;?>
                    </a>
                    <a href="#" class="mail">
                        <i class="fas fa-envelope"></i> <?= $email;?>
                    </a>
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
    <!-- <script src="assets/js/map.js" type="text/javascript"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRwPwZH9yZ10knp00AP0ERWGWkMuNukJE" type="text/javascript"></script>
    <!-- <script src="assets/js/googlemaps1.js" type="text/javascript"></script> -->
    <script src="assets/js/miniMap.js" type="text/javascript"></script>

  </body>
</html>