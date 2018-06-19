<?php
/**
 * Entity Datetime
 *
 * @author Joubert RedRat <me+github@redrat.com.br>
 */

declare(strict_types=1);

namespace Tests;

/**
 * DateTimeTraitCreatedAt Test
 *
 * @package Tests
 */
final class DateTimeTraitCreatedAtTest extends BaseTest
{
    /**
     * @return void
     */
    public function testGetWithDateTime(): void
    {
        $updatedAt = new \DateTime('now');

        self::assertSame($updatedAt, null);
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
        $updatedAt = new \DateTime('2001-02-03 04:05:06');

        self::assertEquals(
            $updatedAt->format('Y-m-d H:i:s'),
            null
        );
    }

    /**
     * @return void
     */
    public function testGetStringWithCustomDateFormat(): void
    {
        $updatedAt = new \DateTime('2018-01-02 03:04:05');
        $customFormat = 'm/d/Y g:i A';

        self::assertEquals(
            $updatedAt->format($customFormat),
            null
        );
    }
}
