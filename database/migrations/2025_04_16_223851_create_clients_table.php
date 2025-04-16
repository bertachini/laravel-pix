<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('cpf')->unique();
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('account_number')->unique();
            $table->decimal('balance', 10, 2)->default(0);
            $table->uuid('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
}
