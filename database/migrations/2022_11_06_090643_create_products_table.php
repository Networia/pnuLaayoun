<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('serie_peneu')->nullable();
                $table->string('marque_peneu')->nullable();
                $table->string('reference_filter')->nullable();
                $table->string('marque_filter')->nullable();
                $table->string('marque_baterie')->nullable();
                $table->string('num_voltage')->nullable();
                $table->string('serie_chambrere')->nullable();
                $table->string('marque_chambrere')->nullable();
                $table->string('serie_huile')->nullable();
                $table->string('marque_huile')->nullable();
                $table->decimal('lettrage_huile')->nullable();
                $table->decimal('prix_achat');
                $table->decimal('prix_vente');
                $table->integer('quantite_dispo')->nullable();
                $table->foreignId('product_categorie_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('product_bone_id')->constrained('bones')->nullable()->unsigned();
                $table->foreignId('product_stock_id')->constrained('stocks')->onUpdate('cascade')->onDelete('cascade');
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
