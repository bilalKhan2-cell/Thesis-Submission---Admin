<div>

    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Users',
        'pageTitle' => 'User Registration.',
    ])

    <div class="card mb-4">
        <h5 class="card-header">Users</h5>
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
            <form wire:submit="RegisterUser">
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
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Email</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-envelope"></i></span>
                            <input type="email" class="form-control" id="basic-icon-default-fullname"
                                  aria-describedby="basic-icon-default-fullname2" wire:model="email" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Contact Info:</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-phone"></i></span>
                            <input type="number" class="form-control" id="basic-icon-default-fullname"
                                aria-describedby="basic-icon-default-fullname2" wire:model="contactinfo" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">CNIC No.</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-id-card"></i></span>
                            <input type="number" wire:model="cnic" class="form-control" id="basic-icon-default-fullname"
                                aria-describedby="basic-icon-default-fullname2" wire:model="cnic" />
                        </div>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-success">Submit</button>
                      <a href="{{route('users.index')}}" wire:navigate class="btn btn-danger">Cancel</a>
                    </div>
                  </div>

            </form>
        </div>
    </div>
</div>

</div>
