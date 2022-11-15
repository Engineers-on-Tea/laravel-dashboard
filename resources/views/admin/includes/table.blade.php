@php use App\Bll\Utility;use App\Modules\Home\Models\User; @endphp
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
                                    <img
                                        src="{{ asset($uploads . $row->__get('id') . DIRECTORY_SEPARATOR . $row->__get($column['name'])) }}"
                                        alt="{{ $row->__get($column['name']) }}" width="100" height="100">
                                </div>
                            @else
                                {{ $row->__get($column['name']) }}
                            @endif
                        @elseif ($column['model'] == 'data')
                            @if ($column['type'] == 'description' || $column['type'] == 'body')
                                {{ Str::limit(Utility::getTranslatedValueAdmin($row, $column['name']), 25) }}
                            @else
                                {{ Utility::getTranslatedValueAdmin($row, $column['name']) }}
                            @endif
                        @elseif ($column['model'] == 'parentData')
                            @php $parent = $row->Parent; @endphp
                            {{ Utility::getTranslatedValueAdmin($parent, 'title') }}
                        @elseif($column['model'] == 'action')
                            @foreach ($column['data'] as $k => $button)
                                @if(!($k == 'delete' && $row->id == 1 && $row instanceof User))
                                    @include($button, ['id' => $row->__get('id'), 'route' => $route])
                                @endif
                            @endforeach
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
