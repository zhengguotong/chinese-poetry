<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParagraphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paragraphs', function (Blueprint $table) {
            $table->integer('poetry_id')->unsigned();
            $table->foreign('poetry_id')->references('id')->on('poetry')
                ->onDelete('cascade');
            $table->tinyInteger('sequence');
            $table->string('paragraph', 1000);
            $table->timestamps();
            $table->primary(['poetry_id', 'sequence']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paragraphs');
    }
}
