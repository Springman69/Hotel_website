document.addEventListener("DOMContentLoaded", function () {
    handleModal();
    handleBackgroundColorChange();
    handleShowCurrentDate();
    handleScrollToTop();
    handleFormValidation();
    handlevalidateForm();
    handlechangeImage();
    handleshowServiceDetails();
});

function handleModal() { //podglad zdjec na stronie index
    const modal = document.getElementById("modal");
    const modalImg = document.getElementById("modal-img");
    const images = document.querySelectorAll(".hotel-image");
    if (modal && modalImg && images) {
        images.forEach((image) => {
            image.addEventListener("click", function () {
                modal.style.display = "block";
                modalImg.src = this.src;
            });
        });

        modal.addEventListener("click", function () {
            modal.style.display = "none";
        });
    }
}

function handleBackgroundColorChange() {  //zmiana koloru tła 
    const changeBackgroundColorButton = document.getElementById('change-background-color');
    if (changeBackgroundColorButton) {
        changeBackgroundColorButton.addEventListener('click', function () {
            const newColor = prompt('Wpisz nowy kolor tła po ang:');
            document.body.style.backgroundColor = newColor;
        });
    }
}

function handleShowCurrentDate() { //pokaż dzisiejsza date
    const showDateButton = document.getElementById('show-date');
    if (showDateButton) {
        showDateButton.addEventListener('click', function () {
            const currentDate = new Date();
            alert('Aktualna data: ' + currentDate.toLocaleDateString());
        });
    }
}

function handleScrollToTop() { // przewiń do góry
    const scrollToTopButton = document.getElementById('scroll-to-top');
    if (scrollToTopButton) {
        scrollToTopButton.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
}

function handleFormValidation() { //walidacja rezerwacja i kontakt
    const reservationForm = document.getElementById('reservation-form');
    if (reservationForm) {
        reservationForm.addEventListener('submit', validateForm);
    }

    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', validateForm);
    }
}

function validateForm(event) { //walidacja na stronie rezerwacja
    const formId = this.id;
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();

    if (!name || !email) {
        alert('Proszę wypełnić wszystkie pola formularza.');
        return;
    }

    if (formId === 'reservation-form') {
        const phone = document.getElementById('phone').value.trim();
        const arrival = document.getElementById('arrival').value;
        const departure = document.getElementById('departure').value;
        const roomType = document.getElementById('room-type').value;
        const guests = document.getElementById('guests').value;

        if (!phone || !arrival || !departure || !roomType || !guests) {
            alert('Proszę wypełnić wszystkie pola formularza.');
            return;
        }

        const arrivalDate = new Date(arrival);
        const departureDate = new Date(departure);
        if (arrivalDate >= departureDate) {
            alert('Data przyjazdu musi być wcześniejsza niż data wyjazdu.');
            return;
        }

        alert('Dziękujemy za dokonanie rezerwacji! Otrzymasz potwierdzenie na podany adres e-mail.');

    } else if (formId === 'contact-form') {
        const subject = document.getElementById('subject').value.trim();
        const message = document.getElementById('message').value.trim();

        if (!subject || !message) {
            alert('Proszę wypełnić wszystkie pola formularza.');
            return;
        }

        alert('Dziękujemy za wysłanie wiadomości! Skontaktujemy się z Tobą wkrótce.');
    }


}

function changeImage(imageName) {  //zmiana obrazków na restauracja.html
    const menuImage = document.getElementById('menu-image');
    if (menuImage) {
        menuImage.src = imageName;
    }
}

function showServiceDetails(element, serviceName, serviceDetails) { //dodane info po kliknięciu na pokoj i usługę
    alert(serviceName + "\n" + serviceDetails);
}
