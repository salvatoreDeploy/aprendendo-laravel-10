<?php

namespace App\repositories;

use App\DTOs\CreateWebDTO;
use App\DTOs\UpdateWebDTO;
use App\Models\Forum;
use stdClass;

class WebRepository implements IWebRepository
{

    public function __construct(protected Forum $forum)
    {

    }

    /**
     * @param string $filter
     * @return array
     */
    public function getAll(string $filter): array
    {
        return $this->forum->where(function ($query) use ($filter){
            if($filter){
                $query->where('subject', $filter);
                $query->orWhere('body', 'like', "%{$filter}%");
            }
        })->all()->toArray();
    }

    /**
     * @param string $id
     * @return stdClass|null
     */
    public function findOne(string $id): stdClass|null
    {
        $forum = (object) $this->forum->find($id);

        if(!$forum){
            return null;
        }

        return (object) $forum->toArray();
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
        $this->forum->findOrFail($id)->delete();
    }
}
