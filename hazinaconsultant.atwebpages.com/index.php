<?php
// index.php - Complete Hazina Consultancy Website with All Images
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hazina Consultancy </title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background: #ffffff;
        }

        :root {
            --primary-blue: #1e3c72;
            --secondary-green: #27ae60;
            --accent-gold: #f1c40f;
            --light-bg: #f8f9fa;
            --dark-blue: #0a1f3b;
        }

        /* Logo Styles */
        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-img {
            width: 80px;
            height: 80px;
            background: color:#ffffff);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            position: relative;
            overflow: hidden;
        }

        .logo-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
        }

        .logo-text {
            line-height: 1.2;
        }

        .logo-main {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-blue);
            letter-spacing: -0.5px;
        }

        .logo-tagline {
            font-size: 18px;
            color: var(--secondary-green);
            font-style: italic;
            font-weight: 500;
            position: relative;
            padding-left: 20px;
        }

        .logo-tagline::before {
            content: '✦';
            position: absolute;
            left: 0;
            color: var(--accent-gold);
        }

        /* Navigation */
        .navbar {
            background: white;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            padding: 15px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s;
        }

        .navbar-scrolled {
            padding: 10px 0;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
        }

        .nav-link {
            color: var(--primary-blue) !important;
            font-weight: 500;
            margin: 0 10px;
            position: relative;
            padding: 5px 0 !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--secondary-green);
            transition: width 0.3s;
        }

        .nav-link:hover::after {
            width: 80%;
        }

        .btn-enroll {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-green));
            color: white !important;
            padding: 10px 25px !important;
            border-radius: 50px;
            transition: all 0.3s;
            margin-left: 15px;
        }

        .btn-enroll:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
        }

        /* Hero Section */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            margin-top: 0;
            padding-top: 80px;
            overflow: hidden;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .hero-background img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.3);
        }

        .hero-content {
            color: white;
            position: relative;
            z-index: 2;
            padding: 50px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 20px;
            animation: fadeInUp 1s ease;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            animation: fadeInUp 1s ease 0.2s;
            animation-fill-mode: both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Sections */
        .section {
            padding: 100px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            color: var(--primary-blue);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--secondary-green);
        }

        .section-title p {
            color: #666;
            font-size: 1.1rem;
        }

        /* Cards */
        .service-card, .course-card, .gallery-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s;
            height: 100%;
            margin-bottom: 30px;
        }

        .service-card:hover, .course-card:hover, .gallery-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .card-image {
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .service-card:hover .card-image img,
        .course-card:hover .card-image img,
        .gallery-card:hover .card-image img {
            transform: scale(1.1);
        }

        .card-content {
            padding: 25px;
        }

        .card-content h3 {
            color: var(--primary-blue);
            font-size: 1.3rem;
            margin-bottom: 10px;
        }

        .card-content p {
            color: #666;
            margin-bottom: 15px;
        }

        .card-meta {
            display: flex;
            gap: 15px;
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .card-meta i {
            color: var(--secondary-green);
            margin-right: 5px;
        }

        .price-tag {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--secondary-green);
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: bold;
            font-size: 1.2rem;
            z-index: 2;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .location-tag {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.9rem;
            z-index: 2;
        }

        .location-tag i {
            color: var(--secondary-green);
            margin-right: 5px;
        }

        .btn-course, .btn-service {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 50px;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-green));
            color: white;
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn-course:hover, .btn-service:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
        }

        /* Gallery Grid */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            height: 250px;
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: white;
            padding: 20px;
            transform: translateY(100%);
            transition: transform 0.3s;
        }

        .gallery-item:hover .gallery-overlay {
            transform: translateY(0);
        }

        .gallery-overlay h4 {
            margin: 0;
            font-size: 1.1rem;
        }

        .gallery-overlay p {
            margin: 5px 0 0;
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Contact Section */
        .contact {
            background: var(--light-bg);
        }

        .contact-info {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-green));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            flex-shrink: 0;
        }

        /* Footer */
        .footer {
            background: var(--dark-blue);
            color: white;
            padding: 60px 0 20px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .footer-logo .logo-img {
            width: 50px;
            height: 50px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s;
            text-decoration: none;
        }

        .social-links a:hover {
            background: var(--secondary-green);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 40px;
            margin-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        /* Payment Popup */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: 2000;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(5px);
        }

        .popup-container {
            background: white;
            border-radius: 20px;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .popup-header {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-green));
            color: white;
            padding: 20px;
            border-radius: 20px 20px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .close-popup {
            background: none;
            border: none;
            color: white;
            font-size: 28px;
            cursor: pointer;
        }

        .popup-body {
            padding: 30px;
        }

        .payment-method-card {
            border: 2px solid #eee;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .payment-method-card:hover,
        .payment-method-card.selected {
            border-color: var(--secondary-green);
            background: #f0fff0;
        }

        .method-logo {
            width: 50px;
            height: 50px;
            background: var(--primary-blue);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .btn-pay {
            width: 100%;
            padding: 15px;
            background: var(--secondary-green);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 20px;
            transition: all 0.3s;
        }

        .btn-pay:hover {
            background: var(--primary-blue);
            transform: translateY(-2px);
        }

        .transaction-status {
            text-align: center;
            padding: 20px;
            display: none;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid var(--secondary-green);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .logo-main {
                font-size: 20px;
            }
        }
            /* QR Code Section Styles */
.qr-section {
    text-align: center;
    margin-top: 25px;
    padding: 20px;
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
    border-radius: 15px;
    border: 2px dashed var(--secondary-green);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.qr-section:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(39, 174, 96, 0.2);
    border-color: var(--primary-blue);
}

.qr-section::before {
    content: '';
    position: absolute;
    top: -10px;
    left: -10px;
    right: -10px;
    bottom: -10px;
    background: linear-gradient(135deg, transparent 50%, rgba(39, 174, 96, 0.05) 50%);
    z-index: 1;
    pointer-events: none;
}

.qr-code-container {
    margin-bottom: 15px;
    position: relative;
    z-index: 2;
}

.qr-code-container img {
    width: 160px;
    height: 160px;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
    border: 3px solid white;
}

.qr-code-container img:hover {
    transform: scale(1.05);
    box-shadow: 0 15px 30px rgba(39, 174, 96, 0.3);
}

.qr-text {
    position: relative;
    z-index: 2;
}

.qr-text p:first-child {
    color: var(--primary-blue);
    font-weight: 600;
    font-size: 1rem;
    margin-bottom: 5px;
}

.qr-text p:first-child i {
    color: var(--secondary-green);
    animation: pulse 2s infinite;
}

.qr-text p:last-child {
    color: #666;
    font-size: 0.85rem;
}

.whatsapp-option {
    margin-top: 15px;
    position: relative;
    z-index: 2;
}

.whatsapp-option a {
    background: #25D366;
    color: white;
    padding: 10px 25px;
    border-radius: 50px;
    display: inline-block;
    font-size: 0.95rem;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s;
    box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
}

.whatsapp-option a:hover {
    background: #128C7E;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(18, 140, 126, 0.4);
}

/* Animation for QR Code */
@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
        color: var(--primary-blue);
    }
    100% {
        transform: scale(1);
    }
}

/* QR Code Badge (Optional) */
.qr-badge {
    position: absolute;
    top: -5px;
    right: 15px;
    background: var(--secondary-green);
    color: white;
    padding: 5px 15px;
    border-radius: 50px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    z-index: 3;
}
            /*=============================================
   BOTTOM NAVIGATION BAR - MOBILE & TABLET
=============================================*/

/* Bottom Navigation Container */
.bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: white;
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 8px 0 12px;
    box-shadow: 0 -5px 20px rgba(0,0,0,0.15);
    z-index: 9999;
    border-top: 2px solid var(--secondary-green);
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.98);
    transition: all 0.3s ease;
}

/* Bottom Navigation Items */
.bottom-nav-item {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-decoration: none;
    color: #95a5a6;
    font-size: 0.7rem;
    transition: all 0.3s ease;
    position: relative;
    padding: 8px 0;
}

.bottom-nav-item i {
    font-size: 1.3rem;
    margin-bottom: 2px;
    transition: all 0.3s ease;
}

.bottom-nav-item span {
    font-size: 0.65rem;
    font-weight: 500;
}

/* Active State */
.bottom-nav-item.active {
    color: var(--secondary-green);
    transform: translateY(-3px);
}

.bottom-nav-item.active i {
    text-shadow: 0 3px 8px rgba(39, 174, 96, 0.4);
}

/* Hover Effect */
.bottom-nav-item:hover {
    color: var(--primary-blue);
}

/* Active Indicator Line */
.bottom-nav-item.active::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 50%;
    transform: translateX(-50%);
    width: 25px;
    height: 3px;
    background: var(--secondary-green);
    border-radius: 3px;
    animation: slideIn 0.3s ease;
}

/* Action Button (Center - Optional) */
.nav-action-button {
    position: relative;
    margin-top: -25px;
}

.action-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 55px;
    height: 55px;
    background: linear-gradient(135deg, var(--primary-blue), var(--secondary-green));
    border-radius: 50%;
    color: white;
    font-size: 1.5rem;
    text-decoration: none;
    box-shadow: 0 5px 15px rgba(39, 174, 96, 0.4);
    transition: all 0.3s ease;
    border: 3px solid white;
}

.action-btn:hover {
    transform: rotate(90deg) scale(1.1);
    box-shadow: 0 8px 25px rgba(39, 174, 96, 0.6);
}

/* Spacer to prevent content hiding behind bottom nav */
.bottom-nav-spacer {
    height: 70px;
    width: 100%;
    display: none;
}

/* Badge for notifications (Optional) */
.bottom-nav-item .badge {
    position: absolute;
    top: 0;
    right: 15px;
    background: var(--danger-red);
    color: white;
    font-size: 0.55rem;
    padding: 2px 5px;
    border-radius: 50px;
    min-width: 18px;
    text-align: center;
}

/*=============================================
   RESPONSIVE BREAKPOINTS
=============================================*/

/* Hide bottom nav on desktop (above 992px) */
@media (min-width: 993px) {
    .bottom-nav {
        display: none;
    }
    .bottom-nav-spacer {
        display: none;
    }
}

/* Show bottom nav on tablets (768px - 992px) */
@media (min-width: 768px) and (max-width: 992px) {
    .bottom-nav {
        display: flex;
        padding: 10px 0 15px;
    }
    
    .bottom-nav-item i {
        font-size: 1.5rem;
    }
    
    .bottom-nav-item span {
        font-size: 0.75rem;
    }
    
    .bottom-nav-spacer {
        display: block;
        height: 80px;
    }
    
    /* Adjust main content padding */
    .main-content, 
    .container:last-of-type {
        margin-bottom: 20px;
    }
}

