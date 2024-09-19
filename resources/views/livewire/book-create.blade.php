<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <form wire:submit.prevent="store">
        <div class="mb-3">
            <label for="title" class="mb-2 fw-semibold">Judul</label>
            <input type="text" id="title" class="form-control" wire:model="title">
        </div>
        <div class="mb-3">
            <label for="qty" class="mb-2 fw-semibold">Qty</label>
            <input type="text" id="qty" class="form-control" wire:model="qty">
        </div>
        <div class="mb-3">
            <label for="writer" class="mb-2 fw-semibold">Penulis</label>
            <input type="text" id="writer" class="form-control" wire:model="writer">
        </div>
        <div class="d-grid">
            <button class="bth btn-primary shadow-sm">Save</button>
        </div>
    </form>
</div>
