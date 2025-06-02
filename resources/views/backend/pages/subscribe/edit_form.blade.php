<div class="form-group col-md-12">
    <label>Email</label>
    <input type="email" name="email" value="{{ $emailItem->email }}" class="form-control" required>
</div>

<div class="form-group col-md-12">
    <label>Status</label>
    <select name="status" class="form-control" required>
        <option value="active" {{ $emailItem->status === 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ $emailItem->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
