<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesejosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desejos', function (Blueprint $table) {
            $table->id();
            $table->string('usuario'); // varchar 100
            $table->string('desejo'); // varchar 100
            $table->timestamps(); //created_at | updated_ate
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desejos');
    }
}
