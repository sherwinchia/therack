@extends('layouts.admin')

@section ('content')

<div class="col-12 col-md-12 col-sm-12 col-lg-10">
    @if(Session::has('success'))
    <div class="row">
      <div class="col-12">
        <div id="charge-message" class="alert alert-success">
          {{ Session::get('success') }}
        </div>
      </div>
    </div>
    @endif
    <div class="row">
        <div class="col-4 totaluser">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-user"> USER</i>
                </div>
                <div class="card-body">
                    <h5>{{ $totaluser }}</h5>
                </div>
            </div>
        </div>
        <div class="col-4 totalorder">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-dropbox"> ORDER</i> 
                </div>
                <div class="card-body">
                    <h5>{{ $totalorder }} </h5>
                </div>
            </div>
        </div>
        <div class="col-4 totalgross">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-money"> GROSS</i>
                </div>
                <div class="card-body">
                    
                    <h5>RM {{ $totalgross }}</h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-sm-12 col-lg-8 latestorder mt-4">
            <div class="card">
                <div class="card-header">
                    LATEST ORDER
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($latest as $order)
                        <a href="{{ route('admin.showorder',['id'=>$order->id]) }}" class="list-group-item latest-order">
                            <div class="row">
                                <div class="col-12 d-flex">
                                    <div class="id" style="width:150px">Order ID: {{ $order->id }}</div>
                                    <div class="name">Customer Name: {{ $order->name }}</div>
                                    <div class="status text-success ml-auto">PAID</div> 
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-sm-12 col-lg-4 mt-4">
            <div class="card">
                <div class="card-header">
                    Reminder
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.reminder') }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <textarea name="reminder" id="" cols="27" rows="10">{{ $reminder->reminder ?? ''}}</textarea>
                        <button type="submit" class="button-primary w-100">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection