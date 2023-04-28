const formAuth = document.getElementById("form-auth");
const output = document.querySelector(".profile");

formAuth.addEventListener("submit", auth);

function auth(event){
    event.preventDefault();//отменяем отправку формы
    let data = new FormData(formAuth);//собираем данные с формы
    fetch("api/auth.php", {
        method: 'POST',
        'Content-Type':'application/json',
        body: data
    }
    ).then(
        (response)=>{
            return response.json();
    }
    ).then(
        (json) => { 
            console.log(json);
            if(json.status){
                output.innerHTML = "вы авторизованы как " + json.name;
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

