@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="fs-2">{{ __('Users') }}</div>
                    <div class="">
                        <a href="{{route('user.add')}}" class="btn btn-primary">Add User</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($users as $index => $user)
                          <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('user.edit',['id' => $user->id]) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('user.delete',['id' => $user->id]) }}" class="btn btn-danger">Erase</a>
                            </td>
                          </tr>
                          
                          @empty
                              <tr>
                                <td colspan="4" class="text-center">No Users</td>
                              </tr>
                          @endforelse
                        </tbody>
                      </table>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
