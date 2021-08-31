    <!-- Modal Order Form -->
    <div id="register-modal" class="modal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Registers</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- <form method="POST" action="#"> -->

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
                
              <!-- </form> -->
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->