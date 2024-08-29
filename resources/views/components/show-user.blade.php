<div class="show-modal modal fade animated zoomIn" id="contactInfo-modal" aria-hidden="true"
    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body" id="showDiv">

            </div>
        </div>
    </div>
</div>


<script>
    async function userCard(id) {
        const response = await axios.get(`/contacts/${id}`);
        const contact = response.data;

        const showDiv = document.getElementById('showDiv');
        showDiv.innerHTML = `<div class="card text-center p-3 shadow-sm">
    <img class="card-img-top rounded-circle border border-2 border-danger mx-auto d-block"
        src="{{ asset('attachments/profile-pic.jpg') }}" alt="Profile Picture" style="height: 100px; width: 100px;">
    <div class="card-body">
        <h3 class="text-danger">${contact.name }</h3>
        {{-- <p class="card-text text-muted mb-0">Software Engineer</p> --}}

        <div class="mt-5 mb-5">
            <img src="{{ asset('img/location.png') }}" style=" height: 50px; width: 50px;" alt="Mail" class="me-2">
            <p class="card-text text-muted">${contact.address }</p>
        </div>

        <div class="d-flex flex-column align-items-center ">
            <div class="d-flex align-items-center gap-2  text-danger">
                <img src="{{ asset('img/phone-call.png') }}" style=" height: 20px; width: 20px;" alt="Phone"
                    class="">
                <a href="tel:${contact.phone }}" class="text-decoration-none text-danger">${contact.phone }</a>
            </div>
            <div class="d-flex align-items-center gap-2 text-danger">
                <img src="{{ asset('img/mail.png') }}" style=" height: 25px; width: 25px;" alt="Mail"
                    class="">
                <a href="mailto:${contact.email }}" class="text-decoration-none text-danger">${contact.email }</a>
            </div>

        </div>

    </div>
</div>
`;


    };
</script>
