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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->integer('bar_code')->nullable();
            $table->string('med_name')->nullable();
            $table->string('category')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('sell_type')->nullable();
            $table->text('reg_date')->nullable();
            $table->text('exp_date')->nullable();
            $table->string('company')->nullable();
            $table->integer('actual_price');
            $table->integer('selling_price');
            $table->integer('profit_price');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
