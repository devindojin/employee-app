@extends('layouts.main')

@section('title', 'User Info Step 2')

@section('content')



@if ($data->lph_From != "")
@php
$lph_From_mo = date("m",strtotime($data->lph_From));
$lph_From_yr = date("Y",strtotime($data->lph_From));
@endphp
@else
@php
$lph_From_mo = $lph_From_yr = "";
@endphp
@endif

@if ($data->lph_To != "")
@php
$lph_To_mo = date("m",strtotime($data->lph_To));
$lph_To_yr = date("Y",strtotime($data->lph_To));
@endphp
@else
@php
$lph_To_mo = $lph_To_yr = "";
@endphp
@endif

<div class="col-xs-12">
<h2 class="heading">Mon CV</h2>
<p class="default_text">Bravo!<br>Encore un dernier effort et nous y sommes</p>
</div>
<div class="col-xs-12 job-section">
  <form action="" method="POST">
    {{csrf_field()}}
    @include('partials.validation')
    <div class="well well-lg custom_well">
      <div class="well_heading">
        <h3>NIVEAU D'EXPÉRIENCE GLOBAL</h3>
      </div>
      <div class="panel_form">
        <div class="form-group">
          <label for="experience">Expérience:</label>
          <select class="form-control input-lg classic" name="experience">
            <option value="Jeune diplômé" @if(old("experience",$data->experience) == "Jeune diplômé") selected="selected" @else @endif>Jeune diplômé</option>
            <option value="1-2 ans" @if(old("experience",$data->experience) == "1-2 ans") selected="selected" @else @endif>1-2 ans</option>
            <option value="3-5 ans" @if(old("experience",$data->experience) == "3-5 ans") selected="selected" @else @endif>3-5 ans</option>
            <option value="6-10 ans" @if(old("experience",$data->experience) == "6-10 ans") selected="selected" @else @endif>6-10 ans</option>
            <option value="11-20 ans" @if(old("experience",$data->experience) == "11-20 ans") selected="selected" @else @endif>11-20 ans</option>
            <option value="+ de 20 ans" @if(old("experience",$data->experience) == "2") selected="selected" @else @endif>2</option>
            <option value="3" @if(old("experience",$data->experience) == "+ de 20 ans") selected="selected" @else @endif>+ de 20 ans</option>
          </select>
        </div>
      </div>
    </div>
    <div class="well well-lg custom_well">
      <div class="well_heading">
        <h3>DERNIER POSTE OCCUPÉ</h3>
      </div>
      <div class="panel_form">
        <div class="form-group">
          <label for="periode">Période</label>
          <div class="col-xs-12">
            <div class="col-xs-2"><label>De</label></div> 
            <div class="col-xs-2">
              <input type="text" class="form-control input-lg" id="lph_From_mo" name="lph_From_mo" value="{{ old('lph_From_mo', $lph_From_mo) }}" maxlength="2" placeholder="mm">
            </div>
            <div class="col-xs-2"><label>/</label></div>
            <div class="col-xs-2">
              <input type="text" class="form-control input-lg" id="lph_From_yr" name="lph_From_yr" value="{{ old('lph_From_yr', $lph_From_yr) }}" maxlength="4" placeholder="yyyy">
            </div>
            <div class="col-xs-2"><label>a</label></div> 
          </div>
          <div class="col-xs-12 from-date-sec">
            <div class="col-xs-2">
              <input type="text" class="form-control input-lg" id="lph_To_mo" name="lph_To_mo" value="{{ old('lph_To_mo', $lph_To_mo) }}" maxlength="2" placeholder="mm">
            </div>
            <div class="col-xs-2"><label>/</label></div>
            <div class="col-xs-2">
              <input type="text" class="form-control input-lg" id="lph_To_yr" name="lph_To_yr" value="{{ old('lph_To_yr', $lph_To_yr) }}" maxlength="4" placeholder="yyyy">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
          <div class="checkbox">
            Ou<label><input type="checkbox" value="1" id="still_in_office" name="still_in_office" @if(old("still_in_office",$data->still_in_office) == "1") checked="checked" @else @endif>toujours en poste</label>
          </div>
          </div>
        </div>
        <div class="form-group">
          <label for="job_title">Intitulé de poste:</label>
          <input type="text" class="form-control input-lg" id="job_title" name="job_title" value="{{ old('job_title', $data->job_title) }}">
        </div>
        <div class="form-group">
          <label for="fonction">Fonction:</label>
            <input type="text" class="form-control input-lg" id="fonction" name="fonction" value="{{ old('fonction', $data->fonction) }}">
        </div>
        <div class="form-group">
          <label for="gross_annual_salary">Salaire annuel brut pour ce poste:</label>
          <input type="text" class="form-control input-lg" id="gross_annual_salary" name="gross_annual_salary" value="{{ old('gross_annual_salary', $data->gross_annual_salary) }}">
          </select>
        </div>
        <div class="form-group">
          <label for="assignments">Missions:</label>
          <textarea class="form-control input-lg classic" name="assignments">{{ $data->assignments }}</textarea>
        </div>
      </div>
    </div>
    <div class="well well-lg custom_well">
      <div class="well_heading">
        <h3>FORMATION</h3>
      </div>
      <div class="panel_form">
        <div class="form-group">
          <label for="level_of_education">Niveau de formation</label>
          <select class="form-control input-lg classic" id="level_of_education" name="level_of_education">
            <option value="BAC" @if(old("level_of_education",$data->level_of_education) == "BAC") selected="selected" @else @endif>BAC</option>
            <option value="BAC+1" @if(old("level_of_education",$data->level_of_education) == "BAC+1") selected="selected" @else @endif>BAC+1</option>
            <option value="BAC+2" @if(old("level_of_education",$data->level_of_education) == "BAC+2") selected="selected" @else @endif>BAC+2</option>
            <option value="BAC+3" @if(old("level_of_education",$data->level_of_education) == "BAC+3") selected="selected" @else @endif>BAC+3</option>
            <option value="BAC+4" @if(old("level_of_education",$data->level_of_education) == "BAC+4") selected="selected" @else @endif>BAC+4</option>
            <option value="BAC+5" @if(old("level_of_education",$data->level_of_education) == "BAC+5") selected="selected" @else @endif>BAC+5</option>
            <option value="BAC+6" @if(old("level_of_education",$data->level_of_education) == "BAC+6") selected="selected" @else @endif>BAC+6</option>
            <option value="BAC+6 et plus" @if(old("level_of_education",$data->level_of_education) == "BAC+6 et plus") selected="selected" @else @endif>BAC+6 et plus</option>
          </select>
        </div>
        <div class="form-group">
          <label for="training_type">Type de formation (facultatif)</label>
          <select class="form-control input-lg classic" id="training_type" name="training_type">
            <option value="Ecole de Paysage" @if(old("training_type",$data->training_type) == "Ecole de Paysage") selected="selected" @else @endif>Ecole de Paysage</option>
            <option value="IEP" @if(old("training_type",$data->training_type) == "IEP") selected="selected" @else @endif>IEP</option>
            <option value="IUT" @if(old("training_type",$data->training_type) == "IUT") selected="selected" @else @endif>IUT</option>
            <option value="IUP" @if(old("training_type",$data->training_type) == "IUP") selected="selected" @else @endif>IUP</option>
            <option value="BTS" @if(old("training_type",$data->training_type) == "BTS") selected="selected" @else @endif>BTS</option>
            <option value="Université" @if(old("training_type",$data->training_type) == "Université") selected="selected" @else @endif>Université</option>
            <option value="BAC" @if(old("training_type",$data->training_type) == "BAC") selected="selected" @else @endif>BAC</option>
            <option value="Bac Pro, BEP, CAP" @if(old("training_type",$data->training_type) == "Bac Pro, BEP, CAP") selected="selected" @else @endif>Bac Pro, BEP, CAP</option>
            <option value="Autre" @if(old("training_type",$data->training_type) == "Autre") selected="selected" @else @endif>Autre</option>
          </select>
        </div>
        <div class="form-group">
          <label for="mobility">Langues (Facultatif)</label>
          <input type="text" class="form-control input-lg" id="lang_11" name="lang_11" value="{{ old('lang_11', $data->lang_11) }}">
        </div>
      </div>
    </div>
    <div class="action_block text-center">
      <button type="submit" class="btn">Valider ɒour terminer</button>
    </div>
  </form>
</div>
@endsection