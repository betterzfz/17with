@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">分类列表</div>

                <div class="panel-body">
                    <div class="row bottom-row">
                        <div class="col-md-1">
                            <a class="btn btn-primary" href="/admin/category/create" role="button">新增</a>
                        </div>
                    </div>
                    @include('partials.success')
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>名称</th>
                                    <th>排序</th>
                                    <th>创建人</th>
                                    <th>最后修改人</th>
                                    <th width="20%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->sort }}</td>
                                        <td>{{ $user_list[$category->created_by] }}</td>
                                        <td>{{ $user_list[$category->updated_by] }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="...">
                                                <a type="button" class="btn btn-primary" href="/admin/category/{{ $category->id }}/edit">编辑</a>
                                                <a type="button" class="btn btn-danger delete-btn" data-id="{{ $category->id }}">删除</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/admin/category/change_status_by_ids" method="post">
                {{ csrf_field() }}
                <input type="hidden" id="delete-id" name="ids[]">
                <input type="hidden" name="status" value="0">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="delete-modal-label">删除记录</h4>
                </div>
                <div class="modal-body">
                    确认删除编号为<span id="show-id"></span>的记录吗？
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $('.delete-btn').click(function(){
            var id = $(this).attr('data-id');
            $('#delete-id').val(id);
            $('#show-id').html(id);
            $('#delete-modal').modal('show');
        });
    });
</script>
@endsection
