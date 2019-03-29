<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigModuleRulesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {

        Schema::create('config_module_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type', ['normal', 'custom'])->default('normal');
            $table->string('alert_message');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_module_rules');
    }
}
