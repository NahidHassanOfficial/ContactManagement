<!-- Modal -->
<div class="show-modal modal fade animated zoomIn" id="contactInfo-modal" aria-hidden="true"
    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body" id="showblade">

            </div>
        </div>
    </div>
</div>

<script>
    async function userCard(id) {
        const response = await axios.get(`/contacts/${id}`);
        const contactData = response.data;

        const contactInfoContainer = document.getElementById('showblade');
        contactInfoContainer.innerHTML = '';

        const responseHtml = await axios.post('/render-card', contactData);
        contactInfoContainer.innerHTML = responseHtml.data;
    };
</script>
