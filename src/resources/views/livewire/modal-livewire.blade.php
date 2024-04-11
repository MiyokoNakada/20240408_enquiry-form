<div class="modal-overlay">
    <button wire:click="openModal()" type="button" class="admin__table-detail">
        詳細
    </button>

    @if($showModal)
    <div class="modal-content">
        <div class="modal-close">
            <button class="modal-close__button" wire:click="closeModal()" type="button">
                ×
            </button>
        </div>

        <div class="modal-table__inner">
            <table class="modal-table__table">
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">お名前</th>
                    <td class="modal-table__table-item">{{ $contact['last_name']."　".$contact['first_name'] }}</td>
                </tr>
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">性別</th>
                    <td class="modal-table__table-item">
                        @if ($contact['gender'] === 1)
                        男性
                        @elseif ($contact['gender'] === 2)
                        女性
                        @else
                        その他
                        @endif</td>
                </tr>
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">メールアドレス</th>
                    <td class="modal-table__table-item">{{ $contact['email'] }}</td>
                </tr>
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">電話番号</th>
                    <td class="modal-table__table-item">{{ $contact['tell'] }}</td>
                </tr>
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">住所</th>
                    <td class="modal-table__table-item">{{ $contact['address'] }}</td>
                </tr>
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">建物名</th>
                    <td class="modal-table__table-item">{{ $contact['building'] }}</td>
                </tr>
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">お問い合わせの種類</th>
                    <td class="modal-table__table-item">{{ $contact->category->content }}</td>
                </tr>
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">お問い合わせ内容</th>
                    <td class="modal-table__table-item">{{ $contact['detail'] }}</td>
                </tr>
            </table>
        </div>

        <div class="modal-delete">
            <button class="modal-delete__button" wire:click="Delete" type="button">
                削除
            </button>
        </div>
    </div>
    @endif
</div>