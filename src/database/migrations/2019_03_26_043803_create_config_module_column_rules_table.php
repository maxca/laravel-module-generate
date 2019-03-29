<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigModuleColumnRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_module_column_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('config_module_column_id');
            $table->unsignedInteger('config_module_rule_id');
            $table->string('value')->nullable();
            $table->timestamps();

            $table->foreign('config_module_column_id')
                ->references('id')->on('config_module_columns')
                ->onDelete('cascade');

            $table->foreign('config_module_rule_id')
                ->references('id')->on('config_module_rules')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_module_column_rules');
    }
}
