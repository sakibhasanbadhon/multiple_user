<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Register</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset('/') }}assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('/') }}assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="{{ asset('/') }}assets/css/pages/auth-light.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-silver-300">
    <div class="content">
        {{-- <div class="brand">
            <a class="link" href="index.html">AdminCAST</a>
        </div> --}}
         <x-alert/> {{--alert message --}}

        <form id="register-form" action="{{ route('signup.store') }}"  method="post">
            @csrf
            <div class="card-header py-2 bg-info text-center">
                <h4>You signup as -</h4>

                <label>
                    <input type="radio" style="display:none" class="admin" name="role_id" value="1"/>
                    <span class="btn btn-success">Admin</span>
                </label>
                <label>
                    <input type="radio" style="display:none" class="provider" name="role_id" value="2"/>
                    <span class="btn btn-warning">Provider</span>
                </label>
                <label>
                    <input type="radio" style="display:none" class="customer" name="role_id" value="3"/>
                    <span class="btn btn-success">Customer</span>
                </label>

            </div>
            {{-- <h2 class="login-title">Sign Up</h2> --}}
            <div class="row mt-3">
                <div class="col-6">
                    <div class="form-group">
                        <input class="form-control @error('first_name') is-invalid @enderror" id="first_name" type="text" name="first_name" placeholder="First Name">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input class="form-control @error('last_name') is-invalid @enderror" id="last_name" type="text" name="last_name" placeholder="Last Name">

                    </div>
                </div>
            </div>

            <div class="form-group">
                <input class="form-control @error('username') is-invalid @enderror" id="username" type="text" name="username" placeholder="username" autocomplete="off">
                @error('username')
                    <span class="text-danger"> {{ $username }}</span>
                @enderror
            </div>

            <div class="form-group">
                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="Email" autocomplete="off">

            </div>

            <div class="form-group">
                <input class="form-control @error('bio') is-invalid @enderror" id="bio" type="text" name="bio" placeholder="Add bio" autocomplete="off">
            </div>

            <div class="form-group">
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Add Description" rows="3"></textarea>
            </div>

            <div class="form-group">
                <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
            </div>
            <div class="form-group text-left">
                <label class="ui-checkbox ui-checkbox-info">
                    <input type="checkbox" name="agree">
                    <span class="input-span"></span>I agree the terms and policy</label>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Sign up</button>
            </div>
            <div class="social-auth-hr">
                <span>Or Sign up with</span>
            </div>
            <div class="text-center social-auth m-b-20">
                <a class="btn btn-social-icon btn-twitter m-r-5" href="javascript:;"><i class="fa fa-twitter"></i></a>
                <a class="btn btn-social-icon btn-facebook m-r-5" href="javascript:;"><i class="fa fa-facebook"></i></a>
                <a class="btn btn-social-icon btn-google m-r-5" href="javascript:;"><i class="fa fa-google-plus"></i></a>
                <a class="btn btn-social-icon btn-linkedin m-r-5" href="javascript:;"><i class="fa fa-linkedin"></i></a>
                <a class="btn btn-social-icon btn-vk" href="javascript:;"><i class="fa fa-vk"></i></a>
            </div>
            <div class="text-center">Already a member?
                <a class="color-blue" href="{{ route('login') }}">Login here</a>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="{{ asset('/') }}assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{ asset('/') }}assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('/') }}assets/js/app.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script>

        function alertMessage(status,message){

            toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }

            switch(status) {
                case 'success':
                    toastr.success(message)
                    break;
                case 'error':
                    toastr.error(message)
                    break;
                case 'warning':
                    toastr.warning(message)
                    break;
                case 'info':
                    toastr.info(message)
                    break;
                default:
                    // code block
    }


        }

        @if (session()->get('success'))
            alertMessage('success',{{ session()->get('success') }});
        @elseif (session()->get('error'))
            alertMessage('error',{{ session()->get('error') }});
        @elseif (session()->get('info'))
            alertMessage('info',{{ session()->get('info') }});
        @elseif (session()->get('warning'))
            alertMessage('warning',{{ session()->get('warning') }});
        @endif








    </script>


    <script>

        let admin = document.querySelector('.admin');
        let provider = document.querySelector('.provider');
        let customer = document.querySelector('.customer');

        let bio = document.querySelector('#bio');
        let description = document.querySelector('#description');
        let last_name = document.querySelector('#last_name');

        bio.style.display='none';
        description.style.display='none';

        admin.addEventListener('click',function(){
                bio.style.display='none';
                last_name.style.display='block';
                description.style.display='none';
        });

        provider.addEventListener('click',function(){
                bio.style.display='block';
                last_name.style.display='block';
                description.style.display='block';

        });

        customer.addEventListener('click',function(){
                bio.style.display='none';
                last_name.style.display='block';
                description.style.display='none';
        });







    </script>



    {{-- <script type="text/javascript">
        $(function() {
            $('#register-form').validate({
                errorClass: "help-block",
                rules: {
                    first_name: {
                        required: true,
                        minlength: 2
                    },
                    last_name: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    bio: {
                        required: true,
                        minlength: 2
                    },
                    description: {
                        required: true,
                        minlength: 2
                    },
                    username: {
                        required: true,
                        minlength: 2
                    },
                    password: {
                        required: true,
                        confirmed: true
                    },
                    password_confirmation: {
                        equalTo: password
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>  --}}


</body>

</html>
