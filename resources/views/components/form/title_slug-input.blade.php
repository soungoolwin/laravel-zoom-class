@props(['type','old','original' => null])
<div class="form-group">
    <label for="{{$type}}">{{ucfirst($type)}}</label>
    <input type="text" class="form-control" value="{{ isset($old) ? $old : $original }}" id="{{$type}}" name="{{$type}}" placeholder="Enter {{$type}}">
    @error($type)
        <div class="alert alert-danger"> {{ $message }}</div>
    @enderror
</div> 