<x-mail::message>
# Contact from {{ $name }}
{{$email}}
<br>
{{$content}}.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
