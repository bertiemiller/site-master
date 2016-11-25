<?php

//use Topicmine\Admin\Models\Account\Database\Database;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Account;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->delete();

        Account::create(array(
            'id' => 1,
            'name' => 'Early Bird Admin',
            'description'     => 'Early Bird Admin Account',
            'user_id'     => 1, // Super User
            'database_id'     => 1,
        ));

        Account::create(array(
            'id' => 2,
            'name' => 'Early Bird General',
            'description'     => 'Early Bird General Account',
            'user_id'     => 2, // Admin User
            'database_id'     => 2,
        ));

        for ($i = 10; $i < 30; $i++)
        {
            Account::create(array(
                'id' => $i,
                'name' => 'Account Name',
                'description'     => 'Account Desc',
                'user_id'     => $i,
                'database_id'     => $i,
            ));
        }
//
//        // create database
//        $db = new Database;
//        $db->dropDatabaseAndUserIfExists(1);
//        $db->dropDatabaseAndUserIfExists(2);
//        $db->createDatabase(1);
//        $db->createDatabase(2);

//        Account::create(array(
//            'id' => 3,
//            'name' => 'Early Bird Starter',
//            'description'     => 'Early Bird Starter Account',
//            'user_id'     => 5,
//        ));
        
    }
}
