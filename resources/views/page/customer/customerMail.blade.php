
<h3> hello ! {{ $customer['first_name'] }} {{ $customer['last_name'] }}.  Here is your verify link </h3>

<a style="color:blue;" href="{{ route('customer.verify',$customer->id) }}">Click Here</a>

<h4>Name: {{ $customer['first_name'] }}</h4>
<h4>Name: {{ $customer['last_name'] }}</h4>
<h4>email: {{ $customer['email'] }}</h4>
