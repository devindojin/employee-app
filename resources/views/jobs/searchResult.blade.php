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
        	<div class="search-no">12 033 offres d'emploi</div>

        	<div class="jss-sub-section">
	        	<div>
	        		<h5>Responsable Bureau d'etudes</h5>
	        		<h6>(H/F)*</h6>
	        		<h5>Cybele Conseils</h5>
	        	</div>

	        	<div class="jss-section3">
	        		<a href="">
	        			<i class="fas fa-briefcase"></i> CDI
	        		</a>
	        		<a href="">
	        			<i class="fa fa-map-marker"></i> 77
	        		</a>
	        		<a href="">
	        			<i class="material-icons" style="font-size:14px">&#xe334;</i> il y a un mois
	        		</a>
	        	</div>
	        </div>
	        <div class="jss-sub-section">
	        	<div>
	        		<h5>Responsable Bureau d'etudes</h5>
	        		<h6>(H/F)*</h6>
	        		<h5>Cybele Conseils</h5>
	        	</div>

	        	<div class="jss-section3">
	        		<a href="">
	        			<i class="fas fa-briefcase"></i> CDI
	        		</a>
	        		<a href="">
	        			<i class="fa fa-map-marker"></i> 77
	        		</a>
	        		<a href="">
	        			<i class="material-icons" style="font-size:14px">&#xe334;</i> il y a un mois
	        		</a>
	        	</div>
	        </div>
        </div>
</div>

@endsection