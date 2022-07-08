<nav class="top_bar visible-xs visible-sm" style="list-style-type: none;"> 
	<ul class="list-inline menu_listxs list-unstyled">
	    	<li style="padding-left:50px"><a href="https://candidats.emploi-paysagiste.fr/emploi/public/jobs">Retour aux Annonces</a></li>
	</ul>
</nav>

	<!-- Header  -->
		<div class="job-section">
			<div>
				<h1>{{ isset($data['posting_title'])?$data['posting_title']:'-' }} (H/F) <span class="badge badge-pill badge-secondary">{{ isset($data['job_type'])?$data['job_type']:'-' }}</span></h1>
				<h2 class="company_name"> <i class="fas fa-building"></i> {{ isset($data['client_name'])?$data['client_name']:'-' }}</h2>
				<p><i class="fa fa-map-marker"></i> - {{ isset($data['state'])?$data['state']:'Région non précisée' }} - {{ isset($data['zip_code'])?$data['zip_code']:'Code Postal non précisé' }}		</p>
				<p><i class="fa fa-money-bill-alt"></i> - Salaire (indicatif) : {{ isset($data['salary'])?$data['salary']:'Non renseigné' }} € </p>
				<p><i class="fa fa-calendar-minus"></i> - Publication : {{isset($data['date_opened'])?$data['date_opened']:'-'}} </p>
			</div>

						@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
N'oubliez pas de déposer votre CV ou vos informations de candidature :)
        </ul>
    </div>
@endif

			@if (Request::segment('3') && Request::segment('3') == "applied")
				<div class="btnpostulation">
					<button type="button" class="btn">Postuler pour ce job</button>
					</div>
				<p class="success-msg">
					Votre candidature a bien été envoyée!
				</p>
			@else

			<div class="btnpostulation">
				<a href="#postuler"><button type="button" class="btn">Postuler pour ce job</button></a>
			</div>
			
			@endif
		</div> 

	<!-- Job Description  -->

		<div class="job-section">
				<h2>{{ isset($data['client_name'])?$data['client_name']:'-' }}</h2>
				<p>
					{{ isset($data['description_entreprise'])?$data['description_entreprise']:'Non renseigné' }}
				</p>

				<h2>Le poste</h2>
				<p>
					@if(isset($data['job_description']))
					{!! $data['job_description'] !!}
					@else
					@endif
				</p>
				<h2>Profil recherché</h2>
				<p> {{ isset($data['le_profil_idéal'])?$data['le_profil_idéal']:'Non renseigné' }}</p>
				<p>Expérience : {{ isset($data['niveau_expérience'])?$data['niveau_expérience']:'Sans expérience particulière requise' }}</p>
				<p>Formation : {{ isset($data['niveau_de_formation'])?$data['niveau_de_formation']:'Sans diplôme particulier requis' }}</p>


				<div class="sharethis-inline-share-buttons" style="padding-top:30px;padding-bottom:30px"></div>
		</div>

