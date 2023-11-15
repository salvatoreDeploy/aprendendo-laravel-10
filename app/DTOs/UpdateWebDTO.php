<?php

namespace App\DTOs;

use App\Http\Requests\UpdateWebForumRequest;

class UpdateWebDTO
{
    public function __construct(public string $id, public string $subject, public string $status, public string $body)
    {}

    public static function makeFromRequest(UpdateWebForumRequest $request, string $id = null): self
    {
        return new self($request->id, $request->subject, 'p', $request->body);
    }
}
