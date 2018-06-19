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
        $createdAt = new \DateTime('now');

        self::assertSame($createdAt, null);
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
        $createdAt = new \DateTime('2001-02-03 04:05:06');

        self::assertEquals(
            $createdAt->format('Y-m-d H:i:s'),
            null
        );
    }

    /**
     * @return void
     */
    public function testGetStringWithCustomDateFormat(): void
    {
        $createdAt = new \DateTime('2018-01-02 03:04:05');
        $customFormat = 'm/d/Y g:i A';

        self::assertEquals(
            $createdAt->format($customFormat),
            null
        );
    }
}
