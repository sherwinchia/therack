@extends('layouts.app')

@section ('content')

<div class="container p-0">
  <div class="row">

    <div class="col-lg-3 col-md-3 col-sm-4 col-5 pl-4 filter">
      <div class="fixedfilter">

        <h3><i class="fa fa-filter"></i> Filter </h3>
        <input class="mt-3" type="text" id="search" placeholder="Enter product name" style="width:100%;">

        <div class="filterprice card">
          <div class="card-body">
            <h5 class="card-title">Price</h5>
            <input type="range" min="{{ $minPrice }}" max="{{ $maxPrice }}" value="{{ $maxPrice }}" class="slider selector" id="pricerange">
            <p class="p-0 m-0">Max: RM <span id="currentrange">{{ $maxPrice }}</span></p>
          </div>
        </div>

        <div class="filtergender card">
          <div class="card-body">
            <h5 class="card-title">Gender</h5>
            @foreach ($genders as $genders)
              <input type="checkbox" id="{{ $genders['gender'] }}" class="gender selector" name="gender" value="{{ $genders['gender'] }}" >
              <label for="{{ $genders['gender'] }}">{{ $genders['gender'] }}</label><br>
            @endforeach
          </div>
        </div>

        <div class="filterbrand card">
          <div class="card-body">
            <h5 class="card-title">Brand</h5>
            @foreach ($brands as $brands)
              <input type="checkbox" id="{{ $brands['brand'] }}" class="brand selector" name="brand" value="{{ $brands['brand'] }}" >
              <label for="{{ $brands['brand'] }}">{{ $brands['brand'] }}</label><br>
            @endforeach
          </div>
        </div>

      </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-8 col-7 pr-4">
      <h3>Product</h3>
      
      <div class="row d-flex justify-content-start" id="products">
        
      </div>

    </div>

  </div>
</div>



@endsection