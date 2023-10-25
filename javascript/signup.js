const form = document.querySelector(".signup form"),
signup = form.querySelector(".button input"),
image = form.querySelector(".image .file-input");

let icon = document.querySelector(".image i");
let paragraph = document.querySelector(".image p");

form.onsubmit = (e)=>{
    e.preventDefault();
}

document.querySelector(".image").addEventListener("click", ()=>{
  image.click();
});

image.addEventListener("change", function() {
  if(image.files.length > 0) {
    icon.className = "fas fa-check";
    paragraph.textContent = "Upload Success!";
  }
});

signup.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=> {
      if(xhr.readyState === XMLHttpRequest.DONE) {
          if(xhr.status === 200) {
              let data = xhr.response;
              if(data === "success") {
                location.href="users.php";
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
