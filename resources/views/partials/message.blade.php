@if (session()->has('message'))
	<div class="alert alert-success" style="text-align: center;">
		{{session()->get('message')}}
	</div>
@endif