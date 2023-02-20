<?php 

namespace App\Tests\Posts;

use App\Posts\Domain\Post;
use App\Posts\Domain\ValueObject\PostBody;
use App\Posts\Domain\ValueObject\PostId;
use App\Posts\Domain\ValueObject\PostTitle;
use App\Shared\Domain\ValueObject\AuthorId;
use App\Shared\Domain\ValueObject\UuidValueObject;
use PHPUnit\Framework\TestCase;

class PostModelTest extends TestCase
{
    public function  testShouldReturnPostModel()
    {
       $postFake = [
            'title' => 'test title',
            'body' => 'test body post' ,
            'author_id'=> 'b86d9c16-dce8-4b57-be04-383532385b87'
       ];

       $post = new Post(
            new PostId(UuidValueObject::generate()),
            new PostTitle($postFake['title']), 
            new PostBody($postFake['body']),
            new AuthorId($postFake['author_id'])
       );

       $this->assertTrue($post->id() instanceof PostId);
       $this->assertSame($postFake['title'],$post->title()->value());
       $this->assertSame($postFake['body'],$post->body()->value());
       $this->assertSame($postFake['author_id'],$post->authorId()->value());

    }
}