const form = document.querySelector(".typing-area")
const inputMessage = document.getElementById("messageInput")
const inputBtn = form.querySelector("button")
const chatBox = document.querySelector(".chat-box")

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight
}

chatBox.addEventListener('mouseenter', ()=>{
    chatBox.classList.add('active')
})
chatBox.addEventListener('mouseleave', ()=>{
    chatBox.classList.remove('active')
})

form.addEventListener("submit", (e) => {
    e.preventDefault()
	let formularioData = new FormData(form)
	fetch("php/insert-chat.php", {
        body: formularioData,
		method: "post",
	})
    .then((response) => {
        if (response.status == 200) {
            inputMessage.value = ""
            scrollToBottom()
        }
    })
    .catch((e) => console.log("an error has ocurred", e))
})

setInterval(() => {
    let formularioData = new FormData(form)
	fetch("php/get-chat.php", { body: formularioData, method: "post" })
    .then((response) => response.text())
    .then((data) => {
            chatBox.innerHTML = data
            if(!chatBox.classList.contains('active'))scrollToBottom()
		})
		.catch((e) => console.log("an error has ocurred", e))
}, 500)

