<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="no_staf" class="block text-gray-700 font-bold mb-2">No. Staff</label>
                            <input type="text" name="no_staf" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" minlength="8" maxlength="8" required>
                        </div>
                        <div class="mb-4">
                            <label for="nama" class="block text-gray-700 font-bold mb-2">Nama</label>
                            <input type="text" name="nama" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" maxlength="255" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-bold mb-2">Emel</label>
                            <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" maxlength="100" required>
                        </div>
                        <div class="mb-4">
                            <label for="jawatan" class="block text-gray-700 font-bold mb-2">Jawatan</label>
                            <input type="text" name="jawatan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" maxlength="244" required>
                        </div>
                        <div class="mb-4">
                            <label for="jantina" class="block text-gray-700 font-bold mb-2">Jantina</label>
                            <select name="jantina" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="" disabled selected>Pilih Jantina</option>
                                <option value="L">Lelaki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="alamat_pejabat" class="block text-gray-700 font-bold mb-2">Alamat Pejabat</label>
                            <input type="text" name="alamat_pejabat" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" >
                        </div>
                        <div class="mb-4">
                            <label for="no_telefon_mobil" class="block text-gray-700 font-bold mb-2">No. Telefon Mobil</label>
                            <input type="text" name="no_telefon_mobil" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" maxlength="20" required>
                        </div>
                        <div class="mb-4">
                            <label for="no_telefon_pejabat" class="block text-gray-700 font-bold mb-2">No. Telefon Pejabat</label>
                            <input type="text" name="no_telefon_pejabat" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" maxlength="20">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="bg-green-500 text-black px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
