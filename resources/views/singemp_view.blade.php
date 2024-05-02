<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    @include('layout.header')
       <div>
 
            <div class="text-center text-primary col-8">
               <h3> EMPLOYEE DATA</h3>
            </div>
        </h3>
        
        
        <div class="container col-12">
            <div class="row">
                <div class="container col-8">
                    <table class="table table-bordered table-striped">

                        <tr>
                            <td><strong>First Name</strong> </td>
                            <td>{{$Emp->firstName}}</td>
                        </tr>
                        <tr>
                            <td><strong>Last Name</strong></td>
                            <td>{{$Emp->lastName}}</td>
                        </tr>
                        <tr>
                            <td><strong>Gender</strong></td>
                            <td>{{$Emp->gender}}</td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>{{$Emp->email}}</td>
                        </tr>
                        <tr>
                            <td><strong>Address</strong></td>
                            <td>{{$Emp->address}}</td>
                        </tr>
                        <tr>
                            <td><strong>Country</strong></td>
                            <td>{{$Emp->country}}</td>
                        </tr>
                        <tr>
                            <td><strong>Department</strong></td>
                            <td>{{$Emp->dept}}</td>
                        </tr>
                        <tr>
                            <td><strong>Designation</strong></td>
                            <td>{{$Emp->designation}}</td>
                        </tr>
                        <tr>
                            <td><strong>Qualification</strong></td>
                            <td>{{$Emp->qualification}}</td>
                        </tr>
                        <tr>
                            <td><strong>Date of Birth</strong></td>
                            <td>{{$Emp->dob}}</td>
                        </tr>
                        <tr>
                            <td><strong> Date of Birth</strong></td>
                            <td>{{$Emp->joiningDate}}</td>
                        </tr>
                        <tr>
                            <td><strong> Basic Salary</strong></td>
                            <td>{{$Emp->basicSalary}}</td>
                        </tr>
                        <tr>
                            <td><strong>Allowances</strong></td>
                            <td>{{$Emp->allowances}}</td>
                        </tr>
                        <tr>
                            <td><strong>Family Status Entitlement</strong></td>
                            <td>{{$Emp->familyStatus}}</td>
                        </tr>
                        <tr>
                            <td><strong>Air Ticket Entitlement</strong></td>
                            <td>{{$Emp->airTicket}}</td>
                        </tr>
                        <tr>
                            <td><strong>Service Status</strong></td>
                            <td>{{$Emp->serviceStatus}}</td>
                        </tr>
                        <tr>
                            <td><strong>Job Type</strong></td>
                            <td>{{$Emp->jobType}}</td>
                        </tr>
                        <tr>
                            <td><strong>Gratuity Entitlement</strong</td>
                            <td>{{$Emp->gratuity}}</td>
                        </tr>
                        
                       
                                     
                    </table>
                </div>
                <div class="cotainer col-4">
                    <table>
                        <tr>
                            <td>
                                @if($Emp->imageName)
                                <img src="{{ asset('storage/uploads/'.$Emp->imageName) }}" style="height: 250px;width:250px;">
                                @else 
                                <span>No image found!</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                
            </div>
           
        </div>


       </div>
       @include('layout.footer')
  </body>
</html>