/* Show bottom nav on mobile (below 768px) */
@media (max-width: 767px) {
    .bottom-nav {
        display: flex;
        padding: 5px 0 10px;
    }
    
    .bottom-nav-item i {
        font-size: 1.2rem;
    }
    
    .bottom-nav-item span {
        font-size: 0.6rem;
    }
    
    .bottom-nav-spacer {
        display: block;
        height: 65px;
    }
    
    /* Hide regular navigation on mobile */
    .navbar .nav-links,
    .navbar .nav-menu {
        display: none;
    }
    
    /* Optional: Show mobile menu button */
    .navbar .mobile-menu-btn {
        display: block;
    }
}

/*=============================================
   ANIMATIONS
=============================================*/
@keyframes slideIn {
    from {
        width: 0;
        opacity: 0;
    }
    to {
        width: 25px;
        opacity: 1;
    }
}

/* Bottom nav show/hide on scroll */
.bottom-nav.hide {
    transform: translateY(100%);
}

.bottom-nav.show {
    transform: translateY(0);
}

/* Ripple effect on click */
.bottom-nav-item:active {
    background: rgba(39, 174, 96, 0.1);
    border-radius: 10px;
}
            /*=============================================
   KNOWLEDGE IS WEALTH AI - IMAGE BUTTON STYLES
=============================================*/

/* AI Image Button - Desktop */
.ai-image-button {
    position: fixed;
    bottom: 30px;
    right: 30px;
    cursor: pointer;
    z-index: 9998;
    animation: floatImage 3s ease-in-out infinite;
}

.ai-image-container {
    position: relative;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea, #764ba2);
    padding: 3px;
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
    transition: all 0.3s ease;
}

.ai-button-image {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid white;
    transition: all 0.3s ease;
}

.ai-image-container:hover {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 20px 40px rgba(102, 126, 234, 0.6);
}

.ai-image-glow {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 50%;
    background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.8), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
}

.ai-image-container:hover .ai-image-glow {
    opacity: 0.3;
}

/* AI Image Tooltip */
.ai-image-tooltip {
    position: absolute;
    right: 100%;
    top: 50%;
    transform: translateY(-50%);
    margin-right: 20px;
    background: white;
    padding: 12px 20px;
    border-radius: 50px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    pointer-events: none;
    border-left: 4px solid #667eea;
}

.ai-image-button:hover .ai-image-tooltip {
    opacity: 1;
    visibility: visible;
    transform: translateY(-50%) translateX(-10px);
}

.tooltip-text {
    font-weight: 700;
    color: #1e3c72;
    font-size: 0.9rem;
    letter-spacing: 0.5px;
}

.tooltip-status {
    font-size: 0.7rem;
    color: #4ade80;
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 3px;
}

.tooltip-status::before {
    content: '';
    width: 8px;
    height: 8px;
    background: #4ade80;
    border-radius: 50%;
    display: inline-block;
    animation: pulseStatus 2s infinite;
}

/*=============================================
   AI CHAT POPUP STYLES
=============================================*/

