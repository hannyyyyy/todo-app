<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    /**
     * Menyimpan daftar tugas baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {    
        // Validasi input, memastikan bahwa "name" wajib diisi dan maksimal 100 karakter
        $request->validate([ 
            'name' => 'required|max:100'   
        ]);

        // Membuat daftar tugas baru dengan nama yang diberikan dalam request
        TaskList::create([
            'name' => $request->name
        ]);

        // Redirect kembali ke halaman sebelumnya setelah berhasil menyimpan
        return redirect()->back();
    }

    /**
     * Menghapus daftar tugas berdasarkan ID yang diberikan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id) {
        // Mencari task list berdasarkan ID, jika tidak ditemukan, akan menampilkan error 404
        TaskList::findOrFail($id)->delete();

        // Redirect kembali ke halaman sebelumnya setelah berhasil menghapus
        return redirect()->back();
    }
}
