
<?php require 'templates/header.php';

    $sql_panel = "SELECT * FROM sku_codes;";
    $query_panel = mysqli_query($link,$sql_panel);

    $sql_user = "SELECT * FROM users where id = ".$_SESSION['id']."";
    $query_user = mysqli_query($link,$sql_user);
    $row_user = mysqli_fetch_assoc($query_user);

    $sql_pc = "SELECT pc.id AS profile_code_id, pc.code_heading, pc.code, pp.name AS profile_panel_name
        FROM profile_codes pc
        JOIN sku_codes pp ON pc.profile_panel_id = pp.id";
    $result_pc = mysqli_query($link, $sql_pc);

// Fetch profile panels for the "Add profile panel" button

 ?>

    <nav class="d-none navbar navbar-expand-sm bg-secondary navbar-dark">
        <p class="float-right">
            <a href="logout.php" class="btn btn-danger"><i class='fas fa-sign-out-alt'></i> Logout</a>

            <?php  if($_SESSION['role'] == 1) { ?>
                <a href="index.php" class="btn btn-warning"><i class='fas fa-user'></i>Users</a>
            <?php } ?>
        </p>
    </nav>
    <div class="container-fluid primary-background">
     
     <div class="row">
        <!-- Form for calculations -->
        <div class="secondary-background col-sm-4 p-md-5 p-5  ">

        <div class="mx-auto m-5 col-md-12"><img class=" col-md-10"src="uploads/logo-instaquoter.png" ></div>
            
            
            
              <!-- Carousel Markup -->
    <div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="false" >
        
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
        <li data-target="#carouselExampleControls" data-slide-to="2"></li>

        <!-- Add more list items for additional slides -->
    </ol>

        <div class="carousel-inner">
            <div class="carousel-item active ">
                <!-- Form Inputs - Slide 1 -->
               
                     <h4 class="justify-content-left secondary-heading mb-md-3 fs-5"> <span class="form-steps">Step 1:</span> Client Information </h4>
            
            <!-- <form id="calculationForm"> -->
                <div class="form-group">
                    <input type="text" class="form-control primary-background border-0" id="company" placeholder="Company Name" name="company" value="<?php echo  $row_user['company']; ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control primary-background border-0" id="jobName" placeholder="Job Name" name="jobName" value="<?php echo  $row_user['job']; ?>" readonly >
                </div>
                <div class="form-group">
                    <input type="text" class="form-control primary-background border-0" placeholder="Job Address" id="jobAddress" value="<?php echo  $row_user['address']; ?>" name="jobAddress"readonly >
                </div>
                <div class="form-group">
                    <input type="text" class="form-control primary-background border-0" placeholder="City" id="City" name="City" value="<?php echo  $row_user['city']; ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control primary-background border-0" placeholder="State" id="State" name="State" value="<?php echo  $row_user['state']; ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control primary-background border-0" placeholder="Zip" id="Zip" name="Zip" value="<?php echo  $row_user['zip']; ?>" readonly>
                </div>
                <div class="form-group">
                    <textarea type="text" readonly class="form-control primary-background border-0" placeholder="Notes" id="Notes" name="Notes" ></textarea> 
                </div>
                
            </div>
            <div class="carousel-item">
                <!-- Form Inputs - Slide 2 -->
                  <h4 class="justify-content-left secondary-heading mb-md-3 fs-5"> <span class="form-steps">STEP 2:</span> ROOF PANEL AND FINISH</h4>

                       <div class="form-group">
                    <input type="number" placeholder="Size Of Roof" class="form-control primary-background border-0" value="2000" id="sizeOfRoof" name="input2" required>
                </div>
                <div class="form-group">
                    <select class="form-control primary-background border-0" id="panel_profile" name="panel_profile" required>
                        <option value="">Panel Profile</option>
                        <?php
                        $sql_sku = "SELECT * FROM sku_codes";

                        $result_sku = $link->query($sql_sku);
                        while ($row_sku = $result_sku->fetch_assoc()) { ?>
                          <option value="<?php echo $row_sku['size'] ?>" data-id="<?php echo $row_sku['id'] ?>" data-combined="<?php echo $row_sku['combined_shortcode'] ?>"><?php echo $row_sku['name'] ?></option>  
                        <?php } ?>  
                        
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control primary-background border-0" id="waste_factors" name="waste_factors" required>
                        <option value="">Waste Factor</option>
                        <?php
                        $sql_waste = "SELECT * FROM waste_factors";

                        $result_waste = $link->query($sql_waste);
                        while ($row_waste = $result_waste->fetch_assoc()) { ?>
                          <option value="<?php echo $row_waste['id'] ?>" ><?php echo $row_waste['percentage'] ?>%</option>  
                        <?php } ?> 
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control primary-background border-0" id="guage" name="guage" required>
                        <option value="">ga/thickness</option>
                        <?php
                        $sql_guage = "SELECT * FROM guages";

                        $result_guage = $link->query($sql_guage);
                        while ($row_guage = $result_guage->fetch_assoc()) { ?>
                          <option value="<?php echo $row_guage['guage'] ?>" ><?php echo $row_guage['guage'] ?></option>  
                        <?php } ?> 
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control primary-background border-0" id="paints" name="paints" required>
                        <option value="" >Paint</option>
                        <?php
                        $sql_paint = "SELECT * FROM paints";

                        $result_paint = $link->query($sql_paint);
                        while ($row_paint = $result_paint->fetch_assoc()) { ?>
                          <option value="<?php echo $row_paint['code'] ?>" data-paint="<?php echo $row_paint['id'];?>" ><?php echo $row_paint['name'] ?></option>  
                        <?php } ?> 
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control primary-background border-0" id="colors" name="colors" required>
                        <option value="AGK" data-color-code="AGK">Color</option>
                        <!-- Color options will be dynamically populated here -->
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label for="dropdown">Vented Ridge</label>
                    <select class="form-control" id="ventedRidge" name="ventedRidge" required>
                         <?php
                        $sql_vent = "SELECT * FROM vented_ridges";

                        $result_vent = $link->query($sql_vent);
                        while ($row_vent = $result_vent->fetch_assoc()) { ?>
                          <option value="<?php echo $row_vent['id'] ?>" ><?php echo $row_vent['name'] ?></option>  
                        <?php } ?> 
                    </select>
                </div>
                <div class="form-group">
                    <label for="dropdown">Fastner Type </label>
                    <select class="form-control" id="fastnerType" name="fastnerType" required>
                        <?php
                        $sql_fastner = "SELECT * FROM fastner_types";

                        $result_fastner = $link->query($sql_fastner);
                        while ($row_fastner = $result_fastner->fetch_assoc()) { ?>
                          <option value="<?php echo $row_fastner['id'] ?>" ><?php echo $row_fastner['name'] ?></option>  
                        <?php } ?> 
                    </select>
                </div> -->
                
                
                
                
            </div>
            <div class="carousel-item">
                <!-- Form Inputs - Slide 3 -->
                  <h4 class="justify-content-left secondary-heading mb-md-3 fs-5"> <span class="form-steps">STEP 3:</span> TRIM</h4>

            
                
                <div class="form-group">
                    <select class="form-control primary-background border-0" id="ventedRidge" name="ventedRidge" required>
                        <option value="1">Vented Ridge</option>
                         <?php
                        $sql_vent = "SELECT * FROM vented_ridges";

                        $result_vent = $link->query($sql_vent);
                        while ($row_vent = $result_vent->fetch_assoc()) { ?>
                          <option value="<?php echo $row_vent['id'] ?>" ><?php echo $row_vent['name'] ?></option>  
                        <?php } ?> 
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control primary-background border-0" id="fastnerType" name="fastnerType" required>
                        <option value="1">Fastner Type</option>
                        <?php
                        $sql_fastner = "SELECT * FROM fastner_types";

                        $result_fastner = $link->query($sql_fastner);
                        while ($row_fastner = $result_fastner->fetch_assoc()) { ?>
                          <option value="<?php echo $row_fastner['id'] ?>" ><?php echo $row_fastner['name'] ?></option>  
                        <?php } ?> 
                    </select>
                </div>
                
                
                        <div class="form-group">
                            <label for="input1" class="justify-content-left secondary-heading form-steps " >Insert Trim Lengths</label>
                        <div class="insert_trim_length">
                            <div class="trims_length">
                            <input type="text" class="form-control primary-background border-0" id="ridge" name="jobAddress" value ="" placeholder="Ridge Cap" required >
                       
                            <input type="text" class="form-control primary-background border-0" id="hip" name="jobAddress" value ="" placeholder="Hip Cap" required>
                            </div>
                            

                            <div class="trims_length">
                            <input type="text" class="form-control primary-background border-0" id="eave" name="jobAddress" value = "" placeholder="Eave Drip" required>
                            
                            <input type="text" class="form-control primary-background border-0" id="valley" name="jobAddress" value = "" placeholder="Valley Flashing" required>
                            </div>

                            <div class="trims_length">
                            <input type="text" class="form-control primary-background border-0" id="rake" name="jobAddress" value = "" placeholder="Gable Rake" required>
                            
                            <input type="text" class="form-control primary-background border-0" id="endwall" name="jobAddress" value = "" placeholder="Endwall Flashing" required>
                            
                            </div>

                            <div class="trims_length">
                            <input type="text" class="form-control primary-background border-0" id="flashing" name="jobAddress" value = "" placeholder="Sidewall Flashing" required>
                            
                            <input type="text" class="form-control primary-background border-0" id="transition" name="jobAddress" value = "" placeholder="Transition" required>
                            </div>
                        </div>
                        </div>
                  
                    
                
                
                <!-- <button id="displayDataBtn" class="btn btn-primary">Calculate</button> -->
               <button id="displayDataBtn" class="btn btn-primary" >Calculate</button>

            </div>
        </div>




        <!-- Carousel Controls -->
        <a class="carousel-control-prev" href="#carouselExampleControls" data-slide="prev" >
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
    </div>
            
            
                
             
            <!-- </form> -->
    <div class="mx-auto mt-md-5 col-md-10 "><img src="uploads/logo-pmr.svg" ></div>
        </div>

        <!-- Table for calculations listing -->
        <div class="col-sm-8 p-md-5 p-3 ">
        <div class="mx-auto m-5 row"><img src="uploads/<?php echo $row_user['logo']; ?>" style="width:200px;" ></div>
 <div class="row mb-2 mt-4" style="height:16px;  background:#343a3f; mb-4">

