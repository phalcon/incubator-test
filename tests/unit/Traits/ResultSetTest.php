<?php

namespace Phalcon\Incubator\Test\Tests\Unit\Traits;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple;
use Phalcon\Incubator\Test\Codeception\UnitTestCase as Test;
use Phalcon\Incubator\Test\Traits\ResultSet;

/**
 * \Phalcon\Test\Test\Traits\ResultSetTest
 * Tests for Phalcon\Test\Traits\ResultSet component
 *
 * @copyright (c) 2011-2016 Phalcon Team
 * @link      http://www.phalconphp.com
 * @author    Phoenix Osiris <phoenix@twistersfury.com>
 * @package   Phalcon\Test\Test\Traits
 * @group     Acl
 *
 * The contents of this file are subject to the New BSD License that is
 * bundled with this package in the file docs/LICENSE.txt
 *
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world-wide-web, please send an email to license@phalconphp.com
 * so that we can send you a copy immediately.
 */
class ResultSetTest extends Test
{
    use ResultSet;

    /** @var ResultSet */
    protected $testSubject = null;

    public function setUp(): void
    {
        $this->testSubject = $this;
    }

    public function testCanMockResultSet()
    {
        $mockModel = $this->getMockBuilder(Model::class)
            ->setMockClassName('ClassA')
            ->disableOriginalConstructor()
            ->getMock();

        $mockSecondModel = $this->getMockBuilder(Model::class)
            ->setMockClassName('ClassB')
            ->disableOriginalConstructor()
            ->getMock();

        $mockThirdModel = $this->getMockBuilder(Model::class)
            ->setMockClassName('ClassC')
            ->disableOriginalConstructor()
            ->getMock();

        $mockData = [
            $mockModel,
            $mockSecondModel,
            $mockThirdModel,
        ];

        /** @var \Phalcon\Mvc\Model\Resultset $mockResultSet */
        $mockResultSet = $this->testSubject->mockResultSet($mockData);

        //Testing Count
        $this->assertEquals(
            3,
            $mockResultSet->count()
        );

        //Testing getFirst
        $this->assertSame(
            $mockModel,
            $mockResultSet->getFirst()
        );

        //Testing getLast
        $this->assertSame(
            $mockThirdModel,
            $mockResultSet->getLast()
        );

        //Testing toArray
        $this->assertSame(
            $mockData,
            $mockResultSet->toArray()
        );
    }

    public function testCanMockEmptyResultSet()
    {
        /** @var \Phalcon\Mvc\Model\Resultset $mockResultSet */
        $mockResultSet = $this->testSubject->mockResultset([]);

        $this->assertEquals(
            0,
            $mockResultSet->count()
        );

        $this->assertNull(
            $mockResultSet->getFirst()
        );

        $this->assertNull(
            $mockResultSet->getLast()
        );
    }

    public function testCanUseOtherResultSetClasses()
    {
        $mockResultset = $this->mockResultset(
            [],
            Simple::class
        );

        $this->assertInstanceOf(
            Simple::class,
            $mockResultset
        );
    }
}
