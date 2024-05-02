<!doctype html>
<html lang="en">
  <head>
    <title>Employees Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <!--Alert Delete  --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 

</head>
  <body>
    @include('layout.header')
       <div class="container">
    <!-- For Successful Login Message -->
        @if (session('success'))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
              <strong> {{ session('success') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>
        @endif
    <!-- Customer Restored Successfully -->
              @if (session('restored'))
              <div class="col-sm-12">
                  <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <strong> {{ session('restored') }} </strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
              </div>
              @endif


        <!-- Deleted Successfully -->
        @if (session('deleted'))
        <div class="col-sm-12">
            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
              <strong> {{ session('deleted') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>
        @endif

    <!-- Updated Successfully -->
                @if (session('updated'))
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                      <strong> {{ session('updated') }} </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                </div>
                @endif
    <!-- Registration Successfully -->
                                @if (session('reg-success'))
                                <div class="col-sm-12">
                                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                      <strong> {{ session('reg-success') }} </strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                </div>
                                @endif

        <h3>
            <div class="text-center text-primary">
                EMPLOYEES DATA
            </div>
        </h3>
        
            <div class="container">
                <div class="row m-2">
                    <form action="{{route('emp.view')}}" class="col-9">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="search" id="search" class="form-control" placeholder="Search By First or Last Name">
                        </div>
                        <button class="btn btn-primary">Search</button>
                        <a href="{{route('emp.view')}}">
                            <button class="btn btn-primary" type="button">Reset</button>
                        </a>
                    </form>
                    <div class="col-3">
                   <a href="{{route('emp.create')}}"> 
                    <button class="btn btn-primary d-inline-block ml-2 flot-right">Add</button>
                    </a>
                    &nbsp;
                    <a href="{{route('trash.view')}}"> 
                        <button class="btn btn-danger d-inline-block ml-2 flot-right">View Trash</button>
                        </a>
                    </div>
                </div>
            </div>
        <table class="table">

            <thead>
               @if(sizeof($employees))
                
                    <tr align="center">
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Designation</th>
                        <th>Qualification</th>
                        
                        <th>Deparment</th>

                        <th>Action</th>
                    </tr>
                @else
                    <strong><span class="alert alert-danger"> Record not Found.</span></strong>
                @endif

            </thead>
            <tbody>
                @foreach ($employees as $data)
                    
                <tr align="center">
                    <td>{{$data->firstName}}</td>
                    <td>{{$data->lastName}}</td>
                    
                    <td>{{$data->designation}}</td>
                    <td>{{$data->qualification}}</td>
                    <td>{{$data->dept}}</td>
                    
               
                    <div class="col-3">
                    
                        <td>
                        
                            <a href="{{route('singemp.view', ['id'=>$data->id])}}">
                                <button class=" btn btn-dark d-inline-block ">View</button>
                            </a>

                            <a href="{{route('emp.edit', ['id'=>$data->id])}}">
                                <button class=" btn btn-success d-inline-block ">Edit</button>
                            </a>
                            <form method="get" action="{{ route('emp.delete', $data->id) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm d-inline-block ml-2 flot-right " data-toggle="tooltip" title='Delete'>Trash</button>
                            </form>
                        
                        </td>
                    
                    </div>
                
                </tr>
                @endforeach

            </tbody>
        </table>
        @if ($search=="")
            <div class="row">
                 {{$employees->links()}}
            </div>
        @endif   
       </div>
       @include('layout.footer')
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "It will go into Trash.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
</html>