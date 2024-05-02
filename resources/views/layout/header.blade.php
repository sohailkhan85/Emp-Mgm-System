<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="#">
        Employees Managment System
        
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('emp.view')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('emp.view')}}">Employees</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('depts.view')}}">Departments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout1')}}">Log Out</a>


        </ul>
      </div>
    </nav>
  </body>