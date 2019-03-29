<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigModuleSearchesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('config_module_searches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('config_module_id');
            $table->unsignedInteger('config_module_column_id');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('sort')->default(0);
            $table->timestamps();

            $table->foreign('config_module_id')
                ->references('id')->on('config_modules')
                ->onDelete('cascade');

            $table->foreign('config_module_column_id')
                ->references('id')->on('config_module_columns')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_module_searches');
    }
}
