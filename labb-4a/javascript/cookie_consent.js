document.addEventListener('DOMContentLoaded', function() {
    const cookieBanner = document.getElementById('cookie-consent-terms');
    const acceptButton = document.getElementById('accept-cookie');

    // Kollar om användaren redan har accepterat kakan
    if (!getCookie('theBlogCookie')) {
        cookieBanner.style.display = 'block';
    }

    // Sätt kakan på Acceptera (knapp) klick
    acceptButton.addEventListener('click', function() {
        setCookie('theBlogCookie', 'true', 7); // Skickar med hur många dagar kakan ska sparas (7)
        cookieBanner.style.display = 'none';
    });

    // Skapar kakan
    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    // Hämtar kakan
    function getCookie(name) {
        const cookieName = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(cookieName) == 0) return c.substring(cookieName.length, c.length);
        }
        return null;
    }
});



    