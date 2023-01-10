<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 *  @Route("/blog")
 */
class BlogController extends AbstractController
{
    private const POSTS = [
        [
            "id" => 1,
            "slug" => "Blog post one",
            "title" => 'Blog post one'
        ],
        [
            'id' => 2,
            'slug' => 'Blog post two',
            'title' => 'Blog post two'
        ],
        [
            'id' => 3,
            'slug' => 'Blog post three',
            'title' => 'Blog post three'
        ]
    ];

    /**
     * @Route("/{page}", name="blog_list", defaults={"page": 1})
     */
    public function list($page): JsonResponse
    {
        return new JsonResponse(
            [
                'page' => $page,
                'data' => self::POSTS
            ]
        );
    }

    /**
     * @Route("/{id}", name="blog_by_id", requirements={"id"="\d+"})
     */
    public function post($id): JsonResponse
    {
        return new JsonResponse(
            self::POSTS[array_search($id, array_column(self::POSTS, 'id'), true)]
        );
    }

    /**
     * @Route("/{slug}", name="blog_by_slug")
     */
    public function postBySlug($slug): JsonResponse
    {
        return new JsonResponse(
            self::POSTS[array_search($slug, array_column(self::POSTS, 'slug'), true)]
        );
    }


}