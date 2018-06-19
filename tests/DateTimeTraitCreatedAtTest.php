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
        $entity = $this->getEntity();
        $createdAt = new \DateTime('now');
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

        self::assertInstanceOf(\DateTime::class, $entity->getCreatedAt());
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
     */
    public function testGetStringWithDefaultDateFormat(): void
    {
        $entity = $this->getEntity();
        $createdAt = new \DateTime('2001-02-03 04:05:06');
        $entity->setCreatedAt($createdAt);

        self::assertEquals(
            $createdAt->format('Y-m-d H:i:s'),
            $entity->getCreatedAtString()
        );
    }

    /**
     * @return void
     */
    public function testGetStringWithCustomDateFormat(): void
    {
        $entity = $this->getEntity();
        $createdAt = new \DateTime('2018-01-02 03:04:05');
        $entity->setCreatedAt($createdAt);
        $customFormat = 'm/d/Y g:i A';

        self::assertEquals(
            $createdAt->format($customFormat),
            $entity->getCreatedAtString($customFormat)
        );
    }

    /**
     * @return void
     */
    public function testHasDate(): void
    {
        $entity = $this->getEntity();
        $entity->setCreatedAt(
            new \DateTime('now')
        );

        self::assertTrue($entity->hasCreatedAt());
    }

    /**
     * @return void
     */
    public function testNotHasDate(): void
    {
        $entity = $this->getEntity();

        self::assertFalse($entity->hasCreatedAt());
    }
}
