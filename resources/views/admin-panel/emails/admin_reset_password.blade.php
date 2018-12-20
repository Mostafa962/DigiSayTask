@component('mail::message')
# Reset Account
Welcome{{$data['data']->name}}<br>
The body of your message.

@component('mail::button', ['url' => 'admin/reset/password/'.$data['token']])
Reset Now
@endcomponent
or Copy This link <br>
<a href="{{ ('admin/reset/password/'.$data['token'])}}">'admin/reset/password/'.$data['token']</a>
Thanks,<br>
{{ config('app.name') }}