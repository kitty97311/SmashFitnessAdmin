<?php

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

class CreateSendNotificationTable extends Migration  
{  
    public function up()  
    {  
        Schema::create('send_notification', function (Blueprint $table) {  
            $table->id();  
            $table->string('title'); // Example column for notification title  
            $table->text('message'); // Example column for notification message  
            $table->boolean('is_sent')->default(0); // Example column to track if sent  
            $table->timestamps();  
        });  
    }  

    public function down()  
    {  
        Schema::dropIfExists('send_notification');  
    }  
}