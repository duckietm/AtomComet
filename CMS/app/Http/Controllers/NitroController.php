<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NitroController extends Controller
{
    public function __invoke(): View
    {
        return view('client.nitro', [
            'sso' => Auth::user()->ssoTicket(),
        ]);
    }
}
