<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\User;
use App\Livewire\User\Register as RegisterUser;
use App\Livewire\User\Edit as EditUser;
use App\Livewire\Department\Index as DepartmentIndex;
use App\Livewire\Department\Register as DepartmentRegister;
use App\Livewire\Department\Edit as EditDepartment;
use App\Livewire\Supervisor\Index as SupervisorIndex;
use App\Livewire\Supervisor\Register as SupervisorRegister;
use App\Livewire\Supervisor\Edit as EditSupervisor;
use App\Livewire\TeamLead\Index as TeamLeadIndex;
use App\Livewire\TeamLead\Register as TeamLeadRegister;
use App\Livewire\TeamLead\Edit as EditTeamLead;
use App\Livewire\TeamLead\AssignSupervisor as AssignSupervisorToTeam;
use App\Livewire\TeamLead\Supervisor;
use App\Livewire\Login;

Route::get('/', Login::class)->name('users.login');
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('users.login');
})->name('user.logout');

Route::middleware(['users'])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard.user');

    Route::get('/user', User::class)->name('users.index');
    Route::get('/user/create', RegisterUser::class)->name('users.register');
    Route::get('/user/{id}', EditUser::class);

    Route::get('/department', DepartmentIndex::class)->name('departments.index');
    Route::get('/department/create', DepartmentRegister::class)->name('departments.register');
    Route::get('/department/{id}', EditDepartment::class);

    Route::get('/supervisor', SupervisorIndex::class)->name('supervisors.index');
    Route::get('/supervisor/register', SupervisorRegister::class)->name('supervisors.register');
    Route::get('/supervisor/{id}', EditSupervisor::class)->name('supervisors.edit');

    Route::get('/team', TeamLeadIndex::class)->name('teams.index');
    Route::get('/team/register', TeamLeadRegister::class)->name('teams.register');
    Route::get('/team/{id}', EditTeamLead::class)->name('teams.edit');

    Route::get('/assign_supervisor', AssignSupervisorToTeam::class)->name('assign_supervisor.index');
    Route::get('/team/{id}/assign', Supervisor::class)->name('teams.supervisor_assign');

    Route::get('/profile',Profile::class)->name('user.profile');

});

?>