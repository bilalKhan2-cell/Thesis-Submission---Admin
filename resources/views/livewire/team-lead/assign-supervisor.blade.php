<div>

    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Supervisors',
        'pageTitle' => 'Assign Superivisor',
    ])

    <div class="card mb-4">
        <h5 class="card-header">Assign Supervisor</h5>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Enter Batch: </label>
                        <input type="number" wire:model="team_batch" class="form-control" />
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Select Department: </label>
                        <select wire:model="team_department" class="form-control">
                            <option value="">-- Select Department --</option>
                            @foreach ($departments as $key => $value)
                                <option value="{{ $value->id }}">DEPT-{{ $value->id }} ({{ $value->name }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-2 mt-4">
                    <button class="btn btn-primary" wire:click="GetTeam">Fetch Data</button>
                </div>
            </div>
            <br>

            @if (session()->has('team-supervisor'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session()->get('team-supervisor') }}
                    <button class="btn-close float-end" data-bs-dismiss="alert">&times;</button>
                </div>
            @endif

            <div class="row">
                <div class="col-sm-12">
                    
                    <table id="tblTeams" class="table table-borderless table-hover table-striped table-responsive w-100">
                        <thead>
                            <tr>
                                <th>Team ID</th>
                                <th>Name</th>
                                <th>Roll No</th>
                                <th>Email</th>
                                <th>CNIC</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($teams)
                                @foreach ($teams as $key => $value)
                                    <tr>
                                        <td>TEAM-{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->rollno }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->cnic }}</td>
                                        <td>
                                            <a href="/team/{{ $value->id }}/assign" wire:navigate
                                                class="btn btn-sm btn-outline-primary rounded-circle border-0"><i
                                                    class="bx bx-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @elseif($error_message)
                                <tr>
                                    <td colspan="6">{{ $error_message }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    Livewire.on('reinitialize-datatable', function () {
        $('#tblTeams').DataTable().destroy();
        setTimeout(function () {
            $('#tblTeams').DataTable(); 
        }, 500);
    });
</script>