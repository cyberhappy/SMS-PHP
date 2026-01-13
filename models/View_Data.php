<!-- Modal -->
<div
    class="modal fade"
    id="View<?= $row['id']?>"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Student Information
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <!-- <div class="container-fluid">Add rows here</div> -->
                 <label>Student ID: <?= strtoupper($row['id']) ?> </label><br>
                 <label>Student Name: <?= strtoupper($row['name']) ?> </label><br>
                 <label>Student Email: <?= strtoupper($row['email']) ?> </label><br>
                 <label>Student Phone: <?= strtoupper($row['phone']) ?> </label><br>


            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
            </div>
        </div>
    </div>
</div>