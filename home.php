<?php
// AEROFEX International — Pixel-perfect landing page
// Place this file alongside the /data/ folder in your XAMPP htdocs project
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEROFEX International | Aviation &amp; Tactical Workwear</title>
    <meta name="description" content="AEROFEX International — Aviation-Grade Flight Suits & Nomex Workwear Manufacturer. OEM & Bulk Production. Sialkot, Pakistan.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- ── GSAP Core + ScrollTrigger ── -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <style>
        /* ─── Reset & Base ─── */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #0B1F3A;
            color: #fff;
            overflow-x: hidden;
        }

        img {
            display: block;
            max-width: 100%;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* ─── NAVBAR ─── */
        #navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(11, 31, 58, 0.93);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(203, 169, 106, 0.1);
            transition: background .3s, box-shadow .3s;
        }

        #navbar.scrolled {
            background: rgba(11, 31, 58, 0.99);
            box-shadow: 0 2px 24px rgba(0, 0, 0, .65);
        }

        .nav-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 70px;
        }

        /* Logo */
        .logo-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-wrap img {
            height: 66px;
        }

        .logo-text .t1 {
            display: block;
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: .9rem;
            letter-spacing: .18em;
            color: #fff;
            text-transform: uppercase;
        }

        .logo-text .t2 {
            display: block;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            font-size: .5rem;
            letter-spacing: .32em;
            color: #CBA96A;
            text-transform: uppercase;
            margin-top: 1px;
        }

        /* Nav links */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
            list-style: none;
        }

        .nav-links a {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: .7rem;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: #C7C7C7;
            position: relative;
            padding-bottom: 3px;
            transition: color .2s;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1.5px;
            background: #CBA96A;
            transition: width .25s;
        }

        .nav-links a:hover {
            color: #fff;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        /* Dropdown */
        .has-drop {
            position: relative;
        }

        .has-drop>a {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .has-drop>a i {
            font-size: .52rem;
            color: #CBA96A;
        }

        .drop-menu {
            display: none;
            position: absolute;
            top: calc(100% + 14px);
            left: 50%;
            transform: translateX(-50%);
            background: #0B1F3A;
            border: 1px solid rgba(203, 169, 106, .22);
            border-radius: 5px;
            min-width: 160px;
            z-index: 200;
            box-shadow: 0 10px 32px rgba(0, 0, 0, .55);
        }

        .drop-menu a {
            display: block;
            padding: 9px 16px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: .66rem;
            letter-spacing: .08em;
            color: #C7C7C7;
            text-transform: uppercase;
            transition: background .15s, color .15s;
        }

        .drop-menu a:hover {
            background: rgba(255, 106, 0, .1);
            color: #FF6A00;
        }

        .has-drop:hover .drop-menu {
            display: block;
        }

        /* Nav CTA */
        .btn-nav {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: .66rem;
            letter-spacing: .12em;
            text-transform: uppercase;
            padding: 8px 20px;
            border: 1.5px solid #FF6A00;
            color: #FF6A00;
            border-radius: 3px;
            transition: background .2s, color .2s;
        }

        .btn-nav:hover {
            background: #FF6A00;
            color: #fff;
        }

        /* Mobile toggle */
        .mob-toggle {
            display: none;
            background: none;
            border: none;
            color: #fff;
            font-size: 1.25rem;
            cursor: pointer;
            padding: 6px;
        }

        /* Mobile nav */
        #mob-nav {
            display: none;
            flex-direction: column;
            background: rgba(8, 20, 40, .98);
            border-top: 1px solid rgba(203, 169, 106, .1);
            max-height: 0;
            overflow: hidden;
            transition: max-height .38s ease;
        }

        #mob-nav.open {
            max-height: 380px;
        }

        #mob-nav a {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: .7rem;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: #C7C7C7;
            padding: 13px 28px;
            border-bottom: 1px solid rgba(255, 255, 255, .05);
            transition: color .2s, background .2s;
        }

        #mob-nav a:hover {
            color: #FF6A00;
            background: rgba(255, 106, 0, .05);
        }

        /* ─── HERO ─── */
        .hero {
            min-height: 80vh;
            background: linear-gradient(160deg, #060f1d 0%, #0B1F3A 42%, #0e2745 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            padding-top: 50px;
        }

        /* subtle grid */
        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            pointer-events: none;
            background-image:
                linear-gradient(rgba(203, 169, 106, .035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(203, 169, 106, .035) 1px, transparent 1px);
            background-size: 55px 55px;
        }

        /* vignette */
        .hero::after {
            content: '';
            position: absolute;
            inset: 0;
            pointer-events: none;
            background: radial-gradient(ellipse at center, transparent 38%, rgba(4, 12, 26, .72) 100%);
        }

        .hero-wrap {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0px;
            display: grid;
            grid-template-columns: 1fr 340px 1fr;
            gap: 10px;
            align-items: center;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        /* Hero Left */
        .hero-sub {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: .68rem;
            letter-spacing: .28em;
            color: #CBA96A;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 16px;
            /* will be animated in from opacity:0 */
            opacity: 0;
        }

        .hero-sub::before {
            content: '';
            width: 28px;
            height: 1.5px;
            background: #CBA96A;
        }

        .hero-h1 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 900;
            font-size: 34pt;
            line-height: 1;
            text-transform: uppercase;
            letter-spacing: -0.01em;
            color: #fff;
            margin-bottom: 28px;
        }

        /* Each line gets an overflow mask injected by JS */
        .hero-h1 .d-block {
            display: block;
        }

        .hero-h1 .amp {
            font-size: 0.75em;
            line-height: 0.8;
            margin: 5px 0;
        }

        .hero-h1 .olive {
            color: #556B2F;
        }

        /* The overflow:hidden wrapper added by JS */
        .hero-line-mask {
            display: block;
            overflow: hidden;
            line-height: 1.05;
        }

        .hero-p {
            font-size: .85rem;
            color: #C7C7C7;
            line-height: 1.75;
            margin-bottom: 28px;
            opacity: 0; /* animated in */
        }

        .hero-btns {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            opacity: 0; /* animated in */
        }

        /* Hero Center */
        .hero-center {
            display: flex;
            justify-content: center;
            align-items: flex-end;
            position: relative;
            height: 500px;
        }

        .hero-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 370px;
            height: 370px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(14, 42, 71, 1) 0%, rgba(11, 31, 58, 0) 72%);
            pointer-events: none;
            will-change: transform;
        }

        .hero-img {
            position: relative;
            z-index: 2;
            width: 300px;
            filter: drop-shadow(0 28px 56px rgba(0, 0, 0, .85));
            animation: suit-float 4s ease-in-out infinite;
            will-change: transform;
            /* Set transform-style for 3D tilt */
            transform-style: preserve-3d;
            opacity: 0; /* animated in */
        }

        @keyframes suit-float {
            0%,
            100% { transform: translateY(0); }
            50% { transform: translateY(-13px); }
        }

        /* Hero Right */
        .hero-right {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding-left: 14px;
        }

        .feat {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            opacity: 0; /* animated in via GSAP stagger */
        }

        .feat-ico {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            flex-shrink: 0;
            border: 1.5px solid rgba(203, 169, 106, .38);
            background: rgba(203, 169, 106, .06);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #CBA96A;
            font-size: .88rem;
            transition: background .25s;
        }

        .feat:hover .feat-ico {
            background: rgba(203, 169, 106, .18);
        }

        .feat-name {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: .63rem;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: #fff;
            margin-bottom: 3px;
        }

        .feat-desc {
            font-size: .7rem;
            color: #C7C7C7;
            line-height: 1.55;
        }

        /* ─── SHARED BUTTONS ─── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: .7rem;
            letter-spacing: .1em;
            text-transform: uppercase;
            padding: 12px 22px;
            border-radius: 3px;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all .22s;
            white-space: nowrap;
            position: relative; /* for magnetic effect */
            will-change: transform;
        }

        .btn-orange {
            background: #FF6A00;
            color: #fff;
            border-color: #FF6A00;
        }

        .btn-orange:hover {
            background: #E65C00;
            border-color: #E65C00;
            box-shadow: 0 6px 20px rgba(255, 106, 0, .38);
        }

        .btn-olive {
            background: #556B2F;
            color: #fff;
            border-color: #556B2F;
        }

        .btn-olive:hover {
            background: #4a5f28;
            border-color: #4a5f28;
            box-shadow: 0 6px 18px rgba(85, 107, 47, .4);
        }

        .btn-wborder {
            background: transparent;
            color: #fff;
            border-color: rgba(255, 255, 255, .6);
        }

        .btn-wborder:hover {
            background: rgba(255, 255, 255, .1);
        }

        /* ─── SECTION HEADING ─── */
        .sec-head {
            text-align: center;
            margin-bottom: 48px;
        }

        .sec-title-row {
            display: inline-flex;
            align-items: center;
            gap: 20px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: clamp(1.35rem, 2.4vw, 1.85rem);
            letter-spacing: .18em;
            text-transform: uppercase;
            color: #fff;
        }

        .sec-title-row::before,
        .sec-title-row::after {
            content: '';
            min-width: 55px;
            height: 1px;
            background: linear-gradient(90deg, transparent, #CBA96A, transparent);
        }

        .sec-chevron {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
            margin-top: 9px;
        }

        .sec-chevron span {
            display: block;
            width: 1.5px;
            height: 12px;
            background: linear-gradient(180deg, #CBA96A, transparent);
        }

        .sec-chevron i {
            color: #CBA96A;
            font-size: .65rem;
            margin-top: -4px;
        }

        /* ─── PRODUCTS SECTION ─── */
        #products {
            background: #121212;
            padding: 80px 0;
        }

        .prod-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 30px;
        }

        .prod-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .prod-card {
            background: #1A1A1A;
            border: 1px solid rgba(255, 255, 255, .06);
            border-radius: 6px;
            overflow: hidden;
            /* 3D hover: base perspective set on the element itself */
            transform-style: preserve-3d;
            transition: box-shadow .3s, border-color .3s;
            will-change: transform;
            /* Start invisible — GSAP will reveal */
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }

        .prod-card:hover {
            box-shadow: 0 22px 50px rgba(0, 0, 0, .6);
            border-color: rgba(203, 169, 106, .28);
        }

        .prod-img-box {
            height: 210px;
            background: #111;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .prod-img-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 18px;
            transition: transform .4s;
        }

        .prod-card:hover .prod-img-box img {
            transform: scale(1.07);
        }

        .prod-body {
            padding: 18px 18px 20px;
        }

        .prod-name {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: .7rem;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: #fff;
            margin-bottom: 7px;
        }

        .prod-desc {
            font-size: .73rem;
            color: #C7C7C7;
            line-height: 1.65;
            margin-bottom: 14px;
        }

        .prod-link {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: .63rem;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #FF6A00;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: gap .2s;
        }

        .prod-card:hover .prod-link {
            gap: 10px;
        }

        /* ─── MANUFACTURING EXCELLENCE ─── */
        #manufacturing {
            display: flex;
            flex-wrap: wrap;
            background: #0B1F3A;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .mfg-photo {
            flex: 0 0 50%;
            min-height: 500px;
            position: relative;
            overflow: hidden; /* Needed for parallax pan to stay inside */
        }

        .mfg-photo img {
            width: 100%;
            height: 115%; /* Slightly taller so it can pan up/down */
            object-fit: cover;
            display: block;
            will-change: transform;
        }

        .mfg-content {
            flex: 0 0 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 80px 8% 80px 6%;
        }

        .mfg-eye {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: .63rem;
            letter-spacing: .28em;
            color: #CBA96A;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            opacity: 0;
        }

        .mfg-eye::before {
            content: '';
            width: 22px;
            height: 1.5px;
            background: #CBA96A;
        }

        .mfg-h {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: clamp(1.5rem, 2.5vw, 2.1rem);
            letter-spacing: .07em;
            text-transform: uppercase;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 8px;
            opacity: 0;
        }

        .mfg-rule {
            width: 46px;
            height: 3px;
            background: #FF6A00;
            margin-bottom: 22px;
            transform-origin: left center;
            transform: scaleX(0);
        }

        .mfg-p {
            font-size: .82rem;
            color: #C7C7C7;
            line-height: 1.82;
            margin-bottom: 34px;
            opacity: 0;
        }

        .mfg-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
        }

        .mfg-stat {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 8px 4px;
            opacity: 0;
            transform: translateY(20px);
        }

        .mfg-ring {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            border: 1.5px solid rgba(203, 169, 106, .42);
            background: rgba(203, 169, 106, .05);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #CBA96A;
            font-size: 1.2rem;
            transition: background .25s, transform .25s;
        }

        .mfg-stat:hover .mfg-ring {
            background: rgba(203, 169, 106, .15);
            transform: translateY(-3px);
        }

        .mfg-lbl {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: .58rem;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #C7C7C7;
            text-align: center;
            line-height: 1.45;
        }

        /* ─── QUALITY CONTROL ─── */
        #quality {
            background: #0B1F3A;
            padding: 80px 0;
            border-top: 1px solid rgba(203, 169, 106, .1);
            border-bottom: 1px solid rgba(203, 169, 106, .1);
        }

        .qual-inner {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 30px;
        }

        .steps-row {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            gap: 0;
            margin-top: 46px;
            flex-wrap: wrap;
        }

        .step-unit {
            display: flex;
            align-items: flex-start;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            width: 128px;
        }

        .step-circ {
            width: 78px;
            height: 78px;
            border-radius: 50%;
            border: 2px solid #CBA96A;
            background: rgba(203, 169, 106, .07);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #CBA96A;
            font-size: 1.4rem;
            transition: background .25s, transform .25s;
            /* Start state for GSAP */
            opacity: 0;
            transform: scale(0.6);
        }

        .step-circ:hover {
            background: rgba(203, 169, 106, .18);
            transform: scale(1.07);
        }

        .step-lbl {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: .58rem;
            letter-spacing: .13em;
            text-transform: uppercase;
            color: #C7C7C7;
            text-align: center;
            line-height: 1.55;
            opacity: 0;
        }

        .step-arr {
            color: rgba(203, 169, 106, .5);
            font-size: 1.05rem;
            padding: 0 10px;
            margin-top: 30px;
            flex-shrink: 0;
            opacity: 0;
        }

        /* ─── CTA BAND ─── */
        #cta {
            background: #3B4728;
            position: relative;
            overflow: hidden;
            padding: 58px 0;
        }

        #cta::before {
            content: '';
            position: absolute;
            inset: 0;
            pointer-events: none;
            background-image:
                linear-gradient(rgba(255, 255, 255, .025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .025) 1px, transparent 1px);
            background-size: 26px 26px;
        }

        .cta-wrap {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 36px;
            position: relative;
            z-index: 1;
        }

        .cta-h {
            font-family: 'Montserrat', sans-serif;
            font-weight: 900;
            font-size: clamp(1.2rem, 2.3vw, 1.7rem);
            letter-spacing: .05em;
            text-transform: uppercase;
            color: #fff;
            line-height: 1.22;
            margin-bottom: 9px;
        }

        .cta-sub {
            font-size: .8rem;
            color: rgba(255, 255, 255, .72);
            line-height: 1.65;
        }

        .cta-btns {
            display: flex;
            gap: 14px;
            flex-shrink: 0;
        }

        /* ─── FOOTER ─── */
        #footer {
            background: #121212;
            border-top: 1px solid rgba(203, 169, 106, .12);
        }

        .foot-top {
            max-width: 1200px;
            margin: 0 auto;
            padding: 58px 30px 42px;
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1.4fr;
            gap: 38px;
        }

        .f-brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
        }

        .f-brand-logo img {
            height: 40px;
        }

        .f-brand-logo .t1 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: .86rem;
            letter-spacing: .18em;
            color: #fff;
            text-transform: uppercase;
        }

        .f-brand-logo .t2 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            font-size: .48rem;
            letter-spacing: .32em;
            color: #CBA96A;
            text-transform: uppercase;
            margin-top: 2px;
        }

        .f-desc {
            font-size: .76rem;
            color: #C7C7C7;
            line-height: 1.78;
            margin-bottom: 20px;
        }

        .f-socials {
            display: flex;
            gap: 9px;
        }

        .soc {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1.5px solid rgba(203, 169, 106, .32);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #CBA96A;
            font-size: .76rem;
            transition: background .2s, color .2s, border-color .2s;
        }

        .soc:hover {
            background: #CBA96A;
            color: #0B1F3A;
            border-color: #CBA96A;
        }

        .f-col-h {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: .63rem;
            letter-spacing: .2em;
            text-transform: uppercase;
            color: #fff;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(203, 169, 106, .2);
            margin-bottom: 18px;
        }

        .f-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .f-list a {
            font-size: .76rem;
            color: #C7C7C7;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color .2s, padding-left .2s;
        }

        .f-list a i {
            font-size: .48rem;
            color: rgba(203, 169, 106, .48);
        }

        .f-list a:hover {
            color: #FF6A00;
            padding-left: 4px;
        }

        .c-rows {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .c-row {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .c-ico {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            flex-shrink: 0;
            border: 1.5px solid rgba(203, 169, 106, .28);
            background: rgba(203, 169, 106, .06);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #CBA96A;
            font-size: .76rem;
            margin-top: 1px;
        }

        .c-val {
            font-size: .76rem;
            color: #C7C7C7;
            line-height: 1.65;
            padding-top: 5px;
        }

        .foot-bar {
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px 30px;
            border-top: 1px solid rgba(255, 255, 255, .08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            flex-wrap: wrap;
        }

        .foot-bar p {
            font-size: .7rem;
            color: #C7C7C7;
        }

        .foot-bar-links {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .foot-bar-links a {
            font-size: .7rem;
            color: #C7C7C7;
            transition: color .2s;
        }

        .foot-bar-links a:hover {
            color: #CBA96A;
        }

        .foot-bar-links span {
            color: rgba(203, 169, 106, .3);
        }

        /* ─── Reveal (legacy — kept but overridden by GSAP) ─── */
        .reveal {
            /* GSAP handles visibility; no CSS default opacity here anymore */
        }

        /* ─── Responsive ─── */
        @media(max-width:1024px) {
            .hero-wrap {
                grid-template-columns: 1fr;
                gap: 36px;
            }

            .hero-center {
                width: 100%;
                height: 300px;
                order: -1;
            }

            .hero-img {
                width: 220px;
            }

            .hero-right {
                padding-left: 0;
                flex-direction: row;
                flex-wrap: wrap;
                gap: 14px;
            }

            .feat {
                width: calc(50% - 7px);
            }

            .mfg-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .mfg-photo,
            .mfg-content {
                flex: 0 0 100%;
            }

            .mfg-photo {
                min-height: 350px;
            }

            .mfg-content {
                padding: 60px 34px;
            }

            .prod-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .foot-top {
                grid-template-columns: 1fr 1fr;
            }

            .cta-wrap {
                flex-direction: column;
                text-align: center;
            }

            .cta-btns {
                justify-content: center;
            }
        }

        @media(max-width:768px) {
            .nav-links,
            .btn-nav {
                display: none;
            }

            .mob-toggle {
                display: block;
            }

            #mob-nav {
                display: flex;
            }

            .prod-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .mfg-stats {
                grid-template-columns: repeat(4, 1fr);
            }

            .foot-top {
                grid-template-columns: 1fr;
            }

            .step-arr {
                display: none;
            }

            .steps-row {
                gap: 22px;
            }
        }

        @media(max-width:480px) {
            .prod-grid {
                grid-template-columns: 1fr;
            }

            .hero-img {
                width: 185px;
            }

            .hero-btns {
                flex-direction: column;
            }

            .mfg-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body>

    <nav id="navbar">
        <div class="nav-inner">
            <a href="#" class="logo-wrap">
                <img src="data/1000071170.png" alt="AEROFEX Logo" onerror="this.style.display='none'">
                <div class="logo-text">
                    <span class="t1">AEROFEX</span>
                    <span class="t2">International</span>
                </div>
            </a>

            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li class="has-drop">
                    <a href="#products">Products <i class="fa-solid fa-chevron-down"></i></a>
                    <div class="drop-menu">
                        <a href="#products">Flight Suits</a>
                        <a href="#products">Nomex Coveralls</a>
                        <a href="#products">Pilot Gloves</a>
                        <a href="#products">Tactical Wear</a>
                    </div>
                </li>
                <li><a href="#manufacturing">About Us</a></li>
                <li><a href="#quality">Quality</a></li>
                <li><a href="#footer">Contact</a></li>
            </ul>

            <div style="display:flex;align-items:center;gap:14px;">
                <a href="#footer" class="btn-nav">Get Quote</a>
                <button class="mob-toggle" id="mob-toggle" aria-label="Menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
        <div id="mob-nav">
            <a href="#">Home</a>
            <a href="#products">Products</a>
            <a href="#manufacturing">About Us</a>
            <a href="#quality">Quality</a>
            <a href="#footer">Contact</a>
            <a href="#footer" style="color:#FF6A00;">Get Quote &rarr;</a>
        </div>
    </nav>


    <section class="hero" id="home">
        <div class="hero-wrap">

            <div class="reveal">
                <p class="hero-sub">Aviation-Grade</p>
                <h1 class="hero-h1">
                    <span class="d-block">FLIGHT SUITS</span>
                    <span class="d-block amp">&amp;</span>
                    <span class="d-block">NOMEX</span>
                    <span class="d-block olive">WORKWEAR</span>
                </h1>
                <p class="hero-p">Built for performance.<br>Designed for demanding environments.</p>
                <div class="hero-btns">
                    <a href="#footer" class="btn btn-olive">Request Sample <i class="fa-solid fa-arrow-right"></i></a>
                    <a href="#footer" class="btn btn-orange">Get Quote <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="hero-center">
                <div class="hero-glow"></div>
                <img class="hero-img" src="data/1.png" alt="AEROFEX Flight Suit"
                    onerror="this.src='https://placehold.co/300x470/0B1F3A/CBA96A?text=Flight+Suit'">
            </div>

            <div class="hero-right reveal" style="transition-delay:.14s">
                <?php
                $feats = [
                    ['fa-shield-halved',  'Durable Construction',  'Military-grade materials built to last.'],
                    ['fa-grip-lines',     'Reinforced Stitching',  'Double-lock stitch on all stress points.'],
                    ['fa-layer-group',    'Functional Design',     'Ergonomic cuts for unrestricted motion.'],
                    ['fa-circle-check',   'Consistent Quality',    'ISO-compliant QC at every stage.'],
                ];
                foreach ($feats as $f): ?>
                    <div class="feat">
                        <div class="feat-ico"><i class="fa-solid <?= $f[0] ?>"></i></div>
                        <div>
                            <div class="feat-name"><?= $f[1] ?></div>
                            <div class="feat-desc"><?= $f[2] ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>


    <section id="products">
        <div class="prod-inner">
            <div class="sec-head reveal">
                <div class="sec-title-row">OUR PRODUCTS</div>
                <div class="sec-chevron">
                    <span></span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
            </div>

            <div class="prod-grid">
                <?php
                $prods = [
                    ['data/1.png', 'Flight Suits',    'Built for pilots and aviation professionals.'],
                    ['data/2.png', 'Nomex Coveralls', 'Heat-resistant protection for demanding conditions.'],
                    ['data/3.png', 'Pilot Gloves',    'Superior grip and durability for maximum control.'],
                    ['data/4.png', 'Tactical Wear',   'Functional, durable and mission-ready apparel.'],
                ];
                foreach ($prods as $i => $p): ?>
                    <div class="prod-card reveal">
                        <div class="prod-img-box">
                            <img src="<?= $p[0] ?>" alt="<?= $p[1] ?>"
                                onerror="this.src='https://placehold.co/280x200/1A1A1A/CBA96A?text=<?= urlencode($p[1]) ?>'">
                        </div>
                        <div class="prod-body">
                            <div class="prod-name"><?= $p[1] ?></div>
                            <div class="prod-desc"><?= $p[2] ?></div>
                            <div class="prod-link">View Details <i class="fa-solid fa-arrow-right" style="font-size:.58rem;"></i></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <section id="manufacturing">
        <div class="mfg-photo">
            <img src="data/5.jpg" alt="AEROFEX Factory"
                onerror="this.src='https://placehold.co/800x600/0B1F3A/556B2F?text=Manufacturing'">
        </div>

        <div class="mfg-content">
            <p class="mfg-eye">Our Capabilities</p>
            <h2 class="mfg-h">Manufacturing Excellence</h2>
            <div class="mfg-rule"></div>
            <p class="mfg-p">
                AEROFEX International is a professional manufacturer of aviation and tactical workwear. We support OEM and bulk production with export-level quality control and reliable timelines.
            </p>
            <div class="mfg-stats">
                <?php
                $stats = [
                    ['fa-industry',   'Advanced<br>Production'],
                    ['fa-users',      'Skilled<br>Workforce'],
                    ['fa-gem',        'Quality<br>Materials'],
                    ['fa-truck-fast', 'On-Time<br>Delivery'],
                ];
                foreach ($stats as $s): ?>
                    <div class="mfg-stat">
                        <div class="mfg-ring"><i class="fa-solid <?= $s[0] ?>"></i></div>
                        <div class="mfg-lbl"><?= $s[1] ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <section id="quality">
        <div class="qual-inner">
            <div class="sec-head reveal">
                <div class="sec-title-row">Quality Control Process</div>
                <div class="sec-chevron">
                    <span></span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
            </div>

            <div class="steps-row">
                <?php
                $steps = [
                    ['fa-grip',                 'Fabric<br>Inspection'],
                    ['fa-scissors',             'Stitching<br>Check'],
                    ['fa-screwdriver-wrench',   'Hardware<br>Testing'],
                    ['fa-magnifying-glass',     'Final<br>Inspection'],
                    ['fa-box-open',             'Ready for<br>Delivery'],
                ];
                $last = count($steps) - 1;
                foreach ($steps as $i => $s): ?>
                    <div class="step-unit">
                        <div class="step">
                            <div class="step-circ"><i class="fa-solid <?= $s[0] ?>"></i></div>
                            <div class="step-lbl"><?= $s[1] ?></div>
                        </div>
                        <?php if ($i < $last): ?>
                            <div class="step-arr"><i class="fa-solid fa-arrow-right"></i></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <section id="cta">
        <div class="cta-wrap reveal">
            <div>
                <h2 class="cta-h">Looking for a Reliable<br>Manufacturing Partner?</h2>
                <p class="cta-sub">We are ready to support your business with quality products and professional service.</p>
            </div>
            <div class="cta-btns">
                <a href="#footer" class="btn btn-orange">Request Sample <i class="fa-solid fa-arrow-right"></i></a>
                <a href="#footer" class="btn btn-wborder">Get Quote <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>


    <footer id="footer">
        <div class="foot-top">

            <div>
                <div class="f-brand-logo">
                    <img src="data/1000071170.png" alt="AEROFEX" onerror="this.style.display='none'">
                    <div>
                        <div class="t1">AEROFEX</div>
                        <div class="t2">International</div>
                    </div>
                </div>
                <p class="f-desc">Aviation-grade workwear manufacturer committed to quality, performance and customer satisfaction.</p>
                <div class="f-socials">
                    <a href="#" class="soc"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#" class="soc"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="soc"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="soc"><i class="fa-regular fa-envelope"></i></a>
                </div>
            </div>

            <div>
                <div class="f-col-h">Quick Links</div>
                <ul class="f-list">
                    <?php foreach (['Home', 'Products', 'About Us', 'Quality', 'Contact'] as $lk): ?>
                        <li><a href="#"><i class="fa-solid fa-chevron-right"></i><?= $lk ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div>
                <div class="f-col-h">Products</div>
                <ul class="f-list">
                    <?php foreach (['Flight Suits', 'Nomex Coveralls', 'Pilot Gloves', 'Tactical Wear'] as $pr): ?>
                        <li><a href="#products"><i class="fa-solid fa-chevron-right"></i><?= $pr ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div>
                <div class="f-col-h">Contact Us</div>
                <div class="c-rows">
                    <div class="c-row">
                        <div class="c-ico"><i class="fa-solid fa-phone"></i></div>
                        <div class="c-val">+92 300 1234567</div>
                    </div>
                    <div class="c-row">
                        <div class="c-ico"><i class="fa-regular fa-envelope"></i></div>
                        <div class="c-val">info@aerofex.com</div>
                    </div>
                    <div class="c-row">
                        <div class="c-ico"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="c-val">Sialkot, Pakistan</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="foot-bar">
            <p>&copy; <?= date('Y') ?> AEROFEX International. All Rights Reserved.</p>
            <div class="foot-bar-links">
                <a href="#">Privacy Policy</a>
                <span>|</span>
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </footer>


    <!-- ════════════════════════════════════════════════════════════════
         CORE UTILITY SCRIPTS
    ════════════════════════════════════════════════════════════════ -->
    <script>
        /* ── Sticky nav ── */
        const nav = document.getElementById('navbar');
        window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 55));

        /* ── Mobile toggle ── */
        const tog = document.getElementById('mob-toggle');
        const mob = document.getElementById('mob-nav');
        tog.addEventListener('click', () => {
            const open = mob.classList.toggle('open');
            tog.innerHTML = open
                ? '<i class="fa-solid fa-xmark"></i>'
                : '<i class="fa-solid fa-bars"></i>';
        });
    </script>


    <!-- ════════════════════════════════════════════════════════════════
         GSAP ANIMATION SUITE
    ════════════════════════════════════════════════════════════════ -->
    <script>
    (function () {
        'use strict';

        /* ── Register ScrollTrigger plugin ── */
        gsap.registerPlugin(ScrollTrigger);

        /* ── Detect mobile (disable heavy 3-D on narrow screens) ── */
        const isMobile = () => window.innerWidth < 768;

        /* ══════════════════════════════════════════════════════════
           1. HERO — STAGGERED TEXT REVEAL
           Wrap each .d-block span in an overflow:hidden mask div
           so we can slide the text up from behind the clip.
        ══════════════════════════════════════════════════════════ */
        (function heroReveal() {
            const lines = document.querySelectorAll('.hero-h1 .d-block');

            lines.forEach(line => {
                const parent = line.parentNode;
                // Create the mask wrapper
                const mask = document.createElement('div');
                mask.className = 'hero-line-mask';
                parent.insertBefore(mask, line);
                mask.appendChild(line);
                // Start the line below its mask
                gsap.set(line, { y: '105%', opacity: 0 });
            });

            /* Main hero timeline */
            const htl = gsap.timeline({ delay: 0.15 });

            /* Sub-label slides + fades */
            htl.to('.hero-sub', {
                opacity: 1,
                y: 0,
                duration: 0.9,
                ease: 'power4.out'
            });

            /* Each headline line slides up from the mask */
            htl.to('.hero-h1 .d-block', {
                y: '0%',
                opacity: 1,
                duration: 1.1,
                ease: 'power4.out',
                stagger: 0.1
            }, '-=0.55');

            /* Body copy fades in */
            htl.to('.hero-p', {
                opacity: 1,
                y: 0,
                duration: 0.9,
                ease: 'power3.out'
            }, '-=0.5');

            /* CTA buttons stagger */
            htl.to('.hero-btns', {
                opacity: 1,
                y: 0,
                duration: 0.85,
                ease: 'power3.out'
            }, '-=0.6');

            /* Hero image drop-in */
            htl.to('.hero-img', {
                opacity: 1,
                y: 0,
                duration: 1.2,
                ease: 'power3.out'
            }, '-=1.1');

            /* Feature items stagger */
            htl.to('.feat', {
                opacity: 1,
                x: 0,
                duration: 0.85,
                ease: 'power3.out',
                stagger: 0.12
            }, '-=0.9');
        })();


        /* ══════════════════════════════════════════════════════════
           2. HERO — 3-D MOUSE TRACKING TILT ON HERO-IMG
           Disabled below 768 px for performance.
        ══════════════════════════════════════════════════════════ */
        (function heroTilt() {
            if (isMobile()) return;

            const heroSection = document.querySelector('.hero');
            const heroImg     = document.querySelector('.hero-img');
            if (!heroSection || !heroImg) return;

            /* Pause the float animation while tilt is active so they
               don't fight each other; we re-start it on mouse-leave. */
            let floatAnim = null;

            /* GSAP quickTo gives buttery-smooth lerp-based following */
            const xTo = gsap.quickTo(heroImg, 'rotationY', { duration: 0.9, ease: 'power3.out' });
            const yTo = gsap.quickTo(heroImg, 'rotationX', { duration: 0.9, ease: 'power3.out' });

            heroSection.addEventListener('mousemove', e => {
                if (isMobile()) return;

                /* Kill float animation while mouse is moving */
                if (floatAnim) { floatAnim.kill(); floatAnim = null; }
                gsap.killTweensOf(heroImg, 'y');

                const rect = heroSection.getBoundingClientRect();
                /* Normalise cursor position to [-1, 1] range */
                const nx = (e.clientX - rect.left)  / rect.width  * 2 - 1;
                const ny = (e.clientY - rect.top)   / rect.height * 2 - 1;

                /* Max tilt: ±10° on Y axis, ±7° on X axis */
                xTo(-ny * 7);
                yTo(nx * 10);
            });

            heroSection.addEventListener('mouseleave', () => {
                /* Snap back to neutral */
                gsap.to(heroImg, {
                    rotationX: 0,
                    rotationY: 0,
                    duration: 1.2,
                    ease: 'elastic.out(1, 0.5)',
                    onComplete: () => {
                        /* Resume the floating animation */
                        gsap.to(heroImg, {
                            y: -13,
                            duration: 2,
                            yoyo: true,
                            repeat: -1,
                            ease: 'sine.inOut'
                        });
                    }
                });
            });

            /* Replace CSS keyframe float with GSAP so we can control it */
            heroImg.style.animation = 'none';
            gsap.to(heroImg, {
                y: -13,
                duration: 2,
                yoyo: true,
                repeat: -1,
                ease: 'sine.inOut'
            });
        })();


        /* ══════════════════════════════════════════════════════════
           3. HERO — BACKGROUND PARALLAX (hero-glow + grid)
           The glow moves at ~40% the scroll rate, giving depth.
        ══════════════════════════════════════════════════════════ */
        (function heroParallax() {
            const glow = document.querySelector('.hero-glow');
            if (!glow) return;

            gsap.to(glow, {
                y: '-120px',
                ease: 'none',
                scrollTrigger: {
                    trigger: '.hero',
                    start: 'top top',
                    end: 'bottom top',
                    scrub: 1.5
                }
            });

            /* Slow the hero grid layer as well */
            gsap.to('.hero::before', {
                y: '-60px',
                ease: 'none',
                scrollTrigger: {
                    trigger: '.hero',
                    start: 'top top',
                    end: 'bottom top',
                    scrub: 2
                }
            });
        })();


        /* ══════════════════════════════════════════════════════════
           4. PRODUCTS — STAGGERED CARD REVEAL
        ══════════════════════════════════════════════════════════ */
        (function productCards() {
            const cards = document.querySelectorAll('.prod-card');
            if (!cards.length) return;

            gsap.to(cards, {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 1.0,
                ease: 'power3.out',
                stagger: 0.14,
                scrollTrigger: {
                    trigger: '#products .prod-grid',
                    start: 'top 82%',
                    toggleActions: 'play none none none'
                }
            });
        })();


        /* ── Section heading generic reveal ── */
        (function sectionHeads() {
            document.querySelectorAll('.sec-head').forEach(el => {
                gsap.from(el, {
                    opacity: 0,
                    y: 30,
                    duration: 1.0,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 85%',
                        toggleActions: 'play none none none'
                    }
                });
            });
        })();


        /* ══════════════════════════════════════════════════════════
           5. MANUFACTURING — IMAGE PARALLAX + CONTENT STAGGER
        ══════════════════════════════════════════════════════════ */
        (function mfgSection() {
            /* Image pans slightly as you scroll past */
            const mfgImg = document.querySelector('.mfg-photo img');
            if (mfgImg) {
                /* Offset the image so the pan starts at the top of
                   the element and ends at the bottom. */
                gsap.fromTo(mfgImg,
                    { y: '-7%' },
                    {
                        y: '7%',
                        ease: 'none',
                        scrollTrigger: {
                            trigger: '#manufacturing',
                            start: 'top bottom',
                            end: 'bottom top',
                            scrub: 1.2
                        }
                    }
                );
            }

            /* Eyebrow + heading slide in */
            const mfgContent = document.querySelector('.mfg-content');
            if (!mfgContent) return;

            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: mfgContent,
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                }
            });

            tl.to('.mfg-eye', {
                opacity: 1,
                x: 0,
                duration: 0.9,
                ease: 'power3.out'
            });

            tl.to('.mfg-h', {
                opacity: 1,
                y: 0,
                duration: 0.9,
                ease: 'power3.out'
            }, '-=0.6');

            tl.to('.mfg-rule', {
                scaleX: 1,
                duration: 0.8,
                ease: 'power4.out'
            }, '-=0.5');

            tl.to('.mfg-p', {
                opacity: 1,
                y: 0,
                duration: 0.9,
                ease: 'power3.out'
            }, '-=0.5');

            /* Stats rings stagger */
            tl.to('.mfg-stat', {
                opacity: 1,
                y: 0,
                duration: 0.85,
                ease: 'back.out(1.5)',
                stagger: 0.12
            }, '-=0.4');
        })();


        /* ══════════════════════════════════════════════════════════
           6. QUALITY CONTROL — SEQUENTIAL TIMELINE ANIMATION
        ══════════════════════════════════════════════════════════ */
        (function qualityTimeline() {
            const circles = document.querySelectorAll('.step-circ');
            const labels  = document.querySelectorAll('.step-lbl');
            const arrows  = document.querySelectorAll('.step-arr');
            if (!circles.length) return;

            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: '.steps-row',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                }
            });

            /* Circles pop in one by one */
            tl.to(circles, {
                opacity: 1,
                scale: 1,
                duration: 0.75,
                ease: 'back.out(1.8)',
                stagger: 0.18
            });

            /* Labels fade in slightly after their circle */
            tl.to(labels, {
                opacity: 1,
                y: 0,
                duration: 0.65,
                ease: 'power2.out',
                stagger: 0.18
            }, '-=0.75');

            /* Arrows slide in between steps */
            tl.to(arrows, {
                opacity: 1,
                x: 0,
                duration: 0.55,
                ease: 'power2.out',
                stagger: 0.16
            }, '-=0.8');
        })();


        /* ── CTA band reveal ── */
        (function ctaBand() {
            const cta = document.querySelector('.cta-wrap');
            if (!cta) return;
            gsap.from(cta, {
                opacity: 0,
                y: 36,
                duration: 1.0,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: '#cta',
                    start: 'top 82%',
                    toggleActions: 'play none none none'
                }
            });
        })();


        /* ══════════════════════════════════════════════════════════
           7. PRODUCT CARDS — 3-D HOVER TILT (desktop only)
        ══════════════════════════════════════════════════════════ */
        (function cardTilt3D() {
            if (isMobile()) return;

            document.querySelectorAll('.prod-card').forEach(card => {
                card.addEventListener('mousemove', e => {
                    if (isMobile()) return;
                    const rect = card.getBoundingClientRect();
                    const cx   = rect.left + rect.width  / 2;
                    const cy   = rect.top  + rect.height / 2;
                    /* Normalise: -1 … +1 */
                    const nx = (e.clientX - cx) / (rect.width  / 2);
                    const ny = (e.clientY - cy) / (rect.height / 2);

                    gsap.to(card, {
                        rotationY:   nx * 9,
                        rotationX:  -ny * 7,
                        transformPerspective: 900,
                        duration: 0.4,
                        ease: 'power2.out',
                        overwrite: 'auto'
                    });
                });

                card.addEventListener('mouseleave', () => {
                    gsap.to(card, {
                        rotationY: 0,
                        rotationX: 0,
                        duration: 0.8,
                        ease: 'elastic.out(1, 0.5)',
                        overwrite: 'auto'
                    });
                });
            });
        })();


        /* ══════════════════════════════════════════════════════════
           8. MAGNETIC BUTTON EFFECT (desktop only)
           Buttons gently pull toward the cursor when it enters
           within a defined radius around them.
        ══════════════════════════════════════════════════════════ */
        (function magneticButtons() {
            if (isMobile()) return;

            const MAGNET_RADIUS   = 70;   /* px — activation distance */
            const MAGNET_STRENGTH = 0.38; /* 0 = no pull, 1 = full pull */

            document.querySelectorAll('.btn').forEach(btn => {
                const onMove = e => {
                    if (isMobile()) return;
                    const rect = btn.getBoundingClientRect();
                    const cx = rect.left + rect.width  / 2;
                    const cy = rect.top  + rect.height / 2;
                    const dx = e.clientX - cx;
                    const dy = e.clientY - cy;
                    const dist = Math.sqrt(dx * dx + dy * dy);

                    if (dist < MAGNET_RADIUS) {
                        const pull = (1 - dist / MAGNET_RADIUS) * MAGNET_STRENGTH;
                        gsap.to(btn, {
                            x: dx * pull,
                            y: dy * pull,
                            duration: 0.5,
                            ease: 'power2.out',
                            overwrite: 'auto'
                        });
                    } else {
                        gsap.to(btn, {
                            x: 0,
                            y: 0,
                            duration: 0.6,
                            ease: 'elastic.out(1, 0.4)',
                            overwrite: 'auto'
                        });
                    }
                };

                const onLeave = () => {
                    gsap.to(btn, {
                        x: 0,
                        y: 0,
                        duration: 0.8,
                        ease: 'elastic.out(1, 0.4)',
                        overwrite: 'auto'
                    });
                };

                /* Listen on the parent container (wider hit area) */
                const wrapper = btn.closest('div') || document.body;
                wrapper.addEventListener('mousemove', onMove);
                wrapper.addEventListener('mouseleave', onLeave);
            });
        })();


        /* ══════════════════════════════════════════════════════════
           9. SCROLLTRIGGER REFRESH on resize / font-load
        ══════════════════════════════════════════════════════════ */
        window.addEventListener('load', () => {
            ScrollTrigger.refresh();
        });

        window.addEventListener('resize', () => {
            ScrollTrigger.refresh();
        });

    })();
    </script>

</body>

</html>