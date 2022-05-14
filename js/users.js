const searchBar = document.querySelector(".users .search input")
const searchBtn = document.querySelector(".users .search button")
const usersList = document.querySelector(".users-list")

searchBtn.addEventListener('click', ()=>{
    searchBar.classList.toggle('active')
    searchBar.focus()
    searchBtn.classList.toggle('active')
    searchBar.value = ''
})

searchBar.addEventListener('keyup', ()=>{
    if(searchBar.classList.contains('active')){
        let form = new FormData()
        form.append('searchTerm', searchBar.value.trim())
        fetch("php/search.php", {body:form ,method:'post'})
        .then((response) => response.text())
        .then((data) => {
            usersList.innerHTML = data
        })
        .catch((e) => console.log("an error has ocurred", e))
    }
})

setInterval(() => {
    if(!searchBar.classList.contains('active')){
        fetch("php/users.php")
        .then((response) => response.text())
        .then((data) => {
            usersList.innerHTML = data
        })
        .catch((e) => console.log("an error has ocurred", e))
    }
}, 500);