@php
  if (Voyager::translatable($items)) {
    $items = $items->load('translations');
  }
@endphp

<ul class="nav navbar-nav">
  <li class="active">
    <a target="_self" href="http://suretypedia.test/admin">
      <span class="icon voyager-boat"></span>
      <span class="title">Dashboard</span>
    </a>
  </li>

  @foreach ($items->sortBy('order') as $item)
    <li class="">
      <a target="_self" href="{{ url($item->link()) }}">
        <span class="icon {{ $item->icon_class}}"></span>
        <span class="title">{{ $item->title }}</span>
      </a>
    </li>
  @endforeach

  <li class="active">
    <a target="_self" href="{{url('/admin/users/' . Auth::user()->id . '/edit')}}">
      <span class="icon voyager-person"></span>
      <span class="title">Edit Profile</span>
    </a>
  </li>
</ul>
