function validation(){
    let x = document.getElementById('pname').value;
    let y = document.getElementById('page').value;
    let z = document.getElementById('pemail').value;
    if (x == "") {
      alert("Name must be filled out");
      return false;
    }

    else if (y == ""||y<=0) {
      alert("Enter valid Age");
      return false;
    }
    else if (z == ""||z.indexOf('@')<=0) {
      alert("Enter Valid Email ID");
      return false;
    }
else{
    alert("Your Appointment has been booked and you will receive a confirmation message shortly after doctor's approval.");
  }
}

