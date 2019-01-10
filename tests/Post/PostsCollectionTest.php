<?php

namespace App\Tests\Post;

use App\Dto\Category;
use App\Dto\Post;
use App\Post\PostsCollection;
use PHPUnit\Framework\TestCase;

/**
 * Test case for posts collection.
 *
 * @covers \App\Post\PostsCollection
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class PostsCollectionTest extends TestCase
{
    public function testAddPost()
    {
        $collection = new PostsCollection();

        self::assertCount(0, $collection);

        $post1 = new Post('First', new \DateTime(), new Category('', ''));
        $post2 = new Post('Second', new \DateTime(), new Category('', ''));
        $collection->addPost($post1);
        $collection->addPost($post2);

        self::assertCount(2, $collection);
    }

    public function testShift()
    {
        $collection = new PostsCollection();

        self::assertNull($collection->shift());

        $post1 = new Post('', new \DateTime(), new Category('', ''));
        $collection->addPost($post1);

        self::assertSame($post1, $collection->shift());

        $post2 = new Post('First', new \DateTime(), new Category('', ''));
        $post3 = new Post('Second', new \DateTime(), new Category('', ''));
        $collection->addPost($post2);
        $collection->addPost($post3);

        self::assertSame($post2, $collection->shift());
    }
}
