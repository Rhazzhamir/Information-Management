
// Modal Profile
const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
myInput.focus()
})

//
// document.addEventListener('DOMContentLoaded', () => {
//     const btn_profile = document.querySelector('#btn_profile')
    
//     btn_profile.addEventListener('click' , () =>{
//         const FirstName = document.querySelector('#FirstName').value;
//         const Profile_Name = document.querySelector('#Profile_Name');
//         Profile_Name.innerHTML = FirstName;

//     })

// })

document.addEventListener('DOMContentLoaded', () => {
    const btnProfile = document.querySelector('#btnProfile');
    const profileNameDisplay = document.querySelector('#profileNameDisplay');

    btnProfile.addEventListener('click', () => {
        const firstName = document.querySelector('#firstName').value;
        profileNameDisplay.innerHTML = firstName;
    });
}); 