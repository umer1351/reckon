
<?php require 'templates/header.php';

     $sql_panel = "SELECT * FROM sku_codes;";
    $query_panel = mysqli_query($link,$sql_panel);
 ?>

    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
        <p class="float-right">
            <a href="logout.php" class="btn btn-danger"><i class='fas fa-sign-out-alt'></i> Logout</a>

            <?php  if($_SESSION['role'] == 1) { ?>
                <a href="index.php" class="btn btn-warning"><i class='fas fa-user'></i>Users</a>
            <?php } ?>
        </p>
    </nav>
    <div class="container">
        <h1 class="text-center">Roof Specs</h1>
        <div class="text-left"><img src="uploads/small-logo.png" ></div>
        <br/>
     <div class="row">
        <!-- Form for calculations -->
        <div class="col-md-5">
            <!-- <form id="calculationForm"> -->
                <div class="form-group">
                    <input type="text" class="form-control" id="company" placeholder="Company Name" name="company" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="jobName" placeholder="Job Name" name="jobName" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Job Address" id="jobAddress" name="jobAddress" required>
                </div>
                
                <div class="form-group">
                    <input type="number" placeholder="Size Of Roof" class="form-control" value="2000" id="sizeOfRoof" name="input2" required>
                </div>
                <div class="form-group">
                    <select class="form-control" id="panel_profile" name="panel_profile" required>
                        <option value="">Panel Profile</option>
                        <?php
                        $sql_sku = "SELECT * FROM sku_codes";

                        $result_sku = $link->query($sql_sku);
                        while ($row_sku = $result_sku->fetch_assoc()) { ?>
                          <option value="<?php echo $row_sku['size'] ?>" data-combined="<?php echo $row_sku['combined_shortcode'] ?>"><?php echo $row_sku['name'] ?></option>  
                        <?php } ?>  
                        
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="waste_factors" name="waste_factors" required>
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
                    <select class="form-control" id="guage" name="guage" required>
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
                    <select class="form-control" id="paints" name="paints" required>
                        <option value="">Paint</option>
                        <?php
                        $sql_paint = "SELECT * FROM paints";

                        $result_paint = $link->query($sql_paint);
                        while ($row_paint = $result_paint->fetch_assoc()) { ?>
                          <option value="<?php echo $row_paint['code'] ?>" data-paint="<?php echo $row_paint['id'];?>" ><?php echo $row_paint['name'] ?></option>  
                        <?php } ?> 
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="colors" name="colors" required>
                        <option value="">Color</option>
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
                
                <!-- <div class="row">
                    <div class="form-group col-3">
                        <div class="form-group">
                            <label for="input1">Trim</label>
                        </div>
                    </div>
                    <div class="form-group col-3">
                        <div class="form-group">
                            <label for="input1">Linear ft</label>
                            <input type="text" class="form-control" id="" name="jobAddress" value ="60" required>
                            <input type="text" class="form-control" id="" name="jobAddress" required>
                            <input type="text" class="form-control" id="" name="jobAddress" value = "120" required>
                            <input type="text" class="form-control" id="" name="jobAddress" value = "30" required>
                            <input type="text" class="form-control" id="" name="jobAddress" value = "40" required>
                            <input type="text" class="form-control" id="" name="jobAddress" value = "20" required>
                            <input type="text" class="form-control" id="" name="jobAddress" value = "30" required>
                            <input type="text" class="form-control" id="" name="jobAddress" value = "40" required>

                        </div>
                    </div>
                    <div class="form-group col-2">
                        <div class="form-group">
                            <label for="input1">Type</label>
                        </br>
                            <label for="input1">Ridge</label>
                            </br>
                            <label for="input1">Hip</label>
                            </br>
                            </br>
                            <label for="input1">Eave</label>
                            <label for="input1">Valley</label>
                            <label for="input1">Rake</label>
                            <label for="input1">Endwall/Flashing</label>
                            </br>

                            <label for="input1">Sidewall/Step Flashing</label>
                            <label for="input1">Transition</label>
                        </div>
                    </div>
                </div> -->
                
                <button id="displayDataBtn" class="btn btn-primary">Calculate</button>
            <!-- </form> -->
        </div>

        <!-- Table for calculations listing -->
        <div class="col-md-7">
            <div class="form-group row justify-content-center">
                <p id="companyNameP"></p>
            </div>
            <div class="form-group row justify-content-center">
                <p id="jobNameP"></p>
            </div>
            <div class="form-group row justify-content-center">
                <p id="jobAddressP"></p>
            </div>
            <div class="form-group ">
                <p class="justify-content-left">Today is: <?php echo date('m/d/y'); ?></p>
                <p class="justify-content-right">Effective Price Date: <?php echo '2/29/24'; ?></p>
            </div>
                
            

            <table id="calculationTable" class="table table-bordered table-striped table-hover">
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
                    <tr><td></td><td></td><td></td><td></td><td></td></tr>
                    <!-- Calculation results will be populated here -->
                </tbody>
            </table>
        </div>
    </div>
    <?php  if($_SESSION['role'] == 1) { ?>
    <div class="text-right"><a href="create.php" class="btn btn-success mb-2"><i class='fas fa-plus'></i> Add profile panel</a></div>

       

        <table class="table table-bordered table-striped table-hover" id="profile_panel">
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
                            <a href="update.php?id=<?php echo $row['id'] ?>" class="text-dark"><i class='fas fa-edit'></i>Update</a>&nbsp;&nbsp;
                            <a href="delete.php?id=<?php echo $row['id'] ?>" class="text-dark"><i class='fas fa-trash'></i>Delete</a>
                        </td>
                    </tr>
                <?php }} ?>
            </tbody>
        </table>  
    <?php } ?>
    </div>
