@component('mail::message')
# ¡Bienvenid@ a {{ config('app.name') }}!
La **Asociación de Empresarios de Iztapalapa A.C de C.V** le da la más cordial bienvenida a nuestra plataforma {{ config('app.name') }}.

@component('mail::button', ['url' => "http://aei.mx/activacion/$code"])
Activar Cuenta
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
