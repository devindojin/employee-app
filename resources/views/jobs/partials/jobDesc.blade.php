<div class="job-section">
	<div>
		<p class="heading1">{{ isset($data['posting_title'])?$data['posting_title']:'-' }}</p>
		<p class="heading2">(H/F)*</p>
		<p class="heading1">{{ isset($data['client_name'])?$data['client_name']:'-' }}</p>
	</div>

	<div class="job-subsection">
		<a href="">
			<i class="fas fa-briefcase"></i> 
			{{ isset($data['job_type'])?$data['job_type']:'-' }}
		</a>
		<a href="">
			<i class="fa fa-map-marker"></i> 
			{{isset($data['industry'])?$data['industry']:'-'}}
		</a>
		<a href="">
			<i class="material-icons" style="font-size:14px">&#xe334;</i>
			{{isset($data['date_opened'])?$data['date_opened']:'-'}}
		</a>
	</div>
	
    @if (Request::segment('3') && Request::segment('3') == "applied")
    <button type="button" class="btn">Je postule</button>
    <div>
    	<p class="heading1"><button type="button" class="favourite" value="favourite" name="favourite"><i class="far fa-heart">&nbsp;</i></button> enregistrer l'offre</p>
    </div>
	<p class="success-msg">
		Votre candidature a bien été envoyée!
	</p>
	@else
	<button type="submit" class="btn">Je postule</button>
    <div>
    	<p class="heading1"><button type="submit" class="favourite" value="favourite" name="favourite"><i class="far fa-heart">&nbsp;</i></button> enregistrer l'offre</p>
    </div>
	@endif
</div>

<div class="job-section">
	<div>
		<p class="heading1">Description du poste</p>
		<p>
			@if(isset($data['job_description']))
			{!! $data['job_description'] !!}
			@else
			@endif
		</p>
	</div>
</div>

<div class="job-section">
	<div>
		<p class="heading1">Profil recherché</p>
		<p>
			xxxxxxxxx
		</p>
		<p>
			xxxxxxxxx
		</p>
		<p>
			efefef
		</p>
	</div>
</div>

<div class="job-section">
	<div>
		<p class="heading1">Expérience recherchée</p>
		<p>
			{{ isset($data['work_experience'])?$data['work_experience']:'-' }}
		</p>
	</div>
</div>