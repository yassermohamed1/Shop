@props(
["name","value"=>'']
);

<textarea name="{{ $name }}" {{ $attributes }}>{{ old($name, $value) }}</textarea>



@error($name)
<div class="text-danger">
    {{ $message }}
</div>
@enderror