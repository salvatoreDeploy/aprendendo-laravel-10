<?php

namespace App\repositories;

use App\DTOs\CreateWebDTO;
use App\DTOs\UpdateWebDTO;
use stdClass;

class WebRepository implements IWebRepository
{

    /**
     * @param string $filter
     * @return array
     */
    public function getAll(string $filter): array
    {
        // TODO: Implement getAll() method.
    }

    /**
     * @param string $id
     * @return stdClass|null
     */
    public function findOne(string $id): stdClass|null
    {
        // TODO: Implement findOne() method.
    }

    /**
     * @param CreateWebDTO $data
     * @return stdClass
     */
    public function create(CreateWebDTO $data): stdClass
    {
        // TODO: Implement create() method.
    }

    /**
     * @param UpdateWebDTO $data
     * @return stdClass|null
     */
    public function update(UpdateWebDTO $data): stdClass|null
    {
        // TODO: Implement update() method.
    }

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void
    {
        // TODO: Implement delete() method.
    }
}
