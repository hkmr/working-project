@extends('main')

@section('title','| Create New Post')

@section('description', 'create new post in tweBox')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}
	<!-- {!! Html::style('css/image.min.css') !!} -->
	<!-- {!! Html::style('css/froala_style.min.css') !!} -->
	<!-- {!! Html::style('css/froala_editor.pkgd.min.css') !!} -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css"> -->


@endsection

@section('content')

	<section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Create New Posts</h1>
                            <p>Be Creative</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

	<section id="portfolio-information" class="padding-top padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-10">
                    
                    {!! Form::open(array('route' => 'posts.store' , 'data-parsley-validate' => '', 'files' => true)) !!}

                    <div class="form-group">
					{{ Form::label('title','Title:') }}
					{{ Form::text('title', null, array('class' => 'form-control' , 'required' => '' ,
					'maxlength' => '255')) }}
					</div>

					<div class="form-group">
					{{ Form::label('category_id', 'Category:') }}
					<select class="form-control" name='category_id'>
					</div>

					@foreach ($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
					</select>
					</div>

					<div class="form-group">
					{{ Form::label('tags', 'Tags:') }}
					<select class="form-control select2-multi" name='tags[]' multiple="multiple">

					@foreach ($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
						
					</select>
					</div>

					{{ Form::label('featured_image','Add cover Image') }}
					{{ Form::file('featured_image') }}

					<div class="form-group">
					{{ Form::label('body','Post Body:') }}
					{{ Form::textarea('body', null, array('class' => 'form-control','id'=>'post-body')) }}
					</div>

					{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block' ,'style' => 'margin-top:20px;')) }}
				{!! Form::close() !!}

                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
	{<!-- !! Html::script('js/image.min.js') !!}
	{!! Html::script('js/froala_editor.min.js') !!}
	{!! Html::script('js/froala_editor.pkgd.min.js') !!}
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script> -->
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<!-- <script src="/js/tiny/theme.js"></script> -->


	<script type="text/javascript">
		// for tags selector
		$(".select2-multi").select2({placeholder: "Select Your Tags."});

		// // for froala editor
		// $(function() { $('textarea').froalaEditor() });

		// $(function() {
	 //      $('#edit').froalaEditor({
	 //        // Set the file upload URL.
	 //        imageUploadURL: route('post.store'),
	 
	 //        imageUploadParams: {
	 //          id: 'my_editor'
	 //        }
	 //      })
	 //    });


	 tinymce.init({
		  selector: 'textarea',  
		  // plugin: 'a_tinymce_plugin',
		  // a_plugin_option: true,
		  // a_configuration_option: 400,
		  // inline: true
		   menubar: false,
		   content_css: [
    '/css/font-select.css']
		});

	</script>


	 
@endsection