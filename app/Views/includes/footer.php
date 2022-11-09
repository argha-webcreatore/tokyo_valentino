
    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row g-3">

                    <div class="col-md-3">
                        <a class="" href="<?= base_url();?>">
                            <img src="assets/frontend/img/logo.png" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-md-3">
                        <h5 class="foo-title">Quick Links</h5>
                        <ul class="foo-quick-link">
                            <li><a href="#">Online Store</a></li>
                            <li><a target="_blank" href="https://vod2.inserection.com/">Videos On Demand</a></li>
                            <li><a target="_blank" href="https://www.tokyodanceclub.com/">Special Events</a></li>
                            <li><a href="#">Home</a></li>
                            <li><a href="<?= base_url('contact_us');?>">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5 class="foo-title">Store Locations</h5>
                        <ul class="foo-link">
                            <?php
                                $storesList = getAllStoresName();
                                if(!empty($storesList))
                                {
                                    for($i = 0; $i < count($storesList); $i++)
                                    {
                                        ?>
                                        <li><a href="<?= base_url('store/'.$storesList[$i]['slug']);?>"><?= $storesList[$i]['name'];?></a></li>
                                        <?php
                                    }
                                }
                            
                            ?>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5 class="foo-title">Connect with Us</h5>
                        <ul class="foo-contact">
                            <li class="contact-item">
                                <a href="#">
                                    <i class="cont-icon fas fa-location-dot"></i>
                                    <span><?= getGeneralSetting('contact_us_address');?></span>
                                </a>
                                
                            </li>
                            <li class="contact-item">
                                <a href="#">
                                    <i class="cont-icon fas fa-phone"></i>
                                    <span><?= getGeneralSetting('contact_us_telephone');?></span>
                                </a>
                            </li>
                            <li class="contact-item">
                                <a href="#">
                                    <i class="cont-icon fas fa-envelope"></i>
                                    <span><?= getGeneralSetting('contact_us_email');?></span>
                                </a>
                            </li>
                        </ul>
                        <!-- <ul class="list-inline foo-social">
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">                                    
                                    <i class="fab fa-yelp"></i>
                                </a>
                            </li>
                            
                        </ul> -->
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p class="text-center mb-0">© Copyright 2022 Tokyo Valentino. All Rights Reserved</p>
        </div>
    </footer>