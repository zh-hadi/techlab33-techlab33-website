<div class="form-group col-md-6">
    <label for="name">Tag Name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ $tag->name }}" required>
</div>
<div class="form-group col-md-6">
    <label for="slug">Slug</label>
    <input type="text" class="form-control" name="slug" id="slug" value="{{ $tag->slug }}">
    <small>If you do not write slug then it's auto generate</small>
</div>
