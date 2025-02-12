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

    public function complete($id) {
        Task::findOrFail($id)->update([
            'is_completed' => true
        ]);

        return redirect()->back();
    }

    public function destroy($id) {
        Task::findOrFail($id)->delete();

        return redirect()->back();
    }
    public function show($id) {
        $task = Task::findOrfail($id); 

        $data = [
            'title' => 'Details',
            'task' => $task,
        ];
        return view('pages.details', $data);
    }
}