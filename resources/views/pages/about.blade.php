
@extends('main')

@section('title' , '| About')

@section('description', 'about tweBox')

@section('content')
 
  <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">About Us</h1>
                            <p>What we provide</p>
                        </div>
                     </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#page-breadcrumb-->

    <section id="about-company" class="padding-top wow fadeInUp" data-wow-duration="400ms" data-wow-delay="400ms">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <!-- <img src="images/aboutus/simple-logo.png" class="margin-bottom" alt="">
                    <h1 class="margin-bottom">myhexagon</h1> -->
                    <p class="margin-bottom" style="font-family: 'Economica', sans-serif; font-size: 40px; color: black;"><!-- <img src="/images/logo.png" width="300px" alt="logo"> -->twe<span style="color: #5894f4; border:2px solid black; border-radius: 20%; padding: 1%;"><b>Box</b></span> </p>
                    <p class="about">Our mission: To give everyone the power to create and share ideas and information instantly, without barriers.</p>
                </div>
            </div>
        </div>
    </section>
    <!--/#about-company-->
    <hr>

    <section id="services">
        <div class="container">
            <div class="row">
                <center><h2>THREE SIMPLE STEPS</h2></center>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                            <!-- create icon-->
                            <img class="icon icons8-Create-New" width="80" height="80" src="data:image/png;base64,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">
                        </div>
                        <h1>CREATE</h1>
                        <p>WRITE WHATS ON YOUR MIND </p>
                        <a href="#create">learn more</a>
                    </div>
                </div>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                            <!-- share icon -->
                            <img class="icon icons8-Share" width="100" height="100" src="data:image/png;base64,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">

                        </div>
                        <h1>SHARE</h1>
                        <p>SHARE YOUR WORK WITH PEOPLES</p>
                        <a href="#share">learn more..</a>
                    </div>
                </div>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                            <!-- earn icon -->
                            <img class="icon icons8-Money-Box" width="128" height="128" src="data:image/png;base64,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">
                        </div>
                        <h1>EARN</h1>
                        <p>MONITIZE WHAT YOU DO</p>
                        <a href="#earn">learn more..</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#services-->

    <section id="services" >
        <div class="container padding-top padding-bottom" id="create">
            <div class="row">
              
              <h1><span class="large-hash">#</span> Create your account and share your stories and voices to world </h1>
              <p class="about-para">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
              <hr>
            </div>
        </div>
    </section>
    <!--/#services-->

    <section id="services" >
        <div class="container padding-top padding-bottom" id="share">
            <div class="row">
              
              <h1><span class="large-hash">#</span> Share what you done with peoples around the world</h1>
              <p class="about-para">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
              <hr>
            </div>
        </div>
    </section>
    <!--/#services-->

    <section id="services" >
        <div class="container padding-top padding-bottom" id="earn">
            <div class="row">
              
              <h1><span class="large-hash">#</span>Get gift cards for your stories</h1>
              <p class="about-para">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>

            </div>
        </div>
    </section>
    <!--/#services-->

@endsection
