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

use Phalcon\Incubator\Test\Traits\FunctionalTestCase as FunctionalTestCaseTrait;

class FunctionalTestCase extends ModelTestCase
{
    use FunctionalTestCaseTrait;
}
