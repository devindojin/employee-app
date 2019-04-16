@extends('layouts.main')

@section('title', 'user info step 1')

@section('content')

<div class="col-xs-12">
        <form method="POST" action="" class="job-search-section">
            @csrf
           	<select class="form-control">
           		<option>1</option>
           		<option>2</option>
           	</select>
        </form>
        <div class="job-search-section">
        	<div class="search-no">{{count($data)}} offres d'emploi</div>
        	@foreach ($data as $result)
        	<div class="jss-sub-section">
	        	<a href="{{ route('job',['id'=> $result['jobopeningid']]) }}">
		        	<div>
		        		<p class="heading1">
		        		{{ isset($result['posting_title'])?$result['posting_title']:'-' }}</p>
		        		<p class="heading2">(H/F)*</p>
		        		<p class="heading1">
		        		{{ isset($result['client_name'])?$result['client_name']:'-' }}</p>
		        	</div>
	        	</a>
	        	<div class="jss-section3">
	        		<a href="">
	        			<i class="fas fa-briefcase"></i> 
	        			{{ isset($result['job_type'])?$result['job_type']:'-' }}
	        		</a>
	        		<a href="">
	        			<i class="fa fa-map-marker"></i> 
	        			{{ isset($result['industry'])?$result['industry']:'-' }}
	        		</a>
	        		<a href="">
	        			<i class="material-icons" style="font-size:14px">&#xe334;</i> 
	        			{{ isset($result['date_opened'])?$result['date_opened']:'-' }}
	        		</a>
	        	</div>
	        </div>
	        @endforeach
        </div>
</div>

@endsection