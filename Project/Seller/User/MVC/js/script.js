function toggleRegister() {
    let role = document.getElementById("role").value;
    let link = document.getElementById("registerLink");
    
    if (link) {
        link.style.display = (role === "seller" || role === "customer") ? "block" : "none";
    }
}


function showAlert(message) {
    if (message && message.trim() !== "") {
        alert(message);
    }
}