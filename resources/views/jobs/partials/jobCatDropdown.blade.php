
<select class="form-control {{$class}}" name="selectCat">
    <option value="">Toutes les offres</option>
    <option value="Terrain" @if($cat=="Terrain") selected="selected" @else @endif>Terrain</option>
    <option value="Encadrement et management" @if(urldecode($cat)=="Encadrement et management") selected="selected" @else @endif>Encadrement et management</option>
    <option value="Bureau d'études" @if(urldecode($cat)=="Bureau d'études") selected="selected" @else @endif>Bureau d'études</option>
    <option value="Commercial et administratif" @if(urldecode($cat)=="Commercial et administratif") selected="selected" @else @endif>Commercial et administratif</option>
    <option value="Enseignement" @if($cat=="Enseignement") selected="selected" @else @endif>Enseignement</option>
</select>

<!-- <input type="text" class="form-control" name="postcode" placeholder="Code postal"> -->