<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/**
 * Seeder untuk membuat akun owner SISFARM
 * Jalankan dengan: php artisan db:seed --class=OwnerSeeder
 */
class OwnerSeeder extends Seeder
{
    public function run(): void
    {
        $sudahAda = User::where('username', 'owner')->exists();

        if (!$sudahAda) {
            User::create([
                'nama_lengkap' => 'Owner Surya Farm',
                'username'     => 'owner',
                'password'     => Hash::make('owner123'),
            ]);

            $this->command->info('✅ Akun owner berhasil dibuat!');
            $this->command->info('   Username : owner');
            $this->command->info('   Password : owner123');
        } else {
            $this->command->warn('⚠️  Akun owner sudah ada, seeder dilewati.');
        }
    }
}
