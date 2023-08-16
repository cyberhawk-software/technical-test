import React, { useState } from "react";
import PropTypes from "prop-types";
import { createRoot } from "react-dom/client";

async function loginUser(credentials) {
    return fetch("http://localhost/login", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(credentials),
    }).then((data) => data.json());
}

export default function Login({ setToken }) {
    const [email, setEmail] = useState();
    const [password, setPassword] = useState();

    const handleSubmit = async (e) => {
        e.preventDefault();

        const token = await loginUser({
            email,
            password,
        });
        setToken(token);
    };

    return (
        <>
            <header className="max-w-lg mx-auto">
                <h1 className="text-4xl font-bold text-white text-center">
                    Wind Farm Manager
                </h1>
            </header>

            <main className="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
                <section>
                    <h3 className="font-bold text-2xl">Welcome</h3>
                    <p className="text-gray-600 pt-2">
                        Sign in to your account.
                    </p>
                </section>

                <section className="mt-10">
                    <form
                        className="flex flex-col"
                        method="POST"
                        onSubmit={handleSubmit}
                    >
                        <div className="mb-6 pt-3 rounded bg-gray-200">
                            <label
                                className="block text-gray-700 text-sm font-bold mb-2 ml-3"
                                htmlFor="email"
                            >
                                Email
                            </label>
                            <input
                                className="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3"
                                id="email"
                                onChange={({ target }) =>
                                    setEmail(target.value)
                                }
                                type="email"
                                value={email}
                            />
                        </div>

                        <div className="mb-6 pt-3 rounded bg-gray-200">
                            <label
                                className="block text-gray-700 text-sm font-bold mb-2 ml-3"
                                htmlFor="password"
                            >
                                Password
                            </label>

                            <input
                                className="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3"
                                id="password"
                                onChange={({ target }) =>
                                    setPassword(target.value)
                                }
                                type="password"
                                value={password}
                            />
                        </div>
                        <div className="flex justify-end">
                            <a
                                href="#"
                                className="text-sm text-blue-600 hover:text-blue-700 hover:underline mb-6"
                            >
                                Forgot your password?
                            </a>
                        </div>
                        <button
                            className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200"
                            type="submit"
                        >
                            Sign In
                        </button>
                    </form>
                </section>
            </main>

            <div className="max-w-lg mx-auto text-center mt-12 mb-6">
                <p className="text-white">
                    Don't have an account?{" "}
                    <a href="#" className="font-bold hover:underline">
                        Sign up
                    </a>
                    .
                </p>
            </div>

            <footer className="max-w-lg mx-auto flex justify-center text-white">
                <a
                    href="https://github.com/Daniel730/technical-test"
                    className="hover:underline"
                    target="_blank"
                >
                    Github: @Daniel730
                </a>
            </footer>
        </>
    );
}

Login.propTypes = {
    setToken: PropTypes.func.isRequired,
};
