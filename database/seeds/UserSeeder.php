<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'user_id' => '3zGB7l',
            'username' => 'johndoe',
            'password' => bcrypt(11111111),
            'first_name' => 'John',
            'last_name' => 'Doe',
            'Address' => 'Kerkstraat 121, Eindhoven',
            'email' => 'johndoe@yahoo.com',
            'birthday' => Carbon::parse('1987-02-10'),
            'gender' => 'M',
            'phone' => '0632145678'
        ]);
        $user->save();
        $user = new User([
            'user_id' => '5YPAJ8',
            'username' => 'robsmith',
            'password' => bcrypt(11111111),
            'first_name' => 'Rob',
            'last_name' => 'Smith',
            'Address' => 'Kerkstraat 131, Eindhoven',
            'email' => 'robsmith@yahoo.com',
            'birthday' => Carbon::parse('1985-05-19'),
            'gender' => 'M',
            'phone' => '0632156678'
        ]);
        $user->save();
        $user = new User([
            'user_id' => '84bC7c',
            'username' => 'laurastone',
            'password' => bcrypt(11111111),
            'first_name' => 'Laura',
            'last_name' => 'Stone',
            'Address' => 'Kerkstraat 191, Eindhoven',
            'email' => 'laurastone@yahoo.com',
            'birthday' => Carbon::parse('1989-11-02'),
            'gender' => 'F',
            'phone' => '0632144648'
        ]);
        $user->save();
    }
}
