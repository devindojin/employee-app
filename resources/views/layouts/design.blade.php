@extends('layouts.main')

@section('title', 'user info step 1')

@section('content')
<div class="col-xs-12">
<h2 class="heading">Mon CV</h2>
<p class="heading_two">Felicitations, nous avons bien enregistre votre CV</p>
<p class="default_text">nous vous invitons maintenant à completer votre profil pour avoir encore plus de visibilite aupres des recruteurs du Paysage et creer vos alertes d'emploi.<br><br>Cela vous prendre quelques minutes et est tres important</p>
</div>
<div class="col-xs-12">
<div class="well well-lg custom_well">
<div class="well_heading">
<h3>ETAT CIVIL</h3>
</div>
<div class="panel_form">
<div class="form-group">
<label for="">Large input</label>
<select class="form-control input-lg classic">
<option>Option One</option>
<option>Option One</option>
</select> 
</div>
<div class="form-group">
<label for="">Large input</label>
<input class="form-control input-lg" id="" type="text">
</div>
<div class="form-group">
<label for="">Large input</label>
<input class="form-control input-lg" id="" type="text">
</div>
<div class="form-group">
<label for="">Large input</label>
<div class="display_flex">
<input class="form-control input-lg" id="" type="text"><p class="oblique"> / </p>
<input class="form-control input-lg" id="" type="text"><p class="oblique"> / </p>
<input class="form-control input-lg" id="" type="text">
</div>
</div>
<div class="form-group">
<label for="">Large input</label>
<input class="form-control input-lg" id="" type="text">
</div>
<div class="form-group">
<label for="">Large input</label>
<input class="form-control input-lg" id="" type="text">
</div>
<div class="form-group">
<div class="display_flex">
<label for="" style="width:120px">Pays</label>
<div  style="width:300px;">
<label class="text-center">
<input class="" id="" type="radio" checked>
<p>France&nbsp;</p></label>
<label class="text-center">
<input class="" id="" type="radio">
<p>France</p></label>
</div>
<input class="form-control input-lg" id="" type="text" >									
</div>
</div>
<div class="form-group">
<label for="">Telephone</label>
<input class="form-control input-lg" id="" type="text">
</div>
</div>
</div>
<div class="well well-lg custom_well">
<div class="well_heading">
<h3>Post Recharce</h3>
</div>
<div class="panel_form">
<div class="form-group">
<label for="">Large input</label>
<div class="panel_btn">
<button type="button" class="btn btn-default">CDI</button> 
<button type="button" class="btn btn-default">CDI</button> 
<button type="button" class="btn btn-default">CDI</button> 
<button type="button" class="btn btn-default">CDI</button> 
<button type="button" class="btn btn-default">CDI</button> 
<button type="button" class="btn btn-default">CDI</button> 
<button type="button" class="btn btn-default">CDI</button> 
</div> 
</div>
<div class="form-group">
<label for="">Large input</label>
<select class="form-control input-lg classic">
<option>Option One</option>
<option>Option One</option>
</select> 
</div>
<div class="form-group">
<label for="">Large input</label>
<select class="form-control input-lg classic">
<option>Option One</option>
<option>Option One</option>
</select> 
</div>
<div class="form-group">
<label for="">Large input</label>
</div>
<div class="form-group">
<label for="">Min input</label>
<input type="text" class="form-control input-lg" >
</div>
</div>
</div>
<div class="well well-lg custom_well">
<div class="well_heading">
<h3>Post Recharce</h3>
</div>
<div class="panel_form">
<div class="form-group">
<label for="">Disponbilate</label>
</div>
<div class="form-group radio_block">
<label><input type="radio"> Imideate</label> 
<label><input type="radio"> Imideate</label> 
<label><input type="radio"> Imideate</label> 
</div>
<div class="form-group">
<label for="">Large input</label>
<select class="form-control input-lg classic">
<option>Option One</option>
<option>Option One</option>
</select> 
</div>
<div class="form-group">
<label for=""><input type="checkbox">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</label>
</div>
</div>
</div>
<div class="action_block text-center">
<button type="submit" class="btn">Update now</button>
</div>
</div>
@endsection