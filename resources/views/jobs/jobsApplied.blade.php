@extends('layouts.main')

@section('title', 'Applied Jobs')

@section('content')

<div class="col-xs-12">
<h2 class="heading text-center">Vos Candidatures</h2>
</div>

@include('partials.success')
<div class="col-xs-12 job-section">
	<div class="col-xs-12 job-app-sec1">
    	<div class="col-xs-6">
	        <p><b>Titre du poste</b></p>
	    </div>
	</div>
	@if(count($jobsAppArr)>0)
	@foreach($jobsAppArr as $jobs)
    <div class="col-xs-12">
    	<div class="col-xs-6">
	        <p>{{$jobs['posting_title']}}</p>
	    </div>
		
		<div class="col-xs-3">	
        	<p><b>{{date('m/d/y',strtotime($jobs['created_at']))}}</b></p>
		</div>    

	    <div class="col-xs-3">
	        <a href="{{ route('job',['id'=> $jobs['jobopeningid'] ]) }}"><i class="fa fa-eye"></i></a>
	    </div>
    </div>
	@endforeach
	@else
	<p class="text-center">No Record</p>
	@endif
</div>
@endsection