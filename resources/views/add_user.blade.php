@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="fs-2">
                        @if (isset($edit))
                            <p class="fs-2">Edit user</p>
                        @else
                           <p class="fs-2">New user</p>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="@if (isset($edit->id)) {{route('user.update',['id'=> $edit->id])}} @else {{ route('user.store') }} @endif">
                        @csrf

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="@if (isset($edit->id)) {{ $edit->name }} @else {{ old('name') }} @endif">
                          @if ($errors->has('name'))
                             <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="@if (isset($edit->id)) {{ $edit->email }} @else {{ old('email')  }} @endif">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                             @endif
                          </div>
                           @if (!isset($edit->id))
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" >
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                           @endif
                          
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
