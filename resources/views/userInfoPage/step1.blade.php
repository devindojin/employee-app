@extends('layouts.main')

@section('title', 'user info step 1')

@section('content')
<div class="container">
  <form action="/action_page.php">
    <div class="form-group">
      <label for="civility">Civilité:</label>
      <input type="text" class="form-control" id="civility">
    </div>
    <div class="form-group">
      <label for="last_name">Nom:</label>
      <input type="text" class="form-control" id="last_name">
    </div>
    <div class="form-group">
      <label for="first_name">Prénom:</label>
      <input type="text" class="form-control" id="first_name">
    </div>
    <div class="form-group">
      <label for="birth_date">Date de naissance:</label>
      <input type="text" class="form-control" id="birth_date">
    </div>
    <div class="form-group">
      <label for="code_postal">Code postal:</label>
      <input type="text" class="form-control" id="code_postal">
    </div>
    <div class="form-group">
      <label for="city">Ville:</label>
      <input type="text" class="form-control" id="city">
    </div>
    <div class="form-group">
      <label for="pays">Pays:</label>
      <label class="radio-inline"><input type="radio" name="optradio" checked>France</label>
      <label class="radio-inline"><input type="radio" name="optradio">Autre</label>
    </div>
    <div class="form-group">
      <label for="contract_desired">Type de contrat souhaité:</label>
      <div class="checkbox">
        <label><input type="checkbox" value="">CDD</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="">CDD / intérim</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="">Franchises</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="">Indépendant / Freelance</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="">Statutaire</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="">Stage</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="">Apprentissage / Alternance</label>
      </div>
    </div>
    <div class="form-group">
      <label for="position_wishes_1">Poste souhaité 1:</label>
      <select class="form-control" id="position_wishes_1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
    </div>
    <div class="form-group">
      <label for="position_wishes_2">Poste souhaité 2:</label>
      <select class="form-control" id="position_wishes_2">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
    </div>
    <div class="form-group">
      <label for="annual_salary">Salaire annuel brut souhaité (Min):</label>
      <input type="text" class="form-control" id="annual_salary">
    </div>
    <div class="form-group">
      <label for="availability">Disponibilité:</label>
      <div class="radio">
        <label><input type="radio" name="availability" checked>Immédiate</label>
      </div>
      <div class="radio">
        <label><input type="radio" name="availability">Avec préavis</label>
      </div>
      <div class="radio">
        <label><input type="radio" name="availability">En veille</label>
      </div>
    </div>
    <div class="form-group">
      <label for="mobility">Mobilité:</label>
      <select class="form-control" id="mobility">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
    </div>
    <div class="form-group">
      <div class="checkbox">
        <label><input type="checkbox" value="">Recevez par email les offres qui correspondent à votre CV</label>
      </div>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
@endsection