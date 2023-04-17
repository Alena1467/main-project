const formInsert = document.getElementById("form-insert-student");
formInsert.addEventListener("submit", (event)=>{
    event.preventDefault();// отменяем стандартную отправку формы
    let formData = new FormData(formInsert);//собираем данные с формы, которые ввёл пользователь

    let xhr = new XMLHttpRequest();// создаем объект отправки на сервер
    xhr.open("POST", "insertStudent.php");// открываем соединение
    xhr.send(formData);//отправка данных на сервер
    xhr.onload = () => {
        console.log(xhr.response)
    };
});