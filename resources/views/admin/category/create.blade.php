@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">新增分类</div>

                <div class="panel-body">
                    @include('partials.errors')
                    <form class="form-horizontal" action="/admin/category" method="post">
                        @include('admin.category._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
