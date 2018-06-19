<?php
/**
 * Entity Datetime
 *
 * @author Joubert RedRat <me+github@redrat.com.br>
 */

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use RedRat\Entity\DateTimeTrait;

/**
 * Base Test
 *
 * @package Tests
 */
abstract class BaseTest extends TestCase
{
    /**
     * @todo implement return type Object
     */
    public function getEntity()
    {
        return new class {
            use DateTimeTrait;
        };
    }
}
