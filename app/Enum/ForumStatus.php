<?php

namespace App\Enum;

enum ForumStatus: string
{
    case A = "Open";
    case C = "Closed";
    case P = "Pendending";

    public static function fromValue(string $name): string
    {
        foreach (self::cases() as $status){
            if($name === $status->name){
                return $status->value;
            }
        }

        throw new \ValueError("$status is not valid");
    }
}
