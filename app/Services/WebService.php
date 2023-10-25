<?php

namespace App\Services;

use App\DTOs\CreateWebDTO;
use App\DTOs\UpdateWebDTO;
use stdClass;

class WebService
{
    protected $repository;

    public function __construct()
    {
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return  $this->repository->findOne($id);
    }

    public function create(CreateWebDTO $data): stdClass
    {
        return $this->repository->create($data);
    }

    public function update(UpdateWebDTO $data): stdClass|null
    {
        return $this->repository->create($data);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
