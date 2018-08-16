const userForm = document.getElementById('user');
userForm.addEventListener('submit', function(event){
  event.preventDefault();
});

let submitButton = document.getElementById('submit');
let username = document.getElementById('name')
let phone = document.getElementById('phone')
let mail = document.getElementById('email');
let date = document.getElementById('date');

submitButton.addEventListener('click', function(){
  let formValues = arrangeFormValues();
  inputToDataBase(formValues);
})

function arrangeFormValues(){
  let seatingOne;
  let seatingTwo;
  if(document.getElementById('seatingOne').checked) {
    seatingOne = 1;
    seatingTwo = 0;
  }else if(document.getElementById('seatingTwo').checked) {
    seatingOne = 0;
    seatingTwo = 1;
  }

  //Set the values of the form input to an object, to be used later in inputToDataBase
  let formValues = {
    "name": username.value,
    "phone": phone.value,
    "email": mail.value,
    "date": date.value,
    "seatingOne": seatingOne,
    "seatingTwo": seatingTwo
  }
  return formValues;
}

function inputToDataBase(formValues){
  //Uses the GET method to send the formValues object as a GET parameter
  formValues = JSON.stringify(formValues);
  fetch('http://localhost/php-api-test/post.php?formData=' + formValues,{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => console.log(response))
}

//Console logs a row from the booking table, from fetch.php
fetch(`http://localhost/php-api-test/fetch.php`)
  .then((response) => response.json())
  .then((response) => {
    console.log(response);
  })
