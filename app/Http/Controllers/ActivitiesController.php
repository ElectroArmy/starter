<?php

namespace App\Http\Controllers;

use App\Exceptions\ActivityNotFoundException;
use App\Http\Requests;
use Illuminate\Http\Response;


class ActivitiesController extends Controller
{

    /**
     * Show the activity feed for a user.
     * @return Response
     * @throws ActivityNotFoundException
     * @internal param User $user
     */
    public function show()
    {
        try {
            $user = auth()->user();

            $activity = $user->activity()->with(['user', 'subject'])->get();

        } catch (\Exception $e) {

            throw new ActivityNotFoundException($e->getMessage());
        }

        return view('activity.show', compact('activity'));
    }

}