@php
  use App\Frostbite\Test\Users\Helpers\FrostUsers;
  $users = FrostUsers::getUsers();
@endphp

<a href="/"><h3>Go to home</h3></a>
<a href="/users"><h3>Go to users</h3></a>

<h1>USER LIST</h1>
{{-- NEED TO SHOW A LIST OF ALL USERS AND THEIR INFO --}}

<h1>Enabled USER LIST</h1>
{{-- NEED TO SHOW A LIST OF ALL ENABDLED USERS AND THEIR INFO --}}
