@extends('layouts.main')

@section('title', 'Mon CV')

@section('content')

<div class="col-xs-12">
<h2 class="heading">Mon Compte</h2>
@if (session('status'))
    <p class="notes" style="margin-top:10px;text-align:center;font-weight:800;font-size:24px">
        <i class="fas fa-check"></i> {{ session('status') }}
    </p>
@endif
</div>
<div class="col-xs-12 job-section">
	<div class="col-xs-12">
		<div class="well_heading">
			<h3>CV</h3>
		</div>
		<form action="" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
			@include('partials.validation')
			<div class="panel_form">
				<p class="default_text moncv-subheading" style="padding-bottom:15px;"> Votre dernière mise à jour date du {{ date("d/m/Y",strtotime($data->updated_at)) }}</p>
				<div class="form-group text-center">
					<div class="dropzone">
						<div id="dropzone">
                            <button type="button" class="btn btn-outline-primary" style="Background-color:#D9534F;color:white;font-size:24px;width:225px;text-align:center;">Ajouter mon CV</button>
							<input type="file" name="uploadCv" id="uploadCv" />
						</div>
					</div>
					<p style="margin-top:10px;text-align:center;">Formats acceptés : PDF/DOC/DOCX/RTF - 3 Mo Maximum</p>
				</div>
			</div>
			<button type="submit" id="saveCv" class="hide">Upload</button>
		</form>

</div>
	<div class="col-xs-12">
		<div class="well_heading">
			<h3 style="padding-top:30px;">Infos</h3>
		</div>
	</div>
<div class="col-xs-12">
  <form action="{{ route('step1Update') }}" method="POST">
    {{csrf_field()}}
    @include('partials.validation')
    <div class="well well-lg custom_well">
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
</div>


@endsection