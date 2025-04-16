<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerCompaniesTable extends Migration
{
    public function up(): void
    {
        Schema::create('partner_companies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('company_name');
            $table->string('cnpj')->unique();
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('access_token')->unique();
            $table->decimal('balance', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partner_companies');
    }
}
