<?php

namespace App\Presenters;

use App\Repositories\IPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class PaginationPresenter implements IPagination
{
    /**
     * @var  \stdClass[]
     */
    private $items;

    public function __construct(protected LengthAwarePaginator $paginator)
    {
        $this->items = $this->resolveItems($this->paginator->items());
    }

    /**
     * @return \stdClass[]
     */
    public function itemsData(): array
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function total(): int
    {
       return $this->paginator->total() ?? 0;
    }

    /**
     * @return bool
     */
    public function isFirstPage(): bool
    {
        return $this->paginator->onFirstPage();
    }

    /**
     * @return bool
     */
    public function isLastPage(): bool
    {
        return $this->paginator->onLastPage();
    }

    /**
     * @return int
     */
    public function currentPage(): int
    {
        return $this->paginator->currentPage() ?? 1;
    }

    /**
     * @return int
     */
    public function getNumberNextPage(): int
    {
        return $this->paginator->currentPage() + 1;
    }

    /**
     * @return int
     */
    public function getNumberPreviousPage(): int
    {
        return $this->paginator->currentPage() -1;
    }

    private function resolveItems(array $items): array
    {
        $response = [];

       foreach ($items as $item){
            $stdClassObject = new \stdClass();

            foreach ($item->toArray() as $key => $value){
                $stdClassObject->{$key} = $value;
            }

            array_push($response, $stdClassObject);
       }

       return $response;
    }
}
