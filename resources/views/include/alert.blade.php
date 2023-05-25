@if (session()->get('success'))
	<div class="alert alert-success py-2"> <strong>Success: </strong> {{ session()->get('success') }} </div>
@endif

@if(session()->get('warning'))
	<div class="alert alert-warning py-2"> <strong> Warning: </strong> {{ session()->get('warning') }}</div>
@endif

@if(session()->get('error'))
	<div class="alert alert-danger py-2"> <strong> Error: </strong> {{ session()->get('error') }}</div>
@endif
