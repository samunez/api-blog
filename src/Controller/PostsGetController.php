<?php

namespace App\Controller;

use App\Posts\Application\Find\FindAllPosts;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PostsGetController
{   
    #[Route('/api/posts', name: 'app_posts_get', methods:["GET"])]
    public function __invoke(FindAllPosts $findAllService): JsonResponse
    {
        $posts = $findAllService->findAll();        
        return new JsonResponse([
            'status' => 'ok',
            'message' => $posts->toArray()
        ]);
    }
}
