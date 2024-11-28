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
    public function index(Request $request)
    {
        //return InvoiceResource::collection(Invoice::with('user')->get());
        // return InvoiceResource::collection(Invoice::where([
        //     ['value', '>', 5000],
        //     ['paid', '=', 1]

        // ])->with('user')->get());
        return (new Invoice())->filter($request);
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
            'value' => 'required|numeric|between:1,9999.99',
            'payment_date' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        if ($validator->fails()) {
            return $this->error('Data Invalid', 422, $validator->errors());
        }

        $created = Invoice::create($validator->validated());

        if ($created) {
            return $this->response('Invoice created', 200,  new InvoiceResource($created->load('user')));
        }

        return $this->error('Invoice not created', 400);
    }


    // Mostra uma fatura específica pelo ID
    public function show(Invoice $invoice)
    {
        return new InvoiceResource($invoice->load('user'));
    }


    // Exibe o formulário de edição de fatura (não usado em API)
    public function edit(string $id)
    {
        //
    }

    // Atualiza uma fatura existente pelo ID (implementação futura)
    public function update(Request $request, string $id)
    {
        // Validar os dados recebidos
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'type' => 'required|string|max:1',
            'paid' => 'required|boolean',
            'value' => 'required|numeric|between:1,9999.99',
            'payment_date' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        if ($validator->fails()) {
            return $this->error('Validation failed', 422, $validator->errors());
        }

        // Procurar a fatura pelo ID
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return $this->error('Invoice not found', 404);
        }

        // Atualizar os dados da fatura
        $updated = $invoice->update($validator->validated());

        if ($updated) {
            return $this->response('Invoice updated', 200, new InvoiceResource($invoice->load('user')));
        }

        return $this->error('Invoice not updated', 400);
    }
    public function destroy(Invoice $invoice)
    {
        if ($invoice->delete()) {
            return $this->response('Invoice deleted', 200);
        }
        return $this->error('Invoice not deleted', 400);
    }

}
