@foreach($items as $item)
    <a href="{!! $item->url() !!}" class="navbar-item{{ ($item->isActive) ? ' is-active':'' }}"> {!! $item->title !!}</a>
@endforeach
