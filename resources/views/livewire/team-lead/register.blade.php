<div>

    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Team Leaders',
        'pageTitle' => 'Teams Leader & Members Registration.',
    ])

    <div class="card mb-4">
        <h5 class="card-header">Teams</h5>
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
            <form wire:submit="RegisterTeam">

                <div class="row mb-3">
                    <div class="col-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Enter Project ID</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bxl-product-hunt"></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    aria-describedby="basic-icon-default-fullname2" wire:model="project_id" />
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Enter Roll No</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bxl-mastercard"></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    aria-describedby="basic-icon-default-fullname2" wire:model="rollno" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Enter Name</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-rename"></i></span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                aria-describedby="basic-icon-default-fullname2" wire:model="name" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Enter Father Name</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-rename"></i></span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                aria-describedby="basic-icon-default-fullname2" wire:model="fname" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Enter Email</label>
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
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Enter Contact Info</label>
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
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Enter CNIC No</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-id-card"></i></span>
                            <input type="number" class="form-control" id="basic-icon-default-fullname"
                                aria-describedby="basic-icon-default-fullname2" wire:model="cnic" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Select Gender</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-male"></i></span>
                            <select wire:model="gender" id="defaultSelect" class="form-select">
                                <option>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Select Department</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-building"></i></span>
                            <select wire:model="team_department" id="defaultSelect" class="form-select">
                                <option>Select Department</option>
                                @foreach ($department as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->name }} (DEPT-{{ $value->id }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Enter Address</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-current-location"></i></span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                aria-describedby="basic-icon-default-fullname2" wire:model="address" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname"></label>
                    <div class="col-sm-10" id="members">
                        @foreach ($members as $index => $value)
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="text" required class="form-control"
                                        wire:model="members.{{ $index }}.name" placeholder="Name">
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" required class="form-control"
                                        wire:model="members.{{ $index }}.rollno" placeholder="Roll No.">
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-danger" type="button"
                                        wire:click="removeMember({{ $index }})">Remove</button>
                                </div>
                            </div>
                            <br />
                        @endforeach
                    </div>
                </div>

                <div class="row mb-5">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname"></label>
                    <div class="col-sm-10">
                        <button class="btn btn-primary" wire:click="addMember" type="button">Add Member</button>
                        <button type="submit" class="btn btn-success">Register Team</button>
                        <a href="{{ route('supervisors.index') }}" wire:navigate class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>