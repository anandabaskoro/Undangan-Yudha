<?php

$namaTamu = "Tamu Undangan";

$id = $_GET['id'] ?? '';

if (($handle = fopen("Tamu.csv", "r")) !== FALSE) {

    fgetcsv($handle);

    while (($data = fgetcsv($handle)) !== FALSE) {

        if ($data[0] == $id) {

            $namaTamu = $data[1];

            break;

        }
    }

    fclose($handle);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Undangan Pernikahan Galuh & Yudha</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=IM+Fell+English:ital@0;1&family=Josefin+Sans:wght@300;400&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --navy:    #0e1b3d;
    --navy2:   #162348;
    --gold:    #ffffff;
    --gold2:   #f0f0f0;
    --gold3:   #e8e8e8;
    --cream:   #ffffff;
    --white:   #ffffff;
  }

  html, body {
    height: 100%;
    overflow: hidden;
    background: var(--navy);
    font-family: 'Josefin Sans', sans-serif;
  }

  /* ───── SLIDE CONTAINER ───── */
  .slider {
    width: 100vw;
    height: 100dvh;
    overflow: hidden;
    position: relative;
  }
  .slides-wrapper {
    display: flex;
    flex-direction: column;
    transition: transform 0.8s cubic-bezier(0.77,0,0.175,1);
    width: 100%;
  }
  .slide {
    width: 100vw;
    height: 100vh;
    overflow-y: auto;
    overflow-x: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    background: var(--navy);
    scrollbar-width: none;
    flex-shrink: 0;
  }
  .slide::-webkit-scrollbar { display: none; }

  /* ───── JAVANESE BORDER PATTERN ───── */
  .jawa-border {
    position: absolute;
    top: 0;
    bottom: 0;
    width: 80px;
    pointer-events: none;
    overflow: hidden;
}

.jawa-border.left {
    left: 0;
    background: url('cover_preview.jpg') left center;
    background-size: cover;
}

.jawa-border.right {
    right: 0;
    background: url('cover_preview.jpg') right center;
    background-size: cover;
}

.jawa-border::before,
.jawa-border::after {
    display: none;
}

  /* Inner decorative line */
  .jawa-border::after {
    content: '';
    position: absolute;
    top: 0; bottom: 0;
    right: 0;
    width: 1px;
    background: linear-gradient(180deg, transparent, var(--gold2) 20%, var(--gold) 50%, var(--gold2) 80%, transparent);
    opacity: 0.5;
  }
  .jawa-border.right::after { right: auto; left: 0; }

  /* ───── GOLD DIVIDER ───── */
 .divider{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:12px;
    width:100%;
    max-width:320px;
    margin:20px auto;
}

.divider hr{
    flex:1;
    margin:0;
}
  .divider .diamond {
    width: 8px; height: 8px;
    background: var(--gold);
    transform: rotate(45deg);
  }
  .divider .ornament {
    font-size: 18px;
    color: var(--gold);
    line-height: 1;
  }

  /* ───── TOPMOST ORNAMENT ───── */
  .top-ornament {
    position: absolute;
    top: 18px; left: 50%;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .top-ornament .line { width: 60px; height: 1px; background: var(--gold); opacity: 0.5; }
  .top-ornament .center-glyph { color: var(--gold); font-size: 22px; }

  /* ───── NAVIGATION DOTS ───── */
  .nav-dots {
    position: fixed;
    right: 16px; top: 50%;
    transform: translateY(-50%);
    display: flex; flex-direction: column;
    gap: 10px; z-index: 100;
  }
  .dot {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: rgba(255,255,255,0.25);
    cursor: pointer;
    transition: all .3s;
    border: 1.5px solid var(--gold);
  }
  .dot.active { background: var(--gold); transform: scale(1.4); }



  /* ───── TYPOGRAPHY ───── */
  .script {
    font-family: 'IM Fell English', serif;
    font-style: italic;
    color: var(--gold2);
  }
  .serif {
    font-family: 'Cormorant Garamond', serif;
    color: var(--gold2);  
  }
  .label {
    font-family: 'Josefin Sans', sans-serif;
    font-weight: 400;
    letter-spacing: 3px;
    font-size: 12px;
    text-transform: uppercase;
    color: var(--gold);
  }

  /* ───── SLIDE 1 — OPENING ───── */
  .slide{
    background:url('images/cover_preview.jpg')
    center center / cover no-repeat;
}
  #s1::before {
    content: '';
    position: absolute;
    top: 0; left: 80px; right: 80px; bottom: 0;
    background: rgba(14, 27, 61, 0.4);
    pointer-events: none;
    z-index: 0;
  }
  #s1 .guest-label {
    color: var(--gold2);
    font-size: 13px;
    letter-spacing: 2px;
    position: relative;
    z-index: 2;
    font-weight: 400;
  }
  .slide-inner{
    width:100%;
    max-width:1100px;
    margin:0 auto;
    text-align:center;
    display:flex;
    flex-direction:column;
    align-items:center;
    position: relative;
    z-index: 2;
}
  #s1 .guest-name {
    color: var(--gold2);
    font-family: 'Cormorant Garamond', serif;
    font-size: 24px;
    font-weight: 400;
    position: relative;
    z-index: 2;
  }
  #s1 .bird-icon {
    font-size: 60px;
    color: var(--gold2);
    margin-bottom: 10px;
    position: relative;
    z-index: 2;
  }
  #s1 .names-script {
    font-size: clamp(52px, 14vw, 80px);
    line-height: 1.05;
    text-align: center;
    color: var(--gold2);
    position: relative;
    z-index: 2;
  }
  #s1 .and-text {
    font-family: 'Josefin Sans', sans-serif;
    font-weight: 300;
    font-size: 13px;
    letter-spacing: 4px;
    color: var(--gold);
    margin: -4px 0;
    position: relative;
    z-index: 2;
  }
  #s1 .open-btn {
    margin-top: 28px;
    padding: 12px 36px;
    border: 1.5px solid var(--gold);
    background: rgba(255,255,255,0.1);
    color: var(--gold2);
    font-family: 'Josefin Sans', sans-serif;
    font-size: 11px;
    letter-spacing: 3px;
    text-transform: uppercase;
    cursor: pointer;
    transition: all .3s;
    position: relative;
    z-index: 2;
    font-weight: 500;
  }
  #s1 .open-btn:hover { background: rgba(255,255,255,.15); }

  /* ───── BACKGROUND FOR ALL SLIDES ───── */
 
  #s2::before, #s3::before, #s4::before, #s5::before, #s6::before, #s7::before, #s8::before {
    content: '';
    position: absolute;
    top: 0; left: 80px; right: 80px; bottom: 0;
    background: rgba(14, 27, 61, 0.45);
    pointer-events: none;
    z-index: 0;
  }

  /* ───── SLIDE 2 — COUNTDOWN ───── */
  #s2 .countdown-row {
    display: flex;
    gap: 18px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 20px;
  }
  .count-box {
    display: flex; flex-direction: column;
    align-items: center;
    min-width: 70px;
  }
  .count-num {
    font-family: 'Cormorant Garamond', serif;
    font-size: clamp(40px, 10vw, 60px);
    color: var(--gold2);
    font-weight: 300;
    line-height: 1;
  }
  .count-lbl {
    font-size: 9px;
    letter-spacing: 2.5px;
    color: var(--gold);
    text-transform: uppercase;
    margin-top: 4px;
  }
  .count-sep {
    font-family: 'Cormorant Garamond', serif;
    font-size: 48px;
    color: var(--gold);
    opacity: 0.4;
    align-self: flex-start;
    line-height: 1.2;
    margin-top: 4px;
  }
  #s2 .wedding-date {
    font-family: 'Cormorant Garamond', serif;
    font-size: 15px;
    color: var(--gold);
    letter-spacing: 3px;
    text-transform: uppercase;
  }

  /* ───── SLIDE 3 — MEMPELAI ───── */
  .mempelai-row {
    display: flex;
    gap: 32px;
    justify-content: center;
    align-items: flex-start;
    flex-wrap: wrap;
    width: 100%;
    padding: 0 48px;
  }
  .mempelai-card {
    flex: 1; min-width: 140px; max-width: 200px;
    text-align: center;
  }
  .avatar-circle {
    width: 180px; height: 180px;
    border-radius: 50%;
    border: 2px solid var(--gold);
    margin: 0 auto 14px;
    background: var(--navy2);
    display: flex; align-items: center; justify-content: center;
    font-size: 40px;
    color: var(--gold);
    overflow: hidden;
  }
  
  .mempelai-card .full-name {
    font-family: 'Cormorant Garamond', serif;
    font-size: 24px;
    font-weight: 500;
    color: var(--gold2);
    margin-bottom: 4px;
  }
  .mempelai-card .parent-info {
    font-size: 12px;
    color: var(--gold2);
    line-height: 1.6;
    letter-spacing: 0.5px;
    display:flex;
    flex-direction:column;
    align-items:center;
    font-weight: 400;
  }
  .parent-name{
    color: var(--gold2);
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    min-height:42px;
    font-weight: 500;
}
  .ampersand-center {
    display: flex; align-items: center; justify-content: center;
    font-family: 'IM Fell English', serif;
    font-style: italic;
    font-size: 40px;
    color: var(--gold);
    opacity: 0.7;
    height: 180px;
  }
  

  /* ───── SLIDE 4 — WAKTU & TEMPAT ───── */
  .event-card {
    background: rgba(255,255,255,0.05);
    border: 1.5px solid rgba(255,255,255,0.2);
    padding: 24px 28px;
    margin: 0 48px;
    width: calc(100% - 96px);
    max-width: 380px;
    text-align: center;
    margin-bottom: 16px;
  }
  .event-card .event-type {
    font-size: 9px;
    letter-spacing: 4px;
    color: var(--gold);
    text-transform: uppercase;
    margin-bottom: 10px;
  }
  .event-card .event-day {
    font-family: 'Cormorant Garamond', serif;
    font-size: 32px;
    color: var(--gold2);
    font-weight: 400;
  }
  .event-card .event-date {
    font-family: 'Josefin Sans', sans-serif;
    font-size: 14px;
    letter-spacing: 2px;
    color: var(--gold2);
    margin: 4px 0;
    font-weight: 400;
  }
  .event-card .event-time {
    color: var(--gold);
    font-size: 13px;
    letter-spacing: 1px;
    margin: 6px 0;
  }
  .event-card .event-venue {
    font-family: 'Cormorant Garamond', serif;
    font-size: 20px;
    color: var(--gold2);
    margin-top: 8px;
    font-weight: 500;
  }
  .event-card .event-address {
    font-size: 12px;
    color: var(--gold2);
    line-height: 1.6;
    margin-top: 4px;
  }

  /* ───── SLIDE 5 — MAPS ───── */
  #s5 .maps-frame {
    width: calc(100% - 96px);
    max-width: 400px;
    height: 240px;
    border: 1.5px solid rgba(255,255,255,0.2);
    overflow: hidden;
    margin: 16px auto 0;
  }
  #s5 .maps-frame iframe {
    width: 100%; height: 100%;
    filter: saturate(0.5) brightness(0.7) sepia(0.3);
    border: none;
  }
  #s5 .maps-btn {
    display: inline-block;
    margin-top: 14px;
    padding: 10px 28px;
    border: 1px solid var(--gold);
    color: var(--gold2);
    font-family: 'Josefin Sans', sans-serif;
    font-size: 10px;
    letter-spacing: 3px;
    text-transform: uppercase;
    text-decoration: none;
    transition: background .3s;
    background: transparent;
    cursor: pointer;
  }
  #s5 .maps-btn:hover { background: rgba(255,255,255,.1); }

  /* ───── SLIDE 6 — TANDA KASIH ───── */
  .gift-card {
    background: rgba(255,255,255,0.05);
    border: 1.5px solid rgba(255,255,255,0.15);
    padding: 20px 24px;
    max-width: 340px;
    width: calc(100% - 96px);
    text-align: center;
    margin-bottom: 12px;
  }
  .gift-card .gift-icon { font-size: 28px; color: var(--gold); margin-bottom: 8px; }
  .gift-card .gift-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 20px;
    color: var(--gold2);
    margin-bottom: 6px;
    font-weight: 500;
  }
  .gift-card .gift-detail {
    font-size: 12px;
    color: var(--gold2);
    line-height: 1.7;
    font-weight: 400;
  }
  .gift-card .bank-num {
    font-family: 'Josefin Sans', sans-serif;
    font-size: 16px;
    letter-spacing: 3px;
    color: var(--gold);
    margin: 8px 0 2px;
  }
  .copy-btn {
    background: transparent;
    border: 1.5px solid rgba(255,255,255,0.3);
    color: var(--gold);
    font-size: 10px;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 6px 16px;
    cursor: pointer;
    transition: background .3s;
    margin-top: 6px;
    font-weight: 500;
  }
  .copy-btn:hover { background: rgba(255,255,255,.1); }

  /* ───── SLIDE 8 — TERIMA KASIH ───── */
  #s8 .thankyou-script {
    font-size: clamp(40px,11vw,64px);
    text-align: center;
    color: var(--gold2);
    font-weight: 400;
  }
  #s8 .message-text {
    font-family: 'Cormorant Garamond', serif;
    font-size: 16px;
    font-style: italic;
    color: var(--gold2);
    text-align: center;
    max-width: 600px;
    line-height: 1.7;
    margin: 0 auto;
    font-weight: 300;
  }
  #s8 .hashtag {
    color: var(--gold);
    font-size: 16px;
    letter-spacing: 2px;
    margin-top: 20px;
    font-family: 'Josefin Sans', sans-serif;
  }

  /* ───── ISLAMIC VERSE BOX ───── */
  .verse-box {
    font-family: 'Cormorant Garamond', serif;
    font-style: italic;
    font-size: 14px;
    color: var(--gold2);
    text-align: center;
    max-width: 280px;
    margin: 0 auto;
    line-height: 1.8;
    font-weight: 300;
  }
  .verse-source {
    font-size: 11px;
    color: var(--gold);
    letter-spacing: 1px;
    margin-top: 6px;
  }

  /* ───── SCROLL HINT ───── */
  .scroll-hint {
    position: absolute;
    bottom: 56px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
    animation: bounce 2s infinite;
    opacity: 0.5;
    pointer-events: none;
  }
  .scroll-hint span { font-size: 9px; letter-spacing: 2px; color: var(--gold); text-transform: uppercase; }
  .scroll-hint .arrow { color: var(--gold); font-size: 16px; }
  @keyframes bounce { 0%,100%{transform:translateX(-50%) translateY(0)} 50%{transform:translateX(-50%) translateY(6px)} }

  /* ───── FADE IN ───── */
  .fade-in { opacity: 0; transform: translateY(18px); transition: opacity .8s ease, transform .8s ease; }
  .fade-in.visible { opacity: 1; transform: translateY(0); }

  /* ───── TOAST ───── */
  #toast {
    position: fixed; bottom: 60px; left: 50%; transform: translateX(-50%);
    background: rgba(255,255,255,0.95); color: #1a1a1a;
    padding: 10px 24px; font-size: 12px; letter-spacing: 1px;
    z-index: 999; display: none; border-radius: 4px;
    font-family: 'Josefin Sans', sans-serif;
    font-weight: 500;
  }

  /* ───── CONTENT PADDING ───── */
  .slide-inner {
    padding: 60px 48px 60px;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    text-align: center;
    gap: 0;
  }

  /* batik top/bottom edge lines */
  .edge-line {
    position: absolute;
    left: 52px; right: 52px; height: 2px;
    background: repeating-linear-gradient(90deg, transparent, transparent 8px, rgba(255,255,255,0.25) 8px, rgba(255,255,255,0.25) 16px);
  }
  .edge-line.top { top: 0; }
  .edge-line.bottom { bottom: 0; }


  /* ───── SLIDE 7 — GALERI ───── */
.gallery-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
    width:100%;
    max-width:1100px;
    margin:0 auto;
}

.gallery-item{
    aspect-ratio:1/1;
    overflow:hidden;
    border-radius:20px;
    border:1.5px solid rgba(255,255,255,.15);
    background:#122357;
}

.gallery-item img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
    transition:.4s ease;
}

.gallery-item:hover img{
    transform:scale(1.05);
}
@media(max-width:768px){
    .gallery-grid{
        grid-template-columns:repeat(2,1fr);
    }
}

@media(max-width:480px){
    .gallery-grid{
        grid-template-columns:1fr;
    }
}

/* ═════════════════════════════════════════ */
/* ────── RESPONSIVE MOBILE — TABLET ─────── */
/* ═════════════════════════════════════════ */
@media (max-width: 1024px) {
  .jawa-border {
    width: 50px;
  }
  .edge-line {
    left: 35px;
    right: 35px;
  }
  .slide-inner {
    padding: 50px 35px;
  }
}

