@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">News /</span> Daftar News</h4>

        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="">Manajemen News</h5>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/admin/news/create"><i class="bx bx-plus me-1"></i> Tambah
                            News</a>
                    </div>
                </div>
                {{-- <a href="" class="btn btn-primary">Tambah Obat</a> --}}
            </div>



            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center text-white">Penulis</th>
                            <th class="text-center text-white">Photo</th>
                            <th class="text-center text-white">Judul</th>
                            {{-- <th width="200px">Content</th> --}}
                            <th class="text-center text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($news as $n)
                        <tr>
                            <td>{{ $n-> user -> name }}</td>
                            <td><img src="
                                
                                {{ asset('storage/' . $n -> photo) }}
                                
                                " width="250px" height="250px" class="rounded img-fluid" alt="{{ $n -> photo }}"></td>
                            <td>{{ $n->title }}</td>
                            {{-- <td>{{ $n->content }}</td> --}}
                            <td>
                                <a href="/admin/news/{{ $n -> slug }}" class="btn btn-info"><i
                                        class='bx bx-show'></i></a>
                                <a href="/admin/news/{{ $n->slug }}/edit" class="btn btn-warning"><i
                                        class='bx bxs-pencil'></i></a>
                                <form action="/admin/news/{{ $n->slug }}" method="POST" class="d-inline"
                                    id="data-{{ $n->slug }}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger border-0 delete" data-name="{{ $n->title }}"
                                        data-slug="{{ $n->slug }}"><i class='bx bxs-trash'></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-lg-center">
                    {{ $news->links() }}
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
                text: "You will delete data with title: " + postTitle,
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