@extends('layouts.app')

@section('content')
<style>
    /* ====== Background Styling dengan Efek Paralaks ====== */
    #content {
        background: url('{{ asset('images/background.jpg') }}') center/cover fixed no-repeat;
        color: white;
        /*  Mengatur teks tombol menjadi warna putih agar kontras dengan latar belakang gradient.*/
        min-height: 100vh;
    }

    /* ====== Efek Glassmorphism pada Card ====== */
    .card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
         /* transition: transform 0.3s ease-in-out; Menambahkan efek transisi halus saat tombol mengalami perubahan (misalnya saat di-hover)*/
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    /* ====== Tombol dengan Bootstrap Gradient & Hover ====== */
    .btn-gradient {
        background: linear-gradient(135deg, #ff7eb3, #ff758c);
       /* Membuat warna latar belakang tombol berupa gradasi dari warna pink cerah (#ff7eb3) ke pink gelap (#ff758c) dengan sudut 135 derajat.*/
        color: white;
      /*  Mengatur teks tombol menjadi warna putih agar kontras dengan latar belakang gradient.*/
        font-weight: bold;
        font-weight: bold;
        /* Membuat teks di dalam tombol menjadi lebih tebal.*/
        transition: transform 0.3s ease-in-out;
    }

    .btn-gradient:hover {
        transform: scale(1.1);
       
        background: linear-gradient(135deg, #ff758c, #ff7eb3);
        
    }

    /* ====== Badge Bootstrap dengan Animasi ====== */
    .badge-animated {
        animation: bounce 1s infinite alternate;
    }

    @keyframes bounce {
        from {
            transform: translateY(0);
        }
        to {
            transform: translateY(-3px);
        }
    }

    /* ====== Tombol Tambah dengan Efek Pulse ====== */
    .btn-add {
        background: linear-gradient(135deg, #42e695, #3bb2b8);
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5em;
        transition: all 0.3s ease-in-out;
        animation: pulse 1.5s infinite;
        border: none;
    }

    .btn-add:hover {
        transform: scale(1.15);
        box-shadow: 0 0 15px rgba(66, 230, 149, 0.5);
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 10px rgba(66, 230, 149, 0.3);
        }
        50% {
            box-shadow: 0 0 20px rgba(66, 230, 149, 0.6);
        }
        100% {
            box-shadow: 0 0 10px rgba(66, 230, 149, 0.3);
        }
    }
</style>
{{-- div -> digunakan untuk membungkus suatu isi konten --}}

    <div id="content" class="overflow-y-hidden overflow-x-hidden bg-danger-subtle">
        @if ($lists->count() == 0)
            <div class="d-flex flex-column align-items-center">
                <p class="fw-bold text-center">Belum ada tugas yang ditambahkan</p>
                {{-- button -> tombol --}}
                <button type="button" class="btn btn-sm d-flex align-items-center gap-2 btn-outline-primary"
                    style="width: fit-content;">
                    <i class="bi bi-plus-square fs-3"></i> Tambah
                </button>
            </div>
        @endif
        <div class="d-flex gap-3 px-3 flex-nowrap overflow-x-scroll overflow-y-hidden" style="height: 100vh;">
             @foreach ($lists as $list) {{--digunakan untuk melakukan iterasi (perulangan) pada suatu array atau koleksi data dalam sebuah tampilan (view) --}}
                <div class="card flex-shrink-0" style="width: 18rem; max-height: 80vh;">
                    <div class="card-header d-flex align-items-center justify-content-between bg-dark text-light">
                        <h4 class="card-title">{{ $list->name }}</h4>
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE') {{-- @method('DELETE') → Laravel akan menangani ini seolah-olah form mengirimkan permintaan DELETE --}}
                            <button type="submit" class="btn btn-sm p-0">
                                <i class="bi bi-trash fs-5 text-danger"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">
                        @foreach ($tasks as $task)
                            @if ($task->list_id == $list->id)
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex flex-column justify-content-center gap-2">
                                                <a href="{{ route('tasks.show', $task->id )}}"
                                                    class="fw-bold lh-1 m-0 {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                                    {{ $task->name }}
                                                </a>
                                                <span class="badge text-bg-{{ $task->priorityClass }} badge-pill"
                                                    style="width: fit-content">
                                                    {{ $task->priority }}
                                                </span> 
                                            </div>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm p-0">
                                                    <i class="bi bi-x-circle text-danger fs-5"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-truncate">
                                            {{ $task->description }}
                                        </p>
                                    </div>
                                    @if (!$task->is_completed)
                                        <div class="card-footer">
                                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-dark w-100">
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
                        <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal"
                            data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-plus fs-5"></i>
                                Tambah
                            </span>
                        </button>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
                    </div>
                </div>
            @endforeach
            <button type="button" class="btn btn-outline-dark flex-shrink-0" style="width: 18rem; height: fit-content;"
                data-bs-toggle="modal" data-bs-target="#addListModal">
                <span class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-plus fs-5"></i>
                    Tambah
                </span>
            </button>
        </div>
    </div>
@endsection
