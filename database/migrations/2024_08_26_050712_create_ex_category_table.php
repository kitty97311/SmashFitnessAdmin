<?php

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

class CreateExCategoryTable extends Migration  
{  
    public function up()  
    {  
        Schema::create('ex_category', function (Blueprint $table) {  
            $table->id();  
            $table->string('name'); // Example column  
            $table->boolean('is_deleted')->default(0); // Example column  
            $table->timestamps();  
        });  
    }  

    public function down()  
    {  
        Schema::dropIfExists('ex_category');  
    }  
}