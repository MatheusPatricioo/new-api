<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
            'user_id' ,
            'type' ,
            'paid',
            'value',
            'payment_date',
    ];

    // Relação de belongsTo indicando que cada Invoice pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function filter(Request $request){

    }
}
