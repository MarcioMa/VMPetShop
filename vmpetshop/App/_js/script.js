function updatemenu() {
  if (document.getElementById('responsive-menu').checked == true) {
    document.getElementById('menu').style.borderBottomRightRadius = '0';
    document.getElementById('menu').style.borderBottomLeftRadius = '0';
  }else{
    document.getElementById('menu').style.borderRadius = '10px';
  }
}

function checkAll(){
    if(document.getElementById('checkboxes-0').checked === true){
        document.getElementById('checkboxes-1').checked = true;
        document.getElementById('checkboxes-2').checked = true;
        document.getElementById('checkboxes-3').checked = true;
        document.getElementById('checkboxes-4').checked = true;
        document.getElementById('checkboxes-5').checked = true;
        document.getElementById('checkboxes-6').checked = true;
    }
        if(document.getElementById('checkboxes-0').checked === false){
        document.getElementById('checkboxes-1').checked = false;
        document.getElementById('checkboxes-2').checked = false;
        document.getElementById('checkboxes-3').checked = false;
        document.getElementById('checkboxes-4').checked = false;
        document.getElementById('checkboxes-5').checked = false;
        document.getElementById('checkboxes-6').checked = false;
    }
}


function confirm() {
    if ( confirm("Are you sure you want to log out?"))
      window.location = "http://localhost/VMPetShop/";
}
