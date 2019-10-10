<?php

declare(strict_types=1);

namespace Tests;

use DateTime;
use DateTimeInterface;
use Exception;
use PHPUnit\Framework\TestCase;
use RedRat\Entity\DateTimeDeletedTrait;

/**
 * DateTimeTraitDeletedAt Test
 *
 * @package Tests
 */
final class DateTimeTraitDeletedAtTest extends TestCase
{
    /**
     * @return void
     * @throws Exception
     */
    public function testGetWithDateTime(): void
    {
        $entity = $this->getEntity();
        $deletedAt = new DateTime('now');
        $entity->setDeletedAt($deletedAt);

        self::assertSame($deletedAt, $entity->getDeletedAt());
    }

    /**
     * @return void
     */
    public function testGetWithNull(): void
    {
        $entity = $this->getEntity();

        self::assertNull($entity->getDeletedAt());
    }

    /**
     * @return void
     */
    public function testForgeWithDateTime(): void
    {
        $entity = $this->getEntity();
        $entity->forgeDeletedAt();

        self::assertInstanceOf(DateTimeInterface::class, $entity->getDeletedAt());
    }

    /**
     * @return void
     */
    public function testGetStringWithNull(): void
    {
        $entity = $this->getEntity();

        self::assertNull($entity->getDeletedAtString());
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testGetStringWithDefaultDateFormat(): void
    {
        $entity = $this->getEntity();
        $deletedAt = new DateTime('2001-02-03 04:05:06');
        $entity->setDeletedAt($deletedAt);

        self::assertEquals(
            $deletedAt->format('Y-m-d H:i:s'),
            $entity->getDeletedAtString()
        );
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testGetStringWithCustomDateFormat(): void
    {
        $entity = $this->getEntity();
        $deletedAt = new DateTime('2018-01-02 03:04:05');
        $entity->setDeletedAt($deletedAt);
        $customFormat = 'm/d/Y g:i A';

        self::assertEquals(
            $deletedAt->format($customFormat),
            $entity->getDeletedAtString($customFormat)
        );
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testHasDate(): void
    {
        $entity = $this->getEntity();
        $entity->setDeletedAt(
            new DateTime('now')
        );

        self::assertTrue($entity->hasDeletedAt());
    }

    /**
     * @return void
     */
    public function testHasNotDate(): void
    {
        $entity = $this->getEntity();

        self::assertFalse($entity->hasDeletedAt());
    }

    /**
     * @return object
     * @todo implement return type Object
     */
    public function getEntity()
    {
        return new class {
            use DateTimeDeletedTrait;
        };
    }
}
