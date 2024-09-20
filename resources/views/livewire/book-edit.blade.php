<div>
    <form wire:submit.prevent="update">
        <div class="mb-3">
            <label for="title" class="mb-2 fw-semibold">Judul</label>
            <input type="text" id="title" class="form-control" wire:model="title">
            @error('title')
                <div class="text-danger">Judul wajib diisi</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="mb-2 fw-semibold">Qty</label>
            <input type="number" id="qty" class="form-control" wire:model="qty">
            @error('qty')
                <div class="text-danger">Jumlah buku wajib diisi</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="mb-2 fw-semibold">Penulis</label>
            <input type="text" id="writer" class="form-control" wire:model="writer">
            @error('writer')
                <div class="text-danger">Penulis wajib diisi</div>
            @enderror
        </div>
        <div class="d-grid">
            <button class="btn btn-primary shadow-sm">Save</button>
        </div>
    </form>
</div>
