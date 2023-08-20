// Toggle menus
$("#user-menu-button").on("click", () => $("#user-settings-menu").toggle());
$("#mobile-user-menu-button").on("click", () => $("#mobile-menu").toggle());

// Set active page
let currentPath = $(location)
    .attr("pathname")
    .replace(/[^a-zA-Z0-9 ]/g, "");

console.log(currentPath);

currentPath = currentPath == "" ? "home" : currentPath;

$(`#nav-${currentPath}-mobile, #nav-${currentPath}`)
    .removeClass("text-gray-300 hover:bg-gray-700 hover:text-white")
    .addClass("bg-gray-900 text-white");
