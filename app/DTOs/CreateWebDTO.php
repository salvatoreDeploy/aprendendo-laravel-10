<?php

namespace App\DTOs;

use App\Http\Requests\CreateWebForumRequest;

class CreateWebDTO
{
    public function __construct(public string $subject, public string $status, public string $body)
    {}

    public static function makeFromRequest(CreateWebForumRequest $request): self
    {
        return new self($request->subject, 'p', $request->body);
    }
}
