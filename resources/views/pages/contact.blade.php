
@extends('main')

@section('title' , '| Contact')

@section('description', 'contact tweBox')

@section('content')

  <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Contact US</h1>
                            <p>Stay close</p>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <section id="services">
        <div class="container padding-top padding-bottom">
            <div class="row">
               <h2 class="head">Mail us</h2> 
              <form action=" {{ url('contact') }} " method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                  <!-- <label name="email">Email :</label> -->
                  <input type="email" id="email" name="email" class="form-control" placeholder="Your Email">
              </div>

              <div class="form-group">
                  <!-- <label name="subject">Subject :</label> -->
                  <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject">
              </div>

              <div class="form-group">
                  <!-- <label name="message">Message :</label> -->
                  <textarea placeholder="Write Your message here..." id="message" name="message" class="form-control" placeholder="Write your message here..."  ></textarea>
              </div>

                  <input type="submit" name="submit" value="Send Message" class="btn btn-lg btn-success">
              </form>

            </div>
        </div>
    </section><hr>
    <!--/#services-->

    <section class="services">
      <div class="container padding-bottom">
        <h2 class="head">Avertise with us</h2>
          <p>For all advertising inquiries, please contact:</p>
          <address class="address">
            BTM Layout,<br>
            Bengaluru, Karnataka <br>  
            <a href="mailto:example@email.com">Mail : example@email.com</a> <br>
          </address>
      </div>
    </section>

@endsection