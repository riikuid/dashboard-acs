<div>
    @if (session()->has('success'))
        <div class="fixed top-4 right-4 bg-green-500 text-white text-sm font-semibold px-4 py-2 rounded shadow">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex align-items-center mb-3">
                <a href="{{ route('dashboard.person.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg"
                    wire:navigate>
                    + Add Person
                </a>
            </div>
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
                                placeholder="Search by Name" required />

                        </div>

                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <x-column-item columnName="name" :sortField="$sortField" :sortDirection="$sortDirection" />
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <x-column-item label="Type" columnName="user_type" :sortField="$sortField"
                                        :sortDirection="$sortDirection" />
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <x-column-item columnName="status" :sortField="$sortField" :sortDirection="$sortDirection" />
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $person)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $person->name }}</td>
                                    <td class="px-6 py-4">{{ ucfirst($person->user_type) }}</td>
                                    <td class="px-6 py-4 flex">
                                        @if ($person->status === 'Active')
                                            <button wire:click="openModal({{ $person->id }})"
                                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-green-800">
                                                Active
                                            </button>
                                        @else
                                            <div
                                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-red-800">
                                                Expired
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

    <div wire:ignore.self id="timeline-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 z-50 w-full h-full flex justify-center items-center bg-black bg-opacity-50 {{ $showModal ? '' : 'hidden' }}">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Status Details
                    </h3>
                    <button type="button" wire:click="closeModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    @if ($modalData)
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $modalData->name }}
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Status: {{ $modalData->status }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Begin Time: {{ $modalData->begin_time }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            End Time: {{ $modalData->end_time }}
                        </p>
                    @else
                        <p class="text-sm text-gray-600 dark:text-gray-400">Loading...</p>
                    @endif
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
