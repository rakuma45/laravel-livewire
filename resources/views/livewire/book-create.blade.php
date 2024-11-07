<div>
    <form wire:submit.prevent="store">
        <div class="mb-3">
            <label for="title" class="mb-2 fw-semibold">Judul</label>
            <input type="text" id="title" class="form-control" wire:model="title">
            @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="qty" class="mb-2 fw-semibold">Qty</label>
            <input type="number" id="qty" class="form-control" wire:model="qty">
            @error('qty')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="writer" class="mb-2 fw-semibold">Penulis</label>
            <input type="text" id="writer" class="form-control" wire:model="writer">
            @error('writer')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="mb-2 fw-semibold">Cover</label>
            <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" wire:model="image">
            @error('image')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="d-grid">
            <button class="btn btn-primary shadow-sm">Save</button>
        </div>
    </form>
</div>
