@extends('layouts.main')

@section('title', 'Notifications')

@section('content')

<div class="col-xs-12">
<h2 class="heading">Vos alertes</h2>
<p>Vos alertes vous permettent d'être avertis rapidement si une offre se presente</p>
</div>
<div class="col-xs-12">
    	@foreach ($data as $value)
	    <div class="job-section">
	      	
	      	<div class="panel_form" style="padding-bottom: 20px">
		        <div class="col-xs-12">
		        	<div class="col-xs-6">
				        <p><b>{{$value->title}}</b></p>
				    </div>
				    
				    <div class="col-xs-3">
				        <a href="{{ route('edit-notification', ['id'=>$value->id]) }}"><i class="fas fa-eye"></i></a>
				    </div>
			        <div class="col-xs-3">	
			        	<form action="{{ route('delete-notification', ['id'=>$value->id]) }}" method="POST">
			        		{{csrf_field()}}
			        		{{method_field('DELETE')}}
			        		<button type="submit" class="delete-icon"><i class="fas fa-trash-alt"></i></button>
			        	</form>
					</div>
				</div>       
			</div>
	    </div>
	    @endforeach
	    <div class="action_block text-center" style="padding-top:20px;">
	      <a class="btn" href="{{ route('notification') }}">Creer une alerte</button></a>
	    </div>
</div>
</a>

@endsection