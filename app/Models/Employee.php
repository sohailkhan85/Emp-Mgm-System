<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="employees";
    protected $primaryKey="id";

    protected $fillable = [

        'firstName','lastName','gender','email','address','country','dept','designation',
        'qualification','dob','joiningDate','basicSalary','allowances','familyTicket',
        'airTicket','serviceStatus','jobType','gratuity'
    ];
}
