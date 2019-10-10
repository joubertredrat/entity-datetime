<?php

declare(strict_types=1);

namespace RedRat\Entity;

use DateTimeInterface;
use Exception;

/**
 * DateTimeUpdated Trait
 *
 * @package RedRat\Entity
 */
trait DateTimeUpdatedTrait
{
    /**
     * @var DateTimeInterface
     */
    private $updatedAt;

    /**
     * @var string
     */
    protected static $updatedAtStringFormat = 'Y-m-d H:i:s';

    /**
     * @return DateTimeInterface|null
     */
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param string|null $format
     * @return string|null
     */
    public function getUpdatedAtString(?string $format = null): ?string
    {
        if (!$this->hasUpdatedAt()) {
            return null;
        }

        return $this
            ->getUpdatedAt()
            ->format($format ?? self::$updatedAtStringFormat)
        ;
    }

    /**
     * @return bool
     */
    public function hasUpdatedAt(): bool
    {
        return $this->getUpdatedAt() instanceof DateTimeInterface;
    }

    /**
     * @param DateTimeInterface $updatedAt
     * @return void
     */
    public function setUpdatedAt(DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return void
     * @throws Exception
     */
    public function forgeUpdatedAt(): void
    {
        $this->setUpdatedAt(
            new \DateTime('now')
        );
    }
}
