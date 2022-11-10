<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>{{ $pageTitle }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard.home') }}"> <i class="icofont icofont-ui-home"></i> </a>
                    </li>
                    @if (isset($baseRoute))
                        <li class="breadcrumb-item">
                            <a href="{{ $baseRoute }}">{{ $baseTitle }}</a>
                        </li>
                    @endif
                    <li class="breadcrumb-item"><a href="#!">{{ $pageTitle }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