</div>
    <div class="row p-3">
    
    
        <div class="col-sm-12">
                <p class=" row justify-content-start mb-1 fs-0 date-time" >Today is: <?php echo date('m/d/y'); ?></p>
                <p class=" row justify-content-start nd mb-4 fs-0 date-time">Effective Price Date: <?php echo '2/29/24'; ?></p>
        </div>
        
        <div class="col-sm-6">
           
                <p class=" row justify-content-start mb-1 fs-1 font-weight-bold " id="companyNameP"><?php echo  $row_user['company']; ?></p>
         
           
                <p class=" row justify-content-start mb-1 fs-1 font-weight-bold" id="jobNameP"><?php echo  $row_user['job']; ?></p>
            
        </div>
            
        <div class="col-sm-6">
            
                <p class=" row justify-content-end mb-1 fs-1" id="jobAddressP"><?php echo  $row_user['address']; ?>  <span class=" " id="cityP">, <?php echo  $row_user['city']; ?></span><span class="" id="stateP">, <?php echo  $row_user['state']; ?>,</span></p>
           
          
                <p class=" row justify-content-end mb-1 fs-5"id="zipP"><?php echo  $row_user['zip']; ?></p>
           
        </div>
    
    </div>
           
            <div class="row mb-4 mt-2" style="height:16px;  background:#343a3f; mb-4">

