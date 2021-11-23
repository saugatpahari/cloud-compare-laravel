<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAzureProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('azure_products', function (Blueprint $table) {
            $table->id();
            $table->boolean('availableForML')->nullable();
            $table->string('cores')->nullable();
            $table->string('diskSize')->nullable();
            $table->string('gpu')->nullable();
            $table->boolean('isVcpu')->nullable();
            $table->string('ram')->nullable();
            $table->string('series')->nullable();
            $table->longtext('price_perhour')->nullable();
            $table->longtext('price_perhour_oneyear')->nullable();
            $table->longtext('price_perhour_threeyear')->nullable();
            $table->longtext('price_perhourspot')->nullable();
            $table->string('offerType')->nullable();
            $table->string('pricingType')->nullable();
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
        Schema::dropIfExists('azure_products');
    }
}
