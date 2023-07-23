import axios from "axios";

const addLocationWrapper = document.querySelector(".add-location");
if (addLocationWrapper) {
    const inputs = addLocationWrapper.querySelectorAll("input");
    const submit = addLocationWrapper.querySelector(".submit");

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
        .post("/api/xhr/add-location", data)
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
