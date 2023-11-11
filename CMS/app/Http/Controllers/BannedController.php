<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BannedController extends Controller
{
    public function __invoke(): View
    {
        $ipBan = Ban::where('ip', '=', request()->ip())
            ->where('expire', '>', time())
            ->orderByDesc('id')
            ->first();

        return view('banned', [
            'bans' => $ipBan ?? Auth::user()->ban,
        ]);
    }
}
