<div>

    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Departments',
        'pageTitle' => 'Update Department Record(s).',
    ])

    <div class="card mb-4">
        <h5 class="card-header">Departments</h5>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form wire:submit="UpdateDepartment">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Enter Name</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-user"></i></span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                aria-describedby="basic-icon-default-fullname2" wire:model="name" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Comments (if any):</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-comment"></i></span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                  aria-describedby="basic-icon-default-fullname2" wire:model="description" />
                        </div>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <a href="{{route('departments.index')}}" wire:navigate class="btn btn-danger">Cancel</a>
                    </div>
                  </div>

            </form>
        </div>
    </div>
</div>

</div>