<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sends', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->foreignId('id_prisoner');
            $table->foreignId('id_admin')->nullable();
            $table->date('date');
            $table->enum('session', [1, 2]);
            $table->enum('type1', [null ,'makanan', 'pakaian', 'minuman']);
            $table->text('desc1');
            $table->enum('type2', [null ,'makanan', 'pakaian', 'minuman'])->nullable();
            $table->text('desc2')->nullable();
            $table->enum('type3', [null ,'makanan', 'pakaian', 'minuman'])->nullable();
            $table->text('desc3')->nullable();
            $table->text('admin_note')->nullable();
            $table->enum('status', ['disetujui', 'ditolak', 'dalam antrian']);
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
        Schema::dropIfExists('sends');
    }
}
