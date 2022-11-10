@extends('admin.layouts.master')

@section('title', $pageTitle)

@section('contents')
    @include('admin.includes.page-header')
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Zero config.table start -->
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $pageTitle }}</h5>
                        @if ($allowEdit)
                            <a href="{{ route('dashboard.' . $route . '.create') }}"
                                class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger">
                                <i class="fa fa-plus m-r-5"></i> {{ _I('Create new') }}
                            </a>
                        @endif
                    </div>
                    <div class="card-block">
                        @include('admin.includes.table')
                        <div class="d-flex justify-content-center">
                            {{ $content->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        $(document).ready(function () {
            $(document).on('click', '[data-action=delete]', function (e) {
                e.preventDefault();
                let url = $(this).data('url');
                let method = "DELETE";

                let deleteCallback = function (params) {
                    dashboardAxios(params.url, params.method, params.data, params.onSuccess, params.onError);
                }

                let deleteSuccessCallback = function (response) {
                    swalSuccess(response.data.title, response.data.message, 'success', null, reloadPage);
                }

                let deleteErrorCallback = function (error) {
                    swalError(error.response.data.title, error.response.data.message);
                }

                let buttons = {
                    'confirm': {
                        'showConfirmButton': true,
                        'confirmButtonText': "{{ _i('Yes, delete it!') }}",
                        'confirmButtonColor': '#f27474',
                        'callback': deleteCallback,
                        'params': {
                            'url': url,
                            'method': method,
                            'data': null,
                            'onSuccess': deleteSuccessCallback,
                            'onError': deleteErrorCallback,
                        }
                    },
                    'cancel': {
                        'showCancelButton': true,
                        'cancelButtonText': "{{ _i('Cancel') }}",
                        'cancelButtonColor': '#3085d6',
                        'callback': null
                    }
                };

                let message = "{{ _i('Are you sure you want to delete this item?') }}";
                let title = "{{ _i('Delete') }}";
                let icon = 'question';

                swalOptions(title, message, buttons, icon);
            });
        });
    </script>
@endpush
