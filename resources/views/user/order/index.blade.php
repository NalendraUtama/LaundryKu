@extends('layouts.main')

@section('content')

<div class="container-fluid p-3">
    <h2>{{ Auth::user()->name }} Order's</h2>
    <div class="d-flex justify-content-end">

        <a href="{{ route('user.order.create') }}" class="btn btn-primary mt-3 ">Add Order</a>
    </div>
    <div class="card mb-4 mt-2">
        <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Order Name</th>
                <th>Order Menu</th>
                <th>Order Status</th>
                <th>Order Total Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($record as $val)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>Anggap aja Nama Order</td>
                    <td>{{ $val->menu->name }}</td>
                    <td>
                        @if ($val->status->id == 1 )
                        <span class="badge text-bg-warning">{{ $val->status->name }}</span>
                        @endif
                        @if ($val->status->id == 2 )
                        <span class="badge text-bg-primary">{{ $val->status->name }}</span>
                        @endif
                        @if ($val->status->id == 3 )
                        <span class="badge text-bg-success">{{ $val->status->name }}</span>
                        @endif
                    </td>
                    <td>{{$val->jumlah_baju * $val->menu->price }}</td>
                    <td>
                        <button class="btn btn-warning">Detail</button>
                        <button class="btn btn-danger">Cancel</button>
                    </td>
                  </tr>
                @endforeach
              
              
            </tbody>
          </table>
    </div>
</div>

@endsection
