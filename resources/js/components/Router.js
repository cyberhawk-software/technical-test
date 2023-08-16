import React from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";

import Login from "./pages/Login";
import useToken from "./App/Hooks/useToken";
import { createRoot } from "react-dom/client";

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
    const root = createRoot(document.getElementById("root"));
    root.render(
        <BrowserRouter>
            <Router />
        </BrowserRouter>
    );
}
