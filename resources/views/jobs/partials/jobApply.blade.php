<div class="job-section">
	<div>
		<p class="heading1" style="margin-bottom: 40px">&nbsp;Postuler à l'offre</p>
		<p style="margin-bottom: 40px">
			Mes coordonnées
		</p>
		<input type="text" name="email" class="form-control" style="margin-bottom: 40px">
	</div>
	@if (Auth::check())
	<p class="heading1" style="margin-bottom: 40px">Mon CV</p>
	<div style="margin-bottom: 40px">
		<div class="radio">
		  <label><input type="radio" name="optradio" checked>Utiliser le CV de mon Espace Candidat:<br>cv.pdf</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="optradio">Utiliser un nouveau CV</label>
		</div>
	</div>
	@else
	<div class="">
      	<div class="panel_form">
	        <div class="form-group">
	          	<label for="civility">Civilité:</label>
		        <select class="form-control input-lg classic" name="civility">
		            <option value="1">1</option>
		            <option value="2">2</option>
		            <option value="3">3</option>
		            <option value="4">4</option>
		        </select>
	        </div>
	        <div class="form-group">
	          	<label for="last_name">Nom:</label>
	          	<input type="text" class="form-control input-lg" id="last_name" name="last_name" value="">
	        </div>
	        <div class="form-group">
	          	<label for="first_name">Prénom:</label>
	          	<input type="text" class="form-control input-lg" id="first_name" name="first_name" value="">
	        </div>
      	</div>
      	<p style="margin-bottom: 40px">
			Mon CV
		</p>
      	<div class="form-group text-center">
			<label for="">DÉPOSER UIN CV AVIC:</label>
			<div class="dropzone">
				<div id="dropzone">
					<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="mobile-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-mobile-alt fa-w-10 fa-3x"><path fill="currentColor" d="M192 416c0 17.7-14.3 32-32 32s-32-14.3-32-32 14.3-32 32-32 32 14.3 32 32zm32-320H96v240h128V96m20-32c6.6 0 12 5.4 12 12v280c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h168zm76-16v416c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h224c26.5 0 48 21.5 48 48zm-32 0c0-8.8-7.2-16-16-16H48c-8.8 0-16 7.2-16 16v416c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V48z" class=""></path></svg>
					<div></div>
					<input type="file" name="uploadCv" id="uploadCv" />
				</div>
			</div>
			<label for="">Vos docs</label>
		</div>
    </div>
	@endif
	
	<p class="heading1">
		Me lettre de motivation
	</p>
	<textarea class="form-control" name="cover_letter" rows="10" cols="5" style="border: 5px solid #010101; height: auto">Bonjour,Je me permets de vous solliciter pour le poste de "{{ isset($data['posting_title'])?$data['posting_title']:'-' }}". Veuillez trouver mon CV en piece jointe.Cordialement</textarea>
	<div class="text-center">
		<button type="submit" class="btn">Valider ɒour terminer</button>
	</div>
</div>