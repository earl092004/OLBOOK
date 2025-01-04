<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function destroy(Request $request)
{
    // Log out the user
    Auth::logout();

    // Invalidate the session to clear all session data
    $request->session()->invalidate();

    // Regenerate CSRF token after logout to avoid 419 errors
    $request->session()->regenerateToken();

    // Redirect to the login page or home page
    return redirect('/login');
}
}
