<div class="form-group col-md-12">
    <label for="name">Service Category Name</label>
    <input type="text" class="form-control" name="name" value="{{ $serviceCategory->name }}" required>
</div>

<div class="form-group col-md-12">
    <label for="slug">Slug</label>
    <input type="text" class="form-control" name="slug" value="{{ $serviceCategory->slug }}">
</div>

<div class="form-group col-md-12">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" rows="3">{{ $serviceCategory->description }}</textarea>
</div>

<div class="form-group col-md-12">
    <label for="content">Content</label>
    <textarea class="ckeditor form-control" name="content" rows="5">{{ $serviceCategory->content }}</textarea>
</div>

<div class="form-group col-md-6">
    <label for="icon">Icon Class</label>
    <input type="text" class="form-control" name="icon" value="{{ $serviceCategory->icon }}">
    <small class="text-muted">Example: bi bi-activity</small>
</div>

<div class="form-group col-md-6">
    <label for="image">Image</label>
    <input type="file" class="form-control" name="image">
    @if ($serviceCategory->image)
        <img src="{{ asset('storage/' . $serviceCategory->image) }}" alt="Image" width="100" class="mt-2">
    @endif
</div>

<div class="form-group col-md-12">
    <label for="status">Status</label>
    <select name="status" class="form-control" required>
        <option value="1" {{ $serviceCategory->status == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ $serviceCategory->status == 0 ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
