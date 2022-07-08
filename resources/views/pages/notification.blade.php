@extends('layouts.main')

@section('title', 'Create Notification')

@section('content')

<div class="col-xs-12">
<h2 class="heading">Créez votre alerte mail</h2>
<p>Soyez averti dès qu'une nouvelle offre qui vous correspond arrive</p>
</div>
<div class="col-xs-12">
	<form action="" method="POST">
    	{{csrf_field()}}
	    <div class="jobsection">
	      	<div class="well_heading">
	        	<h3>POSTE RECHERCHÉ</h3>
	      	</div>
	      	<div class="panel_form">
		        <div class="form-group">
		          <label for="civility">Posté souhaité:</label>
		          <select class="form-control input-lg classic" name="poste_title">
		            <option value="Architecte Paysagiste" @if(old("poste_title") == "Architecte Paysagiste") selected="selected" @else @endif>Architecte Paysagiste</option>
		            <option value="Concepteur paysagiste" @if(old("poste_title") == "Concepteur paysagiste") selected="selected" @else @endif>Concepteur paysagiste</option>
		            <option value="Concepteur paysagiste" @if(old("poste_title") == "3") selected="selected" @else @endif>Concepteur paysagiste</option>
		            <option value="Infographiste en paysage" @if(old("poste_title") == "Infographiste en paysage") selected="selected" @else @endif>Infographiste en paysage</option>
		            <option value="Ingénieur Bureau d'études" @if(old("poste_title") == "Ingénieur Bureau d'études") selected="selected" @else @endif>Ingénieur Bureau d'études</option>
		            <option value="Responsable Bureau d'études" @if(old("poste_title") == "Responsable Bureau d'études") selected="selected" @else @endif>Responsable Bureau d'études</option>
		            <option value="Chargé d'affaires" @if(old("poste_title") == "Chargé d'affaires") selected="selected" @else @endif>Chargé d'affaires</option>
		            <option value="Chef de Chantier" @if(old("poste_title") == "Chef de Chantier") selected="selected" @else @endif>Chef de Chantier</option>
		            <option value="Chef d'équipe en création / entretien" @if(old("poste_title") == "Chef d'équipe en création / entretien") selected="selected" @else @endif>Chef d'équipe en création / entretien</option>
		            <option value="Chef d'équipe en maçonnerie" @if(old("poste_title") == "Chef d'équipe en maçonnerie") selected="selected" @else @endif>Chef d'équipe en maçonnerie</option>
		            <option value="Formateur / Enseignant" @if(old("poste_title") == "Formateur / Enseignant") selected="selected" @else @endif>Formateur / Enseignant</option>
		            <option value="Elagueur / Elagueur-Grimpeur" @if(old("poste_title") == "Elagueur / Elagueur-Grimpeur") selected="selected" @else @endif>Elagueur / Elagueur-Grimpeur</option>
		            <option value="Conducteur d'engins" @if(old("poste_title") == "Conducteur d'engins") selected="selected" @else @endif>Conducteur d'engins</option>
		            <option value="Homme de Pied" @if(old("poste_title") == "Homme de Pied") selected="selected" @else @endif>Homme de Pied</option>
		            <option value="Installateur de systèmes d'arrosage / Eclairage" @if(old("poste_title") == "Installateur de systèmes d'arrosage / Eclairage") selected="selected" @else @endif>Installateur de systèmes d'arrosage / Eclairage</option>
		            <option value="Jardinier Botaniste" @if(old("poste_title") == "Jardinier Botaniste") selected="selected" @else @endif>Jardinier Botaniste</option>
		            <option value="Jardinier Paysagiste en création / entretien" @if(old("poste_title") == "Jardinier Paysagiste en création / entretien") selected="selected" @else @endif>Jardinier Paysagiste en création / entretien</option>
		            <option value="Manoeuvre Espaces verts" @if(old("poste_title") == "Manoeuvre Espaces verts") selected="selected" @else @endif>Manoeuvre Espaces verts</option>
		            <option value="Maçon Paysagiste" @if(old("poste_title") == "Maçon Paysagiste") selected="selected" @else @endif>Maçon Paysagiste</option>
		            <option value="Mécanicien agricole" @if(old("poste_title") == "Mécanicien agricole") selected="selected" @else @endif>Mécanicien agricole</option>
		            <option value="Menuisier" @if(old("poste_title") == "Menuisier") selected="selected" @else @endif>Menuisier</option>
		            <option value="Ouvrier Paysagiste en création / entretien" @if(old("poste_title") == "Ouvrier Paysagiste en création / entretien") selected="selected" @else @endif>Ouvrier Paysagiste en création / entretien</option>
		            <option value="Ouvrier paysagiste en terrassement" @if(old("poste_title") == "Ouvrier paysagiste en terrassement") selected="selected" @else @endif>Ouvrier paysagiste en terrassement</option>
		            <option value="Paysagiste Concepteur" @if(old("poste_title") == "Paysagiste Concepteur") selected="selected" @else @endif>Paysagiste Concepteur</option>
		            <option value="Paysagiste d'intérieur" @if(old("poste_title") == "Paysagiste d'intérieur") selected="selected" @else @endif>Paysagiste d'intérieur</option>
		            <option value="Technicien piscine" @if(old("poste_title") == "Technicien piscine") selected="selected" @else @endif>Technicien piscine</option>
		            <option value="Pépinièriste" @if(old("poste_title") == "Pépinièriste") selected="selected" @else @endif>Pépinièriste</option>
		          </select>
		        </div>
	      	</div>
	    </div>

	    <div class="job-section">
	      	<div class="well_heading">
	        	<h3>Localisation</h3>
	      	</div>
	      	<div class="panel_form">
		        <div class="form-group">
		        	@foreach ($locals as $local)
		          	<div class="checkbox">
		            	<label><input type="checkbox" value="{{ $local->id }}" name="local[]">{{ $local->value }}</label>
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