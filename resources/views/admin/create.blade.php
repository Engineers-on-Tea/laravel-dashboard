@extends('admin.layouts.master')

@section('title', $pageTitle)

@section('contents')
    @include('admin.includes.page-header')
    <div class="card">
        <div class="card-header">
            <h5>{{ $pageTitle }}</h5>
        </div>
        <div class="card-block">
            <div class="m-b-20">
                @include($form)
            </div>
        </div>
    </div>
@endsection
