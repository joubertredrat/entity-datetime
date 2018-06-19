<?php
/**
 * Entity Datetime
 *
 * @author Joubert RedRat <me+github@redrat.com.br>
 */

namespace RedRat\Entity;

/**
 * DateTime Trait
 *
 * @package RedRat
 */
trait DateTimeTrait
{
    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \DateTime
     */
    private $deletedAt;

    /**
     * @var string
     */
    protected static $stringFormat = 'Y-m-d H:i:s';

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param string|null $format
     * @return string|null
     */
    public function getCreatedAtString(?string $format = null): ?string
    {
        if ($this->hasCreatedAt()) {
            return $this
                ->getCreatedAt()
                ->format($format ?? self::$stringFormat)
            ;
        }

        return null;
    }

    /**
     * @return bool
     */
    public function hasCreatedAt(): bool
    {
        return $this->getCreatedAt() instanceof \DateTime;
    }

    /**
     * @param \DateTime $createdAt
     * @return void
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return void
     */
    public function forgeCreatedAt(): void
    {
        $this->setCreatedAt(new \DateTime('now'));
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param string|null $format
     * @return string|null
     */
    public function getUpdatedAtString(?string $format = null): ?string
    {
        if ($this->hasUpdatedAt()) {
            return $this
                ->getUpdatedAt()
                ->format($format ?? self::$stringFormat)
            ;
        }

        return null;
    }

    /**
     * @return bool
     */
    public function hasUpdatedAt(): bool
    {
        return $this->getUpdatedAt() instanceof \DateTime;
    }

    /**
     * @param \DateTime $updatedAt
     * @return void
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return void
     */
    public function forgeUpdatedAt(): void
    {
        $this->setUpdatedAt(new \DateTime('now'));
    }

    /**
     * @return \DateTime|null
     */
    public function getDeletedAt(): ?\DateTime
    {
        return $this->deletedAt;
    }

    /**
     * @param string|null $format
     * @return string|null
     */
    public function getDeletedAtString(?string $format = null): ?string
    {
        if ($this->hasDeletedAt()) {
            return $this
                ->getDeletedAt()
                ->format($format ?? self::$stringFormat)
            ;
        }

        return null;
    }

    /**
     * @return bool
     */
    public function hasDeletedAt(): bool
    {
        return $this->getDeletedAt() instanceof \DateTime;
    }

    /**
     * @param \DateTime $deletedAt
     * @return void
     */
    public function setDeletedAt(\DateTime $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * @return void
     */
    public function forgeDeletedAt(): void
    {
        $this->setDeletedAt(new \DateTime('now'));
    }
}
