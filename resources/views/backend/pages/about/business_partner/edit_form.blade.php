<div class="form-group col-md-6">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ $partner->name }}" required>
</div>
<div class="form-group col-md-6">
    <label>Logo</label>
    <input type="file" name="logo" class="form-control">
    @if($partner->logo)
        <img src="{{ image($partner->logo) }}" alt="logo" width="60" class="mt-2">
    @endif
</div>
<div class="form-group col-md-6">
    <label>Status</label>
    <select name="status" class="form-control" required>
        <option value="active" {{ $partner->status == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ $partner->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
