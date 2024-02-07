<?php

namespace App\Supports;

use Illuminate\Support\Facades\Response as ResponseFacade;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class APIMessageResponse
{
    public function __construct(
        private readonly string $message,
        private readonly array $data = [],
        private readonly int $status = Response::HTTP_OK,
    ) {
        //
    }

    public static function new(string $message, array $data = [], int $status = Response::HTTP_OK): self
    {
        return new self($message, $data, $status);
    }

    public function send(): JsonResponse
    {
        return ResponseFacade::json([
            'message' => $this->message,
            'data'    => $this->data,
        ], $this->status);
    }
}
