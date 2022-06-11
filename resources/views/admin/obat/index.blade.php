@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Obat /</span> Basic Tables</h4>

    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h5 class="">Manajemen Obat</h5>
        <div class="dropdown">
          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/admin/product/create"><i class="bx bx-plus me-1"></i> Tambah Obat</a>
          </div>
        </div>
        {{-- <a href="" class="btn btn-primary">Tambah Obat</a> --}}
      </div>



      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th class="text-white">Gambar</th>
              <th class="text-white">Nama Obat</th>
              <th class="text-white">Kategori</th>
              <th class="text-white">Harga</th>
              <th class="text-white">Stok</th>
              <th class="text-white">Kadaluarsa</th>
              <th class="text-white">Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($obats as $obat)
            <tr>
              <td><img src="@if ($obat -> image == null)
                {{ asset('img/products/'.$obat -> slug.'.jpg') }}
                @else
                {{asset('storage/'.$obat->image)}}
              @endif" width="100px" height="100px"></td>
              <td>{{ $obat->name }}</td>
              <td>{{ $obat->category->name }}</td>
              <td>{{ $obat->price }}</td>
              <td>{{ $obat->stock }}</td>
              <td>
                @if ($obat->expired_date == NULL)
                <a href="/admin/product/expired/{{ $obat->id }}/edit" class="btn btn-primary"><i class="bx bx-plus me-1"></i></a>

                @else
                {{ $obat->expired_date }}
                @endif
              </td>


              <td>
                <a href="/admin/product/{{ $obat->slug }}/edit" class="btn btn-warning"><i
                    class='bx bxs-pencil'></i></a>
                <form action="/admin/product/{{ $obat->slug }}" method="POST" class="d-inline"
                  id="data-{{ $obat->slug }}">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger border-0 delete" data-name="{{ $obat->name }}"
                    data-slug="{{ $obat->slug }}"><i class='bx bxs-trash'></i></button>
                </form>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
        <div class="d-flex justify-content-lg-center">
          {{ $obats->links() }}
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
                text: "You will delete data : " + postTitle,
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
