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
        Schema::create('profissionals', function (Blueprint $table) {
            $table->id();
            $table-> string('nome', 120)->nullable(false);
            $table-> string('celular', 11)->nullable(false);
            $table-> string('email',120)->Unique()->nullable(false);
            $table-> string('cpf',11 )->Unique()->nullable(false);
            $table-> date('dataNascimento', )->nullable(false);
            $table-> string('cidade',120)->nullable(false);
            $table-> string('estado',2)->nullable(false);
            $table-> string('pais',80)->nullable(false);
            $table-> string('rua',120)->nullable(false);
            $table-> string('numero',10)->nullable(false);
            $table-> string('bairro',100)->nullable(false);
            $table-> string('cep',8)->nullable(false);
            $table-> string('complemento',150)->nullable(true);
            $table-> string('password',)->nullable(false);
        
 
            $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profissionals');
    }
};
