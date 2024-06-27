<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     
    <!-- End of Navigation Bar --> 
    @include('layout.header');
</head>
  <body>

      
      <div class="container mt-4 card p-3 big-white">
        <h3 class="text-center text-primary">
           Register
        </h3>
        @if (isset($success))
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <strong>  {{$success}} </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div>
        @endif
       <form action="{{route('emp_signup_action')}}" method="post">
        @csrf
        <div class="form-group  required">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" value="{{old('name')}}">

            <span class="text-danger">
                @error('name')
                    {{$message}}
                @enderror
            </span>
        </div>
            <div class="form-group  required">
                <label for="">Username</label>
                <input type="text" name="username" id="" class="form-control" value="{{old('username')}}">

                <span class="text-danger">
                    @error('username')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group  required">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" value="{{old('email')}}">

                <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group   required">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control" value="{{old('password')}}">
                <span class="text-danger">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group   required">
                <label for="">Confirm Password</label>
                <input type="password" name="password_confirmation" id="" class="form-control" value="{{old('password_confirmation')}}">
            </div>
            <span class="text-danger">
                @error('password_confirmation')
                    {{$message}}
                @enderror
            </span>
            <br>
            <div class="text-center">
                <button class="btn btn-success">
                    Submit 
              </button>
            </div>
              

            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
       </form>
    </div>

  </body>
</html>