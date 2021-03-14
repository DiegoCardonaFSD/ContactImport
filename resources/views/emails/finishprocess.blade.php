@component('mail::message')
# Your bulk upload has ended

Please go to the platform to verify the result.

@component('mail::button', ['url' => $url])
See results
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
