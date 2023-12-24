const main = document.querySelector(`section`);
main.addEventListener(`click`, (e) => {
    if (e.target.classList.contains(`bookDetailBtn`)) {
        const bookID = $(e.target).data("bookid");
        $.ajax({
            url: `book/modal/${bookID}`,
            type: "POST",
            data: {
                bookID: bookID,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: (data) => {
                // this function will implicitly run the detail function from controller
                $("#bookDetailContent").html(data);
            },
            error: (error) => {
                console.log("Error modal : ", error.responseJSON.message);
            },
        });
    }
});

const myCarouselElement = document.querySelector("#myCarousel");

const carousel = new bootstrap.Carousel(myCarouselElement, {
    interval: 2000,
    touch: false,
});
