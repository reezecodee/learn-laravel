<x-layouts.app :title="$title">
    <h2 class="text-2xl font-bold mb-7">Create</h2>
    <form action="{{ route('sr.create') }}" method="post" class="mb-10">
        @csrf
        <div class="grid grid-cols-2 gap-3 mb-3">
            <input type="text" name="title" placeholder="Judul postingan" class="input input-bordered w-full" />
            <select name="status" class="input input-bordered w-full" id="">
                <option value="" selected>Pilih status</option>
                <option value="Publik">Publik</option>
                <option value="Privasi">Privasi</option>
            </select>
        </div>
        <textarea name="konten" class="textarea textarea-bordered w-full" placeholder="Konten postingan..."></textarea>
        <div class="flex justify-end mt-5">
            <button class="btn btn-primary">Posting</button>
        </div>
    </form>
    <h2 class="text-2xl font-bold mb-7">Read</h2>
    <div class="overflow-x-auto w-full">
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Isi Konten</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $item)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->konten }}</td>
                    <td>
                        <div class="flex gap-4">
                            <button class="btn btn-sm btn-primary"
                                onclick="my_modal_{{ $item->id }}.showModal()">Edit</button>
                            <form method="post" action="{{ route('sr.delete', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-error" type="submit"
                                    onclick="alert('Yakin ingin menghapus post ini?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <dialog id="my_modal_{{ $item->id }}" class="modal">
                    <div class="modal-box">
                        <form method="post" action="{{ route('sr.update', $item->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-2 gap-3 mb-3">
                                <input type="text" name="title" value="{{ $item->title }}" placeholder="Judul postingan"
                                    class="input input-bordered w-full" />
                                <select name="status" class="input input-bordered w-full" id="">
                                    <option value="{{ $item->status }}" selected>{{ $item->status }}</option>
                                    <option value="Publik">Publik</option>
                                    <option value="Privasi">Privasi</option>
                                </select>
                            </div>
                            <textarea name="konten" class="textarea textarea-bordered w-full"
                                placeholder="Konten postingan...">{{ $item->konten }}</textarea>
                            <div class="flex justify-end mt-3">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                        <div class="modal-action">
                            <form method="dialog">
                                <button class="btn btn-error">Close</button>
                            </form>
                        </div>
                    </div>
                </dialog>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>