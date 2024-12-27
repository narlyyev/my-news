@props(['label' => null, 'required' => false, 'name'])

<div>
	@if($label)
		<label for="select-{{ $name }}" @class(['form-label', 'required' => $required])>
			@lang($label)
		</label>
	@endif

	<select {{ $attributes->class(['form-select', 'is-invalid' => $errors->has(dot($name))]) }}
					id="select-{{ $name }}" name="{{ $name }}">
		{{ $slot }}
	</select>

	@error(dot($name))
	<div class="invalid-feedback">{{ $message }}</div>
	@enderror
</div>
