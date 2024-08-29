 <script>
     const tableBody = document.querySelector('tbody');

     async function getList() {
         const response = await axios.get('/api');
         const contacts = response.data;

         let tableData = $('#tableData');
         tableData.DataTable().destroy();
         let tableList = $('#tableList');
         tableList.empty();

         contacts.forEach((contact, index) => {
             let tr = `
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td>${contact.name}</td>
                        <td>${contact.email}</td>
                        <td>${contact.phone}</td>
                        <td>${contact.address}</td>
                        <td>
                            <div class="d-flex gap-2 justify-content-evenly">
                                <button type="button" class="btn btn-primary border-0 rounded fw-semibold px-4 py-2"
                                    id="showBtn" data-bs-toggle="modal" data-bs-target="#contactInfo-modal"
                                    onclick="userCard(${contact.id})">
                                    <i class="fa text-sm fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-warning border-0 rounded fw-semibold px-4 py-2"
                                    id="editBtn" data-bs-toggle="modal" data-bs-target="#edit-modal" onclick="editCard(${contact.id})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="submit" class="btn btn-danger border-0 rounded fw-semibold px-3 py-2"
                                    id="deleteBtn" data-bs-toggle="modal" data-bs-target="#delete-modal"
                                    data-value="${contact.id}" onclick="itemDelete(this)">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    `;
             tableList.append(tr);
         });

         tableData.DataTable({
             order: [
                 [0, 'asc']
             ],
             lengthMenu: [10, 20, 30],
         });
     }
 </script>
