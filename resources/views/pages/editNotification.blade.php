@extends('layouts.main')

@section('title', 'user info step 1')

@section('content')

<div class="col-xs-12">
<h2 class="heading">Créez votre alerte mail</h2>
<p>Soyez averti dès qu'une nouvelle offre qui vous correspond arrive</p>
</div>
<div class="col-xs-12 moncv-border">
	<form action="" method="POST">
    	{{csrf_field()}}
	    <div class="well well-lg custom_well">
	      	<div class="well_heading">
	        	<h3>POSTE RECHERCHÉ</h3>
	      	</div>
	      	<div class="panel_form">
		        <div class="form-group">
		          <label for="civility">Posté souhaite:</label>
		          <select class="form-control input-lg classic" name="poste_title">
		            <option value="1" @if(old("poste_title",$data->title) == "1") selected="selected" @else @endif>1</option>
		            <option value="2" @if(old("poste_title",$data->title) == "2") selected="selected" @else @endif>2</option>
		            <option value="3" @if(old("poste_title",$data->title) == "3") selected="selected" @else @endif>3</option>
		            <option value="4" @if(old("poste_title",$data->title) == "4") selected="selected" @else @endif>4</option>
		          </select>
		        </div>
	      	</div>
	    </div>

	    <div class="well well-lg custom_well">
	      	<div class="well_heading">
	        	<h3>Localisation</h3>
	      	</div>
	      	<div class="panel_form">
		        <div class="form-group">
		        	
		        	@if ($data->locals->count() > 0)
		        	@php
		        	$localArr = $data->locals->pluck('id')->toArray();
		        	@endphp
		        	@else
		        	@php
		        	$localArr = [];
		        	@endphp
		        	@endif

		        	@foreach ($locals as $local)
		          	<div class="checkbox">
		            	<label><input type="checkbox" value="{{ $local->id }}" name="local[]" @if(in_array($local->id,$localArr)) checked="checked" @else @endif>{{ $local->value }}</label>
		          	</div>
		          	@endforeach
		        </div>
	      	</div>
	    </div>

	    <div class="well well-lg custom_well">
	      	<div class="well_heading">
	        	<h3>Type de contrat souhaité</h3>
	      	</div>
	      	<div class="panel_form">
		        <div class="form-group">
		        	@foreach ($locals as $local)
		          	<div class="checkbox">
		            	<label><input type="checkbox" value="{{ $local->id }}" name="contract_type[]">{{ $local->value }}</label>
		          	</div>
		          	@endforeach
		        </div>
	      	</div>
	    </div>

	    <div class="action_block text-center">
	      <button type="submit" class="btn">Submit</button>
	    </div>
	</form>
</div>

@endsection