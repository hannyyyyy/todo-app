<!-- Modal untuk Menambah List -->
<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form untuk mengirim data list -->
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content">
            @method('POST') <!-- Tidak diperlukan untuk POST, tetapi tidak menyebabkan error -->
            @csrf <!-- Laravel menambahkan token CSRF secara otomatis untuk perlindungan keamanan -->
            
            <!-- Header Modal -->
            <div class="modal-header bg-danger-subtle">
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1>
                <!-- Tombol untuk menutup modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body bg-secondary">
                <!-- Input untuk nama list -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama list">
                </div>
            </div>

            <!-- Footer Modal -->
            <div class="modal-footer bg-danger-subtle">
                <!-- Tombol untuk membatalkan dan menutup modal -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <!-- Tombol untuk submit form dan menambah list -->
                <button type="submit" class="btn btn-dark">Tambah</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal untuk Menambah Task -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form untuk mengirim data task -->
        <form action="{{ route('tasks.store') }}" method="POST" class="modal-content">
            @method('POST')
            @csrf

            <!-- Header Modal -->
            <div class="modal-header bg-danger-subtle">
                <h1 class="modal-title fs-5" id="addTaskModalLabel">Tambah Task</h1>
                <!-- Tombol untuk menutup modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body bg-secondary">
                <!-- Menyembunyikan ID list (hidden) yang dikirim dengan form -->
                <input type="text" id="taskListId" name="list_id" hidden>

                <!-- Input untuk nama task -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama task">
                </div>

                <!-- Input untuk deskripsi task -->
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi : </label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Masukkan deskripsi kegiatan anda">
                </div>

                <!-- Input untuk memilih priority task -->
                <div class="col-md-12 mb-3">
                    <label for="priority" class="form-label">Priority :</label>
                    <select class="form-control" name="priority" id="taskPriority" required>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                        <option value="low">Low</option>
                    </select>    
                </div>
            </div>

            <!-- Footer Modal -->
            <div class="modal-footer bg-danger-subtle">
                <!-- Tombol untuk membatalkan dan menutup modal -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <!-- Tombol untuk submit form dan menambah task -->
                <button type="submit" class="btn btn-dark">Tambah</button>
            </div>
        </form>
    </div>
</div>
