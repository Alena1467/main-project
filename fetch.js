const formAuth = document.getElementById("form-auth");
const output = document.querySelector(".profile");

formAuth.addEventListener("submit", auth);

function auth(event){
    event.preventDefault();//отменяем отправку формы
    let data = new FormData(formAuth);//собираем данные с формы
    fetch("api/auth.php", {
        method: 'POST',
        body: data
    }
    ).then(
        (response)=>{
            return response.text();
    }
    ).then(
        (text) => { 
            if(text){
                output.innerHTML = "вы авторизованы";
                formAuth.style.display = "none";
            }
            else {
                let p  = document.createElement("p");
                p.innerHTML = "ошибка авторизации";
                output.prepend(p);
            }
        }
    )
}

