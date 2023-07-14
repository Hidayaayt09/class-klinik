<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Uuid;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'admin_id'  =>  Uuid::generate(4),
            'nama'      =>  'Administrator',
            'username'  =>  'admin',
            'email'     =>  'admin@admin.com',
            'password'  =>  bcrypt('12345678'),
        ]);
    }
}
