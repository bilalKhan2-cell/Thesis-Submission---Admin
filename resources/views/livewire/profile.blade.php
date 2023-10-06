<div>

    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'User',
        'pageTitle' => 'User Profile',
    ])

    <div class="card mb-4">
        <h5 class="card-header">User Data</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <span>Username: </span>
                </div>

                <div class="col-sm-4">
                    <span>{{ $user_data->name }}</span>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-4">
                    <span>Email Address: </span>
                </div>

                <div class="col-sm-4">
                    <span>{{ $user_data->email }}</span>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-4">
                    <span>Contact Info: </span>
                </div>

                <div class="col-sm-4">
                    <span>{{ $user_data->contactinfo }}</span>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-4">
                    <span>CNIC No.</span>
                </div>

                <div class="col-sm-4">
                    <span>{{ $user_data->cnic }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <h5 class="card-header">Change Password</h5>
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

            <span class="text-success">{{ $success }}</span>
            <div class="row">
                <form wire:submit="ChangePassword">
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Current Password: </label>
                            <input type="password" class="form-control" wire:model="current_password" />
                        </div>
                    </div>

                    <br>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>New Password: </label>
                            <input type="password" wire:model="new_password" class="form-control" />
                        </div>
                    </div>

                    <br>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Confirm Password: </label>
                            <input type="password" wire:model="confirm_password" class="form-control" />
                        </div>
                    </div>

                    <br>
                    <span class="text-danger">{{ $error }}</span>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success text-white">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
