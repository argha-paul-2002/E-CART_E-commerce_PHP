<?php
include '../dbconnect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $sql = "SELECT * FROM `address` WHERE `u_id`=3;";
    $rs = mysqli_query($conn, $sql);
    $row3 = mysqli_num_rows($rs);
    if ($row3 > 0) {
        while ($row = mysqli_fetch_array($rs)) {
?>
           <div class="address-s">
                                <div style="float:right">
                                    <!-- <input type="button" class="delete-btn" value="Delete"> -->
                                    <button class="delete-btn" id="delete_address">
                                        <input type="hidden" id="address_id" value="1">
                                        <img src="images/wishlist/trash.png" alt="Delete">
                                    </button>

                                </div>
                                <div class="collapsible-s">
                                    <div>
                                        <div>
                                            <span>Full Name<?php //echo $row['name']; ?></span>
                                            <span>Phone Number</span>
                                        </div>

                                    </div>
                                    <div class="details">
                                        <span>locality,</span>
                                        <span>Full Address,</span>
                                        <span>city,</span>
                                        <span>state,</span>
                                        <span>district,</span>
                                        <span>pin</span>
                                    </div>
                                </div>
                                <div class="content-s">
                                    <form id="update_address">
                                        <div class="form-width">
                                            <div class="right-heading">
                                                <span class="heading-txt-right">Edit Address</span>
                                                <!-- <span class="edit-style" onclick="myFunctionE4()" id="edit-4">Edit</span>
                                                <span class="edit-style" onclick="myFunctionCancel4()" id="cancel-4" style="display:none;">Cancel</span> -->
                                            </div>

                                            <div class="form-inner-flex">
                                                <div class="name">
                                                    <p>Name</p>
                                                    <input type="text" name="add_name" value="<?php echo $row['name']; ?>" class="input-style-css-add" required>
                                                </div>
                                            </div>
                                            <div class="form-inner-flex">
                                                <div class="name">
                                                    <p>Pincode</p>
                                                    <input type="text" name="add_pin" value="Pincode" class="input-style-css-add" required>
                                                </div>
                                                <div class="name">
                                                    <p>Locality</p>
                                                    <input type="text" name="add_locality" value="Sodepur" class="input-style-css-add" required>
                                                </div>
                                            </div>
                                            <div class="form-inner-flex">
                                                <div class="name">
                                                    <p>Mobile Number</p>
                                                    <input type="text" name="add_number" value="8777360207" class="input-style-css-add" title="Please Enter valid Phone Number" onKeyPress="if(this.value.length==10) return false;" pattern="(6|7|8|9)\d{9}" minlength="10" maxlength="10" required>
                                                </div>
                                            </div>
                                            <div class="name" style="margin: 0 0px 20px 0px;">
                                                <p><label for="add_detailed">Address</label></p>
                                                <textarea name="add_detailed" rows="6" cols="50" class="textarea-style" required>Sodepur Kolkata</textarea>
                                            </div>
                                            <div class="form-inner-flex">
                                                <div class="name">
                                                    <p>city</p>
                                                    <input type="text" name="add_city" value="Argha Paul" class="input-style-css-add" required>
                                                </div>
                                                <div class="name">
                                                    <p>State</p>
                                                    <select name="add_state" name="select" class="input-style-css-add" onclick="selectDesableOp()" required>
                                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands
                                                        </option>
                                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Chandigarh">Chandigarh</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                        <option value="Daman and Diu">Daman and Diu</option>
                                                        <option value="Delhi">Delhi</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Ladakh">Ladakh</option>
                                                        <option value="Lakshadweep">Lakshadweep</option>
                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Odisha">Odisha</option>
                                                        <option value="Puducherry">Puducherry</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                        <option value="Telangana">Telangana</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option value="Uttarakhand">Uttarakhand</option>
                                                        <option value="West Bengal" selected>West Bengal</option>
                                                    </select>
                                                </div>

                                                <div class="name">
                                                    <p>District</p>
                                                    <input type="text" name="add_dist" value="Argha Paul" class="input-style-css-add" required>
                                                </div>
                                                <div>
                                                    <input type="hidden" name="id" value="<?php echo $u_id ?>">
                                                </div>
                                            </div>

                                            <div class="name submit-btn">
                                                <input type="button" value="SAVE" id="update_address_submit" class="input-style-css submit-btn-style form-submit">
                                            </div>
                                            <div class="name submit-btn"></div>
                                        </div>
                                    </form>
                                </div>
                            </div> 
<?php
        }
    } else {
        echo "No Saved Address";
    }
} else {
    header("location: 404.php");
}

?>