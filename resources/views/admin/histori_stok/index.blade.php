@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Histori Tambah Stok /</span> Basic Tables</h4>

    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h5 class="">Histori Tambah Stok</h5>
        {{-- <a href="" class="btn btn-primary">Tambah Obat</a> --}}
      </div>



      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th>Nama User</th>
              <th>Nama Product</th>
              <th>Tanggal</th>
              <th>Qty</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($stoks as $stok)
            <tr>
              <td>{{ $stok->user->name }}</td>
              <td>{{ $stok->product->name }}</td>
              <td>{{ $stok->date }}</td>
              <td>{{ $stok->qty }}</td>
              <td>
                <form action="/admin/histori_stok/{{ $stok->id }}" method="POST" class="d-inline"
                  id="data-{{ $stok -> id }}">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger border-0 delete" data-name={{ $stok ->product -> name  }}
                    data-slug={{ $stok -> id }}><i class='bx bxs-trash'></i></button>
                </form>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
        <div class="d-flex justify-content-lg-center">
          {{ $stoks->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('sweetAlert')
<script>
  const deleteButton = document.querySelectorAll('.delete');
    deleteButton.forEach((dBtn) => {
        dBtn.addEventListener('click', function (event) {
            event.preventDefault();

            const postSlug = this.dataset.slug;
            const postTitle = this.dataset.name;
            Swal.fire({
                title: 'Are you sure to delete this data?',
                text: "You will delete data with name: " + postTitle,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const dataSlug = document.getElementById('data-' + postSlug);
                            dataSlug.submit();
                            Swal.fire(
                                'Deleted!',
                                'Your data has been deleted.',
                                'success'
                            )
                        }
            })
        })
    });
</script>
@endsection