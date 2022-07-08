@extends('layouts.main')

@section('title', 'User Info Step 1')

@section('content')

@php

$contDesArr = explode(",",$data->contract_desired);

@endphp
<div class="col-xs-12">
<h2 class="heading">Informations de profil</h2>
<p class="heading_two">Félicitations, nous avons bien enregistré votre CV, nous avons juste besoin de quelques informations supplémentaires</p>
</div>
<div class="col-xs-12">
  <form action="" method="POST">
    {{csrf_field()}}
    @include('partials.validation')
    <div class="well well-lg custom_well">
      <div class="well_heading">
        <h3>ETAT CIVIL</h3>
      </div>
      <div class="panel_form">
        <div class="form-group">
          <label for="civility">Civilité:</label>
          <select class="form-control input-lg classic" name="civility">
            <option value="M." @if(old("civility",$data->civility) == "M.") selected="selected" @else M. @endif>M.</option>
            <option value="Mme" @if(old("civility",$data->civility) == "Mme") selected="selected" @else Mme @endif>Mme</option>

          </select>
        </div>
        <div class="form-group">
          <label for="last_name">Nom:</label>
          <input type="text" class="form-control input-lg" id="last_name" name="last_name" value="{{ old('last_name', $data->last_name) }}">
        </div>
        <div class="form-group">
          <label for="first_name">Prénom:</label>
          <input type="text" class="form-control input-lg" id="first_name" name="first_name" value="{{ old('first_name', $data->name) }}">
        </div>
        <div class="form-group">
          <label for="code_postal">Code postal:</label>
          <input type="text" class="form-control input-lg" id="code_postal" name="code_postal" value="{{ old('code_postal', $data->code_postal) }}">
        </div>
        <div class="form-group">
          <label for="city">Ville:</label>
          <input type="text" class="form-control input-lg" id="city" name="city" value="{{ old('city', $data->city) }}">
        </div>
        <div class="form-group">
          <label for="city">Téléphone:</label>
          <input type="text" class="form-control input-lg" id="telephone" name="telephone" value="{{ old('telephone', $data->telephone) }}">
        </div>
      </div>
    </div>
    <div class="action_block text-center">
      <button type="submit" class="btn">Valider</button>
    </div>
  </form>
</div>
@endsection