@media (max-width: 768px) {
  .jawa-border {
    width: 35px;
  }
  .edge-line {
    left: 25px;
    right: 25px;
  }
  .slide-inner {
    padding: 40px 24px;
  }
  .nav-dots {
    right: 8px;
    gap: 6px;
  }
  .dot {
    width: 6px;
    height: 6px;
  }
  
  .mempelai-row {
    gap: 20px;
    padding: 0 24px;
  }
  .mempelai-card {
    min-width: 120px;
    max-width: 160px;
  }
  .avatar-circle {
    width: 140px;
    height: 140px;
    font-size: 32px;
  }
  .ampersand-center {
    height: 140px;
    font-size: 32px;
  }
  
  .event-card {
    margin: 0 24px;
    width: calc(100% - 48px);
    padding: 20px 22px;
  }
  
  .top-ornament {
    top: 12px;
  }
  .top-ornament .line {
    width: 40px;
  }
  .top-ornament .center-glyph {
    font-size: 18px;
  }
  
  .divider {
    max-width: 280px;
  }
  .divider hr {
    flex: 1;
  }
  
  .countdown-row {
    gap: 10px;
  }
  .count-num {
    font-size: clamp(28px, 6vw, 48px) !important;
  }
  .count-sep {
    font-size: 32px;
  }
  
  #s5 .maps-frame {
    width: calc(100% - 48px);
    max-width: 350px;
    height: 200px;
  }
  
  .gift-card {
    max-width: 320px;
    width: calc(100% - 48px);
    padding: 18px 20px;
  }
  
  .verse-box {
    max-width: 260px;
    font-size: 12px;
  }
  
  .scroll-hint {
    bottom: 40px;
  }
}

@media (max-width: 600px) {
  .jawa-border {
    width: 25px;
  }
  .edge-line {
    left: 15px;
    right: 15px;
  }
  .slide-inner {
    padding: 35px 16px;
    height: auto;
    min-height: 100dvh;
  }
  
  .nav-dots {
    right: 6px;
    gap: 4px;
  }
  .dot {
    width: 5px;
    height: 5px;
  }
  
  /* Slide 1 */
  #s1 .names-script {
    font-size: clamp(36px, 10vw, 60px) !important;
  }
  #s1 .bird-icon {
    font-size: 40px;
    margin-bottom: 6px;
  }
  #s1 .and-text {
    font-size: 11px;
    margin: -2px 0;
  }
  #s1 .open-btn {
    margin-top: 20px;
    padding: 10px 28px;
    font-size: 10px;
  }
  #s1 .guest-label {
    font-size: 11px;
  }
  #s1 .guest-name {
    font-size: 18px;
  }
  
  /* Slide 2 */
  #s2 .countdown-row {
    gap: 6px;
    margin-top: 20px;
  }
  .count-num {
    font-size: clamp(24px, 5vw, 40px) !important;
  }
  .count-box {
    min-width: 50px;
  }
  .count-lbl {
    font-size: 8px;
  }
  .count-sep {
    font-size: 24px;
  }
  #s2 .wedding-date {
    font-size: 13px;
  }
  
  /* Slide 3 */
  .mempelai-row {
    gap: 16px;
    padding: 0 16px;
    flex-direction: column;
  }
  .mempelai-card {
    min-width: auto;
    max-width: none;
    width: 100%;
  }
  .avatar-circle {
    width: 120px;
    height: 120px;
    font-size: 28px;
    margin: 0 auto 12px;
  }
  .ampersand-center {
    display: none;
  }
  .mempelai-card .full-name {
    font-size: 18px;
  }
  .parent-info {
    font-size: 10px;
  }
  
  /* Slide 4 */
  .event-card {
    margin: 0 16px;
    width: calc(100% - 32px);
    padding: 16px 16px;
  }
  .event-card .event-day {
    font-size: 22px;
  }
  .event-card .event-date {
    font-size: 12px;
  }
  .event-card .event-venue {
    font-size: 16px;
  }
  .event-card .event-address {
    font-size: 10px;
  }
  
  /* Slide 5 */
  #s5 .maps-frame {
    width: calc(100% - 32px);
    max-width: none;
    height: 160px;
  }
  #s5 .maps-frame iframe {
    width: 100%;
    height: 100%;
  }
  #s5 .maps-btn {
    padding: 8px 20px;
    font-size: 9px;
  }
  
  /* Slide 6 */
  .gift-card {
    max-width: none;
    width: calc(100% - 32px);
    padding: 16px 16px;
  }
  .gift-card .gift-title {
    font-size: 16px;
  }
  .gift-card .gift-detail {
    font-size: 11px;
  }
  
  /* Slide 7 */
  .gallery-grid {
    gap: 12px;
    margin: 0 16px;
  }
  .gallery-item {
    border-radius: 12px;
  }
  
  /* Slide 8 */
  #s8 .thankyou-script {
    font-size: clamp(28px, 8vw, 44px);
  }
  #s8 .message-text {
    font-size: 13px;
    max-width: 280px;
  }
  #s8 .hashtag {
    font-size: 14px;
  }
  
  /* Typography */
  .label {
    font-size: 10px;
    letter-spacing: 2px;
  }
  .script {
    font-size: clamp(28px, 8vw, 44px);
  }
  
  .top-ornament {
    top: 10px;
  }
  .top-ornament .line {
    width: 30px;
  }
  .top-ornament .center-glyph {
    font-size: 16px;
  }
  
  .divider {
    max-width: 100%;
    gap: 10px;
  }
  .divider .diamond {
    width: 6px;
    height: 6px;
  }
  .divider .ornament {
    font-size: 14px;
  }
  
  .verse-box {
    max-width: 100%;
    font-size: 11px;
  }
  .verse-source {
    font-size: 10px;
  }
  
  .scroll-hint {
    bottom: 30px;
  }
  .scroll-hint span {
    font-size: 8px;
  }
  .scroll-hint .arrow {
    font-size: 14px;
  }
}

@media (max-width: 480px) {
  .jawa-border {
    width: 20px;
  }
  .edge-line {
    left: 12px;
    right: 12px;
    height: 1px;
  }
  .slide-inner {
    padding: 30px 12px;
  }
  
  .nav-dots {
    right: 4px;
  }
  
  /* Slide 1 */
  #s1 .names-script {
    font-size: clamp(32px, 9vw, 52px) !important;
  }
  #s1 .bird-icon {
    font-size: 36px;
    margin-bottom: 4px;
  }
  #s1 .and-text {
    font-size: 10px;
  }
  #s1 .open-btn {
    margin-top: 18px;
    padding: 9px 24px;
    font-size: 9px;
  }
  
  /* Slide 2 */
  #s2 .countdown-row {
    gap: 4px;
  }
  .count-num {
    font-size: clamp(20px, 4vw, 36px) !important;
  }
  .count-box {
    min-width: 40px;
  }
  .count-lbl {
    font-size: 7px;
    letter-spacing: 1px;
  }
  .count-sep {
    font-size: 20px;
  }
  
  /* Slide 3 */
  .mempelai-row {
    gap: 12px;
    padding: 0 12px;
  }
  .avatar-circle {
    width: 100px;
    height: 100px;
    font-size: 24px;
  }
  .mempelai-card .full-name {
    font-size: 16px;
    margin-bottom: 3px;
  }
  .parent-info {
    font-size: 9px;
    line-height: 1.4;
  }
  
  /* Slide 4 */
  .event-card {
    margin: 0 12px;
    width: calc(100% - 24px);
    padding: 14px 12px;
    margin-bottom: 12px;
  }
  .event-card .event-type {
    font-size: 8px;
    margin-bottom: 6px;
  }
  .event-card .event-day {
    font-size: 20px;
  }
  .event-card .event-date {
    font-size: 11px;
  }
  .event-card .event-venue {
    font-size: 14px;
  }
  .event-card .event-address {
    font-size: 9px;
    line-height: 1.4;
  }
  
  /* Slide 5 */
  #s5 .maps-frame {
    width: calc(100% - 24px);
    height: 140px;
  }
  #s5 .maps-btn {
    margin-top: 10px;
    padding: 7px 18px;
    font-size: 8px;
  }
  
  /* Slide 6 */
  .gift-card {
    width: calc(100% - 24px);
    padding: 14px 12px;
  }
  .gift-card .gift-icon {
    font-size: 24px;
  }
  .gift-card .gift-title {
    font-size: 14px;
  }
  .gift-card .gift-detail {
    font-size: 10px;
    line-height: 1.5;
  }
  .copy-btn {
    font-size: 8px;
    padding: 4px 12px;
  }
  
  /* Slide 7 */
  .gallery-grid {
    gap: 10px;
    margin: 0 12px;
  }
  .gallery-item {
    border-radius: 10px;
    border: 0.5px solid rgba(255,255,255,.15);
  }
  
  /* Slide 8 */
  #s8 .thankyou-script {
    font-size: clamp(24px, 7vw, 40px);
  }
  #s8 .message-text {
    font-size: 12px;
    max-width: 260px;
    line-height: 1.5;
  }
  #s8 .hashtag {
    font-size: 12px;
    margin-top: 12px;
  }
  
  .label {
    font-size: 9px;
    letter-spacing: 1.5px;
  }
  
  .top-ornament {
    top: 8px;
    gap: 10px;
  }
  .top-ornament .line {
    width: 25px;
  }
  .top-ornament .center-glyph {
    font-size: 14px;
  }
  
  .divider {
    gap: 8px;
    margin: 14px auto;
  }
  .divider hr {
    margin: 0;
  }
  .divider .diamond {
    width: 5px;
    height: 5px;
  }
  .divider .ornament {
    font-size: 12px;
  }
  
  .verse-box {
    font-size: 10px;
    line-height: 1.6;
  }
}

@media (max-width: 360px) {
  .jawa-border {
    width: 15px;
  }
  .edge-line {
    left: 10px;
    right: 10px;
  }
  .slide-inner {
    padding: 25px 10px;
  }
  
  #s1 .names-script {
    font-size: clamp(28px, 8vw, 48px) !important;
  }
  #s1 .bird-icon {
    font-size: 32px;
  }
  
  .mempelai-row {
    padding: 0 10px;
  }
  .avatar-circle {
    width: 90px;
    height: 90px;
    font-size: 20px;
  }
  
  .event-card {
    margin: 0 10px;
    width: calc(100% - 20px);
    padding: 12px 10px;
  }
  
  .gallery-grid {
    margin: 0 10px;
    gap: 8px;
  }
}

/* ===== MOBILE CENTERING + GALLERY OPTIMISATION ===== */
.slide,
.slide-inner {
  max-width: 100%;
}

.slide-inner {
  width: min(100%, 1100px);
  min-width: 0;
  margin-inline: auto;
  padding-inline: clamp(16px, 5vw, 48px);
}

.event-card,
.gift-card,
.verse-box,
.message-text,
.mempelai-card,
.parent-info,
.parent-name,
.label,
.serif,
.script {
  max-width: 100%;
  overflow-wrap: break-word;
  word-break: normal;
}

.event-card,
.gift-card {
  margin-left: auto;
  margin-right: auto;
}

#s7 .slide-inner {
  width: 100%;
  max-width: 100%;
  align-items: center;
  justify-content: center;
}

.gallery-grid {
  width: min(100%, 720px);
  max-width: 720px;
  margin-inline: auto;
  padding-inline: 0;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: clamp(10px, 2vw, 18px);
  contain: layout paint;
}

.gallery-item {
  border-radius: 12px;
  aspect-ratio: 1 / 1;
  max-height: 190px;
  transform: translateZ(0);
}

.gallery-item img {
  will-change: auto;
}

@media (hover: none) {
  .gallery-item:hover img {
    transform: none;
  }
}

@media (max-width: 600px) {
  .slide-inner {
    width: min(100%, 430px);
    min-height: 100dvh;
    padding: 38px 20px;
  }

  .divider {
    width: min(100%, 280px);
  }

  .event-card,
  .gift-card,
  #s5 .maps-frame {
    width: min(100%, 340px);
  }

  .label {
    letter-spacing: 1.4px;
    line-height: 1.4;
  }

  #s7 .slide-inner {
    padding-block: 42px;
  }

  .gallery-grid {
    width: min(100%, 330px);
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 10px;
    margin-inline: auto;
  }

  .gallery-item {
    border-radius: 10px;
    max-height: none;
  }
}

@media (max-width: 380px) {
  .slide-inner {
    width: min(100%, 360px);
    padding-inline: 18px;
  }

  .event-card,
  .gift-card,
  #s5 .maps-frame {
    width: min(100%, 310px);
  }

  .gallery-grid {
    width: min(100%, 300px);
    gap: 8px;
  }
}

/* ===== MOBILE SHADOW-SAFE CENTERING ===== */
#s1 .top-ornament {
  left: 50% !important;
  right: auto !important;
  transform: translateX(-50%) !important;
  width: max-content;
  max-width: calc(100vw - 56px);
  justify-content: center;
}

#s1 .top-ornament .line {
  flex: 0 1 46px;
}

@media (max-width: 600px) {
  #s1::before,
  #s2::before,
  #s3::before,
  #s4::before,
  #s5::before,
  #s6::before,
  #s7::before,
  #s8::before {
    left: 25px;
    right: 25px;
  }

  .slide-inner,
  #s7 .slide-inner {
    width: min(100%, calc(100vw - 58px));
    max-width: 360px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 12px;
    padding-right: 12px;
  }

  .event-card,
  .gift-card,
  #s5 .maps-frame,
  .gallery-grid,
  .verse-box,
  .message-text {
    width: 100%;
    max-width: 100%;
    margin-left: auto;
    margin-right: auto;
  }

  .gallery-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }

  .label,
  .serif,
  .script,
  .parent-name,
  .parent-info,
  .event-card,
  .gift-card,
  .message-text,
  .verse-box {
    overflow-wrap: break-word;
    word-break: normal;
  }

  .event-card .event-type,
  .count-lbl,
  #s1 .and-text,
  #s1 .open-btn {
    letter-spacing: 1.6px;
  }

  #s1 .names-script {
    max-width: 100%;
    line-height: 1.08;
  }

  #s1 .guest-label,
  #s1 .guest-name,
  #s1 .and-text,
  #s1 .open-btn {
    max-width: 100%;
    text-align: center;
  }
}

@media (max-width: 380px) {
  #s1::before,
  #s2::before,
  #s3::before,
  #s4::before,
  #s5::before,
  #s6::before,
  #s7::before,
  #s8::before {
    left: 20px;
    right: 20px;
  }

  .slide-inner,
  #s7 .slide-inner {
    width: min(100%, calc(100vw - 46px));
    padding-left: 10px;
    padding-right: 10px;
  }
}

/* ===== REFERENCE BLUE BACKGROUND THEME ===== */
:root {
  --navy: #86a9c7;
  --navy2: #718aa7;
  --gold: #ffffff;
  --gold2: #ffffff;
  --gold3: #eef6fb;
  --cream: #ffffff;
  --white: #ffffff;
}

html,
body,
.slider,
.slide {
  background-color: #86a9c7;
}

.slide {
  background-color: #86a9c7;
}

.jawa-border,
.jawa-border.left,
.jawa-border.right {
  background-color: #a8d0e8 !important;
}

#s1::before {
  background: rgba(104, 136, 160, 0.78);
}

#s2::before,
#s3::before,
#s4::before,
#s5::before,
#s6::before,
#s7::before,
#s8::before {
  background: rgba(104, 136, 160, 0.80);
}

.avatar-circle,
.gallery-item {
  background-color: rgba(96, 120, 152, 0.42);
}

.event-card,
.gift-card {
  background: rgba(255, 255, 255, 0.06);
  border-color: rgba(255, 255, 255, 0.35);
}

/* ===== FIRST PAGE BALANCED IMAGE BACKGROUND ===== */
#s1 {
  background-color: #a8d0e8;
  background-image: url('images/cover-page-first.jpeg') !important;
  background-position: center center !important;
  background-size: cover !important;
  background-repeat: no-repeat !important;
}

#s1::before {
  background: rgba(104, 136, 160, 0.58) !important;
}

@media (max-width: 600px) {
  #s1 {
    background-size: 100% 100% !important;
    background-position: center center !important;
  }

  #s1::before {
    background: rgba(104, 136, 160, 0.52) !important;
  }
}

/* ===== FIRST PAGE FULL IMAGE BACKGROUND ===== */
#s1 {
  background-image: url('images/cover-page-first.jpeg') !important;
  background-position: center center !important;
  background-size: cover !important;
  background-repeat: no-repeat !important;
}

#s1 .jawa-border.left,
#s1 .jawa-border.right {
  background: transparent !important;
}

@media (max-width: 600px) {
  #s1 {
    background-size: cover !important;
    background-position: center center !important;
  }
}

/* ===== INNER PAGES FULL IMAGE BACKGROUND ===== */
#s2,
#s3,
#s4,
#s5,
#s6,
#s7,
#s8 {
  background-color: #ffffff;
  background-image: url('images/inner-pages-bg.webp') !important;
  background-position: center center !important;
  background-size: cover !important;
  background-repeat: no-repeat !important;
}

