<?php
namespace Illuminate\Foundation\Auth;

use App\Models\Logins;
use App\Models\Users;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;


trait AuthenticatesUsers
{
    use RedirectsUsers, ThrottlesLogins;

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'users' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);

        $login = Logins::where('users', $credentials['users'])->first();

        if (!$login) {
            Log::error('No se encontró login con users: ' . $credentials['users']);
            return false;
        }

        if (!Hash::check($credentials['password'], $login->password)) {
            Log::error('La contraseña no coincide para users: ' . $credentials['users']);
            return false;
        }

        $user = Users::where('number_identification', $login->users)->first();

        
        $user1= User::where('states', 'active')->first();
        if($user1)
        {
            log::error('su cuenta esta inactivada');
        }

        if (!$user) {
            Log::error('No se encontró usuario con number_identification: ' . $login->users);
            return false;
        }

        Auth::login($user);

        return true;
    }

    protected function credentials(Request $request)
    {
        return $request->only('users', 'password');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }

    protected function authenticated(Request $request, $user)
    {
        $login = Logins::where('users', $user->number_identification)->first();

        if ($login) {
            $usuario = Users::where('number_identification', $login->users)->first();

            if ($usuario) {
                $usuario->load('roles');

                $rol = $usuario->roles->first();

                if ($rol) {
                    $usuario->syncRoles([$rol->name]);
                    Log::info('Rol asignado: ' . $rol->name);
                } else {
                    Log::warning('El usuario no tiene un rol asignado.');
                }
            } else {
                Log::warning('No se encontró el usuario con number_identification: ' . $login->users);
            }
        } else {
            Log::warning('No se encontró el login para users: ' . $user->number_identification);
        }

        return null;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'users' => [trans('auth.failed')],
        ]);
    }

    public function username()
    {
        return 'users';
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    protected function loggedOut(Request $request)
    {
        //
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
