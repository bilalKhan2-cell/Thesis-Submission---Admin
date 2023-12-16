<div>

    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Team Leaders',
        'pageTitle' => 'List of Teams With Team Leader Name',
    ])

    <div class="card mb-4">
        <h5 class="card-header">Teams</h5>
        <div class="card-body">

            @if (session()->has('team-success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session()->get('team-success') }}
                    <button class="btn-close float-end" data-bs-dismiss="alert">&times;</button>
                </div>
            @endif

            @if (session()->has('team-update'))
                <div class="alert alert-primary alert-dismissible" role="alert">
                    {{ session()->get('team-update') }}
                    <button class="btn-close float-end" data-bs-dismiss="alert">&times;</button>
                </div>
            @endif

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Enter Batch: </label>
                        <input type="number" wire:model="team_batch" class="form-control">
                    </div>
                </div>

                <div class="col-sm-4">
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
                    <button class="btn btn-info" wire:click="GetList">Get Data</button>
                </div>
                <div class="col-sm-12">
                    <a href="/team/register" wire:navigate class="btn btn-primary float-end">Register Team</a>
                    <br><br>
                    <table id="tblTeams"
                        class="table table-hover table-borderless table-sm table-striped table-reponsive-sm w-100">
                        <thead>
                            <tr>
                                <th>Team ID</th>
                                <th>Lead Name</th>
                                <th>Email</th>
                                <th>Roll No.</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($teams)
                                @foreach ($teams as $key => $value)
                                    <tr>
                                        <td>TEAM-{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->rollno }}</td>
                                        <td>{{ $value->departments->name }}</td>
                                        <td>
                                            <a href="/team/{{ $value->id }}" wire:navigate
                                                class="btn border-0 btn-outline-info rounded-circle"><i
                                                    class="bx bx-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    Livewire.on('initiate-datatable', function() {
        $('#tblTeams').DataTable().destroy();
        setTimeout(function() {
            $('#tblTeams').DataTable();
        }, 500);
    });
</script>