#s2 .jawa-border.left,
#s2 .jawa-border.right,
#s3 .jawa-border.left,
#s3 .jawa-border.right,
#s4 .jawa-border.left,
#s4 .jawa-border.right,
#s5 .jawa-border.left,
#s5 .jawa-border.right,
#s6 .jawa-border.left,
#s6 .jawa-border.right,
#s7 .jawa-border.left,
#s7 .jawa-border.right,
#s8 .jawa-border.left,
#s8 .jawa-border.right {
  background: transparent !important;
}

#s2::before,
#s3::before,
#s4::before,
#s5::before,
#s6::before,
#s7::before,
#s8::before {
  background: rgba(104, 136, 160, 0.58) !important;
}

@media (max-width: 600px) {
  #s2,
  #s3,
  #s4,
  #s5,
  #s6,
  #s7,
  #s8 {
    background-size: cover !important;
    background-position: center center !important;
  }

  #s2::before,
  #s3::before,
  #s4::before,
  #s5::before,
  #s6::before,
  #s7::before,
  #s8::before {
    background: rgba(104, 136, 160, 0.52) !important;
  }
}
</style>
</head>
<body>

<div id="toast">Disalin!</div>

<audio id="bgMusic" autoplay loop>
    <source src="music/backsound.mp4" type="audio/mp4">
</audio>

<!-- NAV -->
<div class="nav-dots" id="navDots"></div>

<div class="slider">
<div class="slides-wrapper" id="sw">

  <!-- ══════ SLIDE 1 — OPENING ══════ -->
  <div class="slide" id="s1">
    <div class="jawa-border left"></div>
    <div class="jawa-border right"></div>
    <div class="edge-line top"></div>
    <div class="edge-line bottom"></div>
    <div class="slide-inner">
      <div class="top-ornament fade-in">
        <div class="line"></div>
        <span class="center-glyph">✦</span>
        <div class="line"></div>
      </div>

      <div class="fade-in" style="font-size:52px; color:var(--gold); margin-bottom:8px;">
        ༄
      </div>

      <p class="label fade-in" style="margin-bottom:20px">Undangan Pernikahan</p>

      <div class="script names-script fade-in">Galuh</div>
      <p class="and-text fade-in">— dan —</p>
      <div class="script names-script fade-in">Yudha</div>

      <div class="divider fade-in">
        <hr><div class="diamond"></div><div class="ornament">✦</div><div class="diamond"></div><hr>
      </div>

      <p class="label fade-in">Jumat, 26 Juni 2026</p>

      <div style="margin-top:22px" class="fade-in">
        <p class="guest-label">Kepada Yth.</p>
        <p class="guest-label">Bapak / Ibu / Saudara/i</p>
        <p class="guest-name" style="margin-top:6px"> <?= htmlspecialchars($namaTamu) ?></p>
      </div>

      <button class="open-btn fade-in"
      onclick="goSlide(1); document.getElementById('bgMusic').play()">
      Buka Undangan
      </button>
    </div>
    <div class="scroll-hint">
      <span>Geser</span>
      <span class="arrow">↓</span>
    </div>
  </div>

  <!-- ══════ SLIDE 2 — COUNTDOWN ══════ -->
  <div class="slide" id="s2">
    <div class="jawa-border left"></div>
    <div class="jawa-border right"></div>
    <div class="edge-line top"></div>
    <div class="edge-line bottom"></div>
    <div class="slide-inner">
      <p class="label fade-in" style="margin-bottom:4px">Menuju Hari Bahagia</p>
      <div class="divider fade-in"><hr><div class="diamond"></div><hr></div>

      <div class="script fade-in" style="font-size: clamp(34px,9vw,52px)">Galuh & Yudha</div>
      <p class="wedding-date fade-in" style="margin-top:8px">Jumat, 26 Juni 2026</p>

      <div class="countdown-row fade-in" id="countdown" style="margin-top:30px">
        <div class="count-box"><div class="count-num" id="c-days">00</div><div class="count-lbl">Hari</div></div>
        <div class="count-sep">:</div>
        <div class="count-box"><div class="count-num" id="c-hours">00</div><div class="count-lbl">Jam</div></div>
        <div class="count-sep">:</div>
        <div class="count-box"><div class="count-num" id="c-mins">00</div><div class="count-lbl">Menit</div></div>
        <div class="count-sep">:</div>
        <div class="count-box"><div class="count-num" id="c-secs">00</div><div class="count-lbl">Detik</div></div>
      </div>

      <div class="divider fade-in" style="margin-top:28px"><hr><div class="diamond"></div><hr></div>
      <div class="verse-box fade-in">
        <p>Istri-istrimu adalah ladang bagimu, maka datangilah ladangmu itu kapan saja dan dengan cara yang kamu sukai…</p>
        <p class="verse-source">(Q.S. Al-Baqarah : 223)</p>
      </div>
    </div>
  </div>

  <!-- ══════ SLIDE 3 — MEMPELAI ══════ -->
  <div class="slide" id="s3">
    <div class="jawa-border left"></div>
    <div class="jawa-border right"></div>
    <div class="edge-line top"></div>
    <div class="edge-line bottom"></div>
    <div class="slide-inner">
      <p class="label fade-in">Bismillahirrahmanirrahim</p>
      <div class="divider fade-in"><hr><div class="diamond"></div><div class="ornament">✦</div><div class="diamond"></div><hr></div>
      <p class="serif fade-in" style="font-size:13px; opacity:.7; margin-bottom:18px; font-style:italic">Dengan memohon Ridho Allah SWT, kami mengundang kehadiran Bapak/Ibu/Saudara/i pada pernikahan putra-putri kami</p>

       <div class="mempelai-row fade-in">

    <!-- WANITA -->
    <div class="mempelai-card">
        <div class="avatar-circle">
            <img src="data:image/jpeg;base64,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" alt="Galuh" style="width:100%;height:100%;object-fit:cover;object-position:top center;">
        </div>

        <div class="full-name">
            Galuh Arum Ratnaningtyas, S.E
        </div>

        <div style="height:1px; width:40px; background:var(--gold); margin:8px auto; opacity:.5"></div>

        <p class="parent-info">
    Putri dari<br>
    <strong class="parent-name">
        Bapak H.M. Asnawi & Ibu Hj. Listyowati
    </strong>
