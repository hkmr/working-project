
<header id="header" id="navigation_bar">      
      <div class="container">
          <div class="row">
              <div class="col-sm-12 overflow">
                 <div class="social-icons pull-right">
                      <ul class="nav nav-pills">
                          <li><a >FOLLOW : </a></li>
                          <li><a target="_blank" title="Follow On Facebook" href="https://www.facebook.com/TweBox-688858734631797/"><i class="fa fa-facebook"></i></a></li>
                          <li><a target="_blank" title="Follow On Twitter" href="https://twitter.com/BoxTwe"><i class="fa fa-twitter"></i></a></li>
                          <li><a target="_blank" title="Follow On Google" href="https://plus.google.com/u/0/109363514153639612798"><i class="fa fa-google-plus"></i></a></li>
                          <li><a target="_blank" title="Follow On Instagram" href="https://plus.google.com/u/0/109363514153639612798"><i class="fa fa-instagram"></i></a></li>
                      </ul>
                  </div> 
              </div>
           </div>
      </div>
      
      <div class="navbar navbar-inverse" role="banner">
          <div class="container">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>

                  <a class="navbar-brand" href="/">
                      <p class="logo">twe<span class="logo-span"><b>BOX</b></span> </p>
                  </a>
                  
              </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="{{Request::is('/') ? 'active' : ''}}" id="element1"><a href="/" title="Home">Home</a></li>
                    <li class="{{Request::is('blog') ? 'active' : ''}}" id="element2"><a href="/blog" title="Blogs">Blogs</a></li>
                    <li class="{{Request::is('about') ? 'active' : ''}}"><a href="/about" title="About">About</a></li>
                    <li class="{{Request::is('contact') ? 'active' : ''}}"><a href="/contact" title="Contact">Contact</a></li>
                    @if ( Auth::check() )
                    <li class="dropdown"><a href="#" title="User"><img src="{{ preg_match('/https/', $user->avatar)  ? $user->avatar : asset('images/user-profile/'. $user->avatar ) }}" class="img-responsive" height="37px" width="37px"  alt="{{$user->name}}"> <i class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="sub-menu">
                            <li><a href="{{ '/profile/'.Auth::user()->id }}">Profile</a></li>
                            <li><a href="{{ route('posts.create') }}">Write Story</a></li>
                            <li><a href="{{ route('posts.index') }}">My Stories</a></li>
                            <li><a href="{{ route('categories.index') }}">All Categories</a></li>
                            <li><a href="{{ route('tags.index') }}">All Tags</a></li>
                            <hr>
                            <li><a href="{{route('logout')}}">Logout</a></li>
                        </ul>
                    </li>  
                    @else
                    <!-- <li class="dropdown"><a href="#">Users<i class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="sub-menu"> -->
                            <li><a href="{{ route('login') }}">Login/Signup</a></li>
                        <!-- </ul>
                    </li>  -->
                    @endif
                </ul>
            </div>
              <div class="search">
                  <form role="form">
                      <i class="fa fa-search"></i>
                      <div class="field-toggle">
                      <!-- Google custom search  -->
                          <script>
                            (function() {
                              var cx = '005163409016394400662:aifkqrckegk';
                              var gcse = document.createElement('script');
                              gcse.type = 'text/javascript';
                              gcse.async = true;
                              gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                              var s = document.getElementsByTagName('script')[0];
                              s.parentNode.insertBefore(gcse, s);
                            })();
                          </script>
                          <gcse:search></gcse:search>

                      </div>
                  </form>
              </div>
          </div>
      </div>
  </header>
  <!--/#header -->

  <div id="mySidenav" class="sidenav">
    <button id="myBtn">Send Feedback</button>
  </div>

  <!-- The Modal -->
<div id="feedback-modal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h1>Submit your suggestion</h1>
    </div>
    <div class="modal-body">
      <!-- <form action="">
        <input type="text" name="userName" placeholder="your name">
        <input type="text" name="email" placeholder="email address" /><br>
        <textarea name="massage" placeholder="your suggestion here..."></textarea>
        <input type="submit" name="Submit">
      </form> -->
      {!! Form::open([ 'route' => 'feedback.store', 'method' => 'POST' ]) !!}
          <div class="form-group">
          {{ Form::text('username', null, ['class' => 'form-control', 'required'=>'required','placeholder'=>'user name *']) }}<br>
          </div>
          <div class="form-group">
          {{ Form::text('email', null, ['class' => 'form-control', 'required'=>'required','placeholder'=>'email address *']) }}<br>
          </div>
          <div class="form-group">
          {{ Form::textarea('message', null, ['class' => 'form-control', 'required'=>'required','placeholder'=>'your suggestion here... *']) }}<br>
          </div>
          <div class="form-group">
          {{ Form::submit('Submit', ['class' => 'btn btn-submit']) }}
          </div>

        {!! Form::close() !!}
    </div>
   <!--  <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div> -->
  </div>

</div>

