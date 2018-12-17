<?php

namespace App\Service\Home;

use App\Dto\Category;
use App\Dto\Post;
use App\Post\PostsCollection;

/**
 * Fake home page service that generates test data.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class FakeHomeService implements HomePageServiceInterface
{
    private const POSTS_COUNT = 4;
    private const CATEGORIES = [
        'it' => [
            'name' => 'IT',
        ],
        'world' => [
            'name' => 'World',
        ],
        'science' => [
            'name' => 'science',
        ],
        'sport' => [
            'name' => 'Sport',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function getPosts(): PostsCollection
    {
        $faker = \Faker\Factory::create();
        $collection = new PostsCollection();

        $category = \array_rand(self::CATEGORIES, 1);

        for ($i = 0; $i < self::POSTS_COUNT; $i++) {
            $dto = new Post(
                $faker->text,
                $faker->dateTime,
                new Category($category['name'], $faker->sentence)
            );

            $dto->setImage($faker->imageUrl());

            $collection->addPost($dto);
        }

        return $collection;
    }
}
