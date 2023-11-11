<?php

namespace App\Actions\Fortify\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Events\RecoveryCodeReplaced;
use Laravel\Fortify\Http\Requests\TwoFactorLoginRequest;
use Laravel\Fortify\Http\Responses\TwoFactorLoginResponse;

class TwoFactorAuthenticatedSessionController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Attempt to authenticate a new session using the two factor authentication code.
     */
    public function store(TwoFactorLoginRequest $request): TwoFactorLoginResponse
    {
        $user = $request->challengedUser();

        if ($code = $request->validRecoveryCode()) {
            $user->replaceRecoveryCode($code);

            event(new RecoveryCodeReplaced($user, $code));
        } elseif (! $request->hasValidCode()) {
            throw ValidationException::withMessages([
                'code' => __('Invalid Two Factor Authentication code'),
            ]);
        }

        $this->guard->login($user, $request->remember());

        $request->session()->regenerate();

        $user->update([
            'last_ip' => $request->ip(),
        ]);

        return app(TwoFactorLoginResponse::class);
    }
}
