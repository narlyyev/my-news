@props(['label' => null, 'required' => false, 'name'])

<div>
  @if($label)
    <label for="input-{{ $name }}" @class(['form-label', 'required' => $required])>
      @lang($label)
    </label>
  @endif
  <div class="form-phone">
    <div class="d-flex align-items-center">+993</div>
    <input type="tel" {{ $attributes->merge(['type' => 'text'])->class(['form-control', 'is-invalid' => $errors->has(dot($name))])  }}
    name="{{ $name }}"
           id="input-{{ $name }}"
           placeholder="(__) __-__-__"
           value="{{ old(dot($name), $attributes->get('value')) }}"
    >
  </div>
  @error(dot($name))
  <div class="invalid-feedback d-block">{{ $message }}</div>
  @enderror
</div>
