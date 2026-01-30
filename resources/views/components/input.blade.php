@props(
["type","name","value"=>'']
);


<input class="form-control"
    type="{{ $type }}"
    name="{{ $name }}"
    placeholder="{{ $name }}"
    value="{{ old($name, $value) }}"
    {{$attributes}}>

@error($name)
<div class="text-danger">
    {{ $message }}
</div>
@enderror