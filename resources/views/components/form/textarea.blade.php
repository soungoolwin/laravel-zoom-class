@props(['old','original'=>null])
<div class="form-group">
    <label for="body">Body</label>
    <textarea type="textarea" rows="5" class="form-control" name="body" id="body"
        placeholder="Body">{{ isset($old) ? $old : $original }}</textarea>
    @error('body')
        <div class="alert alert-danger"> {{ $message }}</div>
    @enderror
</div>
