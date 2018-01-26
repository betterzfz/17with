@extends('layouts.admin')

@section('content')
<link href="{{ asset('plugins/bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="category-id" class="col-sm-2 control-label">分类</label>
                            <div class="col-sm-10">
                                <select name="category_id" id="category-id" class="form-control" required>
                                    <option value="0">请选择</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">标题</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" placeholder="请输入图片标题" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file" class="col-sm-2 control-label">图片</label>
                            <div class="col-sm-10">
                                <input type="file" id="file">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('plugins/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-fileinput/js/locales/LANG.js') }}"></script>
@endsection
