@props(['label' => null, 'required' => false, 'name'])

<div>
    @if($label)
        <label for="input-{{ $name }}" @class(['form-label', 'required' => $required])>
            @lang($label)
        </label>
    @endif

    <textarea
            {{ $attributes->merge(['rows' => 5])->class(['form-control', 'is-invalid' => $errors->has(dot($name))]) }}
            id="input-{{ $name }}" name="{{ $name }}">{!! old(dot($name), $attributes->get('value', '')) !!}</textarea>

    @error(dot($name))
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
