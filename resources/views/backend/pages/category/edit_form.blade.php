<div class="form-group col-md-6">
    <label for="name">Category Name</label>
    <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
</div>
<div class="form-group col-md-6">
    <label for="slug">Slug</label>
    <input type="text" class="form-control" name="slug" value="{{ $category->slug }}">
    <small>If you do not write slug then it's auto generate</small>
</div>
