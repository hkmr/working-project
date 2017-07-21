@extends('main')

@section('title', '| Tags')


@section('content')

	<section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Categories</h1>
                            <p>Blog with right sidebar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#page-breadcrumb-->

	<section id="company-information" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="about-us">
                    <div class="col-sm-7 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <h2 class="bold">Your Tags</h2>
                        <div class="row padding-bottom">
                            
                            @foreach($tags as $tag)

                            <div class="tag-box">
                                <h3> {{ $tag->name }} </h3>
                            </div>

                            @endforeach
                        </div>

                    </div>
                    <div class="col-sm-5 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <div class="our-skills">
                            <h2 class="bold">Create New Category</h2>
                            
                            {!! Form::open([ 'route' => 'tags.store', 'method' => 'POST' ]) !!}
								
								{{ Form::label('name', 'Name:') }}
								{{ Form::text('name', null, ['class' => 'form-control']) }}<br>

								{{ Form::submit('Create', ['class' => 'btn btn-primary btn-block']) }}

							{!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tags -->

@endsection