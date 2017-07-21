@extends('main')

@section('title', '| Profile')


@section('content')

	<section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">{{ $user->name }}'s profile</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->
	
	  <section id="portfolio-information" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-offset-1" style="border-right:2px solid #e3e3e3; ">
                    <img src="{{ preg_match('/https/', $user->avatar)  ? $user->avatar : asset('images/user-profile/'. $user->avatar ) }}" class="img-responsive" height="500px" width="500px" alt="{{$user->name}}">

                        <h2>{{ $user->info }}</h2>
                        <p>

                            @if( Auth::check() )

                                @if( $user->id == Auth::id() )
                                        {!! Html::linkRoute('profile.edit', 'Update' , array($user->id), array('class' => 'btn btn-sm btn-primary') ) !!} 
                                @endif
                            @endif

                        </p>
                </div>
                <div class="col-sm-6 col-md-offset-2">
                    <div class="project-name overflow">
                        <h1 class="bold">{{ $user->name }}</h1>
                        <!-- <ul class="nav navbar-nav navbar-default">
                            <li><i class="fa fa-tag"></i>{{ $user->email }}</li>
                        </ul> -->
                        <h2 class="bold"><i class="fa fa-envelope"></i> {{ $user->email }}</h2>
                    </div><br>
                    <div class="project-name overflow">
                        <!-- <ul class="nav navbar-nav navbar-default">
                            <li><b>Posts:</b> {{ $posts->total() }} </li><br>
                            <li><b>Total views:</b> {{$total_view}} </li><br>
                            <li><b>Editor In:</b> @foreach($categories as $category)
                            <i><a href="#">{{$category}} /</a></i>
                            @endforeach
                             </li>
                        </ul> -->
                        <h2 class="blod"><b>Posts:</b> {{ $posts->total() }} </h2>
                        <h2 class="blod"><b>Total views:</b> {{$total_view}} </h2>
                        <h2 class="blod"><b>Joined Since:</b> {{$user->created_at}} </h2>
                        <h2 class="blod"><b>Social on:</b> 
                        @if($user->facebook !=null )
                        <a href="{{$user->facebook}}" title="FACEBOOK"><i class="fa fa-facebook-official" aria-hidden="true"></i></a> 
                        @endif
                        @if($user->twitter !=null )
                        <a href="{{$user->twitter}}" title="TWITTER"><i class="fa fa-twitter" aria-hidden="true"></i> </a>
                        @endif
                        @if($user->instagram !=null )
                        <a href="{{$user->instagram}}" title="INSTAGRAM"><i class="fa fa-instagram" aria-hidden="true"></i></a> 
                        @endif
                        @if($user->tumblr !=null )
                        <a href="{{$user->tumblr}}" title="TUMBLR"><i class="fa fa-tumblr-square" aria-hidden="true"></i></a> 
                        @endif
                        @if($user->youtube !=null )
                        <a href="{{$user->youtube}}" title="YOUTUBE"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                        @endif
                        </h2>
                    </div>
                    <div class="project-info overflow">
                        
                    </div>
                                        
                </div>
            </div>
        </div>
    </section>
     <!--/#portfolio-information-->
     
     <section id="portfolio-information" >
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-offset-2" style="border-top: 2px solid #e3e3e3;">
                    <div class="editor">
                        <h1>Editor In:</h1>
                         @foreach($categories as $category)
                                <h3 class="cat-box">{{$category}}</h3>
                            @endforeach
                    </div> 
                </div>
            </div>
        </div>
                    <hr>   
    </section>
     <!--/#portfolio-information-->
     

     <section id="blog" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                	<h1 class="title padding-bottom">{{$user->name}}'s Posts:</h1>

                    @foreach( $posts as $post )
                         <div class="col-md-6 col-sm-12 blog-padding-right">
                            <div class="single-blog two-column">
                                <div class="post-thumb">
                                    <a href="{{ route('posts.show',$post->id) }}">
                                    @if($post->image == null)
                                    <img src=" {{ asset('images/blog/blog-default.jpg') }} " class="img-responsive" alt="default-image" height="270" width="480" />

                                    @else
                                    <img src="{{asset('/images/blog/' . $post->image)}}" class="img-responsive" alt="{{$post->title}}">
                                    @endif
                                    </a>
                                    <div class="post-overlay">
                                        <span class="uppercase"><a href="{{ route('blog.single', $post->slug) }}"><small>{{$post->created_at->diffForHumans() }}</small></a></span>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="{{ route('posts.show',$post->id) }}">{{ $post->title }}</a></h2>
                                    <h3 class="post-author"><a href="{{ '/profile/'. $post->user_id }}">Posted by {{ $user->where('id',$post->user_id)->pluck('name')->first() }}</a></h3>
                                    <p> {{ substr(strip_tags($post->body), 0 ,250) }} {{ strlen(strip_tags($post->body)) >250 ? '...' : '' }} </p>
                                    <a href="{{ route('blog.single', $post->slug) }}" class="read-more">View More</a>
                                    <div class="post-bottom overflow">
                                        <ul class="nav nav-justified post-nav">
                                            <li><a href="{{'/categories/'.$post->category->id }}"><i class="fa fa-tag"></i>{{ $post->category->name }}</a></li>
                                            <li><a href="{{ route('posts.show',$post->id) }}"><i class="fa fa-eye"></i>{{ $post->views }} Views</a></li>
                                            <li><a href="{{ route('posts.show',$post->id) }}"><i class="fa fa-comments"></i>3 Comments</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <div class="blog-pagination">
                        <ul class="pagination">
                          {!! $posts->links(); !!}
                        </ul>
                    </div>
                 </div>
                <div class="col-md-3 col-sm-5">
                        
                        <div class="sidebar-item popular">
                            <h3>Advertisment</h3>
                            
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->

	
	


@endsection