<?php

namespace App\Exceptions;


use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        //app('sneaker')->captureException($e);
        if ($this->shouldReport($e)) {
            app('sneaker')->captureException($e);
        }
        return parent::report($e);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param AuthenticationException|\Illuminate\Auth\AuthenticationException $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest('login');
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof ModelNotFoundException) {
            $e = new NotFoundHttpException($e->getMessage(), $e);
        }

        return parent::render($request, $e);

        if ($e instanceof RSSNotFoundException) {
            return response(view('errors.404'), 404);

            return parent::render($request, $e);
        }


        if ($e instanceof ProductNotFoundException) {
            return response(view('errors.405'), 405);

            return parent::render($request, $e);
        }

        if ($e instanceof CartNotFoundException) {
            return response(view('errors.406'), 406);

            return parent::render($request, $e);
        }

        if ($e instanceof CommunityLinkAlreadySubmittedNotFoundException) {
            return response(view('errors.407'), 407);

            return parent::render($request, $e);
        }

        if ($e instanceof PostNotFoundException) {
            return response(view('errors.408'), 408);

            return parent::render($request, $e);
        }

        if ($e instanceof TagNotFoundException) {
            return response(view('errors.409'), 409);

            return parent::render($request, $e);
        }

        if ($e instanceof ProfileNotFoundException) {
            return response(view('errors.410'), 410);

            return parent::render($request, $e);
        }

        if ($e instanceof ActivityNotFoundException) {
            return response(view('errors.411'), 411);

            return parent::render($request, $e);
        }

        if ($e instanceof OrderNotFoundException) {
            return response(view('errors.412'), 412);

            return parent::render($request, $e);
        }

        if ($e instanceof SlugNotFoundException) {
            return response(view('errors.413'), 413);

            return parent::render($request, $e);
        }

    }

}
