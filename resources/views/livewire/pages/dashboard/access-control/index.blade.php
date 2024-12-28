<div>
    @if (session()->has('success'))
        <div class="fixed top-4 right-4 bg-green-500 text-white text-sm font-semibold px-4 py-2 rounded shadow">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="d-flex align-items-center mb-3">
                <a href="{{ route('dashboard.item.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg"
                    wire:navigate>
                    + Add item
                </a>
            </div> --}}
            <div class="bg-white overflow-hidden shadow-md sm:rounded-sm p-12 mt-12">
                <div class="relative">
                    <div class="flex mb-6">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search" wire:model.live.debounce.300ms="search"
                                class="block  p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search..." required />

                        </div>

                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <x-column-item columnName="identity" :sortField="$sortField" :sortDirection="$sortDirection" />
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <x-column-item label="IP Address" columnName="ip_address" :sortField="$sortField"
                                        :sortDirection="$sortDirection" />
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <x-column-item label="Status" columnName="is_active" :sortField="$sortField"
                                        :sortDirection="$sortDirection" />
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <x-column-item label="Last Checked" columnName="checked_at" :sortField="$sortField"
                                        :sortDirection="$sortDirection" />
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $item->identity }}</td>
                                    <td class="px-6 py-4">{{ $item->ip_address }}</td>
                                    <td class="px-6 py-4 flex">
                                        @if ($item->is_active === true)
                                            <div
                                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-green-800">
                                                Inactive
                                            </div>
                                        @else
                                            <div
                                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-red-800">
                                                Inactive
                                            </div>
                                        @endif
                                    </td>


                                    <td class="px-6 py-4 text-left">
                                        <a href="#"
                                            class="shadow-md shadow-orange-300  bg-orange-400 hover:bg-orange-600 text-white text-sm font-semibold py-1 px-4 rounded-sm">Edit</a>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center">No data found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-6">
                        {{ $data->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>





<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.querySelector('.fixed.top-4.right-4');
        if (alert) {
            setTimeout(() => {
                alert.remove();
            }, 3000); // Alert akan hilang setelah 3 detik
        }
    });
</script>
