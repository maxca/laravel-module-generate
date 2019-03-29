<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigModuleActionsTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('config_module_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('config_module_id');
            $table->enum('type', ['create', 'update', 'delete', 'detail', 'export', 'search']);
            $table->string('name');
            $table->string('key')->nullable();
            $table->string('link')->nullable();
            $table->string('link_action')->nullable();
            $table->integer('sort')->default(0);
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
        Schema::dropIfExists('config_module_actions');
    }
}
