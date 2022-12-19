<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoneProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bone_produits', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->float('prix_achat');
            $table->integer('statut')->default(1);;
            $table->foreignId('prouduit_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('boneAchat_id')->constrained('bone_achats')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('bone_produits');
    }
}
