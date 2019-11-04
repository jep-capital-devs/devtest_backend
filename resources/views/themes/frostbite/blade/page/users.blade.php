@php
  use App\Frostbite\Test\Users\Helpers\Users;
  $users = Users::getUsers();
@endphp

<h1>USER LIST</h1>

@foreach ($users as $user)
  {{ $user['first_name']}} {{ $user['last_name'] }}
@endforeach
