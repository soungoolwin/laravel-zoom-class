<div class="form-group">
    <div class="mb-3">
        <label for="formFile" class="form-label">Blog Photo</label>
        <input class="form-control" value="{{ old('photo') }}" name="photo" type="file" id="formFile">
        @error('photo')
            <div class="alert alert-danger"> {{ $message }}</div>
        @enderror
    </div>
</div>
