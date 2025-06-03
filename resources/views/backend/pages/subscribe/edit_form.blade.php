<div class="form-group col-md-12">
    <label>Email</label>
    <input type="email" name="email" value="{{ $emailItem->email }}" class="form-control" required>
</div>

<div class="form-group col-md-12">
    <label>Status</label>
    <select name="status" class="form-control" required>
        <option value="1" {{ $emailItem->status == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ $emailItem->status == 0 ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
