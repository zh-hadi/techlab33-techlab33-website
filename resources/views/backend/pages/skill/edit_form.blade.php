<div class="col-md-12 mb-3">
    <label>Name</label>
    <input type="text" name="name" value="{{ $skill->name }}" class="form-control" required>
</div>
<div class="col-md-12 mb-3">
    <label>Percentage</label>
    <input type="number" name="percentage" value="{{ $skill->percentage }}" class="form-control" required>
</div>
<div class="col-md-12 mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="active" {{ $skill->status === 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ $skill->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
