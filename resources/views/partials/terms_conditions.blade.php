@extends('layouts.app')

@section('content')
<div class="legal-container">
    <h1>Terms and Conditions</h1>

    <div class="legal-div">
        <h2>1. Introduction</h2>
        <p>
            Welcome to <b>Polovni Automobili</b> ("we," "our," or "us"). 
            By accessing or using our website at <a href="{{ route('cars.index') }}">Polovni Automobili</a> (the "Site"), 
            you agree to comply with and be bound by these Terms and Conditions ("Terms"). 
            Please read them carefully before using our services.
        </p>
    </div>

    <div class="legal-div">
        <h2>2. User Accounts</h2>
        <p>
            To access certain features, you may be required to create an account. You are responsible for maintaining the 
            confidentiality of your account information and are liable for any activity conducted under your account.
        </p>
    </div>

    <div class="legal-div">
        <h2>3. Intellectual Property</h2>
        <p>
            All content, images, and designs on Polovni Automobili are the intellectual property of Polovni Automobili and may 
            not be reproduced or used without our express permission.
        </p>
    </div>

    <div class="legal-div">
        <h2>4. Prohibited Activities</h2>
        <p>Users may not engage in any activity that:</p>
        <ul>
            <li>Violates any applicable law or regulation</li>
            <li>Infringes on the rights of others</li>
            <li>Impersonates another person or entity</li>
            <li>Attempts to interfere with the proper functioning of our website</li>
        </ul>
    </div>

    <div class="legal-div">
        <h2>5. Limitation of Liability</h2>
        <p>
            Polovni Automobili will not be liable for any damages resulting from your use of our website or services, including but not 
            limited to, loss of data, profits, or interruptions in service.
        </p>
    </div>

    <div class="legal-div">
        <h2>6. Termination</h2>
        <p>
            We reserve the right to terminate or suspend your access to our website at any time, without notice, for any reason, 
            including breach of these terms.
        </p>
    </div>

    <div class="legal-div">
        <h2>7. Changes to the Terms</h2>
        <p>
            We reserve the right to modify these terms at any time. Changes will be effective immediately upon posting on our website. 
            Your continued use of the website constitutes acceptance of the new terms.
        </p>
    </div>

    <div class="legal-div">
        <h2>8. Governing Law</h2>
        <p>
            These Terms and Conditions are governed by the laws of [Your Country], without regard to its conflict of law principles.
        </p>
    </div>

    <div class="legal-div">
        <h2>9. Contact Us</h2>
        <p>
            For any questions about these Terms and Conditions, please contact us at <a href="mailto:dsmiljanic40@gmail.com">email</a>.
        </p>
    </div>
</div>
@endsection