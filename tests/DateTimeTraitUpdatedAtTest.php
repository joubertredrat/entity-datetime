<?php

declare(strict_types=1);

namespace Tests;

use DateTime;
use DateTimeInterface;
use Exception;
use PHPUnit\Framework\TestCase;
use RedRat\Entity\DateTimeUpdatedTrait;

/**
 * DateTimeTraitUpdatedAt Test
 *
 * @package Tests
 */
final class DateTimeTraitUpdatedAtTest extends TestCase
{
    /**
     * @return void
     * @throws Exception
     */
    public function testGetWithDateTime(): void
    {
        $entity = $this->getEntity();
        $updatedAt = new DateTime('now');
        $entity->setUpdatedAt($updatedAt);

        self::assertSame($updatedAt, $entity->getUpdatedAt());
    }

    /**
     * @return void
     */
    public function testGetWithNull(): void
    {
        $entity = $this->getEntity();

        self::assertNull($entity->getUpdatedAt());
    }

    /**
     * @return void
     */
    public function testForgeWithDateTime(): void
    {
        $entity = $this->getEntity();
        $entity->forgeUpdatedAt();

        self::assertInstanceOf(DateTimeInterface::class, $entity->getUpdatedAt());
    }

    /**
     * @return void
     */
    public function testGetStringWithNull(): void
    {
        $entity = $this->getEntity();

        self::assertNull($entity->getUpdatedAtString());
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testGetStringWithDefaultDateFormat(): void
    {
        $entity = $this->getEntity();
        $updatedAt = new DateTime('2001-02-03 04:05:06');
        $entity->setUpdatedAt($updatedAt);

        self::assertEquals(
            $updatedAt->format('Y-m-d H:i:s'),
            $entity->getUpdatedAtString()
        );
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testGetStringWithCustomDateFormat(): void
    {
        $entity = $this->getEntity();
        $updatedAt = new DateTime('2018-01-02 03:04:05');
        $entity->setUpdatedAt($updatedAt);
        $customFormat = 'm/d/Y g:i A';

        self::assertEquals(
            $updatedAt->format($customFormat),
            $entity->getUpdatedAtString($customFormat)
        );
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testHasDate(): void
    {
        $entity = $this->getEntity();
        $entity->setUpdatedAt(
            new DateTime('now')
        );

        self::assertTrue($entity->hasUpdatedAt());
    }

    /**
     * @return void
     */
    public function testHasNotDate(): void
    {
        $entity = $this->getEntity();

        self::assertFalse($entity->hasUpdatedAt());
    }

    /**
     * @return object
     * @todo implement return type Object
     */
    public function getEntity()
    {
        return new class {
            use DateTimeUpdatedTrait;
        };
    }
}
