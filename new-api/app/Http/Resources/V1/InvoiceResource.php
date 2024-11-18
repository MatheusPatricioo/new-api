<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{

    private array $types = ['C'=>'cartão', 'B' =>'Boleto', 'P' =>'Pix']; // tipos de pagamentos :)
    public function toArray(Request $request): array
    {
        return [
            'user'=> [
                'firstName' => $this->user->firstName,
                'lastName' => $this->user->lastName,
                'fullName' => $this->user->firstName . ' ' . $this->user->lastName,
                'email' => $this->user->email,
            ]
        ];
    }
}
