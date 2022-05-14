const form = document.querySelector('.signup form')
const errorAlert = document.querySelector('.error-txt')
const continueBtn = form.querySelector('.button input')

form.addEventListener('submit', (e)=>{
    e.preventDefault()
    let formularioData = new FormData(form)
    fetch('php/signup.php', {
        body: formularioData,
        method:'post'
    })
    .then(response => response.text())
    .then(data => {
        if(data == 'success'){
            location.href = "users.php"
        }
        else{
            errorAlert.style.display = 'block'
            errorAlert.innerHTML = data
        }
    })
    .catch(e => console.log('an error has ocurred'))
})