<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientA = new User;
        $clientA->name = "Client A";
        $clientA->email = "clienta@teck.com";
        $clientA->password = bcrypt('password');
        $clientA->issuer = false;
        $clientA->save();

        $clientB = new User;
        $clientB->name = "Client B";
        $clientB->email = "clientb@teck.com";
        $clientB->password = bcrypt('password');
        $clientB->issuer = false;
        $clientB->save();

        $clientC = new User;
        $clientC->name = "Client C";
        $clientC->email = "clientc@teck.com";
        $clientC->password = bcrypt('password');
        $clientC->issuer = false;
        $clientC->save();

        $issuer1 = new User;
        $issuer1->name = "Atanas Mihnev";
        $issuer1->email = "issuer1@teck.com";
        $issuer1->password = bcrypt('password');
        $issuer1->issuer = true;
        $issuer1->save();

        $issuer2 = new User;
        $issuer2->name = "Elvis Metodiev";
        $issuer2->email = "issuer2@teck.com";
        $issuer2->password = bcrypt('password');
        $issuer2->issuer = true;
        $issuer2->save();

        $issuer3 = new User;
        $issuer3->name = "Kiril Yakimov";
        $issuer3->email = "issuer3@teck.com";
        $issuer3->password = bcrypt('password');
        $issuer3->issuer = true;
        $issuer3->save();
    }
}
