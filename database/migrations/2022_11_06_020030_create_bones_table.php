<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bones', function (Blueprint $table) {
            $table->id();
            $table->text('serie_bone');
            $table->float('prix_total');
            $table->integer('statut')->default(1);;
            $table->foreignId('bone_supplier_id')->constrained('suppliers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('bone_cheque_id')->constrained('checks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('bone_stock_id')->constrained('stocks')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('bones');
    }
}
