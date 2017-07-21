@extends('main')

@section('title', '| Profile-edit')


@section('content')
	<link rel="stylesheet" href="/css/croppie.css" />
	<script src="/js/croppie.js"></script>

	<section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Profile Update</h1>
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
			{!! Form::model($user , ['route' => ['profile.update', $user->id] ,'method' => 'PUT' ,'files' => true ]) !!}

			<div class="col-md-8 col-md-offset-2 padding-bottom">
				{{ Form::label('name', 'UserName:') }}
				{{ Form::text('name',null, ['class'=> 'form-control input-lg', 'readonly'] ) }}

				{{ Form::label('email', 'Email:' ,['class'=> 'form-spacing-top']) }}
				{{ Form::text('email', null, ['class'=> 'form-control ', 'readonly']) }}

				{{ Form::label('avatar','Upload Profile Image:', ['class' => 'form-spacing-top', 'id'=>'profile_image']) }}
				{{ Form::file('avatar') }}

				<h2>Social Connect </h2>
				<ul class="social-links">
					
				<li>
				{{ Form::label('facebook', 'Facebook link:' ,['class'=> 'form-spacing-top']) }}
				{{ Form::text('facebook', null, ['class'=> 'form-control', 'placeholder' => 'https://facebook.com/user_name' ]) }}
				</li>

				<li>
				{{ Form::label('twitter', 'Twitter link:' ,['class'=> 'form-spacing-top']) }}
				{{ Form::text('twitter', null, ['class'=> 'form-control', 'placeholder' => 'https://twitter.com/user_name' ]) }}
				</li>

				<li>
				{{ Form::label('instagram', 'Instagram link:' ,['class'=> 'form-spacing-top']) }}
				{{ Form::text('instagram', null, ['class'=> 'form-control', 'placeholder' => 'https://instagram.com/user_name' ]) }}
				</li>

				<li>
				{{ Form::label('tumblr', 'Tumblr link:' ,['class'=> 'form-spacing-top']) }}
				{{ Form::text('tumblr', null, ['class'=> 'form-control', 'placeholder' => 'https://tumblr.com/user_name' ]) }}
				</li>

				<li>
				{{ Form::label('youtube', 'Youtube link:' ,['class'=> 'form-spacing-top']) }}
				{{ Form::text('youtube', null, ['class'=> 'form-control', 'placeholder' => 'https://youtube.com/user_name' ]) }}
				</li>

				</ul>

				{{ Form::label('info', 'User Description:',['class'=> 'form-spacing-top' ]) }}
				{{ Form::textarea('info', null, ['class' => 'form-control ', 'required']) }}

				<div class="row padding-top">
					<div class="col-sm-6">
						{!! Html::linkRoute('profile.show', 'Cancel' , array($user->id), array('class' => 'btn btn-danger btn-block') ) !!} 
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
						
						
					</div>
				</div>

			</div>

			{!! Form::close() !!}
		</div>
	</div>
	</section>

	<script type="text/javascript">
		$('#profile_image').croppie(opts);
		// call a method via jquery
		$('#profile_image').croppie(method, args);
	</script>

@endsection
