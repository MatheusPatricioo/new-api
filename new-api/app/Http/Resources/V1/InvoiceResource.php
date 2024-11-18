<?php

namespace App\Http\Resources\v1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    private array $types = ['C' => 'Cartão', 'B' => 'Boleto', 'P' => 'Pix']; // Tipos de pagamentos

    public function toArray(Request $request): array
    {
        $paid = $this->paid;
        return [
            'user' => [
                'firstName' => $this->user->firstName,
                'lastName' => $this->user->lastName,
                'fullName' => $this->user->firstName . ' ' . $this->user->lastName,
                'email' => $this->user->email,
            ],
            'type' => $this->types[$this->type] ?? 'Tipo desconhecido', // Garantir que não quebre
            'value' => 'R$ ' . number_format($this->value, 2, ',', '.'),
            'paid' => $paid ? 'Pago' : 'Não pago',
            'payment_date' => $paid
                ? Carbon::parse($this->payment_date)->format('d/m/Y H:i:s')
                : 'Não disponível',
        ];
    }
}
