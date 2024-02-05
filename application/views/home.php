<h1><?php $title; ?></h1>

<form method="POST"  class="card" id="addStudent">
    <h1>Add New Student</h1>

    <input type="text" name="f_name" placeholder="Firstname" required> 
    <input type="text" name="m_name" placeholder="Middlename">
    <input type="text" name="l_name" placeholder="Lastname" required>

    <button type="submit"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
</form>

<form method="POST" class="card">
    <table>
        <tr>
            <th colspan='2'>Student Names</th>
        </tr>

        <tbody>
            <?php

            foreach ($student_details as $student) : ?>

                <tr>
                    <td>
                        <p><?php echo $student['f_name'] . ' ' . ($student['m_name'] ? $student['m_name'][0] . '. ': "") . $student['l_name'] ?></p>
                    </td>
                    <td><a href="<?= base_url('view_profile').'/'.$student['student_id'] ?>"><i class="fa-solid fa-pen-to-square"></i> edit</a></td>
                 
                </tr>


            <?php endforeach; ?>
        </tbody>
    </table>
</form>


