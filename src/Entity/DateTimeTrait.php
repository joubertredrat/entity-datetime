<?php

declare(strict_types=1);

namespace RedRat\Entity;

/**
 * DateTime Trait
 *
 * @package RedRat\Entity
 */
trait DateTimeTrait
{
    use DateTimeCreatedTrait;
    use DateTimeUpdatedTrait;
    use DateTimeDeletedTrait;
}
