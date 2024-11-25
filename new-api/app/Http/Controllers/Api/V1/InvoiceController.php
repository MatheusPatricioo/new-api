<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Http\Resources\V1\InvoiceResource;
use Illuminate\Support\Facades\Validator;
class InvoiceController extends Controller
{
    use HttpResponses;
    // Retorna a lista de todas as faturas
    public function index()
    {
        return InvoiceResource::collection(Invoice::with('user')->get());
    }

    // Exibe o formulário de criação de fatura (não usado em API)
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'type' => 'required|string|max:1',
            'paid' => 'required|boolean',
            'payment_date' => 'nullable|date',
            'value' => 'required|numeric|between:1,9999.99',
        ]);

        if ($validator->fails()) {
            return $this->error('Data Invalid', 422, $validator->errors());
        }

        $created = invoice::create($validator->validated());

        if ($created) {
            return $this->response('Invoice created', 200, $created);
        }

        return $this->error('Invoice not created', 400);
    }


    // Mostra uma fatura específica pelo ID
    public function show(string $id)
    {
        //
    }

    // Exibe o formulário de edição de fatura (não usado em API)
    public function edit(string $id)
    {
        //
    }

    // Atualiza uma fatura existente pelo ID (implementação futura)
    public function update(Request $request, string $id)
    {
        //
    }

    // Exclui uma fatura pelo ID (implementação futura)
    public function destroy(string $id)
    {
        //
    }
}
