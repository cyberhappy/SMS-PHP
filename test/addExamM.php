<form action="../public/insert_exam.php" method="post">
<div
    class="modal fade"
    id="mymodal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Add Student Exam
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <label for="" class="form-label">Student ID</label>
                    <input type="text" class="form-control" id="" name="student_id" value="" required placeholder="Enter Student ID" />
                </div>

                <div class="col-md-12 mt-2">
                    <label for="" class="form-label">Course Code</label>
                    <input type="text" class="form-control" id="" name="course_code" value="" required placeholder="Enter Course Code" />
                </div>

                <div class="col-md-12 mt-2">
                    <label for="" class="form-label">Course Name</label>
                    <input type="text" class="form-control" id="" name="course_name" value="" required placeholder="Enter Course Name" />
                </div>

                <div class="col-md-12 mt-2">
                    <label for="" class="form-label">Course Score</label>
                    <input type="text" class="form-control" id="" name="score" value="" required placeholder="Enter Course Score" />
                </div>

                    <!-- Semester Dropdown -->
                        <div class="col-md-12 mt-2">
                            <label class="form-label">Semester</label>
                            <select name="semester" class="form-select" required>
                                <option value="">Select Semester</option>
                                <option value="Semester 1">Semester 1</option>
                                <option value="Semester 2">Semester 2</option>
                                <option value="Semester 3">Semester 3</option>
                                <option value="Semester 4">Semester 4</option>
                                <option value="Semester 5">Semester 5</option>
                                <option value="Semester 6">Semester 6</option>
                                <option value="Semester 7">Semester 7</option>
                                <option value="Semester 8">Semester 8</option>
                                <option value="Semester 9">Semester 9</option>
                            </select>
                        </div>

                         <!-- Exam Date & Time -->
                        <div class="col-md-12 mt-2">
                            <label class="form-label">Exam Date & Time</label>
                            <input
                                type="datetime-local"
                                class="form-control"
                                name="exam_date"
                                required
                            />
                        </div>



                
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
        </div>
    </div>
</div>