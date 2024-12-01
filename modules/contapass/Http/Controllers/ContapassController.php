<?php

namespace Modules\Contapass\Http\Controllers;

use App\Http\Controllers\Controller;

class ContapassController extends Controller
{
    public function index()
    {
        return view('contapass::index');
    }
}