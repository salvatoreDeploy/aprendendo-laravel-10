<?php

namespace App\Repositories;

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

    public function paginate(int $page = 1, string $filter = null, int $totalPerPage = 15): IPagination;
}