<script type="text/javascript">
    $(document).ready( function () {
        $('#profile_panel').DataTable({
            pageLength : 5
        });
    } );
    
        var companyName = document.getElementById("company");
        var jobName = document.getElementById("jobName");
        var jobAddress = document.getElementById("jobAddress");
        var companyNameP = document.getElementById("companyNameP");
        var jobNameP = document.getElementById("jobNameP");
        var jobAddressP = document.getElementById("jobAddressP");
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
            jobAddressP.textContent = jobAddress.value;

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

       

        document.getElementById("displayDataBtn").addEventListener("click", function() {
            var profilePanel = document.getElementById('panel_profile');
            var selectedOptionProfilePanel = profilePanel.options[profilePanel.selectedIndex];
            var selectedValueProfilePanel = selectedOptionProfilePanel.value;
            var selectedCombinedProfilePanel = selectedOptionProfilePanel.getAttribute('data-combined');
            var va = selectedValueProfilePanel/12;
            var request =  sizeOfRoof.value / va;
            var digitsOnly = parseInt(request);
            var sku = selectedCombinedProfilePanel+guage.value+color_code.value;
         
         
          $.ajax({
                type: 'POST',
                url: 'php/getRecieptValue.php',
                data: {
                    sku: sku,
                    request: digitsOnly // Assuming 'request' variable contains the request value
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Update the first row with new data
                        var firstRow = $("#dataBody tr:first");
                        
                        // Update the first row with new data
                        firstRow.find("td:nth-child(1)").text(digitsOnly); // Update the request column
                        firstRow.find("td:nth-child(2)").text(sku); // Update the SKU column (if needed)
                        firstRow.find("td:nth-child(3)").text(response.description); // Update the description column
                        firstRow.find("td:nth-child(4)").text(response.price); // Update the price column
                        firstRow.find("td:nth-child(5)").text(response.totalPrice); // Update the total price column
                    } else {
                        // Display an error message if the request fails
                        alert('Failed to fetch price');
                    }
                },
                error: function(error) {
                    alert('Please select all the required fields');
                    // Display an error message if there's an AJAX error
                    console.log('AJAX Error: ' + error);
                }
            });

        });




</script>


<?php require 'templates/footer.php'; ?>