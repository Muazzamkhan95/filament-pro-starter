@component('mail::message')
{{-- Greeting --}}
# 👋 Hello {{ $user->name }},

{{-- Intro --}}
Welcome to **{{ config('app.name') }} | CodeBeams!**

Your account has been successfully created. Below are your login credentials:

{{-- Credential Panel --}}
@component('mail::panel')
**📧 Email:**  {{ $user->email }}

**🔑 Temporary Password:**  {{ $password }}
@endcomponent

{{-- Button --}}
@component('mail::button', ['url' => url('/admin/login')])
➡️ Login to Your Account
@endcomponent

{{-- Info Block --}}
@component('mail::subcopy')
⚠️ **Security Tip:**
Please change your password right after logging in for enhanced security.
@endcomponent

{{-- Outro --}}
Thank you for joining **{{ config('app.name') }}**!
If you have any questions, simply reply to this email — we’re always happy to help.

Warm regards,
**The CodeBeams Team**

@endcomponent
