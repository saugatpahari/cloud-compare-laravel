<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aws_products', function (Blueprint $table) {
            $table->id();
            $table->string('instanceType')->nullable();
            $table->string('vcpu')->nullable();
            $table->string('ecu')->nullable();
            $table->string('memory')->nullable();
            $table->string('storage')->nullable();
            $table->string('price')->nullable();
            $table->string('location')->nullable();
            $table->string('gpu')->nullable();
            $table->string('unit')->nullable();
            $table->string('operatingSystem')->nullable();
            $table->string('tenancy')->nullable();
            $table->string('termType')->nullable();
            $table->string('physicalProcessor')->nullable();
            $table->string('networkPerformance')->nullable();
            $table->string('licenseModel')->nullable();
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
        Schema::dropIfExists('aws_products');
    }
}
