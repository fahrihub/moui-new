<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'monoland';
        $user->email = 'mono@mail.com';
        $user->password = Hash::make('P@ssw0rd');
        $user->save();

        $user = new User();
        $user->name = 'Badan Kepegawaian Daerah Provinsi Banten';
        $user->email = 'bkd@mail.bantenprov.go.id';
        $user->password = Hash::make('bekade2022');
        $user->save();
    }
}
