@component('mail::message')
# Votre poste a été aimé

{{ $liker->name }} a aimé l'un de vos poste

@component('mail::button', ['url' => route('posts.show', $post)])
    Voir le poste
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
