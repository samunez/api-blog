<?php 
declare(strict_types=1);

namespace App\Authors\Domain;

use App\Shared\Domain\ValueObject\AuthorId;

interface AuthorRepository {

    public function findById(AuthorId $id): ?Author;
}