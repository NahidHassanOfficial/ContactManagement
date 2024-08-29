<x-layouts.master>
    <div class="card col-md-10 text-center p-3 shadow-sm overflow-x-scroll">
        <p class="h1 text-success-emphasis fw-bold mb-5">Contact Management</p>

        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="tableData">
                <thead class="table-dark sticky-top">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tableList">
                </tbody>
                {{-- const contacts = @json($contacts); --}}
                <x-tbody></x-tbody>
            </table>
        </div>
    </div>
    {{-- <x-cardRender></x-cardRender> --}}
    <x-show-user></x-show-user>
    <x-edit></x-edit>
    <x-delete></x-delete>

    <script>
        window.addEventListener('load', function() {
            getList();
        });
    </script>
</x-layouts.master>
