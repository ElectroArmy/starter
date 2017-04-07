<?php

namespace App\Http\Controllers;

use App\Events\ProfileWasCreated;
use App\Exceptions\ProfileNotFoundException;
use App\Http\Requests\ProfileRequest;
use App\User;


class ProfilesController extends Controller
{
    /**
     * @var User
     */
    public $user;


    /**
     * Initialise the user.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;

        //parent::__construct();
    }


    /**
     * Display the specified resource.
     *
     * @param $username
     * @return Response
     * @throws ProfileNotFoundException
     * @internal param int $id
     */
    public function show($username)
    {
        try
        {
            $user = User::with('profile')->WhereUsername($username)->firstOrFail();

            $index = 'Show your dashboard';
        }
        catch (ProfileNotFoundException $e)

        {
            throw new ProfileNotFoundException($e->getMessage());
        }

        return view('profiles.show', compact('user', 'index'));

    }

    /**
     * Show the form to create a new profile.
     *
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $index = 'Create your profile';

        return view('profiles.create', compact('user', 'index'));
    }

    /**
     * Store a new profile by fetching the request from the form
     * and fetching the user to create the profile.
     * This in turn fires an event.
     *
     * @param ProfileRequest $request
     * @return \Illuminate\View\View
     * @internal param CreateProfileRequest $request
     * @internal param $username
     */
    public function store(ProfileRequest $request)
    {
        $request = $request->all();

        $user = auth()->user();

        $profile = $user->profile()->create($request);

        event(new ProfileWasCreated($user));

        return redirect()->route('home');



    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $username
     * @return Response
     * @throws ProfileNotFoundException
     * @internal param int $id
     */
    public function edit($username)
    {
        try
        {
            $user = User::WhereUsername($username)->firstOrFail();

            $index = 'Edit your profile';

        } catch (ProfileNotFoundException $e)
        {
            throw new ProfileNotFoundException($e->getMessage());
        }
        return view('profiles.edit', compact('user', 'index'));
    }


    /**
     * Update the profile by fetching the username and filling the request.
     *
     * @param $username
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ProfileNotFoundException
     */
    public function update($username, ProfileRequest $request)
    {
        try
        {
            $user = User::WhereUsername($username)->firstOrFail();

            $request = $request->all();

            $user->profile->fill($request)->save();

        } catch (ProfileNotFoundException $e)

        {
            throw new ProfileNotFoundException($e->getMessage());
        }

        return view('profiles.show', compact('user'));
    }
}
