@php
  use App\Frostbite\Test\Users\Helpers\FrostUsers;
  $users = FrostUsers::getUsers();
@endphp

<a href="/"><h3>Go to home</h3></a>
<a href="/users"><h3>Go to users</h3></a>

<h1>USER LIST</h1>
@foreach ($users as $user)
  {{ $user['first_name']}} {{ $user['last_name'] }}
@endforeach
