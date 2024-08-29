<x-layouts.master>
    <div class="card col-10 col-md-8 col-lg-5 p-3 shadow-sm text-start">
        <p class="h3 text-success-emphasis fw-bold mb-3 text-center">Create Contact</p>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" maxlength="15"
                    value="{{ old('phone') }}">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div>
            <button type="submit" class="btn btn-success col-12 col-md-6 col-xl-4" id="addBtn"
                onclick="createContact()">Create
                Contact</button>
        </div>

    </div>
    <script>
        async function createContact() {
            let name = $("#name").val();
            let email = $("#email").val();
            let phone = $("#phone").val();
            let address = $("#address").val();

            let data = {
                name,
                email,
                phone,
                address
            };

            try {
                showLoader();
                let response = await axios.post(`/contacts/`, data);
                hideLoader();
                if (response.status === 200) {
                    successToast(response.data.message);
                    setTimeout(() => {
                        window.location.href = "/contacts";
                    }, 2000);
                }
            } catch (error) {
                errorToast(error.response.data.message);
            } finally {
                hideLoader();
            }
        }
    </script>
</x-layouts.master>
