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
<div class="col-xs-12">
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
            <option value="1" @if(old("experience",$data->experience) == "1") selected="selected" @else @endif>1</option>
            <option value="2" @if(old("experience",$data->experience) == "2") selected="selected" @else @endif>2</option>
            <option value="3" @if(old("experience",$data->experience) == "3") selected="selected" @else @endif>3</option>
            <option value="4" @if(old("experience",$data->experience) == "4") selected="selected" @else @endif>4</option>
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
          <select class="form-control input-lg classic" id="fonction" name="fonction">
            <option value="1" @if(old("fonction",$data->fonction) == "1") selected="selected" @else @endif>1</option>
            <option value="2" @if(old("fonction",$data->fonction) == "2") selected="selected" @else @endif>2</option>
            <option value="3" @if(old("fonction",$data->fonction) == "3") selected="selected" @else @endif>3</option>
            <option value="4" @if(old("fonction",$data->fonction) == "4") selected="selected" @else @endif>4</option>
          </select>
        </div>
        <div class="form-group">
          <label for="gross_annual_salary">Salaire annuel brut pour ce poste:</label>
          <select class="form-control input-lg classic" id="gross_annual_salary" name="gross_annual_salary">
            <option value="1" @if(old("gross_annual_salary",$data->gross_annual_salary) == "1") selected="selected" @else @endif>1</option>
            <option value="2" @if(old("gross_annual_salary",$data->gross_annual_salary) == "2") selected="selected" @else @endif>2</option>
            <option value="3" @if(old("gross_annual_salary",$data->gross_annual_salary) == "3") selected="selected" @else @endif>3</option>
            <option value="4" @if(old("gross_annual_salary",$data->gross_annual_salary) == "4") selected="selected" @else @endif>4</option>
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
            <option value="1" @if(old("level_of_education",$data->level_of_education) == "1") selected="selected" @else @endif>1</option>
            <option value="2" @if(old("level_of_education",$data->level_of_education) == "2") selected="selected" @else @endif>2</option>
            <option value="3" @if(old("level_of_education",$data->level_of_education) == "3") selected="selected" @else @endif>3</option>
            <option value="4" @if(old("level_of_education",$data->level_of_education) == "4") selected="selected" @else @endif>4</option>
          </select>
        </div>
        <div class="form-group">
          <label for="training_type">Type de formation (facultaif)</label>
          <select class="form-control input-lg classic" id="training_type" name="training_type">
            <option value="1" @if(old("training_type",$data->training_type) == "1") selected="selected" @else @endif>1</option>
            <option value="2" @if(old("training_type",$data->training_type) == "2") selected="selected" @else @endif>2</option>
            <option value="3" @if(old("training_type",$data->training_type) == "3") selected="selected" @else @endif>3</option>
            <option value="4" @if(old("training_type",$data->training_type) == "4") selected="selected" @else @endif>4</option>
          </select>
        </div>
        <div class="form-group">
          <label for="mobility">1 ére langue (facultaif)</label>
          <select class="form-control input-lg classic" id="lang_11" name="lang_11">
            <option value="1" @if(old("lang_11",$data->lang_11) == "1") selected="selected" @else @endif>1</option>
            <option value="2" @if(old("lang_11",$data->lang_11) == "2") selected="selected" @else @endif>2</option>
            <option value="3" @if(old("lang_11",$data->lang_11) == "3") selected="selected" @else @endif>3</option>
            <option value="4" @if(old("lang_11",$data->lang_11) == "4") selected="selected" @else @endif>4</option>
          </select>
          <br>
          <select class="form-control input-lg classic" id="lang_12" name="lang_12">
            <option value="1" @if(old("lang_12",$data->lang_12) == "1") selected="selected" @else @endif>1</option>
            <option value="2" @if(old("lang_12",$data->lang_12) == "2") selected="selected" @else @endif>2</option>
            <option value="3" @if(old("lang_12",$data->lang_12) == "3") selected="selected" @else @endif>3</option>
            <option value="4" @if(old("lang_12",$data->lang_12) == "4") selected="selected" @else @endif>4</option>
          </select>
        </div>
        <div class="form-group">
          <label for="mobility">2 éme langue (facultaif)</label>
          <select class="form-control input-lg classic" id="lang_21" name="lang_21">
            <option value="1" @if(old("lang_21",$data->lang_21) == "1") selected="selected" @else @endif>1</option>
            <option value="2" @if(old("lang_21",$data->lang_21) == "2") selected="selected" @else @endif>2</option>
            <option value="3" @if(old("lang_21",$data->lang_21) == "3") selected="selected" @else @endif>3</option>
            <option value="4" @if(old("lang_21",$data->lang_21) == "4") selected="selected" @else @endif>4</option>
          </select>
          <br>
          <select class="form-control input-lg classic" id="lang_22" name="lang_22">
            <option value="1" @if(old("lang_22",$data->lang_22) == "1") selected="selected" @else @endif>1</option>
            <option value="2" @if(old("lang_22",$data->lang_22) == "2") selected="selected" @else @endif>2</option>
            <option value="3" @if(old("lang_22",$data->lang_22) == "3") selected="selected" @else @endif>3</option>
            <option value="4" @if(old("lang_22",$data->lang_22) == "4") selected="selected" @else @endif>4</option>
          </select>
        </div>
      </div>
    </div>
    <div class="action_block text-center">
      <button type="submit" class="btn">Valider ɒour terminer</button>
    </div>
  </form>
</div>
@endsection