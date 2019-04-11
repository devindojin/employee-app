@extends('layouts.main')

@section('title', 'user info step 1')

@section('content')
<div class="col-xs-12">
	<h2 class="heading">Votre CV</h2>
</div>
<div class="col-xs-12">
	<div class="well well-lg custom_well">
		<div class="well_heading">
			<h3>AJOUTEZ VOTRE CV</h3>
		</div>
		<form action="" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
			@include('partials.validation')
			<div class="panel_form">
				<p class="default_text">Déposez votre cv afin de pouvoir commencer à postuler aux offres et étre vus par les recruteurs</p>
				<div class="form-group text-center">
					<label for="">DÉPOSER UIN CV AVIC:</label>
					<div class="dropzone">
						<div id="dropzone">
							<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="mobile-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-mobile-alt fa-w-10 fa-3x"><path fill="currentColor" d="M192 416c0 17.7-14.3 32-32 32s-32-14.3-32-32 14.3-32 32-32 32 14.3 32 32zm32-320H96v240h128V96m20-32c6.6 0 12 5.4 12 12v280c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h168zm76-16v416c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h224c26.5 0 48 21.5 48 48zm-32 0c0-8.8-7.2-16-16-16H48c-8.8 0-16 7.2-16 16v416c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V48z" class=""></path></svg>
							<div></div>
							<input type="file" name="uploadCv" id="uploadCv" />
						</div>
					</div>
					<label for="">Vos docs</label>
				</div>
				<p class="notes">Formats acceptés : pdf,docx et rtf dans la limite de 3Mo</p>
			</div>
			<button type="submit" id="saveCv" class="hide">Upload</button>
		</form>
	</div>
</div>

@endsection