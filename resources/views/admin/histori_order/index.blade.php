@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Histori Order /</span> Basic Tables</h4>

    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h5 class="">Histori Order</h5>
        {{-- <a href="" class="btn btn-primary">Tambah Obat</a> --}}

      </div>



      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th class="text-white text-center">#</th>
              <th class="text-white text-center">Nama User</th>
              <th class="text-white text-center">Status</th>
              <th class="text-white text-center">Pembayaran</th>

              <th class="text-white text-center">Total</th>
              <th class="text-white text-center">Bukti Pembayaran</th>
              <th class="text-white text-center">Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($orders as $order)
            <tr>
              <td>{{ $loop -> iteration }}</td>
              <td>{{ $order->user->name }}</td>
              <td>@if ($order->status == 0)
                <span class=" badge rounded-pill bg-danger text-dark" style="width: 160px"><strong>Belum Bayar <i
                      class="fa-solid fa-circle-xmark"></i></strong></span>
                @elseif ($order->status == 1)
                <span style="width: 160px" class="badge rounded-pill bg-warning text-dark"><strong>Belum Tervalidasi <i
                      class="fa-solid fa-circle-exclamation"></i></span>
                @elseif ($order->status == 2)
                <span style="width: 160px" class=" badge rounded-pill bg-success text-dark"><strong>Sudah Tervalidasi <i
                      class="fa-solid fa-circle-check"></i></strong></span>
                @endif
              </td>
              <td><img src="{{ asset('img/payments/'.$order -> payments.'.png') }}" alt="" width="100px"></td>

              <td>Rp. {{ number_format($order->total) }}</td>
              <td width="200px"><img src="{{ asset('storage/'.$order -> bukti_pembayaran) }}" alt="" height="200px">
              </td>
              <td>
                <form action="/admin/order/{{ $order -> id }}" method="POST" class="d-inline"
                  id="data-update-{{ $order -> id }}">
                  @method('PUT')
                  @csrf
                  <button class="btn btn-warning d-inline update" data-name="{{ $order->user -> name }}"
                    data-slug="{{ $order->id }}" @if ($order ->status == 2 ) disabled

                    @endif><i class="fa-solid fa-circle-check" title="Validation Payments"></i></button>
                </form>
                <a href="/admin/order/{{ $order -> id }}" class="btn btn-info"><i class='bx bx-show'></i></a>
                <form action="/admin/order/{{ $order->id }}" method="POST" class="d-inline"
                  id="data-delete-{{ $order-> id }}">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger border-0 delete" data-name="{{ $order->user -> name }}"
                    data-slug="{{ $order->id }}"><i class='bx bxs-trash'></i></button>
                </form>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
        <div class="d-flex justify-content-lg-center">
          {{ $orders->links() }}
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
                            const dataSlug = document.getElementById('data-delete-' + postSlug);
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
  const updateButton = document.querySelectorAll('.update');
    updateButton.forEach((dBtn) => {
        dBtn.addEventListener('click', function (event) {
            event.preventDefault();

            const postSlug = this.dataset.slug;
            const postTitle = this.dataset.name;
            Swal.fire({
                title: 'Yakin Untuk Konfirmasi ?',
                text: "Konfirmasi Data : " + postTitle,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Konfirmasi!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const dataSlug = document.getElementById('data-update-' + postSlug);
                            dataSlug.submit();
                            Swal.fire(
                                'Validated!',
                                'Your data has been Confirmed.',
                                'success'
                            )
                        }
            })
        })
    });
</script>
@endsection
