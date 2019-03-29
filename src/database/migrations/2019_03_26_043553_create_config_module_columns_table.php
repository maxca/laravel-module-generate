<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigModuleColumnsTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('config_module_columns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('config_module_id');
            $table->unsignedInteger('config_module_input_type_id');
            $table->string('name');
            $table->integer('sort')->default(0);
            $table->string('label')->nullable();
            $table->timestamps();

            $table->foreign('config_module_id')
                ->references('id')->on('config_modules')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_module_columns');
    }
}
