<?php

namespace App\DTOs;

use App\Enum\ForumStatus;
use App\Http\Requests\UpdateWebForumRequest;

class UpdateWebDTO
{
    public function __construct(public string $id, public string $subject, public ForumStatus $status, public string $body)
    {}

    public static function makeFromRequest(UpdateWebForumRequest $request, string $id = null): self
    {
        return new self($id ?? $request->id, $request->subject, ForumStatus::A, $request->body);
    }
}
