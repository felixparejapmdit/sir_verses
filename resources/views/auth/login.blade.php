<x-guest-layout>

    <style>
        /* Background and Container */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container img {
            width: 70px;
            margin-bottom: 15px;
        }

        /* Header */
        .login-header {
            font-size: 32px;
            font-weight: bold;
            color: #334257;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Floating Label Input */
        .input-container {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }

        /* Input Field */
        .text-input {
            width: 100%;
            padding: 12px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: transparent;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Floating label */
        .input-label {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #888;
            font-size: 16px;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        /* Input Focus and filled states */
        .text-input:focus + .input-label,
        .text-input:not(:placeholder-shown) + .input-label {
            top: -10px;
            left: 8px;
            background-color: white;
            padding: 0 5px;
            font-size: 12px;
            color: #526D82;
        }

        .text-input:focus {
            border-color: #526D82;
            box-shadow: 0 5px 15px rgba(82, 109, 130, 0.3);
        }

        /* Error message */
        .input-error {
            font-size: 12px;
            color: #e53e3e;
            margin-top: 5px;
        }

        /* Button */
        .login-button {
            width: 100%;
            padding: 12px;
            background-color: #526D82;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .login-button:hover {
            background-color: #3a4e62;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(58, 78, 98, 0.3);
        }

        /* Add transition when clicked */
        .login-button:active {
            transform: scale(0.98);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .login-container {
                padding: 20px;
            }

            .login-header {
                font-size: 28px;
            }
        }
    </style>

    <!-- Login Container -->
    <div class="login-container">
        <h2 class="login-header">EVM LV</h2>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Username Field -->
            <div class="input-container">
                <input id="username" class="text-input" type="text" name="username" value="{{ old('username') }}" required autofocus placeholder=" " autocomplete="username" />
                <label for="username" class="input-label">{{ __('Username') }}</label>
                <x-input-error :messages="$errors->get('username')" class="input-error" />
            </div>

            <!-- Password Field -->
            <div class="input-container">
                <input id="password" class="text-input" type="password" name="password" required placeholder=" " autocomplete="current-password" />
                <label for="password" class="input-label">{{ __('Password') }}</label>
                <x-input-error :messages="$errors->get('password')" class="input-error" />
            </div>

            <!-- Login Button -->
            <div class="input-container">
                <button type="submit" class="login-button">{{ __('Log in') }}</button>
            </div>
        </form>
    </div>

</x-guest-layout>
