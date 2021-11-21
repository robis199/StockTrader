<?php
@foreach($stocks as $key => $value)
    <tr>
        <td>{{ $stock->id }}</td>
        <td>{{ $stock->name }}</td>

        <td>

        {{ Form::open(['url' => 'stocks/' . $value->id, 'class' => 'pull-right']) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Sell this stock', ['class' => 'btn btn-warning']) }}
        {{ Form::close() }}

            <a class="btn btn-small btn-success" href="{{ URL::to('stocks/' . $value->id) }}">Show this stock</a>

            <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
            <a class="btn btn-small btn-info" href="{{ URL::to('stocks/' . $value->id . '/edit') }}">Sell</a>

        </td>
    </tr>
@endforeach
