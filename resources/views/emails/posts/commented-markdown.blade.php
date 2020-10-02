@component('mail::message')
# Introduction

Some one has comment your post

[Page Secret](http://127.0.0.1:8000/secret)

The body of your message.

@component('mail::button', ['url' => route('posts.show', ['post'=> $comment->commentable->id])])
Button Text
@endcomponent

@component('mail::button', ['url' => route('users.show', ['user' => $comment->user->id])])
{{ $comment->user->name }}
@endcomponent

@component('mail::panel')
{{ $comment->content }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
