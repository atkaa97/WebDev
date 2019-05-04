<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    /**
     * Handle Social login request
     *
     * @return response
     */
    public function socialLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }

    /**
     * Obtain the user information from Social Logged in.
     * @param $social
     * @return Response
     */
    public function handleProviderCallback($social)
    {
        $user_info_social = Socialite::driver($social)->user();

        $user_info_db = User::where('email', $user_info_social->email)->first();
        if ($user_info_db != null) {
            DB::table('users')->where('email', $user_info_social->email)->update([$social . '_id' => $user_info_social->id]);
            if (Auth::loginUsingId($user_info_db->id)) {
                return redirect('/home');
            }
        } else {
            $user_info_db = User::where($social . '_id', $user_info_social->id)->first();

            if ($user_info_db != null) {
                if (Auth::loginUsingId($user_info_db->id)) {
                    return redirect('/home');
                }
            } else {
                switch ($social) {
                    case "facebook":
                        $fb_full_name_arr = explode(' ', $user_info_social->name);
                        $fb_username = explode('@', $user_info_social->email);
                        User::create([
                            'facebook_id' => $user_info_social->id,
                            'username' => $fb_username[0],
                            'email' => $user_info_social->email,
                            'first_name' => $fb_full_name_arr[0],
                            'last_name' => $fb_full_name_arr[1],
                        ]);

                        loginNewSocialUser($social, $user_info_social);
                        return redirect('/home');
                        break;

                    case "github":
                        User::create([
                            'github_id' => $user_info_social->id,
                            'username' => $user_info_social->nickname,
                            'email' => $user_info_social->email,
                        ]);

                        loginNewSocialUser($social, $user_info_social);
                        return redirect('/home');
                        break;

                    case "twitter":

                        $twitter_full_name_arr = explode(' ', $user_info_social->name);
                        User::create([
                            'twitter_id' => $user_info_social->id,
                            'username' => $user_info_social->nickname,
                            'first_name' => $twitter_full_name_arr[0],
                            'last_name' => $twitter_full_name_arr[1],
                        ]);

                        loginNewSocialUser($social, $user_info_social);
                        return redirect('/home');
                        break;
                }
            }
        }
    }
}
