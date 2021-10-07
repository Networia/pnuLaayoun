<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            // info(request()->header());
        
            if ($user && Hash::check($request->password, $user->password)) {
                if ($user->status == 0) {
                    throw ValidationException::withMessages([
                        Fortify::username() => "Your account is deactivated",
                    ]);
                    return false;
                }
                return $user;
            }
        });

        Fortify::verifyEmailView(fn () => view('auth.verify'));

        Fortify::loginView(function () {
            $pageConfigs = [
                'bodyClass' => "bg-full-screen-image",
                'blankPage' => true
            ];
            return view('auth.login')
            ->with([
                'pageConfigs' => $pageConfigs
            ])
            ;
        });
        
        Fortify::registerView(function () {
            $pageConfigs = [
                'bodyClass' => "bg-full-screen-image",
                'blankPage' => true
            ];
            return view('auth.register')
            ->with([
                'pageConfigs' => $pageConfigs
            ]);
        });

        Fortify::requestPasswordResetLinkView(function () {
            // return view('auth.forgot-password');
            $pageConfigs = [
                'bodyClass' => "bg-full-screen-image",
                'blankPage' => true
            ];
            return view('auth.passwords.email')->with([
                'pageConfigs' => $pageConfigs
            ]);;
        });

        Fortify::resetPasswordView(function ($request) {
            $pageConfigs = [
                'bodyClass' => "bg-full-screen-image",
                'blankPage' => true
            ];
            return view('auth.passwords.reset', ['request' => $request])->with([
                'pageConfigs' => $pageConfigs
            ]);;
        });

        Fortify::confirmPasswordView(function () {
            $pageConfigs = [
                'bodyClass' => "bg-full-screen-image",
                'blankPage' => true
            ];
            return view('auth.passwords.confirm')->with([
                'pageConfigs' => $pageConfigs
            ]);;
        });

        Fortify::twoFactorChallengeView(function () {
            return view('auth.two-steps');
        });
        
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
