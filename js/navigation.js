    // *************************************   FOR MODAL   ****************************************

    // Get the modal
    var modal = document.getElementById("myModal");



    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];




    // When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "block";
    }


    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        modal_forgot.style.display = "none";

    }



    // ******************************  FORGOT PASSWORD MODAL SIGN IN BUTTON   ************************************

    //get forgot_modal
    var modal_forgot = document.getElementById("myModal_forgot");

    // Get the <span> element IN FORGOT that closes the modal
    var span_f = document.getElementsByClassName("close_f")[0];
    var forgot = document.getElementById("forgot");

    // When the user clicks on <span> (x), close the modal
    span_f.onclick = function () {
        modal.style.display = "none";
        modal_forgot.style.display = "none";

    }


    var signIn_f = document.getElementById("signIn_f");

    signIn_f.onclick = function () {
        modal_forgot.style.display = "none";
        modal.style.display = "block";
    }

    //When click on forgot Password Close the login modal and open the forgot password modal
    forgot.onclick = function () {
        modal.style.display = "none";
        modal_forgot.style.display = "block";
    }




    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal || event.target == modal_forgot) {
            modal.style.display = "none";
            modal_forgot.style.display = "none";
        }
    }

    //******************************************** SIGNUP & AIGNIN TOOGLE  ***********************************************

    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });


//******************************************** WISHLIST  ***********************************************
