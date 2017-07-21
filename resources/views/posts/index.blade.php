@extends('main')

@section('title','| All Posts')


@section('content')
	
	<section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Your Blogs</h1>
                            <p>Share your Blogs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#page-breadcrumb-->

	<section id="blog" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row grid">

                    	@foreach($posts as $post)
                         <div class="col-sm-12 col-md-12 grid-item">
                            <div class="single-blog single-column">
                                <div class="post-thumb">
                                    <a href="{{ route('posts.show',$post->id) }}">
                                    @if($post->image == null)
                                    <!-- <img src=" {{ asset('images/blog/blog-default.jpg') }} " class="img-responsive" alt="default-image" height="270" width="480" /> -->

                                    @else
                                    <img src="{{asset('/images/blog/' . $post->image)}}" class="img-responsive" alt="{{$post->title}}">
                                    @endif
                                    </a>
                                    <div class="post-overlay">
                                       <span class="uppercase"><a href="{{ route('posts.show',$post->id) }}"><small>{{ $post->created_at->diffForHumans() }}</small></a></span>
                                   </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="{{ route('posts.show',$post->id) }}">{{ $post->title}}</a></h2>
                                    <h3 class="post-author"><a href="{{ '/profile/'. $post->user_id }}">Posted by {{ $user->where('id',$post->user_id)->pluck('name')->first() }}</a></h3>
                                    <p>{{ substr(strip_tags($post->body),0,50)}} {{ strlen(strip_tags($post->body)) >50 ? "..." : "" }}</p>
                                    <a href="{{ route('posts.show',$post->id) }}" class="read-more">View More</a>
                                    <div class="post-bottom overflow">
                                        <ul class="nav navbar-nav post-nav">
                                            <li><a href="{{'/categories/'.$post->category->id }}"><i class="fa fa-tag"></i>{{ $post->category->name }}</a></li>
                                            <li><a href="{{ route('blog.single', $post->slug) }}"><i class="fa fa-eye"></i>{{ $post->views }} Views</a></li>
                                            <li><a href="{{ route('posts.show',$post->id) }}"><i class="fa fa-comments"></i>{{ $post->comments()->count() }} Comments</a></li>
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
                    <a href=" {{route('posts.create')}} " class="btn btn-submit">Create New Post</a><hr>
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
                                <li><a href="{{'categories/'. $category->id }}">{{ $category->name }}<span class="pull-right">({{ $posts->where('category_id', $category->id)->count() }})</span></a></li>
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