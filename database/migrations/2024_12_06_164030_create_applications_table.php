<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_applications_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('title');           // Title of the application
            $table->text('description');       // Description of the application
            $table->string('image')->nullable(); // Path to the image
            $table->timestamps();             // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
