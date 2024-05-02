<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('emp_id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('country');
            $table->string('dept');
            $table->string('designation');
            $table->string('qualification');
            $table->string('imagePath');
            $table->string('imageName');
            $table->date('dob');
            $table->date('joiningDate');
            $table->string('basicSalary');
            $table->string('allowances');
            $table->enum('familyStatus', ['Yes','No'])->default('Yes');
            $table->enum('airTicket', ['Yes','No'])->default('Yes');
            $table->enum('serviceStatus', ['Present','Retired'])->default('Present');
            $table->enum('jobType', ['Permanent','Contractual'])->default('Permanent');
            $table->enum('gratuity', ['Yes','No'])->default('Yes');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
