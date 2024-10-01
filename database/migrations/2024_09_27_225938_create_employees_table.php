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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 70);
            $table->string('cpf', 11);
            $table->string('registration_number', 100);
            $table->smallInteger('gender');
            $table->string('cpts_number', 100)->nullable();
            $table->string('cpts_serial', 60)->nullable();
            $table->string('cpts_uf', 2)->nullable();
            $table->date('cpts_date')->nullable();
            $table->date('admission_date');
            $table->date('dismissal_date')->nullable();
            $table->integer('cost_center');
            $table->string('capacity_unit', 12);
            $table->decimal('salary', 10, 2);
            $table->string('rg', 9);
            $table->string('position_id', 20);
            $table->string('enterprise_id', 4);
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->foreign('enterprise_id')->references('id')->on('enterprises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
