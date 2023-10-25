<?php

namespace App\DTOs;

use App\Http\Requests\UpdateWebForumRequest;

class UpdateWebDTO
{
    public function __construct(public string $id, public string $subject, public string $status, public string $content)
    {}

    public function makeFromRequest(UpdateWebForumRequest $request): self
    {
        return new self($request->id, $request->subject, $request->status, $request->content);
    }
}