</p>
    </div>

    <div class="ampersand-center">&amp;</div>
    <!-- PRIA -->
    <div class="mempelai-card">
        <div class="avatar-circle">
            <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAgGBgcGBQgHBwcJCQgKDBQNDAsLDBkSEw8UHRofHh0aHBwgJC4nICIsIxwcKDcpLDAxNDQ0Hyc5PTgyPC4zNDL/2wBDAQkJCQwLDBgNDRgyIRwhMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjL/wAARCAJYAZADASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwDyeG7toAxjiVmK43MM4+lNs7m7tkkht5P3cowR2qmkOY9y8rQkpifa2QKxaT0Eai6ZPPbsVZmij+bGflBrJjZlnwF3dtvrmrsd7cQo3kzMiuNrgHgiu30TwDOsmn6zcwlbEOsknmcjZ6/ShJ7COKdr23sTbNC8cMrbgCvU45xVR5po7b7M4+QHIyORX0r4ok8IabpYubo2mVj/AHGMHOR29a8P8TaNaizg1K0vI5hcfP8AIeADzj1BHvVOHKNM45skgiruI5LYMSNw61XCHtVy4lsf7PhWFGW5/wCWgPr7e1D1A2PDzvc3qRRIjSkBFHqat+MPDOq6K0d1fwqiSnGU6KfSsfwxqX9k6za3TKpSOVWYkZwAea9j+LLDU/Clrc21zHKmUlBQghl68Uo046vqI830XwMNU8OT6ub0IFLKIwOcj1rKs/CmoalG72cBlVDgkHv6U/WPEb6jbwQxwm2KAeYImwrnHXH611OheLNK8MWSTWkrTyzLi4hY87vXHTFVa7HqcfbWMtlqKw3UZjZWG5W4719N3un2Gp+EVBCiJoBg+2K+ddV8SRaxfSXL2+wk/KBV6z8d6nDpX9lG4Y2XQKfvKvcA+lTCTTd9hHZeEF0Gz1oFwzODwwUkBgfavaPKt761AKAqw4yK8sbxR4X0vwvDNpLwNcFBhM4bd6HvWVB8UNShZGDW0inkpgjHtmtE1BWBHt8cYiQIvQdKUlR1xXltr8XrV9yz2sqNjgqQwzVG4+JN0bgXBgxaEHaA2Wz6+lVzR7jPXyygZJAFN81P7wrwvUviDq+pfJbSi3T/AGRlvzp+m+M7yIC2vJ5sk8S7v51MqsUK57kGB6HNOrmtAu5bm1SeK4M8ROGDfeU10gORVppq6GFFLSUwEoopaAEpaKKACiiigApKWkoAKSlpKACiiigBKKKKACmSFghK9afSUAc1qVxqSSYt0znqKwL7+1JP+PlTtyMAV6E0asckVHJaxSjDKKiUObqJo8uuYtiNgkZODWPPbwEu34/WvUtR0W1aDbsGTXJz6LatFMARkDJ5rnlQ8w2OJUI4ZFGSDnA7VqJaSy2pAQkJjnoKu6dYRWrtuAILYOe9b00UUcTLEMgj04rOKi1qHM+hyNvK1jNv2l0HGDVK/wBVi89mSIjPXit64gwTx17AdKyL+OB5DiMKT6DoKzc7pxAp2Qac/aN/lqx4GecCti0nZSyLcBOoBU1yNwzxOYkkKRnkirpZYNLURktJ/e9TWdrNDOP0uSx/tSOS4iJs1YFwRxj0OKk8WXdjqOp+dptt5Nuq7VXA/pWJ9ruI7JrRSPKLbjxzn60lrPhHSRsDtmu5JpFOzIlZgcE11ul/EHXNK0M6RHP5toQVVJRu8sH+6e306Vy0k484MFUgfrTJZlkcFcIfSrTYiWW7eeTMrkkdAeg+lRF8KeSo70yQEjnrTDlgAaLAiTzRkbSatvA1oYLghH34YIe4qgBg5HbvU8txJO4ZwAR6UrAaT3sTWpK2Zjfd9/sRUkOtXUdqbHzZfsrclOoH09PwrKE0hXZk7fSuk8M61a6T56XtitxHMBtYY3Ifx6imlrqBmWQtWaXzjgEfIfes2Y4mbb0zxWvcpFLdyywJsiY5C4xiqDHy7hZFQMFOcHoalKzEQpuZgFzk9qstE8TBZFKMemRjNS2V5HFrNtdzQ7oo5VZox3UHkV2HjD7J4o1G3Hh6Bp9iEnYhGATxmqsO5x6q27b3q1BFKZCqxs2OuBnFMGk6nHcyRPbTGWPhl25Ir0P4b2Blvr22nj3PJCHG4cgqf8DStd2Bs5PTdPfUJpEjcK0abyD3HepYFQ3a28zkLv2sew96u67pFzoXiOWMBo1Zi0bLx8pqiYCXzzk96zk7aE3Na606TRLpJtokT09a7Gw8HWniKyN1byFCQCAPeud0nUkE0S6lG01svysQMlfevYvDFraW+nobMo0LDcjL0YdqVKnd3bFuVfBuiz6NZPDMxYlskn8q6qkAA6UtdSSSsigpKWimAlFFFMAooooAKKKKACkpaSgApKWkoAKSlpKACiiigApKWkoAKKKKAM3Vo5miJiPNcLdpcL2KsTjHtXol2dkRbsB0rnL2S0lgZAVL1lVhzLcTOSkje3XfywB5b1NadnexPbssi5ZhwTSTwN9lC5yq5xz1NT2FsJ4FEceWVcn2riUWpKxSRRcBZWO3K9qrXdlHLGfl+btVu+D25IC9O2aoXV95aqX4APzEVKhrqJs5O8sZDdFChbr0FWbm3gWwB+7IO3pWy17bgzsuNpGAc9K5HU9RE8rp0XmrcYxV0K7OBmieC62g5BPFJOke8A8euKlgt5b3eSwUxLubPUD6VXjjkmcIiszk4AAyTXUURPE0ZyRwelNSRC4Dr361PdJcwXDQXMbRuuPlYYIqAqCB60/URckt9zDb0qMoNpwfmXrUguyItuO3WqoYmTOeT1oGdLqmq6LceGLW2tLYxXwx5o2/xDqQ3oa5uNwPvVPb6fc30/lW0TSv1woqC6t5rSdobiNo5B1Vhg09wL+n/ZJpQJpRGpYAsewPepvEViumaksMM4lAXOQcisVQQcinbGZtxzSsBqfbV+xnjDniqsDsWw1QkNwD0qaIYBoA9R+Hnh/RPEOl39tcxD7ZGc5PdCOMH1BzU/hS/PgvxXeWMlrJfWxXaGjXLqOorz/R9SvtMmaSzmaIuu0kdxXovw88Q2FlPqEmrOGnkw6SSc7vUZpprREs9L8MDSNXa6ukRfOd/wB4jrhlxwMg1Lp/hmOx8WS38SBUaLZgDjOa5rwzbrrmp3muWd09sqt5OFP3gORmuv07U7xWc3Kq8SnAlXv9RWi11EjM8b+E11mBZIVAmQ5Q4/SsfQPAsf2Cdb6ENNu4Ptiu1TXoLhysalwDgkDvWhBMkgyq4JpOKvcdjgfDnhSFDfW1xEGxJ+7cjquOldJ4b0l9HiltOfJWQtGD/CD2reWJFYsqgE9cU7FCSWwWCiiimMSilpKAEpaKKACkpaSgAooooAKSlpKYBSUtJQAUUUUAJRRRQAUlFFABRRRQBVvYnmTYpwKx4PDUYkd5CzFveuiqKS5ji6sKTinuBknw5Cc8nHYZ6Vn3tkNHRngY7T94GtCfXo45cDkdOKzJtRhvLtI5CCnU5NQ4x6biMC/huZ4ftDvhW9qwrmOS4i8pW3e9dfrF1brF5GQAw4ArE1CwjtYhJbN1XpnrmuedLXRhc88nNzaTSRAthjxmq82l3MkZZAzMBuz7V1F3bB15UmRuAK29K08x20vmgcrlm69O1Zxg2x30PDRdLc6i0kjeSr5weuD71o6LqMmlatBeRxJIYmztcZDD0qC00S7uPKdIGbewwAOa9+8PfDfRbPRY765hDymPcS46HHpXVy8z0EzwzxRqC6vqxukg8rcANuc/rTNE8PSaxcNDv8tgpYAjBYDrj1r1bwz4T0qTWb3WbyFWsEkIj44Hvj0qfxT4g8HXFv5NhPGJojuDRKVKkd1b1ppNq7YXPEr6xeyvZbUneUOMjuKp+U/mhVVi5PAAyTWhdXMj3clwW3l2PJHWu5+GuqeGdPa6m1lUW7TDRNIMhl9B70luU9Dn9Gudb8G3SajLp2Yp12MkwwHH8wayfEWrf27qrXnk+TkY25z+tep33jnTfEGv28DaW/2LlFkbHDfwnb6f415r4rtIbXXp/KAVHO4KBjH4VT20YkYYkVGwRV6S7iNlFGkOJFPzH+9zVDaCcjtShyGAI4qRmhe3sd1MrLCIgBwB2qOOMt071WdCXGKu2c6QzqJlOzoTSastAZ1GqWc2k6DbW1xboJwceYh6g8jPvW74Y8P2mq+Fpb/zf9JjdkZc/dIGRn6io/F82nz6dYx2twJSFXHOTjFbnhzwTqNroc15b3AIuo1bYDwR1B+vNUknKxN9BPBGuw2uh6jGs4WXzBuQnkcdaj07xdfWFhNZq/mCRy6sx5Unr+FcHaaVfN4i+wxRt9oaUqV/nVvXLDU/D2oRpc/xruHoazalZcvQLHbaW3iTY9/YzvjJyMcMR7V6b4O8Qf27p2+aMR3MTeXKvoa8f8P+P5tK0yW1Fp58bncPmwUOOa1/AHiSd9euo0RQbr5whOOR6fhVU9LahZo9worPtNQMhCTIUf0NaGc81sMSilooASkpaSgAooooAKSlooASiiigApKWigBKSlpKYBSUtFACUUUUAFJS0UAJR0ooIyMUAZWqakLWNiOcCuLudVur2bAYrH0wOtdzfWMcsTFhniuX0/TfM1CZSv7sdKymm2kmJmXaRzSTbVBI5yTVifRJlkWTfge3Wt65sfs4AjTLHsKRba9k27lH+Ap+yXURmXumotlGZMGVQM5qKLSLm9VCRtjHUEV0jaW08aeYcnOWNasVuqRbQO1PkV7jsea6jpkUG5nXD5yCewq5pVlPPa7UQMH+7/iateJLKZ7jKxsynrjsKu6Pq1ragQy4iIGNp61OnM0I4TwTP4d02LTJ/t8c6Mm3EjfOhPUEdeDXoF54t0SfTr+yhuo1ngQloiQDjHUeo+lfOWnaj/wh3iuV1gju44mMbJIMbl9j2NXp/FNvfandXEtliOdNqjdlkPrnvT57IZ2N5410qXwI+n2kzW92AUeNhhuvVT3FeZNdrNi3jQBTxmti+t9Im0CGWCf/AEwvh424I+nqKw7NFhmJb6Cs5O6Vxo6aHT7aG1i86D93IMK5HBPfms250+3jk2ooB3cMK1tBvbmFmjuUMmlzHEgcZVG7MPQ+vtUZ0qfUNVe2tYyWc5UL0qemgjLe8k02aNwiuFIO1hkH2NRXMF54p1J5bGxkYkcqDux+Ndj4g8LKukW1vbWkrX+A0gKnI9fwrJ8KeL5vCU1xayWC3AckYztdW9jVxjy6MdzjrywuNPuGt7mMpKvUGq+znNdvfaFrXiXUZr42iweZ8wUnoK5W7sbixuXt7hNsiHBFUxkSxkbHyNpNem6L8MU8Q6BBfQXQ3yqHBHIHqK8vKOR8grp/B/jLX/C0jW+nFZYpnB8iUEru9R6UK19RM7Lwz8M5T4lubLUEZoIot0cg6Mc9K9Y8LaTPpNpPprsXt0c+Tu6qp7fnUHhLxBJqtil5d6e1pK/ytzuXI9D/AI116MrjeverSS1QjzuDwoIfiIupqgCeWSRj+Lpn8qrfFDw02oWSXEMe6SHkADqp616aY0379o3etRXVtHdwmOQdaLLYDx7wR4MhvPDM01zD+8d22kjnbjFY+kaBdWHjW0t1BVopg+71Ud691sbGKxtxDGoCjtVN9DgOppeKBvUED8aTgtA1Lwt1lhTePmA4NPiJGUPapQMDFGBnNUMKKKKAEopaSgBKKWigBKKWkoAKSlooASilpKAEopaSgBKKWkpgFJS0UAJRRRQAlFLRQBUu0eRSFzVex08W7s3Usa0sCikBG0Cs2cDNPCKBjAp1FMA6UUUtAEU1tHKhyK4bxDFDHONqhSe/eu+PQiue1nSkuEeVhlgOKzqR5otAz5RnVpi87uXZjkknJJqO3VpJVjRSzMcADvU1vEs9xHCziNWYAs3QVo3dmdC1WF4WDtEwcZOQSD/KsfURtXmif2b4dV7+ExXDH5CR1B/rXLOQWXB6V1Xibxk/iW2jia0SAJjJDZzWLo+iy61efZbcjeFLc+lOVlsOzJ7XxBPFpR09kSS3LZzjDD1Ga7XwfpGt2Gs2+p2dt5yqoJjduGQ9s9vY1Ws/hbO2nzTSXW2YDIXHAHbNTeFPHGo+GoX094RcGM+XGWb7oB+6fUenpTSS1Yj2xpbObS5b14PLfYdysOVPcGvmzULKSe/uNbiXFu1wXXA7A13118UphbXdrc2SkSqTG8TcqfQg9q4zTtchg0K6sLiJsyMzRnGRz1FVKaktGA2fxvrEV2stsYYxjay7Mq49wat6BoMvjHxIy3rrbsyFyq/xDvjNN0bR7J9KfUbyRSQf3aZ64qL7dJ9vS9tpHt1i4jYHBFZqo27MaNfxh4DtfC8ccsMzSIxwVbr+Fc5by20QjZF2ujBg3cEd62GvZdavY4dRvZZEAzudsjP9K2df8ALp+g/2lazmRAgcg91q3rqtgvY1tJ8eeVpcNmscYYvh3x8uCeTivTtPu9kUKhxIjrkMpyMV8026BcbGIPau28M+Ib+xv7bTrjctpcHZG5B+Rj0x7ZqoVL6MR7wGDDIOaWuc0a4u4LtrW7YuMZRj/KujrQYUUUUAFJS0UAJRRRQAUlLSUAFFFFABSUtFACUUtJQAUUUUAJRS0lACUUUUAJRS0lABSUtFMBKKKKACiiigAopaKACiiigAqOVPMjKmn5ApkshUcUAfHFiYDMftBwAOKfKu4mRGymcCjXdCvNAvjZ3ZUuBnKng1TtpHC4JO3PSuVw1uCV2WX4VVH41c0y/utLvUurQgSpzyO1UnlDsCBjFTDb1zhgKTB6s6eX4ha7LeLcxmOFvKMTIoyrD3BrFMs8m+5LkSlt2feq8PK5K9alfPChvwobctBBaytLdq12SYyfmIHatu20gaprENraf6uVgofHH1rOitmMe/ado6nFe8+DLHTdX8M21xDDGsqqFkwOjCrik3YZwfiP4eXWj2ML2XmT5YK6e571zXiDwjq+gWqXF0u6GTglf4D719KqlvcRLG5DFPWqmu6ZaalpcsEqK6lSCCO1aOCYHjnw4uNMu7C60y9jjN2zZiLAZdSOldHb6ZqNhLFolxL5ulTOdjP1iB/g9we1aNv8OtNTw4IQmJ1GfNXhwexBqx4bW51Szn0zVG8y6s3CCfvIvVW+tOKtZMkr6h8PLG61C0EMQjgjzuC8ZHar+ueF0kt7OGKJd0ciMCB02muwtYmihVXOWAxmpiobqAcU7Idimlop8pyPnUYzVyiimMKKKWgBKKWkoASloooASilpKAEopaKAEopaSgAooooAKSloxQAlJS0UAJSUtFACUUtGKAEpKdikxQAlFLSUAFFFFABRRSNnacdaAGSzLF94iqcupxIOGHTNQX0NxKjKvfvXPSaRqM03D4ApNtAzSuvECRSAqcqe4q3aaxFeRkg9B3rkpdKufP2yZKL3FOjVbOEsGbf3z6VClK+qFc8G8UeIJfEuqG8khEJIwEHOKy4/kQ+tOCndnvRnLHIqGxp2C3VSDvbHpWl9inms/PWM+Uv8VZACvcKrHauQGPoK7PUpIbKzt9PtJxJEwyeQQ3uKTXUEYCRzyAIv3RVu3tIhuLT/vB2Peo5nltZvLIADDtURBHzDnNTdAdbZajDb6Q8EiDPTfjgg+teoeBZLa08FmW0mVizNnB6N6V4fGtxNAYVUuW7DrVi11PVNCtZ7SzmeNJeXjI6H1HoaqLSdxH0IsU1npccnnk3Mv3mJ7mpJrn7NLb27XPzODuyfvcV4VpHizxDef6Jd6jK8a427gMj8aupqOsahr0Nre3DzdRHxg5/CrdZLRbgexx615moG0gYttX5h2q1pdu9pqM8rrxKQQa8807w3q+n6mt+JZBGWG75juA/wA9q9asI3MC+aQ/H3sdaqDk9WC1LqncAaWgAAYFFWMKKKKACiiigAooooASiiloASkpaKAEooooAKKKKACiijFACUtGKUKaAGkUlPIpCKAG0lOpKAAUUUUAFJRRQAlFMlYqmQOayrrU3hB+UnHoKANcnFISBXIT+K1Q42tkdQaV/FUTxgofm9Kj2ke4XR1Uk2ykE6jqetctN4hjIXOaZPq7vgpwPXNHtIgdW1xGELHFZ82s2seQXQH61y9xrT+XsLYzxxVGBI2uRI43L1GTxms5V7aRAv3niaAXbQFWOehUcVzWq3yTSsA5BPr2rXu7RVn6KC/U+lZV3p4kVsYY542isJVJy0YWPD0b5v50jSAN04qKWQKuB1NRq27gc1vYGrE6Bop0mKblDAlfUVYurxJrnzYgyAdAeopkUjGLDjI7GoChLDjgml6hcuSXss+GkOWHercTL5QbvVIJhcUofbj0qWlsI7/wbY3Ut0l8LcPap8smfT2+ldDcaDD4h8U2Yt4s26tiaVehA6CuP8M+N59E0yayMKTRMcrzhlP9RV3S/iVPp2nm1WxXcXLCQNjqa0jypWCx1Pi/wjFY31tJpsf7z7rqo4I9a6HTvBey7sNQkK+dE4Zh65FcTqPj6G5t1e3mlkkkADB1w0Z9vWrF58SbhbOEWVxOLhAATJGpVvrTahzXCx7iLaBUIIGCOQaa13bWy7d4wK8V/wCFr6rcWnliziE2OXDHH1xXJ3/iHWNTuN9zey8dFQ7QPwFV7SIz6YhvYZvusKsDmvCvBV7qEmoxRCWcRMcMckivZ7NbiIKsjblI4anGXMrgXqWiiqAKKKKACkpaSgAooooAKSlpKACiiigAooooAKUUlOAoGKBTgKAKWpAYwqM1KajNMBtJS0lMAopCcVDJMFoESkgU0uKz5r5UzzVF9WRT94fnTsBvbgapXogVDuArMXWY843r+dVL+5a6Qqjjn3pNNBcydVS1kZygUvnAqlDpTmIyqjBexxW3p+gxb/Nnfd7dq3ZPs8VsYxtAArF0ufWQkee3lnNBEJQ+c/w+lUwb7yVcoVjzwTXSxxtcaiY3AMK8g1JqdoptiFViAOKn2Mdwucm0FxNIgyWZmwBmtCO3vbWVFlUlexHQVpaTpk6kSMuOchj6Vt3qI0SqByPanGmrXA51iZseZwB3z1NMEn2d97R4HrVm4jIGWZSB0AFII1lBYoWIGcnpQoWdwufOjQxm03MDvPIOahgVVkAPAJ61c8tbmfbB9xnwoqXVNJfT5FWRgSw6AdKLjKsjeVKUGduKliKslVlUA9c1MxEa5HFJiY64mEaYHU0Q5dAaaFV1UuM8847itC5ubVWAtxmMDjjBH1oHYrbNozQoyRT7Y+eSvcnipUVYpdrHkUriHxAggVtHTZXtVljQuO+BV/wz4ej1bzZ5XxFGDgDuau6HfpY3tzZSZaKUFVPXaR0o7MLmj4L8Hy6rZzXbMETlVBHORWbNpb2HiVbOaPcfMCj3z0Na/g7xPNo+t/ZXYmyuJNrI38JPG4V23inQg89tq0MQeSBgxH99e4pqKkrrcH3I7OGHRIo7eePytzbo5ccbvQ+leg2jiW2Qg54rMWztta0tCyghl7jrVvSrN7G2EDMSF4GfStwRfopaSgoKKKWgBKKWkoAKKKKAEopaSmISilpKACiloxQMBT1ptOFIB1FJmkJpABqM04moyaYBTWOBTXkCiqNxeqgPNMCae4CDrWNdahgnmql7qqnKhuawLq6lOSDxT2Ak1XVXRTtauJ1DWLklsSsPxq9qd3IVO4GuVuZS5PBFQ5MtIgl8QX8UpHnsCPQ1atPHd5asN8hYe9c/exszZrLlRhSuxux7HpHxEguQElcIx9TW7b6r9tfO8sp7CvnfzWTocGt7RfFt7pci5cyRA/dNO99yHFdD6T0y3hdMgDNaZ0+N02kcV574U8ZWupxKUkAfupNehWl6sqjmqsSTJaJHHgKOKw9QikFxhWGW46dK6TO5eKrm1DvkigZz0mgNNEMHk96a2hNGuATjIAA7V1ioFXGKCoI6UCsfF88kdpqNxHDxEsp24OcDNSy3tzqWZJpGk2DAzycVmkqwwvWvQfh9e6Jp8d1DqksMFy43RNN91hjpn1rGybA4aIKZVBbAJwT6Vav4o0ujFGcqnGfWotZkhfV7trcqYjISu3pj2qDzMIMHNKwFlIs4Gas3dibYAMc5Gc1VhfcnWpgd67C1SIhhVklVkPGafMzG4zkkk0BWjPBq/AkcckUsmD3Ip3KLOmy69DE/2Hz1gk4chfl//XVyysr1rsRyI5ZucmvYPDV9oep+EQtttBiTZLGRhlP+e9P1CysIdJiuLdFeTAKketEoSa0JZw/9j3FtaQM1q/mFxukxnvwc17pZQLc6XGkoByorPsYLS+0qPzAqlkHHocVrafEYYBGTkLwK2jGw0h1laLZwiJPujpVmiimMKKKKACiiigAooooASilooASkpaKAEooooAKWkooAWlpM0maAHZppNGajd9ooAVnAFVJrkKOtQXV2EB5rn7u+llYrF370wLuo6xHbxszOBiuH1HxNLPKUiyF9a0L60kkU72JNcpPD5d+Ex3ocuxSXc37FXmG9ySTVm5XbGc0+xQLAMelZ2r3EkSHFQgZjahMrbhxWC5jZ6o6trEySOFxWINalDfMoNIo3LyCNlJArnrsKuRkVJNqxkTnIrLluQ/OaEguRMPmNNPy0ocE02VuKoktWGpXGnXKz28hVh6d69q8EeOF1ONYpm2zDgivAy2DWnol7PY6lFPCxGGGR6imnYl6n2BY3QmjHNXGcKM1xPhPVftVnExPJArrLhmMOV9KbBCy6hHGp5A+tZNz4giXIV849Kq3WlyyxvIXcseg7CuXubZ7dypZjg1lOUlsK585ODvyOPpUkspmZWkxkCpGj5BIxmvQ9M8P6Jp1j5960bSyQhkaU/KwI7e9Jagc/4F8LxeKfEK20zYhRd7gHr6CrPjjwrFoniNbLTo3ZJEyI1BJBrC0jVtQ8O6u1/pkgQqzAAjKsuehFdVovj5ZdYuNR1yIvKwAQxJnA9KrSwHJwaVePqUWnLCyXErBQrjBrV8Q+FNQ8M+SblldJhwy9j6V3iWNlqGoaX4itC7yNMrod3YHlSPWup+JJtdQ8MuqLG8oXcFIwQaOTQVzxLR9Jn1a+jtVO3f8AxY6VY17RTo94tuJmkG3OWGKn0PVxY3VncPBIFt3xKVHGPXNbfjfXtM1SCFrKeOZv93DL9amysPqcxaXFxZwGWGeSNzxlGIz7Vo2HiG8hlQ+dJhTnBYkflWrD4ShXwt/aLSOzOnmAqeBVaDwffS6GupqP3bjKgDkilZj0PRfC3i6wvoEgnvBa3ZbGxzgMfY9K9P0ppDHtdtxHf1r5y0/w7dR31lFewvHFPIFDN717toAmsHSykdnVV+VmOTitISbWpKOooooqigooooAKKWigBKKWkoAKKKjM0YJG9cjrzQA+iohcRMhZWDD2OaI7iKVzGpIkAyUYENj1waAJKKKKACiiigApKWkoARjiqdzJtU1Zc4rL1CXZEx9qYGRfXG59uahjMarzjNZN1eYlJzWZLrBD7Q3SpbLSN++mjCMciuJ81bjV2I6A4qxf6mzxYDdap6Xbt9p8w85NTcDsIQBCMelZGrxmaJhnFasRAiwayNRmAVqYjzHXrV4pCfeueKA10fiO9Uuy+9cuZwT1pFDZeOKqOalklBNRKplcKoyT0qiQjPzAV02maSl6qhlzT9K8E3l7Esxbb3wBmuo0zSZdJuEjnHynow6GpYI5PVvCklsvmQg49KZ4c0pri4G5ehr157CK6t+QDxWXYaHHZ3jFFwpOapK5LaOh8No9jCin7oru7S9R1AJBrk7ZVSLHtSfbXtpcqeK0sQmd8PLkTAxWPf6Ilw4wMc8kdag03VROBzzXRRMJEBqWu5W58i+HdNXWdbhtpWKwk5Y+3pXrGupoOmeE5bC2a3WbYQIz8zE15NPex2V9eLbDYBIfLaM9PpVKHVGilkeTMjv/ABE5Nc8ZNXVhHoHh3w9p+u+FZPlbzoAVlUcEN2I9RXLjwyyJChfE0soQKRxgnGa6rwZ41sbTTvsMsRhnIIL8bW/GuX1W8ml1Q+RcuIxLujG7IU56iqbVkNXN2fTpfBLpIs8jpJhgP7rj2qxZ+KbnxJqUVleRRLFLlVZeDn0qj4m1qfUdItVuADOmA7DofeuXsbuW3vI5oyFZWDDPrRzWemwep0PiWKPS5m06O3K+Z8yspyOeuam1TRdP0nQImG17hwCzE859qo32p/2hc+fPEBxjiqs8n2iRC8jOi/dDHOKTkgOku7u6sPBENvKjR71wAG6g+orTsPGttF4ftLVo5A8ahWRehx3rmr3WJdTgjt5lUJHgZHU4qDyoSykcY60e0s9A0O7vddtNY1G0MSyIsJErA+3pXounakJ4o77gxbRhsV4FJJ5bq8bYI6FTXY6Nr+s6f4elUWxmtTkox6r/APWq1U11B6HuFtqEM8AkDgj1prapbKCd44968Z8K+IdY2SqbZ57LJ3FeqfT1+laarqAuftsUjvZyH95GeePUe9UpJiueow6vazH5ZFP0NXkdXXKnIrzv+x3s7qG+iDNE2A4B6g9672yUC3TBJGO9MaZZpKWkoGFFFFAFG/uvKgcqQG6D61wjeK4dGt5FnaOaQkEoXO/J56c/gR+lb+o6oEuJYlRnChkUKM+awPIB7Yzj3NcBfeCp9XvDdXaCBSSQiHn6nHensCVyaX4nWbsqLGqOvG9tylT6/Lkmqt38SJpUhPkh543b58MyFcHoRhsEgdelXIPCGlWvJhVmHfFWn06xChfJUAdsUtR8oyz+J0KyQs7SwCQjcjEuo5weG6DvwRXoOj+I9N1qHfa3ULOG2FQ3f2zzg5FeV6voVnLATFGqtjgCuOhafSr5ZLeSSGaM53A9x/nvSuHKfTdFedeCviIupyrp2rSKlweIpcYD+x969FpiFpKKKAIpOlc/rcm23c+1b8v3TXNeID/ocn0poDgL672RySE9K5o3jEkk9am1a7/dlAeprDkmIUmsWzdI2Y5/NIBNdJp21YweK4S1uCHBzW7Dqflw8GmiJI6qS/jjGN1czq+poQ+HrJu9WcZO41z9/qDSIcmncEjJ1WUyTsdxxmsdic1bnk3EkmqjdaaJY3mtbQbMXV+gY4GaygK6TwrHvuxjqDQ9hI9p8N6bst48cjFbWpaLBPDteMA5yCO1Z2gXDw26bvzrpDcRSwEs4455poRx8ZNlKYJD904zTjNHknIqn4luNsjyoa5uLVvMjJ3HI7UXsFjqm1dY32bhSvdCVMg15/JqEst5nJAzXS6bOzIATmmpCasdtoEbMQTXc2gKxgGuM8OzIcL3ruICCgxTYI+XvEngsaHoEN49wzzvgsu3jn0rjzYTfZlutuI845PWvSYJ5/G8f9nNdSeTEOmOlcr4lsZNFlXTy/mIg4YjBrljNN6aAvM53dtBBoSVlHU9anlkja1RV4YdRiq2MrjHNWBe+0tOVDuWx609h1XoeopulC3jvopLvPljrxnFXbmWO81AuPmjHA28ZpWsM2tE+xy6LPHMU+1ZwofuPatnUfAj6V4fW+lumacgN5arxz2rjokmEv7iNzjkADJr1bwXrkviS+itNQwILZB8rD7x7U0k9GJo8wtrG9klYeS4I/vDBr07Svhwk3hk3N1u+2SIWGOieldPr/h77VcxXNpFGBCwJ4+8PSu20yOM2CIQMEdPSqVOz1EeL6P8Mp5tNkubuZ0mJIVFHAx612/gzTHbRH028iAmgJTOOGHY13kdtHGhQL8p7UyGzigkLoME9atRSd0OxgaFoENhFPa+UFTeSMD1q7b6HHCksW0bGyRWzgZzjmlphYqW9kiWiwMuQBgVaRBGoUdBS0tAxKKWkoAKRvunJxxS1S1WZoNLuJEPz7CF+p4oA46WcR6g4glWQRjYJduCfX/6571YOqHYFdQfcViJKEyoPNI0rN0qb3NUrGrdtbyQbwwBrn5rkK5X071LJHMwz0FVLmFI48gkt6UrsqyZC9zubO7isXVrZJjvAAPY1dKsMls1Vu5EKFaXMHKcfOHtZyUYhgcjHavf/h94mPiPw+rTNm6tz5cuT19DXg1+R5p9a7P4Raqtr4olsTnbdxHH+8vP+NOLMpKx7pRSUVZJFL0Nc1r4zZS/Q100v3TXL664+yyKe4xTQ1qzxDU2PmHPY1lyyfIa3dbtWUSSDorVzVwxArn3OhkscnHWpork7etZQlO0ipYpatGbLNzIWzWLdFjmtSR8is64xgmmK5lyCq561Zl4zVY1RDFFdF4WYC864Oa5zOKs6bfNZXiyZ47ikwR75ptyVtTzzis+48TtHJ5LMFzXMWfiuBbP76g49a4zVtfmnv8AfC/yCkrh6npmoajHcw4LA5rHs7cPI+Oma4211ySRwrMc12+gt5i5PemlrqD0RFdWOxt4FWrCUoRzWpcW4eI8VhlvJmIqrWJvc7vRrsoysCc13djqMnljIGPrXlejXoYgZ5Fd/psgeENjJ9KbEtz548M3t5YawLi0LbxncF6Ee9P8T6k+q3oklxv6UeHNWh0y+b7RHujlG0t3WqesCOTUpGhIKE5HNcnL71x9DM2849KApFWjb4QGk2AYq7oQ2OMkDipWVrZhuUj61LaSpDcKzrkA5xU17FPeM0sMErRj+ILnH1pDNjw7rVvprTPcg4dMK4GcGobfVZUvpbizmeIsxO5ODiqOi2sFzdmG4cKuwlQxwCfSm+X9mu5FX7oPGKfQZ7tp/jvRE0u3gkvYy7KAdx5B96118SQx7Ht5I5Yj18twa8O8N+HbzXb8GFCIFYCR/SvYdB8GwabesFQ4ZOc81rGTYju7C7W8t1lU5BFWqpabbfZYNnpV2qGFLRRQAUUUUAJRS0lABWVr8oi07LHC55/KtWsfxPA1xoFzt+8g3/gOtJ7FR0aOAiXfP14J61ZkVIm4IPvXI33iuGzYwW0UlxIvB8sdPxrLj8bxyylbkGDsNxz/ACrNNpGt0zrdV1yCxjJkkVFUZJJrjLrxwXci1hZx2Zuh/Cue1rWhqFyXjVjGOjOOp9QP6mssTSlGZFI+pxn8aavuxN9EdO3jGdgRJa5bsAcc0Lf6xck7LK2QH+/KT/IVy0RuZWYhg2ASRjOMc16DZQEQgyZLEZPGKmQ47HJ6ha6l5ytPNEoP/PNeB+dbemxXGkOs1rOUvFAKzoMMB7elW9RhWWMjv1qjNcyxNFIhVo9vIPXNS3oXGKue8+Cdfk8Q+HkuJyDdRMYpiBjcR0b8RXR1518Jgy2WrDGE89CB6ErzXotbRd0YTSUnYZIPlrldehMlvIB1xkV1jdK5/WAPKbjtVolbnkOqASWlyrD5sVw1wN2BXe6zGftEqr0Za4SYbWIPY1zI6pIpFMA1BDLhyD2qzM4VTWZHJic/WriYyNY/MtULlWyRzWrAA8XvUc0asM4qiTnpFPOagK1p3MYGaz34pkkLVGakaozTEGTRmkooAmtziZT716f4ZbMafSvLYziQH3r0nwtLmNKFuD2O0Me5DXPalblWLAciumTkCqN9AHB461oyEzC064Mdwpz3r1HQJ98S4PUV5KymG4K9OeK7nwrqHKoxpLsU+55Dr9jBpuptbQFtgA+91zXefDnTdHufD97PcJDLdKSCJMcLjtXnmuadc6Zq81pdT+dJH/y03E5H41nLLLFkRyOoPUKSM1gtGI77w5pFtrV/PaAoCZWAPoue1bevfDEW9tu01ncqMvJK2B9MV55o+o3VhIJreXZIhyGHY17H4G8cjXVez1ONRPGMhycK/wCFKPLsxnO+GPh5Hc6NcXupwSCTkRr0wPWu/wDDXhq3i8FqjRL5jod5I5NaNzq1qbcxRPh3+VfQmqUWrXmk26W11b7o24Dg9qv3Y6g7Hn1x8Lrw28t3HIobJKxEdfxrQ8F+Bob/AE+6a/t285XKbWHIxXsOn+Vd2SgrwR3qe0sIrRmMYA3HJoUEgOI8DeG5NCuLu0kAeFpN8bY5+hrvxEgIIXkUCJFbcFANPq0rbDCiiigBaKKKACiikLAdTQAtFQtcIoJzVGbUlDYzQBp1yPjbxBqGkJaWVjp0s7X5MXnLH5gT1AXIy2MkAkCt6G+D9DVfWootS017cv5cgIkikHWORTlW/A/pmhDR85eJYZNH1GS2EV0qSHfELmLy5Ch9V6DnPI9K5qNJHlYSYHBOOuPxr1X4gQw6ikFzKvkX8QMc8BJz1+8hPVT2I/nXCx6Y8i+XEuPMOzeegzxmoejLjFs2Lzws114S065hAF0sCuT03ZGcVy0UUbN5briQcFcHINejXuv2trpgt4Ss32ZRGVBBJ2jGPrxXMT6h/bPlSw2UlrcK3BwAcd8kdqm66GvLcj07SDIw3RlI+4IwWHp7V00nCc03zHjtFMmGb1FU5brg/NiociuXsR3J3ZH4VVtFgaZVkKq4B2lunvTg+/mktAVn3qcFWDL9RSQj2X4a2q23hdmBLPLcOzsRwSMDj2rsKpaRepqGj2l2gAEsQbAGAD3/AFzV3NdC2OZu7A9Ky9QhEilSM5rUqndEgZxQxx3PLtd09YNQP91uleXaxF5F9PH6Oa9k8ZbYoknHZgDXj+uOJtQkcd6we51PYxHUuazT8kx+ta+2sydP3xq4sykjRtrjaoqZpd3asyHIIFX06VRmUrzOcisyTOa17oBqy5V5NNEsqtTTUjCozTEJRRRQAoODXeeE5shRXBV13hKbEgHvQB6vDzGp9qbcJkUWZ3W61PIuVrUzOU1S22vvAq1oUxinXmrt/b+ZGeKzbBTHOB6GptqVfQ47xW1xNr9xPdJGsjnIEZ4xWDtJPSvS/idpLp4haWKJBEsYyy8c5rmdC8J6jr9w8VpDwgyztwBWHWw0c/seEBgcZ9K2fDupC2voROcQbwX9cZrdtfAt+3iCHSLxdpPzM6nIC9zW74k+GUNjNbLpbzNJIwVlfkAdzmi1wO8t307UtU09rR43jT5wyHI6V2l9pEF7bbGQHI6VyOj6HbaNpsSW0W4pyXB5z3NdlYXyXECkHNaWATSrVrS2ETfw8DNX6OtFMYUUUUAFFFIzBR1oAVmCjmq0t4iDrVe8mO04Ncxf6i0bFc80gOhk1VF6sKzbvxBFHwZBXIXFzdTE7QxqCHTLm4lDSkgehqHJ7JE3OqGsPOPkBx60IfNbc2ahtbTyY1UHJ71dW3JPWrSfUY/zBGnyHmqMt9PK+xc5rSa0wnFQwW4SU/LyaBkEuntc6XOsi7ztJ+YZrzi9jXcsIGCGAP517Zaw4TkV5j4x0CTS9YM8Sn7LPloz/dPdaznHqjalLocnLY2FqZJSkaeYckkZyazZ9YsLdyqluDgYFWLnTftsgmvZ5PIA+WJG2/mf6CqwjtfNKWdpz0L7efzNTobIjh1Ke8DxwxS+X13FcD9aiu5Np2jOR15ra8hre1JcAE9vSudvpUEhANQwuTpc7Uwep6VZtnNY8bk/MfwrRgbAFAFxvG+teHNWsXtL+c20Oc2bN+6dSecj8+a998PeILHxLo8Wo2Em6Nxh0J+aNu6t7/zr5Q8QTh9WIB+4gB+vWtbwf4uv/C+pC5snG1htkifOyQe49uxrojscst2fVwqC4TchrzTT/jHDKB9q0zHqYZf6Ef1rt9L8T6ZrdsJLaV1J/hkXBH9KoSOP8dwsNIkx2Oa8duvnfJ9K948Y24m0mYDn5T/KvCLhdnBrnludf2SgRVKSPMtXxyaY0WXzRcm1yKK3yM4qSRNi1ftouORTrm3BQ8UcwOBzssuSRVOXmrdzAUJNUicitUzCSsyBqYRUjU3FUQMIpCKeRTWFADcV0PhmXZdAe9YAFaejSeXer70Ae1aW2+2H0q/tytZGhPvgX6VtAdq1RmynLHuQ1jiPy7v610DJ1FZN1HtmDe9AI3vHVzaX2lSCPyHlJHAIyDXR+AYYE0pA0AilKjepHeuc8ZeHGtYrWe1i5iIJAHWu60eyP2GCdF2uVG4Vgr8zuWtx82ixLfy3oUb9m0GuftUuxFe3t4SQrERAjooru8ZTBqjf6ek9jJAowG4qwsclozXk2gSXBTLylmRfQdhXRaFbSf2dG0yBJsfMB0zV7T7KO1skgCjaoxVtVVBhRigLCqMCloooGFIzBFyaWqGoM+whaAIbrVY4cjcBWRceI4UPMgqlcadPdTYYnFR3WhLFbn5ecdaWvQWpYfXYJUOJBzWTLNHdXCgc89arQ6I7bnc4UdBTY7eZbkKinAPWovLqK7Oms9PVwOBirR04K2ccVV066MOFc1vx7Zo8g5rRFIxfL2yFUFaEFvnGc1PHAu/pV1fLjHagBq26lBxUX2MBs4p8l7HGDyKzptXXOAaANdMIME1X1CwttVsntbld0b9x1U9iD2NZ63UkmDzVq3lZjgmgDy3XPDNxotwsV0d1kSfLuFXhvY+hrGkns7EfKFNe7SwxXNu8M8aSxOMMjjII+lcRq3wv0W7R3tJp7OTkjLb4x9QeQPxrNw7GqqdzyHVNTluDtjB21hmORmJbrXRT2JgmlhzFJsYrvjbcrYOMg9xWfLAd+MVm7I1SuUFU7gKvRusSF3OFUZNOitwCeKz9dkMGmSKODIQn+NQtXYt6K5ys87XFzJO3WRi1SxMUUH3quo5qd+EQf7QrqOI1bOUiIe5zXp/w+vnB2E8E15XFwiYrsPBuqfZL9YywG496UtjWi1zanteqx+fp5HqK8H1mLyLmaPurkV7xby/arP14rxXxfEItbulxgZzWLOhnNQnJNXEiyBxVW2XLVtW9uWA4qWwihkMWBU0kYKc1bW2IHSopk2qakuxyer4QECsKtnWm/eYrGJz0rohsclTcbjNIVwKcKcR8tUZkHekYUv8AFSsOKYhgq5YHF3H9ap1aszi5jP8AtCgD27wxFutk+ldDPblDnFZHhEB7SM+1dXeQ/uwcVcWQ0YTL81ULyHOeK1ZUxzVadNy1RJ6pe2UV5FsdQamgiEMSoo4Ap9KKzNQooNFABRRS0AFFFFIApjxh+tPopgVxaoDkCm3FssiYxVqigDBnsAQVxgVnTQR24OBj3rproqqEnrXEa7eOrFYzSk7K4MhvLuPOUbkVqaLqgePazdK5aCxurnLFSB61ftraeI7FU59aiLb1ZKOsfU0jB+YVRm1oZwD1rIWwu7icAsQvetWPRcAbhmrK1KEl7cXEwVMkGtaw01nAaTk1btdKRMELWlFH5T4phYIrVFXBAp4gVTkVOeKx/Eev23h3SJL64+Yj5Y4weXbsKAHa3r+n+HrI3N/MEH8CDlnPoBXhvivx7qviu+GnW7NbWbNjyI2+9/vHv/KsXxJ4jvdZvpb27lLyNwoH3UHYAdhWXpMv2TF23Lglhn17UgNHSrmU+Ixo8a+YrlkTHZlB/ng1rXcDbhtUZp3wr0saj4kvtSmXItUXYT/fYn+gNeo3Gjabcz+bLZJ5vcjIB+o6VLpc2qNIVeXRnl9jp0052xxO7noFXNc5480+XS5rK2mKiSRGlaMc7RnAz+te+pbxwJtijSNR2UYrwP4lXn2zxveKDlLdUgH4DJ/UmmqKjqKVVy0OSjXn2pks6uwjQFmyOR2pWjMi4UkDPIHepII1DgKAAKZBdRuD7YFWNPuDHqMDA4wwqnC3ySH3psblJQw6g5oGnZn0r4cuFmsEyeq15l8QIQmvOR/EtXfCvitUskR3wwGOtZXi7UE1C8WVTnAwTXO+x2LVHOWMe6QfWuu0603DpXM6bt84Z9a7XTJI1AzUPcqJK1kAnSse+gChuK6Z5o2XAIrA1Nhg4oKPONcH70/WsbtW9rSbpT9axzFxxW8NjkqLUiHWnn7tAXBxT2X5aszK6rlqfImFpYl5p84zwKBFXFTw/K6n0NMVMmpxGQKYj2/wRKHsouewrvpo90APtXlvw8ud9oik8jivWEG+2/CqQdTBni+U1Qdcr9K25Y/mIrMmj2yMO1WZs9PpaSiszQM0ZpDSUAOzS5puaKAHUZpM0gYGgB1FNLADJpQcjNAC0UlLQBQ1Efuia5qPSjd3JeQcZ4FddPH5gwaZDbKnakBTg0tEjwFFPXTUDZwK0hwKRnC9aYGdHaqknTvV4IgHSq7yqJetS+YrLkGgCYKAOKim4ZTSLMM4pZcNHx2oASa4jt7eSeZwkUal3Y9AAMk189eNfF03ibUw4ylnED5EZ7D1Pua9J+LGrtp/gv7NG2HvplgOD/D1b+WPxrwl5Q9wc9MGkBVvX4Az7mn52wqn90fnmqzHzFMrHgkmpYSXjZ26k0AeofB1GWy1Z2UhXmQq3rgEH+dekuOc1zfgHTxp/hSxXbh5YvPf6uSf5YrpCcnFbRWhJDJ2B6dzXzJrV19u1u/us5864kf8CxxX0frtyLHRL66Jx5NvI4+u04/WvmdkJG4c46+1TU6AhqcJUULkyTsegwv41KfljJNQxjbbqO7HcfxrMotRcW7H1NR9807O22H1qJTkUAXYLh4TlWIrWikaaAMxySK553wDitzTn32w+lZVEb0n0EjuPJl47VePiFrdeAc1mSL+8NVbgcVKSZo20dRZeImmYAk81pzy+dDv68VwdpJscGuusLlZbfaTwaUo2HGbZzOsZ8w1ljhDmt3XINsuR0NYxjIWtI7GU9yFVy9TtCdlRxLmTHvW3DZtJGcqelURYw4o+aDESTmtFrUxuQRQ0BxwKLk2M+KDL9KsvBtXpVmGHDdKtPACuaB2Og+HdzsnaIn+KvcbFt9uPpXz74Sf7LrQXoGr3vR5N8C/SrWxL3EmTEhrOvIsENW1cJ8xqncxb4jVpkNHZ5ozTS3HFNEozzUFElJRnNFABS0zOG9qdQA6onBX5h0qSql3MSfJTqetAEa3P2iXaD8oNaC8LVWK1VIx2b1pwZozg9KALNGajEgI607NADqKSjNACk4FZV/ctECRmtNmAHNZd4UbOaAMsXxdhnOasJcSsOOlUZgBIMDgGr8U0fldRSTHZrcQXzeYFIrShnynJ4IrFilia6ZSRyOKP7RijkaLeBj3ovqVbS5wXxunYQ6Gg+55kjH6/LXkLSEmXH8KGvVPi5Ml7oljIjBmt7ghsejL/iK8mQ5S4/AfrSvcliPxaRj1NWE4gYe1QE5ijHoamziJvpTEfSenRrBplug4CwxqP++RU4AZsjtXO6Frz3ml2bZtZHe3UmPeUYYT1IwfXrwKWPxJM13JEtgAsbLG7+cCAzdMeo4PStiCD4hz+R4I1Js4LqkQ/wCBMP6Zr5/DlH3LwRXrHxG1433hqOKOWMRzXWVi2HeUXOGJ9M15N3qJ7lIS8MbQDYNrOcFe34VCetLMC1xGoHCgsaXA781Ax83Fsv4mqn2gKuO59KfM7MMM3HYVSYH8KALRfK1t6O5aHFc8hyK3tFYbT9aiexpTepfeP5iaqXEJIxV6ZgpNVxIGPNZI6JFFYWUcVesLp4xg5qdVjK9BSpaqzZAq733M7WHXrfaEWs97Z5MIikn2Fblvp0kzhFUnNdtofhhFAd4wW9SKqMWTKS6nK+GvCRlZZbmPJPY9q7OfwqkUIaNBjHTFdbZ6UsKjC4q/LCpgK46CrsRe54drWkNbTsdvFZPlACvUtf0sTROdvOK83vLd7eVlYEc1LQygqgHpU5I2VXZsMaQycYpAT6ZJ5WsQsOOcV7r4en3QJ9K+f4ZNl3E3o1e1+Fbrfbx89quJEjsZhmq7LlSKnJ3IDTAKsR0ajApGRT2waWipAjL+WQDUmc1BdqTbsR1HIptnN5kK560AWGGVpEbcKdUDHypf9k0ASyNsjZh2FVLECXMp5JNXCAykdjVKzIhkeInGDQBfLBRzVT7UjzFD0p91JiAleTXPzXJSQPux65oA2pyQhaM5x2p1peCSP5+DWfDdrJGGz8uKp3V4gzsbaeuRQM6SSYIgb1pFuFOORzXMDXoWs2WSVVdPU1z+o+NYbdVMDeawPRTUuSW4ro9Au51RfvVgXeqRRKSzjFcTqfjie5tlNuhRu5bmubutenmQmWQ5rOVVdAUjvD4kt3eRfQdTWLceKJG3rC2O3FcUL3cjOGP51HHekD3NY8z6FynzaM6N/E1zalm3kse/pWMnim6N08srsxbjrWTcXq7yGNZ8s6pKCTlTStcltLRG9rmpG70GRGJyXU8/WuRh5Eo9QDVq81BZY2hU8Yzj6VWtsOQR/EvNdMFZCDH7tfrUn/LI1Hn90cdjTz/qasD3TwXbmfwppc9xL9oiNoFETwrhccdep6YqvYW1pfaJeXUN/FI63gcsqsqKw+XBBGT1P41P4BvET4dWMsjELCrqT1PDmsLTpZ38XWjyNcWOn3k/mR2zEHzCpbH3eFXkZ9z361stiCh8S7S2g0TRjAwfc0gRgMZTqB+Ga8sOc4r0zx/P9ovbCyYgfZRNGV99/Bx2+XFcJe2DQjzcfL3xWc/isWloZIb55T1OQP0puecHiiFsqzerE0MOakBjAYyOvqaqTdauEYU1UmILfSgBIueM1t6WpVWwe+aw4iA9bumyqpK55IqZbFw3L85OM+tUHcqavz/NEMdRWdIpZhioijaTJUuWyAK63QNJlvtrMp21meHNAk1G5UlTsB5969o0TQ0toFAQDArRRTM5SaM3S/DyRlTs5rsLLT0iUcCporZYwOKtJgDitDL1IpECrwKqryStW5jxVIuFegZQ1C0Dg8VxGt6EsysQvOK9AuJAwrJuYQ4PGaLCbPE76yktZSGHFZztivSfEGkrJGxC815zewtDIyntWbVik7lbzMSA+9es+DLvdbRjNePM2DXofgi8+RVz0prcT2PZIn3RA08HmqNlNugHNWA/NWI6dnCjLHAoDBhkHiuK17Xbi4lgt7AKzSNjO7gDua6yxJW1jSRgZMDNRcCyw3KR6iqFlxvTujVdaRVOCeaoLKsepsvZxmmBdmmEUDSHsM1QXVLe6tSyOC3bBqtqeqwgNbB1V24rjmurbS9VjDz7YmBymeM+tJuwrnS2OtT3M8w2lUjbbk1LNef6Wkobg9c1zN5r9pZRvNbzxEN1571yl/41kdTENpJPBBxS5kgPUv7YiXckrAe5NczruvQQyBVdSTz1rzG51+d3dDKzFuetZ0uosyZdySfU1m6r6IZ6JbeMFCyRD5W7HPFYV54vvGmMSkdcbhXDyamY8gHj61H/AGiWYMDk1Lc2gOsuNUd0Jdjk9azjfB5CQ3ArIk1XehRuDS2gWW3lfd93sKz5W9xWNd9Uj8vburPutQE8fykjHasO5m+cbSaa9x5YHPBrRRAvxX8gkCds9KvT6lGMYPNc+tyAN3emG635Bp8oy3e6hvf5T1qBrhmjGTVIDfJ1p7DtmqsgLVunnSk552k/pVjT25IP8LfzqpbSi2ZnbJwuBT7STFzx0cYq0BaB5Zakf/VCo2G26wehpxbcmaYHsvwzhS/8GC1uo4prdZnzE65yDzXUXGlxXNlHHJbRs9u37hY28sKMjAz24A/KuX+F5MOiLGRw4WQH65rvCMGt47EM8a+KNvDYeI4J4owk1wryTMrE7/mwDz0OB2rlb7UY30dwMbsV1vxfIOv2A9LTP/j5rzG+mxbFR34rKa94tPQitv8Aj3X86f3psAxEv0pSe1SArN04qtKOCcc1M+aY4yPrQBVRSzgVr2iGMq3p1qnbQFnq9cSra2x/vHgCpl2LiramrGd7ba1tE8OSaneAbT5YPJrC0MPdtEOpPBr3HwppcdvbIAOccnFCjqW5aF7QPDcNjAiqgGK62G2WNOlLbQhUyakduParuZ2IJCAeKjD4qOeXB61Se62800DRekcYqhKRvGDVOfUlXOTVZL3zXznimSy9ICOaruflpJbxQuM1Va7XHWmSytf24kjIxnivNfEmmFJWdVr1LIkWuf1rTxNG3y5pNXBOzPGp0Ksa6LwjeeVchCe9VdZ01oHb5TiqGjzmDUF5xzWZoe/6Tc7ol57VpCT5q5PQLrfCnPauiMnIrVGY7TfDjWFmlxIyyXKfMSOg9hUtvqtwup72ceTt+6PWue1D4j2tqWVAJFZeAprz6bxbqd1eSyJKYosnC47GseaMdEWot6I9h1TxNBbSiQzDb0NZn/CZafPcJsuV80cbScV4zdatO8jOXYk9yazvtAaTzC3zHuO1L2jHKNtzvvFPihzqxki+RojgEHk1zN54huL5XaeQsexNc/PdDcctnPcmqUl3kFVqGmyDWk1F5IeHOPrVFryUNkOazzNtXAPWm+YSOtNQsBorqLpJv6nGKFvNyybj9M1msCvelVTIAoFVYZMJDI2M9aYfNhk70jwPAA46U77TuI3DkUATTElVfvjmkinljBIYgHrimmcMvShWWVMA80hXGFsnrmopdx47Usn7qTA5oVwxwRTGNV9g2tTsr1pGAJ6UGMn2pgLjHINNLHqKUI3IqRYMIDnmkIaJlLKD34NODGCYHsDmoUUfao9/3dwzVieZJ5pXQYUknFUhmnd8TxMOhANB4QgdqheQS2Nu4OSqlT+BqVzlCR3GaYHsXwvvY7jRmt8jzI0AArvnJZVYdxzXlvw20+W2uYpudrp8w9QRXqQwGaPPuK3jtqQ9zxr4tk/8JBaf9eox/wB9tXl1/wAFEz1Oa9V+LkR/tvTmP8Vsw/J//r15ReHde7R/DxWU/iKWxYQfuxR3pU+7SHrUjEPSmqN3HvT8ZFNUhZOaANexs1YA96ztTjLXhj7LxWpZzqqjmlW0N1eGQDO41F7M1tdWNLwdYt5wJHGcivc9BQJEv0rivCugGOFGKYJFegWloYVUVa2FbU3InL4A6VK6/LUFuwVRUrvkVI7GfcRZzWNeIVB5relOaxtR4Q0xnL3bkMeTVUXjxCp7oZYms+Q0risTPqLHrTFvmZwSeKqEZqNlI6U+Zi5UdJb3YKjmpZmWRMVzMd00RxmtCG93Dk1SkRKNjN1zS0niYgc15rPbtZakARxur1q6kEiEVwPiK2HmhwOQaTCJ2nhifdCnNdiSdoNef+EpcxIM16Ag3Qg+1XEiW588tdOG3ZyakbUNynjHHNY7Owc5PPpUL3DVgom0alnc1pLwSKRnms03Th6hJJIIPWoyx3EU1EmUnJ3ZYebeh96hRWGfemA81LvAHFUQMIIqRX2gZHWmqfMODUjAFQvcUgEZiV60iTsh4FLKmwhfamxpk89KALTXG6LBqBIzK4APFNdSzbUFETPE/IpegEyssTFSKYPlm3DpSujM4YjANSsq7PpQAMUJycUyNcvntnFRv0yKRJWQj0osNF2VVjPI60wlcrxnnmgOZvvcYqeGAFgT0zU3sOUk3oPkhATK4qr8ykntWzqaRRRKIsdB0rKJ3ptxSi7oRW2A/vZThM4X/aNNZWcYRWVT/shamkMzLDbxD5uQD6d6PKZDsTG7++xyTWqAdao8cEkbDABDDn8/6VfT5rfJ/uVnxLJHcMjOGyp6VbRyLf6Zpge4+BLVkjjy33YxXazKAVcE5Fcz4DKT6TDcKOJIwRXYSgcDFbkHj3xgUi60qVehjkH6ivGgfMuGb1NezfGlhFDphB5Cygf+O143Anes57lItp92mt1pyUN1qBjQaY3XPpT6FXc2PWgDS021edwBnFd1oek5njyvQ1k+HrVfLUkV6DpFsokTtUPVmy0R2Gi2QSJeO1bEsQUjHao9OQLCuPSrsiAgmrJRTR8CnNJxULDBNQvIQaksnZ81lakcpV3zOKzr9sjFMk529XalZMh4rZ1D7lYr1IyIdaftyKZ3qRTximgZUnXHNMjlKnrVidMiqByrYo2EXmmJWue1ZPMBrX3ErWfeJuBpsixY8LvsYLXpNqQ0FeXaLJ5VyB716Vpsm6Ic9quJElqfM0koYE96gLYFSOgMe8dagqEMcrnpR1OaUACkbg8UCFC5PNSSIoUMppikbcUK2GyelAClSAGqVCNnPWozJuBXt2p5GEyKQBv3Ek0iEnNPgVGO4miVCrYU8GjyAYsxSUEdqsvIjgSAVWEWELNSjlcDpSYD3ud2BVkJutQ56mqqwhmAq0LgRQeWe1J+QiuAc4IwKSVct71J5glcAd6kaFozl6LjGJu2cdqmilfjJ4ppby4iO5qNZcIBjoaNwLcok27jkrUcM0eCp61r3FxayW0aoRhgPwrFurfyZNyj5aiLvowJIXyJGXlmGwVMtqIwCzfO3YdaNP8AKW2aQjc+Tx6VbsrW51C8jghAaaVtqA9B6k+wHNbLYZZ0rwxqGqK0tpAojU7TJIdoz6Anr+FbVl4BufMC3t7bxxg7n8oF2wOo5AGa6tPJ0TS4rdd7LEmM4yT6k/Xk1yeq+NUjk+y2kEs8rYGSpXr+pqOZ3sjdUkleR6x4KNvb6ZJDaxssEMm1NzZOOvWumluFVM55rhvB1xttJU3c5UkH6V10CNIQ7/d6gV1paK5zyau7HkfxqkaQ6NH3fzT+Hy15coAwK9b+NluRJo0207dsyg++VryMADoDms57giVaax5pwyDQ1QMbUtuuZBUJq3ZrmQUMa3O10VxHGua7LQ53nuRtBIFcRYgrEAO9ejeD7NpAGA4rKOrN3ojt7GUpEAeuK0FbclQi2CKpxyRUyJt+laGZWlTrWdNw1bMqfLWTcJgmkWVi+BVC8kycVZkbFZty+WNMko3pylYxGa1ro5jNZR61JREwxSKeae4qE8GgCYjctZ9zHg5q+jcVFcJkVW5OxRjOeKbcx5Q1JGu18U66IEZoJe5jWreXe/jXouiy7o15rzYNtuM+9dzoE+5F5pxJmj57LEjrQqktigjmpEbaPekSRt0xQo3cU4DcpJ65p6YQE0XAakRLe1SymNE2gc1EJiGzSM2/JxzSAZTiWIGOhoijLt7VM5AxgUwIRujcetXC25BkYNVur7/SpGm38AdKT1AWQhCAeaBhxgcEUDBOW5IpGlCPlRQBKkgUcDmosGQkmrKWu+ISg8nnFMJVaSfYBsKAuDnBBq3fyFwu2qMh5BTg1qafby3K7wuVXk5pS01AzC8jEKwNW/JTyt2RmtS/ktfsgRFUSrwRjrWPGrnhs4qU7oCferR7QORViWVDY7SvzCobSOJ7tElO1T1rY1iztba2CwHOeQc5zUtpNIEY9o6m3Kjg7smvR/BGnpBpUmpMgMtxKYYzj7qLycfU/wAq8wT93z2Jr03w1qGPB0IjYFreVgV7gnPNaSdka0ldne26WD2vl3qAc5DY5xXP6jZ+FrbVPt1vZA3S9JGdmI4x64/SsK61fUrg4AKqOACMZqmYLh1Ml1dxQD0X5jUc3Y6LdzZbVkguFkhYr8w/ImvTdGvop7RZCRkLliegFeILNZxu2JHkJGNznAr0/wAJRyXWhwbyQJ/mY+iDp+ddFGV1ZnNWjZ3Mf4sRy6p4ZS9jjxBaXClSRywb5Sfp0rxInFfTfijT01LwvqNgq/ft2CD/AGgMj9QK+YXJzVzWzM0OByaU0xTT3+7WYxnWtDT1zKKz1HNadgMOKUtio7naaPYzX00cEIyzfpXtnhnQ/sVrHH1IHJrhvh5ZAJ5zL8zd69islVIBSgrIucug0wAZ4qsU2k4q5O4UVSMmTVEIZKvyVlXKda15OVrPuFyDUmiMOZOTWXdLg1vSR9eKx71PmNMDGuD8pFZv8RrSuVqgRhqkZG44qu9WmHFV5BQwRGr4NSMdy1WJwalRsiiLFIhYbXzVS8l+Q1ZuW281kXchINNkrUou/wA4PvXX+G58ha4twetdF4dn2sATRDcJ7HkLDgetNJORUpTGD2pPLG7OeKLmRFk81bktmjhQsQS4zxVeTaeVGDViG65RZeVToDQ79Bld4XjOGUj60kbbc5qe5m+0SZAxUGAKE7rULEqltvHFCpvRmJ5HYUq8cHvSBdrZ3cUEjBwKkVRn2qJjlqk80AAYoGIw+fC5JqS0tXupgnrUtnKkRk3ryw4PpSwzfZ7jeO9Jt9AL+kvDbXUkN1jA6Z6VnXrJJeP5ZBX2qw8AmlMwbrVLysSHHSpitbgAOzOav6dfzQBlA+UjBqmykOCehqXO1eKcldWAsP8AvJdxPWpZlMS5A4HftVe2Kvnd+FblxcWz6KsYAEijGPeobasBzgLO2elaDRSfZRIz5GMgVRKFl44NSLJKIDGW+X0qmIiLb3K+tb+g6v8A2PdG3vB/o0xAY9gT0NYcaqr89atTBbqJVbaGAIBPf2o30KjLld0dzeX94V8qGAGNeBJ6iqdvp5u3LX10I4+pCnJP+FcxputbI0s72VgsYxHIfT0Nb1tNZSndPc4i7BMZP41DTTOxSUloX5k0SGNo4oyz4ILsxJFekeB5ZW0SN+TGAEiHqAOted6PplhrmqpZ2SsFJBlkL5KpnmvZtOsodLso7eziCxouBk5P510UU9znrNaImaGeUZIAFfNPivSzpHijUbE9Ip22/wC6eR+hFfSss8x4OR9BXifxZ08W3iC3vVyy3UGGJ/vKcfyIraSvExR5+BQaaA7c8AUuM1iUKnWu28FeGptbuhIVIgU8n1rjIky6j1OK+jfh9pqW+kQKqgEgUWGnY3NJ0b+z4FWJQAB2rdivCoxnp2q/5KrBjHOKwbwGJyy0DRfluww61CsuW61z8+oGI8mrdleCUDmgZvFsrVWbmnCTIpjnNSWilMOKxb1fmNbkoyDWRdr89AGFdJxWY4w1blynymseYYakNEDCq0lWW6VXlFICjIcGljamzcGmRtzREUth1yMrWXMm41ozv8tZskoyabJRVljABqbSbjy7kKD3qnd3G1T61T024Ivhk96EDOOBLAHnFSR20s52xgknsKSNswbR1zUtvcNaSl1PbGKHfoZFaeFoJDGw+YdajwaurFPfyvKibiOW9hVYkhiuOaaYCB8MM9KlKxkKT361BjHXrUgUnAzQwuLgFsg4pFG4t1wKTbkhR1qysPkph8888jFK9gKpwCOKeuM5AzUxWMxNxk9jTYHVSBincB4U/KzAgGpLmNNwKjiknZtowOlRNISBUiJvMMS45xUQkDKfWmOzScVKI0ROnzetGwEbsSox2qxEu+Mk9RVaUMiDinQzYjOaYxHd4peKuJcCWHB6jrUcUUcqb2PNQFCJfkPFLRgWtwdlHTFPl+5xUTrsxt5yOaTJK/MeDxSEMdSF3A0kTNIdp6U6RduQp+XNLCAn40+gxk9upTC/eHSolj/dIvf/AOvVsFC5zTo4lUgn7qiqixnU/DIra+KZJpcA+SyqfQk17rYKTAZGmYNnqTxXzLaPeDWIP7PWR5pCAqRjJb2xX0joOm3f9h2kWosFuQuZFBzgntmtoPoTJE13fSRHYCpOOorz/wCI9nNqHh37WQSbWQPn0U8H+lemjSoM5PNR6hpNve6Zc2TqPLniaM8eoxWm+hK3PlhVUckZNKetT39tJY3k1rKNskTlGHuDiqm7mudqxoWrXBuos/3xX014NkA02DHTAr5ghbEqH0Ir6G8C33mabEM9hQB6iJAUrOvYQ6mljnO0c06Rw64plHF6pAyufSotMuGSTaa39RtxIh4rBjh8ub8aYrnSwSblFTM1ULZ8KKtbqzZqhH6VlXI+c1qMeKzJ+XNMDOuV+U1g3Qw9dFcD5TXP3n36lgioelQSVOelV5KQyjPVUPg1bnGc1SYc00KRFPISDWe5JzV2YcVVcAA1LEjMuzhSTWZZzbb0H3q3qUuAQKyYWIuEPvVITMg7s5HSnZOBkdaljgMiL8wGTim3C+U5iwfl7kYp36GRNaXT2zNs5DDBBquWCylj1JpEcICepNMYHrStqAr5ZyccUqvsp0eSmKVY9wzimAqEbw46irepSmUq5+8RzjpWfu2tirMebldnJIGaTWtwIfN/dBQKjV9rZNWWiATIHI61A0ZxkU1YDdsjHdWjgrgAfe96xbkGOZk7A1asbzyoWhPBJzmnXNsDukLZHb3rOPuydwKA3DBBqzGd5x3qFEJfGMD3qzFEMkjrVtgSRqZH2Fd2eBgUS2oDEY247UkMrW9xvGMjke1MnvTJKTjANLW4dCRUQALnrUq2ybW+bmqcX38n61PI4Q9aVncBNm2QZORTJsBtqcg0wPn5s9KWJ90hNOwCmGRlwKYJDC43dqtefkHaOQOaozAs1CAvTIpUMlNuG2KqA/wjP5U+yQPCwduQOAahuSTMQPpTiM7b4Vm3HjFDOQCtuWjz/ezXvR8gp5yzjJ6rnpXzP4X1AaX4psp5B8g2h/YHvX0bDBbTosq4ZSMjnit4bEss/alHRs017wY9ahazjU/KSPbNJ5BB4FaE6niXxQ037L4oa8Vdsd4glH+8OG/kD+NcNivbviho7Xvhn7Yq/PZPvP8AuHg/0NeJMyr3rKotblrYXOK9g+HWqA2qRluRxXjLTZ6V0XhPWpNPv0UnCMagZ9PwTB4xg1OGOK5rQdSW4t0O7ORW68wUVQJj58FSKwrgKs3FaM12NpGRWJLKZJiQaAZrWzZAq0TgVRs/uirjnioZrHYRnwtZ8jZY1ZkbCms9n5oGMuPumufvR89bsrZWsS9+9UsaKLVA4qc1C4pAU5R1qjIME1oSCqki5pksz5mqnM+FNaEkWe1Z13GVU0gOfvW3SYqgTtkBHrVm7fEpzVItlqpCZFZXqW1zHIRkKc4NR6hIz3cjsMF+QM5qvDH5soQsFz3ok3NJtYk445pWXNczHxKGjZsZYdqjJJOCMVJCzQybgaQnLFyPoKfUQ0EqDipIw8iEIeR1FRvngkdaWMskmVOKAE6Hkc0+GRoHLr+VTS258vfn/wCvVXJAINGjAsxTB1IJ75olwrAg8VHbweZIgZtqscE+lX57KNQ21yVHSpbSYFGMbZQSKnEpWTDElTVV3bdgdqdArO+TTa6gWLhguAoqNZChA7GpCmWPPtTPKOcdaFsBLO6qoYAVBb4dzuHFJMWACGkEgRcDg0JaCLczxovA5qkxdzmkDNIealCsB8tGwxsTAMQ44xVqBFBD989KhChlII+apY3VPlI5pPUCQlYpSCOG71FJGN2R0JpTGZJOTxSmLPCmlsA1SVTGatXFr5c2c5zzUJt2WZVfgd6lkm3MYxyVPWriMt6NGs/iK2ib+JQK+jbG2NnYwKCflQA5r5cup5bXUElhcpJHtZWXqDXq3h74zw/ZY4dbspPNUBTNbgEN7lT0/CtYNImSPWElUnmnt6g5HtXG/wDCzvCPlh/7SIzzt8l8j8MVUuPjL4cswfsyXV03YLDtH5sRWl0Kx2l5Zx6hZz2ky5imRo3z6EYr5d1fTbjTNXurCcESW8rRt74PX+tel3vxudi32PRtoPTzZv6AV59ruvz+I9Vl1G4gihmkADCLODgYzz3qZSTVhoyQmKtWrbJVYdjVepY2wayKR7B4O19PJRCxyK9CjuzPECDXzvpGqmzuUOcDNeyeHNUS5hQ788U0wfc33SRuKakBB5rQTa65FKEGelUIW2G0VYc8VEvFOY5FQzaOxWnOENZzNzWhc8IaynPNJjCR+KyLw81pOeKy7upYIqGo3p+ajekMryCq7irL1WcVRLGbARVG9gBQ8VooCRUVymYzSEeeaonl3BqjENzVr69CVk3VmW+B1p9AZQmi2/OjDFRDIPzUZyWIJ2+9SSqgjUr1I5JpGREDl/alLFSBQik8DqakkjKqpamBG7kgCnEqqD1qMkHinEAjrQBa+0B4Qp61Xz83TNNHB4NIGYOD3oSAtCX93grjFI1wxUgE4qJwwGT0NRluKVhCnht1SLNg8cUgYFAMc96QKQc0xjlZi554qxEGIJwSB3qCMjec1bW8CW7Qhc5Oc1LfYRBMQ3zdxVR2yakDHdk/lSFMtmqWgwjVm6cVPvEeRnmowCSAOKmeNAgxy3ekwHRSq5xjmn+XvbA6g1FCEUjsakkmWGXINL0Ac0TKDk1Gj4dcHmmzX28bRVTcQc5p27jNS7uxKqgcEVLbINrE8knrWR5mSMmt+BAiL6AZNNKw7mLqRBvpAO2B+lVlODT7ht9xI3qxNRjrVCJS+Kbn1NKSpFIo3HApiHbgOnNOUsW6YFKFx2peB1NIY7ac0vSk38cGkJJNAh+45rsfCGtvbTrE8nHua40U+OVonDocEUDPpXStTSaJcMDkVuxAOM14V4Q8UOJVhlbpXselakk0KnI5FUmLY02QA03OaHkyOKYpzQzSLILs/LWW/WtO6Oazn61LLIJOlZd11Nakv3ay7rvUsEUzUbU4mmMakojYVEyZqfFJtqkZyGpFxRLDlDVhcYofpTsTc4nXrLcjYFckq+WxHpXpeo2wlQ8VyV1o+JCwFSM45VyVycLUtwEUYBzkcVX5bgmpY4w55bFNmY1WAQDHzVKQZFO44PaomHz8UpOwYPJpMBip82DU0KKc5PSmkhsY64poJVlNMBXA8zA4pG+Vs1PKigq2eTyagmI3/L0oTuBYYK9oCSN3pVXYaUMdu2jcQKErAORM8U1iwO2nA8ZoOGlUk4BPWgBio5cKAc1PPaz2jgSqQTTDKYpQyHoetT3+pPfFS6gMOSfWl7112Ar8FvepFxjJqOOQBTkc01nJJxTsBKDlsipVY9QKqRHEgz0qyWABwaTQWGOxJz0qByS3XNKzljikKMoyapILDRSsQelSQpvJHerEdiS/zHii4ykAScDrXRytstWx1KgVkPCIZM+lW5LgSWh5wwHIouBkscsT70lFApgLik6dKdRTEKCW4zzUiw+pzUPQ8U9Dk9TSGT7Ai8UzPNB3D+LNNzQIkBpCaj3Uu4UwJra4ktplkQkEGvU/CPirzVWN3+Ycda8mLgVp6DcNHqCbSetIZ9J2d6JoxzmrqNXI+Hp2eBCT2rp1fAqhx0G3D5Y1Rc81NK+SarFualmg1+VrLu+9ajfdrLvO9SxoziaaaCeabmpKHqKeRgUxafjPFWjKQDNBVjViOHNTCH2pkGa8G4dKpXNmoQkiug8n2qreQ/uzxSsCZ4EwxSh8YzQRhMUygRM029cYxioyxI5oUZ5/SpljEjgdM0tEBFtO3cO1NLE9asmJkjIb+I8Ux4tiDPWi4ETMTgHtQmC3zc0jAk5p4wAPWmMdwF96aQCc01jSBsGgQ8uMYpOsf0ppOTT0GUYUDRHRRRimAU5Bzz0pyRmQgDrWnHpqrCXd+QMgCk2OxlsmOR0oBYfjVjyGc8AkVMtpI2PlouFikImIyBVyGEkr5i5HpVmO0KkEnNWym4g4qWwsZscRSYhVOPWrYjcHIq6lvkjgCphbKe+aBmZ9j805bms6VTuYbSO1dfBapWNrMccd2wX0GfrTQmYDJikxUzketRnHrVkiUhpcr6mkyPSgBtLyKNx7Cg570hk4O6MHv0okCqgBHNRwNhwD0Jpz5eU0ARkEDNNqaQYUVFQIStDSDtvkPvVAVc05tt2h96Y0e7eGWzbJ9K6onCVx3hZ82yfSuuY/uxTWwdSvI3WoCeae5qAnmpZoSk/LWXenrWjnis29NJjjuZhPNJmg9aO9Qi2SIM1ZiTJqGIVdiHIrRGMieJOKl20qdKdTIGEYqrcjKkVcwTTWg3DpRYVz5uzkgUOOh9abRk0iicqsSo4YNuHT0ojuNibdo65zjmmiI+V0+brTNpC8g5qdGIe05Y5PPoKaZC/3jTKKdhjs5HFNyQc0UUwAnNFGDU0cQZehzQBDinqSv41aS0JxkcVYWyUnmlcdihHsxgjk1K1oxbC9PWtGOxQdF5qyLcjrxSuFjNhsyhznBq8sfy4Yk1ZSBc1KIgOo4pXGVY4QOgqZYCasxxgVJsI74pAVPswUZJpyxk9BVsIKkVQO1AFVYzUqRYNWVQEdKkEeOgpgRpG6jIWsDWTuu5D0yBn8q6cKxGCTiuW1ri/lHocfpTQmZDgZ5AqIgelSMajJPYVZImKQ4HU0hye9G3HXigBC3YDFJSk+lJSGFTI4IyeveoaAcUASyHIqOnt/qlI+lM7UCCrNn/x8p9arVasBuu4x70xo9r8Jn/RY/pXYuf3QrjvCy7bZPpXXsf3YprYOpXeq7Hmp3qu55pM0HbuKzr01ezxVC85FJ7AtzO70o60h605ahFsmTircJ5qotW4K0Riy6p4p6rmmouatRR+tMgWOGp/KGKkRMCn7aYj5SoopQM1BY5ZXVwwOTSs7l/m/GljiYkEA1P8AZHc7mOKWgWKzDPzAcU0AnoM1ppbKBg8ipUgVB8qii47GalrIy5xirC2QAGW5q8UJGAKctux7UrgVEtUHbNTrD0+WrawADmpFj7YpDGxwAqOKkEOO1SQ/d2+lTpEzUAVtuKApJ5q4sBBzinCDLZxSAriPHQU/Ye4q2iY7VMsYbjFOwFERnGQKlWPcKtCLt2pViCmiwrkAiqRYuKsCMU4LTsK5AqGpkQ1IFx9akC07AQhcGuL1lt2o3GP75ru9ozXnupSF7yYg9XP86YFFgfpUZKjvk+1Ky92amFh0UYpiAv2AxTOtFO2gct+VIY3HeignJooAKKKFUswVRkk4AoA6OXRUHguG/CYn8wux7lCcD+Q/OufH3a9IhsCdPWxmb5BGIyo+mK4G/spLC5ltpR8yHg+o7GkpXBop960NHXffxj3rO7VveGLfztQU9gaYHsXhyPbbpx2rpJPugVlaLDsgXjtWpLV9AW5XeqzmrDmqrmpZoJmqtzypqbNRy8rSAy24anKaSUYamhqlblMnB5q9bc1nKea0rXpVmTNKJauRrVeBc1oRJxVIzFVadtqQKKMUwPlhbNBnJqURRr/DU20Cl2ViaEQUnoOKnjQnP0pVTirEUeOtICJYie1SrCanUAdqexAwB1oGRBNop6qaNpIp6qelADQvNOHsKeI+5pwQ7sdqQCwRgPu9auqox0quoEZyTWgiAqCKYiHbT1XjpUwUelOCZpiI0j96k2Y5qQRkU7gUwI8H0pfL9afmlBoAjTIJUjpTwpJpScU4cjNAAABTutAFOAJ7UxEcrhIJHx91Sf0rzW4cliepJr0HV5hBpdwxYBim0DPrxXnUpyaBkDZJyTSBS3Ap+B1J4pjPnheBTEBKpwOTTOSeaXFJ7CkMKKKKACtLw/bC71+yib7vmhj9Bz/Ss2un8DW5k1qSbbkRRH8yQP8AGk9gO6e2UsGVsZPOKzPFXhoTaQ94jBpIVJBA5I9DXQr5WQfL5HvTpW84MrABHGCvYikog5Hh4611/g6Ifah9a53U7F9O1a4tHH+rcgH1HY/lXUeDseePrVgj2TTFxAv0qzJ1NQacf3C/SppOtV0FErSVUkNWZapSt1qWaoYW5pCcioy1KDSQMqXC81WHWr8yZFUD8rUNBfQmQc1q2a8CsyEbiK2rROlNGbNKAcCr8Y4qrAnSr8acVSIAClxUgWjbTA+Y1Tr61IsWetFFYGhNHGM9qmZM49qKKBj1X0FNKLv3dTRRQIkQAnnNP2j0oooAcF4pypzRRQA9kBUg1dtnWSAflRRR1AnAFTFFWJXDDJ7elFFUIjzzyc0nJoooAdtp4UA0UUAOwMU0OgDHeCB2HJooobBAs4B5jY/XimjzJD8zED0Wiis+ZlWRkeJwlvpYAHzyOBk8nArhmaiitI7EsiY560lFFUIQnNFFFIYUUUUAFd/4BtSlhc3JGDLIEB9lH+JoopoTOxCinBaKKok5Lxpo4ngXUol/eQjbIB3XsfwrK8JS7boD3ooqWVE9m0x8wr9KtyUUVQ0VJaz5TRRSZaIM5NKDRRUjHHBFUp4+ciiiqJJLQHcK6GzjyBRRQiGa8MeAKuItFFUSSbaULRRQM//Z" alt="Yudha" style="width:100%;height:100%;object-fit:cover;object-position:top center;">
        </div>

        <div class="full-name">
            Ahmad Syuhada, A.md
        </div>

        <div style="height:1px; width:40px; background:var(--gold); margin:8px auto; opacity:.5"></div>

       <p class="parent-info">
    Putra dari<br>
    <strong class="parent-name">
        Bapak Drs. Purwo Sulistyanto & Ibu Dra. Anis Tri Nuraini
    </strong>
