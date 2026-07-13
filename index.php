<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aerofex International — OEM Aviation & Tactical Wear Manufacturer</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800;900&family=Barlow:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <style>
        /* ── RESET & BASE ── */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --sage: #6b7a5a;
            --sage-dark: #4e5c40;
            --sage-light: #8a9a78;
            --dark-gray: #2a2a2a;
            --light-gray: #f5f5f3;
            --white: #ffffff;
            --text: #1a1a16;
            --muted: #6b6b62;
            --border: #d4cfc5;
            --cursor-size: 28px;
            --cursor-ring: 48px;
            --transition-smooth: cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        html {
            scroll-behavior: smooth;
            cursor: none;
        }

        body {
            font-family: 'Barlow', sans-serif;
            color: var(--text);
            background: var(--white);
            overflow-x: hidden;
            cursor: none;
        }

        body.modal-open {
            overflow: hidden;
        }

        /* ── CUSTOM CURSOR ── */
        .cursor-dot {
            position: fixed;
            width: var(--cursor-size);
            height: var(--cursor-size);
            background: var(--sage);
            border-radius: 50%;
            pointer-events: none;
            z-index: 99999;
            transform: translate(-50%, -50%);
            transition: width 0.2s, height 0.2s, background 0.2s;
            mix-blend-mode: difference;
        }

        .cursor-ring {
            position: fixed;
            width: var(--cursor-ring);
            height: var(--cursor-ring);
            border: 1.5px solid var(--sage-light);
            border-radius: 50%;
            pointer-events: none;
            z-index: 99998;
            transform: translate(-50%, -50%);
            transition: width 0.3s var(--transition-smooth), height 0.3s var(--transition-smooth), border-color 0.3s, background 0.3s;
            background: transparent;
        }

        .cursor-ring.hover {
            width: 70px;
            height: 70px;
            border-color: var(--sage);
            background: rgba(107, 122, 90, 0.08);
        }

        .cursor-dot.hover {
            width: 12px;
            height: 12px;
            background: var(--sage-light);
        }

        /* ── NAV ── */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 48px;
            height: 72px;
            background: rgba(42, 42, 42, 0.94);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            transition: background 0.4s, box-shadow 0.4s;
        }

        nav.scrolled {
            background: rgba(42, 42, 42, 0.98);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .nav-logo img {
            height: 48px;
            width: auto;
            filter: brightness(0) invert(1);
        }

        .nav-logo .brand-text {
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 800;
            font-size: 20px;
            letter-spacing: 2px;
            color: #fff;
            line-height: 1;
        }

        .nav-logo .brand-sub {
            font-size: 7px;
            letter-spacing: 4px;
            color: #888;
            text-transform: uppercase;
            display: block;
        }

        .nav-links {
            display: flex;
            gap: 32px;
            list-style: none;
            align-items: center;
        }

        .nav-links a {
            font-size: 12px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.65);
            text-decoration: none;
            transition: color 0.3s, transform 0.3s;
            position: relative;
            padding: 4px 0;
            font-weight: 500;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--sage-light);
            transition: width 0.3s var(--transition-smooth);
        }

        .nav-links a:hover {
            color: #fff;
            transform: translateY(-1px);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a.active {
            color: #fff;
        }

        .nav-links a.active::after {
            width: 100%;
        }

        .nav-right {
            display: flex;
            gap: 14px;
            align-items: center;
        }

        .btn-rfq {
            background: var(--sage);
            color: #fff;
            padding: 10px 24px;
            font-size: 11px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: none;
            transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
            position: relative;
            overflow: hidden;
        }

        .btn-rfq::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), transparent 60%);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .btn-rfq:hover {
            background: var(--sage-dark);
            transform: scale(1.03);
            box-shadow: 0 4px 20px rgba(107, 122, 90, 0.4);
        }

        .btn-rfq:hover::before {
            opacity: 1;
        }

        .lang {
            color: rgba(255, 255, 255, 0.4);
            font-size: 11px;
            letter-spacing: 1px;
            cursor: none;
            transition: color 0.3s;
        }

        .lang:hover {
            color: #fff;
        }

        /* Hamburger for mobile */
        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: none;
            padding: 4px;
        }

        .hamburger span {
            width: 24px;
            height: 2px;
            background: #fff;
            transition: all 0.3s var(--transition-smooth);
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
        }

        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #11140e 0%, #1a1f15 40%, #242b1e 60%, #1a1f15 100%);
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background-image: url('./data/banner.png');
            background-size: cover;
            background-position: center top;
            opacity: 0.85;
            filter: grayscale(30%) contrast(1.1);
            transform: scale(1.05);
            animation: heroZoom 20s ease-in-out infinite alternate;
        }

        @keyframes heroZoom {
            0% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1.15);
            }
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(10, 14, 8, 0.92) 0%, rgba(10, 14, 8, 0.6) 50%, rgba(10, 14, 8, 0.1) 100%);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 120px 80px 80px;
            max-width: 720px;
        }

        .hero-tag {
            font-size: 11px;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: var(--sage-light);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            font-weight: 500;
            opacity: 0;
            animation: fadeUp 0.8s 0.2s forwards;
        }

        .hero-tag::after {
            content: '';
            display: block;
            width: 48px;
            height: 1px;
            background: var(--sage-light);
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .hero-tag {
            transform: translateY(12px);
        }

        .hero-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: clamp(48px, 8vw, 96px);
            font-weight: 900;
            line-height: 0.88;
            text-transform: uppercase;
            color: #fff;
            letter-spacing: -1px;
            margin-bottom: 24px;
            opacity: 0;
            animation: fadeUp 0.8s 0.4s forwards;
            transform: translateY(16px);
        }

        .hero-title .highlight {
            color: var(--sage-light);
        }

        .hero-desc {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.55);
            line-height: 1.8;
            max-width: 440px;
            margin-bottom: 40px;
            font-weight: 300;
            opacity: 0;
            animation: fadeUp 0.8s 0.6s forwards;
            transform: translateY(12px);
        }

        .hero-btns {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            opacity: 0;
            animation: fadeUp 0.8s 0.8s forwards;
            transform: translateY(12px);
        }

        .btn-primary {
            background: var(--sage);
            color: #fff;
            padding: 16px 32px;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
            cursor: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.12), transparent 60%);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .btn-primary:hover {
            background: var(--sage-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(107, 122, 90, 0.35);
        }

        .btn-primary:hover::before {
            opacity: 1;
        }

        .btn-outline {
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #fff;
            padding: 16px 32px;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: border-color 0.3s, background 0.3s, transform 0.3s;
            cursor: none;
            background: rgba(255, 255, 255, 0.04);
        }

        .btn-outline:hover {
            border-color: rgba(255, 255, 255, 0.6);
            background: rgba(255, 255, 255, 0.08);
            transform: translateY(-2px);
        }

        .hero-side-nav {
            position: absolute;
            right: 60px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 18px;
            z-index: 2;
        }

        .hero-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            cursor: none;
            transition: all 0.4s var(--transition-smooth);
            position: relative;
        }

        .hero-dot::after {
            content: '';
            position: absolute;
            inset: -6px;
            border-radius: 50%;
            border: 1px solid transparent;
            transition: border-color 0.4s;
        }

        .hero-dot:hover::after {
            border-color: rgba(255, 255, 255, 0.3);
        }

        .hero-dot.active {
            background: #fff;
            transform: scale(1.3);
        }

        .hero-dot.active::after {
            border-color: rgba(255, 255, 255, 0.2);
        }

        .hero-nums {
            position: absolute;
            left: 40px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 28px;
            z-index: 2;
        }

        .hero-nums span {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.2);
            letter-spacing: 2px;
            font-weight: 600;
            transition: color 0.4s, transform 0.4s;
            cursor: none;
        }

        .hero-nums span.active {
            color: rgba(255, 255, 255, 0.8);
            transform: scale(1.1);
        }

        .hero-nums span:hover {
            color: rgba(255, 255, 255, 0.6);
        }

        /* ── PRODUCTS STRIP (quick overview) ── */
        .products-strip {
            background: var(--light-gray);
            padding: 0;
            position: relative;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            border-top: 1px solid var(--border);
        }

        .product-card {
            padding: 48px 32px 40px;
            border-right: 1px solid var(--border);
            position: relative;
            transition: background 0.4s var(--transition-smooth);
            cursor: none;
            overflow: hidden;
        }

        .product-card:last-child {
            border-right: none;
        }

        .product-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.6), transparent 70%);
            opacity: 0;
            transition: opacity 0.5s;
        }

        .product-card:hover {
            background: rgba(255, 255, 255, 0.7);
        }

        .product-card:hover::before {
            opacity: 1;
        }

        .product-num {
            font-size: 13px;
            color: var(--muted);
            letter-spacing: 2px;
            font-weight: 700;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            position: relative;
            z-index: 1;
        }

        .product-num::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .product-img {
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .product-img img {
            max-height: 200px;
            max-width: 100%;
            object-fit: contain;
            filter: drop-shadow(0 6px 20px rgba(0, 0, 0, 0.12));
            transition: transform 0.5s var(--transition-smooth), filter 0.5s;
        }

        .product-card:hover .product-img img {
            transform: scale(1.06) translateY(-4px);
            filter: drop-shadow(0 12px 32px rgba(0, 0, 0, 0.2));
        }

        .product-name {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 24px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
            position: relative;
            z-index: 1;
            transition: color 0.3s;
        }

        .product-card:hover .product-name {
            color: var(--sage-dark);
        }

        .product-spec {
            font-size: 11px;
            color: var(--muted);
            letter-spacing: 1px;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .view-link {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--sage);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            position: relative;
            z-index: 1;
            transition: color 0.3s, gap 0.3s;
            cursor: none;
        }

        .view-link::after {
            content: '→';
            transition: transform 0.3s;
        }

        .view-link:hover {
            color: var(--sage-dark);
            gap: 14px;
        }

        .view-link:hover::after {
            transform: translateX(4px);
        }

        /* ── PRODUCT DETAILS SECTION (full descriptions & features) ── */
        .product-details {
            padding: 80px 72px;
            background: #fff;
            border-top: 1px solid var(--border);
            scroll-margin-top: 80px;
        }

        .product-details-header {
            text-align: center;
            margin-bottom: 56px;
        }

        .product-details-header h2 {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 38px;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }

        .product-details-header p {
            color: var(--muted);
            font-size: 14px;
        }

        .product-detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 48px;
        }

        .product-detail-card {
            background: var(--light-gray);
            padding: 40px 36px;
            border-radius: 2px;
            transition: transform 0.4s var(--transition-smooth), box-shadow 0.4s;
            cursor: none;
        }

        .product-detail-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.06);
        }

        .product-detail-card .pd-name {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 26px;
            font-weight: 800;
            margin-bottom: 4px;
            letter-spacing: -0.3px;
        }

        .product-detail-card .pd-desc {
            font-size: 14px;
            color: var(--muted);
            line-height: 1.7;
            margin-bottom: 18px;
        }

        .product-detail-card .pd-features {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .product-detail-card .pd-features li {
            font-size: 13px;
            color: var(--text);
            padding-left: 20px;
            position: relative;
            line-height: 1.6;
        }

        .product-detail-card .pd-features li::before {
            content: '—';
            position: absolute;
            left: 0;
            color: var(--sage);
        }

        .product-detail-card .pd-cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 20px;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--sage);
            text-decoration: none;
            font-weight: 700;
            transition: color 0.3s, gap 0.3s;
            cursor: none;
        }

        .product-detail-card .pd-cta::after {
            content: '→';
            transition: transform 0.3s;
        }

        .product-detail-card .pd-cta:hover {
            color: var(--sage-dark);
            gap: 14px;
        }

        .product-detail-card .pd-cta:hover::after {
            transform: translateX(4px);
        }

        /* ── ABOUT ── */
        .about {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 520px;
        }

        .about-left {
            padding: 80px 64px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #fff;
            position: relative;
        }

        .about-left::after {
            content: '';
            position: absolute;
            right: 0;
            top: 40px;
            bottom: 40px;
            width: 1px;
            background: var(--border);
            opacity: 0.5;
        }

        .section-label {
            font-size: 10px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            font-weight: 600;
        }

        .section-label::after {
            content: '';
            display: block;
            width: 32px;
            height: 1px;
            background: var(--border);
        }

        .about-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 40px;
            font-weight: 800;
            line-height: 1.08;
            margin-bottom: 20px;
            max-width: 460px;
            letter-spacing: -0.5px;
        }

        .about-body {
            font-size: 14px;
            color: var(--muted);
            line-height: 1.9;
            max-width: 400px;
            margin-bottom: 32px;
            font-weight: 400;
        }

        .learn-more {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--sage);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            transition: color 0.3s, gap 0.3s;
            cursor: none;
        }

        .learn-more::after {
            content: '→';
            transition: transform 0.3s;
        }

        .learn-more:hover {
            color: var(--sage-dark);
            gap: 14px;
        }

        .learn-more:hover::after {
            transform: translateX(4px);
        }

        .about-right {
            background: var(--dark-gray);
            position: relative;
            overflow: hidden;
        }

        .about-right-bg {
            position: absolute;
            inset: 0;
            background-image: url('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
            opacity: 0.25;
            transition: opacity 0.6s;
        }

        .about-right:hover .about-right-bg {
            opacity: 0.35;
        }

        .mfg-panel {
            position: relative;
            z-index: 2;
            padding: 64px 56px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .mfg-tag {
            font-size: 10px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--sage-light);
            margin-bottom: 32px;
            font-weight: 600;
            opacity: 0.7;
        }

        .mfg-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .mfg-list li {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            letter-spacing: 0.5px;
            font-weight: 400;
            transition: color 0.3s, transform 0.3s;
            cursor: none;
        }

        .mfg-list li:hover {
            color: #fff;
            transform: translateX(4px);
        }

        .mfg-list li::before {
            content: '';
            width: 22px;
            height: 22px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 4px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s, border-color 0.3s;
        }

        .mfg-list li:hover::before {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .explore-cap {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 36px;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--sage-light);
            text-decoration: none;
            font-weight: 700;
            border-bottom: 1px solid rgba(200, 184, 154, 0.25);
            padding-bottom: 4px;
            transition: color 0.3s, gap 0.3s, border-color 0.3s;
            cursor: none;
            align-self: flex-start;
        }

        .explore-cap::after {
            content: '→';
            transition: transform 0.3s;
        }

        .explore-cap:hover {
            color: #fff;
            gap: 14px;
            border-color: rgba(255, 255, 255, 0.4);
        }

        .explore-cap:hover::after {
            transform: translateX(4px);
        }

        /* ── FACTORY BANNER ── */
        .factory-banner {
            position: relative;
            height: 380px;
            overflow: hidden;
        }

        .factory-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.45) contrast(1.05);
            transition: transform 0.8s var(--transition-smooth), filter 0.8s;
        }

        .factory-banner:hover img {
            transform: scale(1.03);
            filter: brightness(0.5) contrast(1.1);
        }

        .factory-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(42, 42, 42, 0.8) 0%, rgba(42, 42, 42, 0.3) 60%, transparent 100%);
        }

        .factory-label {
            position: absolute;
            bottom: 40px;
            left: 56px;
            z-index: 2;
            color: rgba(255, 255, 255, 0.7);
            font-size: 11px;
            letter-spacing: 4px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .factory-label span {
            color: #fff;
        }

        /* ── CERTIFICATIONS + TESTIMONIALS ── */
        .cert-test {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            background: var(--light-gray);
        }

        .cert-section {
            padding: 64px 72px;
            border-right: 1px solid var(--border);
        }

        .cert-logos {
            display: flex;
            align-items: center;
            gap: 32px;
            flex-wrap: wrap;
            margin-top: 36px;
        }

        .cert-badge {
            text-align: center;
            transition: transform 0.4s var(--transition-smooth), opacity 0.4s;
            cursor: none;
            padding: 8px;
        }

        .cert-badge:hover {
            transform: translateY(-6px);
        }

        .cert-badge .badge-icon {
            width: 76px;
            height: 76px;
            border: 2px solid var(--border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 800;
            font-size: 16px;
            color: var(--sage-dark);
            background: #fff;
            transition: border-color 0.4s, box-shadow 0.4s, transform 0.4s;
        }

        .cert-badge:hover .badge-icon {
            border-color: var(--sage);
            box-shadow: 0 4px 20px rgba(107, 122, 90, 0.12);
            transform: scale(1.04);
        }

        .cert-badge p {
            font-size: 10px;
            color: var(--muted);
            letter-spacing: 1px;
            text-align: center;
            line-height: 1.4;
        }

        .test-section {
            padding: 64px 72px;
            background: #fff;
        }

        .testimonial {
            margin-top: 36px;
            position: relative;
        }

        .quote-mark {
            font-size: 56px;
            color: var(--sage);
            line-height: 1;
            margin-bottom: 12px;
            font-family: Georgia, serif;
            opacity: 0.3;
            transition: opacity 0.4s;
        }

        .testimonial:hover .quote-mark {
            opacity: 0.6;
        }

        .quote-text {
            font-size: 15px;
            line-height: 1.9;
            color: var(--text);
            max-width: 400px;
            margin-bottom: 24px;
            font-weight: 400;
            font-style: italic;
        }

        .quote-attr {
            font-size: 12px;
            color: var(--muted);
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .quote-attr strong {
            color: var(--text);
            font-weight: 600;
        }

        /* ── JOURNAL ── */
        .journal {
            padding: 80px 72px;
            background: #fff;
        }

        .journal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 48px;
        }

        .view-all {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--sage);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            transition: color 0.3s, gap 0.3s;
            cursor: none;
        }

        .view-all::after {
            content: '→';
            transition: transform 0.3s;
        }

        .view-all:hover {
            color: var(--sage-dark);
            gap: 14px;
        }

        .view-all:hover::after {
            transform: translateX(4px);
        }

        .journal-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .article-card {
            display: flex;
            flex-direction: column;
            gap: 14px;
            cursor: none;
            transition: transform 0.4s var(--transition-smooth);
        }

        .article-card:hover {
            transform: translateY(-6px);
        }

        .article-thumb {
            height: 200px;
            overflow: hidden;
            background: var(--dark-gray);
            position: relative;
            border-radius: 2px;
        }

        .article-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.85;
            transition: opacity 0.5s, transform 0.6s var(--transition-smooth);
        }

        .article-card:hover .article-thumb img {
            opacity: 1;
            transform: scale(1.04);
        }

        .article-thumb::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(42, 42, 42, 0.2), transparent 60%);
            opacity: 0;
            transition: opacity 0.5s;
        }

        .article-card:hover .article-thumb::after {
            opacity: 1;
        }

        .article-cat {
            font-size: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--sage);
            font-weight: 700;
        }

        .article-date {
            font-size: 11px;
            color: var(--muted);
        }

        .article-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .article-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 20px;
            font-weight: 700;
            line-height: 1.2;
            transition: color 0.3s;
        }

        .article-card:hover .article-title {
            color: var(--sage-dark);
        }

        .read-more {
            font-size: 11px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--sage);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 700;
            margin-top: 4px;
            transition: color 0.3s, gap 0.3s;
            cursor: none;
            align-self: flex-start;
        }

        .read-more::after {
            content: '→';
            transition: transform 0.3s;
        }

        .read-more:hover {
            color: var(--sage-dark);
            gap: 12px;
        }

        .read-more:hover::after {
            transform: translateX(4px);
        }

        /* ── GLOBAL + RFQ ── */
        .global-rfq {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
        }

        .global-section {
            background: var(--dark-gray);
            padding: 72px 56px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
            min-height: 400px;
        }

        .world-map {
            position: absolute;
            inset: 0;
            opacity: 0.06;
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/8/80/World_map_-_low_resolution.svg/1280px-World_map_-_low_resolution.svg.png');
            background-size: cover;
            background-position: center;
            filter: invert(1);
            transition: opacity 0.6s;
        }

        .global-section:hover .world-map {
            opacity: 0.1;
        }

        .global-content {
            position: relative;
            z-index: 2;
        }

        .global-label {
            font-size: 10px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--sage-light);
            opacity: 0.6;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .global-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 40px;
            font-weight: 800;
            color: #fff;
            line-height: 1.1;
            margin-bottom: 32px;
            max-width: 300px;
            letter-spacing: -0.5px;
        }

        .markets-link {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--sage-light);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            border-bottom: 1px solid rgba(200, 184, 154, 0.25);
            padding-bottom: 4px;
            transition: color 0.3s, gap 0.3s, border-color 0.3s;
            cursor: none;
        }

        .markets-link::after {
            content: '→';
            transition: transform 0.3s;
        }

        .markets-link:hover {
            color: #fff;
            gap: 14px;
            border-color: rgba(255, 255, 255, 0.4);
        }

        .markets-link:hover::after {
            transform: translateX(4px);
        }

        .rfq-section {
            background: var(--light-gray);
            padding: 72px 56px;
        }

        .rfq-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 4px;
            letter-spacing: -0.5px;
        }

        .rfq-sub {
            font-size: 13px;
            color: var(--muted);
            margin-bottom: 32px;
            font-weight: 400;
        }

        .rfq-form {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .rfq-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .rfq-form input,
        .rfq-form select,
        .rfq-form textarea {
            width: 100%;
            padding: 14px 18px;
            font-size: 13px;
            font-family: 'Barlow', sans-serif;
            border: 1px solid var(--border);
            background: #fff;
            color: var(--text);
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s, transform 0.3s;
            appearance: none;
            border-radius: 2px;
        }

        .rfq-form input:focus,
        .rfq-form select:focus,
        .rfq-form textarea:focus {
            border-color: var(--sage);
            box-shadow: 0 0 0 3px rgba(107, 122, 90, 0.08);
            transform: translateY(-1px);
        }

        .rfq-form input::placeholder,
        .rfq-form textarea::placeholder {
            color: #bbb;
        }

        .rfq-form textarea {
            height: 80px;
            resize: none;
        }

        .rfq-submit {
            background: var(--sage);
            color: #fff;
            padding: 16px 24px;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 700;
            border: none;
            cursor: none;
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
            width: 100%;
            border-radius: 2px;
            position: relative;
            overflow: hidden;
        }

        .rfq-submit::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), transparent 60%);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .rfq-submit:hover {
            background: var(--sage-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(107, 122, 90, 0.3);
        }

        .rfq-submit:hover::before {
            opacity: 1;
        }

        /* ── FOOTER ── */
        footer {
            background: var(--dark-gray);
            color: rgba(255, 255, 255, 0.5);
            padding: 64px 72px 32px;
        }

        .footer-top {
            display: grid;
            grid-template-columns: 1.6fr 1fr 1fr 1fr 1fr;
            gap: 48px;
            margin-bottom: 48px;
        }

        .footer-brand .brand {
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 800;
            font-size: 20px;
            letter-spacing: 3px;
            color: #fff;
        }

        .footer-brand .sub {
            font-size: 8px;
            letter-spacing: 4px;
            color: #666;
            text-transform: uppercase;
        }

        .footer-brand p {
            font-size: 12px;
            line-height: 1.8;
            margin-top: 16px;
            max-width: 220px;
            color: rgba(255, 255, 255, 0.4);
        }

        .footer-social {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .footer-social a {
            width: 36px;
            height: 36px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.4);
            text-decoration: none;
            font-size: 14px;
            transition: border-color 0.3s, color 0.3s, transform 0.3s, background 0.3s;
            cursor: none;
            border-radius: 2px;
        }

        .footer-social a:hover {
            border-color: rgba(255, 255, 255, 0.25);
            color: #fff;
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.04);
        }

        .footer-col h4 {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #fff;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .footer-col ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footer-col ul a {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.4);
            text-decoration: none;
            transition: color 0.3s, transform 0.3s;
            cursor: none;
            display: inline-block;
        }

        .footer-col ul a:hover {
            color: #fff;
            transform: translateX(4px);
        }

        .footer-col .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 12px;
            margin-bottom: 10px;
            color: rgba(255, 255, 255, 0.4);
        }

        .footer-col .contact-item a {
            color: rgba(255, 255, 255, 0.4);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-col .contact-item a:hover {
            color: #fff;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            padding-top: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-bottom p {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.2);
            letter-spacing: 0.5px;
        }

        /* ── MODAL ── */
        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 99990;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(6px);
            display: none;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s var(--transition-smooth);
            cursor: none;
            padding: 20px;
        }

        .modal-overlay.open {
            display: flex;
            opacity: 1;
        }

        .modal-content {
            background: #fff;
            border-radius: 4px;
            max-width: 680px;
            width: 100%;
            height: 70vh;
            overflow-y: auto;
            padding: 48px 40px 40px;
            position: relative;
            transform: translateY(20px) scale(0.96);
            transition: transform 0.3s var(--transition-smooth);
            cursor: auto;
        }

        .modal-overlay.open .modal-content {
            transform: translateY(0) scale(1);
        }

        .modal-close {
            position: absolute;
            top: 16px;
            right: 20px;
            font-size: 28px;
            color: var(--muted);
            background: none;
            border: none;
            cursor: none;
            transition: color 0.3s, transform 0.3s;
            line-height: 1;
            padding: 4px 8px;
        }

        .modal-close:hover {
            color: var(--text);
            transform: rotate(90deg);
        }

        .modal-content h2 {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 4px;
            letter-spacing: -0.3px;
            padding-right: 40px;
        }

        .modal-content .modal-desc {
            font-size: 15px;
            color: var(--muted);
            line-height: 1.8;
            margin-bottom: 24px;
        }

        .modal-content .modal-features {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .modal-content .modal-features li {
            font-size: 14px;
            color: var(--text);
            padding-left: 22px;
            position: relative;
            line-height: 1.7;
        }

        .modal-content .modal-features li::before {
            content: '—';
            position: absolute;
            left: 0;
            color: var(--sage);
        }

        .modal-content .modal-footer {
            margin-top: 32px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .modal-content .modal-footer a {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 700;
            text-decoration: none;
            color: var(--sage);
            transition: color 0.3s, gap 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: none;
        }

        .modal-content .modal-footer a::after {
            content: '→';
            transition: transform 0.3s;
        }

        .modal-content .modal-footer a:hover {
            color: var(--sage-dark);
            gap: 14px;
        }

        .modal-content .modal-footer a:hover::after {
            transform: translateX(4px);
        }

        .modal-content .modal-footer .btn-rfq-modal {
            background: var(--sage);
            color: #fff;
            padding: 10px 24px;
            font-size: 11px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-weight: 700;
            text-decoration: none;
            border: none;
            border-radius: 2px;
            transition: background 0.3s, transform 0.3s;
            cursor: none;
        }

        .modal-content .modal-footer .btn-rfq-modal:hover {
            background: var(--sage-dark);
            transform: translateY(-2px);
        }

        /* Scrollbar styling for modal */
        .modal-content::-webkit-scrollbar {
            width: 6px;
        }
        .modal-content::-webkit-scrollbar-track {
            background: var(--light-gray);
        }
        .modal-content::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 3px;
        }
        .modal-content::-webkit-scrollbar-thumb:hover {
            background: var(--muted);
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 1100px) {
            .footer-top {
                grid-template-columns: 1fr 1fr 1fr;
                gap: 32px;
            }
            .footer-top .footer-brand {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 900px) {
            .cursor-dot,
            .cursor-ring {
                display: none;
            }
            body {
                cursor: auto;
            }
            nav {
                padding: 0 24px;
                height: 64px;
            }
            .nav-links {
                display: none;
                position: absolute;
                top: 64px;
                left: 0;
                right: 0;
                background: rgba(42, 42, 42, 0.98);
                flex-direction: column;
                padding: 24px 32px;
                gap: 16px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.06);
                backdrop-filter: blur(12px);
            }
            .nav-links.open {
                display: flex;
            }
            .hamburger {
                display: flex;
            }
            .hero-content {
                padding: 100px 32px 60px;
            }
            .hero-nums {
                display: none;
            }
            .hero-side-nav {
                right: 24px;
            }
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .product-card {
                padding: 32px 24px;
            }
            .product-detail-grid {
                grid-template-columns: 1fr;
            }
            .product-details {
                padding: 48px 32px;
            }
            .about {
                grid-template-columns: 1fr;
            }
            .about-left::after {
                display: none;
            }
            .about-left {
                padding: 48px 32px;
            }
            .about-right {
                min-height: 360px;
            }
            .mfg-panel {
                padding: 40px 32px;
            }
            .cert-test {
                grid-template-columns: 1fr;
            }
            .cert-section {
                border-right: none;
                border-bottom: 1px solid var(--border);
                padding: 48px 32px;
            }
            .test-section {
                padding: 48px 32px;
            }
            .journal-grid {
                grid-template-columns: 1fr;
            }
            .journal {
                padding: 48px 32px;
            }
            .global-rfq {
                grid-template-columns: 1fr;
            }
            .global-section {
                padding: 48px 32px;
                min-height: 300px;
            }
            .rfq-section {
                padding: 48px 32px;
            }
            footer {
                padding: 48px 32px 24px;
            }
            .footer-top {
                grid-template-columns: 1fr 1fr;
                gap: 24px;
            }
            .footer-bottom {
                flex-direction: column;
                gap: 8px;
                text-align: center;
            }
            .factory-banner {
                height: 240px;
            }
            .factory-label {
                left: 24px;
                bottom: 20px;
                font-size: 9px;
            }
            .modal-content {
                padding: 32px 24px 28px;
                height: 70vh;
                max-width: 100%;
                margin: 10px;
            }
            .modal-content h2 {
                font-size: 26px;
            }
        }

        @media (max-width: 520px) {
            .products-grid {
                grid-template-columns: 1fr;
            }
            .product-card {
                border-right: none;
                border-bottom: 1px solid var(--border);
            }
            .product-card:last-child {
                border-bottom: none;
            }
            .rfq-row {
                grid-template-columns: 1fr;
            }
            .footer-top {
                grid-template-columns: 1fr;
            }
            .hero-title {
                font-size: 38px;
            }
            .hero-content {
                padding: 80px 20px 40px;
            }
            .hero-btns {
                flex-direction: column;
            }
            .hero-side-nav {
                display: none;
            }
            .nav-logo .brand-text {
                font-size: 16px;
            }
            .nav-logo img {
                height: 36px;
            }
            .modal-content {
                padding: 24px 16px 20px;
                height: 70vh;
            }
            .modal-content h2 {
                font-size: 22px;
            }
        }

        /* ── SCROLL REVEAL (utility) ── */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s var(--transition-smooth), transform 0.7s var(--transition-smooth);
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-delay-1 {
            transition-delay: 0.1s;
        }
        .reveal-delay-2 {
            transition-delay: 0.2s;
        }
        .reveal-delay-3 {
            transition-delay: 0.3s;
        }
        .reveal-delay-4 {
            transition-delay: 0.4s;
        }
    </style>
</head>

<body>

    <!-- ── CUSTOM CURSOR ── -->
    <div class="cursor-dot" id="cursorDot"></div>
    <div class="cursor-ring" id="cursorRing"></div>

    <!-- ── NAV ── -->
    <nav id="navbar">
        <a href="#" class="nav-logo">
            <img src="./data/logo.png" alt="Aerofex" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22%3E%3Ctext x=%2250%22 y=%2250%22 font-family=%22Barlow Condensed%22 font-size=%2230%22 font-weight=%22800%22 fill=%22%23ffffff%22 text-anchor=%22middle%22 dy=%22.3em%22%3EAF%3C/text%3E%3C/svg%3E'" />
            <div>
                <span class="brand-text">AEROFEX</span>
                <span class="brand-sub">International</span>
            </div>
        </a>
        <ul class="nav-links" id="navLinks">
            <li><a href="#home" class="active">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="#capabilities">Capabilities</a></li>
            <li><a href="#certifications">Certifications</a></li>
            <li><a href="#journal">Journal</a></li>
        </ul>
        <div class="nav-right">
            <a href="#rfq" class="btn-rfq">Request RFQ</a>
            <span class="lang">EN ▾</span>
            <div class="hamburger" id="hamburger">
                <span></span><span></span><span></span>
            </div>
        </div>
    </nav>

    <!-- ── HERO ── -->
    <section class="hero" id="home">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>
        <div class="hero-nums">
            <span class="active">01</span>
            <span>02</span>
            <span>03</span>
        </div>
        <div class="hero-content">
            <div class="hero-tag">OEM Aviation & Tactical Wear</div>
            <h1 class="hero-title">Engineered for<br><span class="highlight">Aviation &amp; Tactical</span><br>Performance</h1>
            <p class="hero-desc">OEM aviation-grade protective apparel manufactured for demanding operational environments.</p>
            <div class="hero-btns">
                <a href="#products" class="btn-primary">Explore Products →</a>
                <a href="#rfq" class="btn-outline">Request a Quotation</a>
            </div>
        </div>
        <div class="hero-side-nav">
            <div class="hero-dot active"></div>
            <div class="hero-dot"></div>
            <div class="hero-dot"></div>
            <div class="hero-dot"></div>
        </div>
    </section>

    <!-- ── PRODUCTS STRIP (quick overview) ── -->
    <section id="products" class="products-strip">
        <div class="products-grid">
            <div class="product-card reveal reveal-delay-1">
                <div class="product-num">01</div>
                <div class="product-img">
                    <img src="./data/1.png" alt="Flight Coverall" onerror="this.src='https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=400&fit=crop&q=80'" />
                </div>
                <div class="product-name">Flight<br />Coverall</div>
                <div class="product-spec">Nomex® · Aviation utility</div>
                <a href="#product-details" class="view-link">View Product</a>
            </div>
            <div class="product-card reveal reveal-delay-2">
                <div class="product-num">02</div>
                <div class="product-img">
                    <img src="./data/3.png" alt="Nomex Gloves" onerror="this.src='https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=400&fit=crop&q=80'" />
                </div>
                <div class="product-name">Nomex<br />Gloves</div>
                <div class="product-spec">Flame resistant · Soft leather palm</div>
                <a href="#product-details" class="view-link">View Product</a>
            </div>
            <div class="product-card reveal reveal-delay-3">
                <div class="product-num">03</div>
                <div class="product-img">
                    <img src="./data/4.png" alt="Tactical Combat Shirt" onerror="this.src='https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=400&fit=crop&q=80'" />
                </div>
                <div class="product-name">Tactical<br />Combat Shirt</div>
                <div class="product-spec">Moisture-wicking · Reinforced elbows</div>
                <a href="#product-details" class="view-link">View Product</a>
            </div>
            <div class="product-card reveal reveal-delay-4">
                <div class="product-num">04</div>
                <div class="product-img">
                    <img src="./data/gloves.png" alt="Tactical Operator Gloves" onerror="this.src='https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=400&fit=crop&q=80'" />
                </div>
                <div class="product-name">Tactical<br />Operator Gloves</div>
                <div class="product-spec">Knuckle protection · High dexterity</div>
                <a href="#product-details" class="view-link">View Product</a>
            </div>
        </div>
    </section>

    <!-- ── PRODUCT DETAILS SECTION (full descriptions & features) ── -->
    <section class="product-details" id="product-details">
        <div class="product-details-header">
            <div class="section-label" style="justify-content:center; margin-bottom:12px;">Product Specifications</div>
            <h2>Detailed Product Information</h2>
            <p>Full descriptions and features for our complete product line.</p>
        </div>
        <div class="product-detail-grid">
            <!-- Flight Coverall -->
            <div class="product-detail-card reveal reveal-delay-1">
                <div class="pd-name">Flight Coverall</div>
                <div class="pd-desc">Nomex® flight suit inspired by aviation utility wear standards. MIL-SPEC inspired product construction ensures reliability in demanding operational environments.</div>
                <ul class="pd-features">
                    <li>Aviation-inspired utility construction</li>
                    <li>Ergonomic operational fit</li>
                    <li>Heavy-duty zipper system</li>
                    <li>Reinforced stitching</li>
                    <li>Velcro patch areas</li>
                    <li>OEM customization support</li>
                </ul>
                <a href="#" class="pd-cta" data-target="modal-flight-coverall">View Full Details</a>
            </div>

            <!-- Nomex Gloves -->
            <div class="product-detail-card reveal reveal-delay-2">
                <div class="pd-name">Nomex Gloves</div>
                <div class="pd-desc">Flame-resistant aviation gloves designed for durability and operational comfort. Engineered for performance in high-temperature environments.</div>
                <ul class="pd-features">
                    <li>Soft leather palm</li>
                    <li>Flame-resistant fabric construction</li>
                    <li>Reinforced grip areas</li>
                    <li>Operational comfort fit</li>
                    <li>Aviation utility design</li>
                </ul>
                <a href="#" class="pd-cta" data-target="modal-nomex-gloves">View Full Details</a>
            </div>

            <!-- Tactical Combat Shirt -->
            <div class="product-detail-card reveal reveal-delay-3">
                <div class="pd-name">Tactical Combat Shirt</div>
                <div class="pd-desc">High-performance tactical combat shirt designed for operational mobility and comfort under body armor. Features moisture-wicking torso fabric and durable ripstop sleeves.</div>
                <ul class="pd-features">
                    <li>Moisture-wicking core fabric</li>
                    <li>Ripstop reinforced sleeves</li>
                    <li>Velcro patch panels on shoulders</li>
                    <li>Zip collar design</li>
                    <li>OEM customization support</li>
                </ul>
                <a href="#" class="pd-cta" data-target="modal-tactical-shirt">View Full Details</a>
            </div>

            <!-- Tactical Operator Gloves -->
            <div class="product-detail-card reveal reveal-delay-4">
                <div class="pd-name">Tactical Operator Gloves</div>
                <div class="pd-desc">Heavy-duty tactical operator gloves offering hard knuckle protection and enhanced grip. Designed for rugged environments requiring high dexterity and impact resistance.</div>
                <ul class="pd-features">
                    <li>Hard polymer knuckle protection</li>
                    <li>Breathable tactical mesh</li>
                    <li>Reinforced palm grip</li>
                    <li>Adjustable wrist closure</li>
                    <li>High dexterity design</li>
                </ul>
                <a href="#" class="pd-cta" data-target="modal-tactical-gloves">View Full Details</a>
            </div>
        </div>
    </section>

    <!-- ── ABOUT ── -->
    <section class="about" id="about">
        <div class="about-left">
            <div class="section-label">About Aerofex</div>
            <h2 class="about-title">Pakistan-based OEM manufacturer of aviation wear, Nomex® protective apparel, and mission-oriented workwear.</h2>
            <p class="about-body">
                Aerofex International is a Pakistan-based OEM manufacturer specializing in aviation wear, Nomex® protective apparel, tactical gloves, and mission-oriented workwear for global B2B markets. We focus on durability, functionality, technical construction, and scalable export manufacturing solutions.
            </p>
            <a href="#" class="learn-more">Learn More About Us</a>
        </div>
        <div class="about-right" id="capabilities">
            <div class="about-right-bg"></div>
            <div class="mfg-panel">
                <div class="mfg-tag">Manufacturing Excellence</div>
                <ul class="mfg-list">
                    <li>In-house OEM manufacturing</li>
                    <li>Technical apparel development</li>
                    <li>Flexible customization &amp; private labeling</li>
                    <li>Quality inspection throughout production</li>
                    <li>Export-oriented manufacturing support</li>
                </ul>
                <a href="#" class="explore-cap">Explore Capabilities</a>
            </div>
        </div>
    </section>

    <!-- ── FACTORY BANNER ── -->
    <div class="factory-banner">
        <img src="./data/factory.png" alt="Aerofex Manufacturing Facility" onerror="this.src='https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=1400&auto=format&fit=crop&q=80'" />
        <div class="factory-overlay"></div>
        <div class="factory-label">Precision <span>·</span> Performance <span>·</span> Protection</div>
    </div>

    <!-- ── CERTIFICATIONS + TESTIMONIALS ── -->
    <section class="cert-test" id="certifications">
        <div class="cert-section">
            <div class="section-label">Certifications &amp; Compliance</div>
            <div class="cert-logos">
                <div class="cert-badge">
                    <div class="badge-icon" style="font-size:14px;">ISO<br /><span style="font-size:9px;">9001</span></div>
                    <p>ISO 9001 Process<br />In Progress</p>
                </div>
                <div class="cert-badge">
                    <div class="badge-icon" style="font-size:11px; letter-spacing:1px;">TECH<br />FABRIC</div>
                    <p>Technical fabric<br />sourcing available</p>
                </div>
                <div class="cert-badge">
                    <div class="badge-icon" style="font-size:22px;">✓</div>
                    <p>Testing support<br />available on request</p>
                </div>
                <div class="cert-badge">
                    <div class="badge-icon" style="font-size:18px;">🌍</div>
                    <p>OEM manufacturing<br />for international markets</p>
                </div>
            </div>
            <p style="font-size:12px; color:var(--muted); margin-top:24px; line-height:1.6; max-width:360px;">
                Materials include Nomex® IIIA and technical fabrics. Testing available through independent labs upon request.
            </p>
        </div>
        <div class="test-section">
            <div class="section-label">Testimonials</div>
            <div class="testimonial">
                <div class="quote-mark">"</div>
                <p class="quote-text">
                    Aerofex International consistently delivers high-quality products that meet demanding operational standards. Their professionalism and reliability make them a trusted manufacturing partner.
                </p>
                <div class="quote-attr">
                    <strong>— Procurement Director</strong>
                    <span>Verified Client</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ── JOURNAL ── -->
    <section class="journal" id="journal">
        <div class="journal-header">
            <div class="section-label" style="margin-bottom:0">Journal &amp; Insights</div>
            <a href="#" class="view-all">View All Articles</a>
        </div>
        <div class="journal-grid">
            <div class="article-card reveal reveal-delay-1">
                <div class="article-thumb">
                    <img src="https://images.unsplash.com/photo-1540575861501-7cf05a4b125a?w=600&auto=format&fit=crop&q=80" alt="Aviation" />
                </div>
                <div class="article-meta">
                    <span class="article-cat">Aviation</span>
                    <span class="article-date">May 12, 2024</span>
                </div>
                <h3 class="article-title">History of Flight Suits</h3>
                <a href="#" class="read-more">Read More</a>
            </div>
            <div class="article-card reveal reveal-delay-2">
                <div class="article-thumb">
                    <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?w=600&auto=format&fit=crop&q=80" alt="Material" />
                </div>
                <div class="article-meta">
                    <span class="article-cat">Material</span>
                    <span class="article-date">Apr 28, 2024</span>
                </div>
                <h3 class="article-title">What is Nomex® Fabric?</h3>
                <a href="#" class="read-more">Read More</a>
            </div>
            <div class="article-card reveal reveal-delay-3">
                <div class="article-thumb">
                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&auto=format&fit=crop&q=80" alt="Tactical" />
                </div>
                <div class="article-meta">
                    <span class="article-cat">Tactical</span>
                    <span class="article-date">Apr 10, 2024</span>
                </div>
                <h3 class="article-title">Why Aviation Gloves Use Flame-Resistant Materials</h3>
                <a href="#" class="read-more">Read More</a>
            </div>
        </div>
    </section>

    <!-- ── GLOBAL + RFQ ── -->
    <section class="global-rfq">
        <div class="global-section">
            <div class="world-map"></div>
            <div class="global-content">
                <div class="global-label">Global Presence</div>
                <h2 class="global-title">Export-ready production support for international buyers.</h2>
                <a href="#" class="markets-link">Our Markets</a>
            </div>
        </div>
        <div class="rfq-section" id="rfq">
            <h2 class="rfq-title">Request a Quotation</h2>
            <p class="rfq-sub">Submit your requirements and our team will respond with OEM manufacturing support details.</p>
            <form class="rfq-form" onsubmit="return false;">
                <div class="rfq-row">
                    <input type="text" placeholder="Your Name" />
                    <input type="text" placeholder="Company" />
                </div>
                <div class="rfq-row">
                    <input type="email" placeholder="Email" />
                    <input type="text" placeholder="Phone / WhatsApp" />
                </div>
                <div class="rfq-row">
                    <select>
                        <option value="">Country</option>
                        <option>Pakistan</option>
                        <option>United States</option>
                        <option>United Kingdom</option>
                        <option>Germany</option>
                        <option>UAE</option>
                        <option>Saudi Arabia</option>
                        <option>Other</option>
                    </select>
                    <select>
                        <option value="">Product Interest</option>
                        <option>Flight Coverall</option>
                        <option>Nomex Gloves</option>
                        <option>Tactical Combat Shirt</option>
                        <option>Tactical Operator Gloves</option>
                        <option>All Products</option>
                    </select>
                </div>
                <input type="text" placeholder="Estimated Quantity" />
                <textarea placeholder="Message"></textarea>
                <button type="submit" class="rfq-submit">Submit RFQ →</button>
            </form>
        </div>
    </section>

    <!-- ── FOOTER ── -->
    <footer>
        <div class="footer-top">
            <div class="footer-brand">
                <img src="./data/logo.png" alt="Aerofex" style="height:64px; filter:brightness(0) invert(1); margin-bottom:8px;" onerror="this.style.display='none'" />
                <div class="brand">AEROFEX</div>
                <span class="sub">International</span>
                <p>Pakistan-based OEM manufacturer of aviation wear, Nomex® protective apparel, tactical gloves, and technical workwear for international B2B markets.</p>
                <div class="footer-social">
                    <a href="#" aria-label="LinkedIn">in</a>
                    <a href="#" aria-label="Email">✉</a>
                    <a href="#" aria-label="WhatsApp">📱</a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Company</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Capabilities</a></li>
                    <li><a href="#">Quality Assurance</a></li>
                    <li><a href="#">Certifications</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Products</h4>
                <ul>
                    <li><a href="#product-details">Flight Coverall</a></li>
                    <li><a href="#product-details">Nomex Gloves</a></li>
                    <li><a href="#product-details">Tactical Combat Shirt</a></li>
                    <li><a href="#product-details">Tactical Operator Gloves</a></li>
                    <li><a href="#product-details">All Products</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Support</h4>
                <ul>
                    <li><a href="#rfq">Request RFQ</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Export Information</a></li>
                    <li><a href="#">FAQs</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <div class="contact-item">✉ <a href="mailto:sales@aerofexintl.com">sales@aerofexintl.com</a></div>
                <div class="contact-item">📞 <span>+92 300 1234567</span></div>
                <div class="contact-item">💬 <a href="https://wa.me/923001234567" target="_blank">WhatsApp</a></div>
                <div class="contact-item">📦 <span>Export Department · Sialkot, Pakistan</span></div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 Aerofex International. All rights reserved.</p>
            <p>Made in Pakistan · Designed for the World</p>
        </div>
    </footer>

    <!-- ── MODAL OVERLAY ── -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal-content" id="modalContent">
            <button class="modal-close" id="modalClose">✕</button>
            <div id="modalBody"></div>
        </div>
    </div>

    <!-- ── MODAL CONTENT BLOCKS (hidden) ── -->
    <div id="modal-flight-coverall" style="display:none;">
        <h2>Flight Coverall</h2>
        <p class="modal-desc">Nomex® flight suit inspired by aviation utility wear standards. MIL-SPEC inspired product construction ensures reliability in demanding operational environments.</p>
        <ul class="modal-features">
            <li>Aviation-inspired utility construction</li>
            <li>Ergonomic operational fit</li>
            <li>Heavy-duty zipper system</li>
            <li>Reinforced stitching</li>
            <li>Velcro patch areas</li>
            <li>OEM customization support</li>
        </ul>
        <div class="modal-footer">
            <a href="#rfq">Request a Quotation</a>
            <a href="#product-details">Back to Products</a>
            <a href="#" class="btn-rfq-modal" onclick="document.getElementById('modalClose').click(); return false;">Close</a>
        </div>
    </div>

    <div id="modal-nomex-gloves" style="display:none;">
        <h2>Nomex Gloves</h2>
        <p class="modal-desc">Flame-resistant aviation gloves designed for durability and operational comfort. Engineered for performance in high-temperature environments.</p>
        <ul class="modal-features">
            <li>Soft leather palm</li>
            <li>Flame-resistant fabric construction</li>
            <li>Reinforced grip areas</li>
            <li>Operational comfort fit</li>
            <li>Aviation utility design</li>
        </ul>
        <div class="modal-footer">
            <a href="#rfq">Request a Quotation</a>
            <a href="#product-details">Back to Products</a>
            <a href="#" class="btn-rfq-modal" onclick="document.getElementById('modalClose').click(); return false;">Close</a>
        </div>
    </div>

    <div id="modal-tactical-shirt" style="display:none;">
        <h2>Tactical Combat Shirt</h2>
        <p class="modal-desc">High-performance tactical combat shirt designed for operational mobility and comfort under body armor. Features moisture-wicking torso fabric and durable ripstop sleeves.</p>
        <ul class="modal-features">
            <li>Moisture-wicking core fabric</li>
            <li>Ripstop reinforced sleeves</li>
            <li>Velcro patch panels on shoulders</li>
            <li>Zip collar design</li>
            <li>OEM customization support</li>
        </ul>
        <div class="modal-footer">
            <a href="#rfq">Request a Quotation</a>
            <a href="#product-details">Back to Products</a>
            <a href="#" class="btn-rfq-modal" onclick="document.getElementById('modalClose').click(); return false;">Close</a>
        </div>
    </div>

    <div id="modal-tactical-gloves" style="display:none;">
        <h2>Tactical Operator Gloves</h2>
        <p class="modal-desc">Heavy-duty tactical operator gloves offering hard knuckle protection and enhanced grip. Designed for rugged environments requiring high dexterity and impact resistance.</p>
        <ul class="modal-features">
            <li>Hard polymer knuckle protection</li>
            <li>Breathable tactical mesh</li>
            <li>Reinforced palm grip</li>
            <li>Adjustable wrist closure</li>
            <li>High dexterity design</li>
        </ul>
        <div class="modal-footer">
            <a href="#rfq">Request a Quotation</a>
            <a href="#product-details">Back to Products</a>
            <a href="#" class="btn-rfq-modal" onclick="document.getElementById('modalClose').click(); return false;">Close</a>
        </div>
    </div>

    <!-- ── SCRIPTS ── -->
    <script>
        (function() {
            'use strict';

            // ── CUSTOM CURSOR ──
            const dot = document.getElementById('cursorDot');
            const ring = document.getElementById('cursorRing');
            let mouseX = 0,
                mouseY = 0;
            let dotX = 0,
                dotY = 0;
            let ringX = 0,
                ringY = 0;
            let isHovering = false;
            let isVisible = true;

            // Only enable custom cursor on non-touch devices
            if (!('ontouchstart' in window) && !navigator.maxTouchPoints) {
                document.addEventListener('mousemove', function(e) {
                    mouseX = e.clientX;
                    mouseY = e.clientY;
                    if (!isVisible) {
                        dot.style.opacity = '1';
                        ring.style.opacity = '1';
                        isVisible = true;
                    }
                });

                document.addEventListener('mouseleave', function() {
                    dot.style.opacity = '0';
                    ring.style.opacity = '0';
                    isVisible = false;
                });

                // Hover targets
                const hoverTargets = document.querySelectorAll(
                    'a, button, .btn-primary, .btn-outline, .btn-rfq, .product-card, .product-detail-card, .cert-badge, .article-card, .mfg-list li, .hero-dot, .hero-nums span, .view-link, .learn-more, .explore-cap, .markets-link, .read-more, .view-all, .footer-social a, .footer-col ul a, .rfq-submit, .modal-close, .pd-cta, .modal-footer a, .btn-rfq-modal'
                    );

                hoverTargets.forEach(function(el) {
                    el.addEventListener('mouseenter', function() {
                        isHovering = true;
                        dot.classList.add('hover');
                        ring.classList.add('hover');
                    });
                    el.addEventListener('mouseleave', function() {
                        isHovering = false;
                        dot.classList.remove('hover');
                        ring.classList.remove('hover');
                    });
                });

                function animateCursor() {
                    dotX += (mouseX - dotX) * 0.18;
                    dotY += (mouseY - dotY) * 0.18;
                    ringX += (mouseX - ringX) * 0.08;
                    ringY += (mouseY - ringY) * 0.08;

                    dot.style.left = dotX + 'px';
                    dot.style.top = dotY + 'px';
                    ring.style.left = ringX + 'px';
                    ring.style.top = ringY + 'px';

                    requestAnimationFrame(animateCursor);
                }
                animateCursor();
            } else {
                // Touch devices: hide custom cursor
                dot.style.display = 'none';
                ring.style.display = 'none';
                document.body.style.cursor = 'auto';
            }

            // ── NAV SCROLL ──
            const navbar = document.getElementById('navbar');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 60) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // ── HAMBURGER ──
            const hamburger = document.getElementById('hamburger');
            const navLinks = document.getElementById('navLinks');
            hamburger.addEventListener('click', function() {
                this.classList.toggle('active');
                navLinks.classList.toggle('open');
            });

            // Close nav on link click (mobile)
            navLinks.querySelectorAll('a').forEach(function(link) {
                link.addEventListener('click', function() {
                    hamburger.classList.remove('active');
                    navLinks.classList.remove('open');
                });
            });

            // ── SCROLL REVEAL ──
            const revealElements = document.querySelectorAll('.reveal');
            const revealObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -40px 0px'
            });

            revealElements.forEach(function(el) {
                revealObserver.observe(el);
            });

            // ── HERO DOT NAV ──
            const heroDots = document.querySelectorAll('.hero-dot');
            const heroNums = document.querySelectorAll('.hero-nums span');
            heroDots.forEach(function(dot, i) {
                dot.addEventListener('click', function() {
                    heroDots.forEach(function(d) { d.classList.remove('active'); });
                    heroNums.forEach(function(n) { n.classList.remove('active'); });
                    dot.classList.add('active');
                    if (heroNums[i]) heroNums[i].classList.add('active');
                });
            });

            // ── SMOOTH SCROLL FOR NAV (enhanced) ──
            document.querySelectorAll('a[href^="#"]').forEach(function(a) {
                a.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    const target = document.querySelector(targetId);
                    if (target) {
                        e.preventDefault();
                        const offset = 80;
                        const top = target.getBoundingClientRect().top + window.scrollY - offset;
                        window.scrollTo({ top: top, behavior: 'smooth' });
                    }
                });
            });

            // ── ACTIVE NAV LINK ON SCROLL ──
            const sections = document.querySelectorAll('section[id], .cert-test[id], .global-rfq, .journal[id]');
            const navAnchors = document.querySelectorAll('.nav-links a');

            window.addEventListener('scroll', function() {
                let current = '';
                sections.forEach(function(section) {
                    const top = section.offsetTop - 120;
                    if (window.scrollY >= top) {
                        current = section.getAttribute('id') || '';
                    }
                });
                navAnchors.forEach(function(a) {
                    a.classList.remove('active');
                    if (a.getAttribute('href') === '#' + current) {
                        a.classList.add('active');
                    }
                });
            });

            // ── PARALLAX HERO ──
            const heroBg = document.querySelector('.hero-bg');
            window.addEventListener('scroll', function() {
                const scrolled = window.scrollY;
                if (heroBg && scrolled < window.innerHeight) {
                    heroBg.style.transform = 'scale(1.05) translateY(' + (scrolled * 0.04) + 'px)';
                }
            });

            // ── FACTORY BANNER PARALLAX ──
            const factoryImg = document.querySelector('.factory-banner img');
            window.addEventListener('scroll', function() {
                if (factoryImg) {
                    const rect = factoryImg.getBoundingClientRect();
                    const visible = window.innerHeight - rect.top;
                    if (visible > 0) {
                        factoryImg.style.transform = 'translateY(' + (visible * 0.02) + 'px) scale(1.03)';
                    }
                }
            });

            // ── PRODUCT CARD 3D TILT ──
            const productCards = document.querySelectorAll('.product-card');
            if (!('ontouchstart' in window) && !navigator.maxTouchPoints) {
                productCards.forEach(function(card) {
                    card.addEventListener('mousemove', function(e) {
                        const rect = this.getBoundingClientRect();
                        const x = e.clientX - rect.left;
                        const y = e.clientY - rect.top;
                        const centerX = rect.width / 2;
                        const centerY = rect.height / 2;
                        const rotateX = (y - centerY) / centerY * -3;
                        const rotateY = (x - centerX) / centerX * 3;
                        this.style.transform =
                            'perspective(800px) rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg)';
                    });
                    card.addEventListener('mouseleave', function() {
                        this.style.transform = 'perspective(800px) rotateX(0deg) rotateY(0deg)';
                    });
                });
            }

            // ── MODAL ──
            const overlay = document.getElementById('modalOverlay');
            const modalBody = document.getElementById('modalBody');
            const modalClose = document.getElementById('modalClose');

            function openModal(targetId) {
                const content = document.getElementById(targetId);
                if (!content) return;
                modalBody.innerHTML = content.innerHTML;
                overlay.classList.add('open');
                document.body.classList.add('modal-open');

                // Re-attach cursor hover for modal content
                if (!('ontouchstart' in window) && !navigator.maxTouchPoints) {
                    const modalHoverTargets = modalBody.querySelectorAll('a, button, .btn-rfq-modal');
                    modalHoverTargets.forEach(function(el) {
                        el.addEventListener('mouseenter', function() {
                            isHovering = true;
                            dot.classList.add('hover');
                            ring.classList.add('hover');
                        });
                        el.addEventListener('mouseleave', function() {
                            isHovering = false;
                            dot.classList.remove('hover');
                            ring.classList.remove('hover');
                        });
                    });
                }
            }

            function closeModal() {
                overlay.classList.remove('open');
                document.body.classList.remove('modal-open');
            }

            // Open modal on .pd-cta click
            document.querySelectorAll('.pd-cta').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = this.getAttribute('data-target');
                    if (target) openModal(target);
                });
            });

            // Close modal on X button
            modalClose.addEventListener('click', closeModal);

            // Close modal on overlay click (click outside modal-content)
            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) closeModal();
            });

            // Close modal on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && overlay.classList.contains('open')) closeModal();
            });

            // Re-close modal if any close button inside modal body is clicked
            document.addEventListener('click', function(e) {
                if (e.target.closest('#modalClose')) closeModal();
                if (e.target.closest('.btn-rfq-modal')) {
                    // Allow the default behavior (close modal) — handled by the click on the close button
                }
            });

        })();
    </script>

</body>

</html>