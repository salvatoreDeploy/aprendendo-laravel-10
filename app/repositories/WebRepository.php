<?php

namespace App\repositories;

use App\DTOs\CreateWebDTO;
use App\DTOs\UpdateWebDTO;
use App\Models\Forum;
use stdClass;

class WebRepository implements IWebRepository
{

    public function __construct(protected Forum $forum)
    {}

    /**
     * @param string $filter
     * @return array
     */
    public function getAll(string $filter = null): array
    {
        return $this->forum->where(function ($query) use ($filter){
            if($filter){
                $query->where('subject', $filter);
                $query->orWhere('body', 'like', "%{$filter}%");
            }
        })->get()->toArray();
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
        $forum =  $this->forum->create((array) $data);

        return (object) $forum->toArray();
    }

    /**
     * @param UpdateWebDTO $data
     * @return stdClass|null
     */
    public function update(UpdateWebDTO $data): stdClass|null
    {
       $forum = $this->forum->find($data->id);

       if(!$forum){
           return  null;
       }

       $forum->update((array) $data);

       return (object) $forum->toArray();
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