</p>
    </div>

</div>
      <div class="divider fade-in" style="margin-top:22px"><hr><div class="diamond"></div><hr></div>
      <p class="serif fade-in" style="font-size:13px; opacity:.6; font-style:italic; max-width:260px; line-height:1.8; text-align:center; margin:0 auto;">
        "Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu istri-istri dari jenismu sendiri…"
      </p>
      <p class="verse-source fade-in" style="text-align:center; width:100%;">(Q.S. Ar-Rum : 21)</p>
    </div>
  </div>

  <!-- ══════ SLIDE 4 — WAKTU & TEMPAT ══════ -->
  <div class="slide" id="s4">
    <div class="jawa-border left"></div>
    <div class="jawa-border right"></div>
    <div class="edge-line top"></div>
    <div class="edge-line bottom"></div>
    <div class="slide-inner" style="gap:16px">
      <p class="label fade-in">Waktu & Tempat</p>
      <div class="divider fade-in"><hr><div class="diamond"></div><div class="ornament">✦</div><div class="diamond"></div><hr></div>

      <!-- AKAD -->
      <div class="event-card fade-in">
        <p class="event-type">✦ Akad Nikah ✦</p>
        <p class="event-day">Jumat</p>
        <p class="event-date">26 Juni 2026</p>
        <p class="event-time">08.00 – Selesai WIB</p>
        <div style="height:1px; width:50px; background:var(--gold); margin:10px auto; opacity:.4"></div>
        <p class="event-venue">Kediaman Mempelai Wanita</p>
        <p class="event-address">Jl Abdussalam, Pamijen RT 6 RW 1, Baturraden<br>Jawa Tengah</p>
      </div>

      <!-- RESEPSI -->
      <div class="event-card fade-in">
        <p class="event-type">✦ Resepsi Pernikahan ✦</p>
        <p class="event-day">Jumat</p>
        <p class="event-date">26 Juni 2026</p>
        <p class="event-time">13.00 – 16.00 WIB</p>
        <div style="height:1px; width:50px; background:var(--gold); margin:10px auto; opacity:.4"></div>
        <p class="event-venue">Kediaman Mempelai Wanita</p>
        <p class="event-address">Jl Abdussalam, Pamijen RT 6 RW 1, Baturraden<br>Jawa Tengah</p>
      </div>
    </div>
  </div>

  <!-- ══════ SLIDE 5 — GOOGLE MAPS ══════ -->
  <div class="slide" id="s5">
    <div class="jawa-border left"></div>
    <div class="jawa-border right"></div>
    <div class="edge-line top"></div>
    <div class="edge-line bottom"></div>
    <div class="slide-inner" style="gap:14px">
      <p class="label fade-in">Petunjuk Lokasi</p>
      <div class="divider fade-in"><hr><div class="diamond"></div><div class="ornament">✦</div><div class="diamond"></div><hr></div>

      <p class="event-card-title fade-in serif" style="font-size:16px; color:var(--gold2)">Kediaman Mempelai Wanita</p>
      <p class="fade-in" style="font-size:12px; color:var(--gold2); letter-spacing:1px">Jl Abdussalam, Pamijen RT 6 RW 1, Baturraden</p>

      <div class="fade-in" style="width:calc(100% - 96px); max-width:400px; margin:12px auto 0; border:1.5px solid rgba(255,255,255,0.2); overflow:hidden; height:180px;">
        <img 
          src="https://staticmap.openstreetmap.de/staticmap.php?center=-7.375319,109.231396&zoom=16&size=600x360&markers=-7.375319,109.231396,red-pushpin" 
          onerror="this.parentElement.style.display='none'"
          alt="" style="width:100%;height:100%;object-fit:cover;">
      </div>

      <div class="maps-frame fade-in">
        <iframe
          src="https://maps.google.com/maps?q=-7.375319992634095,109.23139607483988&z=16&output=embed"
          allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>

      <a class="maps-btn fade-in" href="https://maps.app.goo.gl/DxGQ6HEg4ftNev1c7" target="_blank">
        Buka di Google Maps ↗
      </a>

      <div class="divider fade-in" style="margin-top:10px"><hr><div class="diamond"></div><hr></div>
      <p class="fade-in" style="font-size:11px; color:rgba(255,255,255,.4); letter-spacing:1px">Kami tunggu kehadiran Anda</p>
    </div>
  </div>

  <!-- ══════ SLIDE 6 — TANDA KASIH ══════ -->
  <div class="slide" id="s6">
    <div class="jawa-border left"></div>
    <div class="jawa-border right"></div>
    <div class="edge-line top"></div>
    <div class="edge-line bottom"></div>
    <div class="slide-inner" style="gap:14px">
      <p class="label fade-in">Tanda Kasih</p>
      <div class="divider fade-in"><hr><div class="diamond"></div><div class="ornament">✦</div><div class="diamond"></div><hr></div>
      <p class="serif fade-in" style="font-size:13px; color:rgba(255,255,255,.55); max-width:280px; line-height:1.8; font-style:italic">
        Bagi Bapak/Ibu/Saudara/i yang tidak dapat hadir, doa dan perhatian Anda adalah hadiah terindah bagi kami.
      </p>

      <!-- Alamat -->
      <div class="gift-card fade-in">
        <div class="gift-icon">🎁</div>
        <div class="gift-title">Kirim ke Alamat</div>
        <p class="gift-detail" style="line-height:1.9">
          Kediaman Mempelai Wanita<br>
          Jl Abdussalam,<br>
          Pamijen RT 6 RW 1, Baturraden<br>
          Jawa Tengah
        </p>
        <a class="copy-btn" href="https://maps.app.goo.gl/DxGQ6HEg4ftNev1c7" target="_blank" style="display:inline-block; text-decoration:none; margin-top:8px;">Lihat di Google Maps ↗</a>
      </div>
    </div>
  </div>


  <!-- ══════ SLIDE 7 — GALERI FOTO ══════ -->
  <div class="slide" id="s7">
    <div class="jawa-border left"></div>
    <div class="jawa-border right"></div>
    <div class="edge-line top"></div>
    <div class="edge-line bottom"></div>
    <div class="slide-inner" style="gap:14px; padding-top:70px; padding-bottom:70px;">
      <p class="label fade-in">Galeri Foto</p>
      <div class="divider fade-in"><hr><div class="diamond"></div><div class="ornament">✦</div><div class="diamond"></div><hr></div>

      <div class="gallery-grid fade-in">
    <div class="gallery-item portrait">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==" data-src="./images/REZ08060.jpg" alt="Galuh & Yudha" loading="lazy" decoding="async" fetchpriority="low">
