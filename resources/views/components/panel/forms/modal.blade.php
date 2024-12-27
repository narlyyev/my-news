@props(['footer' => null, 'label'])
<div class="modal fade" id="{{ $attributes->get('id') }}" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
	<div {{ $attributes->class(['modal-dialog modal-dialog-centered']) }}>
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="{{ $attributes->get('id') }}-label">@lang($label)</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
			</div>
			<div class="modal-body">
				{{ $slot }}
			</div>
			@if($footer)
				<div class="modal-footer">
					{{ $footer }}
				</div>
			@endif
		</div>
	</div>
</div>
