<style>
    :root {
         --clr-primary: #393943;
     --clr-secondary: #F2F2F3;
     --clr-accent: #24aadb;
    --clr-2: #393943;
    --clr-1: #393e46;
    --clr-3: #24aadb;
    --clr-4: #24aadbb4;
}
    
    .pa {
        padding-top: .5em;
        display: flex;
        width: 100%;
        gap: ;
        justify-content: space-between;
    }
    .pagination .link {
        color: var(--clr-3);
        margin-inline: .5em;
    }
    .pagination .link:hover{
        color: var(--clr-4);
    }
    .disabled{
        border-bottom: 2px solid var(--clr-2);
        color: var(--clr-2);
        opacity: .5;
        text-align: center;
        display: inline-block;
        height: 30px;
        width: 25px;
        text-decoration: none;
        margin-inline: 1px;
        transition: .3s;
    }
    .pagelink:not(.disabled){
        color: var(--clr-2);
        text-align: center;
        border-bottom: 2px solid var(--clr-3);
        display: inline-block;
        height: 30px;
        width: 25px;
        text-decoration: none;
        margin-inline: 1px;
        transition: .3s;
    }
    .pagelink:not(.disabled):hover{
        background-color: var(--clr-4);
        color: var(--clr-1);
    }
    .d-flex{
        align-items: flex-end
    }
</style>

@if ($paginator->hasPages())

    
        <div class="d-flex pa justify-content-between">
            <div class="d-flex gap-2">
                <p class="small text-muted">
                    {!! __('Showing') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
                <ul class="pagination">
                    {{-- previouspage link --}}
                    @if ($paginator->onFirstPage())
                    <li aria-disabled="true">
                        <span>@lang('pagination.previous')</span>
                    </li>
                    @else
                    <li>
                        <a class="link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                    </li>
                    @endif
                    {{-- next page link --}}
                    @if ($paginator->hasMorePages())
                    <li>
                        <a class="link" href="{{ $paginator->nextPageUrl() }}" rel="prev">@lang('pagination.next')</a>
                    </li>
                @else
                <li aria-disabled="true">
                        <span>@lang('pagination.next')</span>
                    </li>
                    @endif
                </ul>
            </div>
                <div>
                <ul class="pagination">
                    
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="pagelink disabled" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li>
                            <a class="pagelink" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                    @endif



                    @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li aria-disabled="true"><span class="pagelink disabled">{{ $element }}</span></li>
                            @endif


                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li aria-current="page"><span class="pagelink disabled">{{ $page }}</span></li>
                                    @else
                                        <li><a class="pagelink" href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach


                        @if ($paginator->hasMorePages())
                        <li>
                            <a class="pagelink" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                        @else
                            <li aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span class="pagelink disabled" aria-hidden="true">&rsaquo;</span>
                            </li>
                        @endif
                </ul>
            </div>
        </div>

    
@endif
