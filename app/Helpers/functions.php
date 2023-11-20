<?php

use App\Enum\ForumStatus;

if(!function_exists('getStatusForum')){
    function getStatusForum(string $status):string{
       return ForumStatus::fromValue($status);
    }
}
