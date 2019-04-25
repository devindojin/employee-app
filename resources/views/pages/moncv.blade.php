@extends('layouts.main')

@section('title', 'user info step 1')

@section('content')

<div class="col-xs-12">
<h2 class="heading">Bienvenue sur votre profil</h2>
</div>
<div class="col-xs-12 moncv-border">
	<h3 class="heading">Votre dernière mise a jour:</h3>
	<p class="moncv-subheading">{{ date("d/m/Y",strtotime($data->updated_at)) }}</p>
	<h3 class="heading">Votre fichier CV:</h3>
	<p class="moncv-subheading">
		<a href="{{route('download-cv')}}">
			{{strtolower($data->name).'_'.strtolower($data->last_name)}}_cv.pdf
		</a>
	</p>
	<div class="action_block text-center">
	  <a href="{{ route('upload-cv') }}" class="btn">modifier la pièce jointe</a>
	</div>
	<hr></hr>
	<h3 class="heading">Votre profil Emploi Paysagiste:</h3>
	<h3 class="heading">Votre dernière mise a jour:</h3>
	<p class="moncv-subheading">
		<a href="{{route('download-cv')}}">
			{{strtolower($data->name).'_'.strtolower($data->last_name)}}_cv.pdf
		</a>
	</p>
	<div class="action_block text-center">
	  <a href="{{ route('step1') }}" class="btn">modifier votre profil</a>
	</div>
</div>

@endsection