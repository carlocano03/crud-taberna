
<h1><?php $title; ?></h1>
<div class="card">
    <input type="hidden" id="stu_id" value="<?= $student_details['student_id'] ?>">
    <form method="POST" id="updateStudent">
        <a href="<?= base_url('home') ?>"><i class="fa-solid fa-arrow-left"></i> Go back</a>
        <h1>Update Student</h1>
        <input type="text" name="f_name" value="<?= $student_details['f_name'] ?>" placeholder="Firstname">
        <input type="text" name="m_name" value="<?= $student_details['m_name'] ?>" placeholder="Middlename">
        <input type="text" name="l_name" value="<?= $student_details['l_name'] ?>" placeholder="Lastname">

        <button type="submit" name="submitBtn" value="update"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        <button type="submit" name="submitBtn" class="deleteBtn" value="delete"><i class="fa-solid fa-trash"></i> Delete</button>
    </form>

</div>