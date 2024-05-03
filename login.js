function setFormMessage(formElement, type, message) {
    const messageElement = formElement.querySelector(".form__message");

    messageElement.textContent = message;
    messageElement.classList.remove("form__message--success", "form__message--error");
    messageElement.classList.add(`form__message--${type}`);
}

function setInputError(inputElement, message) {
    inputElement.classList.add("form__input--error");
    inputElement.parentElement.querySelector(".form_input-error-message1").textContent = message;
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form__input--error");
    inputElement.parentElement.querySelector(".form_input-error-message2").textContent = "";
}

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");
    const createAccountForm = document.querySelector("#CreateAccount");


    document.querySelector("#linkCreateAccount").addEventListener("click", e => {
        e.preventDefault();
       
    });

    document.querySelector("#LoginForm").addEventListener("click", e => {
        e.preventDefault();
  
    });

    loginForm.addEventListener("Submit1", e => {
        e.preventDefault();

        // Perform your AJAX/Fetch login

        setFormMessage(loginForm, "error", "Invalid username/password combination");
    });

    loginForm.addEventListener("Submit2", e => {
        e.preventDefault();

        // Perform your AJAX/Fetch login

        setFormMessage(loginForm, "error", "incorrect inputs");
    });





    document.querySelectorAll(".username").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
            if (e.target.id === "signupUsername" && e.target.value.length > 0 && e.target.value.length < 10) {
                setInputError(inputElement, "Username must be at least 10 characters in length");
            }
        });

        inputElement.addEventListener("input", e => {
            clearInputError(inputElement);
        });
    });
});

let buttn=document.querySelector('.donthaveanacc_link')
let disp=document.querySelector('.createaccount')
buttn.addEventListener('click',function(){
    disp.style.display="block"
})
