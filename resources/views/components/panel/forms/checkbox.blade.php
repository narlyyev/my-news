@props(['label' => null, 'required' => false, 'checked' => false, 'name'])

<div class="form-check">
	<input {{
    	$attributes
			 ->merge(['value' => $attributes->get('value', 1)])
			 ->class(['form-check-input', 'is-invalid' => $errors->has(dot($name))])
		}}
				 @checked(old(dot($name), $checked))
				 type="checkbox"
				 name="{{ $name }}"
				 id="input-{{ $name }}"
	>
	@if($label)
		<label class="form-check-label" for="{{ $attributes->get('id', "input-$name") }}">
			@lang($label)
		</label>
	@endif
</div>
