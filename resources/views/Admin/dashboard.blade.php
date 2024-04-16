

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end">
                <a href="{{ route('admin.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                    Create New Staff
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="GET" action="{{ route('admin.index') }}">
                        <input type="text" name="search" placeholder="Search ..." value="{{ request('search') }}"
                            class="border rounded p-2 w-3/12">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Search</button>
                        <button type="button"
                            class="bg-amber-200 hover:bg-amber-700 text-black font-bold py-2 px-4 rounded"
                            onclick="window.location='{{ route('admin.index') }}';">Clear</button>
                    </form>
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-center text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        No. Staff
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Nama
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Emel
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listOfStaff as $staff)
                                    <tr class="bg-white border-b">
                                        <td class="py-4 px-6 text-center">
                                            {{ $staff->no_staf }}
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                            {{ $staff->nama }}
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                            {{ $staff->email }}
                                        </td>
                                        </td>
                                        <td class="py-4 px-6 text-center flex justify-center items-center space-x-2">
                                            <a href="{{ route('admin.show', Crypt::encrypt($staff->id)) }}"
                                                class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                                Detail
                                            </a>
                                            <a href="{{ route('admin.edit', Crypt::encrypt($staff->id)) }}"
                                                class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                                Edit
                                            </a>
                                            <button onclick="confirmDelete({{ $staff->id }})"
                                                class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <form id="deleteForm_{{ $staff->id }}"
                                        action="{{ route('admin.destroy', $staff->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $listOfStaff->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(staffId) {
        if (confirm('Anda pasti untuk menghapus data ini?')) {
            document.getElementById('deleteForm_' + staffId).submit();
        }
    }
</script>
