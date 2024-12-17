



<head>

  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <div class="wrapper">
    <form method="POST" action="{{ route('register') }}">
        @csrf
      <h2>Register</h2>

      <div class="input-field">
        <input id="name" type="text" name="name" :value="old('name')" required autofocus>
        <label for="name">Enter your name</label>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <div class="input-field">
        <input id="email" type="email" name="email" :value="old('email')" required>
        <label for="email">Enter your email</label>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <div class="input-field">
        <input id="phone" type="text" name="phone" :value="old('phone')" required>
        <label for="phone">Enter your phone</label>
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
      </div>

      <div class="input-field">
        <input id="address" type="text" name="address" :value="old('address')" required>
        <label for="address">Enter your address</label>
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
      </div>

      <div class="mt-4">
        <x-input-label style="color: white" for="gender" :value="__('Gender')" />
        <div class="flex items-center">
            <label for="male" class="mr-4">
                <input type="radio" id="male" name="gender" value="male" class="mr-2" :checked="old('gender') == 'male'" required>
                Male &emsp;
            </label>
            <label for="female" class="mr-4">
                <input type="radio" id="female" name="gender" value="female" class="mr-2" :checked="old('gender') == 'female'" required>
                Female
            </label>
        </div>
        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
    </div>

      <div class="input-field">
        <input id="password" type="password" name="password" required>
        <label for="password">Enter your password</label>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <div class="input-field">
        <input id="password_confirmation" type="password" name="password_confirmation" required>
        <label for="password_confirmation">Confirm your password</label>
      </div>

      <button type="submit">Register</button>
      <div class="register">
        <p>Already have an account? <a href="{{ route('login') }}">Log In</a></p>
      </div>
    </form>
  </div>
</body>

