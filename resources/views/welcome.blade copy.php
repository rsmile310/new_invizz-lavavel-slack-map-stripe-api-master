@extends('layouts.app')

@section('title', 'Home Page')
@include('scripts.gmaps-address-lookup-api3')
@section('content')
    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>INVIZZ</span></h1>
      <h2>Discover and collaborate with artists near you</h2>
      <div>
        <img src="assets/img/artists/1.jpg" class="circle-image"/>
        <img src="assets/img/artists/2.jpg" class="circle-image"/>
        <img src="assets/img/artists/3.jpg" class="circle-image"/>
        <img src="assets/img/artists/4.jpg" class="circle-image"/>
        <img src="assets/img/artists/5.jpg" class="circle-image"/>
        <img src="assets/img/artists/6.jpg" class="circle-image"/>
        <img src="assets/img/artists/7.jpg" class="circle-image"/>
        <img src="assets/img/artists/8.jpg" class="circle-image"/>
        <img src="assets/img/artists/9.jpg" class="circle-image"/>
      </div>
      <br>
      <!-- <div class="d-flex">
        <input type="text" class="form-control" name="search" id="search" placeholder="Enter city, or ZIP code..." style="width:300px;"/>

        <a href="/search" class="btn-get-started scrollto">Search</a>
      </div> -->
      
        <div class="col form-group" id="search">
          <div style="display:flex;margin-left:10px">
            <span class="iconify text-register-icon" data-icon="mdi:account-search-outline" data-inline="false"></span>
            <input type="text" class="form-control text-register" name="address" id="search_address" placeholder="Enter city, or ZIP code..." style="width:300px;"/>
            <div class="validate"></div>
            <a href="/search" class="btn-get-started scrollto">Search</a>
          </div>
        </div>
        
        <div style="width:100%;">
          <a href="#" class="btn-get-started scrollto" id="responsive-button" data-bs-toggle="modal" data-bs-target="#register-modal" data-ticket-type="premium-access">Join INVIZZ</a>
        </div>
        
      <div class="polaroid">
        <img src="assets/img/login.jpg" alt="Norway" style="width:100%; height:190px; border-radius:10px">

        <div class="col form-group">
          <div style="display:flex;margin-left:10px">
            <span class="iconify text-register-icon" data-icon="mdi:email-send" data-inline="false"></span>
            <input type="email" class="form-control text-register" name="email" id="email" placeholder="Your Email Address" data-rule="email" data-msg="Please enter a valid email" style="width:104%;"/>
            <div class="validate"></div>
          </div>
        </div>

        <div class="container">
          <a href="#" class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#register-modal" data-ticket-type="premium-access">Join INVIZZ</a>
        </div>
      </div>
    </div>
    
