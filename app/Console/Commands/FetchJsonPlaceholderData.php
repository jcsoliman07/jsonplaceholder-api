<?php

namespace App\Console\Commands;

use App\Models\Address;
use App\Models\Album;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Todo;
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

            //Posts and Comments Data
            $posts = Http::get('https://jsonplaceholder.typicode.com/posts')->json();

            foreach ($posts as $postData){

                $post = Post::create([

                    'user_id'   =>  $postData['userId'],
                    'title'     =>  $postData['title'],
                    'body'      =>  $postData['body'],
                ]);

            }

            $comments = Http::get('https://jsonplaceholder.typicode.com/comments')->json();

            foreach ($comments as $commentData) {

                Comment::create([

                    'post_id'   =>  $commentData['postId'],
                    'name'      =>  $commentData['name'],
                    'email'     =>  $commentData['email'],
                    'body'      =>  $commentData['body'],

                ]);

            }

            //Albums and Photos Data

            $albums = Http::get('https://jsonplaceholder.typicode.com/albums')->json();

            foreach ($albums as $albumData) {

                Album::create([

                    'user_id'   =>  $albumData['userId'],
                    'title'     =>  $albumData['title'],

                ]);
            }

             $photos = Http::get('https://jsonplaceholder.typicode.com/photos')->json();

            foreach ($photos as $photoData) {

                Photo::create([

                    'album_id'      => $photoData['albumId'],
                    'title'         => $photoData['title'],
                    'url'           => $photoData['url'],
                    'thumbnail_url' => $photoData['thumbnailUrl'],

                ]);
            }

            // 4. Todos
            $todos = Http::get('https://jsonplaceholder.typicode.com/todos')->json();

            foreach ($todos as $todoData) {

                Todo::create([

                    'user_id'       =>  $todoData['userId'],
                    'title'         =>  $todoData['title'],
                    'completed'     =>  $todoData['completed'],

                ]);
            }

        }
        
        catch( Exception $e)
        {
            $this->error("Failed to fetch data: " . $e->getMessage());
        }

    }
}
