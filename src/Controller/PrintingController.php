<?php

declare(strict_types=1);

namespace App\Controller;

use Faker\Factory;

/**
 * Printing Controller
 *
 */
class PrintingController extends AppController
{
    public function label()
    {
        // code ;

        $faker = Factory::create();
        /**
         * @var \Faker\Provider\FakeBarcode
         */
        $faker->addProvider(new \Faker\Provider\FakeBarcode($faker));

        dd([
            $faker->sscc(3),
            $faker->gtin14()
        ]);
    }
}
