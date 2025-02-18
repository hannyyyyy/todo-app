@extends('layouts.app')

@section('content')
    <style>
        #content {
        background: url('{{ asset('images/bg-hanny2.jpg') }}') center/cover fixed no-repeat;
        color: white;
        /*  Mengatur teks tombol menjadi warna putih agar kontras dengan latar belakang gradient.*/
        min-height: 100vh;
    }
    </style>
    <div id="content" class="container">
        <!-- Tombol Kembali -->
        <div class="d-flex align-items-center mb-3">
            <a href="{{ route('home') }}" class="btn btn-sm text-warning">
                <i class="bi bi-arrow-left-short fs-4"></i>
                <span class="fw-bold fs-5">Kembali</span>
            </a>
        </div>

        <!-- Pesan Sukses -->
        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="row my-3">
            <div class="col-12 col-md-8 mb-3">
                <!-- Kartu Detail Tugas -->
                <div class="card shadow-sm border-warning">
                    <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                        <h5 class="text-truncate" style="width: 70%">{{ $task->name }} <small class="fs-6">di {{ $task->list->name }}</small></h5>
                        <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editTaskModal">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                    </div>
                    <div class="card-body">
                        <p class="small">{{ $task->description }}</p>
                    </div>
                    <div class="card-footer">
                        <!-- Form Hapus Task -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-warning w-100 btn-sm">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-3">
                <!-- Kartu Detail Tambahan -->
                <div class="card shadow-sm border-warning">
                    <div class="card-header bg-warning text-dark">
                        <h5>Details</h5>
                    </div>
                    <div class="card-body">
                        <!-- Form Untuk Mengubah List dari Task -->
                        <form action="{{ route('tasks.changeList', $task->id) }}" method="POST" class="mb-2">
                            @csrf
                            @method('PATCH')
                            <select class="form-select form-select-sm" name="list_id" onchange="this.form.submit()">
                                @foreach ($lists as $list)
                                    <option value="{{ $list->id }}" {{ $list->id == $task->list_id ? 'selected' : '' }}>
                                        {{ $list->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>

                        <!-- Prioritas Task -->
                        <h6 class="fs-6">Prioritas:
                            <span class="badge text-bg-{{ $task->priorityClass }} badge-pill">{{ $task->priority }}</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Task -->
        <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="modal-content">
                    @method('PUT')
                    @csrf
                    <div class="modal-header bg-warning text-dark">
                        <h5 class="modal-title" id="editTaskModalLabel">Edit Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" value="{{ $task->list_id }}" name="list_id" hidden>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ $task->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control form-control-sm" name="description" id="description" rows="3">{{ $task->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <select class="form-control form-control-sm" name="priority" id="priority">
                                <option value="low" @selected($task->priority == 'low')>Low</option>
                                <option value="medium" @selected($task->priority == 'medium')>Medium</option>
                                <option value="high" @selected($task->priority == 'high')>High</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
