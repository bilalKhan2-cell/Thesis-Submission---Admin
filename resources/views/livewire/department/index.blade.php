<div>
    
    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Department',
        'pageTitle' => 'List of Departments.',
    ])

    <div class="card mb-4">
        <h5 class="card-header">Department</h5>
        <div class="card-body">
            @if(session()->has('department-update'))
                <div class="alert alert-primary alert-dismissible" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert">&times;</button>
                    <b>
                        {{session()->get('department-update')}} 
                    </b>
                </div>
            @endif

            @if(session()->has('department-success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert">&times;</button>
                    <b>
                        {{session()->get('department-success')}} 
                    </b>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ route('departments.register') }}" wire:navigate class="btn btn-primary float-end">Register
                        Department</a>
                    <br><br>
                    <table id="tblDepartments" class="table table-striped table-hover table-borderless">
                        <thead>
                            <tr>
                                <th>Department ID</th>
                                <th>Name</th>
                                <th>No. of Supervisors</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $key => $value)
                                <tr>
                                    <td>DEPT-{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->supervisors_count }}</td>
                                        <td>
                                            <a href="/department/{{$value->id}}" wire:navigate class="btn btn-outline-info rounded-circle btn-sm border-0"><i
                                                class="bx bxs-edit"></i></a>
                                                <button wire:click="DeleteDepartment({{$value->id}})" class="btn btn-outline-danger rounded-circle btn-sm border-0"><i
                                                    class="bx bxs-trash"></i></button>
                                        </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <script>
                            $('.table').DataTable(); 
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    Livewire.on('Department-Deleted', function () {
        $('.table').DataTable().destroy();
        setTimeout(function () {
            $('.table').DataTable(); 
        }, 500);
    });
</script>