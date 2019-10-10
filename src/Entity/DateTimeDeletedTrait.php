<?php

declare(strict_types=1);

namespace RedRat\Entity;

use DateTimeInterface;
use Exception;

/**
 * DateTimeDeleted Trait
 *
 * @package RedRat\Entity
 */
trait DateTimeDeletedTrait
{
    /**
     * @var DateTimeInterface
     */
    private $deletedAt;

    /**
     * @var string
     */
    protected static $deletedAtStringFormat = 'Y-m-d H:i:s';

    /**
     * @return DateTimeInterface|null
     */
    public function getDeletedAt(): ?DateTimeInterface
    {
        return $this->deletedAt;
    }

    /**
     * @param string|null $format
     * @return string|null
     */
    public function getDeletedAtString(?string $format = null): ?string
    {
        if (!$this->hasDeletedAt()) {
            return null;
        }

        return $this
            ->getDeletedAt()
            ->format($format ?? self::$deletedAtStringFormat)
        ;
    }

    /**
     * @return bool
     */
    public function hasDeletedAt(): bool
    {
        return $this->getDeletedAt() instanceof DateTimeInterface;
    }

    /**
     * @param DateTimeInterface $deletedAt
     * @return void
     */
    public function setDeletedAt(DateTimeInterface $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * @return void
     * @throws Exception
     */
    public function forgeDeletedAt(): void
    {
        $this->setDeletedAt(
            new \DateTime('now')
        );
    }
}
