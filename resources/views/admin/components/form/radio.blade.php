<div class="form-check">
    @foreach ($input['data'] as $option)
        <span>{{ $option['title'] }}</span>
        <input type="radio" name="{{ $input['name'] }}" id="{{ $input['name'] }}" class="form-check"
            value="{{ $option['key'] }}" {{ $value == $option['key'] ? 'checked' : '' }} {{ $required }}
            {{ $disabled }}>
    @endforeach
</div>
