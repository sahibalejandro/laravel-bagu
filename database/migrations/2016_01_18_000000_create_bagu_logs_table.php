<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaguLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bagu_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level');
            $table->text('message')->nullable();
            $table->text('context')->nullable();
            $table->string('exception')->nullable();
            $table->string('script_path')->nullable();
            $table->string('script_line')->nullable();
            $table->string('code')->nullable();
            $table->text('trace')->nullable();
            $table->string('request_client');
            $table->string('request_method');
            $table->text('request_input');
            $table->string('request_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bagu_logs');
    }
}
