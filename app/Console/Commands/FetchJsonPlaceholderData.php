<?php

namespace App\Console\Commands;

use App\Models\Address;
use App\Models\Company;
use App\Models\User;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class FetchJsonPlaceholderData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-json-placeholder-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Data from JSON Placeholder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //

        $this->info("Fetching and Storing Data...");

        try
        {
            //Fetch and Insert Users Data
            $users = Http::get('https://jsonplaceholder.typicode.com/users')->json();

            foreach ($users as $userData) {

                $user = User::create([
                    'name'      =>     $userData['name'],
                    'username'  =>     $userData['username'], 
                    'email'     =>     $userData['email'], 
                    'phone'     =>     $userData['phone'], 
                    'website'   =>     $userData['website'], 
                    'password'  =>     Hash::make('password123'),
                ]);


                //Users' Address Data
                Address::create([
                    'user_id'       => $user->id,
                    'street'        => $userData['address']['street'],
                    'suite'         => $userData['address']['suite'],
                    'city'          => $userData['address']['city'],
                    'zipcode'       => $userData['address']['zipcode'],
                    'lat'           => $userData['address']['geo']['lat'],
                    'lng'           => $userData['address']['geo']['lng'],
                ]);


                //Users' Compnay Data
                Company::create([
                    'user_id' => $user->id,
                    'name' => $userData['company']['name'],
                    'catch_phrase' => $userData['company']['catchPhrase'],
                    'bs' => $userData['company']['bs'],
                ]);
            }

        }
        
        catch( Exception $e)
        {
            $this->error("Failed to fetch data: " . $e->getMessage());
        }

    }
}
