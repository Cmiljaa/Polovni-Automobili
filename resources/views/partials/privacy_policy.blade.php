@extends('layouts.app')

@section('content')
<div class="legal-container">
    <h1>Privacy Policy</h1>

    <div class="legal-div">
        <h2>1. Introduction</h2>
        <p>At <b>Polovni Automobili</b>, we respect your privacy and are committed to protecting your personal data. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website <a href="{{ route('cars.index') }}">Polovni Automobili</a>.</p>
    </div>
    
    <div class="legal-div">
        <h2>2. Information We Collect</h2>
        <p><b>Personal Data:</b> We may collect personal information such as your name, email address, and phone number when you register or interact with our services.</p>
        <p><b>Non-Personal Data:</b> We may also collect non-personal data like your IP address, browser type, and device information to improve our services.</p>
    </div>

    <div class="legal-div">
        <h2>3. How We Use Your Information</h2>
        <h4>We use the data we collect for the following purposes:</h4>
        <ul>
            <li>To provide and maintain our services</li>
            <li>To communicate with you regarding updates or customer support</li>
            <li>To improve and optimize our website and services</li>
            <li>To comply with legal obligations</li>
        </ul>
    </div>

    <div class="legal-div">
        <h2>4. Sharing Your Information</h2>
        <p>We do not sell or rent your personal information to third parties. We may share your information with third-party service providers for operational purposes, such as hosting or analytics, but only under strict confidentiality agreements.</p>
    </div>

    <div class="legal-div">
        <h2>5. Data Security</h2>
        <p>We implement security measures to protect your data from unauthorized access, disclosure, or destruction. However, no method of transmission over the internet is 100% secure, and we cannot guarantee the absolute security of your data.</p>
    </div>

    <div class="legal-div">
        <h2>6. Your Rights</h2>
        <h4>You have the right to:</h4>
        <ul>
            <li>Access the personal data we hold about you</li>
            <li>Request correction or deletion of your personal data</li>
            <li>Withdraw your consent to data processing</li>
        </ul>
    </div>

    <div class="legal-div">
        <h2>7. Contact Us</h2>
        <p>If you have any questions or concerns about this Privacy Policy, please contact us at <a href="mailto:dsmiljanic40@gmail.com">email</a>.</p>
    </div>
</div>
@endsection