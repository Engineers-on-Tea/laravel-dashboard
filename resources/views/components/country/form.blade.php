<form action="{{ route('dashboard.' . $route . '.store') }}">
    <div class="row">
        <div class="form-group">
            <label for="title">{{ _i('Title') }}</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
    </div>
</form>
