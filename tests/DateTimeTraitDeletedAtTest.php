<?php
/**
 * Entity Datetime
 *
 * @author Joubert RedRat <me+github@redrat.com.br>
 */

declare(strict_types=1);

namespace Tests;

/**
 * DateTimeTraitDeletedAt Test
 *
 * @package Tests
 */
final class DateTimeTraitDeletedAtTest extends BaseTest
{
    /**
     * @return void
     */
    public function testGetWithDateTime(): void
    {
        $entity = $this->getEntity();
        $deletedAt = new \DateTime('now');
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

        self::assertInstanceOf(\DateTime::class, $entity->getDeletedAt());
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
     */
    public function testGetStringWithDefaultDateFormat(): void
    {
        $entity = $this->getEntity();
        $deletedAt = new \DateTime('2001-02-03 04:05:06');
        $entity->setDeletedAt($deletedAt);

        self::assertEquals(
            $deletedAt->format('Y-m-d H:i:s'),
            $entity->getDeletedAtString()
        );
    }

    /**
     * @return void
     */
    public function testGetStringWithCustomDateFormat(): void
    {
        $entity = $this->getEntity();
        $deletedAt = new \DateTime('2018-01-02 03:04:05');
        $entity->setDeletedAt($deletedAt);
        $customFormat = 'm/d/Y g:i A';

        self::assertEquals(
            $deletedAt->format($customFormat),
            $entity->getDeletedAtString($customFormat)
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