</div>
                
            
<div class="table-responsive-sm">
            <table id="calculationTable" class="table table-borderless table-striped table-hover">
                <thead class="bg-dark text-center text-white">
                    <tr>
                        <th>QTY</th>
                        <th>Item Code</th>
                        <th>Description</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="text-center" id="dataBody">
                    <tr><td></td><td></td><td></td><td></td><td class="price"></td></tr>
                    <!-- Calculation results will be populated here -->
                </tbody>
            </table>
    </div>
            
            
        </div>
    </div>
    <?php  if($_SESSION['role'] == 1) { ?>
    <div class="text-right"><a href="create.php" class="btn btn-success mb-2" data-toggle="modal" data-target="#addSkuModal"><i class='fas fa-plus'></i> Add profile panel</a></div>

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
                <?php }else{ 
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
                             <a href="#" class="text-dark update-sku" data-id="<?php echo $row['id'] ?>"><i class='fas fa-edit'></i> Update</a>
                            &nbsp;&nbsp;
                             <a href="#" class="text-dark delete-sku" data-id="<?php echo $row['id'] ?>"><i class='fas fa-trash'></i> Delete</a>

                        </td>
                    </tr>
                <?php }} ?>
            </tbody>
        </table> 
        </div>
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
    <?php } ?>
   
