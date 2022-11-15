<form action="{{ route('dashboard.' . $route . '.' . $action, isset($item) ? $item->__get('id') : null) }}"
      method="{{ $method }}" data-form="{{ $action }}">
    @csrf
    @method($method)
    @foreach ($columns as $input)
        @if ($input['showInForm'])
            @php
                $required = $input['required'] ? 'required' : '';
                $disabled = $input['editable'] == false ? 'disabled' : '';

                $value = '';
                if (isset($item)) {
                    if ($input['model'] == 'base') {
                        $value = $item->__get($input['name']);
                    } elseif ($input['model'] == 'data') {
                        $value = \App\Bll\Utility::getTranslatedValueAdmin($item, $input['name']);
                    } elseif ($input['model'] == 'parentData') {
                        $parent = $item->Parent;
                        $value = $item->__get($input['name']);
                    }
                }

                $data = [
                    'input' => $input,
                    'value' => $value,
                    'required' => $required,
                    'disabled' => $disabled,
                ];
            @endphp
            <div class="form-group row">
                @if ($input['type'] != 'hidden')
                    <div class="col-sm-2 my-1">
                        <label for="{{ $input['name'] }}">
                            {{ $input['label'] }}
                            @if ($required)
                                @include('admin.components.form.required')
                            @endif
                        </label>
                    </div>
                @endif
                <div class="col-sm-10 my-1">
                    @switch($input['type'])
                        @case('select')
                            @include('admin.components.form.select', $data)
                            @break

                        @case('textarea')
                            @include('admin.components.form.textarea', $data)
                            @break

                        @case('image')
                        @case('file')
                            @include('admin.components.form.file', $data)
                            @break

                        @case('checkbox')
                            @include('admin.components.form.checkbox', $data)
                            @break

                        @case('radio')
                            @include('admin.components.form.radio', $data)
                            @break

                        @case('hidden')
                            @include('admin.components.form.hidden', $data)
                            @break

                        @case('number')
                        @case('email')

                        @case('text')
                        @case('number')

                        @case('password')
                            @include('admin.components.form.input', $data)
                            @break

                        @default
                            @include('admin.components.form.input', $data)
                    @endswitch
                </div>
            </div>
        @endif
    @endforeach
    <div class="form-group row d-flex justify-content-center">
        <div class="col-sm-4 my-1">
            <button type="submit" class="btn btn-primary form-control">{{ _i('Save') }}</button>
        </div>
    </div>
</form>
