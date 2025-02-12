<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{-- form action -> digunakan untuk mengarahkan data ke validasi store --}}
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content">
            @method('POST') <!-- Tidak diperlukan untuk POST, tapi juga tidak menyebabkan error -->
            @csrf <!-- Laravel akan menambahkan input hidden dengan token CSRF -->
            <div class="modal-header bg-danger-subtle">
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-dark">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>
            </div>
            <div class="modal-footer bg-danger-subtle">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-dark">Tambah</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('tasks.store') }}" method="POST" class="modal-content">
            @method('POST')
            @csrf
            <div class="modal-header bg-danger-subtle">
                <h1 class="modal-title fs-5" id="addTaskModalLabel">Tambah Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-dark">
                <input type="text" id="taskListId" name="list_id" hidden>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>
                {{-- mb-3 -> dibuat untuk margin bottom atau memberi jarak agar berjarak / tidak berdempetan --}}
                <div class="mb-3">
                    {{-- label -> elemen yang digunakan untuk memberi informasi tambahan tentang elemen yang akan diinput--}}
                    {{-- form label -> agar tampilan nya sama / seimbang --}}
                    <label for="description" class="form-label">Deskripsi : </label>
                    {{-- input -> untun menampilkan form yang akan diis --}}
                    {{-- class control -> menyamakan ukuran supaya ga acak-acakan --}}
                    <input type="text" class="form-control" id="description" name="description"
                    {{-- placeholder ->atribut dalam input yang memberikan teks petunjuk didalam kolom input --}}
                        placeholder="masukkan deskripsi kegiatan anda">
                </div>
                <div class="col-md-12 mb-3"> 
                    <label for="priority" class="form-label">Priority :</label>
                    {{-- select -> menu drop down yang memungkinkan pengguna memilih satu atau beberapa opsi --}}
                    <select class="form-control" name="priority" id="taskListId" name="list_id" required>
                        {{-- option -> elemen yang digunakan untuk mendefinisikan pilihan atau menu dari drop down select --}}
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                        <option value="low">Low</option>
                    </select>    
                </div>
            </div>
            <div class="modal-footer bg-danger-subtle">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-dark">Tambah</button>
            </div>
        </form>
    </div>
</div>