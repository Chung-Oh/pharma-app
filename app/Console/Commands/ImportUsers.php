<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ImportUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:import-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import users from Random Users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $limit = 2000;

        for ($i = 0; $i <= ($limit - 100); $i++) {
            $i--;
            $response = Http::get('https://randomuser.me/api/?results=100');
            $i += $response['info']['results'];
            Log::info($i);
            $this->getRandomUsers($response);
        }
    }

    private function getRandomUsers($response)
    {
        if (empty($response)) {
            return;
        }

        foreach ($response['results'] ?? [] as $user) {
            $userExist = \App\User::where('email', '=', $user['email'])->get();
            if ($userExist->count() == 0) {
                \App\User::updateOrCreate([
                    'gender'     => $user['gender'],
                    'name'       => $user['name'],
                    'location'   => $user['location'],
                    'email'      => $user['email'],
                    'login'      => $user['login'],
                    'dob'        => $user['dob'],
                    'registered' => $user['registered'],
                    'phone'      => $user['phone'],
                    'cell'       => $user['cell'],
                    'id_user'    => $user['id'],
                    'picture'    => $user['picture'],
                    'nat'        => $user['nat'],
                    'status'     => \App\User::STATUS_PUBLISHED,
                    'imported_t' => now()
                ]);
            }
        }
    }
}
