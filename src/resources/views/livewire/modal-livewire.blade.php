<div class="modal-overlay">
    <button wire:click="openModal()" type="button" class="admin__table-detail">
        詳細
    </button>

    @if($showModal)
    <div class="modal-content">
        <div class="modal-close">
            <button class="modal-close__button" wire:click="closeModal()" type="button">
                閉じる
            </button>
        </div>

        <div class="modal-table__inner">
            <table class="modal-table__table">
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">お名前</th>
                    <td class="modal-table__table-item">name</td>
                </tr>
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">性別</th>
                    <td class="modal-table__table-item">gender</td>
                </tr>
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">メールアドレス</th>
                    <td class="modal-table__table-item">email</td>
                </tr>
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">電話番号</th>
                    <td class="modal-table__table-item">tell</td>
                </tr>
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">住所</th>
                    <td class="modal-table__table-item">address</td>
                </tr>
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">建物名</th>
                    <td class="modal-table__table-item">building</td>
                </tr>
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">お問い合わせの種類</th>
                    <td class="modal-table__table-item">category_name</td>
                </tr>
                <tr class="modal-table__table-row">
                    <th class="modal-table__table-label">お問い合わせ内容</th>
                    <td class="modal-table__table-item">detail</td>
                </tr>
            </table>
        </div>

        <div class="modal-delete">
            <button class="modal-delete__button" wire:click="closeModal()" type="button">
                削除
            </button>
        </div>
    </div>
    @endif
</div>