@extends('layouts.admin')

@section ('content')

<div class="col-12 col-md-12 col-sm-12 col-lg-10">
    <div class="card">
        <div class="card-header">
            <h5>USER LIST</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Country</th>
                    <th scope="col">City</th>
                    <th scope="col">Address</th>
                    <th scope="col">Zipcode</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                  <tr>
                    <th scope="row">{{ $user->user_id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phonenumber }}</td>
                    <td>{{ $user->country }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->zipcode }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection