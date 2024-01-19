@props(['name','type'])
 
<input type="{{$type}}" name="{{ $name }}" {{ $attributes }}>
 
<div>
    @error($name) <span class="error">{{ $message }}</span> @enderror
</div>