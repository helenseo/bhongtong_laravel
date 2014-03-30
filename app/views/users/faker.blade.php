@extends('users')
@section('main')

<h1>All Users (Faker)</h1>

@if (count($users)>0)
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Username</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Name</th>
        <th>Short bio</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->phone }}</td>
          <td>{{ $user->name }}</td>
          <td>{{$user->bio}}</td>
                
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    There are no users
@endif

@stop