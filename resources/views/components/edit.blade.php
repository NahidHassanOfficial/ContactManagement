    <div class="edit-modal modal fade animated zoomIn" id="edit-modal" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-none">
                    <button type="button" id="edit-modal-close" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body" id="editBlade">

                </div>
            </div>
        </div>
    </div>

    <script>
        async function editCard(id) {
            const response = await axios.get(`/contacts/${id}`);
            const contact = response.data;
            const contactInfoContainer = document.getElementById('editBlade');
            contactInfoContainer.innerHTML = `<p class="h3 text-success-emphasis fw-bold mb-3">Edit Information</p>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="${contact.name}">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="${contact.email}">
                        </div>

                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" maxlength="15"
                                value="${contact.phone}">
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="${contact.address}">
                        </div>

                    </div>
                    <div class="d-flex align-items-end">
                        <button type="submit" class="btn btn-success  col-12 col-md-6 col-xl-4" id="addBtn" onclick="updateinfo(${id})">Update
                            Contact</button>
                    </div>`;
        }


        async function updateinfo(id) {
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
                let response = await axios.put(`/contacts/${id}`, data);
                if (response.status === 200) {
                    successToast(response.data.message);
                    $("#edit-modal-close").click();
                    await getList();
                } else if (response.status === 304) {
                    let msg = "No changes made";
                    successToast(msg);
                }
            } catch (error) {
                hideLoader();
                errorToast(error.response.data.message);
            } finally {
                hideLoader();
            }
        }
    </script>
