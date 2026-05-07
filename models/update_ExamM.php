<form action="../public/update_exam.php" method="post">
<div
    class="modal fade"
    id="edit<?= $row['exam_id'] ?>"
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
                    <input type="text" class="form-control" id="" name="student_id" value="<?php echo $row['student_id']; ?>" required placeholder="Enter Student ID" />
                </div>

                <div class="col-md-12 mt-2">
                    <label for="" class="form-label">Course Code</label>
                    <input type="text" class="form-control" id="" name="course_code" value="<?php echo $row['course_code']; ?>" required placeholder="Enter Course Code" />
                </div>

                <div class="col-md-12 mt-2">
                    <input type="hidden" name="exam_id" value="<?php echo $row['exam_id']; ?>">
                    <label for="" class="form-label">Course Name</label>
                    <input type="text" class="form-control" id="" name="course_name" value="<?php echo $row['course_name']; ?>" required placeholder="Enter Course Name" />
                </div>

                <div class="col-md-12 mt-2">
                    <label for="" class="form-label">Course Score</label>
                    <input type="text" class="form-control" id="" name="score" value="<?php echo $row['score']; ?>" required placeholder="Enter Course Score" />
                </div>

                <div class="col-md-12 mt-2">
                    <label class="form-label">Semester</label>
                    <select name="semester" class="form-select" required>
                        <option value="">Select Semester</option>

                        <?php
                        $semesters = [
                            "Semester 1","Semester 2","Semester 3",
                            "Semester 4","Semester 5","Semester 6",
                            "Semester 7","Semester 8","Semester 9"
                        ];

                        foreach ($semesters as $sem) {
                            $selected = ($row['semester'] === $sem) ? 'selected' : '';
                            echo "<option value='$sem' $selected>$sem</option>";
                        }
                        ?>
                    </select>
                </div>


                         <!-- Exam Date & Time -->
                        <div class="col-md-12 mt-2">
                            <label class="form-label">Exam Date & Time</label>
                            <input
                                type="datetime-local"
                                class="form-control"
                                name="exam_date"
                                value="<?php echo date('Y-m-d\TH:i', strtotime($row['exam_date'])); ?>"
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
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            </div>
        </div>
    </div>
</div>