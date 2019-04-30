@extends('layouts.main')

@section('title', 'Update Password')

@section('content')

<div class="col-xs-12">
<h2 class="heading">Modification de mot de passe</h2>
</div>
<div class="col-xs-12">
  <form action="" method="POST">
    {{csrf_field()}}
    <div class="well well-lg custom_well">
      <div class="well_heading">
        <h3>Choisissez votre nouveau mot de passe</h3>
      </div>
      <div class="panel_form">
        <div class="form-group">
          <input type="text" name="pass" class="form-control" placeholder="nouveau mot de passe">
        </div>
          
      </div>
    </div>
   
    <div class="action_block text-center">
      <button type="submit" class="btn">Enregistrer</button>
    </div>
  </form>
</div>
@endsection