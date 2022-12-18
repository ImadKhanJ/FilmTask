@extends('layout')
  
@section('content')
<div class="container content mt-5">
    <h1>{{ $findFilm['name'] }}</h1>
    <div class="form-group">
      <label>Description</label>
      <textarea class="form-control"> {{ $findFilm['description'] }}</textarea>
    </div>
    <div class="form-group">
      <label>Release Date</label>
      <input type="text" class="form-control" value="{{ date('d-M-Y',strtotime($findFilm['release_date'])) }}">
    </div>
    <div class="form-group">
      <label>Rating</label>
      <select name="rating" class="form-control"required>
        <option value="" disabled selected>Select Rating</option>
        <option value="1" {{ ($findFilm['rating']==1)?'selected':'' }}>1</option>
        <option value="2" {{ ($findFilm['rating']==2)?'selected':'' }}>2</option>
        <option value="3" {{ ($findFilm['rating']==3)?'selected':'' }}>3</option>
        <option value="4" {{ ($findFilm['rating']==4)?'selected':'' }}>4</option>
        <option value="5" {{ ($findFilm['rating']==5)?'selected':'' }}>5</option>
      </select>
    </div>
    <div class="form-group">
      <label>Ticket Price</label>
      <input type="text" class="form-control" value="{{$findFilm['ticket_price']}}">
    </div>
    <div class="form-group">
      <label>Country</label>
      <input type="text" value="{{$findFilm['ticket_price']}}" class="form-control">
    </div>
    <div class="form-group">
      <label>Genre</label>
      <input type="text" value="{{$findFilm['genre']}}" class="form-control">
    </div>
    @if(count($comments) > 0 )
    <div class="col-12" id="accordion2">
        <div class="card card-dark card-outline">
            <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                <div class="card-header">
                    <h4 class="card-title w-100" style="color: #212529;">
                        Comments
                    </h4>
                </div>
            </a>
            <div id="collapseTwo" class="collapse show" data-parent="#accordion2">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        @foreach($comments as $key => $comment)
                        <tr>
                          <th>User</th>
                          <td>{{ $comment['user_id'] }}</td>
                          <th>Comment</th>
                          <td>{{ $comment['comment'] }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="form-group">
      <img src="https://apifilms.webappcart.com/storage/{{$findFilm['photo']}}">
    </div>
</div>
@endsection