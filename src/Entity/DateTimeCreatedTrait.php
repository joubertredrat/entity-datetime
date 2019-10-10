<?php

declare(strict_types=1);

namespace RedRat\Entity;

use DateTimeInterface;
use Exception;

/**
 * DateTimeCreated Trait
 *
 * @package RedRat\Entity
 */
trait DateTimeCreatedTrait
{
    /**
     * @var DateTimeInterface
     */
    private $createdAt;

    /**
     * @var string
     */
    protected static $createdAtStringFormat = 'Y-m-d H:i:s';

    /**
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param string|null $format
     * @return string|null
     */
    public function getCreatedAtString(?string $format = null): ?string
    {
        if (!$this->hasCreatedAt()) {
            return null;
        }

        return $this
            ->getCreatedAt()
            ->format($format ?? self::$createdAtStringFormat)
        ;
    }

    /**
     * @return bool
     */
    public function hasCreatedAt(): bool
    {
        return $this->getCreatedAt() instanceof DateTimeInterface;
    }

    /**
     * @param DateTimeInterface $createdAt
     * @return void
     */
    public function setCreatedAt(DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return void
     * @throws Exception
     */
    public function forgeCreatedAt(): void
    {
        $this->setCreatedAt(
            new \DateTime('now')
        );
    }
}
