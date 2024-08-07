<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Insert the admin user
        $userId = DB::table('users')->insertGetId([
            'name' => 'Admin',
            'email' => 'admin@shaikhalis.com',
            'password' => Hash::make('admin@123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Get the role ID for 'admin'
        $roleId = DB::table('roles')->where('name', 'admin')->value('id');

        // Assign the 'admin' role to the new user
        DB::table('role_user')->insert([
            'user_id' => $userId,
            'role_id' => $roleId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $adminEmail = 'admin@shaikhalis.com';
        $user = DB::table('users')->where('email', $adminEmail)->first();

        if ($user) {
            // Delete the role assignment
            DB::table('role_user')->where('user_id', $user->id)->delete();

            // Delete the user
            DB::table('users')->where('id', $user->id)->delete();
        }
    }
};
