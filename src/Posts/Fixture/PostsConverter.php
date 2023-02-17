<?php 

declare(strict_types=1);

namespace App\Posts\Fixture;

use App\Posts\Domain\Post;
use App\Posts\Domain\ValueObject\PostBody;
use App\Posts\Domain\ValueObject\PostId;
use App\Posts\Domain\ValueObject\PostTitle;
use App\Shared\Domain\ValueObject\AuthorId;

final class PostsConverter
{
    private array $posts;    

    public function __construct(array $array)
    {
        $this->posts = $array;
    }

    public function convert()
    {
        $posts = [];
        $postIds = [
            "6c946032-7afd-40f5-9f05-ea3a35b80455",        
            "df6a8227-2231-4ada-a854-6d6cfd15d9c7",        
            "d11c68cf-f2e2-4efc-abea-0cd0d85169d8",        
            "3d931517-a19f-463f-9b96-8118a93cd71a",        
            "1b85815c-0b11-420a-9188-396672214135",        
            "1267ef3c-e70f-4368-8103-7a61787e70f5",        
            "4179682e-fde3-4f3e-afb9-57004e7e2350",        
            "320916db-30ef-4274-a37e-a3c7bf67a9f3",        
            "202fb295-1e40-4dac-b753-72847a7c5e17",        
            "092e0a56-36d6-45fa-9101-c56f9c6783c5",        
        ];
        $i = 0;
        foreach($this->posts as $element){
            $post = new Post(
                new PostId($postIds[$i]),
                new PostTitle($element['title']),
                new PostBody($element['body']),
                new AuthorId('b86d9c16-dce8-4b57-be04-383532385b87')
            );            
            $posts[] = $post;            
            $i++;
        }        
        return $posts;

    }
}
