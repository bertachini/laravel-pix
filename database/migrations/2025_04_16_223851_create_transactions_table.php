<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->dateTime('date');
            $table->uuid('partner_company_id');
            $table->decimal('amount', 10, 2);
            $table->uuid('transaction_status_id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('partner_company_id')->references('id')->on('partner_companies')->onDelete('restrict');
            $table->foreign('transaction_status_id')->references('id')->on('transaction_statuses')->onDelete('restrict');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
