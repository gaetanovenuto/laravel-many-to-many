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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('slug', 128);
            $table->string('description', 1024);
            $table->date('creation_date');
            $table->date('expiring_date')->nullable();
            $table->string('label_tag', 15)->nullable();
            $table->integer('price')->unsigned()->default(0);
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};