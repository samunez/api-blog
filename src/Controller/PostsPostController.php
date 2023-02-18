<?php
declare(strict_types=1);

namespace App\Controller;

use App\Posts\Application\Create\CreatePostCommand;
use App\Posts\Application\Create\CreatePostCommandHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostsPostController
{
    #[Route('/api/posts', name: 'app_posts_post', methods:["POST"])]
    public function __invoke(Request $request, CreatePostCommandHandler $handler): JsonResponse
    {
        $parameters = json_decode($request->getContent(), true);        
        try {
            $command = new CreatePostCommand(                
                $parameters['title'],
                $parameters['body'],
                $parameters['author_id']
            );
           $post = $handler->__invoke($command);
            $response = new JsonResponse([
                'status' => 'ok',
                'message' => $post->toArray()
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            $response = new JsonResponse([
                'status' => 'error',
                'message' => 'bad request'
            ],RESPONSE::HTTP_BAD_REQUEST);
        }
        return $response;
    }
}
