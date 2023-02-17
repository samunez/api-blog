<?php 
declare(strict_types=1);

namespace App\Posts\Infrastructure;

use App\Posts\Domain\Post;
use App\Posts\Domain\PostCollection;
use App\Posts\Domain\PostRepository;
use App\Posts\Fixture\PostsConverter;
use App\Posts\Fixture\ReadPosts;

final class InMemoryPostsRepository implements PostRepository {

    private array $posts;
    private PostCollection $postCollection;

    public function __construct(ReadPosts $readPosts,PostCollection $postCollection)
    {
        $arrayPosts  = $readPosts->fetchPostsByLength(10);
        $postsConverter = new PostsConverter($arrayPosts);
        $this->posts = $postsConverter->convert();
        $this->postCollection = $postCollection;
        foreach($this->posts as $post){
            $this->postCollection->add($post);
        }
    }

    public function all(): PostCollection
    {         
        return $this->postCollection;
    }

    public function save(Post $post): void
    {
        $this->postCollection->add($post); 
    }
    
}