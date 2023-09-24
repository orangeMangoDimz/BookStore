const main = document.querySelector(`section`)
main.addEventListener(`click`, (e) => {
    if (e.target.classList.contains(`bookDetailBtn`)) {
        const bookID = $(e.target).data('bookid')
        $.ajax({
            url: `book/detail/${bookID}`,
            type: 'POST',
            data: {
                bookID: bookID,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: (
                data
            ) => { // this function will implicitly run the detail function from controller
                $('#bookDetailContent').html(data)
            },
            error: (e) => {
                console.log(bookID)
                console.log('erorr')
            }
        })
    }
})