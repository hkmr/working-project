<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center bottom-separator">
                <img src="/images/home/under.png" class="img-responsive inline" alt="">
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="testimonial bottom">
                    <div class="media">
                        <div class="pull-left" style="padding-top: 30px;">
                            <a href="/">
                            <p class="logo">twe<span class="logo-span"><b>Box</b></span> </p>
                            </a>
                        </div>
                        <div class="media-body">
                            <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</blockquote>
                        </div>
                     </div> 
                </div> 
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="contact-info bottom">
                    <h2>Contacts</h2>
                    <address>
                    E-mail: <a href="/contact">email@email.com</a> <br>  
                    </address>

                    <h2>Address</h2>
                    <address>
                    BTM Layout, <br> 
                    Bengaluru, Karnataka <br> 
                    </address>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="contact-form bottom">
                    <h2>Subscribe</h2>
                    <!-- <form id="main-contact-form" name="contact-form" method="POST" action="{{ route('subscribe.store') }}">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email Id">
                        </div>                        
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                        </div>
                    </form> -->

                    {!! Form::open([ 'route' => 'subscribe.store', 'method' => 'POST' ]) !!}
                                <div class="form-group">
                                {{ Form::text('email', null, ['class' => 'form-control', 'required'=>'required','placeholder'=>'Email Id']) }}<br>
                                </div>
                                <div class="form-group">
                                {{ Form::submit('Submit', ['class' => 'btn btn-submit']) }}
                                </div>

                    {!! Form::close() !!}

                </div>
            </div>
            <div class="col-sm-12">
                <div class="copyright-text text-center">
                    <p><a >&copy; Your Company 2017. All Rights Reserved.</a></p>
                    <p><a target="_blank" href="/terms">Terms and conditions</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/#footer-->