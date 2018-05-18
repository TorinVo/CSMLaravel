<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Faker;
use Hash;
use DB;
class UserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {userType=admin : Type of user ex: admin, user...} {numberOfUser=1 : Number of user create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an user';

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
     * @return mixed
     */
    public function handle()
    {
        $userTypeId   = ($this->argument('userType')=='admin')?1:2;
        $numberOfUser = $this->argument('numberOfUser');
        
        if($this->confirm('Are you sure create '. (($userTypeId==1)?'administrators':'users') .'?')) {
            $faker = Faker\Factory::create();
            try {
                for ($i=0; $i < $numberOfUser; $i++) { 
                    DB::table('users')->insert([
                        'name'         => $faker->name,
                        'email'        => $faker->unique()->email,
                        'user_type_id' => $userTypeId,
                        'password'     =>  Hash::make('123456')
                    ]);
                }
                $this->info($numberOfUser . (($userTypeId==1)?' administrators':' users') . ' create success.');
            } catch (Exception $e) {
                $this->error('Error ' . $e . ' when create users.');
            }
        }

    }
}
