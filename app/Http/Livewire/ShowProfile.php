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
    public $upload_image;
    public $content;
    public $newimage;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->gender = auth()->user()->gender;
        $this->email = auth()->user()->email;
        $this->phone_number = auth()->user()->phone_number;
        $this->upload_image = auth()->user()->upload_image;
        $this->content = auth()->user()->content;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required','email:rfc,dns', 'string', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone_number' => ['required', 'numeric', Rule::unique('users')->ignore(Auth::user()->id)],
        ];
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:jpeg,png'
            ]);
        }
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

        if($this->newimage)
        {
            Storage::delete('public/users/' . $user->upload_image);


            $filename = time() . '_' . uniqid() . '.'  . $this->newimage->extension();


            $this->newimage->storeAs('public/users', $filename);

            //Resize image here
            $resizeimagepath = public_path('storage/users/'.$filename);
            $img = Image::make($resizeimagepath)->resize(360, 360, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($resizeimagepath);


            $user->upload_image = $filename;

        }

        $user->save();
        session()->flash('text_success','Profile has been updated successfully!');
    }
}
