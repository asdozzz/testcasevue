<?php

use Illuminate\Database\Seeder;

class PassportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPanelPermission =  DB::table('oauth_clients')->insert([
            [ 'id' => 1, 'redirect' => 'localhost', 'personal_access_client' => 1, 'password_client' => 1, 'revoked' => 0,'name' => 'First','secret' => 'FldNfJGYSI20CGDEgzZRD9PdNuw80K3Uxflke8Sg'],
            [ 'id' => 2, 'redirect' => 'localhost', 'personal_access_client' => 1, 'password_client' => 0, 'revoked' => 0,'name' => 'Second','secret' => '1GXXNHE5JYJ9VSf0bQJ6MxTnr2nbuFnY43Q3mwIl']
        ]);
    }
}
