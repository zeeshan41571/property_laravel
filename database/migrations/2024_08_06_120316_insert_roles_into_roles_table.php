<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'created_at' => now(), 'updated_at' =>now()],
            ['name' => 'owner', 'created_at' => now(), 'updated_at' =>now()],
            ['name' => 'staff', 'created_at' => now(), 'updated_at' =>now()],
            ['name' => 'guest', 'created_at' => now(), 'updated_at' =>now()],
            ['name' => 'parking manager', 'created_at' => now(), 'updated_at' =>now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('roles')->whereIn('name', ['admin', 'owner', 'staff', 'guest', 'parking manager'])->delete();
    }
};
