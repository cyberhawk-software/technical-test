import axios from "axios";

const addComponentWrapper = document.querySelector(".add-component");
if (addComponentWrapper) {
    const inputs = addComponentWrapper.querySelectorAll("input");
    const submit = addComponentWrapper.querySelector(".submit");

    submit.addEventListener("click", () => {
        let error = 0;
        let data = {};
        inputs.forEach((input) => {
            if (input.value == "") {
                error += 1;
            } else {
                data[input.name] = input.value;
            }
        });
        if (error == 0) {
            xhr(data);
        }
    });
}

const xhr = (data) => {
    axios
        .post("/api/xhr/add-component", data)
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
