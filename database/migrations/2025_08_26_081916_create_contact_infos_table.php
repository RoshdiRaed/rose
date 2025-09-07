<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInfosTable extends Migration
{
    public function up()
    {
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->string('address_en');
            $table->string('address_ar');
            $table->string('phone');
            $table->string('email');
            $table->text('map_embed')->nullable(); // For Google Maps embed code
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_infos');
    }
}
