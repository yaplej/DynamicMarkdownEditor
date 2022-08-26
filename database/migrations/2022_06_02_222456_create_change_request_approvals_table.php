<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_request_approvals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('change_request_id')
                ->unsigned();
            $table->foreign('change_request_id')
                ->references('id')
                ->on('change_requests');
            $table->integer('approval_id')
                ->unsigned();
            $table->foreign('approval_id')
                ->references('id')
                ->on('approvals')
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
        Schema::dropIfExists('change_request_approvals');
    }
};
