@extends('layouts.main')

@section('title', 'user info step 1')

@section('content')

<div class="col-xs-12">
	<form action="" method="post">
		{{csrf_field()}}
		<div class="job-page">
	    	<div class="job-section">
	        	<div>
	        		<p class="heading1">{{ isset($data['posting_title'])?$data['posting_title']:'-' }}</p>
	        		<p class="heading2">(H/F)*</p>
	        		<p class="heading1">{{ isset($data['client_name'])?$data['client_name']:'-' }}</p>
	        	</div>

	        	<div class="job-subsection">
	        		<a href="">
	        			<i class="fas fa-briefcase"></i> 
	        			{{ isset($data['job_type'])?$data['job_type']:'-' }}
	        		</a>
	        		<a href="">
	        			<i class="fa fa-map-marker"></i> 
	        			{{isset($data['industry'])?$data['industry']:'-'}}
	        		</a>
	        		<a href="">
	        			<i class="material-icons" style="font-size:14px">&#xe334;</i>
	        			{{isset($data['date_opened'])?$data['date_opened']:'-'}}
	        		</a>
	        	</div>
	        	<button type="button" class="btn">Je postule</button>
			    <div>
			    	<p class="heading1"><i class="far fa-heart">&nbsp;</i> enregistrer l'offre</p>
			    </div>
	        </div>

	        <div class="job-section">
	        	<div>
	        		<p class="heading1">Description du poste</p>
	        		<p>
	        			@if(isset($data['job_description']))
	        			{!! $data['job_description'] !!}
	        			@else
	        			@endif
	        		</p>
	        	</div>
	        </div>

	        <div class="job-section">
	        	<div>
	        		<p class="heading1">Profil recherché</p>
	        		<p>
	        			xxxxxxxxx
	        		</p>
	        		<p>
	        			xxxxxxxxx
	        		</p>
	        		<p>
	        			efefef
	        		</p>
	        	</div>
	        </div>

	        <div class="job-section">
	        	<div>
	        		<p class="heading1">Expérience recherchée</p>
	        		<p>
	        			{{ isset($data['work_experience'])?$data['work_experience']:'-' }}
	        		</p>
	        	</div>
	        </div>

	        <div class="job-section">
	        	<div>
	        		<p class="heading1" style="margin-bottom: 40px">&nbsp;Postuler à l'offre</p>
	        		<p style="margin-bottom: 40px">
	        			Mes coordonnées
	        		</p>
	        		<input type="text" name="" class="form-control" style="margin-bottom: 40px">
	        	</div>
	        	<p class="heading1" style="margin-bottom: 40px">Mon CV</p>
	        	<div style="margin-bottom: 40px">
	        		<div class="radio">
					  <label><input type="radio" name="optradio" checked>Utiliser le CV de mon Espace Candidat:<br>cv.pdf</label>
					</div>
					<div class="radio">
					  <label><input type="radio" name="optradio">Utiliser un nouveau CV</label>
					</div>
	        	</div>
	        	<p class="heading1">
	        		Me lettre de motivation
	        	</p>
	        	<div style="border: 5px solid #010101; padding: 10px">
	        		<p class="heading1">
	        			Bonjour,<br><br>Je me permets de vous solliciter pour le poste de "Responsable bureau d'etudes". Veuillez trouver mon CV en piece jointe.<br><br>Cordialement
	        		</p>
	        	</div>
	        	<div class="text-center">
	        		<button type="submit" class="btn">Valider ɒour terminer</button>
	        	</div>
	        </div>
	    </div>
	</form>
</div>

@endsection