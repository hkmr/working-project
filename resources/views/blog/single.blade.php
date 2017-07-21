@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', '| '.$titleTag )

@section('og-url', route('blog.single', $post->slug) )

@section('og-title', $post->title )

@section('og-description', $post->category->name )

@section('og-image', asset('/images/blog/' . $post->image) )

@section('description', $post->title.','.$post->category->name.','.$post->tags->pluck('name') )


@section('content')
    
    <!-- facebook plugin -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!-- facebook plugin ends -->

	<section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">{{ $post->title }}</h1>
                            <p>{{$post->created_at->format('d-M-Y')}}</p>
                        </div>                                                                                
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#page-breadcrumb-->

	<section id="blog-details" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                            <div class="single-blog blog-details two-column">
                                <div class="post-thumb">
                                    <a href="{{ route('blog.single', $post->slug) }}">
                                    @if($post->image == null)
									<!-- <img src=" {{ asset('images/blog/blog-default.jpg') }} " alt="default-image" class="img-responsive" /> -->

									@else
									<img src="{{asset('/images/blog/' . $post->image)}}" class="img-responsive" />

									@endif
                                    </a>
                                    <div class="post-overlay">
                                        <span class="uppercase"><a href="#"><small>{{$post->created_at->diffForhumans() }}</small></a></span>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="{{ route('blog.single', $post->slug) }}"> {{ $post->title }} </a></h2>
                                    <h3 class="post-author"><a href="{{ '/profile/'. $post->user_id }}">Posted by {{ $user->where('id',$post->user_id)->pluck('name')->first() }}</a></h3>
                                    <div class="fr-view post-body">
                                    <p >{!! $post->body !!}</p>
                                    </div>
                                    <div class="post-bottom overflow">
                                        <ul class="nav navbar-nav post-nav">
                                            <li><a href="{{'/categories/'.$post->category->id }}"><i class="fa fa-tag"></i>{{ $post->category->name }}</a></li>
                                            <li><a href="{{ route('blog.single', $post->slug) }}"><i class="fa fa-eye"></i>{{ $post->views }} Views</a></li>
                                            <li><a href="#comments"><i class="fa fa-comments"></i>{{ $post->comments()->count() }} Comments</a></li>
                                        </ul>
                                        <ul class="nav navbar-nav post-nav">
                                            
                                                <li>
                                                @foreach( $post->tags as $tag)
                                                    <span class="label label-default">{{$tag->name}}</span>
                                                @endforeach
                                                </li>
                                                <li>
                                                    <span class='st_facebook_hcount'></span>
                                                </li>
                                        </ul>
                                    </div>

                                        <!-- share on media -->
                                    <div class="blog-share">
                                        
                                        <span>
                                            <div class="fb-share-button" data-href="{{ route('blog.single', $post->slug) }}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
                                        </span>
                                        
                                        <span>
                                            <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                        </span>

                                    </div>

                            <div class="response-area" id="comments">
                                    <h2 class="bold pageInfo">Comments :</h2>

                                    @if( Auth::check() )

									<div class="row padding-bottom">
										<div id="comment-form" class="col-md-8 col-md-offset-2 form-spacing-top">
											{{ Form::open(['route' => ['comments.store', $post->id ], 'method' => 'POST']) }}

												<div class="row">
													
													<div class="col-md-12">
														{{ Form::textarea('comment',null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Enter Your comment here..']) }}
														<br>
														{{ Form::submit('Add Comment', ['class' => 'btn btn-lg btn-success']) }}
													</div>
												</div>

											{{ Form::close() }}
										</div>
									</div>

								@else

								<div class="row padding-bottom">
										<div id="comment-form" class="col-md-8 col-md-offset-2 form-spacing-top">
											{{ Form::open(['route' => ['comments.store', $post->id ], 'method' => 'POST']) }}

												<div class="row">
													<div class="col-md-6">
														{{ Form::label('name','Name:') }}
														{{ Form::text('name', null, ['class' => 'form-control']) }}
													</div>

													<div class="col-md-6">
														{{ Form::label('email', 'Email:') }}
														{{ Form::text('email', null, ['class' => 'form-control']) }}
													</div>

													<div class="col-md-12">
														{{ Form::label('comment','Comment:') }}
														{{ Form::textarea('comment',null, ['class' => 'form-control', 'rows' => '5']) }}<br>

														{{ Form::submit('Add Comment', ['class' => 'btn btn-lg btn-success']) }}
													</div>
												</div>

											{{ Form::close() }}
										</div>
									</div>

								@endif
							<!-- End comment form -->

                                    <ul class="media-list">
                                    	@foreach( $post->comments as $comment )
                                        <li class="media">
                                            <div class="post-comment">
                                                <div class="media-body">
                                                    <span><i class="fa fa-user"></i>comment by <a href="{{ '/profile/'. $comment->user_id }}">{{ $comment->name }}</a></span>
                                                    <p>{{ $comment->comment }}</p>
                                                    <ul class="nav navbar-nav post-nav">
                                                        <li><i class="fa fa-clock-o"></i>{{ $comment->created_at->diffForHumans() }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach                                      
                                    </ul>                   
                                	</div><!--/Response-area-->

                                	
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                            <h3>Popular Posts</h3>
							@foreach($populars as $post)
                            <div class="media">
                                <div class="pull-left">
                                    <a href="{{ route('blog.single', $post->slug) }}">
                                    @if($post->image == null)
                                    <img src=" {{ asset('images/blog/blog-default.jpg') }} " alt="default-image" height="52" width="52" />
                                    @else
                                        <img src=" {{ asset('images/blog/'. $post->image) }} " alt="{{$post->name}}" height="52" width="52" />
                                    @endif
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="{{ route('blog.single', $post->slug) }}">{{ substr(strip_tags($post->title), 0 ,50) }} {{ strlen(strip_tags($post->body)) >30 ? '...' : '' }}</a></h4>
                                    <p>posted {{$post->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="sidebar-item categories">
                            <h3>Categories</h3>
                            <ul class="nav navbar-stacked">
                              @foreach( $categories as $category)
                                <li><a href="{{'/categories/'. $category->id }}">{{ $category->name }}<span class="pull-right">{{ $posts->where('category_id', $category->id)->count() }}</span></a></li>
                              @endforeach
                            </ul>
                        </div>
                        <div class="sidebar-item tag-cloud">
                            <h3>Advertisment</h3>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->

@endsection