<?php

namespace App\Http\Controllers;

use App\Models\Task;  //digunakan untuk mengimpor model Task agar bisa digunakan tanpa menuliskan namespace lengkap
use App\Models\TaskList; //digunakan untuk mengimpor model TaskList agar bisa digunakan tanpa menuliskan namespace lengkap
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {  // untuk mengambil data variable yang ada didalam folder models/task
        $data = [   
            'title' => 'Home', //membuat judul untuk tampilan home
            'lists' => TaskList::all(), //untuk mengambil semua data dari model TaskList dan menyimpannya dalam variabel lists
            'tasks' => Task::orderBy('created_at', 'desc')->get(),  //untuk mengambil data dari database dan mengurutkannya berdasarkan waktu pembuatan secara descending (dari yang besar ke kecil)
            'priorities' => Task::PRIORITIES //untuk mengambil nilai konstanta PRIORITIES dari model Task dan menyimpannya dalam variabel priorities yang dikirim ke view atau digunakan dalam kode lain.
        ];

        return view('pages.home', $data); //digunakan dalam Laravel untuk mengembalikan tampilan (view) bernama pages.home sambil mengirimkan data ke tampilan tersebut.
    }

    public function store(Request $request) {  // metode store() dalam Laravel yang digunakan untuk menangani penyimpanan data yang dikirim dari formulir.
        $request->validate([
            'name' => 'required|max:100',
            'list_id' => 'required',
            'description' => 'nullable|max:100',
            'priority' => 'required|in:high,medium,low'
        ]);

        Task::create([  //digunakan untuk menyimpan data ke dalam database menggunakan Eloquent ORM
            'name' => $request->name,
            'list_id' => $request->list_id,
            'description' => $request->description,
            'priority' => $request->priority
        ]);


        return redirect()->back(); //digunakan untuk mengembalikan pengguna ke halaman sebelumnya setelah suatu proses (misalnya penyimpanan data, penghapusan, atau validasi form) selesai
    }

    public function about() {  
        // Membuat array data dengan kunci 'title' dan nilai 'About Me'
        $data = [
            'title' => 'About Me',
        ];
    
        // Mengembalikan tampilan 'pages.about' dan mengirimkan data ke view
        return view('pages.about', $data);
    }
    
    public function complete($id) {
        // Mencari task berdasarkan ID, jika tidak ditemukan akan menghasilkan error 404
        // Lalu memperbarui status tugas menjadi selesai (is_completed = true)
        Task::findOrFail($id)->update([
            'is_completed' => true
        ]);
    
        // Mengembalikan pengguna ke halaman sebelumnya setelah status diperbarui
        return redirect()->back();
    }
    
    public function destroy($id) {
        // Mencari dan menghapus task berdasarkan ID, jika tidak ditemukan akan menghasilkan error 404
        Task::findOrFail($id)->delete();
    
        // Setelah berhasil dihapus, pengguna akan diarahkan ke halaman home
        return redirect()->route('home');
    }
    
    public function show($id)
    {
        // Mengambil task berdasarkan ID dan semua daftar task lists untuk ditampilkan di halaman detail
        $data = [
            'title' => 'Task', // Judul halaman
            'lists' => TaskList::all(), // Mengambil semua daftar tugas
            'task' => Task::findOrFail($id), // Mengambil task berdasarkan ID, jika tidak ditemukan akan error 404
        ];
    
        // Menampilkan halaman detail tugas dengan data yang telah diambil
        return view('pages.details', $data);
    }
    
    public function changeList(Request $request, Task $task)
    {
        // Validasi input, memastikan bahwa list_id yang diberikan ada di tabel task_lists
        $request->validate([
            'list_id' => 'required|exists:task_lists,id',
        ]);
    
        // Memperbarui list_id dari task agar dipindahkan ke daftar tugas lain
        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id
        ]);
    
        // Mengembalikan pengguna ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'List berhasil diperbarui!');
    }
    
    public function update(Request $request, Task $task)
    {
        // Validasi input untuk memastikan data yang dimasukkan valid
        $request->validate([
            'list_id' => 'required', // list_id harus ada dan valid
            'name' => 'required|max:100', // Nama tugas wajib diisi dan maksimal 100 karakter
            'description' => 'max:255', // Deskripsi bersifat opsional, tetapi maksimal 255 karakter
            'priority' => 'required|in:low,medium,high' // Prioritas hanya boleh berisi low, medium, atau high
        ]);
    
        // Memperbarui task dengan data baru yang diberikan oleh pengguna
        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id,
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority
        ]);
    
        // Mengembalikan pengguna ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Task berhasil diperbarui!');
    }
}   