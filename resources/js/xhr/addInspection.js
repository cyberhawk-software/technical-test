import axios from "axios";

const addInspectionWrapper = document.querySelector(".add-inspection");
if (addInspectionWrapper) {
    const parent = addInspectionWrapper.querySelector("input");
    const input = addInspectionWrapper.querySelector("select");
    const submit = addInspectionWrapper.querySelector(".submit");

    submit.addEventListener("click", () => {
        let error = 0;
        let data = {};
        if (input.value == "") {
            error += 1;
        } else {
            data[parent.name] = parent.value;
            data[input.name] = input.value;
        }
        if (error == 0) {
            xhr(data);
        }
    });
}

const xhr = (data) => {
    axios
        .post("/api/xhr/add-inspection", data)
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
