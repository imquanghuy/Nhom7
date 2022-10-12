<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphams', function (Blueprint $table) {
            $table->id();
            $table->string('tensp');
            $table->string('dongia');
            $table->string('hinhanh');
            $table->integer('soluong');
            $table->text('cauhinh');
            $table->text('mota');
            $table->integer('category_id');
            $table->integer('menu_id');
            $table->tinyInteger('active');
            $table->integer('view');
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
        Schema::dropIfExists('sanphams');
    }
}
