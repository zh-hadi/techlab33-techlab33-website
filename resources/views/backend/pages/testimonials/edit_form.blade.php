<div class="col-md-6">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
</div>

<div class="col-md-6">
    <label class="form-label">Profession</label>
    <input type="text" name="profession" class="form-control" value="{{ old('profession', $testimonial->profession) }}">
</div>

<div class="col-md-6">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
    @if($testimonial->image)
        <small class="d-block mt-1">Current: <img src="{{ image($testimonial->image) }}" width="60"></small>
    @endif
</div>

<div class="col-md-6">
    <label class="form-label">Rating</label>
    <input type="number" name="rating" class="form-control" min="1" max="5" value="{{ old('rating', $testimonial->rating) }}">
</div>

<div class="col-md-12">
    <label class="form-label">Comment</label>
    <textarea name="comment" rows="3" class="form-control">{{ old('comment', $testimonial->comment) }}</textarea>
</div>

<div class="col-md-6">
    <label class="form-label">Status</label>
    <select name="status" class="form-select">
        <option value="active" {{ old('status', $testimonial->status) == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status', $testimonial->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
