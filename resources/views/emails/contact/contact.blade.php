@component('mail::message')
<h1>Hello {{ $name }}</h1>
<p>Thank you for sending us your message</p>
<p>We will send a reply {{ $email }} shortly</p>
<p>
    {{ $body_message }}
</p>
@component('mail::button', ['url' => 'https://games.ormrepo.co.uk'])
Browse
@endcomponent

@component('mail::panel')
The information contained in this website is for general information purposes only. The information is provided by Gamesstation whilst we endeavour to keep the information up to date and correct, we make no representations or warranties of any kind. Any reliance you place on such information is therefore strictly at your own risk.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

