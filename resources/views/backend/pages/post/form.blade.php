<div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $post->title ?? '') }}" required>
</div>

{{-- <div class="form-group">
    <label>Slug</label>
    <input type="text" name="slug" class="form-control" value="{{ old('slug', $post->slug ?? '') }}" required>
</div> --}}

<div class="form-group">
    <label>Content</label>
    <textarea name="content" class="ckeditor form-control" rows="4">{{ old('content', $post->content ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control select2-single" required>
        <option value="">-- Select Category --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ isset($post) && $post->categories->contains($category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Tags</label>
    <select name="tags[]" class="form-control select2-multiple" multiple>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}"
                {{ isset($post) && $post->tags->contains($tag->id) ? 'selected' : '' }}>
                {{ $tag->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control-file">
    @if(!empty($post->image))
        <img src="{{ asset('storage/' . $post->image) }}" width="100" class="mt-2">
    @endif
</div>
