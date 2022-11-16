<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function showLoginForm(): Factory|View|Application
    {
        $pageTitle = _i('Dashboard');
        return view('admin.login', [
            'pageTitle' => $pageTitle,
        ]);
    }

    protected function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard.home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    protected function logout(Request $request): JsonResponse
    {
        try {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
        } catch (Exception $e) {
            return response()->json([
                'fail' => true,
                'url' => route('dashboard.login.show'),
                'title' => _i('Error'),
                'message' => _i('Session Expired'),
            ]);
        }

        return response()->json([
            'fail' => false,
            'url' => route('dashboard.login.show'),
            'title' => _i('Success'),
            'message' => _i('Logged out successfully'),
        ]);
    }
}
