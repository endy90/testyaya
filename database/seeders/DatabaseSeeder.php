<?php

namespace Database\Seeders;
use App\Models\User as User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user= new User;
        $user->nom = 'DANG';
        $user->prenom = 'Yaya';
        $user->email= 'dnhalan0101@gmail.com';
        $user->password=bcrypt('123456789');
        $user->is_admin=1;
        $user->save();
    }
}
