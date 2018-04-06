@extends('layouts.app')

@section('content')
<form method="post" action="{{route('Companies.update',[$company->id])}}" >
    {{csrf_field()}}
    <input name="_method" type="hidden" value="put">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" value={{$company->name}} />
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea cols="5" rows="5" class="form-control" name="description">{{$company->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection