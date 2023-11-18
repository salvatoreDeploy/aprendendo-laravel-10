<?php

namespace App\Services;

use App\DTOs\CreateWebDTO;
use App\DTOs\UpdateWebDTO;
use App\Repositories\IPagination;
use App\Repositories\IWebRepository;
use stdClass;

class WebService
{


    public function __construct(
        protected IWebRepository $repository
    )
    {}

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
        return $this->repository->update($data);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }

    public function paginate(int $page = 1, string $filter = null, int $totalPerPage = 15): IPagination
    {
        return $this->repository->paginate(page: $page, filter: $filter, totalPerPage: $totalPerPage);
    }
}
