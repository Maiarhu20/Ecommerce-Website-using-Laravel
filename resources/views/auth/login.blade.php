

<x-auth-session-status class="mb-4" :status="session('status')" />
<!-- Coding By CodingNepal - www.codingnepalweb.com -->

<head>

  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <div class="wrapper">
    <form method="POST" action="{{ route('login') }}">
        @csrf
      <h2>Login</h2>
        <div class="input-field">
        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
        <label for="email" :value="__('Email')" >Enter your email</label>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
      <div class="input-field">
        <input id="password"
        type="password"
        name="password"
        required autocomplete="current-password" >
        <label for="password" :value="__('Password')" >Enter your password</label>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
      <div class="forget">
        <label for="remember">
          <input name="remember" id="remember_me" type="checkbox">
          <p>{{ __('Remember me') }}</p>
        </label>

      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a  href="{{ route('register') }}">Register</a></p>
      </div>
    </form>
  </div>
</body>

