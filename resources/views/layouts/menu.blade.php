
@foreach(App\Menu::orderBy('order','asc')->get() as $menuItem)

  @if( $menuItem->parent_id == 0 )
    <li {{ $menuItem->url ? '' : "class=dropdown" }}><a href="{{ $menuItem->children->isEmpty() ? $menuItem->url : "#" }}" {{ $menuItem->children->isEmpty() ? '' : "class=dropdown-toggle data-toggle=dropdown role=button aria-expanded=false" }}>{{ $menuItem->title }}</a>
  @endif

  @if( ! $menuItem->children->isEmpty() )
      <ul class="dropdown-menu" role="menu">
          @foreach($menuItem->children as $subMenuItem)
            <li><a href="{{ $subMenuItem->url }}">{{ $subMenuItem->title }}</a></li>
          @endforeach
      </ul>
  @endif

 </li> 

@endforeach




{{--
<ul class="nav navbar-nav">
    <li><a href="{{ url('/home') }}">Home</a></li>
</ul>
 --}}
