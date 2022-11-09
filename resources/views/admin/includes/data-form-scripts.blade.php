@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '[data-form]', function(e) {
                e.preventDefault();
                let url = $(this).attr('action');
                let method = $(this).attr('method');
                let data = $(this).serialize();
                dashboardAxios(url, method, data, onSave, onSaveError);
            });
        });

        let goBack = function() {
            window.location.href = "{{ $baseRoute }}";
        }

        function onSave() {
            swalSuccess("{{ _i('Success') }}", "{{ _i('Data saved successfully') }}", 'success', null, goBack);
        }

        function onSaveError() {
            swalError("{{ _i('Error') }}", "{{ _i('An error occurred while saving data') }}");
        }
    </script>
@endpush
