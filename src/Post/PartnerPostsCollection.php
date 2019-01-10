<?php

namespace App\Post;

use App\Dto\PartnerPost;

final class PartnerPostsCollection implements \IteratorAggregate
{
    private $posts;

    public function __construct(PartnerPost ...$posts )
    {
        $this->posts = $posts;
    }

    public function addPost(PartnerPost $post)
    {
        $this->posts[] = $post;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->posts);
    }
}
