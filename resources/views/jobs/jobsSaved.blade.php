@extends('layouts.main')

@section('title', 'Favourite Jobs')

@section('content')

<div class="col-xs-12">
<h2 class="heading text-center">Vos offres mémorisées</h2>
</div>

@include('partials.success')
<div class="col-xs-12 well well-lg custom_well">
	<div class="col-xs-12 job-app-sec1">
    	<div class="col-xs-6">
	        <p><b>Titre du poste</b></p>
	    </div>
	</div>
	@if(count($jobsAppArr)>0)
	@foreach($jobsAppArr as $jobs)
    <div class="col-xs-12 job-app-sec2">
    	<div class="col-xs-6">
	        <p>{{$jobs['posting_title']}}</p>
	    </div>
	    
	    <div class="col-xs-3">
	        <a class="btn" href="{{ route('job',['id'=> $jobs['jobopeningid'] ]) }}">Link</a>
	    </div>
        <div class="col-xs-3">	
        	<form action="{{ route('remove-fav',['id'=> $jobs['record_id'] ]) }}" method="POST">
        		{{csrf_field()}}
        		{{method_field('DELETE')}}
        		<button type="submit" class="delete-icon"><i class="fas fa-trash-alt"></i></button>
        	</form>
		</div>
	</div>
	@endforeach
	@else
	<p class="text-center">No Record</p>
	@endif
</div>
@endsection