fetch(`http://localhost/php_api_test/fetch.php`)
  .then((response) => response.json())
  .then((response) => {
    console.log(response);
    })

const userForm = document.getElementById('user');
userForm.addEventListener('submit', function(event){
  event.preventDefault();
});

let button = document.getElementById('submit');
let username = document.getElementById('name')
let phone = document.getElementById('phone')
let mail = document.getElementById('email');
let date = document.getElementById('date');

button.addEventListener('click', function(){
  let seatingOne;
  let seatingTwo;
  if(document.getElementById('seatingOne').checked) {
    seatingOne = 1;
    seatingTwo = 0;
  }else if(document.getElementById('seatingTwo').checked) {
    seatingOne = 0;
    seatingTwo = 1;
  }
  let formValues = {
    "name": username.value,
    "phone": phone.value,
    "email": mail.value,
    "date": date.value,
    "seatingOne": seatingOne,
    "seatingTwo": seatingTwo
  }
  console.log(formValues);
  
  inputToDB(formValues);
})

function inputToDB(formValues){
  let dbParam = JSON.stringify(formValues);
  fetch('http://localhost/php_api_test/post.php?x=' + dbParam,{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response.json())
    .then((response) => console.log(response))
}

/* 
let obj = { "name":"julia", "email":"julia@gmail.com", "phone":"+462345678" };
let dbParam = JSON.stringify(obj);

fetch('http://localhost/php_api_test/post.php?x=' + dbParam,{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then((response) => response)
    .then((response) => console.log(response)) */