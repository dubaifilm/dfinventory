<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDfInventories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('df_inventories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('dfserial');
            $table->string('dfstatus');
            $table->string('dfitem');
            $table->string('dfdescription');
            $table->string('dfremarks')->default("remarks");
            $table->string('dfcategory');
            $table->string('dfstorage');
            $table->string('dfproductimg');
            $table->integer('df_cart')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('df_inventories');
    }
}