.ai-chat-popup {
    position: fixed;
    bottom: 120px;
    right: 30px;
    width: 380px;
    height: 600px;
    background: white;
    border-radius: 25px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
    display: none;
    flex-direction: column;
    overflow: hidden;
    z-index: 9999;
    animation: slideInUp 0.3s ease;
    border: 2px solid linear-gradient(135deg, #667eea, #764ba2);
}

.ai-chat-popup.open {
    display: flex;
}

.ai-popup-header {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.ai-header-brand {
    display: flex;
    align-items: center;
    gap: 15px;
}

.ai-header-image {
    width: 45px;
    height: 45px;
    border-radius: 15px;
    overflow: hidden;
    background: white;
    padding: 3px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.ai-header-image img {
    width: 100%;
    height: 100%;
    border-radius: 12px;
    object-fit: cover;
}

.ai-header-text h4 {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
}

.ai-header-text p {
    margin: 5px 0 0;
    font-size: 0.75rem;
    opacity: 0.9;
    display: flex;
    align-items: center;
    gap: 5px;
}

.ai-status-dot {
    width: 8px;
    height: 8px;
    background: #4ade80;
    border-radius: 50%;
    display: inline-block;
    animation: statusPulse 2s infinite;
}

.ai-header-actions {
    display: flex;
    gap: 10px;
}

.ai-minimize-btn,
.ai-close-btn {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: white;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(5px);
}

.ai-minimize-btn:hover,
.ai-close-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
}

.ai-close-btn:hover {
    background: #ef4444;
}

/* Chat Messages Area */
.ai-chat-messages {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
    background: #f8fafc;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* Message Styles */
.ai-message {
    display: flex;
    gap: 10px;
    max-width: 85%;
    animation: fadeIn 0.3s ease;
}

.ai-bot-message {
    align-self: flex-start;
}

.ai-user-message {
    align-self: flex-end;
    flex-direction: row-reverse;
}

.ai-message-avatar {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea, #764ba2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
    flex-shrink: 0;
}

.ai-user-message .ai-message-avatar {
    background: #4ade80;
}

.ai-message-content {
    background: white;
    padding: 12px 15px;
    border-radius: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    position: relative;
}

.ai-bot-message .ai-message-content {
    border-bottom-left-radius: 5px;
}

.ai-user-message .ai-message-content {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border-bottom-right-radius: 5px;
}

.ai-message-content p {
    margin: 0;
    font-size: 0.9rem;
    line-height: 1.5;
}

.ai-message-time {
    font-size: 0.6rem;
    opacity: 0.7;
    margin-top: 5px !important;
}

/* Quick Questions */
.ai-quick-questions {
    padding: 15px;
    background: white;
    border-top: 1px solid #edf2f7;
    display: flex;
    gap: 8px;
    overflow-x: auto;
    white-space: nowrap;
    scrollbar-width: thin;
}

.ai-quick-questions button {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #4a5568;
    padding: 8px 15px;
    border-radius: 50px;
    font-size: 0.75rem;
    cursor: pointer;
    transition: all 0.3s;
    white-space: nowrap;
}

.ai-quick-questions button:hover {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border-color: transparent;
    transform: translateY(-2px);
}

/* Chat Input Area */
.ai-chat-input-area {
    padding: 15px;
    background: white;
    border-top: 1px solid #edf2f7;
    display: flex;
    gap: 10px;
}

.ai-chat-input-area input {
    flex: 1;
    padding: 12px 15px;
    border: 2px solid #edf2f7;
    border-radius: 25px;
    font-size: 0.9rem;
    transition: all 0.3s;
}

.ai-chat-input-area input:focus {
    border-color: #667eea;
    outline: none;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.ai-send-btn {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border: none;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
}

.ai-send-btn:hover {
    transform: scale(1.1) rotate(15deg);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

/* Typing Indicator */
.ai-typing {
    background: white;
    padding: 12px 20px;
    border-radius: 20px;
    display: inline-flex;
    gap: 5px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.ai-typing span {
    width: 8px;
    height: 8px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    animation: typingBounce 1.4s infinite;
}

.ai-typing span:nth-child(2) {
    animation-delay: 0.2s;
}

.ai-typing span:nth-child(3) {
    animation-delay: 0.4s;
}

/* Powered By */
.ai-powered-by {
    padding: 10px;
    text-align: center;
    background: #f8fafc;
    border-top: 1px solid #edf2f7;
}

.ai-powered-by small {
    color: #94a3b8;
    font-size: 0.65rem;
}

/* Animations */
@keyframes floatImage {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}

@keyframes pulseStatus {
    0% { box-shadow: 0 0 0 0 rgba(74, 222, 128, 0.7); }
    70% { box-shadow: 0 0 0 10px rgba(74, 222, 128, 0); }
    100% { box-shadow: 0 0 0 0 rgba(74, 222, 128, 0); }
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes typingBounce {
    0%, 60%, 100% { transform: translateY(0); }
    30% { transform: translateY(-8px); }
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Mobile Styles */
@media (max-width: 768px) {
    .ai-image-button {
        display: none;
    }
    
    .ai-chat-popup {
        width: 100%;
        height: 100%;
        bottom: 0;
        right: 0;
        border-radius: 0;
    }
    
    .ai-quick-questions button {
        padding: 6px 12px;
        font-size: 0.7rem;
    }
}

@media (min-width: 769px) {
    .ai-image-button {
        display: flex;
    }
}
            /* Mobile AI Button Styles */
.nav-ai-image-container {
    position: relative;
    margin-top: -30px;
    z-index: 10000;
}

.ai-mobile-image-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 65px;
    height: 65px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.5);
    transition: all 0.3s ease;
    border: 3px solid white;
    animation: mobilePulse 2s infinite;
    position: relative;
    overflow: hidden;
}

.ai-mobile-image {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    transition: all 0.3s ease;
}

.ai-mobile-image-btn:hover {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.7);
}

.ai-mobile-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: #ffd700;
    color: #1e3c72;
    font-size: 0.65rem;
    font-weight: 700;
    padding: 3px 6px;
    border-radius: 50px;
    border: 2px solid white;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

@keyframes mobilePulse {
    0% { box-shadow: 0 10px 25px rgba(102, 126, 234, 0.5); }
    50% { box-shadow: 0 15px 35px rgba(102, 126, 234, 0.8); }
    100% { box-shadow: 0 10px 25px rgba(102, 126, 234, 0.5); }
}
            /*=============================================
   KNOWLEDGE IS WEALTH AI - CHATGPT STYLE
=============================================*/

/* AI Image Button - Desktop */
.ai-image-button {
    position: fixed;
    bottom: 30px;
    right: 30px;
    cursor: pointer;
    z-index: 9998;
    animation: floatImage 3s ease-in-out infinite;
}

.ai-image-container {
    position: relative;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea, #764ba2);
    padding: 3px;
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
    transition: all 0.3s ease;
}

.ai-button-image {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid white;
    transition: all 0.3s ease;
}

.ai-image-container:hover {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 20px 40px rgba(102, 126, 234, 0.6);
}

.ai-image-tooltip {
    position: absolute;
    right: 100%;
    top: 50%;
    transform: translateY(-50%);
    margin-right: 20px;
    background: white;
    padding: 12px 20px;
    border-radius: 50px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    border-left: 4px solid #667eea;
}

.ai-image-button:hover .ai-image-tooltip {
    opacity: 1;
    visibility: visible;
    transform: translateY(-50%) translateX(-10px);
}

.tooltip-text {
    font-weight: 700;
    color: #1e3c72;
    font-size: 0.9rem;
}

.tooltip-status {
    font-size: 0.7rem;
    color: #4ade80;
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 3px;
}

/* AI Chat Popup */
.ai-chat-popup {
    position: fixed;
    bottom: 120px;
    right: 30px;
    width: 420px;
    height: 650px;
    background: white;
    border-radius: 25px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    display: none;
    flex-direction: column;
    overflow: hidden;
    z-index: 9999;
    animation: slideInUp 0.3s ease;
    border: 1px solid rgba(102, 126, 234, 0.2);
}

.ai-chat-popup.open {
    display: flex;
}

/* Header */
.ai-popup-header {
    background: linear-gradient(135deg, #1e3c72, #2c3e50);
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.ai-header-brand {
    display: flex;
    align-items: center;
    gap: 12px;
}

.ai-header-image {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    overflow: hidden;
    background: white;
    padding: 2px;
}

.ai-header-image img {
    width: 100%;
    height: 100%;
    border-radius: 10px;
    object-fit: cover;
}

.ai-header-text h4 {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
}

.ai-header-text p {
    margin: 3px 0 0;
    font-size: 0.7rem;
    opacity: 0.9;
    display: flex;
    align-items: center;
    gap: 5px;
}

.ai-status-dot {
    width: 8px;
    height: 8px;
    background: #4ade80;
    border-radius: 50%;
    display: inline-block;
    animation: pulseStatus 2s infinite;
}

.ai-header-actions {
    display: flex;
    gap: 8px;
}

.ai-clear-btn,
.ai-close-btn {
    background: rgba(255, 255, 255, 0.15);
    border: none;
    color: white;
    width: 32px;
    height: 32px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
}

.ai-clear-btn:hover,
.ai-close-btn:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: scale(1.1);
}

.ai-clear-btn:hover {
    background: #ef4444;
}

/* Chat Messages */
.ai-chat-messages {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
    background: #ffffff;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.ai-message {
    display: flex;
    gap: 12px;
    max-width: 100%;
    animation: fadeIn 0.3s ease;
}

.ai-bot-message {
    align-self: flex-start;
}

.ai-user-message {
    align-self: flex-end;
    flex-direction: row-reverse;
}

.ai-message-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea, #764ba2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
    flex-shrink: 0;
}

.ai-user-message .ai-message-avatar {
    background: #4ade80;
}

.ai-message-content {
    background: #f8fafc;
    padding: 12px 16px;
    border-radius: 18px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    max-width: 85%;
}

.ai-bot-message .ai-message-content {
    border-bottom-left-radius: 5px;
    background: #f0f4ff;
}

.ai-user-message .ai-message-content {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border-bottom-right-radius: 5px;
}

.ai-message-content p {
    margin: 0 0 8px 0;
    font-size: 0.95rem;
    line-height: 1.5;
}

.ai-message-time {
    font-size: 0.6rem;
    opacity: 0.7;
    margin-top: 5px !important;
}

/* Quick Suggestions */
.ai-quick-suggestions {
    padding: 12px 15px;
    background: white;
    border-top: 1px solid #edf2f7;
    display: flex;
    gap: 8px;
    overflow-x: auto;
    white-space: nowrap;
}

.ai-quick-suggestions button {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #4a5568;
    padding: 8px 15px;
    border-radius: 50px;
    font-size: 0.75rem;
    cursor: pointer;
    transition: all 0.3s;
    white-space: nowrap;
}

.ai-quick-suggestions button:hover {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border-color: transparent;
    transform: translateY(-2px);
}

/* Chat Input */
.ai-chat-input-area {
    padding: 15px;
    background: white;
    border-top: 1px solid #edf2f7;
    display: flex;
    gap: 10px;
    align-items: flex-end;
}

.ai-chat-input-area textarea {
    flex: 1;
    padding: 12px 15px;
    border: 2px solid #edf2f7;
    border-radius: 25px;
    font-size: 0.95rem;
    transition: all 0.3s;
    font-family: inherit;
    max-height: 120px;
    min-height: 45px;
    resize: none;
}

.ai-chat-input-area textarea:focus {
    border-color: #667eea;
    outline: none;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.ai-send-btn {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border: none;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.ai-send-btn:hover {
    transform: scale(1.1) rotate(15deg);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
}

/* Typing Indicator */
.ai-typing {
    background: #f0f4ff;
    padding: 15px 20px;
    border-radius: 20px;
    display: inline-flex;
    gap: 5px;
}

.ai-typing span {
    width: 8px;
    height: 8px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    animation: typingBounce 1.4s infinite;
}

.ai-typing span:nth-child(2) {
    animation-delay: 0.2s;
}

.ai-typing span:nth-child(3) {
    animation-delay: 0.4s;
}

/* Powered By */
.ai-powered-by {
    padding: 8px;
    text-align: center;
    background: #f8fafc;
    border-top: 1px solid #edf2f7;
}

.ai-powered-by small {
    color: #94a3b8;
    font-size: 0.6rem;
}

/* Animations */
@keyframes floatImage {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes typingBounce {
    0%, 60%, 100% { transform: translateY(0); }
    30% { transform: translateY(-8px); }
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulseStatus {
    0% { box-shadow: 0 0 0 0 rgba(74, 222, 128, 0.7); }
    70% { box-shadow: 0 0 0 10px rgba(74, 222, 128, 0); }
    100% { box-shadow: 0 0 0 0 rgba(74, 222, 128, 0); }
}

/* Mobile */
@media (max-width: 768px) {
    .ai-chat-popup {
        width: 100%;
        height: 100%;
        bottom: 0;
        right: 0;
        border-radius: 0;
    }
}

@media (min-width: 769px) {
    .ai-image-button {
        display: flex;
    }
}
            /*=============================================
   KNOWLEDGE IS WEALTH AI - FIXED VERSION
=============================================*/

/* AI Image Button - Desktop */
.ai-image-button {
    position: fixed !important;
    bottom: 30px !important;
    right: 30px !important;
    cursor: pointer !important;
    z-index: 999999 !important;
    animation: floatImage 3s ease-in-out infinite;
}

.ai-image-container {
    position: relative;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea, #764ba2);
    padding: 3px;
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
    transition: all 0.3s ease;
}

.ai-button-image {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid white;
    transition: all 0.3s ease;
}

.ai-image-container:hover {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 20px 40px rgba(102, 126, 234, 0.6);
}

.ai-image-tooltip {
    position: absolute;
    right: 100%;
    top: 50%;
    transform: translateY(-50%);
    margin-right: 20px;
    background: white;
    padding: 12px 20px;
    border-radius: 50px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    border-left: 4px solid #667eea;
    z-index: 999999;
}

.ai-image-button:hover .ai-image-tooltip {
    opacity: 1;
    visibility: visible;
    transform: translateY(-50%) translateX(-10px);
}

.tooltip-text {
    font-weight: 700;
    color: #1e3c72;
    font-size: 0.9rem;
}

.tooltip-status {
    font-size: 0.7rem;
    color: #4ade80;
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 3px;
}

/* AI Chat Popup - FIXED */
.ai-chat-popup {
    position: fixed !important;
    bottom: 100px !important;
    right: 30px !important;
    width: 420px !important;
    height: 600px !important;
    background: white !important;
    border-radius: 25px !important;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3) !important;
    display: none;
    flex-direction: column;
    overflow: hidden !important;
    z-index: 2147483647 !important; /* Maximum z-index */
    border: 1px solid rgba(102, 126, 234, 0.2) !important;
}

.ai-chat-popup.open {
    display: flex !important;
}

/* Header */
.ai-popup-header {
    background: linear-gradient(135deg, #1e3c72, #2c3e50);
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.ai-header-brand {
    display: flex;
    align-items: center;
    gap: 12px;
}

.ai-header-image {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    overflow: hidden;
    background: white;
    padding: 2px;
}

.ai-header-image img {
    width: 100%;
    height: 100%;
    border-radius: 10px;
    object-fit: cover;
}

.ai-header-text h4 {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
}

.ai-header-text p {
    margin: 3px 0 0;
    font-size: 0.7rem;
    opacity: 0.9;
    display: flex;
    align-items: center;
    gap: 5px;
}

.ai-status-dot {
    width: 8px;
    height: 8px;
    background: #4ade80;
    border-radius: 50%;
    display: inline-block;
    animation: pulseStatus 2s infinite;
}

.ai-header-actions {
    display: flex;
    gap: 8px;
}

.ai-clear-btn,
.ai-close-btn {
    background: rgba(255, 255, 255, 0.15);
    border: none;
    color: white;
    width: 32px;
    height: 32px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
}

.ai-clear-btn:hover,
.ai-close-btn:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: scale(1.1);
}

.ai-clear-btn:hover {
    background: #ef4444;
}

/* Chat Messages */
.ai-chat-messages {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
    background: #ffffff;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.ai-message {
    display: flex;
    gap: 12px;
    max-width: 100%;
    animation: fadeIn 0.3s ease;
}

.ai-bot-message {
    align-self: flex-start;
}

.ai-user-message {
    align-self: flex-end;
    flex-direction: row-reverse;
}

.ai-message-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea, #764ba2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
    flex-shrink: 0;
}

.ai-user-message .ai-message-avatar {
    background: #4ade80;
}

.ai-message-content {
    background: #f8fafc;
    padding: 12px 16px;
    border-radius: 18px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    max-width: 85%;
}

.ai-bot-message .ai-message-content {
    border-bottom-left-radius: 5px;
    background: #f0f4ff;
}

.ai-user-message .ai-message-content {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border-bottom-right-radius: 5px;
}

.ai-message-content p {
    margin: 0 0 8px 0;
    font-size: 0.95rem;
    line-height: 1.5;
}

.ai-message-time {
    font-size: 0.6rem;
    opacity: 0.7;
    margin-top: 5px !important;
}

/* Quick Suggestions */
.ai-quick-suggestions {
    padding: 12px 15px;
    background: white;
    border-top: 1px solid #edf2f7;
    display: flex;
    gap: 8px;
    overflow-x: auto;
    white-space: nowrap;
}

.ai-quick-suggestions button {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #4a5568;
    padding: 8px 15px;
    border-radius: 50px;
    font-size: 0.75rem;
    cursor: pointer;
    transition: all 0.3s;
    white-space: nowrap;
}

.ai-quick-suggestions button:hover {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border-color: transparent;
    transform: translateY(-2px);
}

/* Chat Input */
.ai-chat-input-area {
    padding: 15px;
    background: white;
    border-top: 1px solid #edf2f7;
    display: flex;
    gap: 10px;
    align-items: flex-end;
}

.ai-chat-input-area textarea {
    flex: 1;
    padding: 12px 15px;
    border: 2px solid #edf2f7;
    border-radius: 25px;
    font-size: 0.95rem;
    transition: all 0.3s;
    font-family: inherit;
    max-height: 120px;
    min-height: 45px;
    resize: none;
}

.ai-chat-input-area textarea:focus {
    border-color: #667eea;
    outline: none;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.ai-send-btn {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border: none;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.ai-send-btn:hover {
    transform: scale(1.1) rotate(15deg);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
}

/* Typing Indicator */
.ai-typing {
    background: #f0f4ff;
    padding: 15px 20px;
    border-radius: 20px;
    display: inline-flex;
    gap: 5px;
}

.ai-typing span {
    width: 8px;
    height: 8px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    animation: typingBounce 1.4s infinite;
}

.ai-typing span:nth-child(2) {
    animation-delay: 0.2s;
}

.ai-typing span:nth-child(3) {
    animation-delay: 0.4s;
}

/* Powered By */
.ai-powered-by {
    padding: 8px;
    text-align: center;
    background: #f8fafc;
    border-top: 1px solid #edf2f7;
}

.ai-powered-by small {
    color: #94a3b8;
    font-size: 0.6rem;
}

/* Animations */
@keyframes floatImage {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes typingBounce {
    0%, 60%, 100% { transform: translateY(0); }
    30% { transform: translateY(-8px); }
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulseStatus {
    0% { box-shadow: 0 0 0 0 rgba(74, 222, 128, 0.7); }
    70% { box-shadow: 0 0 0 10px rgba(74, 222, 128, 0); }
    100% { box-shadow: 0 0 0 0 rgba(74, 222, 128, 0); }
}

/* Mobile */
@media (max-width: 768px) {
    .ai-chat-popup {
        width: 100% !important;
        height: 100% !important;
        bottom: 0 !important;
        right: 0 !important;
        border-radius: 0 !important;
    }
    
    .ai-image-button {
        display: none !important;
    }
}

@media (min-width: 769px) {
    .ai-image-button {
        display: flex !important;
    }
}
            /* Force override any existing styles */
.ai-chat-popup {
    display: none !important;
}
.ai-chat-popup.open {
    display: flex !important;
    opacity: 1 !important;
    visibility: visible !important;
}
            /*=============================================
   DESKTOP FIX - OVERRIDE ALL
=============================================*/

/* Force desktop display */
@media screen and (min-width: 769px) {
    /* Hakikisha button inaonekana */
    .ai-image-button {
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
        position: fixed !important;
        bottom: 30px !important;
        right: 30px !important;
        z-index: 9999999 !important;
    }
    
    /* Hakikisha popup inaweza kuonekana */
    .ai-chat-popup {
        position: fixed !important;
        bottom: 120px !important;
        right: 30px !important;
        width: 420px !important;
        height: 600px !important;
        background: white !important;
        border-radius: 25px !important;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3) !important;
        z-index: 99999999 !important;
        display: none !important;
    }
    
    .ai-chat-popup.open {
        display: flex !important;
    }
    
    /* Remove any hiding conditions */
    .ai-chat-popup,
    .ai-image-button {
        transform: none !important;
        visibility: visible !important;
        opacity: 1 !important;
    }
}

/* Hakikisha hakuna media query inayoficha desktop button */
@media (max-width: 768px) {
    .ai-image-button {
        display: none !important; /* Hii ni sahihi kwa mobile */
    }
}
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <div class="logo-container">
                <div class="logo-img">
                    <img src="images/logo.png" alt="Hazina Consultancy Logo">
                </div>
                <div class="logo-text">
                    <div class="logo-main">Hazina Consultancy</div>
                    <div class="logo-tagline">Maarifa ni hazina</div>
                </div>
            </div>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tourism">Tourism</a></li>
                    <li class="nav-item"><a class="nav-link" href="#courses">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link btn-enroll" href="#courses">Enroll Now</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin/login.php"><i class="fas fa-user-lock"></i> Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>
        <!-- Bottom Navigation Bar - Inaonekana kwenye Mobile & Tablet tu -->
<nav class="bottom-nav">
    <a href="index.php" class="bottom-nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
        <i class="fas fa-home"></i>
        <span>Home</span>
    </a>
    <a href="services.php" class="bottom-nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : ''; ?>">
        <i class="fas fa-briefcase"></i>
        <span>Services</span>
    </a>
    <a href="tourism.php" class="bottom-nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'tourism.php' ? 'active' : ''; ?>">
        <i class="fas fa-tree"></i>
        <span>Tourism</span>
    </a>
    <a href="courses.php" class="bottom-nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'courses.php' ? 'active' : ''; ?>">
        <i class="fas fa-book"></i>
        <span>Courses</span>
    </a>
    <a href="contact.php" class="bottom-nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">
        <i class="fas fa-envelope"></i>
        <span>Contact</span>
    </a>
    
    <!-- Center Action Button (Plus) - Optional -->
    <div class="nav-action-button">
        <a href="courses.php#enroll" class="action-btn">
            <i class="fas fa-plus"></i>
        </a>
    </div>
</nav>
        <nav class="bottom-nav">
    <a href="index.php" class="bottom-nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
        <i class="fas fa-home"></i>
        <span>Home</span>
    </a>
    <a href="services.php" class="bottom-nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : ''; ?>">
        <i class="fas fa-briefcase"></i>
        <span>Services</span>
    </a>
    
    <a href="tourism.php" class="bottom-nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'tourism.php' ? 'active' : ''; ?>">
        <i class="fas fa-tree"></i>
        <span>Tourism</span>
    </a>
       <!-- AI IMAGE BUTTON KWENYE MOBILE - WEKA HAPA -->
    <div class="nav-ai-image-container">
        <a href="#" class="ai-mobile-image-btn" onclick="toggleAIChat()">
            <img src="images/ai-robot-icon.png" alt="AI Assistant" class="ai-mobile-image">
            <span class="ai-mobile-badge">AI</span>
        </a>
    </div>         
    <a href="contact.php" class="bottom-nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">
        <i class="fas fa-envelope"></i>
        <span>Contact</span>
    </a>
</nav>

<!-- Bottom Padding kwa content isije kufichwa na bottom nav -->
<div class="bottom-nav-spacer"></div>

   <!-- Hero Section with Video Background -->
<section id="home" class="hero" style="position: relative; min-height: 100vh; display: flex; align-items: center; overflow: hidden;">
    
    <!-- Video Background - Iko NYUMA -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
        <video 
            autoplay 
            muted 
            loop 
            playsinline
            disablepictureinpicture
            style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"
        >
            <source src="images/video_2441c910-0e8e-4e47-886f-68f0eb6a59bf.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <!-- Dark Overlay ili maandishi yaonekane vizuri -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5);"></div>
    </div>
    
    <!-- Content - Iko MBELE (z-index higher) -->
    <div class="container" style="position: relative; z-index: 2; color: white;">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <!-- Logo -->
                <div class="logo-img mb-4" style="width: 100px; height: 100px; margin: 0 auto;">
                    <img src="images/logo.png" alt="Hazina Consultancy Logo" style="width: 100%; height: 100%; object-fit: contain;">
                </div>
                
                <h1 style="font-size: 4rem; font-weight: 700; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                    Hazina Consultancy
                </h1>
                
                <p class="lead mb-4" style="font-size: 1.5rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">
                    Maarifa ni hazina <br> Knowledge is Wealth
                </p>
                
                <p style="font-size: 1.1rem; margin-bottom: 30px; opacity: 0.9;">
                    Professional business consulting, tourism planning, and training services in Tanzania.
                </p>
                
                <div class="d-flex gap-3 justify-content-center">
                    <a href="#services" class="btn" style="background: #27ae60; color: white; padding: 15px 30px; border-radius: 50px; text-decoration: none; font-weight: 600; border: none;">
                        Explore Services
                    </a>
                    <a href="#contact" class="btn" style="background: transparent; color: white; padding: 15px 30px; border-radius: 50px; text-decoration: none; font-weight: 600; border: 2px solid white;">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- About Us Section with mohamed_hassan-teamwork-3213924_1280.jpg -->
    <section id="about" class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>About Hazina Consultancy</h2>
                <p>Your trusted partner in business and tourism development</p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4" data-aos="fade-right">
                    <img src="images/mohamed_hassan-teamwork-3213924_1280.jpg" alt="Business team doing fist bump after successful meeting" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h3 style="color: var(--primary-blue);">Welcome to Hazina Consultancy</h3>
                    <p class="lead">We are a premier consulting firm based in Tanzania, dedicated to providing exceptional business solutions and tourism experiences.</p>
                    <p><strong>Mission:</strong> To equip individuals and organizations with practical knowledge and skills for sustainable growth and success.</p>
                    <p><strong>Vision:</strong> To be the leading consultancy firm in Tanzania, recognized for excellence, innovation, and impact.</p>
                    <p><strong>Core Values:</strong> Integrity, Excellence, Innovation, Client-Centricity</p>
                    <div class="row mt-4">
                        <div class="col-6">
                            <h4 style="color: var(--secondary-green);">150+</h4>
                            <p>Projects Completed</p>
                        </div>
                        <div class="col-6">
                            <h4 style="color: var(--secondary-green);">500+</h4>
                            <p>Happy Clients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section - Business Consulting -->
    <section id="services" class="section" style="background: var(--light-bg);">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Business Consulting Services</h2>
                <p>Professional solutions for your business success</p>
            </div>
            <div class="row">
                <!-- Service 1: Business Proposal Planning -->
                <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                    <div class="service-card">
                        <div class="card-image">
                            <img src="images/jarmoluk-calculator-428301_1280.jpg" alt="Professional handshake in modern office">
                            <div class="location-tag"><i class="fas fa-briefcase"></i> Business Proposal</div>
                        </div>
                        <div class="card-content">
                            <h3>Business Proposal Planning</h3>
                            <p>Expert business plan writing, event proposals, project proposals, and BRELA registration support.</p>
                            <button class="btn-service" onclick="showPaymentPopup('Business Proposal Planning', 500000)">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- Service 2: Research Consultation -->
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="service-card">
                        <div class="card-image">
                            <img src="images/kalhh-businessman-4661727_1280.jpg" alt="Digital illustration of businessman with consulting icons">
                            <div class="location-tag"><i class="fas fa-flask"></i> Research</div>
                        </div>
                        <div class="card-content">
                            <h3>Research Consultation</h3>
                            <p>Topic preparation, concept notes, proposal writing, data collection, analysis, and report writing.</p>
                            <button class="btn-service" onclick="showPaymentPopup('Research Consultation', 450000)">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- Service 3: Business Meetings -->
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-card">
                        <div class="card-image">
                            <img src="images/ninthgrid-YsJUxCIW14U-unsplash.jpg" alt="Group meeting around white conference table">
                            <div class="location-tag"><i class="fas fa-users"></i> Meetings</div>
                        </div>
                        <div class="card-content">
                            <h3>Business Meetings</h3>
                            <p>Professional meeting facilitation, strategic planning sessions, and corporate workshops.</p>
                            <button class="btn-service" onclick="showPaymentPopup('Business Meetings', 350000)">Learn More</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second row of business services -->
            <div class="row mt-4">
                <!-- Service 4: Document Review -->
                <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                    <div class="service-card">
                        <div class="card-image">
                            <img src="images/jarmoluk-document-428338_1280.jpg" alt="Colleagues reviewing printed document together">
                            <div class="location-tag"><i class="fas fa-file-alt"></i> Document Review</div>
                        </div>
                        <div class="card-content">
                            <h3>Document Review</h3>
                            <p>Professional document analysis, contract review, and business document preparation.</p>
                            <button class="btn-service" onclick="showPaymentPopup('Document Review', 250000)">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- Service 5: Consultation -->
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="service-card">
                        <div class="card-image">
                            <img src="images/agrey.png" alt="Professional explaining document to colleague">
                            <div class="location-tag"><i class="fas fa-handshake"></i> Consultation</div>
                        </div>
                        <div class="card-content">
                            <h3>Expert Consultation</h3>
                            <p>One-on-one expert consultation for business strategy and planning.</p>
                            <button class="btn-service" onclick="showPaymentPopup('Expert Consultation', 300000)">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- Service 6: Virtual Business -->
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-card">
                        <div class="card-image">
                            <img src="images/peggy_marco-meet-1020145_1280.jpg" alt="Virtual business handshake between laptops">
                            <div class="location-tag"><i class="fas fa-laptop"></i> Virtual Services</div>
                        </div>
                        <div class="card-content">
                            <h3>Virtual Business Services</h3>
                            <p>Online consulting, virtual meetings, and digital business solutions.</p>
                            <button class="btn-service" onclick="showPaymentPopup('Virtual Business Services', 200000)">Learn More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tourism Services Section -->
    <section id="tourism" class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Tanzania Tourism Services</h2>
                <p>Experience the beauty of Tanzania with our expert tour planning</p>
            </div>
            <div class="row">
                <!-- Tourism 1: Serengeti Safari -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="course-card">
                        <div class="card-image">
                            <img src="images/jurgen_bierlein-giraffes-7498918_1280.jpg" alt="Giraffes walking in Serengeti National Park Tanzania">
                            <div class="price-tag">$899</div>
                            <div class="location-tag"><i class="fas fa-map-marker-alt"></i> Serengeti</div>
                        </div>
                        <div class="card-content">
                            <h3>Serengeti Safari Adventure</h3>
                            <p>Witness the great migration, lions, giraffes, and diverse wildlife in Serengeti National Park.</p>
                            <div class="card-meta">
                                <span><i class="far fa-calendar"></i> 5 Days</span>
                                <span><i class="fas fa-users"></i> Max 8</span>
                            </div>
                            <button class="btn-course" onclick="showPaymentPopup('Serengeti Safari Adventure', 899)">Book Now</button>
                        </div>
                    </div>
                </div>

                <!-- Tourism 2: Game Drive -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="course-card">
                        <div class="card-image">
                            <img src="images/marilari-game-drive-5730684_1280.jpg" alt="Safari vehicle on game drive in Tanzania">
                            <div class="price-tag">$699</div>
                            <div class="location-tag"><i class="fas fa-map-marker-alt"></i> Ngorongoro</div>
                        </div>
                        <div class="card-content">
                            <h3>Ngorongoro Game Drive</h3>
                            <p>Explore the Ngorongoro Crater with professional guides and spot the Big Five.</p>
                            <div class="card-meta">
                                <span><i class="far fa-calendar"></i> 3 Days</span>
                                <span><i class="fas fa-users"></i> Max 6</span>
                            </div>
                            <button class="btn-course" onclick="showPaymentPopup('Ngorongoro Game Drive', 699)">Book Now</button>
                        </div>
                    </div>
                </div>

                <!-- Tourism 3: Monkey Adventure -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="course-card">
                        <div class="card-image">
                            <img src="images/jurgen_bierlein-monkey-7452824_1280.jpg" alt="Monkey in natural forest Serengeti Tanzania">
                            <div class="price-tag">$499</div>
                            <div class="location-tag"><i class="fas fa-map-marker-alt"></i> Kigoma</div>
                        </div>
                        <div class="card-content">
                            <h3>Gombe National Park</h3>
                            <p>Discover monkeys, flamingos, and stunning landscapes in Arusha National Park.</p>
                            <div class="card-meta">
                                <span><i class="far fa-calendar"></i> 2 Days</span>
                                <span><i class="fas fa-users"></i> Max 10</span>
                            </div>
                            <button class="btn-course" onclick="showPaymentPopup('Arusha National Park', 499)">Book Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <!-- Tourism 4: Maasai Culture -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="course-card">
                        <div class="card-image">
                            <img src="images/macmuga-masai-5251363_1280.jpg" alt="Maasai people in traditional clothing Tanzania">
                            <div class="price-tag">$399</div>
                            <div class="location-tag"><i class="fas fa-map-marker-alt"></i> Maasai Village</div>
                        </div>
                        <div class="card-content">
                            <h3>Maasai Cultural Experience</h3>
                            <p>Visit authentic Maasai villages, learn their traditions, and experience their way of life.</p>
                            <div class="card-meta">
                                <span><i class="far fa-calendar"></i> 1 Day</span>
                                <span><i class="fas fa-users"></i> Max 15</span>
                            </div>
                            <button class="btn-course" onclick="showPaymentPopup('Maasai Cultural Experience', 399)">Book Now</button>
                        </div>
                    </div>
                </div>

                <!-- Tourism 5: Kilimanjaro -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="course-card">
                        <div class="card-image">
                            <img src="images/caromcdaid-mountain-1148898_1280.jpg" alt="Mount Kilimanjaro view Tanzania">
                            <div class="price-tag">$2,499</div>
                            <div class="location-tag"><i class="fas fa-map-marker-alt"></i> Kilimanjaro</div>
                        </div>
                        <div class="card-content">
                            <h3>Mount Kilimanjaro Climb</h3>
                            <p>Conquer Africa's highest peak with expert guides and porters.</p>
                            <div class="card-meta">
                                <span><i class="far fa-calendar"></i> 7 Days</span>
                                <span><i class="fas fa-users"></i> Max 12</span>
                            </div>
                            <button class="btn-course" onclick="showPaymentPopup('Mount Kilimanjaro Climb', 2499)">Book Now</button>
                        </div>
                    </div>
                </div>

                <!-- Tourism 6: Zanzibar Beach -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="course-card">
                        <div class="card-image">
                            <img src="images/bobesh23-africa-4523063_1280.jpg" alt="African sunset at Zanzibar beach Tanzania">
                            <div class="price-tag">$1,299</div>
                            <div class="location-tag"><i class="fas fa-map-marker-alt"></i> Zanzibar</div>
                        </div>
                        <div class="card-content">
                            <h3>Zanzibar Beach Holiday</h3>
                            <p>Relax on pristine beaches, explore Stone Town, and enjoy sunset views.</p>
                            <div class="card-meta">
                                <span><i class="far fa-calendar"></i> 5 Days</span>
                                <span><i class="fas fa-users"></i> Max 20</span>
                            </div>
                            <button class="btn-course" onclick="showPaymentPopup('Zanzibar Beach Holiday', 1299)">Book Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Training Courses Section -->
    <section id="courses" class="section" style="background: var(--light-bg);">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Professional Training Courses</h2>
                <p>Enhance your skills with our expert-led training programs</p>
            </div>
            <div class="row">
                <!-- Training 1: SPSS -->
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in">
                    <div class="course-card">
                        <div class="card-image">
                            <img src="images/mohamed_hassan-training-3185170_1280.jpg" alt="Trainer giving presentation to business professionals">
                            <div class="price-tag">Tsh 350,000</div>
                        </div>
                        <div class="card-content">
                            <h3>SPSS Data Analysis</h3>
                            <p>Master statistical analysis with SPSS. Perfect for researchers and students.</p>
                            <div class="card-meta">
                                <span><i class="far fa-calendar"></i> 4 weeks</span>
                                <span><i class="fas fa-users"></i> Max 20</span>
                            </div>
                            <button class="btn-course" onclick="showPaymentPopup('SPSS Data Analysis', 350000)">Enroll Now</button>
                        </div>
                    </div>
                </div>

                <!-- Training 2: Tour Planning -->
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="course-card">
                        <div class="card-image">
                            <img src="images/3282700-transport-1821571_1280.jpg" alt="Local transport and travel experience Tanzania">
                            <div class="price-tag">Tsh 450,000</div>
                        </div>
                        <div class="card-content">
                            <h3>Tour Plan & Costing</h3>
                            <p>Learn professional tour planning and costing for tourism businesses.</p>
                            <div class="card-meta">
                                <span><i class="far fa-calendar"></i> 3 weeks</span>
                                <span><i class="fas fa-users"></i> Max 15</span>
                            </div>
                            <button class="btn-course" onclick="showPaymentPopup('Tour Plan & Costing', 450000)">Enroll Now</button>
                        </div>
                    </div>
                </div>

                <!-- Training 3: Digital Marketing -->
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="course-card">
                        <div class="card-image">
                            <img src="images/geralt-social-media-4140959_1280.jpg" alt="Diverse group in circle meeting with whiteboard">
                            <div class="price-tag">Tsh 300,000</div>
                        </div>
                        <div class="card-content">
                            <h3>Digital Marketing</h3>
                            <p>Comprehensive digital marketing strategies for Tanzanian market.</p>
                            <div class="card-meta">
                                <span><i class="far fa-calendar"></i> 6 weeks</span>
                                <span><i class="fas fa-users"></i> Max 25</span>
                            </div>
                            <button class="btn-course" onclick="showPaymentPopup('Digital Marketing', 300000)">Enroll Now</button>
                        </div>
                    </div>
                </div>

                <!-- Training 4: Business Writing -->
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="course-card">
                        <div class="card-image">
                            <img src="images/777546-accounting-761599_1280.jpg" alt="Hands writing in notebook during business meeting">
                            <div class="price-tag">Tsh 250,000</div>
                        </div>
                        <div class="card-content">
                            <h3>Business Writing</h3>
                            <p>Professional business writing, proposals, and report preparation.</p>
                            <div class="card-meta">
                                <span><i class="far fa-calendar"></i> 2 weeks</span>
                                <span><i class="fas fa-users"></i> Max 30</span>
                            </div>
                            <button class="btn-course" onclick="showPaymentPopup('Business Writing', 250000)">Enroll Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Tanzania Photo Gallery</h2>
                <p>Experience the beauty of Tanzania through our lens</p>
            </div>
            <div class="gallery-grid">
                <!-- Gallery Item 1: Baboons -->
                <div class="gallery-item" data-aos="fade-up">
                    <img src="images/7523944-monkeys-6786829_1280.jpg" alt="Olive baboons sitting together in Serengeti National Park Tanzania">
                    <div class="gallery-overlay">
                        <h4>Olive Baboons</h4>
                        <p>Serengeti National Park</p>
                    </div>
                </div>

                <!-- Gallery Item 2: Lion -->
                <div class="gallery-item" data-aos="fade-up" data-aos-delay="50">
                    <img src="images/jurgen_bierlein-lion-7490149_1280.jpg" alt="African lion resting in savannah grassland Serengeti Tanzania">
                    <div class="gallery-overlay">
                        <h4>African Lion</h4>
                        <p>Serengeti Savannah</p>
                    </div>
                </div>

                <!-- Gallery Item 3: Tanzania Landscape -->
                <div class="gallery-item" data-aos="fade-up" data-aos-delay="100">
                    <img src="images/cliffordr10-tanzania-2633550_1280.jpg" alt="Beautiful Tanzania landscape scenery">
                    <div class="gallery-overlay">
                        <h4>Tanzania Landscape</h4>
                        <p>Beautiful Scenery</p>
                    </div>
                </div>

                <!-- Gallery Item 4: Tanzania Nature -->
                <div class="gallery-item" data-aos="fade-up" data-aos-delay="150">
                    <img src="images/chickenonline-tanzania-1242282_1280.jpg" alt="Tanzania tourism environment and nature">
                    <div class="gallery-overlay">
                        <h4>Tanzania Nature</h4>
                        <p>Natural Beauty</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Contact Us</h2>
                <p>Get in touch with us for any inquiries or support</p>
            </div>
            <div class="row">
                <div class="col-md-6" data-aos="fade-right">
                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                            <div class="contact-text">
                                <h4>Phone Number</h4>
                                <p>0688 951 408</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                            <div class="contact-text">
                                <h4>Email Address</h4>
                                <p>mdemeagrey75@gmail.com</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="contact-text">
                                <h4>Location</h4>
                                <p>Ngarenaro,kwa Fr babu, Arusha</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon"><i class="fas fa-clock"></i></div>
                            <div class="contact-text">
                                <h4>Working Hours</h4>
                                <p>Mon-Fri: 8:00 AM - 5:00 PM</p>
                                <p>Saturday: 9:00 AM - 1:00 PM</p>
                            </div>
                        </div>

                        <!-- Office Image -->
                        <img src="images/jo_johnston-office-1516329_1280.jpg" alt="Modern boardroom with leather chairs" class="img-fluid rounded mt-3">
                    </div>
                </div>
                
                <div class="col-md-6" data-aos="fade-left">
                    <div class="contact-info">
                        <form id="contactForm" onsubmit="return submitContactForm(event)">
                            <div class="mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Your Full Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-lg" placeholder="Your Email" required>
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control form-control-lg" placeholder="Your Phone">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control form-control-lg" rows="5" placeholder="Your Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100 py-3" style="background: var(--secondary-green); border: none;">Send Message</button>
                                <div class="qr-section" style="text-align: center; margin-top: 20px; padding: 20px; background: #f8f9fa; border-radius: 15px; border: 1px dashed var(--secondary-green);">
                
                <!-- QR Code Image -->
                <div class="qr-code-container" style="margin-bottom: 10px;">
                    <img src="images/qr-code.png" alt="Scan QR Code to Contact Us" style="width: 150px; height: 150px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                </div>
                
                <!-- QR Code Text -->
                <div class="qr-text">
                    <p style="margin: 0; color: var(--primary-blue); font-weight: 600; font-size: 0.9rem;">
                        <i class="fas fa-qrcode me-2" style="color: var(--secondary-green);"></i>
                        Scan to save contact
                    </p>
                    <p style="margin: 5px 0 0; color: #666; font-size: 0.8rem;">
                        Or call directly: <strong>0688 951 408</strong>
                    </p>
                </div>
                
                <!-- WhatsApp Option (Optional) -->
                <div class="whatsapp-option" style="margin-top: 10px;">
                    <a href="https://wa.me/255688951408" target="_blank" style="text-decoration: none; background: #25D366; color: white; padding: 8px 20px; border-radius: 50px; display: inline-block; font-size: 0.9rem;">
                        <i class="fab fa-whatsapp me-2"></i>WhatsApp
                    </a>
                </div>
            </div>
            <!-- END OF QR CODE SECTION -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- KNOWLEDGE IS WEALTH AI - IMAGE BUTTON (DESKTOP) -->
<div class="ai-image-button" id="aiImageButton" onclick="toggleAIChat()">
    <div class="ai-image-container">
        <img src="images/ai-robot-icon.png" alt="AI Assistant" class="ai-button-image">
        <div class="ai-image-glow"></div>
    </div>
    <div class="ai-image-tooltip">
        <span class="tooltip-text">KNOWLEDGE IS WEALTH AI</span>
        <span class="tooltip-status">Online</span>
    </div>
</div>

<!-- AI CHAT POPUP -->
<div class="ai-chat-popup" id="aiChatPopup">
    <div class="ai-popup-header">
        <div class="ai-header-brand">
            <div class="ai-header-image">
                <img src="images/ai-robot-icon.png" alt="AI Assistant">
            </div>
            <div class="ai-header-text">
                <h4>KNOWLEDGE IS WEALTH AI</h4>
                <p><span class="ai-status-dot"></span> Online • Maarifa ni hazina</p>
            </div>
        </div>
        <div class="ai-header-actions">
            <button class="ai-minimize-btn" onclick="minimizeChat()">
                <i class="fas fa-minus"></i>
            </button>
            <button class="ai-close-btn" onclick="closeAIChat()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    
    <div class="ai-chat-messages" id="aiChatMessages">
        <!-- Messages will appear here -->
    </div>
    
    <div class="ai-quick-questions">
        <button onclick="sendQuickQuestion('What services do you offer?')">📋 Services</button>
        <button onclick="sendQuickQuestion('Course prices?')">💰 Prices</button>
        <button onclick="sendQuickQuestion('Contact information?')">📞 Contact</button>
        <button onclick="sendQuickQuestion('Tourism packages?')">🏝️ Tourism</button>
    </div>
    
    <div class="ai-chat-input-area">
        <input type="text" id="aiUserInput" placeholder="Type your message..." onkeypress="handleKeyPress(event)">
        <button class="ai-send-btn" onclick="sendMessage()">
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>
    
    <div class="ai-powered-by">
        <small>Powered by Hazina Consultancy • Maarifa ni hazina</small>
    </div>
</div>
        <!-- KNOWLEDGE IS WEALTH AI - IMAGE BUTTON (DESKTOP) -->
<div class="ai-image-button" id="aiImageButton" onclick="toggleAIChat()">
    <div class="ai-image-container">
        <img src="images/ai-robot-icon.png" alt="AI Assistant" class="ai-button-image">
        <div class="ai-image-glow"></div>
    </div>
    <div class="ai-image-tooltip">
        <span class="tooltip-text">KNOWLEDGE IS WEALTH AI</span>
        <span class="tooltip-status">Online</span>
    </div>
</div>


<!-- Footer -->
<footer class="footer">
    <!-- yako footer content -->

<!-- Footer -->
<footer class="footer">
    <!-- yako footer content -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-logo">
                        <div class="logo-img">
                            <img src="images/logo.png" alt="Hazina Consultancy Logo">
                        </div>
                        <div>
                            <div style="font-size: 20px; font-weight: 700;">Hazina Consultancy</div>
                            <div style="font-size: 12px; color: var(--secondary-green);">Maarifa ni hazina</div>
                        </div>
                    </div>
                    <p style="color: rgba(255,255,255,0.7);">Your trusted partner in knowledge and business development. Professional training, research, and tourism services.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#home" style="color: rgba(255,255,255,0.7); text-decoration: none;">Home</a></li>
                        <li><a href="#about" style="color: rgba(255,255,255,0.7); text-decoration: none;">About Us</a></li>
                        <li><a href="#services" style="color: rgba(255,255,255,0.7); text-decoration: none;">Services</a></li>
                        <li><a href="#tourism" style="color: rgba(255,255,255,0.7); text-decoration: none;">Tourism</a></li>
                        <li><a href="#contact" style="color: rgba(255,255,255,0.7); text-decoration: none;">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-md-3">
                    <h5>Our Services</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" style="color: rgba(255,255,255,0.7); text-decoration: none;">Business Consulting</a></li>
                        <li><a href="#" style="color: rgba(255,255,255,0.7); text-decoration: none;">Tourism Planning</a></li>
                        <li><a href="#" style="color: rgba(255,255,255,0.7); text-decoration: none;">Training Programs</a></li>
                        <li><a href="#" style="color: rgba(255,255,255,0.7); text-decoration: none;">Research Services</a></li>
                        <li><a href="#" style="color: rgba(255,255,255,0.7); text-decoration: none;">BRELA Support</a></li>
                    </ul>
                </div>
                
                <div class="col-md-3">
                    <h5>Newsletter</h5>
                    <p style="color: rgba(255,255,255,0.7);">Subscribe for updates</p>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Your Email">
                        <button class="btn btn-success" type="button" style="background: var(--secondary-green);">Subscribe</button>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2026 Hazina Consultancy. All rights reserved. | Designed by Erick Juma in Tanzania</p>
            </div>
        </div>
    </footer>

    <!-- Payment Popup -->
    <div id="paymentPopup" class="popup-overlay">
        <div class="popup-container">
            <div class="popup-header">
                <h3><i class="fas fa-credit-card"></i> Complete Payment</h3>
                <button class="close-popup" onclick="closePaymentPopup()">&times;</button>
            </div>
            <div class="popup-body">
                <form id="paymentForm" onsubmit="processPayment(event)">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="studentName" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phoneNumber" placeholder="0688951408" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Course/Service</label>
                        <input type="text" class="form-control" id="courseName" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="text" class="form-control" id="amount" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Payment Method</label>
                        <div class="payment-method-card" onclick="selectMethod('M-Pesa')" id="mpesaCard">
                            <div class="method-logo">M-P</div>
                            <div>
                                <h6 class="mb-0">M-Pesa</h6>
                                <small>Vodacom Tanzania</small>
                            </div>
                        </div>
                        
                        <div class="payment-method-card" onclick="selectMethod('Airtel Money')" id="airtelCard">
                            <div class="method-logo">A-M</div>
                            <div>
                                <h6 class="mb-0">Airtel Money</h6>
                                <small>Airtel Tanzania</small>
                            </div>
                        </div>
                        <input type="hidden" id="paymentMethod" required>
                    </div>
                    
                    <button type="submit" class="btn-pay" id="payButton">
                        <i class="fas fa-lock me-2"></i> Pay Now
                    </button>
                </form>
                
                <div id="transactionStatus" class="transaction-status">
                    <div class="spinner"></div>
                    <h5>Processing...</h5>
                    <p>Check your phone and enter PIN</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Popup -->
    <div id="confirmationPopup" class="popup-overlay">
        <div class="popup-container">
            <div class="popup-header" style="background: var(--secondary-green);">
                <h3><i class="fas fa-check-circle"></i> Payment Successful!</h3>
                <button class="close-popup" onclick="closeConfirmationPopup()">&times;</button>
            </div>
            <div class="popup-body">
                <div class="text-center mb-4">
                    <i class="fas fa-check-circle" style="font-size: 80px; color: var(--secondary-green);"></i>
                </div>
                <div id="confirmationDetails" class="mb-4"></div>
                <button class="btn-pay" onclick="downloadReceipt()" style="background: var(--primary-blue);">
                    <i class="fas fa-download me-2"></i> Download Receipt
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });

        // Payment variables
        let currentTransaction = {};
        let selectedMethod = '';

        // Select payment method
        function selectMethod(method) {
            selectedMethod = method;
            document.getElementById('paymentMethod').value = method;
            document.getElementById('mpesaCard').classList.remove('selected');
            document.getElementById('airtelCard').classList.remove('selected');
            
            if (method === 'M-Pesa') {
                document.getElementById('mpesaCard').classList.add('selected');
            } else {
                document.getElementById('airtelCard').classList.add('selected');
            }
        }

        // Show payment popup
        function showPaymentPopup(course, amount) {
            document.getElementById('paymentPopup').style.display = 'flex';
            document.getElementById('courseName').value = course;
            document.getElementById('amount').value = 'Tsh ' + amount.toLocaleString();
            document.body.style.overflow = 'hidden';
        }

        function closePaymentPopup() {
            document.getElementById('paymentPopup').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function closeConfirmationPopup() {
            document.getElementById('confirmationPopup').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Process payment
        function processPayment(event) {
            event.preventDefault();
            
            const studentName = document.getElementById('studentName').value;
            const phone = document.getElementById('phoneNumber').value;
            const course = document.getElementById('courseName').value;
            const amount = document.getElementById('amount').value.replace('Tsh ', '').replace(',', '');
            const method = document.getElementById('paymentMethod').value;

            if (!method) {
                alert('Tafadhali chagua njia ya malipo');
                return;
            }

            document.getElementById('paymentForm').style.display = 'none';
            document.getElementById('transactionStatus').style.display = 'block';

            setTimeout(() => {
                const transactionId = method === 'M-Pesa' ? 
                    'MP' + Date.now() : 'AT' + Date.now();

                currentTransaction = {
                    studentName, phone, course, amount,
                    method, transactionId,
                    date: new Date().toLocaleString()
                };

                document.getElementById('paymentPopup').style.display = 'none';
                showConfirmationPopup();
                
                document.getElementById('paymentForm').reset();
                document.getElementById('paymentForm').style.display = 'block';
                document.getElementById('transactionStatus').style.display = 'none';
            }, 3000);
        }

        function showConfirmationPopup() {
            document.getElementById('confirmationDetails').innerHTML = `
                <p><strong>Name:</strong> ${currentTransaction.studentName}</p>
                <p><strong>Phone:</strong> ${currentTransaction.phone}</p>
                <p><strong>Service:</strong> ${currentTransaction.course}</p>
                <p><strong>Amount:</strong> Tsh ${parseInt(currentTransaction.amount).toLocaleString()}</p>
                <p><strong>Method:</strong> ${currentTransaction.method}</p>
                <p><strong>Transaction:</strong> ${currentTransaction.transactionId}</p>
            `;
            document.getElementById('confirmationPopup').style.display = 'flex';
        }

        function downloadReceipt() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            
            doc.setFontSize(18);
            doc.text('Hazina Consultancy', 20, 20);
            doc.setFontSize(12);
            doc.text('Maarifa ni hazina', 20, 28);
            doc.text('PAYMENT RECEIPT', 20, 40);
            doc.text(`Student: ${currentTransaction.studentName}`, 20, 55);
            doc.text(`Phone: ${currentTransaction.phone}`, 20, 65);
            doc.text(`Service: ${currentTransaction.course}`, 20, 75);
            doc.text(`Amount: Tsh ${parseInt(currentTransaction.amount).toLocaleString()}`, 20, 85);
            doc.text(`Method: ${currentTransaction.method}`, 20, 95);
            doc.text(`Transaction: ${currentTransaction.transactionId}`, 20, 105);
            doc.text(`Date: ${currentTransaction.date}`, 20, 115);
            
            doc.save('receipt.pdf');
        }

        // Contact form
        function submitContactForm(event) {
            event.preventDefault();
            alert('Asante! Tutawasiliana nawe hivi karibuni.');
            event.target.reset();
            return false;
        }
            // Hide/Show Bottom Nav on Scroll
let lastScrollTop = 0;
const bottomNav = document.querySelector('.bottom-nav');

window.addEventListener('scroll', function() {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
    if (scrollTop > lastScrollTop && scrollTop > 200) {
        // Scrolling down - hide nav
        bottomNav.classList.add('hide');
        bottomNav.classList.remove('show');
    } else {
        // Scrolling up - show nav
        bottomNav.classList.add('show');
        bottomNav.classList.remove('hide');
    }
    
    lastScrollTop = scrollTop;
});

// Active link based on scroll position (Optional)
function setActiveNav() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.bottom-nav-item');
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop - 100;
        const sectionBottom = sectionTop + section.offsetHeight;
        const scroll = window.scrollY;
        
        if (scroll >= sectionTop && scroll < sectionBottom) {
            const targetId = section.getAttribute('id');
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${targetId}`) {
                    link.classList.add('active');
                }
            });
        }
    });
}

window.addEventListener('scroll', setActiveNav);
            //=============================================
// KNOWLEDGE IS WEALTH AI - ADVANCED CHATBOT
// ChatGPT Style - Answers any question
//=============================================

// API Configuration
const AI_CONFIG = {
    apiKey: 'ib_sk_8379a8939312e368d635cf12461027178e260cd0c62a5155',
    apiUrl: 'https://api.insertabot.io/v1/chat',
    model: 'gpt-3.5-turbo', // Using Insertabot's AI model
    maxTokens: 500,
    temperature: 0.7
};

// Conversation history
let conversationHistory = [];
let currentSessionId = generateSessionId();

// Generate unique session ID
function generateSessionId() {
    return 'session_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
}

// Toggle AI Chat
function toggleAIChat() {
    const popup = document.getElementById('aiChatPopup');
    popup.classList.toggle('open');
    
    if (popup.classList.contains('open')) {
        document.getElementById('aiUserInput').focus();
    }
}

// Close AI Chat
function closeAIChat() {
    document.getElementById('aiChatPopup').classList.remove('open');
}

// Clear chat history
function clearChat() {
    if (confirm('Clear all messages?')) {
        const messagesDiv = document.getElementById('aiChatMessages');
        messagesDiv.innerHTML = `
            <div class="ai-message ai-bot-message">
                <div class="ai-message-avatar">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="ai-message-content">
                    <p>👋 Chat cleared! How can I help you today?</p>
                    <p class="ai-message-time">Just now</p>
                </div>
            </div>
        `;
        conversationHistory = [];
        currentSessionId = generateSessionId();
    }
}

// Handle textarea keydown (Enter to send, Shift+Enter for new line)
function handleTextareaKeydown(event) {
    if (event.key === 'Enter' && !event.shiftKey) {
        event.preventDefault();
        sendMessage();
    }
}

// Send quick question
function sendQuickQuestion(question) {
    document.getElementById('aiUserInput').value = question;
    sendMessage();
}

// Send message to AI
async function sendMessage() {
    const input = document.getElementById('aiUserInput');
    const message = input.value.trim();
    
    if (message === '') return;
    
    // Display user message
    displayUserMessage(message);
    input.value = '';
    
    // Auto-resize textarea
    input.style.height = '45px';
    
    // Show typing indicator
    showTypingIndicator();
    
    try {
        // Add to conversation history
        conversationHistory.push({
            role: 'user',
            content: message
        });
        
        // Prepare context for AI
        const context = `You are KNOWLEDGE IS WEALTH AI, a helpful assistant for Hazina Consultancy.
                        You can answer ANY question - business, tourism, education, general knowledge, etc.
                        Be friendly, informative, and provide detailed responses.
                        If asked about Hazina Consultancy specifically:
                        - Location: Kwa Father Babu, Ngarenaro, Arusha
                        - Phone: 0688 951 408
                        - Email: mkemengy75@gmail.com
                        - Services: Research, Business, Training, Tourism
                        - Courses: SPSS (350k), Digital Marketing (300k), Tour Planning (450k)
                        For other questions, provide general helpful information.`;
        
        // Call AI API
        const response = await fetch(AI_CONFIG.apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-API-Key': AI_CONFIG.apiKey
            },
            body: JSON.stringify({
                message: message,
                context: context,
                history: conversationHistory.slice(-10), // Last 10 messages for context
                session_id: currentSessionId,
                website: window.location.href,
                user_id: getUserId(),
                max_tokens: AI_CONFIG.maxTokens,
                temperature: AI_CONFIG.temperature
            })
        });
        
        const data = await response.json();
        removeTypingIndicator();
        
        let aiResponse = '';
        
        if (data.reply) {
            aiResponse = data.reply;
        } else if (data.message) {
            aiResponse = data.message;
        } else {
            // Fallback to local AI if API fails
            aiResponse = generateLocalResponse(message);
        }
        
        // Add to conversation history
        conversationHistory.push({
            role: 'assistant',
            content: aiResponse
        });
        
        // Display bot response
        displayBotMessage(aiResponse);
        
    } catch (error) {
        console.error('AI Error:', error);
        removeTypingIndicator();
        
        // Use local AI as fallback
        const localResponse = generateLocalResponse(message);
        displayBotMessage(localResponse);
        
        // Add to conversation history
        conversationHistory.push({
            role: 'assistant',
            content: localResponse
        });
    }
}

// Local AI - Intelligent fallback when API fails
function generateLocalResponse(message) {
    const msg = message.toLowerCase();
    const words = msg.split(' ');
    
    // Check if it's a question about Hazina Consultancy
    if (msg.includes('hazina') || msg.includes('consultancy') || msg.includes('your company')) {
        return getCompanyInfo(msg);
    }
    
    // Check if it's a business question
    else if (words.some(w => ['business', 'startup', 'company', 'entrepreneur', 'market'].includes(w))) {
        return getBusinessAdvice(msg);
    }
    
    // Check if it's about tourism
    else if (words.some(w => ['tourism', 'travel', 'safari', 'tanzania', 'africa', 'kilimanjaro', 'zanzibar'].includes(w))) {
        return getTourismInfo(msg);
    }
    
    // Check if it's about education
    else if (words.some(w => ['course', 'training', 'learn', 'study', 'education', 'skill'].includes(w))) {
        return getEducationInfo(msg);
    }
    
    // Check if it's a greeting
    else if (words.some(w => ['hello', 'hi', 'hey', 'jambo', 'habari', 'good morning', 'good afternoon'].includes(w))) {
        return getGreeting();
    }
    
    // Check if it's asking for help
    else if (msg.includes('help') || msg.includes('can you') || msg.includes('what can you')) {
        return getHelpInfo();
    }
    
    // General knowledge question
    else {
        return getGeneralKnowledge(msg);
    }
}

// Company information
function getCompanyInfo(query) {
    return `🏢 **Hazina Consultancy - Maarifa ni hazina**

**About Us:**
We are a professional consulting firm based in Arusha, Tanzania, offering:
✅ Business Consulting
✅ Research Services
✅ Professional Training
✅ Tourism Planning

**Contact:**
📞 Phone: 0688 951 408
📧 Email: mkemengy75@gmail.com
📍 Location: Kwa Father Babu, Ngarenaro, Arusha

**Training Courses:**
• SPSS Data Analysis - Tsh 350,000 (4 weeks)
• Digital Marketing - Tsh 300,000 (6 weeks)
• Tour Plan & Costing - Tsh 450,000 (3 weeks)
• Pre-industrial Training - Tsh 250,000 (2 weeks)

How can I help you with our services?`;
}

// Business advice
function getBusinessAdvice(query) {
    if (query.includes('start')) {
        return `🚀 **Starting a Business in Tanzania**

Here are key steps:
1. **Business Registration** - BRELA registration
2. **Market Research** - Understand your market
3. **Business Plan** - Create a solid plan
4. **Funding** - Explore financing options
5. **Licenses** - Get necessary permits

We offer business consulting services to help you succeed! Contact us at 0688 951 408.`;
    }
    else if (query.includes('plan')) {
        return `📊 **Business Planning**

A good business plan includes:
• Executive Summary
• Company Description
• Market Analysis
• Organization Structure
• Products/Services
• Marketing Strategy
• Financial Projections

Need help with your business plan? We're here to assist!`;
    }
    else {
        return `💼 **Business Consulting Services**

We provide:
• Business plan writing
• Market research
• BRELA registration support
• Financial analysis
• Strategic planning

Contact us for personalized business advice!`;
    }
}

// Tourism information
function getTourismInfo(query) {
    if (query.includes('tanzania') || query.includes('safari')) {
        return `🌍 **Tanzania Tourism Highlights**

**Top Destinations:**
• **Serengeti National Park** - Great migration, Big Five
• **Ngorongoro Crater** - UNESCO World Heritage
• **Mount Kilimanjaro** - Africa's highest peak
• **Zanzibar** - Beautiful beaches, Stone Town
• **Selous** - Largest game reserve

**Popular Safari Packages:**
🦁 Serengeti Safari (5 days) - $899
🦒 Ngorongoro Drive (3 days) - $699
⛰️ Kilimanjaro Climb (7 days) - $2,499
🏝️ Zanzibar Beach (5 days) - $1,299

Book with us! Call 0688 951 408`;
    }
    else if (query.includes('best time')) {
        return `📅 **Best Time to Visit Tanzania**

• **Wildlife Safaris**: June-October (dry season)
• **Great Migration**: July-September
• **Kilimanjaro**: January-March, June-October
• **Zanzibar**: June-October, December-February
• **Bird Watching**: November-April

We can help plan your perfect trip!`;
    }
    else {
        return `🌴 **Tanzania Travel Tips**

• Visa required for most countries
• Best time: June-October (dry season)
• Currency: Tanzanian Shilling (TZS)
• Language: Swahili & English
• Health: Yellow fever vaccine recommended

Need a custom itinerary? We're here to help!`;
    }
}

// Education information
function getEducationInfo(query) {
    if (query.includes('course') || query.includes('training')) {
        return `📚 **Our Training Programs**

**Available Courses:**
1. **SPSS Data Analysis** - Tsh 350,000
   • 4 weeks | Certificate included
   • Statistical analysis, research methods

2. **Digital Marketing** - Tsh 300,000
   • 6 weeks | Practical training
   • SEO, social media, content marketing

3. **Tour Plan & Costing** - Tsh 450,000
   • 3 weeks | Industry experts
   • Tour packages, pricing strategies

4. **Pre-industrial Training** - Tsh 250,000
   • 2 weeks | Hands-on experience
   • Industry preparation, soft skills

📞 Enroll now: 0688 951 408`;
    }
    else {
        return `🎓 **Why Choose Our Training?**

✅ Expert instructors
✅ Practical, hands-on learning
✅ Industry-recognized certificates
✅ Flexible schedules
✅ Affordable prices

Contact us to discuss your learning goals!`;
    }
}

// Greeting
function getGreeting() {
    return `👋 Hello! I'm **KNOWLEDGE IS WEALTH AI**.

I can help you with:
• 💼 Business consulting
• 🌍 Tourism in Tanzania
• 📚 Training courses
• 💡 General knowledge
• 🔍 Research & analysis

What would you like to know today?`;
}

// Help information
function getHelpInfo() {
    return `🤖 **I'm KNOWLEDGE IS WEALTH AI - Your Intelligent Assistant!**

**I can help with:**

🏢 **Hazina Consultancy**
• Company information
• Services & pricing
• Contact details
• Location

💼 **Business Topics**
• Starting a business
• Business planning
• Marketing advice
• Financial tips

🌍 **Tourism**
• Tanzania destinations
• Safari packages
• Travel tips
• Best times to visit

📚 **Education**
• Course information
• Training programs
• Learning resources

💡 **General Knowledge**
• Answer questions
• Provide information
• Offer advice
• Research help

Just ask me anything! I'm here to learn and help. 😊`;
}

// General knowledge (for any question)
function getGeneralKnowledge(query) {
    // This is where you'd connect to a knowledge base
    // For now, we'll give a helpful response
    
    const topics = [
        'business', 'tourism', 'education', 'technology', 'science',
        'history', 'culture', 'health', 'sports', 'entertainment'
    ];
    
    const matchedTopic = topics.find(topic => query.includes(topic));
    
    if (matchedTopic) {
        return `📚 **About ${matchedTopic.charAt(0).toUpperCase() + matchedTopic.slice(1)}**

I'd love to help with your question about ${matchedTopic}! 

For detailed information, you can:
1. Ask me specific questions
2. Contact our team at 0688 951 408
3. Visit our office at Kwa Father Babu, Ngarenaro

What specific aspect of ${matchedTopic} would you like to know?`;
    }
    else {
        return `💡 **Interesting Question!**

I'm still learning, but I can help you with:
• Business & consulting questions
• Tourism in Tanzania
• Our training courses
• Company information

For your specific question, please contact our team at 0688 951 408 or email mkemengy75@gmail.com.

Is there something else I can help you with? 😊`;
    }
}

// Get or create user ID
function getUserId() {
    let userId = localStorage.getItem('hazina_user_id');
    if (!userId) {
        userId = 'user_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
        localStorage.setItem('hazina_user_id', userId);
    }
    return userId;
}

// Display user message
function displayUserMessage(message) {
    const messagesDiv = document.getElementById('aiChatMessages');
    const messageDiv = document.createElement('div');
    messageDiv.className = 'ai-message ai-user-message';
    messageDiv.innerHTML = `
        <div class="ai-message-avatar">
            <i class="fas fa-user"></i>
        </div>
        <div class="ai-message-content">
            <p>${escapeHtml(message)}</p>
            <p class="ai-message-time">Just now</p>
        </div>
    `;
    messagesDiv.appendChild(messageDiv);
    scrollToBottom();
}

// Display bot message with formatting
function displayBotMessage(message) {
    const messagesDiv = document.getElementById('aiChatMessages');
    const messageDiv = document.createElement('div');
    messageDiv.className = 'ai-message ai-bot-message';
    
    // Format message with markdown-like syntax
    let formattedMessage = message
        .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
        .replace(/\*(.*?)\*/g, '<em>$1</em>')
        .replace(/`(.*?)`/g, '<code>$1</code>')
        .replace(/•/g, '•')
        .split('\n').join('<br>');
    
    messageDiv.innerHTML = `
        <div class="ai-message-avatar">
            <i class="fas fa-robot"></i>
        </div>
        <div class="ai-message-content">
            ${formattedMessage}
            <p class="ai-message-time">Just now</p>
        </div>
    `;
    messagesDiv.appendChild(messageDiv);
    scrollToBottom();
}

// Show typing indicator
function showTypingIndicator() {
    const messagesDiv = document.getElementById('aiChatMessages');
    const typingDiv = document.createElement('div');
    typingDiv.className = 'ai-message ai-bot-message';
    typingDiv.id = 'typingIndicator';
    typingDiv.innerHTML = `
        <div class="ai-message-avatar">
            <i class="fas fa-robot"></i>
        </div>
        <div class="ai-typing">
            <span></span>
            <span></span>
            <span></span>
        </div>
    `;
    messagesDiv.appendChild(typingDiv);
    scrollToBottom();
}

// Remove typing indicator
function removeTypingIndicator() {
    const typing = document.getElementById('typingIndicator');
    if (typing) typing.remove();
}

// Scroll to bottom
function scrollToBottom() {
    const messagesDiv = document.getElementById('aiChatMessages');
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
}

// Escape HTML
function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

// Auto-resize textarea
document.getElementById('aiUserInput').addEventListener('input', function() {
    this.style.height = '45px';
    this.style.height = (this.scrollHeight) + 'px';
});

// Close when clicking outside (desktop)
document.addEventListener('click', function(event) {
    const popup = document.getElementById('aiChatPopup');
    const aiButton = document.querySelector('.ai-image-button');
    const mobileButton = document.querySelector('.ai-mobile-image-btn');
    
    if (!popup.contains(event.target) && 
        !aiButton?.contains(event.target) && 
        !mobileButton?.contains(event.target) && 
        popup.classList.contains('open') && 
        window.innerWidth > 768) {
        popup.classList.remove('open');
    }
});

// Load conversation history from localStorage (optional)
window.addEventListener('load', function() {
    // Preload any saved state
    const savedHistory = localStorage.getItem('ai_conversation_history');
    if (savedHistory) {
        try {
            conversationHistory = JSON.parse(savedHistory);
        } catch (e) {
            console.log('No saved history');
        }
    }
});

// Save conversation history before unload
window.addEventListener('beforeunload', function() {
    if (conversationHistory.length > 0) {
        localStorage.setItem('ai_conversation_history', JSON.stringify(conversationHistory.slice(-50)));
    }
});
    </script>
</body>
</html>