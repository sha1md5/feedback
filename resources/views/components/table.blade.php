@if ($items->count()>0)
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            @foreach ($columns as $column)
                <th scope="col">{{$column}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    @foreach ($columns as $property => $column)
                        <th scope="col">
                            @if (isset($item->type) && $item->type === 'text')
                                {!!nl2br(e($item->$property))!!}
                            @else
                                {{$item->$property}}
                            @endif
                        </th>
                    @endforeach
                </tr>
            @endforeach
        </tbody>

    </table>
@endif
