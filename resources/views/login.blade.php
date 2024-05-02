<!doctype html>
<html lang="en">
  <head>
    <title>Employees Management System</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <!-- End of Navigation Bar --> 
</head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Employees Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
      
      <div class="container mt-4 card p-3 big-white col-6">
        <h3 class="text-center text-primary">
           Login
        </h3>
        @if (isset($invalid))
        <div class="col-sm-12">
            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
              <strong>  {{$invalid}} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>
    @endif
    @if (session('logout'))
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
          <strong>  {{session('logout')}} </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    </div>
@endif
       <form action="{{route('login_action')}}" method="post">
        @csrf
            <div class="form-group  required">
                <label for="">Username</label>
                <input type="text" name="username" id="" class="form-control">

                <span class="text-danger">
                    @error('username')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group   required">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
            <span class="text-danger">
                @error('password')
                    {{$message}}
                @enderror
            </span>
            <br>
            <div class="container text-center">
                <button class="btn btn-primary">
                    Submit 
                </button>
                <a href="{{route('emp.signup')}}">
                  <span class="btn btn-success">
                    SignUp
                  </span>
                  </a>
            </div>

       </form>
    </div>

  </body>
</html>