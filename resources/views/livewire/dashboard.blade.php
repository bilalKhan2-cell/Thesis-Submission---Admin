<div>

    @livewire('breadcrumbs', [
        'heading' => 'Home',
        'subHeading' => 'Admin',
        'pageTitle' => 'Dashboard',
    ])

    <div class="card mb-4 img-icon">
        <h5 class="card-header">Welcome, Admin</h5>
        <div class="card-body">
            <div class="row">

                <div class="col-sm-12">
                    <span class="float-end">Date: {{ date('d-M-y') }}</span>
                </div>

                <div class="col-sm-4">
                    <div class="card bg-success text-white mb-4">
                        <h5 class="card-header text-white">Users</h5>
                        <div class="card-body"><i class="bx bx-user-check"></i> Total Users: {{ $users }}</div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card bg-info text-white mb-4">
                        <h5 class="card-header text-white">Departments</h5>
                        <div class="card-body"><i class="bx bx-building"></i> Total Departments: {{ $department }}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card bg-warning text-white mb-4">
                        <h5 class="card-header text-white">Supervisors</h5>
                        <div class="card-body"><i class="bx bx-user-circle"></i> Total Users: {{ $supervisor }}</div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card bg-primary text-white mb-4">
                        <h5 class="card-header text-white">Teams</h5>
                        <div class="card-body"><i class="bx bx-user-circle"></i> Total FYP Teams of Current Year:
                            {{ $team_lead }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
