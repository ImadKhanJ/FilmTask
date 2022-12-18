@extends('layout')
  
@section('content')
<div class="container">
    <h1>Innovative Solutions Test</h1>
    <div class="alert alert-success" role="alert">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <a class="btn btn-success" href="{{ route('films.create') }}" id="createNewProduct" style="float:right;"> Create New Film</a><br><br><br>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Release Date</th>
                <th>Rating</th>
                <th>Price</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection