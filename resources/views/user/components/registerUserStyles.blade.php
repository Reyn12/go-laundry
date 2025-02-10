<style>
    body {
        font-family: 'Inter', sans-serif;
    }
    .gradient-bg {
        background: linear-gradient(135deg, #1e3a8a 25%, #061C53 50%);
    }
    .floating {
        animation: float 6s ease-in-out infinite;
    }
    @keyframes float {
        0% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(2deg); }
        100% { transform: translateY(0px) rotate(0deg); }
    }
    .images-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 40px;
        align-items: flex-start;
        padding-top: 20px;
    }
    .image-card {
        width: 180px;
        height: 160px;
        perspective: 1000px;
        cursor: pointer;
    }
    .image-card.side-image {
        margin-top: -80px;
    }
    .image-wrapper {
        position: relative;
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transition: transform 0.5s ease;
    }
    .image-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
    }
    .image-1 {
        transform: rotate(-5deg);
    }
    .image-2 {
        transform: rotate(0deg);
    }
    .image-3 {
        transform: rotate(5deg);
    }
    .image-card:hover img {
        transform: translateY(-10px);
    }
    .popup-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        backdrop-filter: blur(5px);
    }
    .popup-content {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        border-radius: 20px;
        text-align: center;
        max-width: 90%;
        width: 400px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 1001;
    }
    .success-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        background: #4CAF50;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .success-icon svg {
        width: 40px;
        height: 40px;
        color: white;
    }
    .error-message {
        color: #dc2626;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: none;
    }
    input:invalid + .error-message {
        display: block;
    }
</style>