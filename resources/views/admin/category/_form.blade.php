{{ csrf_field() }}
<div class="form-group">
    <label for="name" class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="{{ $name }}" placeholder="请输入分类名称" required>
    </div>
</div>
<div class="form-group">
    <label for="sort" class="col-sm-2 control-label">排序</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" id="sort" name="sort" value="{{ $sort }}" min="0" max="255" placeholder="请输入分类排序" required>
        <span class="help-block">0-255之间，数字越小排序越靠前</span>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">保存</button>
    </div>
</div>