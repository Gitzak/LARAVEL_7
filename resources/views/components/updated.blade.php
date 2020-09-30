<p class="text-muted">
    @if($avatar)
    <img class="img-thumbnail avatar my-3" src="{{ $avatar }}" alt="">
    @endif
    {{ empty(trim($slot)) ? 'Added' : $slot }}
    {{ $date }}
    {!! isset($name) ? '| by <a href='. route('users.show',['user' => $userId]) .'>'. $name .'</a>' : ''  !!}
</p>