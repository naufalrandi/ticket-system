<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <div class="bg-gray-100">
    <!-- Navbar -->
    <header class="bg-blue-600 text-white">
      <div class="container mx-auto flex justify-between items-center p-5">
        <h1 class="text-2xl font-bold">Ticketing System</h1>
        <nav class="flex items-center space-x-4">
          <a href="#features" class="hover:underline">Features</a>
          <a href="#pricing" class="hover:underline">Pricing</a>
          <a href="#contact" class="hover:underline">Contact</a>
          <!-- Login/Register Links -->
          <div v-if="canLogin" class="flex space-x-3">
            <Link
              v-if="$page.props.auth.user"
              :href="route('dashboard')"
              class="rounded-md px-3 py-2 text-white transition hover:text-gray-200 focus:outline-none focus-visible:ring-gray-300"
            >
              Dashboard
            </Link>
            <template v-else>
              <Link
                :href="route('login')"
                class="rounded-md px-3 py-2 text-white transition hover:text-gray-200 focus:outline-none focus-visible:ring-gray-300"
              >
                Log in
              </Link>
              <Link
                v-if="canRegister"
                :href="route('register')"
                class="rounded-md px-3 py-2 text-white transition hover:text-gray-200 focus:outline-none focus-visible:ring-gray-300"
              >
                Register
              </Link>
            </template>
          </div>
        </nav>
      </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-blue-500 text-white py-20 text-center">
      <div class="container mx-auto">
        <h2 class="text-4xl font-bold mb-4">Simplify Your Ticketing Process</h2>
        <p class="text-lg mb-8">Manage your tickets efficiently with our easy-to-use platform.</p>
        <a href="#features" class="bg-white text-blue-500 font-semibold px-6 py-3 rounded shadow hover:bg-gray-200">
          Learn More
        </a>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-100">
      <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-10">Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-white p-6 rounded shadow">
            <h3 class="text-xl font-semibold mb-4">Real-Time Tracking</h3>
            <p>Monitor ticket status and progress in real-time.</p>
          </div>
          <div class="bg-white p-6 rounded shadow">
            <h3 class="text-xl font-semibold mb-4">User-Friendly Dashboard</h3>
            <p>Easily navigate and manage tickets with our clean interface.</p>
          </div>
          <div class="bg-white p-6 rounded shadow">
            <h3 class="text-xl font-semibold mb-4">Seamless Integration</h3>
            <p>Integrate with your existing tools effortlessly.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 bg-white">
      <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-10">Pricing</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="border p-6 rounded shadow">
            <h3 class="text-xl font-semibold mb-4">Basic</h3>
            <p class="text-2xl font-bold mb-4">$9/month</p>
            <p>Perfect for small businesses.</p>
            <button class="bg-blue-500 text-white px-6 py-3 rounded mt-4 hover:bg-blue-600">Get Started</button>
          </div>
          <div class="border p-6 rounded shadow">
            <h3 class="text-xl font-semibold mb-4">Pro</h3>
            <p class="text-2xl font-bold mb-4">$29/month</p>
            <p>Great for growing teams.</p>
            <button class="bg-blue-500 text-white px-6 py-3 rounded mt-4 hover:bg-blue-600">Get Started</button>
          </div>
          <div class="border p-6 rounded shadow">
            <h3 class="text-xl font-semibold mb-4">Enterprise</h3>
            <p class="text-2xl font-bold mb-4">Custom Pricing</p>
            <p>Designed for large-scale businesses.</p>
            <button class="bg-blue-500 text-white px-6 py-3 rounded mt-4 hover:bg-blue-600">Contact Us</button>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-100">
      <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-10">Get in Touch</h2>
        <p class="mb-6">Have questions or need a custom solution? Contact us today!</p>
        <form @submit.prevent="submitContactForm" class="max-w-lg mx-auto">
          <input
            type="text"
            v-model="name"
            placeholder="Your Name"
            class="w-full mb-4 px-4 py-2 border rounded"
            required
          />
          <input
            type="email"
            v-model="email"
            placeholder="Your Email"
            class="w-full mb-4 px-4 py-2 border rounded"
            required
          />
          <textarea
            v-model="message"
            placeholder="Your Message"
            class="w-full mb-4 px-4 py-2 border rounded"
            rows="4"
            required
          ></textarea>
          <button class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600">
            Send Message
          </button>
        </form>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center py-4">
      <p>&copy; 2024 Ticketing System. All rights reserved.</p>
    </footer>
  </div>
</template>
