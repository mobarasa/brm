<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\User;
use Image;

class ShowProfile extends Component
{
    use WithFileUploads;

    public User $user;
    public $name;
    public $gender;
    public $email;
    public $phone_number;
    public $content;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->gender = auth()->user()->gender;
        $this->email = auth()->user()->email;
        $this->phone_number = auth()->user()->phone_number;
        $this->content = auth()->user()->content;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required','email:rfc,dns', 'string', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone_number' => ['required', 'numeric', Rule::unique('users')->ignore(Auth::user()->id)],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.show-profile');
    }

    public function updateProfile()
    {
        $this->validate();

        $user = User::find(Auth::user()->id);
        $user->name = ucwords(strtolower($this->name));
        $user->gender = $this->gender;
        $user->email = $this->email;
        $user->phone_number = $this->phone_number;
        $user->content = $this->content;

        $user->save();
        session()->flash('text_success','Profile has been updated successfully!');
    }
}
