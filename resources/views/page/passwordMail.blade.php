
<h3> Reset Your Password </h3>

<p>Your Mail is: {{ $forget['email'] }} </p>
<p>Your Mail is: {{ $forget['id'] }} </p>


<a style="background: skyblue;padding:5px" href="{{ route('reset-password.form',$forget['id']) }}">Reset Password</a>
