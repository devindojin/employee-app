
<select class="form-control {{$class}}" name="selectCat">
    <option value="">None</option>
    <option value="Communications" @if($cat=="Communications") selected="selected" @else @endif>
    Communications</option>
    <option value="Technology" @if($cat=="Technology") selected="selected" @else @endif>
    Technology</option>
    <option value="Manufacturing" @if($cat=="Manufacturing") selected="selected" @else @endif>
    Manufacturing</option>
    <option value="Financial Services" @if($cat=="Financial Services") selected="selected" @else @endif>Financial Services</option>
    <option value="IT Services" @if($cat=="IT Services") selected="selected" @else @endif>IT Services</option>
    <option value="Education" @if($cat=="Education") selected="selected" @else @endif>Education</option>
    <option value="Pharma" @if($cat=="Pharma") selected="selected" @else @endif>Pharma</option>
    <option value="Real Estate" @if($cat=="Real Estate") selected="selected" @else @endif>Real Estate</option>
    <option value="Consulting" @if($cat=="Consulting") selected="selected" @else @endif>Consulting</option>
    <option value="Health Care" @if($cat=="Health Care") selected="selected" @else @endif>Health Care</option>
    <option value="Administration" @if($cat=="Administration") selected="selected" @else @endif>Administration</option>
    <option value="Advertising" @if($cat=="Advertising") selected="selected" @else @endif>Advertising</option>
    <option value="Agriculture" @if($cat=="Agriculture") selected="selected" @else @endif>Agriculture</option>
</select>