@component('mail::message')
<h1>{{ $name }} has sent a support request</h1>
<p>Thank you for submitting your support request using the Enquiry form</p>
<p>We will send a reply {{ $email }} shortly</p>
<p>
    Here is a description of the problem the customer is experiencing:
    {{ $problem }}
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


