<?php

namespace App\Tests;

/**
 * This trait provides useful assertions for test cases.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
trait AssertsTrait
{
    /**
     * Asserts that haystack is equal to one.
     *
     * @param int       $haystack
     * @param string    $message
     */
    protected static function assertOne(int $haystack, string $message = ''): void
    {
        self::assertEquals(1, $haystack, $message);
    }
}
