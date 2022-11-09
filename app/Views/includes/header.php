<header>
        <div class="top-bar py-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <ul class="list-inline top-bar-contact mb-0">
                            <li class="list-inline-item">
                                <a class="text-decoration-none" href="#"><i class="far fa-envelope"></i>&nbsp; <?= getGeneralSetting('contact_us_email');?></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-decoration-none" href="#"><i class="fas fa-mobile"></i>&nbsp; <?= getGeneralSetting('contact_us_telephone');?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 d-md-flex justify-content-end">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a class="btn btn-sm btn-theme--fill-dark" href="#"><i class="fas fa-cart-shopping"></i>&nbsp; ONLINE STORE</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-sm btn-theme--fill-dark--reverse" href="#"><i class="fas fa-video"></i>&nbsp; VIDEOS ON DEMAND</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-light bg-light" aria-label="First navbar example">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url();?>">
                    <img src="assets/frontend/img/logo.png" alt="" class="img-fluid">
                </a>
                
                <a class="btn btn-theme--fill-dark ms-auto me-2" href="#">Login or Signup</a>

                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#wcTokyo-ValNav" aria-controls="wcTokyo-ValNav">
                    <svg width="24" height="19" viewBox="0 0 24 19" fill="currentColor">
                        <rect width="24" height="4" rx="2" />
                        <rect y="8" width="24" height="3" rx="1.5" />
                        <rect x="13" y="15" width="11" height="4" rx="2" />
                        <circle cx="9" cy="17" r="2" />
                    </svg>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="wcTokyo-ValNav" aria-labelledby="wcTokyo-ValNavLabel" style="--bs-offcanvas-width: 100%;">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div>
                            Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
                        </div>
                        <div class="dropdown mt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                            Dropdown button
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        
            
            </div>
        </nav>
    </header>
    