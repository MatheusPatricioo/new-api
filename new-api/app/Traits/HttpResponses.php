<?php

namespace App\Traits;

use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Database\Eloquent\Model;

trait HttpResponses
{

    public function response ($message, $status, Model $data =[])
{
    return response()->json([
        'message' => $message,
        'data' => $data,
        'status' => $status], $status);

}

    public function error ($message, $status, MessageBag $errors = [], $data =[])
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'errors' => $errors,
            'status' => $status], $status);

    }
}
