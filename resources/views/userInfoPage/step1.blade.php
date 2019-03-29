@extends('layouts.main')

@section('title', 'user info step 1')

@section('content')
<div class="container">
  <form action="" method="POST">
    {{csrf_field()}}
    <div class="form-group">
      <label for="civility">Civilité:</label>
      <input type="text" class="form-control" id="civility" name="civility">
    </div>
    <div class="form-group">
      <label for="last_name">Nom:</label>
      <input type="text" class="form-control" id="last_name" name="last_name">
    </div>
    <div class="form-group">
      <label for="first_name">Prénom:</label>
      <input type="text" class="form-control" id="first_name" name="first_name">
    </div>
    <div class="form-group">
      <label for="birth_date">Date de naissance:</label>
      <input type="text" class="form-control" id="birth_date" name="birth_date">
    </div>
    <div class="form-group">
      <label for="code_postal">Code postal:</label>
      <input type="text" class="form-control" id="code_postal" name="code_postal">
    </div>
    <div class="form-group">
      <label for="city">Ville:</label>
      <input type="text" class="form-control" id="city" name="city">
    </div>
    <div class="form-group">
      <label for="pays">Pays:</label>
      <label class="radio-inline"><input type="radio" name="pays" value="france">France</label>
      <label class="radio-inline"><input type="radio" name="pays" value="autre">Autre</label>
    </div>
    <div class="form-group">
      <label for="city">Téléphone:</label>
      <input type="text" class="form-control" id="telephone" name="telephone">
    </div>
    <div class="form-group">
      <label for="contract_desired">Type de contrat souhaité:</label>
      <div class="checkbox">
        <label><input type="checkbox" value="cdd" name="contract_desired[]">CDD</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="cddi" name="contract_desired[]">CDD / intérim</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="franch" name="contract_desired[]">Franchises</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="indepen" name="contract_desired[]">Indépendant / Freelance</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="statu" name="contract_desired[]">Statutaire</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="stage" name="contract_desired[]">Stage</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="appern" name="contract_desired[]">Apprentissage / Alternance</label>
      </div>
    </div>
    <div class="form-group">
      <label for="position_wishes_1">Poste souhaité 1:</label>
      <select class="form-control" id="position_wishes_1" name="position_wishes_1">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </div>
    <div class="form-group">
      <label for="position_wishes_2">Poste souhaité 2:</label>
      <select class="form-control" id="position_wishes_2" name="position_wishes_2">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </div>
    <div class="form-group">
      <label for="annual_salary">Salaire annuel brut souhaité (Min):</label>
      <input type="text" class="form-control" id="annual_salary" name="annual_salary">
    </div>
    <div class="form-group">
      <label for="availability">Disponibilité:</label>
      <div class="radio">
        <label><input type="radio" name="availability" value="imme">Immédiate</label>
      </div>
      <div class="radio">
        <label><input type="radio" name="availability" value="avec">Avec préavis</label>
      </div>
      <div class="radio">
        <label><input type="radio" name="availability" value="veille">En veille</label>
      </div>
    </div>
    <div class="form-group">
      <label for="mobility">Mobilité:</label>
      <select class="form-control" id="mobility" name="mobility">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </div>
    <div class="form-group">
      <div class="checkbox">
        <label><input type="checkbox" value="1" name="email_notification">Recevez par email les offres qui correspondent à votre CV</label>
      </div>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
@endsection