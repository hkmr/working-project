@extends('main')

@section('title', '| Edit Post')

@section('description', 'edit your twebox posts')

@section('stylesheets')

	{!! Html::style('css/select2.min.css') !!}
	{!! Html::style('css/image.min.css') !!}
	{!! Html::style('css/froala_style.min.css') !!}
	{!! Html::style('css/froala_editor.pkgd.min.css') !!}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">



@endsection


@section('content')
	
	<section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Edit Posts</h1>
                            <p>Make Changes</p>
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
                <div class="col-sm-9">
                    
                    {!! Form::model($post , ['route' => ['posts.update', $post->id] ,'method' => 'PUT' ,'files' => true ]) !!}

                    {{ Form::label('title', 'Title:') }}
					{{ Form::text('title',null, ['class'=> 'form-control input-lg'] ) }}

					{{ Form::label('category_id', 'Category:',['class'=> 'form-spacing-top' ]) }}
					{{ Form::select('category_id', $categories, null, ['class' => 'form-control ']) }}

					{{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
					{{ Form::select('tags[]' , $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

					{{ Form::label('featured_image','Update cover Image:', ['class' => 'form-spacing-top']) }}
					{{ Form::file('featured_image') }}

					{{ Form::label('body', 'Body:' , ['class'=> 'form-spacing-top' ]) }}
					{{ Form::textarea('body', null, ['class'=> 'form-control'] ) }}

                </div>

					<div class="col-md-3 col-sm-5">
	                    <div class="sidebar blog-sidebar">
	                        <div class="sidebar-item  recent">
	                            <div class="media">
	                                {{ date('j M, Y h:ia',strtotime($post->created_at) ) }}
	                            </div>
	                            <div class="media">
	                                {{ date('j M, Y h:ia',strtotime($post->updated_at) ) }} 
	                            </div>
	                            <div class="media">
	                                {!! Html::linkRoute('posts.show', 'Cancel' , array($post->id), array('class' => 'btn btn-danger btn-block') ) !!}
	                            </div>
	                            <div class="media">
	                            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
	                            </div>
	                        </div>
	                        
	                        <div class="sidebar-item tag-cloud">
	                            <h3>Advertisment</h3>
	                            
	                        </div>
	                    </div>
	                </div>


					{!! Form::close() !!}

            </div>
        </div>
    </section>

@endsection

@section('scripts')

	{!! Html::script('js/select2.min.js') !!}
	{!! Html::script('js/image.min.js') !!}
	<!-- {!! Html::script('js/froala_editor.min.js') !!} -->
	{!! Html::script('js/froala_editor.pkgd.min.js') !!}
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>

	<script type="text/javascript">
		$(".select2-multi").select2();
		$(".select2-multi").select2().val( {!! json_encode($post->tags()->allRelatedIds()) !!} ).trigger('change');

		$(function() { $('textarea').froalaEditor() });
	</script>

@endsection
