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
                $table->text('serie_peneu')->nullable();
                $table->text('marque_peneu')->nullable();
                $table->text('reference_filter')->nullable();
                $table->text('marque_filter')->nullable();
                $table->text('marque_baterie')->nullable();
                $table->text('num_voltage')->nullable();
                $table->text('serie_chambiere')->nullable();
                $table->text('marque_chambiere')->nullable();
                $table->float('prix_achat');
                $table->float('prix_vente');
                $table->integer('quantite_dispo');
                $table->foreignId('product_categorie_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('product_bone_id')->constrained('bones')->onUpdate('cascade')->onDelete('cascade');
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
