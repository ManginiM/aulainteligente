<x-guest-layout>
    <div class="min-vh-100 d-flex justify-content-center align-items-center bg-light">
        <div class="card shadow rounded-4 p-4" style="width: 100%; max-width: 420px;">
            <div class="text-center mb-4">
                <img src="https://img.icons8.com/ios-filled/100/4a90e2/add-user-male.png" class="mb-3" style="width: 50px;" alt="register-icon">
                <h2 class="fw-bold text-primary">Crear Cuenta</h2>
                <p class="text-muted">Completá tus datos para registrarte</p>
            </div>

            <!-- Errores -->
            <x-auth-validation-errors class="mb-3 text-danger" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nombre -->
                <div class="mb-3 text-start">
                    <label for="name" class="form-label">Nombre completo</label>
                    <input id="name" name="name" type="text" required autofocus
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input id="email" name="email" type="email" required
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Rol -->
                <div class="mb-3 text-start">
                    <label for="role" class="form-label">Rol</label>
                    <select id="role" name="role" required class="form-select @error('role') is-invalid @enderror">
                        <option value="">Seleccionar rol</option>
                        <option value="estudiante" {{ old('role') == 'estudiante' ? 'selected' : '' }}>Estudiante</option>
                        <option value="docente" {{ old('role') == 'docente' ? 'selected' : '' }}>Docente</option>
                        <option value="administrador" {{ old('role') == 'administrador' ? 'selected' : '' }}>Administrador</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" name="password" type="password" required
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirmar Contraseña -->
                <div class="mb-3 text-start">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="form-control">
                </div>

                <!-- Botón -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary fw-semibold">
                        Registrarse
                    </button>
                </div>
            </form>

            @if (Route::has('login'))
                <div class="mt-4 text-center">
                    ¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-decoration-none text-primary">Inicia sesión</a>
                </div>
            @endif
        </div>
    </div>
</x-guest-layout>

