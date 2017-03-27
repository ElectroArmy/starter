<?php

    use Illuminate\Support\Facades\Auth;

    /**
     * Function that returns errors to a partial.
     *
     * @param $attribute
     * @param $errors
     * @return mixed
     */
    function errors_for($attribute, $errors)
    {
        return $errors->first($attribute, '<span class="error">:message</span>');
    }

    /**
     * Determines links to profiles.
     *
     * @param string $text
     * @return string
     */
    function link_to_profile($text = 'Profile')
    {
        return link_to_route('profile', $text, Auth::user()->username);
    }

    /**
     * Determine link to the about page.
     *
     * @param string $text
     * @return string
     */
    function link_to_about($text = 'About Us')
    {
        return link_to_route('posts.about', $text, Auth::user()->username);
    }

    /**
     * Determine link to the post publish page.
     *
     * @param string $text
     * @return string
     */
    function link_to_publish($text = 'Add New Post')
    {
        return link_to_route('posts.create', $text, Auth::user()->username);
    }

    /**
     * Form to determine the submission of a DELETE restful request.
     *
     * @param $routeParams
     * @param string $label
     * @return string
     */
    function delete_form($routeParams, $label = 'Delete')
    {
        $form = Form::open(['method' => 'DELETE', 'route' => $routeParams]);

        $form .= Form::submit($label, ['class' => 'btn-danger']);

        return $form .= Form::close();

    }

    /**
     * Form to determine the RESTful deletion of a product.
     *
     * @param $routeParams
     * @param string $label
     * @return string
     */
    function delete_product($routeParams, $label = 'Delete')
    {
        $form = Form::open(['method' => 'DELETE', 'route' => $routeParams]);

        $form .= Form::submit($label, ['class' => 'btn-primary']);

        return $form .= Form::close();
    }




    /**
     * Uses Flash messages.
     *
     * @param null $title
     * @param null $message
     * @return \Illuminate\Foundation\Application|mixed
     */
    function flash($title = null, $message = null)
    {
        $flash = app('App\Http\Flash');

        if(func_num_args() == 0) {
            return $flash;
        }
        return $flash->message($title, $message);
    }