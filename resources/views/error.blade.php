@extends('layouts.app')

@section('content')
@if(!empty($errorMessage))
  <div class="alert alert-danger"> {{ $errorMessage }}</div>
@endif
@endsection
