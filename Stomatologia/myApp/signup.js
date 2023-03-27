document.querySelector('#signUpForm').addEventListener('submit',
    (event) => {
        const pass1 = document.querySelector('#signUpPass1');
        const pass2 = document.querySelector('#signUpPass2');

        if(pass1.value === pass2.value){
            return true;
        }
        else {
            alert('Passwords do NOT match!');
            event.preventDefault();
        }   
    }
)