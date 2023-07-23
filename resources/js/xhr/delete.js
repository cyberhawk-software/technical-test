class Delete {
    constructor(button) {
        this.button = button;
        this.id = button.dataset.id;
        this.object = button.dataset.object;
        if (this.button && this.id && this.object) {
            this.init();
        }
    }

    init = () => {
        this.button.addEventListener("click", () => {
            const result = confirm(
                `Are you sure you want to delete this ${this.object}?`
            );
            if (result) {
                this.delete();
            }
        });
    };

    delete = () => {
        data = { object: this.object, id: this.id };
        axios
            .post("/api/xhr/delete", data)
            .then(({ data }) => {
                // console.log(data);
                if (data.response == 200) {
                    location.reload();
                } else {
                    console.log("error");
                }
            })
            .catch((error) => {
                // handle error
                console.log(error);
            })
            .finally(() => {
                // console.log("finally");
            });
    };
}

const deleteButtons = document.querySelectorAll(".delete");

deleteButtons.forEach((button) => {
    new Delete(button);
});
