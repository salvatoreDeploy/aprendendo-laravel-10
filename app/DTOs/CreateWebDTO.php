<?php

namespace App\DTOs;

use App\Enum\ForumStatus;
use App\Http\Requests\CreateWebForumRequest;

class CreateWebDTO
{
    public function __construct(public string $subject, public ForumStatus $status, public string $body)
    {}

    public static function makeFromRequest(CreateWebForumRequest $request): self
    {
        return new self($request->subject, ForumStatus::A, $request->body);
    }
}