</div>

<div class="gallery-item landscape">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==" data-src="./images/REZ08138.jpg" alt="Galuh & Yudha" loading="lazy" decoding="async" fetchpriority="low">
</div>

<div class="gallery-item landscape">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==" data-src="./images/REZ08152.jpg" alt="Galuh & Yudha" loading="lazy" decoding="async" fetchpriority="low">
</div>

<div class="gallery-item portrait">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==" data-src="./images/REZ08162.jpg" alt="Galuh & Yudha" loading="lazy" decoding="async" fetchpriority="low">
</div>

<div class="gallery-item landscape">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==" data-src="./images/REZ08131.jpg" alt="Galuh & Yudha" loading="lazy" decoding="async" fetchpriority="low">
</div>

<div class="gallery-item portrait">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==" data-src="./images/REZ08173.jpg" alt="Galuh & Yudha" loading="lazy" decoding="async" fetchpriority="low">
</div>
      </div>
    </div>
  </div>

  <!-- ══════ SLIDE 8 — TERIMA KASIH ══════ -->
  <div class="slide" id="s8">
    <div class="jawa-border left"></div>
    <div class="jawa-border right"></div>
    <div class="edge-line top"></div>
    <div class="edge-line bottom"></div>
    <div class="slide-inner">
      <div style="font-size:44px; color:var(--gold); margin-bottom:10px;" class="fade-in">༄</div>

      <p class="label fade-in" style="margin-bottom:16px">Dengan Penuh Syukur</p>
      <div class="script thankyou-script fade-in">Terima</div>
      <div class="script thankyou-script fade-in">Kasih</div>

      <div class="divider fade-in"><hr><div class="diamond"></div><div class="ornament">✦</div><div class="diamond"></div><hr></div>

      <p class="message-text fade-in">
        Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan do'a restu.
      </p>

      <div class="divider fade-in" style="margin-top:24px"><hr><div class="diamond"></div><hr></div>

      <div class="script fade-in" style="font-size: clamp(28px,8vw,44px); margin-bottom:8px">Galuh & Yudha</div>
      <p class="hashtag fade-in">#GaluhYudhaBersatu</p>
      <p class="hashtag fade-in" style="font-size:11px; margin-top:4px; opacity:.6">26.06.2026</p>

      <div class="divider fade-in" style="margin-top:20px"><hr><div class="diamond"></div><hr></div>
      <p class="verse-box fade-in" style="font-size:12px">
        Semoga Allah memberkahi kalian berdua, dan semoga Allah mengumpulkan kalian berdua dalam kebaikan.
      </p>
      <p class="verse-source fade-in">(H.R. Abu Dawud)</p>
    </div>
  </div>

