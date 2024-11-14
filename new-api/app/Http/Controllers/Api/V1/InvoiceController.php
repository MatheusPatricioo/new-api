<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // Retorna a lista de todas as faturas
    public function index()
    {
        //
    }

    // Exibe o formulário de criação de fatura (não usado em API)
    public function create()
    {
        //
    }

    // Salva uma nova fatura no banco (implementação futura)
    public function store(Request $request)
    {
        //
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
