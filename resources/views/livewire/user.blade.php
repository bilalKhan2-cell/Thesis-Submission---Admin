<div>
    
    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Users',
        'pageTitle' => 'List of Users.',
    ])

    <div class="card mb-4">
        <h5 class="card-header">Users</h5>
        <div class="card-body">
            @if(session()->has('user-update'))
                <div class="alert alert-primary alert-dismissible" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert">&times;</button>
                    <b>
                        {{session()->get('user-update')}} 
                    </b>
                </div>
            @endif

            @if(session()->has('user-success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert">&times;</button>
                    <b>
                        {{session()->get('user-success')}} 
                    </b>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ route('users.register') }}" wire:navigate class="btn btn-primary float-end">Register
                        User</a>
                    <br><br>
                    <table class="table table-hover table-striped table-borderless">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact No.</th>
                                <th>CNIC No.</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $value)
                                <tr>
                                    <td>USER-{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{$value->contactinfo}}</td>
                                    <td>{{$value->cnic}}</td>
                                    @if($value->id!=1)
                                        <td>
                                            <a href="/user/{{$value->id}}" wire:navigate class="btn btn-outline-info rounded-circle btn-sm border-0"><i
                                                class="bx bxs-edit"></i></a>
                                                <button wire:click="Delete({{$value->id}})" class="btn btn-outline-danger rounded-circle btn-sm border-0"><i
                                                    class="bx bxs-trash"></i></button>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.table').DataTable();
</script>

<script>
    Livewire.on('user-deleted', function () {
        $('.table').DataTable().destroy();
        setTimeout(function () {
            $('.table').DataTable(); 
        }, 500);
    });
</script>