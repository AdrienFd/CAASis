Bonjour {{ $name }}<br><br>
activez votre compte en cliquant sur le lien :<br><br>

<a href='{{ $link }}'>{{ url('user/activation', $link )}}</a><br>