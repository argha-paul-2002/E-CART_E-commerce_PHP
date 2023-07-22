<div class="row" contentEditable="false" >
        <div class="col-75" style="cursor:not-allowed; opacity:0.5;">
            <div class="container">
                <form action="/action_page.php" class="card_form">

                    <div class="row">

                        <div class="col-50">
                            <h3>Payment <span style="color:red">CURRENTLY UNAVAILABLE</span></h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="User Name" disabled>
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" disabled>
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="March"  disabled>
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2023"  disabled>
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="123" disabled>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <input type="submit" value="Continue to checkout" class="btn"  disabled>
                </form>
            </div>
        </div>
        <!-- <div class="col-25">
            <div class="container">
                <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
                <p><a href="#">Product 1</a> <span class="price">$15</span></p>
                <p><a href="#">Product 2</a> <span class="price">$5</span></p>
                <p><a href="#">Product 3</a> <span class="price">$8</span></p>
                <p><a href="#">Product 4</a> <span class="price">$2</span></p>
                <hr>
                <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
            </div>
        </div> -->
    </div>