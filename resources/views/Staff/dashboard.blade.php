<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-lg leading-6 font-medium text-gray-900">Maklumat Staff Terperinci</h1>
                    <div class="flex justify-start ml-10">
                        <table class="w-2/4 mt-4">
                            <tr>
                                <td class="text-gray-600 py-2">No. Staff</td>
                                <td class="text-gray-900 py-2">:{{ $staff->no_staf }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray-600 py-2">Nama</td>
                                <td class="text-gray-900 py-2">:{{ $staff->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray-600 py-2">Emel</td>
                                <td class="text-gray-900 py-2">:{{ $staff->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray-600 py-2">Jawatan</td>
                                <td class="text-gray-900 py-2">:{{ $staff->jawatan }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray-600 py-2">Jantina</td>
                                <td class="text-gray-900 py-2">:{{ $staff->jantina === 'L' ? 'Lelaki' : 'Perempuan' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-600 py-2">No Telefon Mobil</td>
                                <td class="text-gray-900 py-2">:{{ $staff->no_telefon_mobil }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray-600 py-2">No Telefon Pejabat</td>
                                <td class="text-gray-900 py-2">:{{ $staff->no_telefon_pejabat ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray-600 py-2">Alamat Pejabat</td>
                                <td class="text-gray-900 py-2">:{{ $staff->alamat_pejabat ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray-600 py-2"></td>
                                <td class="text-gray-900 py-2"> <a
                                        href="{{ route('staff.edit', Crypt::encrypt($staff->id)) }}"
                                        class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                        Edit
                                    </a></td>
                            </tr>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
