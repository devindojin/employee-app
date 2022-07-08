<div class="job-section">
	<div>
		<p class="heading1" style="margin-bottom: 40px">&nbsp;Postuler à l'offre</p>
	          	<label for="email" style="font-weight: 400;font-size: 18px;margin-bottom: 15px;">Email:</label>
		<input type="text" name="email" class="form-control" style="margin-bottom: 40px" value="@if(Auth::check()) {{Auth::user()->email }} @else @endif">
	</div>
	@if (Auth::check())
	<p class="heading1" style="margin-bottom: 40px">Le CV enregistré dans votre espace personnel sera utilisé. Rendez-vous dans "Mon Compte" pour le modifier</p>

	@else
	<div class="">
      	<div class="panel_form">
	        <div class="form-group">
	          	<label for="civility">Civilité:</label>
		        <select class="form-control input-lg classic" name="civility">
		            <option value="M.">M.</option>
		            <option value="Mme">Mme</option>
		            
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
      	<div class="form-group text-center">
			<div class="dropzone">
				<div id="dropzone">
					<button type="button" class="btn btn-outline-primary" style="Background-color:#D9534F;color:white;font-size:24px;width:225px;text-align:center;">Ajouter mon CV</button>
					<input type="file" name="uploadCv" id="uploadCv" />
				</div>
			</div>
		</div>
    </div>
	@endif
	
	<p class="heading1" style="display:none">
		N'hésitez pas à ajouter une lettre de motivation personnalisée pour expliquer pourquoi le poste vous correspond, et augmentez vos chances d'être contacté !
	</p>
	<textarea class="form-control" name="cover_letter" rows="10" cols="5" style="border: 1px solid #0ccccc; height: auto">Bonjour, 
Je me permets de vous solliciter pour le poste de "{{ isset($data['posting_title'])?$data['posting_title']:'-' }}". Veuillez trouver mon CV en pièce jointe. Cordialement</textarea>
	<div class="text-center">
		<button type="submit" id="postuler" class="btn btnloggedoff">Valider ɒour terminer</button>
	</div>
</div>