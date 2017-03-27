<ul class="community-group">
    @if(count($links))
        @foreach($links as $link)
            <li class="CommunityLink list-group-item">

                <form method="POST" action="/votes/{{ $link->id }}">
                    {{ csrf_field() }}

                    <button class="btn {{ Auth::check() && Auth::user()->voteFor($link) ? 'btn-success' : 'btn-default' }}"
                    {{ Auth::guest() ? 'disabled': '' }}>
                        {{ $link->votes->count() }}
                    </button>
                </form>


                <a href="/community/{{ $link->channel->slug }}" class="label label-default" style="background: {{ $link->channel->color }}; color: white";>
                    {{ $link->channel->title }}
                </a><!-- /.label-default -->
                <a href="{{ $link->link }}" target="_blank" class="usr">
                    {{ $link->title }}
                </a>

                <small>
                    contributed by <a href="#" class="usr">{{ $link->creator->name }},</a>

                    {{ $link->updated_at->diffForHumans() }}
                </small>
            </li><!-- /.Links -->
        @endforeach
    @else
        <li class="Links__link">
            <p>No contributions yet</p>
        </li><!-- /.Links__link -->
    @endif
</ul><!-- /.Links -->



{{ $links->appends(request()->query())->links() }}

