@extends('layouts.app')

@section('content')
<div class="jumbotron">
  <h1>{{ $company->name }}</h1>
  <p>{{ $company->description }}</p>
  <p>
  	<a class="btn btn-primary btn-lg" href="#" role="button">Add</a>
  	<a class="btn btn-primary btn-lg" href="companies/{{ $company->id }}" role="button">Edit</a>
  	<a class="btn btn-primary btn-lg" href="#" role="button">Delete</a>
  	<a class="btn btn-primary btn-lg" href="#" role="button">Back</a>
  </p>
</div>

<div class="row">
	@foreach($company->projects as $project)
	<div class="col-sm-4">
		<h2>{{	$project->name }}</h2>
		<p>{{	$project->description }}</p>
		<p><a class="btn btn-primary btn-lg" href="projects/{{ $project->id }}" role="button">View Details</a></p>
	</div>
	@endforeach
</div>
@endsection