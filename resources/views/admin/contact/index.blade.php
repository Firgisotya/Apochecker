@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Contact /</span> Basic Tables</h4>

        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="">Manajemen Contact</h5>
                {{-- <a href="" class="btn btn-primary">Tambah item</a> --}}
            </div>



            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-white text-center">#</th>
                            <th class="text-white text-center">Nama</th>
                            <th class="text-white text-center">Email</th>
                            <th class="text-white text-center">No HP</th>
                            {{-- <th class="text-white text-center">Judul</th> --}}
                            <th class="text-white text-center">Pesan</th>
                            <th class="text-white text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $contact -> name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            {{-- <td>{{ $contact->subject }}</td> --}}
                            <td>{{ $contact->message }}</td>
                            <td>
                                <a href="/admin/contact/{{ $contact -> id }}" class="btn btn-info"><i
                                        class='bx bx-show'></i></a>

                                <form action="/admin/contact/{{ $contact->id }}" method="POST" class="d-inline"
                                    id="data-{{ $contact->id }}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger border-0 delete" data-name="{{ $contact->name }}"
                                        data-slug="{{ $contact->id }}"><i class='bx bxs-trash'></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-lg-center">
                    {{ $contacts->links() }}
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
                text: "You will delete contact from : " + postTitle,
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