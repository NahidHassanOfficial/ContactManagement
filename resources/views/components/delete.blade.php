 <div class="delete-modal modal fade animated zoomIn" id="delete-modal" aria-hidden="true"
     aria-labelledby="exampleModalToggleLabel" tabindex="-1">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header d-none">
                 <button type="button" id="delete-modal-close" class="btn-close" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div class="modal-body text-center">
                 <h3 class=" mt-3 text-danger">Delete !</h3>
                 <p class="mb-3">Once delete, you can't get it back.</p>
                 <input class="d-none" id="deleteID" />
             </div>
             <div class="modal-footer justify-content-end">
                 <div>
                     <button type="button" id="delete-modal-close" class="btn btn-success mx-2"
                         data-bs-dismiss="modal">Cancel</button>
                     <button type="button" id="confirmDelete" class="btn btn-danger">Delete</button>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script>
     function itemDelete(button) {
         document.getElementById('confirmDelete').onclick = async function() {
             try {
                 let contactId = button.getAttribute('data-value');
                 showLoader();
                 let res = await axios.delete(`/contacts/${contactId}`)
                 hideLoader();
                 if (res.status === 200) {
                     await getList();
                     $("#delete-modal-close").click();
                     successToast("Request completed")
                 }
             } catch (error) {
                 errorToast("Request fail!");
             }
         };
     }
 </script>
