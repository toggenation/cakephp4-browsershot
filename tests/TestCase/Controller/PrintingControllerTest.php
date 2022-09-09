<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\PrintingController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\PrintingController Test Case
 *
 * @uses \App\Controller\PrintingController
 */
class PrintingControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Printing',
    ];
}
