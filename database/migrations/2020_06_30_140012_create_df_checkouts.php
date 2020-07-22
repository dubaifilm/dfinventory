<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDfCheckouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('df_checkouts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('dfform');
            $table->string('dfserial');
            $table->string('dfstatus');
            $table->string('dfitem');
            $table->string('o_subfile');
            $table->json('o_subf')->default("none");
            $table->string('dfdescription');
            $table->string('dfremarks')->default("remarks");
            $table->string('dfcategory');
            $table->string('dfstorage');
            $table->string('dfproductimg');
            $table->string('o_name');
            $table->string('o_companyid');
            $table->string('o_projname');
            $table->string('o_projdate');
            $table->string('o_projdura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('df_checkouts');
    }
}
