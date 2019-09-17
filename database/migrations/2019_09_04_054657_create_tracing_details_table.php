<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Tests\TestCase;

class CreateTracingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracing_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tracing_id');
            $table->foreign('tracing_id')->references('id')->on('tracings');
            $table->string('page_no');
            $table->string('page_name');
            $table->enum('edition',['1st','2nd']);
            $table->unsignedBigInteger('operator_id');
            $table->foreign('operator_id')->references('id')->on('employees');
            $table->time('tracing_time');
            $table->time('printed_time')->nullable();
            $table->time('recieved_time')->nullable();
            $table->string('recieved_by')->nullable();
            $table->string('status')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('tracing_details');
    }
}
