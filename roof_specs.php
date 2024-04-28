
<?php 
        require 'templates/header.php';
        require 'templates/navbar.php';
        include 'php/roofSpecs.php';

?>
    
<div class="container-fluid primary-background">
    
    <div class="row">

        <div class="secondary-background col-sm-4 p-md-5 p-5  ">
            
            <div class="mx-auto m-5 col-md-12">
                <img class=" col-md-10"src="uploads/logo-instaquoter.png" >
            </div>
                      
            <!-- Carousel Markup -->
            <div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="false" >


            
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                    <li data-target="#carouselExampleControls" data-slide-to="2"></li>
                </ol>



                <div class="carousel-inner">

                    <div class="carousel-item active ">
                        
                        <h4 class="justify-content-left secondary-heading mb-md-3 fs-5"> <span class="form-steps">Step 1:</span> Client Information </h4>
            
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

                        <h4 class="justify-content-left secondary-heading mb-md-3 fs-5"> <span class="form-steps">STEP 2:</span> ROOF PANEL AND FINISH</h4>

                        <div class="form-group">
                            <input type="number" placeholder="Size Of Roof" class="form-control primary-background border-0" value="2000" id="sizeOfRoof" name="input2" required>
                        </div>

                        <div class="form-group">
                            <select class="form-control primary-background border-0" id="panel_profile" name="panel_profile" required>
                                <option value="">Panel Profile</option>
                               
                                    
                                    <?php $sql_sku = "SELECT * FROM sku_codes";
                                    $result_sku = $link->query($sql_sku);
                                    
                                    while ($row_sku = $result_sku->fetch_assoc()) { ?>
                                        
                                        <option value="<?php echo $row_sku['size'] ?>" data-id="<?php echo $row_sku['id'] ?>" data-combined="<?php echo $row_sku['combined_shortcode'] ?>" 
                                            data-screw="<?php echo $row_sku['screw_values'] ?>">

                                            <?php echo $row_sku['name'] ?>
                                            
                                        </option>  
                                    
                                    <?php } ?>  
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control primary-background border-0" id="waste_factors" name="waste_factors" required>
                                    <option value="">Waste Factor</option>
                                
                                    <?php   $sql_waste = "SELECT * FROM waste_factors";

                                        $result_waste = $link->query($sql_waste);

                                        while ($row_waste = $result_waste->fetch_assoc()) { ?>
                                        <option value="<?php echo $row_waste['id'] ?>" >

                                            <?php echo $row_waste['percentage'] ?>%

                                        </option>  
                                    <?php } ?> 
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control primary-background border-0" id="guage" name="guage" required>
                                <option value="">ga/thickness</option>
                                
                                    <?php   $sql_guage = "SELECT * FROM guages";

                                        $result_guage = $link->query($sql_guage);

                                        while ($row_guage = $result_guage->fetch_assoc()) { ?>
                                        <option value="<?php echo $row_guage['guage'] ?>" >

                                            <?php echo $row_guage['guage'] ?>
                                            
                                        </option>  
                                    <?php } ?> 
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control primary-background border-0" id="paints" name="paints" required>
                                <option value="" >Paint</option>
                                
                                    <?php   $sql_paint = "SELECT * FROM paints";

                                        $result_paint = $link->query($sql_paint);
                                        while ($row_paint = $result_paint->fetch_assoc()) { ?>
                                        <option value="<?php echo $row_paint['code'] ?>" data-paint="<?php echo $row_paint['id'];?>" >

                                            <?php echo $row_paint['name'] ?>
                                                
                                        </option>  
                                    <?php } ?> 
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control primary-background border-0" id="colors" name="colors" required>
                                <option value="AGK" data-color-code="AGK">Color</option>
                                <!-- Color options will be dynamically populated here -->
                            </select>
                        </div>

                    </div>
                    <div class="carousel-item">

                      <h4 class="justify-content-left secondary-heading mb-md-3 fs-5"> <span class="form-steps">STEP 3:</span> TRIM</h4>

                
                    
                        <div class="form-group">
                            <select class="form-control primary-background border-0" id="Vented" name="ventedRidge" required>
                                <option value="Vented">Vented Ridge</option>
                                    <?php   $sql_vent = "SELECT * FROM vented_ridges";

                                        $result_vent = $link->query($sql_vent);
                                        while ($row_vent = $result_vent->fetch_assoc()) { ?>
                                       
                                        <option value="<?php echo $row_vent['name'] ?>" >
                                            
                                            <?php echo $row_vent['name'] ?>
                                                
                                        </option>  
                                
                                    <?php } ?> 
                            </select>
                        </div>


                        <div class="form-group">
                            <select class="form-control primary-background border-0" id="fastnerType" name="fastnerType" required>
                                <option value="">Fastner Type</option>
                                <?php $sql_fastner = "SELECT * FROM fastner_types";

                                    $result_fastner = $link->query($sql_fastner);
                                    
                                    while ($row_fastner = $result_fastner->fetch_assoc()) { ?>
                                    
                                    <option value="<?php echo $row_fastner['name'] ?>" >
                                        <?php echo $row_fastner['name'] ?>
                                            
                                    </option>  
                                
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
                
            <div class="mx-auto mt-md-5 col-md-10 "><img src="uploads/logo-pmr.svg" ></div>
        
        </div>

        <!-- Table for calculations listing -->
        <div class="col-sm-8 p-md-5 p-3 ">
        
            <div class="mx-auto m-5 row">

                <img class="logo-wdth" src="uploads/<?php echo $row_user['logo']; ?>">
            
            </div>
        
            <div class="row height-bg mb-2 mt-4 mb-4">

            </div>

            <div class="row p-3">
    
    
                <div class="col-sm-12">
                    
                    <p class=" row justify-content-start mb-1 fs-0 date-time" >

                        Today is: <?php echo date('m/d/y'); ?>
                            
                    </p>
                    
                    <p class=" row justify-content-start nd mb-4 fs-0 date-time">

                        Effective Price Date: <?php echo '2/29/24'; ?>
                            
                    </p>
                
                </div>
        
                <div class="col-sm-6">
                   
                        <p class=" row justify-content-start mb-1 fs-1 font-weight-bold " id="companyNameP">

                            <?php echo  $row_user['company']; ?>
                                
                        </p>
                 
                   
                        <p class=" row justify-content-start mb-1 fs-1 font-weight-bold" id="jobNameP">

                            <?php echo  $row_user['job']; ?>
                                
                        </p>
                    
                </div>
            
                <div class="col-sm-6">
                    
                    <p class=" row justify-content-end mb-1 fs-1" id="jobAddressP">
                        <?php echo  $row_user['address']; ?>  
                        
                        <span class=" " id="cityP">, 
                        
                            <?php echo  $row_user['city']; ?>
                                
                        </span>
                        <span class="" id="stateP">, <?php echo  $row_user['state']; ?>,

                        </span>
                    </p>
                    <p class=" row justify-content-end mb-1 fs-5"id="zipP">
                        <?php echo  $row_user['zip']; ?>
                            
                    </p>
                   
                </div>
    
            
            </div>
           
            <div class="row mb-4 mt-2 height-bg">

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
    
    <?php  if($_SESSION['role'] == 1) { 

        // Profile Panel Listing
        require 'includes/profilePanelListing.php'; 
        
        // Profile Code Lisiting
        require 'includes/profileCodeListing.php';

    } ?>
   
</div>
    
<!-- Modals -->
<?php

    require 'modals/profilePanel/addProfilePanel.php';
    require 'modals/profilePanel/updateProfilePanel.php';

    require 'modals/profileCode/addProfileCode.php';
    require 'modals/profileCode/updateProfileCode.php';

    require 'modals/generic/alertToSelectAllValues.php';

?>



<script type="text/javascript">
    

        $('#profile_panel').DataTable({
            pageLength : 20
        });
  
    
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
  

       
 
        // Define a function to handle the AJAX call
async function updateData() {
    var total = 0;
    $('#dataBody').empty();

    try {
        // Process eave


        total += await fetchInitialRow();

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

        
        total += await processVented('Vented', 'Vented');

        
        total += await processFastner('fastnerType', 'fastnerType');
        
        
        total += await processTileSealent('paints', 'paints');


        // Update total in the UI
        updateTotalInUI(total);
    } catch (error) {
        console.error('Error:', error);
    }
}

async function processTileSealent(componentId, codeHeading) {
    var profilePanel = document.getElementById('panel_profile');
    var selectedOptionProfilePanel = profilePanel.options[profilePanel.selectedIndex];
    var selectedValueProfilePanel = selectedOptionProfilePanel.value;
    var selectedDataIdProfilePanel = selectedOptionProfilePanel.getAttribute('data-id');
    var selectedCombinedProfilePanel = selectedOptionProfilePanel.getAttribute('data-combined');
    var selectedScrewValue = selectedOptionProfilePanel.getAttribute('data-screw');
    var va = selectedValueProfilePanel / 12;
    var request = sizeOfRoof.value / va;
    var qty = parseFloat(request);
    var userInput = $('#paints').val();
    var profilePanelSize = $('#panel_profile').val();

        
       var  sealentQty =    calculateSealentQty(qty,);
    
         sealentQty = roundNumber(sealentQty);

        
            var response = await fetchProfileCode(selectedDataIdProfilePanel, codeHeading);
           
            if (response.success) {
                if(userInput == 'MGA'){
                    var sku = response.code+userInput;
                }else{
                    var sku = response.code+'TLS';
                }
                
                   
                var totalPriceResponse = await fetchReceiptValue(sku, sealentQty);

                if (totalPriceResponse.success) {
                    var totalPrice = parseFloat(totalPriceResponse.totalPrice);
                    appendDataRow(sealentQty, sku, totalPriceResponse.description, totalPriceResponse.price, totalPrice);
                    return totalPrice;
                } else {

                    console.error('Failed to fetch item data for ' + componentId);
                }
            } else {
                console.error('Failed to fetch profile code for ' + componentId);
            }
         
   

    return 0;
}


async function processVented(componentId, codeHeading) {

    var userInput = $('#ridge').val()*12;
    var profilePanelSize = $('#panel_profile').val();
        userInput=userInput*2;
    var qty =    userInput/profilePanelSize;
    if (userInput) {
        qty = roundNumber(qty);
        var profilePanel = document.getElementById('panel_profile');
        var selectedOptionProfilePanel = profilePanel.options[profilePanel.selectedIndex];
        var selectedDataIdProfilePanel = selectedOptionProfilePanel.getAttribute('data-id')

        try {
            var response = await fetchProfileCode(selectedDataIdProfilePanel, codeHeading);
           
            if (response.success) {
                var sku = response.code

                var totalPriceResponse = await fetchReceiptValue(sku, qty);

                if (totalPriceResponse.success) {
                    var totalPrice = parseFloat(totalPriceResponse.totalPrice);
                    appendDataRow(qty, sku, totalPriceResponse.description, totalPriceResponse.price, totalPrice);
                    return totalPrice;
                } else {

                    console.error('Failed to fetch item data for ' + componentId);
                }
            } else {
                console.error('Failed to fetch profile code for ' + componentId);
            }
        } catch (error) {

            // console.error('Error:', error);
            // var newRow = '<tr style="color:red;">';
            // newRow += '<td>-</td>';
            // newRow += '<td>-</td>';
            // newRow += '<td>-</td>';
            // newRow += '<td>-</td>';
            // newRow += '<td>-</td>';
            // newRow += '</tr>';

            // // Append the new row to the table body
            // $('#dataBody').append(newRow);
        }
    }

    return 0;
}

function calculateCeiling(screw_value, qty) {
    return Math.ceil(screw_value * qty / 250) * 250;
}


function calculateSealentQty(sealent_value) {
    return Math.ceil(sealent_value  / 200) ;
}

async function processFastner(componentId, codeHeading) {

    var profilePanel = document.getElementById('panel_profile');
    var selectedOptionProfilePanel = profilePanel.options[profilePanel.selectedIndex];
    var selectedValueProfilePanel = selectedOptionProfilePanel.value;
    var selectedDataIdProfilePanel = selectedOptionProfilePanel.getAttribute('data-id');
    var selectedCombinedProfilePanel = selectedOptionProfilePanel.getAttribute('data-combined');
    var selectedScrewValue = selectedOptionProfilePanel.getAttribute('data-screw');
    var va = selectedValueProfilePanel / 12;
    var request = sizeOfRoof.value / va;
    var qty = parseInt(request);
    var screwQty = calculateCeiling(selectedScrewValue,qty);
    
    var userInput = $('#' + componentId).val();
    var color = $('#colors').val();
    if (userInput) {
        screwQty = roundNumber(screwQty);
        var response = await fetchProfileCode(selectedDataIdProfilePanel, userInput);
        var profileCode = response.code;
        var sku = profileCode+color;
               
                var totalPriceResponse = await fetchReceiptValue(sku, screwQty);

                if (totalPriceResponse.success) {
                    var totalPrice = parseFloat(totalPriceResponse.totalPrice);
                    appendDataRow(screwQty, sku, totalPriceResponse.description, totalPriceResponse.price, totalPrice);
                    return totalPrice;
                } else {

                    console.error('Failed to fetch item data for ' + componentId);
                }
           
       
    }

    return 0;
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
                // alert(totalPriceResponse.price);
                if (totalPriceResponse.success) {
                    var totalPrice = parseFloat(totalPriceResponse.totalPrice);
                    appendDataRow(qty, sku, totalPriceResponse.description, totalPriceResponse.price, totalPrice);
                    return totalPrice;
                } else {

                    console.error('Failed to fetch item data for ' + componentId);
                }
            } else {
                console.error('Failed to fetch profile code for ' + componentId);
            }
        } catch (error) {

            // console.error('Error:', error);
            var newRow = '<tr style="color:red;">';
            newRow += '<td>-</td>';
            newRow += '<td>'+sku+'</td>';
            newRow += '<td>-</td>';
            newRow += '<td>-</td>';
            newRow += '<td>-</td>';
            newRow += '</tr>';

            // Append the new row to the table body
            $('#dataBody').append(newRow);
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

function appendDataRow(qty, sku, description, price, totalPrice) {
    if (description != null) {
        var newRow = '<tr>';
        newRow += '<td>' + qty + '</td>';
        newRow += '<td>' + sku + '</td>';
        newRow += '<td>' + description + '</td>';
        newRow += '<td>' + price + '</td>';
        newRow += '<td class="price">' + roundToTwoDecimalPlaces(totalPrice) + '</td>';
        newRow += '</tr>';

        $('#dataBody').append(newRow);
    }else{
         var newRow = '<tr style="color:red;">';
            newRow += '<td>-</td>';
            newRow += '<td>-</td>';
            newRow += '<td>-</td>';
            newRow += '<td>-</td>';
            newRow += '<td>-</td>';
            newRow += '</tr>';

            // Append the new row to the table body
            $('#dataBody').append(newRow);
    }
}

async function fetchInitialRow() {
    var total = 0;

    var profilePanel = document.getElementById('panel_profile');
    var selectedOptionProfilePanel = profilePanel.options[profilePanel.selectedIndex];
    var selectedValueProfilePanel = selectedOptionProfilePanel.value;
    var selectedDataIdProfilePanel = selectedOptionProfilePanel.getAttribute('data-id');
    var selectedCombinedProfilePanel = selectedOptionProfilePanel.getAttribute('data-combined');
    var va = selectedValueProfilePanel / 12;
    var request = sizeOfRoof.value / va;
    var digitsOnly = parseInt(request);
    var sku = selectedCombinedProfilePanel + guage.value + color_code.value;

    try {
        var response = await $.ajax({
            type: 'POST',
            url: 'php/getRecieptValue.php',
            data: {
                sku: sku,
                request: digitsOnly
            },
            dataType: 'json'
        });

        if (response.success) {
         
                var newRow = '<tr>';
                newRow += '<td>' + digitsOnly + '</td>';
                newRow += '<td>' + sku + '</td>';
                newRow += '<td>' + response.description + '</td>';
                newRow += '<td>' + response.price + '</td>';
                newRow += '<td>' + roundToTwoDecimalPlaces(response.totalPrice) + '</td>';
                newRow += '</tr>';

                // Append the new row to the table body
                $('#dataBody').append(newRow);

                total += parseFloat(response.totalPrice);




            
        } else {
            

            throw new Error('Failed to fetch initial row');
        }
    } catch (error) {
       
        // console.error('Error fetching initial row:', error);
        // throw error;
         var newRow = '<tr style="color:red;">';
                newRow += '<td>-</td>';
                newRow += '<td>-</td>';
                newRow += '<td>-</td>';
                newRow += '<td>-</td>';
                newRow += '<td>-</td>';
                newRow += '</tr>';

                // Append the new row to the table body
                $('#dataBody').append(newRow);
    }

    return total;
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

    

        if (allInputsFilled) {
            updateData();
            
        } else {
           // alert();
            // Display modal
            $('#validationModal').modal('show');
        }
    

        
    });


     





</script>

<script type="text/javascript" src="assets/roofSpecs.js"></script>
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
