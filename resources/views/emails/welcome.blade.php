@component('mail::message')
You are Welcome to our WEBSITE.
Thanks for your Registration
      
Name: {{ $mailData['name'] }}<br/>
User Name: {{ $mailData['username'] }}<br/>
Email: {{ $mailData['email'] }}
      
Thanks,<br/>
{{ config('app.name') }}
@endcomponent