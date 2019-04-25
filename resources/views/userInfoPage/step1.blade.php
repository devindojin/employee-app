@extends('layouts.main')

@section('title', 'user info step 1')

@section('content')

@php

$contDesArr = explode(",",$data->contract_desired);

@endphp
<div class="col-xs-12">
<h2 class="heading">Mon CV</h2>
<p class="heading_two">Felicitations, nous avons bien enregistre votre CV</p>
<p class="default_text">nous vous invitons maintenant à completer votre profil pour avoir encore plus de visibilite aupres des recruteurs du Paysage et creer vos alertes d'emploi.<br><br>Cela vous prendre quelques minutes et est tres important</p>
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
            <option value="1" @if(old("civility",$data->civility) == "1") selected="selected" @else @endif>1</option>
            <option value="2" @if(old("civility",$data->civility) == "2") selected="selected" @else @endif>2</option>
            <option value="3" @if(old("civility",$data->civility) == "3") selected="selected" @else @endif>3</option>
            <option value="4" @if(old("civility",$data->civility) == "4") selected="selected" @else @endif>4</option>
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
          <label for="birth_date">Date de naissance:</label>
          <input type="text" class="form-control input-lg" id="birth_date" name="birth_date" value="{{ old('birth_date', $data->birth_date) }}" autocomplete="off">
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
          <label for="pays">Pays:</label>
          <label class="radio-inline"><input type="radio" name="pays" value="france" @if(old("pays",$data->pays) == "france") checked="checked" @else @endif>France</label>
          <label class="radio-inline"><input type="radio" name="pays" value="autre" @if(old("pays",$data->pays) == "autre") checked="checked" @else @endif>Autre</label>
        </div>
        <div class="form-group">
          <label for="city">Téléphone:</label>
          <input type="text" class="form-control input-lg" id="telephone" name="telephone" value="{{ old('telephone', $data->telephone) }}">
        </div>
      </div>
    </div>
    <div class="well well-lg custom_well">
      <div class="well_heading">
        <h3>POSTE RECHERCHÉ</h3>
      </div>
      <div class="panel_form">
        <div class="form-group">
          <label for="contract_desired">Type de contrat souhaité:</label>
          <div class="checkbox">
            <label><input type="checkbox" value="cdd" name="contract_desired[]" @if(in_array("cdd",old('contract_desired',$contDesArr))) checked="checked" @else @endif>CDD</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" value="cddi" name="contract_desired[]" @if(in_array("cddi",old('contract_desired',$contDesArr))) checked="checked" @else @endif>CDD / intérim</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" value="franch" name="contract_desired[]" @if(in_array("franch",old('contract_desired',$contDesArr))) checked="checked" @else @endif>Franchises</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" value="indepen" name="contract_desired[]" @if(in_array("indepen",old('contract_desired',$contDesArr))) checked="checked" @else @endif>Indépendant / Freelance</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" value="statu" name="contract_desired[]" @if(in_array("statu",old('contract_desired',$contDesArr))) checked="checked" @else @endif>Statutaire</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" value="stage" name="contract_desired[]" @if(in_array("stage",old('contract_desired',$contDesArr))) checked="checked" @else @endif>Stage</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" value="appern" name="contract_desired[]" @if(in_array("appern",old('contract_desired',$contDesArr))) checked="checked" @else @endif>Apprentissage / Alternance</label>
          </div>
        </div>
        <div class="form-group">
          <label for="position_wishes_1">Poste souhaité 1:</label>
          <select class="form-control input-lg classic" id="position_wishes_1" name="position_wishes_1">
            <option value="1" @if(old("position_wishes_1",$data->position_wishes_1) == "1") selected="selected" @else @endif>1</option>
            <option value="2" @if(old("position_wishes_1",$data->position_wishes_1) == "2") selected="selected" @else @endif>2</option>
            <option value="3" @if(old("position_wishes_1",$data->position_wishes_1) == "3") selected="selected" @else @endif>3</option>
            <option value="4" @if(old("position_wishes_1",$data->position_wishes_1) == "4") selected="selected" @else @endif>4</option>
          </select>
        </div>
        <div class="form-group">
          <label for="position_wishes_2">Poste souhaité 2:</label>
          <select class="form-control input-lg classic" id="position_wishes_2" name="position_wishes_2">
            <option value="1" @if(old("position_wishes_2",$data->position_wishes_2) == "1") selected="selected" @else @endif>1</option>
            <option value="2" @if(old("position_wishes_2",$data->position_wishes_2) == "2") selected="selected" @else @endif>2</option>
            <option value="3" @if(old("position_wishes_2",$data->position_wishes_2) == "3") selected="selected" @else @endif>3</option>
            <option value="4" @if(old("position_wishes_2",$data->position_wishes_2) == "4") selected="selected" @else @endif>4</option>
          </select>
        </div>
        <div class="form-group">
          <label for="annual_salary">Salaire annuel brut souhaité (Min):</label>
          <input type="text" class="form-control input-lg" id="annual_salary" name="annual_salary" value="{{ old('annual_salary', $data->annual_salary) }}">
        </div>
        <div class="form-group">
          <label for="availability">Disponibilité:</label>
          <div class="radio">
            <label><input type="radio" name="availability" value="imme" @if(old("availability",$data->availability) == "imme") checked="checked" @else @endif>Immédiate</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="availability" value="avec" @if(old("availability",$data->availability) == "avec") checked="checked" @else @endif>Avec préavis</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="availability" value="veille" @if(old("availability",$data->availability) == "veille") checked="checked" @else @endif>En veille</label>
          </div>
        </div>
        <div class="form-group">
          <label for="mobility">Mobilité:</label>
          <select class="form-control input-lg classic" id="mobility" name="mobility">
            <option value="1" @if(old("mobility",$data->mobility) == "1") selected="selected" @else @endif>1</option>
            <option value="2" @if(old("mobility",$data->mobility) == "2") selected="selected" @else @endif>2</option>
            <option value="3" @if(old("mobility",$data->mobility) == "3") selected="selected" @else @endif>3</option>
            <option value="4" @if(old("mobility",$data->mobility) == "4") selected="selected" @else @endif>4</option>
          </select>
        </div>
        <div class="form-group">
          <div class="checkbox">
            <label><input type="checkbox" value="1" name="email_notification" @if(old("email_notification",$data->email_notification) == "1") checked="checked" @else @endif>Recevez par email les offres qui correspondent à votre CV</label>
          </div>
        </div>
      </div>
    </div>
    <div class="action_block text-center">
      <button type="submit" class="btn">Submit</button>
    </div>
  </form>
</div>
@endsection