const formAuth = document.getElementById("form-auth");

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
        (text) => { console.log(text)}
    )
}

