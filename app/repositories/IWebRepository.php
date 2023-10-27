<?php

namespace App\repositories;

use App\DTOs\CreateWebDTO;
use App\DTOs\UpdateWebDTO;
use stdClass;

interface IWebRepository
{
    public function getAll(string $filter): array;

    public function findOne(string $id): stdClass|null;

    public function create(CreateWebDTO $data): stdClass;

    public function update(UpdateWebDTO $data): stdClass|null;

    public function delete(string $id): void;
}
