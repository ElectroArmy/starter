<?php

    namespace App\Http\Controllers;

    use App\Queries\CommunityLinksQuery;
    use App\Channel;
    use App\Exceptions\CommunityLinkAlreadySubmitted;
    use App\Http\Requests\CommunityLinkForm;
    use App\Http\Flash;


    class CommunityLinksController extends Controller
    {
        /**
         * Run the Community links query and pull out the popular
         * links from the request object.
         *
         * @param Channel $channel
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function index(Channel $channel = null)
        {

            $links = (new CommunityLinksQuery)->get(
                request()->exists('popular'), $channel
            );

            $channels = Channel::orderBy('title', 'asc')->get();


            return view('community.index', compact('links', 'channels', 'channel'));

        }

        /**
         *
         *
         * @param CommunityLinkForm $form
         * @return \Illuminate\Http\RedirectResponse
         * @internal param User $user , Request $request
         */
        public function store(CommunityLinkForm $form)
        {
            try {

                $form->persist();

                if (auth()->user()->isTrusted()){

                    flash()->success('Contribution Accepted', 'Thank you for your contribution.');

                } else {

                    flash()->info('Thanks', 'This contribution will be approved shortly.');
                }
            } catch (CommunityLinkAlreadySubmitted $e) {

                flash()->error('We will elevate the link to the top and amend the timestamps Thanks', 'That link has already been submitted');

            }

            return back();
        }

    }
