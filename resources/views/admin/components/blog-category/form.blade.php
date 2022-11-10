<form action="{{ route('dashboard.' . $route . '.' . $action, isset($item) ? $item->__get('id') : null) }}"
    method="{{ $method }}" data-form="blog-category">
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
                placeholder="{{ _i('Blog Category Name') }}" required>
        </div>
        <div class="col-sm-2 my-1">
            <label for="image">{{ _i('Image') }}</label>
        </div>
        <div class="col-sm-4 my-1">
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="col-sm-2 my-1">
            <label for="slug">{{ _i('Slug') }}</label>
        </div>
        <div class="col-sm-4 my-1">
            <input type="text" name="slug" id="slug" class="form-control"
                value="{{ isset($item) ? $item->__get('slug') : '' }}" placeholder="{{ _i('Slug') }}">
        </div>
        <div class="col-sm-2 my-1">
            <label for="description">{{ _i('Description') }}</label>
        </div>
        <div class="col-sm-10 my-1">
            <textarea name="description" id="description" class="form-control" placeholder="{{ _i('Description') }}">{{ isset($item) ? $item->AdminTranslated->__get('description') : '' }}</textarea>
        </div>
    </div>
    <div class="form-group row d-flex justify-content-center">
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary btn-block form-control">{{ _i('Save') }}</button>
        </div>
    </div>
</form>
