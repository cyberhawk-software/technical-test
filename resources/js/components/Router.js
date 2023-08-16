import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter, Routes, Route } from "react-router-dom";

import Login from "./pages/Login";
import useToken from "./App/Hooks/useToken";

function Router() {
    const { token, setToken } = useToken();

    if (!token) {
        return <Login setToken={setToken} />;
    }

    return (
        <Routes>
            <Route path="/" element={<Login />} />
        </Routes>
    );
}

export default Router;

if (document.getElementById("root")) {
    ReactDOM.render(
        <BrowserRouter>
            <Router />
        </BrowserRouter>,
        document.getElementById("root")
    );
}
