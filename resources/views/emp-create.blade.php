<!doctype html>
<html lang="en">
  <head>
    <title>Add Employee</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @include('layout.header')
</head>
  <body>
    <form action="{{$url}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mt-4 card p-3 big-white col-8">
            <h3 class="text-center text-primary">
                {{$title}}
            </h3>
            <h class="text-danger">
                Fields mark with red * are mandatory.
            </h>
            <br>
           <div class="row">
                <div class="col-6">
                    <div class="form-group  required">
                        <label for="">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="firstName" id="" class="form-control" value="{{$employee->firstName}}">
                        <span class="text-danger">
                            @error('firstName')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group   required">
                        <label for="">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="lastName" id="" class="form-control" value="{{$employee->lastName}}">
                    
                    <span class="text-danger">
                        @error('lastName')
                            {{$message}}
                        @enderror
                    </span>
     
                    </div>
                    <div class="form-group   required">
                        <label for="">Email <span class="text-danger">*</span></label>
                        <input type="text" name="email" id="" class="form-control" value="{{$employee->email}}">
                    
                            <span class="text-danger">
                                @error('email')
                                    {{$message}}
                                @enderror
                            </span>
                    </div>
                    <div class="form-group  required">
                        <label for="">DOB <span class="text-danger">*</span></label>
                        <input type="date" name="dob" id="" class="form-control" value="{{$employee->dob}}">
                    
                        <span class="text-danger">
                            @error('dob')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group   required">
                        <label for="">Address <span class="text-danger">*</span></label>
                        <textarea  name="address" id="" class="form-control" rows="2">
                            {{$employee->address}}
                        </textarea>
                    
                        <span class="text-danger">
                            @error('address')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
    
                    <div class="form-group   required">
                        <label for="">Gender <span class="text-danger">*</span> </label> <br>
                        
                        <input type="radio" name="gender" class="radio-inline" value="Male" id="" class="form-control" 
                            @if($employee->gender)
                                {{$employee->gender=='Male' ? 'checked' : '' }}
                            @else
                                checked
                            @endif
                        >
                        <label for="">Male</label>
                        
                        <input type="radio" name="gender" class="radio-inline" value="Female" id="" class="form-control" {{$employee->gender=='Female' ? 'checked' : '' }} >
                        <label for="">Female</label>
    
                    </div>
                    <div class="form-group   required">
                        <label for="">Family Status Entitlement <span class="text-danger">*</span></label> <br>
                        
                        <input type="radio" name="familyStatus" class="radio-inline" value="Yes" id="" class="form-control" 
                        @if($employee->familyStatus)
                            {{$employee->familyStatus=='Yes' ? 'checked' : '' }}
                        @else
                            checked
                        @endif
                        
                        >
                        <label for="">Yes</label>
                        
                        <input type="radio" name="familyStatus" class="radio-inline" value="No" id="" class="form-control" {{$employee->familyStatus=='No' ? 'checked' : '' }}>
                        <label for="">No</label>
    
                    </div>
                    <div class="form-group   required">
                        <label for="">Air Ticket Entitlement <span class="text-danger">*</span></label> <br>
                        
                        <input type="radio" name="airTicket" class="radio-inline" value="Yes" id="" class="form-control" 
                          @if ($employee->airTicket)
                            {{$employee->airTicket=='Yes' ? 'checked' : '' }}
                          @else
                            checked
                          @endif
                         
                        >
                        <label for="">Yes</label>
                        
                        <input type="radio" name="airTicket" class="radio-inline" value="No" id="" class="form-control" {{$employee->airTicket=='No' ? 'checked' : '' }}>
                        <label for="">No</label>
    
                    </div>
                    <div class="form-group   required">
                        <label for="">Job Type  <span class="text-danger">*</span></label> <br>
                        
                        <input type="radio" name="jobType" class="radio-inline" value="Permanent" id="" class="form-control" 
                        @if ($employee->jobType)
                            {{$employee->jobType=='Permanent' ? 'checked' : '' }}
                        @else
                            checked
                        @endif
                           
                        >
                        <label for="">Permanent</label>
                        
                        <input type="radio" name="jobType" class="radio-inline" value="Contractual" id="" class="form-control" {{$employee->jobType=='Contractual' ? 'checked' : '' }}>
                        <label for="">Contractual</label>
    
                    </div>
 
                </div>
               
                
                <div class="col-6">
                    <div class="form-group   required">
                        <label for="">Designation <span class="text-danger">*</span></label>
                        <input type="text" name="designation" id="" class="form-control" value="{{$employee->designation}}">
                    
                        <span class="text-danger">
                            @error('designation')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group   required">
                        <label for="">Qualification <span class="text-danger">*</span></label>
                        <input type="text" name="qualification" id="" class="form-control" value="{{$employee->qualification}}">
                    
                        <span class="text-danger">
                            @error('qualification')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group  required">
                        <label for="">Joining Date <span class="text-danger">*</span></label>
                        <input type="date" name="joiningDate" id="" class="form-control" value="{{$employee->joiningDate}}">
                    
                        <span class="text-danger">
                            @error('joiningDate')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group   required">
                        <label for="">Basic Salary <span class="text-danger">*</span></label>
                        <input type="text" name="basicSalary" id="" class="form-control" value="{{$employee->basicSalary}}">
                    
                        <span class="text-danger">
                            @error('basicSalary')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group   required">
                        <label for="">Allowances <span class="text-danger">*</span></label>
                        <input type="text" name="allowances" id="" class="form-control" value="{{$employee->allowances}}">
                    
                        <span class="text-danger">
                            @error('allowances')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group   required" >
                        <label for=""> Country <span class="text-danger">*</span></label> <br>
                        
                            <select name="country">
                                @foreach ($countries as $country)
                                <option value="{{$country->name}}" {{$employee->country==$country->name ? 'selected' : '' }}>
                                    {{$country->name}}
                                </option>
                                @endforeach
                               
                            </select>
            
                    </div>
                    <div class="form-group   required" >
                        <label for=""> Department <span class="text-danger">*</span></label> <br>
                        
                            <select name="dept">
                                @foreach ($depts as $dept)
                                <option value="{{$dept->name}}" {{$employee->dept==$dept->name ? 'selected' : '' }} >
                                    {{$dept->name}}
                                </option>
                                @endforeach
                               
                            </select>
            
                    </div>
                    <div class="form-group  required">
                        <label for="">Upload Photo </label>
                        <input type="file" name="image" id="" class="form-control" value="{{$employee->imageName}}">
                        @if($employee->imageName)
                            <img src="{{ asset('storage/uploads/'.$employee->imageName) }}" style="height: 100px;width:100px;">
                        @endif

                    </div>
                    <div class="form-group   required">
                        <label for="">Service Status <span class="text-danger">*</span></label> <br>
                        
                        <input type="radio" name="serviceStatus" class="radio-inline" value="Present" id="" class="form-control"
                            @if ($employee->serviceStatus)
                                {{$employee->serviceStatus=='Present' ? 'checked' : '' }}
                            @else
                                checked
                            @endif 
                            
                        >
                        <label for="">Present</label>
                        
                        <input type="radio" name="serviceStatus" class="radio-inline" value="Retired" id="" class="form-control" {{$employee->serviceStatus=='Retired' ? 'checked' : '' }}>
                        <label for="">Retired</label>
    
                    </div>

                    <div class="form-group   required">
                        <label for="">Gratuity Entitlement <span class="text-danger">*</span></label> <br>
                        
                        <input type="radio" name="gratuity" class="radio-inline" value="Yes" id="" class="form-control" 
                        @if ($employee->gratuity)
                            {{$employee->gratuity=='Yes' ? 'checked' : '' }}
                        @else
                            checked
                        @endif
                            
                        >
                        <label for="">Yes</label>
                        
                        <input type="radio" name="gratuity" class="radio-inline" value="No" id="" class="form-control" {{$employee->gratuity=='No' ? 'checked' : '' }}>
                        <label for="">No</label>
    
                    </div>

           </div>
                
            <div class="container text-center">
                <button class="btn btn-primary">
                    Submit 
                </button>
            </div>    
            
        </div>
    </form>
   
  </body>
  
</html>
