<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToConfigModuleColumns extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::table('config_module_columns', function (Blueprint $table) {
            $table->foreign('config_module_input_type_id')
                ->references('id')->on('config_module_input_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('config_module_columns', function (Blueprint $table) {
            #$table->dropForeign('config_module_columns_config_module_input_type_id_foreign');
        });
    }
}
