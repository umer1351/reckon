
<div class="text-right">
        
        <a href="create.php" class="btn btn-success mb-2" data-toggle="modal" data-target="#addSkuModal"><i class='fas fa-plus'></i> 

            Add profile panel
        
        </a>
</div>
<div class="table-responsive-sm ">
        <table class="table table-borderless table-striped table-hover " id="profile_panel">
                
                <thead class="bg-dark text-center text-white">
                    <tr>
                        <th>ID</th>
                        <th>Dimensional Name</th>
                        <th>Description</th>
                        <th>code</th>
                        <th>size</th>
                        <th>Combined Shortcode</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody class="text-center">
                    <?php if(mysqli_num_rows($query_panel) == 0){ ?>
                        
                        <tr><td colspan="7" class="text-center">No record found</td></tr>
                    
                    <?php 

                        }else{ 
                    
                    ?>
                       
                        <?php while($row = mysqli_fetch_assoc($query_panel)){ ?>
                        <tr>
                            
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td>
                                <?php echo $row['description'] ?>
                            <td><?php echo $row['code'] ?></td>
                            <td><?php echo $row['size'] ?></td>
                            <td><?php echo $row['combined_shortcode'] ?></td>
                            <td>
                                <a href="#" class="text-dark update-sku" data-id="<?php echo $row['id'] ?>"><i class='fas fa-edit'></i> 

                                    Update

                                </a>
                                &nbsp;&nbsp;
                                 <a href="#" class="text-dark delete-sku" data-id="<?php echo $row['id'] ?>"><i class='fas fa-trash'></i> 
                                    
                                    Delete

                                </a>
                            </td>

                        </tr>
                    <?php }

                    } ?>
                
                </tbody>
        </table> 
</div>