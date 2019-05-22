@extends('layouts.main')

@section('title', isset($data['posting_title'])?$data['posting_title']:'Job Detail Page')

@section('content')

<div class="col-xs-12">
	<form action="" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="job-page">
	    	
	    	@include('jobs.partials.jobDesc')

	    	@if (Request::segment('3') && Request::segment('3') == "applied")
	    	
	    	@include('jobs.partials.jobApplied')
	    	
	    	@else
	    	
	    	@include('jobs.partials.jobApply')
	    	
	    	@endif

	    </div>
	</form>
</div>

@endsection