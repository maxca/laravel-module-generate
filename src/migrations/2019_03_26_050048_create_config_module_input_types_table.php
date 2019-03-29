<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigModuleInputTypesTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('config_module_input_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type', ['input', 'file'])->default('input');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('allowed_input', ['all', 'th', 'en', 'number', 'en_th'])->default('all');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_module_input_types');
    }
}
