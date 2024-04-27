<div class="text-right">
            
            <a href="#" class="btn btn-success mb-2" data-toggle="modal" data-target="#addProfileCodeModal">
                
                <i class='fas fa-plus'></i> Add profile Code
            
            </a>
</div>

<div class="table-responsive-sm ">
    <table class="table table-borderless table-striped table-hover" id="profile_panel">
        <thead class="bg-dark text-center text-white">
            <tr>
                <th>ID</th>
                <th>Code Heading</th>
                <th>Code</th>
                <th>Profile Panel Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php if(mysqli_num_rows($result_pc) == 0) { ?>
                
                <tr><td colspan="5" class="text-center">No record found</td></tr>
            
            <?php } else { ?>
                
                <?php while($row_pc = mysqli_fetch_assoc($result_pc)) { ?>
                    <tr>
                        <td><?php echo $row_pc['profile_code_id']; ?></td>
                        <td><?php echo $row_pc['code_heading']; ?></td>
                        <td><?php echo $row_pc['code']; ?></td>
                        <td><?php echo $row_pc['profile_panel_name']; ?></td>
                        <td>
                           
                           <a href="#" class="text-dark update-profile-code" data-id="<?php echo $row_pc['profile_code_id']; ?>" data-toggle="modal" data-target="#updateProfileCodeModal">
                                
                                <i class='fas fa-edit'></i> Update
                            
                            </a>
                            <a href="#" class="text-dark delete-profile-code" data-id="<?php echo $row_pc['profile_code_id']; ?>">
                                
                                <i class='fas fa-trash'></i> Delete
                            
                            </a>

                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>