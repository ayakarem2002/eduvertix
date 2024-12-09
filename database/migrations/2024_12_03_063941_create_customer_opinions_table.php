<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOpinionsTable extends Migration
{
    public function up()
    {
        Schema::create('customer_opinions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('job_title');
            $table->text('opinion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_opinions');
    }
}
