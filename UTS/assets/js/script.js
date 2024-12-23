document.addEventListener("DOMContentLoaded", () => {
    const loginBtn = document.getElementById("loginBtn"); // Tombol Login
    const loginPopup = document.getElementById("loginPopup"); // Popup Login
    const registerPopup = document.getElementById("registerPopup"); // Popup Registrasi
    const closeLogin = document.getElementById("closeLogin"); // Tombol close untuk login
    const closeRegister = document.getElementById("closeRegister"); // Tombol close untuk registrasi
    const openRegisterLink = document.getElementById("openRegister"); // Link "Daftar di sini"
    const backToLoginLink = document.getElementById("backToLogin"); // Link "Kembali ke Login"

    // Fungsi untuk menampilkan pop-up Login
    if (loginBtn && loginPopup && closeLogin) {
        loginBtn.addEventListener("click", () => {
            console.log("Login button clicked!");
            loginPopup.style.display = "flex"; // Menampilkan pop-up login
        });

        closeLogin.addEventListener("click", () => {
            console.log("Close login popup!");
            loginPopup.style.display = "none"; // Menutup pop-up login
        });

        // Menutup pop-up jika klik di luar konten login
        loginPopup.addEventListener("click", (event) => {
            if (event.target === loginPopup) {
                console.log("Clicked outside login popup!");
                loginPopup.style.display = "none";
            }
        });
    }

    // Fungsi untuk menampilkan pop-up Registrasi
    if (openRegisterLink) {
        openRegisterLink.addEventListener("click", (event) => {
            event.preventDefault(); // Menghindari aksi default link
            loginPopup.style.display = "none"; // Menutup pop-up login
            registerPopup.style.display = "flex"; // Menampilkan pop-up registrasi
        });
    }

    // Kembali ke form login dari registrasi
    if (backToLoginLink) {
        backToLoginLink.addEventListener("click", (event) => {
            event.preventDefault(); // Menghindari aksi default link
            registerPopup.style.display = "none"; // Menutup pop-up registrasi
            loginPopup.style.display = "flex"; // Menampilkan pop-up login
        });
    }

    // Menutup pop-up registrasi dengan tombol close
    if (closeRegister) {
        closeRegister.addEventListener("click", () => {
            registerPopup.style.display = "none"; // Menutup pop-up registrasi
        });

        // Menutup pop-up registrasi jika klik di luar konten
        registerPopup.addEventListener("click", (event) => {
            if (event.target === registerPopup) {
                registerPopup.style.display = "none";
            }
        });
    }

});
