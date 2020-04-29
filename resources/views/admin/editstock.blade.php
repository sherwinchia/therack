@extends('layouts.admin')

@section ('content')

<div class="col-12 col-md-12 col-sm-12 col-lg-10">

    <h5>EDIT STOCK</h5>
    <hr>

    <form method="POST" action="{{ route('admin.editstock',['id'=>$stock->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row ">

            <div class="col-12">
                <label for="size" class="">{{ __('Size') }}</label>
                <div class="form-group">
                    <div>
                        <input id="size" type="text" class="form-control @error('size') is-invalid @enderror" name="size" value="{{ old('size') ?? $stock->size}}" required autocomplete="size" autofocus>
                        @error('size')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="quantity" class="">{{ __('Quantity') }}</label>
                <div class="form-group">
                    <div>
                        <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') ?? $stock->quantity}}" required autocomplete="quantity" autofocus>
                        @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
        
        <button type="submit" class="btn btn-primary w-100">EDIT STOCK</button>
    
    </form>

</div>
    
@endsection