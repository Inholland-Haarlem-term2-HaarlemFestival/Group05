window.onscroll = function () {
    myFunction()
};
var navbar = document.getElementById("navBar");
var sticky = navbar.offsetTop;
function myFunction() {
    if (window.pageYOffset >= sticky) {                    
        document.getElementById("navBar").style.paddingTop = "0em";
        navbar.classList.add("newNav");
    }else{            
        document.getElementById("navBar").style.paddingTop = "18em";           
        navbar.classList.remove("newNav");
    }
}
