<?php 
declare(strict_types=1);

namespace App\Posts\Domain;

interface PostRepository {
    
    public function all(): PostCollection;

    public function save(Post $post): void;
}