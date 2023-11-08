<?php

namespace App\Livewire\Shops;

use App\Models\Shop\MainShop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class MainShops extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $user_id, $mainshop_id;

    #[Rule('required|max:255')]
    public $name = '';

    public function resetInput()
    {
        $this->reset('user_id', 'mainshop_id', 'name');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->resetInput();
    }

    public function storeMainShop()
    {
        $validated = $this->validateOnly('name');
        MainShop::create([
          'user_id' => Auth::user()->id,
          'name' => $validated['name']
        ]);

        $this->reset(['user_id', 'name', 'mainshop_id']);
        request()->session()->flash('success', 'MainShop Name Created Successfully!');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput(); 
    }

    public function editMainShop($id)
    {
        $this->mainshop_id = $id;
        $mainshops = MainShop::find($id);
        $this->name = $mainshops->name;
    }

    public function updateMainShop()
    {
        $validated = $this->validateOnly('name');
        MainShop::find($this->mainshop_id)->update([
          'user_id' => Auth::user()->id,
          'name' => $validated['name']
        ]);
        session()->flash('success', 'MainShop Update Successfully!');
        // $this->dispatchBrowserEvent('close-modal');
        $this->resetInput(); 
    }

    public function render()
    {
        $users = User::where('id', Auth::user()->id)->get();
        $mainshops = MainShop::select('id', 'user_id', 'name')->first();
        return view('livewire.shops.main-shops', ['users' => $users, 'mainshops' => $mainshops])
                    ->extends('components.layouts.app')
                    ->section('content');
    }
}
