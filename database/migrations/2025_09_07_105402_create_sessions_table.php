<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('sessions')) {
            Schema::create('sessions', function (Blueprint $table) {
                $table->string('id')->primary();
                $table->foreignId('user_id')->nullable()->index();
                $table->string('ip_address', 45)->nullable();
                $table->text('user_agent')->nullable();
                $table->longText('payload');
                $table->integer('last_activity')->index();
                $table->string('locale', 10)->nullable();
                $table->timestamps();
            });
        } else {
            // Add any missing columns if the table already exists
            Schema::table('sessions', function (Blueprint $table) {
                if (!Schema::hasColumn('sessions', 'locale')) {
                    $table->string('locale', 10)->nullable()->after('last_activity');
                }
                if (!Schema::hasColumn('sessions', 'created_at')) {
                    $table->timestamps();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
