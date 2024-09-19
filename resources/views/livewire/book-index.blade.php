{{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
<div class="row justify-content-center align-items-center">
  <div class="col-md-8">
      <div class="card border-0">
          <div class="card-body">
              <h6 class="mb-3">Data Buku</h6>
              @if (session()->has('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
              @endif
              <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                      <thead class="border-top">
                          <tr>
                              <th width="10">No</th>
                              <th>Judul</th>
                              <th>Qty</th>
                              <th>Penulis</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @forelse ($books as $book)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $book->title }}</td>
                                  <td>{{ $book->qty }}</td>
                                  <td>{{ $book->writer }}</td>
                                  <td>
                                      <button class="btn btn-success btn-sm">Edit</button>
                                      <button class="btn btn-danger btn-sm">Delete</button>
                                  </td>
                              </tr>
                          @empty
                              <tr>
                                  <td colspan="5" align="center">-tidak ada data-</td>
                              </tr>
                          @endforelse
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
  <div class="col-md-4">
    <div class="card border-0">
        <div class="card-header bg-white py-3">
            <h6 class="mb-0">Form Create</h6>
        </div>
        <div class="card-body">
            <livewire:book-create>
        </div>
    </div>
  </div>
</div>    

