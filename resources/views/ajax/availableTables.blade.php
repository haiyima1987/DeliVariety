@foreach($spots->chunk(4) as $spot_chunk)

    <div class="row">

        @foreach($spot_chunk as $spot)
            <div class="spot {{ in_array($spot->id, $reserved_tables) ?
                         '' : 'available' }} col-xs-3">
                @if($spot->availability == 'Y')
                    <img class="img-thumbnail"
                         src="{{ in_array($spot->id, $reserved_tables) ?
                         $spot->reserved_path : $spot->available_path }}"
                         alt="{{ $spot->id }}">
                @endif
            </div>
        @endforeach

    </div>

@endforeach

<script type="text/javascript" src="{{ url('js/tableSelection.js') }}"></script>