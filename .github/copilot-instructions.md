# Copilot Instructions for DWES / AppEmpresa

## Quick project summary ✅
- Small PHP CRUD app (AppEmpresa/) for managing departamentos, empleados, and usuarios.
- No framework: plain PHP files with mixed HTML/PHP templates. Key folders: `AppEmpresa/` (site), `AppEmpresa/includes/` (shared code), `AppEmpresa/departamentos/`, `AppEmpresa/empleados/`, `AppEmpresa/usuarios/`.

## How to run locally (developer workflow) 🔧
- The app expects to be served such that `/AppEmpresa` is the web path. Easiest local dev command from repo root: `php -S localhost:8000 -t .` — then open `http://localhost:8000/AppEmpresa/`.
- Alternatively, copy `AppEmpresa/` into your webserver document root (XAMPP, WAMP, etc.).
- Database: MySQL schema is provided in `SA4/bd_empresa.sql`. Database name used in `AppEmpresa/includes/db.php` is `empresa` by default. Update `includes/db.php` credentials if needed.

## Key files & patterns (what to know first) 📁
- `AppEmpresa/includes/db.php` — creates a PDO MySQL connection and sets `ERRMODE_EXCEPTION`.
- `AppEmpresa/includes/header.php` & `footer.php` — basic page wrapper; `header.php` expects session data and links to `/AppEmpresa/css/style.css` (absolute path).
- `AppEmpresa/includes/functions.php` — contains `e($str)` helper for HTML escaping (used widely in views).
- `AppEmpresa/login.php` — authenticates users with `SELECT * FROM usuarios WHERE Nombre = ? AND Clave = ?` and stores user row in `$_SESSION['user']`.
- `Auth` pattern: `AppEmpresa/includes/auth.php` simply redirects unauthenticated sessions to `index.php`. Pages enforce it selectively (see `departamentos/borrar.php`).

## Conventions & important implementation details ✍️
- Sessions: most pages call `session_start()` at the top; `header.php` also calls `session_start()` if no session exists — maintain that order.
- Authorization is not enforced globally — developers must `require_once "../includes/auth.php"` on sensitive endpoints (delete/modify actions).
- Output escaping: prefer `e($var)` helper; some code uses `htmlspecialchars()` inline.
- DB usage: PDO prepared statements are used for user-supplied values; simple reads sometimes use `$bd->query()`.
- Flash notifications are referenced but commented out (`// flash_set(...)`) — not implemented yet.

## Data & security notes (discoverable facts) ⚠️
- Passwords are stored/compared as plaintext in the `usuarios.Clave` column (see `SA4/bd_empresa.sql` and `AppEmpresa/login.php`). This is an observable detail—be careful when modifying auth behavior or adding tests that assume hashed passwords.
- Roles: users have `Rol` integer; `header.php` checks `$_SESSION['user']['Rol'] == 1` to show the Users link.

## Useful examples from the codebase (copyable snippets) ✨
- DB connection (from `includes/db.php`):

```php
$bd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

- Login check (from `login.php`):

```php
$stmt = $bd->prepare("SELECT * FROM usuarios WHERE Nombre = ? AND Clave = ?");
$stmt->execute([$usuario, $clave]);
if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) { $_SESSION['user'] = $user; }
```

- Escaping helper (from `includes/functions.php`):

```php
function e($str) { return htmlspecialchars($str, ENT_QUOTES, 'UTF-8'); }
```

## What to look for when making changes / PR guidance 🧭
- Preserve absolute asset paths or update them consistently if you change how the app is served (links in `header.php` use `/AppEmpresa/...`).
- When adding auth checks, require `includes/auth.php` early and ensure `session_start()` has been called.
- If adding features that touch `usuarios.Clave`, document and migrate existing plaintext values explicitly (no hidden assumptions about hashing).
- For DB migrations or fixtures, prefer using `SA4/bd_empresa.sql` as the canonical example schema and sample data.

## Missing/implicit things to be aware of (so agents don't make unsafe assumptions) 💡
- No test harness, no composer, no docker files present—assume manual integration testing.
- Flash messaging is stubbed (commented out); don't reference an implemented API for flash messages unless you implement it first.

---

If you'd like, I can:
- Add a short checklist template for PRs touching auth or DB schema
- Add an example `php -S` dev script in the `README.md` or a simple `run-local.sh`

Please tell me if any sections are unclear or if you want extra examples added (e.g., a PR checklist or common refactor patterns).