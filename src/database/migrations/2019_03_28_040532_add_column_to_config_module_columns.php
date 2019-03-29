<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToConfigModuleColumns extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::table('config_module_columns', function (Blueprint $table) {
            $table->unsignedInteger('config_module_icon_id')->nullable()
                ->after('config_module_input_type_id')
                ->comment('icon');

            $table->string('value')->nullable();

            $table->foreign('config_module_icon_id')
                ->references('id')->on('config_module_icons')
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
            #$table->dropColumn(['config_module_icon_id']);
            #$table->dropForeign('config_module_columns_config_module_icon_id_foreign');
        });
    }
}
