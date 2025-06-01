<div class="form-group col-md-12">
    <label for="name">Service Category Name</label>
    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
</div>

<div class="form-group col-md-12">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
</div>

<div class="form-group col-md-6">
    <label for="icon">Icon Class</label>
    <input type="text" class="form-control" name="icon" value="{{ old('icon') }}">
    <small class="text-muted">Example: bi bi-activity</small>
</div>