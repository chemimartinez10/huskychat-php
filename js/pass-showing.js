const pwdField = document.getElementById('passfield')
const pwdButton = document.getElementById('passeye')

pwdButton.addEventListener('click', ()=>{
    if(pwdField.type == 'password'){
        pwdField.type = 'text'
        pwdButton.classList.add('active')
    }
    else{
        pwdField.type = 'password'
        pwdButton.classList.remove('active')
    }
})