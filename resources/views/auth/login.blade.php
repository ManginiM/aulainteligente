<x-guest-layout>
    <div class="min-vh-100 d-flex justify-content-center align-items-center bg-light">
        <div class="card shadow rounded-4 p-4" style="width: 100%; max-width: 420px;">
            <div class="text-center mb-4">
                <img src="https://img.icons8.com/ios-filled/100/4a90e2/login-rounded-right.png" class="mb-3" style="width: 50px;" alt="login-icon">
                <h2 class="fw-bold text-primary">Inicio de Sesión</h2>
                <p class="text-muted">Accedé con tus credenciales</p>
            </div>

            <!-- Errores -->
            <x-auth-validation-errors class="mb-3 text-danger" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input id="email" name="email" type="email" required autofocus
                        class="form-control">
                </div>

                <!-- Password -->
                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" name="password" type="password" required
                        class="form-control">
                </div>

                <!-- Rol -->
                <div class="mb-3 text-start">
                    <label for="role" class="form-label">Rol</label>
                    <select id="role" name="role" required class="form-select">
                        <option value="estudiante">Estudiante</option>
                        <option value="docente">Docente</option>
                        <option value="administrador">Administrador</option>
                    </select>
                </div>

                <!-- Recordarme -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label text-muted" for="remember">Recordarme</label>
                    </div>
                    <a class="text-decoration-none text-primary small" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>

                <!-- Botón -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary fw-semibold">
                        Ingresar
                    </button>
                </div>
            </form>
        </div>
    </div>
    @if (Route::has('register'))
    <div class="mt-4 text-center">
        ¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
    </div>
@endif
</x-guest-layout>

