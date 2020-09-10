<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('plan_id');
            $table->string('cnpj')->unique();
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->string('email')->unique();
            $table->string('logo')->nullable();

            //Status tenant (se inativo 'N', perde acesso ao sistema)
            $table->enum('active', ['Y', 'N'])->default('Y');

            //Sub
            $table->date('subscription')->nullable(); //data inscrição
            $table->date('expires_at')->nullable(); //data que o acesso expira
            $table->string('sub_id', 255)->nullable(); //
            $table->boolean('sub_active')->default(false); //Assinatura ativa
            $table->boolean('sub_suspended')->default(false); //Assinatura cancelada

            $table->foreign('plan_id')->references('id')->on('plans');



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
        Schema::dropIfExists('tenants');
    }
}
