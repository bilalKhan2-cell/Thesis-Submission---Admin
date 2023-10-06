<div class="card">
    <div class="card-body">

        <center><img src="{{ asset('img/layouts/bg.png') }}" alt="University Logo.."> </center>

        <p>Please sign-in</p>
        <span class="text-danger">{{ $err }}</span>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="formAuthentication" class="mb-3" wire:submit.prevent="LoginUser">
        @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" wire:model="email" class="form-control text-primary" id="email" name="email-username"
                    placeholder="Enter your email or username" autofocus />
            </div>
            
            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="#" wire:navigate>
                        <small>Forgot Password?</small>
                    </a>
                </div>
                <div class="input-group input-group-merge">
                    <input type="password" wire:model="password" id="password" class="form-control" name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
            </div>

            <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
        </form>

    </div>
</div>