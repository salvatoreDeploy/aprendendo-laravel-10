<?php

namespace App\Adapters;

use App\Http\Resources\DefaultResource;
use App\Repositories\IPagination;

class ApiAdapters
{
    public static function toJson(IPagination $data)
    {
        return DefaultResource::collection($data->itemsData())->additional([
            "meta" => [
                "total" => $data->total(),
                "isFirstPage" => $data->isFirstPage(),
                "isLastPage" => $data->isLastPage(),
                "currentPage" => $data->currentPage(),
                "nextPage" => $data->getNumberNextPage(),
                "previousPage" => $data->getNumberPreviousPage()
            ]
        ]);
    }
}
