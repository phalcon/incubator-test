<?php

/**
 * This file is part of the Phalcon Incubator Test.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Incubator\Test\Codeception;

use Codeception\Test\Unit;
use Phalcon\Incubator\Test\Traits\UnitTestCase as UnitTestCaseTrait;

class UnitTestCase extends Unit
{
    use UnitTestCaseTrait;

    /**
     * UnitTester Object
     */
    protected $tester;

    /**
     * Standard Setup Method For PHPUnit. Calling setUpPhalcon Here to Maintain Codeception's _before Without a call
     * to parent::_before
     */
    protected function setUp(): void
    {
        $this->setUpPhalcon();
        parent::setUp();
    }

    /**
     * Standard Tear Down Method For PHPUnit. Calling tearDownPhalcon Here to Maintain Codeception's _after
     * Without a call to parent::_before
     */
    protected function tearDown(): void
    {
        $this->tearDownPhalcon();
        parent::tearDown();
    }
}
