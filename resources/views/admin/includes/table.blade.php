<div class="dt-responsive table-responsive">
    <table id="simpletable" class="table table-striped table-bordered nowrap">
        <thead>
            <tr>
                @foreach ($columns as $key => $column)
                    <th>{{ $column['label'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($content as $row)
                <tr>
                    @foreach ($columns as $key => $column)
                        @if ($column['model'] == 'base')
                            <td>{{ $row->__get($key) }}</td>
                        @elseif ($column['model'] == 'data')
                            <td>{{ $row->AdminTranslated->__get($key) }}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
