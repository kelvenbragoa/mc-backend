<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->text('observation_delivery')->nullable();
            $table->text('observation_returning')->nullable();
            $table->unsignedBigInteger('delivered_by_user_id');
            $table->unsignedBigInteger('returned_by_user_id')->nullable();
            $table->timestamp('delivered_date');
            $table->timestamp('returned_date')->nullable();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('device_id');
            $table->unsignedBigInteger('operation_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
