@extends('layout.app')

@section('title', 'Home Page')


@section('content')

    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>INVIZZ</span></h1>
      <h2>Discover and collaborate with artists near you</h2>
      <div style="margin-right:15px">
        <img src="{{ asset('assets/img/artists/1.jpg') }}" class="circle-image"/>
        <img src="{{ asset('assets/img/artists/2.jpg') }}" class="circle-image"/>
        <img src="{{ asset('assets/img/artists/3.jpg') }}" class="circle-image"/>
        <img src="{{ asset('assets/img/artists/4.jpg') }}" class="circle-image"/>
        <img src="{{ asset('assets/img/artists/5.jpg') }}" class="circle-image"/>
        <img src="{{ asset('assets/img/artists/6.jpg') }}" class="circle-image"/>
        <img src="{{ asset('assets/img/artists/7.jpg') }}" class="circle-image"/>
        <img src="{{ asset('assets/img/artists/8.jpg') }}" class="circle-image"/>
        <img src="{{ asset('assets/img/artists/9.jpg') }}" class="circle-image"/>
      </div>
      <br>
      <!-- ----------------- -->
      @guest
        <input type="hidden" value="ok" name="registered" id="registered"/>
      @else
        <input type="hidden" value="@if(!Auth::User()->profile->avatar_src || !Auth::User()->profile->address){{ 'uncompleted' }}@else{{ 'completed' }} @endif" name="registered" id="registered"/>
      @endguest
      <!-- ----------------- -->
      <div class="search-position">
         
          <div class="col form-group" id="search">
          <form method="post" action="/search" id="home_search">
        @csrf
            <div style="display:flex;margin-left:10px">
              <span class="iconify text-register-icon" data-icon="mdi:account-search-outline" data-inline="false"></span>
              <input type="text" class="form-control text-register" name="search_address" id="search_address" placeholder="Enter city or ZIP code..." style="width:300px;"/>
              <div class="validate"></div>
              <input type="hidden" name="login_info" value="@guest{{'off'}}@else{{'on'}}@endguest"/>
              <!-- <input type="submit" value="Search" class="btn-get-started scrollto bugfix"/> -->

              <button type="submit" form="home_search" value="Submit" class="btn-get-started scrollto bugfix">
                <span class="iconify" data-icon="jam:search" data-inline="false" style="font-size:25px;"></span>
              </button>
            </div>
        </form>

          </div>
      </div>

      @guest
        <div style="width:100%;">
          <a href="#" class="btn-get-started scrollto" id="responsive-button" data-bs-toggle="modal" data-bs-target="#register-modal" data-ticket-type="premium-access">Join INVIZZ</a>
        </div>

        <div class="polaroid">
        
          <img src="{{ asset('assets/img/login.jpg') }}" alt="Norway" style="width:100%; height:190px; border-radius:10px">

          <div class="col form-group">
            <div style="display:flex;margin-left:10px">
              <span class="iconify text-register-icon" data-icon="mdi:email-send" data-inline="false"></span>
              <input type="email" class="form-control text-register" name="email" id="email_register" placeholder="Your Email Address" data-rule="email" data-msg="Please enter a valid email" style="width:104%;"/>
              <div class="validate"></div>
            </div>
          </div>

          <div style="margin-top:20px; margin-bottom:10px;">
            <a href="#" class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#register-modal" data-ticket-type="premium-access" id="join_invizz_register">Join INVIZZ</a>
          </div>
        </div>
      @endguest
    </div>
    
<!---------------------------------------------------- login start----------------------------- -->

      <div id="login-modal" class="modal">
        <div class="modal-position" style="max-width:350px;">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="padding:20px;">
              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="emails" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
             
                <input type="hidden" id="password" name="password" value="deliteser"/>

                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="form-control btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

