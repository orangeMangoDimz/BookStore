const imgUp = document.querySelector('.imgUpload')
imgUp.addEventListener('change', (e) => {
    const imgPrev = document.querySelector("#imgPrev")
    imgPrev.src = URL.createObjectURL(e.target.files[0])
})