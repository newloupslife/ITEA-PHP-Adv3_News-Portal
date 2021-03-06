<?php

namespace App\Post;

use App\Dto\Post;

/**
 * Immutable collection of Post entities.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class PostsCollection implements \IteratorAggregate, \Countable
{
    private $posts;

    public function __construct(Post ...$posts)
    {
        $this->posts = $posts;
    }

    public function addPost(Post $post): void
    {
        $this->posts[] = $post;
    }

    public function shift(): ?Post
    {
        return \array_shift($this->posts);
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->posts);
    }

    public function count()
    {
        return \count($this->posts);
    }
}
