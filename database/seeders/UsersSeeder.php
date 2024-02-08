<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $user = new User();
    $user->login= 'admin';
    $user->password= '1234';  
    $user->api_token = 'Token1234';
    $user->save();
  }
}