</div><!-- /slides-wrapper -->
</div><!-- /slider -->

<script>
  // ── SLIDES ──
  let currentSlide = 0;
  const total = document.querySelectorAll('.slide').length;
  const sw = document.getElementById('sw');
  const dotsContainer = document.getElementById('navDots');

  // Build dots
  for(let i=0;i<total;i++){
    const d = document.createElement('div');
    d.className='dot'+(i===0?' active':'');
    d.onclick=()=>goSlide(i);
    dotsContainer.appendChild(d);
  }


  function loadGalleryImages(){
    document.querySelectorAll('#s7 img[data-src]').forEach(img=>{
      img.src = img.dataset.src;
      img.removeAttribute('data-src');
    });
  }
  function goSlide(n){
    if(n<0||n>=total) return;
    currentSlide=n;
    sw.style.transform=`translateY(-${n*100}vh)`;
    document.querySelectorAll('.dot').forEach((d,i)=>d.classList.toggle('active',i===n));
    if(n >= 5) loadGalleryImages();
    // trigger fade-ins for current slide
    setTimeout(triggerFadeIns,100);
  }

  function triggerFadeIns(){
    const slides = document.querySelectorAll('.slide');
    const slide = slides[currentSlide];
    slide.querySelectorAll('.fade-in').forEach((el,i)=>{
      el.classList.remove('visible');
      setTimeout(()=>el.classList.add('visible'), i*80);
    });
  }

  // Touch/swipe
  let startY=0, startX=0;
  document.addEventListener('touchstart', e=>{ startY=e.touches[0].clientY; startX=e.touches[0].clientX; },{passive:true});
  document.addEventListener('touchend', e=>{
    const dy = startY - e.changedTouches[0].clientY;
    const dx = startX - e.changedTouches[0].clientX;
    if(Math.abs(dy)>Math.abs(dx) && Math.abs(dy)>40){
      goSlide(dy>0 ? currentSlide+1 : currentSlide-1);
    }
  });
  // Keyboard
  document.addEventListener('keydown',e=>{
    if(e.key==='ArrowDown') goSlide(currentSlide+1);
    if(e.key==='ArrowUp')   goSlide(currentSlide-1);
  });
  // Wheel
  let wheelLock=false;
  document.addEventListener('wheel',e=>{
    if(wheelLock) return;
    wheelLock=true;
    goSlide(e.deltaY>0 ? currentSlide+1 : currentSlide-1);
    setTimeout(()=>wheelLock=false,900);
  },{passive:true});

  // ── COUNTDOWN ──
  function updateCountdown(){
    const target = new Date('2026-06-26T08:00:00');
    const now = new Date();
    const diff = target - now;
    if(diff<=0){
      document.getElementById('c-days').textContent='00';
      document.getElementById('c-hours').textContent='00';
      document.getElementById('c-mins').textContent='00';
      document.getElementById('c-secs').textContent='00';
      return;
    }
    const d = Math.floor(diff/86400000);
    const h = Math.floor((diff%86400000)/3600000);
    const m = Math.floor((diff%3600000)/60000);
    const s = Math.floor((diff%60000)/1000);
    document.getElementById('c-days').textContent  = String(d).padStart(2,'0');
    document.getElementById('c-hours').textContent = String(h).padStart(2,'0');
    document.getElementById('c-mins').textContent  = String(m).padStart(2,'0');
    document.getElementById('c-secs').textContent  = String(s).padStart(2,'0');
  }
  setInterval(updateCountdown,1000);
  updateCountdown();

  // ── COPY ──
  function copyText(text, label){
    navigator.clipboard.writeText(text).then(()=>{
      const t=document.getElementById('toast');
      t.textContent=label+' disalin!';
      t.style.display='block';
      setTimeout(()=>t.style.display='none',2200);
    });
  }

  // ── INIT ──
  triggerFadeIns();
</script>
</body>
</html>
