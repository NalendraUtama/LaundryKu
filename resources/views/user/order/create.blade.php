@extends('layouts.main')

@section('content')

<div class="container-fluid p-3">
    <div class="d-flex justify-content-end">
        <a href="{{ route('user.order') }}" class="btn btn-success mt-3 mb-3 px-3">Back</a>
    </div>
    <form method="POST" action="{{ route('user.order.create') }}">
        @csrf
            <div class="card p-3">
            <div class="row">
            <div class="col-md-6 mb-3">
              <label for="name" class="form-label">Order Name</label>
              <input type="text" class="form-control  mb-3" name="name" id="name">

              <label  class="form-label">Menu Option</label>
                <select class="form-select mb-3" id="menu" name="menu">
                    @foreach ($menu as $val)
                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                    @endforeach
                  </select>
                  
              <label for="price" class="form-label">Price</label>
              <input type="text" class="form-control mb-3" id="price" name="price" disabled>
                
              

            </div>
            <div class="col-md-6 mb-3">
              <label for="exampleInputPassword1" class="form-label">Number of Clothes</label>
              <input type="number" name="jumlah_baju" class="form-control  mb-3" id="exampleInputPassword1">

              <label for="exampleInputPassword1" class="form-label">Unit</label>
              <input type="text" name="unit" class="form-control  mb-3" id="unit" value="" disabled>

              <label for="note" class="form-label">Note</label>
                <textarea name="note" class="form-control  mb-3" placeholder="Leave a comment here" id="note"></textarea>
            </div>
            
            <div class="col-md-5">
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </div>
        </div>
    </form>
</div>
<script  src="{{ asset('js/ordercreate.js') }}"></script>
@endsection
