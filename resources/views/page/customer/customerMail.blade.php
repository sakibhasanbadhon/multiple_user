
<h3> hello ! {{ $customer['first_name'] }} {{ $customer['last_name'] }}.  Here is your verify link </h3>

<a style="color:blue;" href="{{ route('customer.verify',$customer->id) }}">Click Here</a>

<h4>First Name: {{ $customer['first_name'] }}</h4>
<h4>Last Name: {{ $customer['last_name'] }}</h4>
<h4> Your email is: {{ $customer['email'] }}</h4>
