<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>GadgetHub — Admin Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50 text-gray-900">
  <!-- Background accents -->
  <div class="pointer-events-none fixed inset-0 overflow-hidden">
    <div class="absolute -top-16 -left-16 h-64 w-64 rounded-full bg-gray-200/60 blur-3xl"></div>
    <div class="absolute -bottom-16 -right-16 h-64 w-64 rounded-full bg-gray-300/60 blur-3xl"></div>
  </div>

  <main class="relative mx-auto flex min-h-screen max-w-7xl items-center px-4 sm:px-6 lg:px-8">
    <div class="grid w-full items-center gap-10 lg:grid-cols-2">
      <!-- Brand / Message -->
      <section>
        <a href="index.html" class="inline-flex items-center gap-2">
          <span class="grid h-10 w-10 place-items-center rounded-xl bg-gray-900 text-white">🛒</span>
          <span class="text-xl font-semibold tracking-tight">GadgetHub Admin</span>
        </a>
        <h1 class="mt-8 text-4xl font-extrabold tracking-tight sm:text-5xl">
          Welcome back, Admin
        </h1>
        <p class="mt-3 max-w-md text-gray-600">
          Sign in to access your dashboard, manage products, orders, and blog posts.
        </p>

        <ul class="mt-8 grid gap-3 text-sm text-gray-700">
          <li class="flex items-start gap-3">
            <span class="mt-1 inline-block h-2 w-2 rounded-full bg-emerald-500"></span>
            Role-based access with secure sessions
          </li>
          <li class="flex items-start gap-3">
            <span class="mt-1 inline-block h-2 w-2 rounded-full bg-emerald-500"></span>
            Manage inventory, pricing, and stock
          </li>
          <li class="flex items-start gap-3">
            <span class="mt-1 inline-block h-2 w-2 rounded-full bg-emerald-500"></span>
            Publish and schedule blog content
          </li>
        </ul>
      </section>

      <!-- Login Card -->
      <section class="lg:justify-self-end w-full max-w-md">
        <div class="rounded-3xl border bg-white p-6 shadow-sm sm:p-8">
          <div class="mb-6">
            <h2 class="text-xl font-semibold">Sign in to Admin</h2>
            <p class="mt-1 text-sm text-gray-600">Use your admin credentials to continue.</p>
          </div>

          <form action="{{ route('admin.auth') }}" method="post" class="space-y-5">
            @csrf
            @method('post')
            <div>
              <label for="email" class="mb-1 block text-sm font-medium">Email</label>
              <input
                id="email"
                name="email"
                type="email"
                required
                autocomplete="email"
                placeholder="Enter your email"
                class="block w-full rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-gray-900 placeholder:text-gray-400 focus:border-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-900/10"
              />
            </div>

            <div>
              <label for="password" class="mb-1 block text-sm font-medium">Password</label>
              <input
                id="password"
                name="password"
                type="password"
                required
                autocomplete="current-password"
                placeholder="••••••••"
                class="block w-full rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-gray-900 placeholder:text-gray-400 focus:border-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-900/10"
              />
            </div>

            <button
              type="submit"
              class="inline-flex w-full items-center justify-center rounded-xl bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-black"
            >
              Sign In
            </button>
          </form>

          <!-- Small hint -->
          <p class="mt-6 text-center text-xs text-gray-500">
            Protected area — authorized personnel only.
          </p>
        </div>

        <!-- Tiny footer -->
        <p class="mt-6 text-center text-xs text-gray-500">
          © <span class="font-medium">GadgetHub</span> — Admin Console
        </p>
      </section>
    </div>
  </main>
</body>
</html>
