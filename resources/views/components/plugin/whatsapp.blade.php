<style>
    /* FLOATING BUTTON */
    .floating-wa {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 60px;
        height: 60px;
        background: #25D366;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 28px;
        z-index: 999;
        cursor: pointer;
        animation: bounce 2s infinite;
    }

    .notif {
        position: absolute;
        top: -5px;
        right: -5px;
        background: #ff0000;
        color: white;
        font-size: 12px;
        font-weight: bold;
        padding: 4px 7px;
        border-radius: 50%;
        box-shadow: 0 2px 5px rgba(0,0,0,0.3);
    }

    /* CHAT BOX */
    .wa-chat-box {
        position: fixed;
        bottom: 90px;
        right: 20px;
        width: 320px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        transform: translateY(100px);
        opacity: 0;
        pointer-events: none;
        transition: 0.3s ease;
        z-index: 999;
    }

    .wa-chat-box.active {
        transform: translateY(0);
        opacity: 1;
        pointer-events: auto;
    }

    /* HEADER */
    .wa-header {
        background: #25D366;
        color: white;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .wa-profile {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .wa-profile img {
        border-radius: 50%;
    }

    /* BODY */
    .wa-body {
        padding: 15px;
        background: #ece5dd;
    }

    .chat-bubble {
        background: white;
        padding: 10px;
        border-radius: 10px;
        max-width: 80%;
        font-size: 14px;
    }

    .time {
        font-size: 10px;
        text-align: right;
        color: gray;
    }

    /* FOOTER */
    .wa-footer {
        display: flex;
        border-top: 1px solid #ddd;
    }

    .wa-footer input {
        flex: 1;
        border: none;
        padding: 10px;
    }

    .wa-footer button {
        background: #25D366;
        color: white;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
    }

    /* ANIMATIONS */
    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }
    }

    /* MOBILE */
    @media (max-width: 500px) {
        .wa-chat-box {
            width: 90%;
            right: 5%;
            bottom: 80px;
        }
    }
</style>

<script>
    function toggleChat() {
        let chat = document.getElementById("wa-chat");
        chat.classList.toggle("active");

        // hilangkan notif saat dibuka
        document.querySelector(".notif").style.display = "none";
    }

    // auto muncul setelah 5 detik
    setTimeout(() => {
        document.getElementById("wa-chat").classList.add("active");
    }, 5000);

    function sendWA() {
        let message = document.getElementById("wa-message").value;
        let phone = "6285785807170";

        let url = "https://wa.me/" + phone + "?text=" + encodeURIComponent(message);
        window.open(url, "_blank");
    }
</script>



<div id="wa-chat" class="wa-chat-box">

    <!-- HEADER -->
    <div class="wa-header" onclick="toggleChat()">
        <div class="wa-profile">
            <img src="https://i.pravatar.cc/40" alt="admin">
            <div>
                <strong>Rahma - Educativa</strong><br>
                <small>Online</small>
            </div>
        </div>
        <span>✕</span>
    </div>

    <!-- BODY -->
    <div class="wa-body">
        <div class="chat-bubble">
            Halo! 👋<br>Apa yang bisa kami bantu?
            <div class="time">14:13</div>
        </div>
    </div>

    <!-- INPUT -->
    <div class="wa-footer">
        <input type="text" id="wa-message" placeholder="Tulis pesan disini...">
        <button onclick="sendWA()">➤</button>
    </div>

</div>



<a href="javascript:void(0)" class="floating-wa" onclick="toggleChat()">
    <span class="notif">1</span>
    <i class="fab fa-whatsapp"></i>
</a>