<!------------------------------------ login ---------end  ---------------------------------------->

    <div id="register-modal" class="modal">
      
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Register</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                  <div class="row">
                    <div class="col-md-6" style="padding-right:20px;">
                      <div class="row">
                        <div class="col-md-12" style="text-align:center; ">
                          <img src="{{ asset('assets/img/artists/1.jpg') }}" class="circle-image"/>
                          <img src="{{ asset('assets/img/artists/2.jpg') }}" class="circle-image"/>
                          <img src="{{ asset('assets/img/artists/3.jpg') }}" class="circle-image"/>
                          <img src="{{ asset('assets/img/artists/4.jpg') }}" class="circle-image"/>
                          <img src="{{ asset('assets/img/artists/5.jpg') }}" class="circle-image"/>
                          <img src="{{ asset('assets/img/artists/6.jpg') }}" class="circle-image"/>
                          <img src="{{ asset('assets/img/artists/7.jpg') }}" class="circle-image"/>
                          <img src="{{ asset('assets/img/artists/8.jpg') }}" class="circle-image"/>
                          <img src="{{ asset('assets/img/artists/9.jpg') }}" class="circle-image"/>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-12">
                        
                            <img src="{{ asset('assets/img/register-left.jpg') }}" class="left-demo-image"/>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="desc" style="text-align:center;"><p>
                            👋 Hello!👋  <br>
                            <div style="line-height:2;">
                                You are paying to support software that is completely bootstrapped by a young artist like yourself. <br>
                                Charging for a membership is the only way we make money. <br>
                                We do this so that we never have to show you a single ad or sell your data to any third-parties– and we promise we never will.<br>
                            </div>
                          
                          </div>
                          
                        </div>
                      </div>
                    </div> 

                    <div class="col-md-6 boundary">
                      <div class="row">
                          <div class="col-md-12">

                            <div class="tab">
                              <button class="demo left-btn each-title active" onclick="infofunc(event, 'lite')">Monthly Membership</button>
                              <button class="demo right-btn each-title" onclick="infofunc(event, 'pro')">Annual Membership</button>
                            </div>
 
                            <div id="lite" class="demo2" style="display:block;">
                              <div class="box">
                                <h4><sup>$</sup>6<span> / month<br>See if it’s right for you!</span></h4>
                                <ul>
                                  <li>What am I paying for?</li>
                                  <div class="confirm-terms" style="text-align:left;padding:0px 10px;">
                                    <div>🥇 Full visibility into artist profiles:</div>
                                    
                                    <div style="margin-left:20px">🗸 View an artist's general home base, body of work, and collab status.</div>
                                    <div>🥇 Social Features:</div>
                                    <div style="margin-left:20px">🗸 DM and engage with artists on the platform.</div>
                                    <div>🥇 Access to the INVIZZ community on Slack:</div>
                                    <div style="margin-left:20px">🗸 Share ideas, seek advice, and collaborate virtually with the entire global INVIZZ community!</div>
                                    <br>
                                    <div style="text-align: center;font-size: 10px;color: #076561;font-weight:600;">
                                      Not satisfied? Self-cancel your membership at any time - no problem.<br>
                                      Cancel within your first 7 days and receive a full-refund.
                                    </div>
                                  </div>
                                </ul>
                              </div>
                            </div>

                            <div id="pro" class="demo2">
                              <div class="box">
                                <!-- <span class="advanced">Advanced</span> -->
                                <h4><sup>$</sup>30<span> / year<br>Save 58%</span></h4>
                                <ul>
                                  <li>What am I paying for?</li>
                                  <div class="confirm-terms" style="text-align:left;padding:0px 10px;">
                                    <div>🥇 Full visibility into artist profiles:</div>
                                    
                                    <div style="margin-left:20px">🗸 View an artist's general home base, body of work, and collab status.</div>
                                    <div>🥇 Social Features:</div>
                                    <div style="margin-left:20px">🗸 DM and engage with artists on the platform.</div>
                                    <div>🥇 Access to the INVIZZ community on Slack:</div>
                                    <div style="margin-left:20px">🗸 Share ideas, seek advice, and collaborate virtually with the entire global INVIZZ community!</div>
                                  </div>
                                  <br>
                                    <div style="text-align: center;font-size: 10px;color: #076561;font-weight:600;">
                                      Not satisfied? Self-cancel your membership at any time - no problem.<br>
                                      Cancel within your first 7 days and receive a full-refund.
                                    </div>
                                </ul>
                              </div>
                            </div>
                          </div>
                      </div>

                <form method="POST" action="{{ route('register') }}" id="payment-form">
                    @csrf
                      <div class="col form-group">
                        <div style="display:flex;margin-left:10px">
                          <span class="iconify text-register-icon" data-icon="mdi:email-send" data-inline="false"></span>
                          <input type="email" class="form-control text-register @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="Your Email Address" data-rule="email" required autocomplete="email" />
                          
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                          <p id="email-error" role="alert" class="text-danger font-italic" style="font-size:12px;margin-left:35px;"></p>
                      </div>

                      <div class="row form-group">
                        <div class="col-md-12">
                          <div id="card-element"></div>
                        </div>
                      </div>
                      <p id="card-error" role="alert"></p>

                      <div class="row form-group">
                          <div class="col-md-12">
                              <div class="form-check form-check-inline custom-control custom-checkbox">
                                  <input type="checkbox" name="terms_conditions" id="terms_conditions" class="custom-control-input" style="float: left;width: 30px;height: 23px;">
                                  <span style="font-size:14px;">I agree to the <a href="/terms-service" style="text-decoration:underline">Terms of Service (TOS) and Privacy Policy</a>.</span>
                              </div>
                              <p id="terms-error" role="alert" class="text-danger font-italic" style="font-size:12px;margin-left:35px;"></p>
                              @error('terms_conditions')
                              <div class="text-danger font-italic">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>

                      <input type="hidden" id="membership_type" name="membership_type" value="monthly"/>
                      <input type="hidden" id="password" name="password" value="deliteser"/>
                      <input id="password-confirm" type="hidden" class="form-control" name="password_confirmation" value="deliteser">

                      <div class="text-center mt-3">
                        <button type="submit" class="btn-join-invizz" id="btn_register_test" >
                          <div class="each-title">Join INVIZZ</div>
                        </button>
                      </div>
                </form>

                <!-- <form method="POST" action="{{ route('email.verify') }}" id="email_form">
                  @csrf
                  <input type="hidden" id="verify_email" name="verify_email" value="verify email"/>
                </form> -->
                  
                  
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <h3>About <span>INVIZZ</span></h3>
        </div>
        <h3 style="text-align:center;">We are a platform designed to faciliate in-person collaboration between artists</h3>
        <div style="text-align:center;">INVIZZ allows your to search, discover, and engage with artists all over the world</div>
        <br>
        <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <div style="padding: 70px 0px 0px 0px;">
              <img src="{{ asset('assets/img/invizz_about.svg') }}" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
              <div class="col-lg-12" style="text-align:center;">
                <h4>INVIZZ artists include:</h4>
              </div>
            </div>

            <div class="row" style="margin-left: 40px;">
              <div class="col-lg-6">
                <ul>
                  <li>
                    <i class="bx"><span class="iconify" data-icon="mdi:guitar-acoustic" data-inline="false" style="font-size: 40px;"></span></i>
                    <div>
                      <h5 style="padding: 20px 0px;">Musicians</h5>
                    </div>
                  </li>
                  <li>
                    <i class="bx"><span class="iconify" data-icon="mdi:brush" data-inline="false" style="font-size: 40px;"></span></i>
                    <div>
                      <h5 style="padding: 20px 0px;">Painters</h5>
                    </div>
                  </li>
                  <li>
                    <i class="bx"><span class="iconify" data-icon="mdi:camera" data-inline="false" style="font-size: 40px;"></span></i>
                    <div>
                      <h5 style="padding: 20px 0px;">Photographers</h5>
                    </div>
                  </li>
                  <li>
                    <i class="bx"><span class="iconify" data-icon="mdi:dance-ballroom" data-inline="false" style="font-size: 40px;"></span></i>
                    <div>
                      <h5 style="padding: 20px 0px;">Dancers</h5>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li>
                    <i class="bx"><span class="iconify" data-icon="mdi:popcorn" data-inline="false" style="font-size: 40px;"></span></i>
                    <div>
                      <h5 style="padding: 20px 0px;">Filmmakers</h5>
                    </div>
                  </li>
                  <li>
                    <i class="bx"><img src="{{ asset('assets/img/vase.svg') }}" style="width: 40px;"/></i>
                    <div>
                      <h5 style="padding: 20px 0px;">Ceramics Artists</h5>
                    </div>
                  </li>
                  <li>
                    <i class="bx"><span class="iconify" data-icon="fa-solid:music" data-inline="false" style="font-size: 40px;"></span></i>
                    <div>
                      <h5 style="padding: 20px 0px;">Music Producers</h5>
                    </div>
                  </li>
                  <li>
                    <i class="bx"><span class="iconify" data-icon="mdi:youtube-tv" data-inline="false" style="font-size: 40px;"></span></i>
                    <div>
                      <h5 style="padding: 20px 0px;">YouTubers</h5>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Artists</h2>
          <h3>Featured <span>Artists</span></h3>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
              
                <img src="{{ asset('assets/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Filmmaker</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="member-img">
              
                <img src="{{ asset('assets/img/team/team-2.jpg') }}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Musician</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="member-img">
                <img src="{{ asset('assets/img/team/team-3.jpg') }}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>Music Producer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <div class="member-img">
                <img src="{{ asset('assets/img/team/team-4.jpg') }}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>YouTuber</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Membership</h2>
          <h3>Try an INVIZZ <span>Membership</span></h3>
        </div>

        <div class="pricing-container">
          <div class="row">

            <div class="col-lg-6 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
              <div class="box">
                <h3>Monthly Membership</h3>
                <h4><sup>$</sup>6<span> / month<br>See if it’s right for you!</span></h4>
                <ul>
                  <li>
                    <img src="{{ asset('assets/img/favicon.png') }}" style="width:200px;"/>
                  </li>
                </ul>
                <div class="btn-wrap">
                  <a href="#" class="btn-buy" data-bs-toggle="modal" data-bs-target="#register-modal" data-ticket-type="premium-access">Sign Up</a>
                  
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
              <div class="box">
                <!-- <span class="advanced">Advanced</span> -->
                <h3>Annual Membership</h3>
                <!-- <span class="advanced">Advanced</span> -->
                  <h4><sup>$</sup>30<span> / year<br>Save 58%</span></h4>
                  <ul>
                    <li>
                      <img src="{{ asset('assets/img/favicon.png') }}" style="width:200px;"/>
                    </li>
                  </ul>
                <div class="btn-wrap">
                  <a href="#" class="btn-buy"  data-bs-toggle="modal" data-bs-target="#register-modal" data-ticket-type="premium-access">Sign Up</a>
                </div>
              </div>
            </div>
          </div>
          <p style="text-align: center;margin-top: 20px;">Not satisfied? Self-cancel your membership at any time - no problem.<br>
                Cancel within your first 7 days and receive a full-refund.
          </p>

        </div>
        

      </div>
    </section><!-- End Pricing Section -->

      <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Feedback</h2>
          <h3><span>Please leave your feedback</span></h3>
          <p>You can leave your feedback for improving of INVIZZ</p>
        </div>


        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <!-- <div class="col-lg-6 ">
            <div style="width: 100%"><iframe width="100%" height="384" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=384&amp;hl=en&amp;q=philadelphia+(INVIZZ)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.maps.ie/route-planner.htm">Google Route Planner</a></div>
          </div> -->

          <div class="col-lg-12">
            <div class="php-email-form">
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="name_contact" class="form-control" id="name_contact" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email_contact" id="email_contact" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject_contact" id="subject_contact" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message_contact" rows="5" id="message_contact" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button id="send_message" type="submit">Send Message</button></div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-contact">
            <h3>INVIZZ<span>.</span></h3>
            <br><br>
              <strong>Email:</strong> info@invizz.io<br>
            </p>
          </div>



          <div class="col-lg-6 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <div class="social-links mt-3">
              <a href="https://twitter.com/___invizz" class="twitter"><i class="bx bxl-twitter"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>INVIZZ</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->


  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  @include('scripts.homepage-script')

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/custome.js') }}"></script>
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
 
@endsection