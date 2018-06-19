<?php
/**
 * Entity Datetime
 *
 * @author Joubert RedRat <me+github@redrat.com.br>
 */

declare(strict_types=1);

namespace Tests;

/**
 * DateTimeTraitUpdatedAt Test
 *
 * @package Tests
 */
final class DateTimeTraitUpdatedAtTest extends BaseTest
{
    /**
     * @return void
     */
    public function testGetWithDateTime(): void
    {
        $entity = $this->getEntity();
        $updatedAt = new \DateTime('now');
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

        self::assertInstanceOf(\DateTime::class, $entity->getUpdatedAt());
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
     */
    public function testGetStringWithDefaultDateFormat(): void
    {
        $entity = $this->getEntity();
        $updatedAt = new \DateTime('2001-02-03 04:05:06');
        $entity->setUpdatedAt($updatedAt);

        self::assertEquals(
            $updatedAt->format('Y-m-d H:i:s'),
            $entity->getUpdatedAtString()
        );
    }

    /**
     * @return void
     */
    public function testGetStringWithCustomDateFormat(): void
    {
        $entity = $this->getEntity();
        $updatedAt = new \DateTime('2018-01-02 03:04:05');
        $entity->setUpdatedAt($updatedAt);
        $customFormat = 'm/d/Y g:i A';

        self::assertEquals(
            $updatedAt->format($customFormat),
            $entity->getUpdatedAtString($customFormat)
        );
    }

    /**
     * @return void
     */
    public function testHasDate(): void
    {
        self::assertTrue(false);
    }

    /**
     * @return void
     */
    public function testNotHasDate(): void
    {
        self::assertFalse(true);
    }
}
