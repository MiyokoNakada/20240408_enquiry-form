<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalLivewire extends Component
{
    public $showModal = false; // モーダルの表示状態を管理するプロパティ

    public function render()
    {
        return view('livewire.modal-livewire');
    }

    public function openModal()
    {
        $this->showModal = true; // モーダルを表示するためのメソッド
    }

    public function closeModal()
    {
        $this->showModal = false; // モーダルを閉じるためのメソッド
    }
}
