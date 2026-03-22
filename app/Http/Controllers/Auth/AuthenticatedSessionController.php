<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Throwable;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string'],
            ]);

            if (! Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
                return back()
                    ->withErrors(['email' => 'Email atau password yang Anda masukkan salah. Silakan periksa kembali data Anda.'])
                    ->withInput($request->only('email'));
            }

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);

        } catch (ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput($request->only('email'));

        } catch (Throwable $e) {
            Log::error('Login error: ' . $e->getMessage());
            
            return back()
                ->withErrors(['email' => 'Terjadi kesalahan saat login. Silakan coba lagi atau hubungi administrator jika masalah berlanjut.'])
                ->withInput($request->only('email'));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
