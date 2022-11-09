<form action="{{ route('dashboard.' . $route . '.' . $action, isset($item) ? $item->__get('id') : null) }}"
    method="{{ $method }}" data-form="country">
    @csrf
    @method($method)
    <input type="hidden" name="lang_id" value="{{ \App\Bll\Lang::getAdminLangId() }}">
    <input type="hidden" name="id" value="{{ isset($item) ? $item->__get('id') : '' }}">
    <div class="form-group row">
        <div class="col-sm-2 my-1">
            <label for="title">{{ _i('Title') }}</label>
        </div>
        <div class="col-sm-10 my-1">
            <input type="text" name="title" id="title" class="form-control"
                value="{{ isset($item) ? $item->AdminTranslated->__get('title') : '' }}"
                placeholder="{{ _i('Country Name') }}" required>
        </div>
        <div class="col-sm-2 my-1">
            <label for="code">{{ _i('Code') }}</label>
        </div>
        <div class="col-sm-4 my-1">
            <input type="text" name="code" id="code" class="form-control"
                value="{{ isset($item) ? $item->__get('code') : '' }}" placeholder="{{ _i('Country Code') }}" required>
        </div>
        <div class="col-sm-2 my-1">
            <label for="dialing_code">{{ _i('Dialing Code') }}</label>
        </div>
        <div class="col-sm-4 my-1">
            <input type="text" name="dialing_code" id="dialing_code" class="form-control"
                value="{{ isset($item) ? $item->__get('dialing_code') : '' }}" placeholder="{{ _i('Dialing Code') }}"
                required>
        </div>
        <div class="col-sm-2 my-1">
            <label for="lat">{{ _i('Latitude') }}</label>
        </div>
        <div class="col-sm-4 my-1">
            <input type="text" name="lat" id="lat" class="form-control"
                value="{{ isset($item) ? $item->__get('lat') : '' }}" placeholder="{{ _i('Latitude') }}">
        </div>
        <div class="col-sm-2 my-1">
            <label for="lng">{{ _i('Longitude') }}</label>
        </div>
        <div class="col-sm-4 my-1">
            <input type="text" name="lng" id="lng" class="form-control"
                value="{{ isset($item) ? $item->__get('lng') : '' }}" placeholder="{{ _i('Longitude') }}">
        </div>
    </div>
    <div class="form-group row d-flex justify-content-center">
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary btn-block form-control">{{ _i('Save') }}</button>
        </div>
    </div>
</form>
