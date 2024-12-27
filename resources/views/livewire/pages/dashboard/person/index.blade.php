<div>
    @if (session()->has('success'))
    <div class="fixed top-4 right-4 bg-green-500 text-white text-sm font-semibold px-4 py-2 rounded shadow">
        {{ session('success') }}
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex align-items-center mb-3">
                {{-- <a href="{{ route('dashboard.person.create') }}" class="btn btn-success mr-2">Add Person</a> --}}
                <a href="{{ route('dashboard.person.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg" wire:navigate>
                + Add Person
            </a>
            </div>
            <div class="bg-white overflow-hidden shadow-md sm:rounded-sm p-12 mt-12">
                <livewire:person-table />
            </div>
        </div>
    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
    const alert = document.querySelector('.fixed.top-4.right-4');
    if (alert) {
        setTimeout(() => {
            alert.remove();
        }, 3000); // Alert akan hilang setelah 3 detik
    }
});
</script>
