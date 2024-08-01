<x-layouts.home>
    <div class="card col-md-5 text-center p-3 shadow-sm ">
        <p class="h3 text-success-emphasis fw-bold mb-3">Edit Information</p>

        <form action="{{ route('update', $contact->id) }}" method="POST" class="container text-start">
            @method('PUT')
            <div class="row mb-3">
                <div class="col-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $contact->name }}">
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ $contact->email }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" maxlength="15"
                        value="{{ $contact->phone }}">
                </div>
                <div class="col-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                        value="{{ $contact->address }}">
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-warning lg:w-25" id="addBtn">Update Contact</button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.home>
