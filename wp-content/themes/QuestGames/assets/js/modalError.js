const modal = document.querySelector('.modal-container')
modal.classList.add('active')
const error = document.querySelector('.modal-error')
error.classList.add('active')
const closeBtn = document.querySelector('.modal-error button')
closeBtn.addEventListener('click',()=>{
    modal.classList.remove('active')
    error.classList.remove('active')
})