</div>
<!-- Add SKU Modal -->
<div class="modal fade" id="addSkuModal" tabindex="-1" role="dialog" aria-labelledby="addSkuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSkuModalLabel">Add SKU</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form for adding SKU -->
        <form action="add_sku.php" method="POST">
          <div class="form-group">
            <label for="name">Dimensional Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
          </div>
          <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" name="code" required>
          </div>
          <div class="form-group">
            <label for="size">Size</label>
            <input type="text" class="form-control" id="size" name="size" required>
          </div>
          <!-- Add other necessary fields here -->
          <button type="button" class="btn btn-primary" onclick="addSku(1)">Add SKU</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Update SKU Modal -->
<div class="modal fade" id="updateSkuModal" tabindex="-1" role="dialog" aria-labelledby="updateSkuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateSkuModalLabel">Update SKU</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form for updating SKU -->
        <form action="update_sku.php" method="POST">
          <div class="form-group">
            <label for="update_name">Dimensional Name</label>
            <input type="text" class="form-control" id="update_name" name="update_name" required>
          </div>
          <div class="form-group">
            <label for="update_description">Description</label>
            <input type="text" class="form-control" id="update_description" name="update_description" required>
          </div>
          <div class="form-group">
            <label for="update_code">Code</label>
            <input type="text" class="form-control" id="update_code" name="update_code" required>
          </div>
          <div class="form-group">
            <label for="update_size">Size</label>
            <input type="text" class="form-control" id="update_size" name="update_size" required>
          </div>
          <!-- Add other necessary fields here -->
          <input type="hidden" id="update_id" name="update_id">
          <button type="button" class="btn btn-primary" onclick="updateSku()">Update SKU</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Add Profile Code Modal -->
<div class="modal fade" id="addProfileCodeModal" tabindex="-1" role="dialog" aria-labelledby="addProfileCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProfileCodeModalLabel">Add Profile Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addProfileCodeForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="profile_panel_id">Profile Panel:</label>
                        <select class="form-control" id="profile_panel_id" name="profile_panel_id" required>
                            <option value="" disabled selected>Loading profile panels...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="code_heading">Code Heading:</label>
                        <input type="text" class="form-control" id="code_heading" name="code_heading" required>
                    </div>
                    <div class="form-group">
                        <label for="code">Code:</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Profile Code</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Update Profile Code Modal -->
