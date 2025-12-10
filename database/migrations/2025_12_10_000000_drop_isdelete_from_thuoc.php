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
        if (Schema::hasTable('thuoc') && Schema::hasColumn('thuoc', 'isDelete')) {
            Schema::table('thuoc', function (Blueprint $table) {
                $table->dropColumn('isDelete');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('thuoc') && ! Schema::hasColumn('thuoc', 'isDelete')) {
            Schema::table('thuoc', function (Blueprint $table) {
                $table->boolean('isDelete')->default(false)->after('CreateAt');
            });
        }
    }
};
