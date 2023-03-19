<div class="form-group">
    <label for="category">Category</label>
    <select name="category_id" class="form-select" aria-label="Default select example">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" id="category_id">{{ $category->name }}</option>
        @endforeach
    </select>
</div>