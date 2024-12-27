@props(['label' => null, 'required' => false, 'name'])

<div>
	@if($label)
		<label for="input-{{ $name }}" @class(['form-label', 'required' => $required])>
			@lang($label)
		</label>
	@endif

	<input
		{{ $attributes->merge(['type' => 'text'])->class(['form-control', 'is-invalid' => $errors->has(dot($name))])  }}
		id="input-{{ $name }}"
		name="{{ $name }}"
		value="{{ old(dot($name), $attributes->get('value')) }}"
	>

	@error(dot($name))
	<div class="invalid-feedback d-block">{{ $message }}</div>
	@enderror
</div>
