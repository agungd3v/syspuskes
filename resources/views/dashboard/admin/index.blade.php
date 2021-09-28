@extends('layouts.dashboard')
@section('dashboard', 'active')

@section('content')
<div class="row mt">
  <div class="col-md-12">
    <div class="content-panel" style="padding: 10px 20px">
      <h3>Hi, {{ Auth::user()->name }}</h3>
    </div>
  </div>
</div>
@endsection