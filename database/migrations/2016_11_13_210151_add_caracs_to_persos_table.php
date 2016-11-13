<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCaracsToPersosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('persos', function (Blueprint $table) {
            $table->integer('FO')->comment('Force')->default(50);
            $table->integer('AG')->comment('Agilité')->default(50);
            $table->integer('CO')->comment('Constitution')->default(50);
            $table->integer('IG')->comment('Intelligence')->default(50);
            $table->integer('IT')->comment('Intuition')->default(50);
            $table->integer('CH')->comment('Charisme')->default(50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('persos', function (Blueprint $table) {
            $table->dropColumn('FO', 'AG', 'CO', 'IG', 'IT', 'CH');
        });
    }
}
