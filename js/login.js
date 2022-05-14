const form = document.querySelector(".login form")
const errorAlert = document.querySelector(".error-txt")
const continueBtn = form.querySelector(".button input")

continueBtn /*form*/
	.addEventListener(/*'submit'*/ "click", (e) => {
		e.preventDefault()
		let formularioData = new FormData(form)
		fetch("php/login.php", {
			body: formularioData,
			method: "post",
		})
			.then((response) => response.text())
			.then((data) => {
				if (data == "success") {
					location.href = "users.php"
				} else {
					errorAlert.style.display = "block"
					errorAlert.innerHTML = data
				}
			})
			.catch((e) => console.log("an error has ocurred" , e))
	})
