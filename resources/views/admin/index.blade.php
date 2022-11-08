@extends('admin.layouts.master')

@section('title', $pageTitle)

@section('contents')
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Zero config.table start -->
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $pageTitle }}</h5>
                        @if ($allowEdit)
                            <a href="{{ route('dashboard.' . $route . '.create') }}" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger">
                                <i class="fa fa-plus m-r-5"></i> {{ _I('Create new') }}
                            </a>
                        @endif
                    </div>
                    <div class="card-block">
                        @include('admin.includes.table')
                        {{ $content->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
