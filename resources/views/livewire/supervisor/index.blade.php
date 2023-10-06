<div>
    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Supervisor',
        'pageTitle' => 'List of Supervisors.',
    ])

    <div class="card mb-4">
        <h5 class="card-header">Supervisors</h5>
        <div class="card-body">
            @if(session()->has('supervisor-update'))
            <div class="alert alert-primary alert-dismissible" role="alert">
                <button class="btn-close" data-bs-dismiss="alert">&times;</button>
                <b>
                    {{session()->get('supervisor-update')}} 
                </b>
            </div>
        @endif

        @if(session()->has('supervisor-success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button class="btn-close" data-bs-dismiss="alert">&times;</button>
                <b>
                    {{session()->get('supervisor-success')}} 
                </b>
            </div>
        @endif

        <div class="row">
            <div class="col-sm-12">
                <a href="{{route('supervisors.register')}}" wire:navigate class="btn btn-primary float-end">Register Supervisor</a>
                <br><br>
                <small>
                    <table id="tblSupervisors" class="table table-borderless table-hover table-striped table-responsive w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>CNIC No.</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach ($supervisors as $key=>$value)
                            <tr>
                                <td>SPR-{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->cnic}}</td>
                                <td>{{$value->dept->name}}</td>
                                <td class="text-left">
                                    <a href="/supervisor/{{$value->id}}" wire:navigate class="btn btn-outline-info btn-sm border-0 rounded-circle"><i class="bx bx-edit"></i></a>
                                    <button wire:click="Delete({{$value->id}})" class="btn btn-outline-danger btn-sm border-0 rounded-circle"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </small>
            </div>
        </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#tblSupervisors').DataTable();
    })
</script>

<script>
    Livewire.on('supervisor-deleted', function () {
        $('.table').DataTable().destroy();
        setTimeout(function () {
            $('.table').DataTable(); 
        }, 500);
    });
</script>