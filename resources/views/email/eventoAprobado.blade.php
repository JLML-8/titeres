@component('mail::message')
# Introduction

¡Hola {{ $user->name }}

Tu proyecto más reciente ha sido creado con éxito. 



Gracias por tu atención, saludos y esperamos que estés bien.<br>
{{ config('app.name') }}
@endcomponent
