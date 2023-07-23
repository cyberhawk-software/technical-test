class Modal {
    constructor(array) {
        array.forEach((modal) => {
            this.initModal(modal);
        });
    }

    initModal = (modal) => {
        const openButtons = document.querySelectorAll(
            `[data-action="open"][data-modal="${modal.id}"]`
        );
        const closeButtons = document.querySelectorAll(
            `[data-action="close"][data-modal="${modal.id}"]`
        );

        openButtons.forEach((button) => {
            button.addEventListener("click", () => {
                modal.classList.add("is-open");
            });
        });

        closeButtons.forEach((button) => {
            button.addEventListener("click", () => {
                modal.classList.remove("is-open");
            });
        });
    };
}

const modalArray = document.querySelectorAll(".modal");
if (modalArray.length > 0) {
    new Modal(modalArray);
}
