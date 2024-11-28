<?php

namespace App\Filters;

use DeepCopy\Exception\PropertyException;
use Illuminate\Http\Request;

class InvoiceFilter extends Filter
{
    protected $allowedOperatorsfields = [
        'value' => ['gt', 'eq', 'lt', 'gte', 'lte', 'ne'],
        'type' => ['eq', 'ne', 'in'],
        'paid' => ['eq', 'ne'],
        'payment_date' => ['gt', 'eq', 'lt', 'gte', 'lte', 'ne'],

    ];
    protected $translateOperatorsFields = [
        'gt' => '>',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<=',
        'ne' => '!=',
        'eq' => '=',
        'in' => 'in',
    ];


}
