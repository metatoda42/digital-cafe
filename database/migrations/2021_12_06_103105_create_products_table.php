<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
 /**
  * Run the migrations.
  *
  * @return voids
  */
 public function up()
 {
  Schema::create('products', function (Blueprint $table) {
   $table->increments('id');
   $table->string('name');
   $table->text('description');
   $table->integer('count');
   $table->integer('price');
   $table->string('media')->nullable();
   $table->softDeletes();
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
 }
}
