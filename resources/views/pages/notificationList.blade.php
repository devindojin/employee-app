@extends('layouts.main')

@section('title', 'user info step 1')

@section('content')

<div class="col-xs-12">
<h2 class="heading">Vos alertes</h2>
<p>vos alertes vous permettent d'être avertis rapidement si une offre se presente</p>
</div>
<div class="col-xs-12 moncv-border">
	<form action="" method="POST">
    	{{csrf_field()}}
	    <div class="well well-lg custom_well">
	      	
	      	<div class="panel_form">
		        <table class="table ">
				    <tbody>
				    @foreach ($data as $value)
				      <tr>
				        <td><b>{{$value->title}}</b></td>
				        <td>
				        	<a href="{{ route('edit-notification', ['id'=>$value->id]) }}"><i class="fas fa-pen"></i></a>
				        	<a href=""><i class="fas fa-eye"></i></a>
				        	<a href=""><i class="fas fa-trash-alt"></i></a>
				        </td>
				      </tr>
				    </tbody>
				    @endforeach
				  </table>
	      	</div>
	    </div>


	    <div class="action_block text-center">
	      <button type="submit" class="btn">Submit</button>
	    </div>
	</form>
</div>

@endsection