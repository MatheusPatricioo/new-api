<?php

namespace App\Traits;

use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

trait HttpResponses
{
    // Método para respostas de sucesso
    public function response($message, $status, $data = [])
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'status' => $status,
        ], $status);
    }

    // Método para respostas de erro
    public function error($message, $status, $errors = [], $data = [])
    {
        return response()->json([
            'message' => $message,
            'errors' => $errors,
            'data' => $data,
            'status' => $status,
        ], $status);
    }
}
