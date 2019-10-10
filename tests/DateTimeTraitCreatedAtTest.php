<?php

declare(strict_types=1);

namespace Tests;

use DateTime;
use DateTimeInterface;
use Exception;
use PHPUnit\Framework\TestCase;
use RedRat\Entity\DateTimeCreatedTrait;

/**
 * DateTimeTraitCreatedAt Test
 *
 * @package Tests
 */
final class DateTimeTraitCreatedAtTest extends TestCase
{
    /**
     * @return void
     * @throws Exception
     */
    public function testGetWithDateTime(): void
    {
        $entity = $this->getEntity();
        $createdAt = new DateTime('now');
        $entity->setCreatedAt($createdAt);

        self::assertSame($createdAt, $entity->getCreatedAt());
    }

    /**
     * @return void
     */
    public function testGetWithNull(): void
    {
        $entity = $this->getEntity();

        self::assertNull($entity->getCreatedAt());
    }

    /**
     * @return void
     */
    public function testForgeWithDateTime(): void
    {
        $entity = $this->getEntity();
        $entity->forgeCreatedAt();

        self::assertInstanceOf(DateTimeInterface::class, $entity->getCreatedAt());
    }

    /**
     * @return void
     */
    public function testGetStringWithNull(): void
    {
        $entity = $this->getEntity();

        self::assertNull($entity->getCreatedAtString());
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testGetStringWithDefaultDateFormat(): void
    {
        $entity = $this->getEntity();
        $createdAt = new DateTime('2001-02-03 04:05:06');
        $entity->setCreatedAt($createdAt);

        self::assertEquals(
            $createdAt->format('Y-m-d H:i:s'),
            $entity->getCreatedAtString()
        );
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testGetStringWithCustomDateFormat(): void
    {
        $entity = $this->getEntity();
        $createdAt = new DateTime('2018-01-02 03:04:05');
        $entity->setCreatedAt($createdAt);
        $customFormat = 'm/d/Y g:i A';

        self::assertEquals(
            $createdAt->format($customFormat),
            $entity->getCreatedAtString($customFormat)
        );
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testHasDate(): void
    {
        $entity = $this->getEntity();
        $entity->setCreatedAt(
            new DateTime('now')
        );

        self::assertTrue($entity->hasCreatedAt());
    }

    /**
     * @return void
     */
    public function testHasNotDate(): void
    {
        $entity = $this->getEntity();

        self::assertFalse($entity->hasCreatedAt());
    }

    /**
     * @return object
     * @todo implement return type Object
     */
    public function getEntity()
    {
        return new class {
            use DateTimeCreatedTrait;
        };
    }
}
