
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {!! __('Person &raquo; Create') !!}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-md sm:rounded-sm p-12">
                    @if ($errors->any())
                        <div class="mb-5" role="alert">
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                There's something wrong!
                            </div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                <p>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </p>
                            </div>
                        </div>
                    @endif
                    <form wire:submit="store" class="w-full">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <x-label required="true" for="name">Full Name</x-label>
                                <x-input name="form.name" id="name" type="name" placeholder="ex: John Doe" required/>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <x-label for="user_type" required="true">Type</x-label>

                                <select wire:model="form.user_type" name="user_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="user_type" required>
                                    <option value="" selected>Select User Type</option>
                                    @foreach ($types as $type)
                                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <div class="flex items-center space-x-4 w-full">
                                    <!-- Field Mulai -->
                                    <div class="flex-1">
                                        <x-label for="start" required="true">Begin Time</x-label>
                                        {{-- <label for="start" class="block tracking-wide text-gray-700 text-xs font-bold"> --}}

                                        {{-- </label> --}}
                                        <input
                                            wire:model="form.begin_time"
                                            id="start"
                                            type="datetime-local"
                                            class="w-full border border-gray-300 rounded-sm shadow-sm focus:ring-purple-500 focus:border-purple-500 text-gray-700 text-sm px-3 py-2"
                                            name="start_date"
                                            max="2037-12-31T23:59"
                                            value=""
                                            required
                                        />
                                    </div>

                                    <!-- Garis Pemisah -->
                                    <div class="h-full w-px bg-gray-300 mx-2"></div>

                                    <!-- Field Berakhir -->
                                    <div class="flex-1">
                                        <x-label for="end" required="true" for="form.end_time">End Time</x-label>
                                        <input
                                        wire:model="form.end_time"
                                            id="end"
                                            type="datetime-local"
                                            class="w-full border border-gray-300 rounded-sm shadow-sm focus:ring-purple-500 focus:border-purple-500 text-gray-700 text-sm px-3 py-2"
                                            name="end_date"
                                            max="2037-12-31T23:59"
                                            value=""
                                        />
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <x-label for="note">Note</x-label>
                                <x-input name="form.note" id="note" type="name" />
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 text-right">
                                <button type="submit" class=" shadow-lg shadow-purple-300 bg-purple-500 hover:bg-purple-600 text-white text-sm font-bold py-2 px-4 rounded-sm">
                                Save Person
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

