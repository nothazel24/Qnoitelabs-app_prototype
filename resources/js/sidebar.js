document.addEventListener("DOMContentLoaded", function () {
    window.opensidebar = function () {
        document.getElementById("offCanvas").style.width = "300px";
    };

    window.closeSidebar = function () {
        document.getElementById("offCanvas").style.width = "0";
    };
});
