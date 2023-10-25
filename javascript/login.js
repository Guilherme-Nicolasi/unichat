const form = document.querySelector(".login form"),
login = form.querySelector(".button input");

form.onsubmit = (e)=> {
    e.preventDefault();
}

login.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=> {
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200) {
              let data = xhr.response;
              if(data === "success") {
                location.href = "users.php";
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}