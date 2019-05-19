<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSidebarsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('sidebars', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('name');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('link');
            $table->string('icon');
            $table->enum('type', ['child', 'parent', 'label'])->default('parent');
            $table->text('permissions')->nullable();
            $table->text('roles')->nullable();
            $table->integer('notify')->default(0);
            $table->integer('sort')->default(999);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sidebars');
    }
}
