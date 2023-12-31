<?php

namespace App\Repositories;

use App\DTOs\CreateWebDTO;
use App\DTOs\UpdateWebDTO;
use App\Models\Forum;
use App\Presenters\PaginationPresenter;
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
        $forum = $this->forum->find($id);

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

    /**
     * @param int $page
     * @param string|null $filter
     * @param int $totalPerPage
     * @return IPagination
     */
    public function paginate(int $page = 1, string $filter = null, int $totalPerPage = 15): IPagination
    {
        $result =  $this->forum->where(function ($query) use ($filter){
            if($filter){
                $query->where('subject', $filter);
                $query->orWhere('body', 'like', "%{$filter}%");
            }
        })->paginate($totalPerPage, ['*'], 'page', $page);

       // dd((new PaginationPresenter($result))->itemsData());
       return new PaginationPresenter($result);
    }
}
