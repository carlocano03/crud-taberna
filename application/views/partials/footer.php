<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function() {
        $(document).on('submit', '#addStudent', function(event) {
            event.preventDefault();


            $.ajax({
                url: "<?php echo base_url('crud/add_student') ?>",
                data: new FormData(this),
                contentType: false,
                processData: false,
                type: "POST",
                dataType: "json",
                success: function(response) {
                    if (response.success === 'success') {
                        alert("The student has been successfully added!");
                        window.location.href = "<?php echo base_url('home'); ?>";

                    } else if (response.success === 'failed') {
                        alert("There's an error adding the student.");
                    }
                },
                error: function(response) {
                    alert("Error occured, Please try again later.")
                }
            });

        });

        $(document).on('click', '#updateStudent button', function() {
            submitBtn = $(this).val();
        });
        $(document).on('submit', '#updateStudent', function(event) {
            event.preventDefault();
            var stuId = $('#stu_id').val();

            if (submitBtn === 'update') {
                $.ajax({
                    url: "<?php echo base_url('crud/update_student/') ?>" + stuId,
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    type: "POST",
                    dataType: "json",
                    success: function(response) {
                        if (response.success === 'success') {
                            alert("The student has been successfully updated!");
                        } else if (response.success === 'failed') {
                            alert("There's an error updating the student.");
                        }
                    },
                    error: function(response) {
                        alert("Error occured, Please try again later.")
                    }
                });
            } else {
                if (confirm('Are you sure? This action is permanent')) {
                    $.ajax({
                        url: "<?php echo base_url('crud/delete_student/') ?>" + stuId,
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        type: "POST",
                        dataType: "json",
                        success: function(response) {
                            if (response.success === 'success') {
                                alert("The student has been successfully deleted!");
                                window.location.href = "<?php echo base_url('home'); ?>";
                            } else if (response.success === 'failed') {
                                alert("There's an error deleting the student.");
                            }
                        },
                        error: function(response) {
                            alert("Error occurred. Please try again later.");
                        }
                    });
                } else {
                    console.log("Canceled");
                }

            }


        });



    });
</script>
</body>

</html>