<!---------------------------------------------------- login start----------------------------- -->

      <div id="login-modal" class="modal">
        <div class="modal-position">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="padding:20px;">
              <div style="display:flex;">
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                <div class="col form-group">
                  <div style="display:flex;margin-left:10px">
                    <span class="iconify text-register-icon" data-icon="mdi:email-send" data-inline="false"></span>
                    <input type="email" class="form-control text-register" name="email" id="email" placeholder="Your Email Address" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
                </div>

                <div class="text-center mt-3">
                  <button type="submit" class="btn-get-started scrollto btn-register" >
                    <div class="each-title">Login</div>
                    <!-- <div class="each-desc">Lite membership without social features</div> -->
                  </button>
                </div>
              </div>
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
                        <img src="assets/img/artists/1.jpg" class="circle-image"/>
                        <img src="assets/img/artists/2.jpg" class="circle-image"/>
                        <img src="assets/img/artists/3.jpg" class="circle-image"/>
                        <img src="assets/img/artists/4.jpg" class="circle-image"/>
                        <img src="assets/img/artists/5.jpg" class="circle-image"/>
                        <img src="assets/img/artists/6.jpg" class="circle-image"/>
                        <img src="assets/img/artists/7.jpg" class="circle-image"/>
                        <img src="assets/img/artists/8.jpg" class="circle-image"/>
                        <img src="assets/img/artists/9.jpg" class="circle-image"/>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                          <img src="assets/img/register-left.jpg" class="left-demo-image"/>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="desc"><p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;👋 Hello!👋  <br>
                        <div style="line-height:2;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You are paying to support software that is completely bootstrapped by a young artist like yourself. <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Charging for a membership is the only way we make money. <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We do this so that we never have to show you a single ad or sell your data to any third-parties– and we promise we never will.<br>
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
                            <!-- <button class="each active" onclick="step(event)">
                              <div class="each-title">Monthly: $11.9/month</div>
                              <div class="each-desc">7-day money-back guarantee. Cancel anytime.</div>
                            </button>

                            <button class="each" onclick="step(event)">
                              <div class="each-title">Annual: $41.9/year</div>
                              <div class="each-desc">Save 86% vs monthly. 7-day money-back guarantee. Cancel anytime</div>
                            </button>

                            <button class="each" onclick="step(event)">
                              <div class="each-title">Pay once: <del style="font-size:13px;">$21.3</del> $15.9</div>
                              <div class="each-desc">Save 25% vs annual. Billed once. 7-day monthday back guarantee</div>
                            </button> -->
                          </div>

                          <div id="pro" class="demo2">
                            <div class="box">
                              <span class="advanced">Advanced</span>
                              <h4><sup>$</sup>29.99<span><br>Save 50%</span></h4>
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
                            <!-- <button class="each active" onclick="step(event)">
                              <div class="each-title">Monthly: $22.9/month</div>
                              <div class="each-desc">7-day money-back guarantee. Cancel anytime.</div>
                            </button>

                            <button class="each" onclick="step(event)">
                              <div class="each-title">Yearly: $91.9/year</div>
                              <div class="each-desc">Save 72% vs monthly. 7-day money-back guarantee. Cancel anytime</div>
                            </button>

                            <button class="each" onclick="step(event)">
                              <div class="each-title">Pay once: <del style="font-size:13px;">$149.3</del> $74.9</div>
                              <div class="each-desc">Save 25% vs annual. Billed once. 7-day monthday back guarantee</div>
                            </button> -->
                          </div>
                        </div>
                    </div>
                    <div class="col form-group">
                      <div style="display:flex;margin-left:10px">
                        <span class="iconify text-register-icon" data-icon="mdi:email-send" data-inline="false"></span>
                        <input type="email" class="form-control text-register" name="email" id="email" placeholder="Your Email Address" data-rule="email" data-msg="Please enter a valid email" />
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div style="display:flex;margin-left:10px;">
                        <span class="iconify text-register-icon" data-icon="mdi:credit-card-settings" data-inline="false"></span>
                        <input type="text" class="form-control text-register" name="your-name" placeholder="Card Number">
                      </div>
                    </div>
               
                    <div class="text-center mt-3">
                      <button type="button" class="btn-join-invizz" id="btn_register" >
                        <div class="each-title">Join INVIZZ</div>
                        <!-- <div class="each-desc">Lite membership without social features</div> -->
                      </button>
                    </div>
                    
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="checkbox" style="float: left;margin-left: 30px;width: 30px;height: 20px;"><div class="confirm-terms">Check this to get sent new remote jobs in your email</div>
                        </div>
                        
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="confirm-terms" style="text-align:center">
                            <!-- Already a member? Log in. Questions? See the FAQ. Why isn't Nomad List free? By signing up, you agree to our terms of service (TOS) and privacy policy. -->
                        </div>
                        </div>
                    </div>

                  </div> 
                </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Modal Order Form -->
    <!-- <div id="register-modal" class="modal">
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
                        <img src="assets/img/testimonials/testimonials-1.jpg" class="circle-image"/>
                        <img src="assets/img/testimonials/testimonials-2.jpg" class="circle-image"/>
                        <img src="assets/img/testimonials/testimonials-3.jpg" class="circle-image"/>
                        <img src="assets/img/testimonials/testimonials-4.jpg" class="circle-image"/>
                        <img src="assets/img/testimonials/testimonials-5.jpg" class="circle-image"/>
                        <img src="assets/img/testimonials/testimonials-6.jpg" class="circle-image"/>
                        <img src="assets/img/testimonials/testimonials-7.jpg" class="circle-image"/>
                        <img src="assets/img/testimonials/testimonials-8.jpg" class="circle-image"/>
                        <img src="assets/img/testimonials/testimonials-9.jpg" class="circle-image"/>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                          <img src="assets/img/register-left.jpg" class="left-demo-image"/>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="desc"><p>
                          🌇 Get unlimited members-only access to the top 1,500+ cities in 195+ countries and research places to live and travel<p>
                          🥇 7-day money-back guarantee, not satisfied? Self refund and get your money back, no questions asked.<p>
                          🔍 Unlock hundreds of filters to pick destinations and find your perfect place to live and travel<p>
                          🌤 Use the Climate Finder to search cities based on future weather and air quality<p>
                          💸 Use the FIRE retirement tool to find places to retire early<p>
                          ⚠️ There's no guarantee becoming a nomad will solve your life's problems, since you can travel but you can't get away from yourself in the end
                        </div>
                        
                      </div>
                    </div>
                  </div> 

                  <div class="col-md-6 boundary">
                    <div class="row">
                        <div class="col-md-12">

                          <div class="tab">
                            <button class="demo left-btn each-title active" onclick="infofunc(event, 'lite')">Lite Membership</button>
                            <button class="demo right-btn each-title" onclick="infofunc(event, 'pro')">Pro Membership</button>
                          </div>

                          <div id="lite" class="demo2" style="display:block;">
                            <button class="each active" onclick="step(event)">
                              <div class="each-title">Monthly: $11.9/month</div>
                              <div class="each-desc">7-day money-back guarantee. Cancel anytime.</div>
                            </button>

                            <button class="each" onclick="step(event)">
                              <div class="each-title">Annual: $41.9/year</div>
                              <div class="each-desc">Save 86% vs monthly. 7-day money-back guarantee. Cancel anytime</div>
                            </button>

                            <button class="each" onclick="step(event)">
                              <div class="each-title">Pay once: <del style="font-size:13px;">$21.3</del> $15.9</div>
                              <div class="each-desc">Save 25% vs annual. Billed once. 7-day monthday back guarantee</div>
                            </button>
                          </div>

                          <div id="pro" class="demo2">
                            <button class="each active" onclick="step(event)">
                              <div class="each-title">Monthly: $22.9/month</div>
                              <div class="each-desc">7-day money-back guarantee. Cancel anytime.</div>
                            </button>

                            <button class="each" onclick="step(event)">
                              <div class="each-title">Yearly: $91.9/year</div>
                              <div class="each-desc">Save 72% vs monthly. 7-day money-back guarantee. Cancel anytime</div>
                            </button>

                            <button class="each" onclick="step(event)">
                              <div class="each-title">Pay once: <del style="font-size:13px;">$149.3</del> $74.9</div>
                              <div class="each-desc">Save 25% vs annual. Billed once. 7-day monthday back guarantee</div>
                            </button>
                          </div>
                        </div>
                    </div>
                    <div class="col form-group">
                      <input type="email" class="form-control text-register" name="email" id="email" placeholder="Your Email Address" data-rule="email" data-msg="Please enter a valid email" />
                      <div class="validate"></div>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control text-register" name="your-name" placeholder="Card Number">
                    </div>
               
                    <div class="text-center mt-3">
                      <button type="submit" class="btn-get-started scrollto btn-register" >
                        <div class="each-title">Join INVIZZ List - $13.42 once</div>
                        <div class="each-desc">Lite membership without social features</div>
                      </button>
                    </div>
                    
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="checkbox" style="float: left;margin-left: 30px;width: 30px;height: 20px;"><div class="confirm-terms">Check this to get sent new remote jobs in your email</div>
                        </div>
                        
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="confirm-terms" style="text-align:center">
                            Already a member? Log in. Questions? See the FAQ. Why isn't Nomad List free? By signing up, you agree to our terms of service (TOS) and privacy policy.
                        </div>
                        </div>
                    </div>

                  </div> 
                </div>
            </div>
          </div>
        </div>
      </div> -->

  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <h3>About <span>INVIZZ</span></h3>
          <p></p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3>INVIZZ is a collaboration platform designed to facilitate in-person collaboration between artists.</h3>
            <p class="font-italic">
            INVIZZ allows you to search, discover, engage, and collaborate with artists all over the globe. 
            Members can search their city or town, and receive full visibility and access to the diverse, eclectic community of artists living in their area.
            </p>
            <ul>
              <li>
                <i class="bx bx-store-alt"></i>
                <div>
                  <h5>INVIZZ artists include:</h5>
                  <p>Musicians, Painters, Dancers, Photographers, Filmmakers, Sculptors, Music Producers, YouTubers</p>
                </div>
              </li>
              <!-- <li>
                <i class="bx bx-images"></i>
                <div>
                  <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                  <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi</p>
                </div>
              </li> -->
            </ul>
            <p>

              &nbsp;&nbsp;&nbsp;&nbsp;Our dynamic map also highlights which artists are currently open to collaboration. 
              Artists can trigger their collab status to signal to others whether or not they are currently open to collaborating.<br>
              &nbsp;&nbsp;&nbsp;&nbsp;From there, INVIZZ members can direct message and engage with one another. 
              &nbsp;&nbsp;&nbsp;&nbsp;INVIZZ members also gain access to the INVIZZ community on Slack:<br> where artists share ideas, seek advice, and collaborate virtually with the entire global INVIZZ community!
              INVIZZ was created to simply make in-person collaboration easier. We thought it’d be cool for artists to have the ability to engage online and then link up in person.
              Collaboration is the #1 method to increase your exposure and overall quality of art.<br>
              &nbsp;&nbsp;&nbsp;&nbsp;Do your art a favor. Invest in yourself. Join the INVIZZ community today.
            </p>
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
                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
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
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
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
                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
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
                <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
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
          <p>Save up to 50% on annual plans. Cancel within your first 7 days and receive a full-refund.</p>
        </div>

        <div class="pricing-container">
          <div class="row">

            <div class="col-lg-6 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
              <div class="box">
                <h3>Monthly Membership</h3>
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
                <div class="btn-wrap">
                  <a href="#" class="btn-buy" data-bs-toggle="modal" data-bs-target="#register-modal" data-ticket-type="premium-access">Buy Now</a>
                  
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
              <div class="box">
                <span class="advanced">Advanced</span>
                <h3>Annual Membership</h3>
                <span class="advanced">Advanced</span>
                  <h4><sup>$</sup>29.99<span><br>Save 50%</span></h4>
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
                <div class="btn-wrap">
                  <a href="#" class="btn-buy"  data-bs-toggle="modal" data-bs-target="#register-modal" data-ticket-type="premium-access">Buy Now</a>
                </div>
              </div>
            </div>
          </div>
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
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>A108 Elfreth's Alley, Philadelphia, NY 535022</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>contact@example.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+1 5589 55488 55</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6 ">
            <div style="width: 100%"><iframe width="100%" height="384" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=384&amp;hl=en&amp;q=philadelphia+(INVIZZ)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.maps.ie/route-planner.htm">Google Route Planner</a></div>
          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
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
            <p>
              A108 Elfreth's Alley Street <br>
              Philadelphia, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>



          <div class="col-lg-6 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
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

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/custome.js"></script>
  <script src="assets/js/homepage.js"></script>
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
 
@endsection