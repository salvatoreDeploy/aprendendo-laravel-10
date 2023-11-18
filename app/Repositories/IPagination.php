<?php

namespace App\Repositories;

interface IPagination
{

    /**
     * @return \stdClass[]
     */
    public function itemsData(): array;

    /**
     * @return int
     */
    public function total(): int;

    /**
     * @return bool
     */
    public function isFirstPage(): bool;

    /**
     * @return bool
     */
    public function isLastPage(): bool;

    /**
     * @return int
     */
    public function currentPage(): int;

    /**
     * @return int
     */
    public function getNumberNextPage(): int;

    /**
     * @return int
     */
    public function getNumberPreviousPage(): int;
}
