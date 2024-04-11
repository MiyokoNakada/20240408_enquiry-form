<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ModalLivewire extends Component
{
    public $showModal = false; // モーダルの表示状態を管理するプロパティ
    public $contactId; // コンタクトIDを保持するプロパティ

    public function render()
    {
        // コンタクトIDを使用して連絡先のデータを取得
        $contact = Contact::find($this->contactId);
        return view('livewire.modal-livewire', compact('contact'));
    }

    public function openModal() // モーダルを閉じるためのメソッド
    {
        $this->showModal = true;
    }

    public function closeModal() 
    {
        $this->showModal = false; 
    }

    public function Delete() // 削除の確認を行うためのメソッド
    {        
        if ($this->contactId) {
            Contact::destroy($this->contactId);
            $this->closeModal();
            return redirect('/admin');
        }
    }
}
