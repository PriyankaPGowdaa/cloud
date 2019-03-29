@if (session()->has('error'))
	<div class="alert alert-danger" style="text-align: center;">
		{{session()->get('error')}}
	</div>
@endif