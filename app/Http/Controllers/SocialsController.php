<?php

namespace App\Http\Controllers;

use AdamWathan\EloquentOAuth\Facades\OAuth as SocialAuth;
use App\User;
use Illuminate\Support\Facades\Redirect;
use SocialNorm\Exceptions\ApplicationRejectedException;
use SocialNorm\Exceptions\InvalidAuthorizationCodeException;



class SocialsController extends Controller
{

    /**
     * @var UserMailer
     */
    protected $mailer;


    /**
     * @param User $user
     *
     */
    public function __construct(User $user)
    {

        $this->user = $user;

    }

    /**
     * After clicking on the sign in button the authorize method is fired and
     * is redirected to authorisation URL, the provider is passed as a parameter
     * ie github, facebook.
     *
     * @param mixed $provider
     * @return \Illuminate\Auth\Access\Response $provider
     *
     */
    public function authorise($provider)
    {
        return SocialAuth::authorize($provider);


    }

    /**
     * Redirects the user with a callback URL and a token
     * this is used to log the user in using OAuth Login client
     * Adam Wathans Oauth facade and it checks to see if the user exists or not.
     *
     * @param $provider
     * @return mixed
     */
    public function login($provider)
    {
        try {
            SocialAuth::login($provider,
                function ($user, $userDetails) {

                    $existing_user = User::where('email', $userDetails->email)->first();

                    if ($existing_user !== null)
                    {
                        return $existing_user;
                    }

                    $user->email = $userDetails->email;
                    $user->username = $userDetails->nickname;
                    $user->name = $userDetails->full_name;


                    $user->save();

                    $user = auth()->user();

                    event(new UserHasRegistered($user));
                });
        }
        catch (ApplicationRejectedException $e)
        {
            // User rejected application
            return \Response::json(['success' => false,'message'=>'User Authorization Rejected']);
        }
        catch (InvalidAuthorizationCodeException $e)
        {
            return \Response::json(['success' => false,'message'=>'Invalid Authorization Code']);
            // Authorization was attempted with invalid
            // code,likely forgery attempt
        }
        return Redirect::intended();
    }

}
