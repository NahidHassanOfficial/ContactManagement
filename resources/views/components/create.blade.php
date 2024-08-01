<x-layouts.home>
    <div class="card col-md-5 text-center p-3 shadow-sm ">
        <p class="h3 text-success-emphasis fw-bold mb-3">Create Contact</p>
        <form action="{{ route('store') }}" method="POST" class="container text-start">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" maxlength="15"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                        value="{{ old('address') }}">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success lg:w-25" id="addBtn">Create Contact</button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.home>