<div class="modal fade" id="updateProfileCodeModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProfileCodeModalLabel">Update Profile Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateProfileCodeForm">
                <div class="modal-body">
                    <input type="hidden" id="update_profile_code_id" name="profile_code_id">
                    <div class="form-group">
                        <label for="update_profile_panel_id">Profile Panel:</label>
                        <select class="form-control" id="update_profile_panel_id" name="profile_panel_id" required>
                            <!-- Options will be populated dynamically using JavaScript -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="update_code_heading">Code Heading:</label>
                        <input type="text" class="form-control" id="update_code_heading" name="code_heading" required>
                    </div>
                    <div class="form-group">
                        <label for="update_code">Code:</label>
                        <input type="text" class="form-control" id="update_code" name="code" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Profile Code</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="validationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alert!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Please Select all the values to generate results.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
    $('#updateProfileCodeModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var profileCodeId = button.data('id'); // Extract profile code ID from data-id attribute
        $.ajax({
            url: 'php/profileCode/fetchProfilePanels.php',
            method: 'GET',
            success: function(response) {
                $('#update_profile_panel_id').html(response); // Populate dropdown with options
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
        // AJAX request to fetch profile code details
        $.ajax({
            url: 'php/profileCode/getProfileCodeDetails.php?id=' + profileCodeId,
            method: 'GET',
            success: function(response) {
                var profileCode = JSON.parse(response);

                // Populate modal fields with current data
                $('#update_profile_code_id').val(profileCode.id);
                $('#update_profile_panel_id').val(profileCode.profile_panel_id);
                $('#update_code_heading').val(profileCode.code_heading);
                $('#update_code').val(profileCode.code);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    $('#updateProfileCodeForm').submit(function(e) {
        e.preventDefault();
        
        // Collect form data
        var formData = $(this).serialize();

        // AJAX request to update profile code
        $.ajax({
            url: 'php/profileCode/updateProfileCode.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                // Handle success response
                // For example, close the modal and refresh the table
                $('#updateProfileCodeModal').modal('hide');
                location.reload(); // Reload the page to reflect the changes
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });
    });
    });
    $(document).ready(function() {
    $('.delete-profile-code').click(function(e) {
        e.preventDefault();

        var profileCodeId = $(this).data('id');

        if(confirm("Are you sure you want to delete this profile code?")) {
            // AJAX request to delete profile code
            $.ajax({
                url: 'php/profileCode/deleteProfileCode.php',
                method: 'POST',
                data: { profile_code_id: profileCodeId },
                success: function(response) {
                    // Handle success response
                    // For example, reload the page to reflect the changes
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(error);
                    alert("Error deleting profile code. Please try again.");
                }
            });
        }
    });
    });


    $(document).ready(function() {
        $('#addProfileCodeForm').submit(function(e) {
            e.preventDefault();
            
            // Collect form data
            var formData = $(this).serialize();

            // AJAX request to add profile code
            $.ajax({
                url: 'php/profileCode/addProfileCode.php',
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Handle success response
                    // For example, close the modal and refresh the table
                    $('#addProfileCodeModal').modal('hide');
                    location.reload(); // Reload the page to reflect the changes
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(error);
                }
            });
        });
    });

    $(document).ready(function() {
    $('#addProfileCodeModal').on('show.bs.modal', function () {
        // AJAX request to fetch profile panel options
        $.ajax({
            url: 'php/profileCode/fetchProfilePanels.php',
            method: 'GET',
            success: function(response) {
                $('#profile_panel_id').html(response); // Populate dropdown with options
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
    });

    $(document).ready( function () {
        $('#profile_panel').DataTable({
            pageLength : 20
        });
    } );
    
        var companyName = document.getElementById("company");
        var jobName = document.getElementById("jobName");
        var jobAddress = document.getElementById("jobAddress");

        var city = document.getElementById("City");

        var state = document.getElementById("State");
        var zip = document.getElementById("Zip");


        var companyNameP = document.getElementById("companyNameP");
        var jobNameP = document.getElementById("jobNameP");
        var jobAddressP = document.getElementById("jobAddressP");
        var cityP = document.getElementById("cityP");
        var stateP = document.getElementById("stateP");
        var zipP = document.getElementById("zipP");


        var sizeOfRoof = document.getElementById("sizeOfRoof");
        var guage = document.getElementById("guage");
        var paint = document.getElementById("paints");
        var color_code = document.getElementById("colors");

        // Add an input event listener to the input field
        companyName.addEventListener("input", function() {
            // Update the content of the paragraph with the input field value
            companyNameP.textContent = companyName.value;

        });
        jobName.addEventListener("input", function() {
            // Update the content of the paragraph with the input field value
            jobNameP.textContent = jobName.value;

        });
        jobAddress.addEventListener("input", function() {
            // Update the content of the paragraph with the input field value
            jobAddressP.textContent = jobAddress.value + ',';

        });
        city.addEventListener("input", function() {
            // Update the content of the paragraph with the input field value
            cityP.textContent = city.value + ',';

        });
    
        state.addEventListener("input", function() {
            // Update the content of the paragraph with the input field value
            stateP.textContent = state.value + ',';

        });
    
        zip.addEventListener("input", function() {
            // Update the content of the paragraph with the input field value
            zipP.textContent = zip.value;

        });


        $(document).ready(function() {
            $('#paints').change(function() {

            var paint = document.getElementById('paints');
            var selectedPaint = paint.options[paint.selectedIndex];
            var selectedPaintID = selectedPaint.getAttribute('data-paint');
                var paintId = selectedPaintID;
                $.ajax({
                    url: 'php/getPaintColor.php',
                    type: 'POST',
                    data: { paint_id: paintId },
                    dataType: 'json', // Specify JSON as the expected response type
                    success: function(response) {
                        $('#colors').empty(); // Clear previous options
                        $.each(response, function(index, color) {
                            $('#colors').append($('<option>', {
                                value: color.color_code,
                                text: color.color,
                                'data-color-code': color.color_code // Use data attribute to store color code
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

       
 
        // Define a function to handle the AJAX call
async function updateData() {
    var total = 0;
    $('#dataBody').empty();

    try {
        // Process eave
        total += await processComponent('eave', 'ED');

        // Process valley
        total += await processComponent('valley', 'VA');

        // Process end wall
        total += await processComponent('endwall', 'EW');

        // Process rake
        total += await processComponent('rake', 'GR');

        // Process flashing
        total += await processComponent('flashing', 'SW');

        // Process transition
        total += await processComponent('transition', 'TF');

        // Process ridge
        total += await processComponent('ridge', 'RC');

        // Process hip
        total += await processComponent('hip', 'HC');

        // Update total in the UI
        updateTotalInUI(total);
    } catch (error) {
        console.error('Error:', error);
    }
}

async function processComponent(componentId, codeHeading) {
    var userInput = $('#' + componentId).val();
    var qty = (1 + 10 / 100) * (userInput / 10);

    if (userInput) {
        qty = roundNumber(qty);
        var profilePanel = document.getElementById('panel_profile');
        var selectedOptionProfilePanel = profilePanel.options[profilePanel.selectedIndex];
        var selectedDataIdProfilePanel = selectedOptionProfilePanel.getAttribute('data-id');

        try {
            var response = await fetchProfileCode(selectedDataIdProfilePanel, codeHeading);
            if (response.success) {
                var profileCode = response.code;
                var sku = profileCode + guage.value + color_code.value;

                var totalPriceResponse = await fetchReceiptValue(sku, qty);

                if (totalPriceResponse.success) {
                    var totalPrice = parseInt(totalPriceResponse.totalPrice);
                    appendDataRow(qty, sku, totalPriceResponse.description, totalPrice);
                    return totalPrice;
                } else {
                    console.error('Failed to fetch item data for ' + componentId);
                }
            } else {
                console.error('Failed to fetch profile code for ' + componentId);
            }
        } catch (error) {
            console.error('Error:', error);
        }
    }

    return 0;
}

async function fetchProfileCode(profilePanelId, codeHeading) {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'POST',
            url: 'php/getProfileCode.php',
            data: {
                profilePanelId: profilePanelId,
                codeHeading: codeHeading
            },
            dataType: 'json',
            success: resolve,
            error: reject
        });
    });
}

async function fetchReceiptValue(sku, request) {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'POST',
            url: 'php/getRecieptValue.php',
            data: {
                sku: sku,
                request: request
            },
            dataType: 'json',
            success: resolve,
            error: reject
        });
    });
}

function appendDataRow(qty, sku, description, totalPrice) {
    var newRow = '<tr>';
    newRow += '<td>' + qty + '</td>';
    newRow += '<td>' + sku + '</td>';
    newRow += '<td>' + description + '</td>';
    newRow += '<td></td>'; // Price column, to be fetched via AJAX
    newRow += '<td class="price">' + roundToTwoDecimalPlaces(totalPrice) + '</td>';
    newRow += '</tr>';

    $('#dataBody').append(newRow);
}

function updateTotalInUI(total) {
    // setTimeout(function() {
        var newRow = '<tr>';
        newRow += '<td></td>';
        newRow += '<td></td>';
        newRow += '<td></td>';
        newRow += '<td>Total: </td>';
        newRow += '<td class="price">' + total + '</td>';
        newRow += '</tr>';

        $('#dataBody').append(newRow);
    // }, 1500);
}

    




 /*
 function calculateTotal() {
        var totalPrice = 0;
        $('.price').each(function() {
            totalPrice += parseFloat($(this).text());
        });
         $('#total_price').text(totalPrice.toFixed(2));
        //alert(totalPrice);
    }
    
    */
function roundNumber(number) {
        return Math.ceil(parseFloat(number));
    }
    
    $('#displayDataBtn').on('click ', function() {
        var allInputsFilled = true;

        // Check if select elements have values
        $('select').each(function() {
            if ($(this).val() === '') {
                allInputsFilled = false;
                return false; // exit the loop early
            }
        });

        // Check if input elements have values
        // if (allInputsFilled) {
        //     $('input').each(function() {
        //         if ($(this).val() === '') {
        //             allInputsFilled = false;
        //             return false; // exit the loop early
        //         }
        //     });
        // }

        if (allInputsFilled) {
            updateData();
            
        } else {
           // alert();
            // Display modal
            $('#validationModal').modal('show');
        }
    

        
    });
// Bind the function to the change event of the dropdowns and input event of the quantity input field
// $('#panel_profile,#guage, #colors').on('change ', function() {
//     updateData();
// });


        function addSku(e) {
        var name = $('#name').val();
        var description = $('#description').val();
        var code = $('#code').val();
        var size = $('#size').val();

        $.ajax({
            url: 'php/profilePanel/addSku.php',
            method: 'POST',
            data: {
                name: name,
                description: description,
                code: code,
                size: size
            },
            success: function(response) {
                // Handle success response
                // For example, close the modal and refresh the table
                $('#addSkuModal').modal('hide');
                location.reload(); // Reload the page to reflect the changes
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });
    }

    // Function to update SKU using AJAX
    function updateSku() {
        var id = $('#update_id').val();
        var name = $('#update_name').val();
        var description = $('#update_description').val();
        var code = $('#update_code').val();
        var size = $('#update_size').val();

        $.ajax({
            url: 'php/profilePanel/updateSku.php',
            method: 'POST',
            data: {
                id: id,
                name: name,
                description: description,
                code: code,
                size: size
            },
            success: function(response) {
                // Handle success response
                // For example, close the modal and refresh the table
                $('#updateSkuModal').modal('hide');
                location.reload(); // Reload the page to reflect the changes
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });
    }
  
    $(document).ready(function() {
        // Function to handle opening of update modal and fetching SKU details
        $('.update-sku').click(function(e) {
            e.preventDefault();
            var skuId = $(this).data('id');
            $('#update_id').val(skuId); // Set SKU ID in the hidden input field

            // AJAX request to fetch SKU details and populate form fields
            $.ajax({
                url: 'php/profilePanel/getSkuDetails.php?id=' + skuId, // Assuming you have a PHP script to fetch SKU details
                method: 'GET',
                success: function(response) {
                    var sku = JSON.parse(response);
                    $('#update_name').val(sku.name);
                    $('#update_description').val(sku.description);
                    $('#update_code').val(sku.code);
                    $('#update_size').val(sku.size);
                    $('#updateSkuModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });

     $('.delete-sku').click(function(e) {
            e.preventDefault();
            var skuId = $(this).data('id');
            
            // Confirm deletion
            if(confirm("Are you sure you want to delete this SKU?")) {
                // AJAX request to delete SKU
                $.ajax({
                    url: 'php/profilePanel/deleteSku.php',
                    method: 'POST',
                    data: { id: skuId },
                    success: function(response) {
                        // Handle success response
                        // For example, remove the row from the table
                        $('#row_' + skuId).remove();
                        alert('SKU deleted successfully.');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                        alert('Error deleting SKU.');
                    }
                });
            }
        });





</script>


<?php require 'templates/footer.php'; ?>


<script>


    $('.carousel').carousel({
  cycle: false
})
    
    
    function roundToTwoDecimalPlaces(input) {
    // Check if the input is a number
    if (!isNaN(input) && typeof input !== 'boolean') {
        // Convert to a number and round to two decimal places
        return parseFloat(input).toFixed(2);
    } else {
        // Return the original input
        return input;
    }
}
</script>
