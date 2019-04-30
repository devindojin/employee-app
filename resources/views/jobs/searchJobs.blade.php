@extends('layouts.main')

@section('title', 'Search Jobs')

@section('content')
<div class="col-xs-12">
    <div class="login_wrapper">
        <form method="POST" action="" class="form-signin">
            @csrf
            <h3 class="title">Le job de vos rêves est ici</h3>
            <div class="form-froup">
            	@include('jobs.partials.jobCatDropdown',['class'=> ''])
        	</div>
        	<div class="form-froup margin-top-20">
            	@include('jobs.partials.jobLocDropdown')
        	</div>
        	<div class="form-froup margin-top-20">
	            <button type="submit" class="btn btn-lg btn-default">
	                Rechercher
	            </button>
        	</div>
        </form>
    </div>
</div>
@endsection
