<?php

namespace App\Service\Home;

use App\Category\CategoriesCollection;
use App\Dto\Post;
use App\Dto\Category as CategoryDto;
use App\Entity\Category;
use App\Post\PostsCollection;
use App\Repository\Category\CategoryRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

final class HomePageService implements HomePageServiceInterface
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function getPosts(): PostsCollection
    {
        return new PostsCollection(new Post('', new \DateTime(), new CategoryDto('', '')));
    }

    public function getCategories(): CategoriesCollection
    {
        $categories = $this->categoryRepository->findAllIsPublished();

        return new CategoriesCollection($categories);
    }
}
