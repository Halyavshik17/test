<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ActionUsers extends Component
{
    public $showingModalCreate = false;
    public $showingModalDelete = false;

    public $showingModalEdit = false;

    public $name, $email, $user, $user_id, $users;

    protected $messages = [
        'email.required' => 'Заполни мыло сука!'
    ];

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        // 'roles' => ['required', 'integer'],
    ];

    public function showModalCreate(){
        $this->showingModalCreate = true;
    }

    public function showModalEdit($id)
    { 
        $this->showingModalEdit = true;

        $this->user_id = $id;
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function resetModal()
    {
        $this->resetExcept();
        $this->resetErrorBag();
    }

    public function createUser()
    {
        $this->validate();

        dd($this);

        // return User::create([
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     'password' => Hash::make($input['password']),
        // ]);

        // $data = $request->validated();
        // $password = Str::random(10);

        // $data['password'] = Hash::make($password);
        // не используем Create()
        // Category::firstOrCreate(['title' => $data['title']]);
        // $user = User::firstOrCreate(['email' => $data['email']], $data);
        // Mail::to($data['email'])->send(new PasswordMail($password));
        // event(new Registered($user));
        // return redirect()->route('admin.create-user');
    }

    public function render()
    {
        session()->flash('message', 'Updated: ' . $this->dispatchBrowserEvent('modal-updated'));

        $this->users = User::all();
        return view('livewire.admin.action-users');
    }
}
