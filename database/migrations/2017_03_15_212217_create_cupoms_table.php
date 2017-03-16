<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCupomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupoms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 128);
            $table->decimal('value');
            $table->boolean('used')->default(0);
            $table->timestamps();
        });

        Schema::table('orders', function(Blueprint $table){
            $table->unsignedInteger('cupom_id')->nullable();
            $table->foreign('cupom_id')->references('id')->on('cupoms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function(Blueprint $table){
            $table->dropForeign('orders_cupom_id_foreign');
            $table->dropColumn('cupom_id');
        });
        Schema::dropIfExists('cupoms');
    }
}
