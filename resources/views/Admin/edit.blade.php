<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.update', $staff->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="no_staf" class="block text-gray-700 font-bold mb-2">No. Staff</label>
                            <input type="text" name="no_staf" value="{{ $staff->no_staf }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" minlength="8" maxlength="8" required>
                        </div>
                        <div class="mb-4">
                            <label for="nama" class="block text-gray-700 font-bold mb-2">Nama</label>
                            <input type="text" name="nama" value="{{ $staff->nama }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"  maxlength="255" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-bold mb-2">Emel</label>
                            <input type="email" name="email" value="{{ $staff->email }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"   maxlength="100" required>
                        </div>
                        <div class="mb-4">
                            <label for="jawatan" class="block text-gray-700 font-bold mb-2">Jawatan</label>
                            <input type="text" name="jawatan" value="{{ $staff->jawatan }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"  maxlength="244" required>
                        </div>
                        <div class="mb-4">
                            <label for="jantina" class="block text-gray-700 font-bold mb-2">Jantina</label>
                            <select name="jantina" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="L" {{ $staff->jantina === 'L' ? 'selected' : '' }}>Lelaki</option>
                                <option value="P" {{ $staff->jantina === 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="no_telefon_mobil" class="block text-gray-700 font-bold mb-2">No. Telefon Mobil</label>
                            <input type="text" name="no_telefon_mobil" value="{{ $staff->no_telefon_mobil }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"  maxlength="20" required>
                        </div>
                        <div class="mb-4">
                            <label for="no_telefon_pejabat" class="block text-gray-700 font-bold mb-2">No. Telefon Pejabat</label>
                            <input type="text" name="no_telefon_pejabat" value="{{ $staff->no_telefon_pejabat }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"  maxlength="20">
                        </div>
                        <div class="mb-4">
                            <label for="alamat_pejabat" class="block text-gray-700 font-bold mb-2">Alamat Pejabat</label>
                            <textarea name="alamat_pejabat" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $staff->alamat_pejabat }}</textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Kemaskini</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
