<!--========================== Header section Start ==========================-->
<div class="header-area">
    <div class="header" id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg">

                <a class="navbar-brand logo normal-logo" id="normal-logo" href="index.html"><img src="assets/images/logo/logo.png" alt=""></a>
               

                <button class="navbar-toggler header-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span id="hiddenNav"><i class="las la-bars"></i></span>
                </button>
                
                <!-- Search Box Start -->
                    <div class="toggle-search-box">
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#search-box" data-bs-whatever="@mdo"><i class="las la-search"></i></button>
                    </div>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-menu ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="about.html">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="blog.html" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Blog <span class="nav-item__icon"><i class="las la-angle-down"></i></span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-menu__list">
                                    <a class="dropdown-item dropdown-menu__link" href="blog.html">Blog </a>
                                </li>
                                <li class="dropdown-menu__list">
                                    <a class="dropdown-item dropdown-menu__link" href="blog-details.html">Blog Single </a>
                                </li>
                            </ul>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="service.html">Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="portfolio.html">Portfolio</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li> 
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<!--========================== Header section End ==========================-->


 <!--========================== Search Modal Start ==========================-->
 <div class="overlay-search-box position-relative">
  <div class="modal fade" id="search-box" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="search-overlay-close" data-bs-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
              </div>
              <div class="modal-body">
                  <form>
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="search-box">
                                  <div class="input--group">
                                      <input type="text" class="form--control style-two" placeholder="Search....">
                                      <button class="search-btn" type="submit"><i class="las la-search"></i></button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
<!--========================== Search Modal End ==========================-->