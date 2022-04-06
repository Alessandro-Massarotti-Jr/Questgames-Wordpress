const modal = document.querySelector('.modal-container')
modal.classList.add('active')
const success = document.querySelector('.modal-success')
success.classList.add('active')
const closeBtn = document.querySelector('.modal-success button')
closeBtn.addEventListener('click',()=>{
    modal.classList.remove('active')
    success.classList.remove('active')
})