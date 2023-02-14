<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeedFromDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Récupération de toutes les données de la table users
        $users = DB::table('users')->get();
        // Pour chaque utilisateur
        foreach ($users as $user) {
            // On crée un nouvel utilisateur
            $newUser = new User();
            // On lui assigne les données récupérées
            $newUser->lastname = $user->lastname;
            $newUser->firstname = $user->firstname;
            $newUser->email = $user->email;
            $newUser->password = $user->password;
            $newUser->country = $user->country;
            $newUser->city = $user->city;
            $newUser->region = $user->region;
            $newUser->postal_code = $user->postal_code;
            $newUser->address = $user->address;
            $newUser->phone_number = $user->phone_number;
            $newUser->provider = $user->provider;
            $newUser->provider_id = $user->provider_id;
            $newUser->nickname = $user->nickname;
            $newUser->is_student = $user->is_student;
            $newUser->is_firstjob = $user->is_firstjob;
            $newUser->school = $user->school;
            $newUser->about_you = $user->about_you;
            $newUser->actual_job = $user->actual_job;
            $newUser->actual_job_description = $user->actual_job_description;
            $newUser->actual_job_start_date = $user->actual_job_start_date;
            $newUser->actual_job_end_date = $user->actual_job_end_date;
            $newUser->global_notification = $user->global_notification;
            $newUser->my_informations_notification = $user->my_informations_notification;
            $newUser->tokens_left = $user->tokens_left;
            // On sauvegarde l'utilisateur
            $newUser->save();
        }
    }
}
