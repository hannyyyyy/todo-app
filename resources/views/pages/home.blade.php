@extends('layouts.app')

@section('content')
<style>
    /* ====== Background dan Warna Konten ====== */
    #content {
        background: url('{{ asset('images/bg-hanny.jpg') }}') center/cover fixed no-repeat; /* Menambahkan gambar latar belakang */
        color: white;
        min-height: 100vh;
    }

    /* ====== Efek Glassmorphism pada Card ====== */
    .card {
        background: rgba(255, 255, 255, 0.15); /* Memberikan efek kaca buram */
        backdrop-filter: blur(8px); /* Efek blur di latar belakang */
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Transisi pada hover */
        border: 1px solid rgba(255, 255, 255, 0.3); /* Border tipis */
        margin-bottom: 1rem; /* Mengurangi jarak antar card */
    }

    .card:hover {
        transform: scale(1.03); /* Efek memperbesar card pada hover */
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Memberikan bayangan pada hover */
    }

    /* ====== Animasi pada Badge ====== */
    .badge-animated {
        animation: bounce 1s infinite alternate; /* Animasi bouncing untuk badge */
    }

    @keyframes bounce {
        from {
            transform: translateY(0);
        }
        to {
            transform: translateY(-2px);
        }
    }

    /* ====== Tombol Tambah dengan Efek Pulse ====== */
    .btn-add {
        background: linear-gradient(135deg, #42e695, #3bb2b8); /* Efek gradasi pada tombol */
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2em;
        transition: all 0.3s ease-in-out;
        animation: pulse 1.5s infinite; /* Efek pulse pada tombol */
        border: none;
    }

    .btn-add:hover {
        transform: scale(1.1); /* Efek memperbesar tombol saat hover */
        box-shadow: 0 0 12px rgba(66, 230, 149, 0.5); /* Bayangan saat hover */
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 8px rgba(66, 230, 149, 0.3); /* Efek pulse pada tombol */
        }
        50% {
            box-shadow: 0 0 18px rgba(66, 230, 149, 0.6);
        }
        100% {
            box-shadow: 0 0 8px rgba(66, 230, 149, 0.3);
        }
    }

    /* ====== Penyusunan Card dan Elemen ====== */
    .card-body {
        padding: 0.8rem; /* Mengurangi padding pada card body */
    }

    .card-footer {
        padding: 0.6rem; /* Mengurangi padding pada footer */
    }

    .btn-sm {
        padding: 0.3rem 0.8rem; /* Mengurangi padding pada tombol kecil */
    }

    .task-list-item {
        margin-bottom: 0.8rem; /* Mengurangi jarak antara item tugas */
    }

    .task-list-item .card-body {
        padding: 0.6rem 1rem;
    }

    .task-list-item .card-header {
        padding: 0.4rem 0.8rem;
    }

    .task-list-item .card-footer {
        padding: 0.4rem 1rem;
    }

    .task-list-item .card-header .d-flex {
        gap: 0.8rem;
    }

    /* Rata kiri untuk link profile */
    .profile-link {
        font-size: 0.85rem;
        text-align: left;
        margin: 0 1rem;
    }

    .search-container {
        margin-bottom: 2rem;
    }

    .search-bar {
        width: 100%;
        max-width: 500px;
        padding: 0.5rem;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.5);
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
    }
</style>

