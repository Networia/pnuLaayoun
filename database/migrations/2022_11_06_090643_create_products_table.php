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
                $table->string('reference');//reference
                $table->string('designation');
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
