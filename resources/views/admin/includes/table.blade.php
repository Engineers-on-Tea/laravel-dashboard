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
                        <td>
                            @if ($column['model'] == 'base')
                                @if ($column['type'] == 'image')
                                    <div class="d-flex justify-content-center">
                                        <img src="{{ asset($uploads . $row->__get('id') . DIRECTORY_SEPARATOR . $row->__get($key)) }}"
                                            alt="{{ $row->__get($key) }}" width="100" height="100">
                                    </div>
                                @else
                                    {{ $row->__get($key) }}
                                @endif
                            @elseif ($column['model'] == 'data')
                                @if ($column['type'] == 'description' || $column['type'] == 'body')
                                    {{ Str::limit(\App\Bll\Utility::getTranslatedValueAdmin($row, $key), 25) }}
                                @else
                                    {{ \App\Bll\Utility::getTranslatedValueAdmin($row, $key) }}
                                @endif
                            @elseif ($column['model'] == 'parentData')
                                @php $parent = $row->Parent; @endphp
                                {{ \App\Bll\Utility::getTranslatedValueAdmin($parent, 'title') }}
                            @elseif($column['model'] == 'action')
                                @foreach ($column['data'] as $button)
                                    @include($button, ['id' => $row->__get('id'), 'route' => $route])
                                @endforeach
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
