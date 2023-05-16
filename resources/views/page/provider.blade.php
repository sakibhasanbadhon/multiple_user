@extends('layouts.app')
@section('title', "Dashboard")
@push('styles')

@endpush

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="">Provider List  </h4>
                    </div>
                    <div class="card-body">
                        <div class="alert-message"></div>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Permission</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($provider as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        @php
                                            $checked = $item->status == 1 ? 'checked':'' ;
                                        @endphp
                                        <td>
                                            <div class = "toggle-switch">
                                                <label class="switch-label" for="status'{{ $item->id }}">
                                                <input type = "checkbox" name="status" class="input-status" data-id="{{ $item->id }}" id="status'{{ $item->id }}"{{ $checked }}>
                                                    <span class = "pr-2 text-right switch_slider"> <span style="padding-right:15px">OFF</span> </span>
                                                    <span class = "switch_slider">ON</span>
                                                </label>
                                            </div>
                                        </td>

                                        <td> {{ $item->created_at }}</td>
                                    </tr>
                                @empty

                                @endforelse

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

@push('scripts')
    <script>




            // var _token = {{ csrf_token() }};
            var _token = "{{ csrf_token() }}";


        // status
        $(document).on('click','input.input-status',function(){
            var row_id = $(this).data('id');
            if (this.checked) {
                var checked = 1;
            } else {
                var checked = 0;
            }

        $.ajax({
                type:"POST",
                url:"{{ route('app.provider.status') }}",
                data:{_token:_token,row_id:row_id,status_id:checked},
                dataType:'json',
                success:function(response){
                if (response.status =='success') {
                    $('.alert-message').append('<div class="alert alert-success py-2">'+response.message+'</div>')

                    }

                }
            });
        });

    </script>


@endpush
