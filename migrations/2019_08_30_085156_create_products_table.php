<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('sku')->comment('stock keeping unit code');
            $table->string('hsn')->comment('Harmonized System of Nomenclature');
            $table->string('description');
            $table->integer('gst', 2)->default(0)->comment('tax percentage on product i.e 0, 5, 12, 18 or 28');
            $table->bigInteger('msrp')->default(0)->comment(' manufacturer\'s suggested retail price ');
            $table->bigInteger('sale_price')->default(0)->comment('Price at which you want to sale this product !');
            $table->boolean('status')->default(false);
            $table->bigInteger('views')->default(0);
            $table->string('creator_id');
            $table->string('moderator_id');
            $table->timestamps();
        });
        
        Schema::create('attribute_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attribute_id');
            $table->bigInteger('product_id');
            $table->bigInteger('value_id');
            $table->timestamps();            
        });

        Schema::create('attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('creator_id');
            $table->string('moderator_id');
            $table->timestamps();            
        });

        Schema::create('attribute_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attribute_id');
            $table->bigInteger('value');
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('attribute_product');
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('attribute_values');
    }
}
