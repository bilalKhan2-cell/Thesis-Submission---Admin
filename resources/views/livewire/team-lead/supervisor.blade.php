<div>

    @livewire('breadcrumbs',[
        'heading'=>'Dashboard',
        'subHeading'=>'Teams',
        'pageTitle'=>'Assign Supervisor To Team'
    ])

    <div class="card mb-4">
        <h5 class="card-header">Assign Supervisor</h5>
        <div class="card-body">
            <form wire:submit="AssignSupervisorToTeam">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <select wire:model="assigned_supervisor" class="form-control">
                            <option value="">-- Select Supervisor --</option>
                            @foreach($supervisors as $key=>$value)
                                <option value="{{$value->id}}">SPR-{{$value->id}} ({{$value->name}}) </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <button class="btn btn-primary">Submit</button>
                    <a href="/assign_supervisor" wire:navigate class="btn btn-danger">Cancel</a>
                </div>

            </div>
            <br>
            @if($team_supervisor)
                <table class="table table-hover table-responsive w-100">
                    <thead>
                        <tr>
                            <th>Supervisor ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SPR-{{$team_supervisor->supervisor->id}}</td>
                            <td>{{$team_supervisor->supervisor->name}}</td>
                            <td>{{$team_supervisor->supervisor->email}}</td>
                            <td>{{$team_supervisor->supervisor->dept->name}}</td>
                        </tr>
                    </tbody>
                </table>
            @endif
        </form>
        </div>
    </div>
</div>