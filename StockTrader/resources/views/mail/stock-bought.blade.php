@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => '/mail'])
<form method="post" action="/mail">
    <button>press me</button>
</form>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
