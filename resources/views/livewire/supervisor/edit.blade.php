<div>
    
    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Supervisors',
        'pageTitle'=>'Update Supervisor Record(s)'
    ])

        <div class="card mb-4">
            <h5 class="card-header">Supervisors</h5>
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

                @if($loadingState)
                    <div class="alert alert-info">
                        <span class="text-primary"><b>{{$message}}</b></span>
                    </div>
                @endif
                
                <form wire:submit="UpdateSupervisor">
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
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Enter Contact No</label>
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
                                        <select wire:model="supervisor_department" id="defaultSelect" class="form-select">
                                            <option>Select Department</option>
                                            @foreach($department as $key=>$value)
                                                <option value="{{$value->id}}">{{$value->name}} (DEPT-{{$value->id}})</option>
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
                                        class="bx bxs-location-plus"></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    aria-describedby="basic-icon-default-fullname2" wire:model="address" />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-primary">Update Supervisor</button>
                            <a href="{{route('supervisors.index')}}" wire:navigate class="btn btn-danger">Cancel</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
</div>