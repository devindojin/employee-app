@if(session('success'))
<div class="col-xs-12">
<div class="alert alert-success">
   {{session('success')}}
</div>
</div>
@endif