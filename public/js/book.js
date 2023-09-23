const imgUp = document.querySelector('.imgUpload')
console.log(imgUp);
imgUp.addEventListener('change', (e) => {
    const imgPrev = document.querySelector("#imgPrev")
    imgPrev.src = URL.createObjectURL(e.target.files[0])
})