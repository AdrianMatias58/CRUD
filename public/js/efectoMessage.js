function Efecto_Message(elementId, duration) {
    const message = document.getElementById(elementId);
    if (message) {
        setTimeout(() => {
            message.style.transition = "opacity 0.5s ease, transform 0.5s ease";
            message.style.opacity = "0";
            setTimeout(() => {
                message.remove();
            }, 500);
        }, duration);
    }
}
