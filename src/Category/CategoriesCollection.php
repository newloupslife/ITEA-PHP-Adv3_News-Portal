<?php

namespace App\Category;

use Traversable;

final class CategoriesCollection implements \IteratorAggregate
{
    private $categories;

    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->categories);
    }
}
