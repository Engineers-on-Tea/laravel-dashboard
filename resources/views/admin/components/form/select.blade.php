<select name="{{ $input['name'] }}" id="{{ $input['name'] }}" class="form-control select2" {{ $required }}
    {{ $disabled }} data-live-search="true">
    <option value="" selected disabled>{{ $input['placeholder'] }}</option>
    @foreach ($input['data'] as $option)
        <option value="{{ $option['id'] }}" {{ $value == $option['id'] ? 'selected' : '' }}>
            {{ $option['title'] }}
        </option>
    @endforeach
</select>
