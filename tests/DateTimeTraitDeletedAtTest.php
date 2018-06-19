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
        $deletedAt = new \DateTime('now');

        self::assertSame($deletedAt, null);
    }

    /**
     * @return void
     */
    public function testGetWithNull(): void
    {
        self::assertSame(null, false);
    }

    /**
     * @return void
     */
    public function testForgeWithDateTime(): void
    {
        self::assertInstanceOf(\DateTime::class, null);
    }

    /**
     * @return void
     */
    public function testGetStringWithNull(): void
    {
        self::assertSame(null, false);
    }

    /**
     * @return void
     */
    public function testGetStringWithDefaultDateFormat(): void
    {
        $deletedAt = new \DateTime('2001-02-03 04:05:06');

        self::assertEquals(
            $deletedAt->format('Y-m-d H:i:s'),
            null
        );
    }

    /**
     * @return void
     */
    public function testGetStringWithCustomDateFormat(): void
    {
        $deletedAt = new \DateTime('2018-01-02 03:04:05');
        $customFormat = 'm/d/Y g:i A';

        self::assertEquals(
            $deletedAt->format($customFormat),
            null
        );
    }
}
