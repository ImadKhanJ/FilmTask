@extends('layout')
  
@section('content')
<div class="container content mt-5">
    <h1>Create New Film</h1>
  <form method="POST" id="create-film" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
      <label>Name</label>
      <input type="text" placeholder="Film Name" name="name" class="form-control"required>
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea placeholder="Film Description" name="description" class="form-control"required></textarea>
    </div>
    <div class="form-group">
      <label>Release Date</label>
      <input type="date" name="release_date" class="form-control"required>
    </div>
    <div class="form-group">
      <label>Rating</label>
      <select name="rating" class="form-control"required>
        <option value="" disabled selected>Select Rating</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>
    <div class="form-group">
      <label>Ticket Price</label>
      <input type="number" name="ticket_price" class="form-control"required min="1">
    </div>
    <div class="form-group">
      <label>Country</label>
      <input type="text" placeholder="Country" name="country" class="form-control"required>
    </div>
    <div class="form-group">
      <label>Genre</label>
      <input type="text" placeholder="Genre" name="genre" class="form-control"required>
    </div>
    <div class="form-group">
      <label>Photo</label>
      <input type="file" name="photo" class="form-control"required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" id="saveBtn">Create Film</button>
    </div>
  </form>
</div>
@endsection