<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Faker\Factory;

class JobQueueAddUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $faker = Factory::create();
        $email  = $faker->email;
        $data = User::create(
            ['name' => 'John Doe', 
            'email' => $email, 
            'password' => 'mnn',
            'id_jabatan' => '1',
            'no_tel_pejabat' => '1',
            'no_hp' => '1',
            'peranan' => '1',
            'no_kp' => '99999999999944',
            'status_peserta' => '1',
            'batch' => 'SPIK PDRM 2024', 
        ]);
  

        return $data;
    }
}