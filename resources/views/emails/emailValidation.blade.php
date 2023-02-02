<x-mail::message>
click this link to validate your email

<x-mail::button :url="'  '">
verification
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