<div id="content" class="min-vh-100 d-flex flex-column align-items-center py-3">
    <!-- Judul Halaman -->
    <h1 class="text-danger-subtle fw-bold mb-4">JADWAL MINGGUAN</h1>

    <!-- Fitur Pencarian -->
    <div class="search-container w-100 d-flex justify-content-center">
        <input type="text" class="search-bar" placeholder="Cari Tugas atau List..." id="search-input" />
    </div>

    <!-- Fitur "Click for My Profile" -->
    <div class="card p-1 w-100 mb-3">
        <div class="d-flex align-items-center justify-content-start">
            <a href="{{ route('about') }}" class="nav-link d-flex align-items-center profile-link">
                <span class="fw-bold">Click for my profile :></span>
            </a>
        </div>
    </div>

    {{-- div untuk membungkus konten --}}
    <div id="content" class="overflow-y-hidden overflow-x-hidden bg-danger-subtle d-flex justify-content-center align-items-center">
        <!-- Cek apakah tidak ada list yang tersedia -->
        @if ($lists->count() == 0)
            <div class="d-flex flex-column align-items-center">
                <p class="fw-bold text-center mb-3">Belum ada tugas yang ditambahkan</p> <!-- Mengurangi margin bawah -->
                {{-- Tombol Tambah Task jika tidak ada tugas --}}
                <button type="button" class="btn btn-sm d-flex align-items-center gap-1 btn-outline-primary" style="width: fit-content;">
                    <i class="bi bi-plus-square fs-3"></i> Tambah
                </button>
            </div>
        @endif

        <!-- Kontainer untuk menampilkan list dan tugas -->
        <div class="d-flex gap-3 px-3 flex-nowrap overflow-x-scroll" style="height: 100vh;">
            <!-- Iterasi melalui setiap list yang ada -->
            @foreach ($lists as $list)
                <div class="card flex-shrink-0" style="width: 16rem; max-height: 75vh;">
                    <div class="card-header d-flex align-items-center justify-content-between bg-danger-subtle text-dark mb-3"> <!-- Mengurangi margin bawah -->
                        <h4 class="card-title">{{ $list->name }}</h4>
                        <!-- Form untuk menghapus list -->
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm p-0">
                                <i class="bi bi-trash fs-5 text-danger"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-body d-flex flex-column gap-3"> <!-- Mengurangi jarak antar tugas -->
                        <!-- Iterasi untuk menampilkan tugas dalam list -->
                        @foreach ($tasks as $task)
                            @if ($task->list_id == $list->id)
                                <div class="card mb-2 task-list-item"> <!-- Mengurangi margin bawah untuk tugas -->
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex flex-column justify-content-center gap-1">
                                                <!-- Link menuju detail tugas, dengan strikethrough jika sudah selesai -->
                                                <a href="{{ route('tasks.show', $task->id )}}"
                                                    class="fw-bold lh-1 m-0 {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                                    {{ $task->name }}
                                                </a>
                                                <!-- Menampilkan prioritas tugas dengan badge yang berbeda warna -->
                                                <span class="badge text-bg-{{ $task->priorityClass }} badge-pill" style="width: fit-content">
                                                    {{ $task->priority }}
                                                </span>
                                            </div>
                                            <!-- Form untuk menghapus tugas -->
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm p-0">
                                                    <i class="bi bi-x-circle text-danger fs-5"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- Menampilkan deskripsi tugas -->
                                        <p class="card-text text-truncate">
                                            {{ $task->description }}
                                        </p>
                                    </div>
                                    <!-- Jika tugas belum selesai, tampilkan tombol "Selesai" -->
                                    @if (!$task->is_completed)
                                        <div class="card-footer">
                                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-secondary w-100">
                                                    <span class="d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-check fs-5"></i>
                                                        Selesai
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                        <!-- Tombol untuk menambahkan tugas baru ke dalam list -->
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                            data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-plus fs-5"></i>
                                Tambah
                            </span>
                        </button>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <!-- Menampilkan jumlah tugas yang ada di list -->
                        <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
                    </div>
                </div>
            @endforeach
            <!-- Tombol untuk menambahkan list baru -->
            <button type="button" class="btn btn-outline-secondary flex-shrink-0" style="width: 16rem; height: fit-content; margin-left: 1rem; margin-right: 1rem;"
                data-bs-toggle="modal" data-bs-target="#addListModal">
                <span class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-plus fs-5"></i>
                    Tambah
                </span>
            </button>
        </div>
    </div>
</div>

<script>
    // Fungsi pencarian berdasarkan nama atau deskripsi tugas
    document.getElementById('search-input').addEventListener('input', function (e) {
        const searchText = e.target.value.toLowerCase();
        const cards = document.querySelectorAll('.card');
        
        cards.forEach(function (card) {
            const taskName = card.querySelector('.card-title') ? card.querySelector('.card-title').textContent.toLowerCase() : '';
            const taskDescription = card.querySelector('.card-text') ? card.querySelector('.card-text').textContent.toLowerCase() : '';

            // Menyembunyikan card jika tidak sesuai pencarian
            if (taskName.includes(searchText) || taskDescription.includes(searchText)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>

@endsection
