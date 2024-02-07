<?php

namespace App\Supports;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response as ResponseFacade;
use Symfony\Component\HttpFoundation\Response;

class APIErrorResponse
{
    public function __construct(
        private readonly Exception $exception,
        private readonly int $status = Response::HTTP_INTERNAL_SERVER_ERROR
    ) {
        //
    }

    public static function new(Exception $exception, int $status = Response::HTTP_INTERNAL_SERVER_ERROR): self
    {
        return new self($exception, $status);
    }

    public function send(): JsonResponse
    {
        return ResponseFacade::json([
            'message' => $this->exception->getMessage(),
            'error'   => $this->exception->getTraceAsString(),
        ], $this->status);
    }
}
