<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::admin()->pluck('id')->first();
        $admin = ['first_name'=>'Dmitrii', 'last_name' => 'Kyrochkin','email'=>'admin@gmail.com','password'=>bcrypt('123456')];

        $user = User::firstOrCreate(
            ['email' => $admin['email']],
            $admin);

        DB::table('role_user')->insert([
            'user_id' => $user->id,
            'role_id' => $roleAdmin,
//            'created_at' => new Expression('NOW()'),
//            'updated_at' => new Expression('NOW()')
        ]);

        $roleUser = Role::user()->pluck('id')->first();
        $users = User::factory(3)->create();
        foreach($users as $customer)
        {
            $customer->roles()->attach($roleUser);
//            ,[
////            'created_at' => new Expression('NOW()'),
////            'updated_at' => new Expression('NOW()'),
//            ]);
        }


    }
}
