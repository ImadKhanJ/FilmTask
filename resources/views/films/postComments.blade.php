@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post New Comment</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route("addComments", [$film]) }}" enctype="multipart/form-data">
                    @csrf    
                      <div class="form-group">
                        <label>Comment</label>
                        <textarea placeholder="Write Comment" name="comment" class="form-control"required></textarea>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection