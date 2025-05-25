<div class="col-md-6">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
</div>

<div class="col-md-6">
    <label class="form-label">Profession</label>
    <input type="text" name="profession" class="form-control" value="{{ old('profession') }}">
</div>

<div class="col-md-6">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
</div>

<div class="col-md-6">
    <label class="form-label">Rating</label>
    <input type="number" name="rating" class="form-control" min="1" max="5" value="{{ old('rating', 5) }}">
</div>

<div class="col-md-12">
    <label class="form-label">Comment</label>
    <textarea name="comment" rows="3" class="form-control">{{ old('comment') }}</textarea>
</div>

<div class="col-md-6">
    <label class="form-label">Status</label>
    <select name="status" class="form-select">
        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
