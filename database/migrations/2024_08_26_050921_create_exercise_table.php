<?php

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

class CreateExerciseTable extends Migration  
{  
    public function up()  
    {  
        Schema::create('exercise', function (Blueprint $table) {  
            $table->id();  
            $table->string('name'); // Example column for exercise name  
            $table->text('description')->nullable(); // Example column for description  
            $table->boolean('is_deleted')->default(0); // Example column for soft delete  
            $table->timestamps();  
        });  
    }  

    public function down()  
    {  
        Schema::dropIfExists('exercise');  
    }  
}