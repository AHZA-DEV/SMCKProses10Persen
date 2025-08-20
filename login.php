<!DOCTYPE html>
<html lang="id">
  <head>
    <script src="https://static.readdy.ai/static/e.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Sistem Manajemen Cuti Karyawan</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
    />
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#3B82F6",
              secondary: "#64748B",
            },
            borderRadius: {
              none: "0px",
              sm: "4px",
              DEFAULT: "8px",
              md: "12px",
              lg: "16px",
              xl: "20px",
              "2xl": "24px",
              "3xl": "32px",
              full: "9999px",
              button: "8px",
            },
          },
        },
      };
    </script>
    <style>
      :where([class^="ri-"])::before {
        content: "\f3c2";
      }
      .gradient-bg {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
      }
      .input-field {
        transition: all 0.3s ease;
      }
      .input-field:focus {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
      }
      .password-toggle {
        cursor: pointer;
        transition: color 0.2s ease;
      }
      .password-toggle:hover {
        color: #3b82f6;
      }
    </style>
  </head>
  <body class="gradient-bg min-h-screen">
    <header class="bg-white/80 backdrop-blur-sm border-b border-gray-100">
      <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
          <a
            href="https://readdy.ai/home/010bfdc8-ec51-4719-9d6e-62d050c9c0de/da89052d-6a9b-47c9-b58e-3dc83c1662d5"
            data-readdy="true"
            class="flex items-center gap-2 text-gray-600 hover:text-primary transition-colors"
          >
            <div class="w-8 h-8 flex items-center justify-center">
              <i class="ri-arrow-left-line text-xl"></i>
            </div>
            <span class="index.php">Kembali</span>
          </a>
          <div class="font-bold text-2xl text-primary">SMCK</div>
        </div>
      </div>
    </header>

    <main
      class="flex items-center justify-center min-h-[calc(100vh-80px)] px-6 py-12"
    >
      <div class="w-full max-w-md">
        <div
          class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden"
        >
          <div class="px-8 py-10">
            <div class="text-center mb-8">
              <div class="font-bold text-3xl text-primary mb-4">
                SMCK
              </div>
              <h1 class="text-2xl font-bold text-gray-900 mb-2">
                Masuk ke Sistem
              </h1>
              <p class="text-gray-600">Kelola cuti karyawan dengan mudah</p>
            </div>

            <form id="loginForm" class="space-y-6">
              <div class="space-y-2">
                <label
                  for="email"
                  class="block text-sm font-medium text-gray-700"
                  >Email atau Username</label
                >
                <div class="relative">
                  <div
                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                  >
                    <div class="w-5 h-5 flex items-center justify-center">
                      <i class="ri-user-line text-gray-400"></i>
                    </div>
                  </div>
                  <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    class="input-field w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none text-sm"
                    placeholder="Masukkan email atau username"
                  />
                </div>
                <div id="emailError" class="text-red-500 text-xs hidden"></div>
              </div>

              <div class="space-y-2">
                <label
                  for="password"
                  class="block text-sm font-medium text-gray-700"
                  >Password</label
                >
                <div class="relative">
                  <div
                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                  >
                    <div class="w-5 h-5 flex items-center justify-center">
                      <i class="ri-lock-line text-gray-400"></i>
                    </div>
                  </div>
                  <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    class="input-field w-full pl-10 pr-12 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none text-sm"
                    placeholder="Masukkan password"
                  />
                  <div
                    class="absolute inset-y-0 right-0 pr-3 flex items-center"
                  >
                    <div
                      class="w-5 h-5 flex items-center justify-center password-toggle"
                      id="togglePassword"
                    >
                      <i class="ri-eye-off-line text-gray-400"></i>
                    </div>
                  </div>
                </div>
                <div
                  id="passwordError"
                  class="text-red-500 text-xs hidden"
                ></div>
              </div>

              <button
                type="submit"
                id="loginButton"
                class="w-full bg-primary text-white py-3 px-4 !rounded-button hover:bg-blue-600 focus:ring-4 focus:ring-blue-200 transition-all duration-300 font-medium text-sm whitespace-nowrap disabled:opacity-50 disabled:cursor-not-allowed"
              >
                Masuk
              </button>
            </form>
          </div>
        </div>
      </div>
    </main>

    <script id="password-toggle">
      document.addEventListener("DOMContentLoaded", function () {
        const passwordInput = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");
        const toggleIcon = togglePassword.querySelector("i");

        togglePassword.addEventListener("click", function () {
          const type =
            passwordInput.getAttribute("type") === "password"
              ? "text"
              : "password";
          passwordInput.setAttribute("type", type);

          if (type === "password") {
            toggleIcon.className = "ri-eye-off-line text-gray-400";
          } else {
            toggleIcon.className = "ri-eye-line text-gray-400";
          }
        });
      });
    </script>

    <!-- <script id="form-validation">
      document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("loginForm");
        const emailInput = document.getElementById("email");
        const passwordInput = document.getElementById("password");
        const emailError = document.getElementById("emailError");
        const passwordError = document.getElementById("passwordError");
        const loginButton = document.getElementById("loginButton");

        function validateEmail(email) {
          const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          return emailRegex.test(email) || email.length >= 3;
        }

        function validatePassword(password) {
          return password.length >= 8;
        }

        function showError(errorElement, message) {
          errorElement.textContent = message;
          errorElement.classList.remove("hidden");
        }

        function hideError(errorElement) {
          errorElement.classList.add("hidden");
        }

        function validateForm() {
          let isValid = true;

          if (!validateEmail(emailInput.value)) {
            showError(
              emailError,
              "Format email tidak valid atau username minimal 3 karakter"
            );
            emailInput.classList.add("border-red-300");
            isValid = false;
          } else {
            hideError(emailError);
            emailInput.classList.remove("border-red-300");
          }

          if (!validatePassword(passwordInput.value)) {
            showError(passwordError, "Password minimal 8 karakter");
            passwordInput.classList.add("border-red-300");
            isValid = false;
          } else {
            hideError(passwordError);
            passwordInput.classList.remove("border-red-300");
          }

          loginButton.disabled = !isValid;
          return isValid;
        }

        emailInput.addEventListener("input", validateForm);
        passwordInput.addEventListener("input", validateForm);

        form.addEventListener("submit", function (e) {
          e.preventDefault();

          if (validateForm()) {
            loginButton.textContent = "Memproses...";
            loginButton.disabled = true;

            setTimeout(() => {
              alert(
                "Login berhasil! Selamat datang di Sistem Manajemen Cuti Karyawan."
              );
              loginButton.textContent = "Masuk";
              loginButton.disabled = false;
            }, 1500);
          }
        });
      });
    </script>

    <script id="register-link">
      document.addEventListener("DOMContentLoaded", function () {
        const registerLink = document.querySelector('a[href="#"]:last-of-type');
        registerLink.addEventListener("click", function (e) {
          e.preventDefault();
          alert(
            "Halaman pendaftaran akan segera tersedia. Silakan hubungi administrator untuk membuat akun baru."
          );
        });

        const forgotPasswordLink = document.querySelector(
          'a[href="#"]:first-of-type'
        );
        forgotPasswordLink.addEventListener("click", function (e) {
          e.preventDefault();
          alert(
            "Link reset password telah dikirim ke email Anda (jika email terdaftar dalam sistem)."
          );
        });
      });
    </script> -->


    
    <script>
      !(function (t, e) {
        var o, n, p, r;
        e.__SV ||
          ((window.posthog = e),
          (e._i = []),
          (e.init = function (i, s, a) {
            function g(t, e) {
              var o = e.split(".");
              2 == o.length && ((t = t[o[0]]), (e = o[1])),
                (t[e] = function () {
                  t.push([e].concat(Array.prototype.slice.call(arguments, 0)));
                });
            }
            ((p = t.createElement("script")).type = "text/javascript"),
              (p.crossOrigin = "anonymous"),
              (p.async = !0),
              (p.src =
                s.api_host.replace(".i.posthog.com", "-assets.i.posthog.com") +
                "/static/array.js"),
              (r = t.getElementsByTagName("script")[0]).parentNode.insertBefore(
                p,
                r
              );
            var u = e;
            for (
              void 0 !== a ? (u = e[a] = []) : (a = "posthog"),
                u.people = u.people || [],
                u.toString = function (t) {
                  var e = "posthog";
                  return (
                    "posthog" !== a && (e += "." + a), t || (e += " (stub)"), e
                  );
                },
                u.people.toString = function () {
                  return u.toString(1) + ".people (stub)";
                },
                o =
                  "init capture register register_once register_for_session unregister unregister_for_session getFeatureFlag getFeatureFlagPayload isFeatureEnabled reloadFeatureFlags updateEarlyAccessFeatureEnrollment getEarlyAccessFeatures on onFeatureFlags onSessionId getSurveys getActiveMatchingSurveys renderSurvey canRenderSurvey getNextSurveyStep identify setPersonProperties group resetGroups setPersonPropertiesForFlags resetPersonPropertiesForFlags setGroupPropertiesForFlags resetGroupPropertiesForFlags reset get_distinct_id getGroups get_session_id get_session_replay_url alias set_config startSessionRecording stopSessionRecording sessionRecordingStarted captureException loadToolbar get_property getSessionProperty createPersonProfile opt_in_capturing opt_out_capturing has_opted_in_capturing has_opted_out_capturing clear_opt_in_out_capturing debug".split(
                    " "
                  ),
                n = 0;
              n < o.length;
              n++
            )
              g(u, o[n]);
            e._i.push([i, s, a]);
          }),
          (e.__SV = 1));
      })(document, window.posthog || []);
      posthog.init("phc_t9tkQZJiyi2ps9zUYm8TDsL6qXo4YmZx0Ot5rBlAlEd", {
        api_host: "https://us.i.posthog.com",
        autocapture: false,
        capture_pageview: false,
        capture_pageleave: false,
        capture_performance: {
          web_vitals: false,
        },
        rageclick: false,
      });
      window.shareKey = "gMdAJ6PgwH50sJZD2QQBmg";
      window.host = "readdy.ai";
    </script>
  </body>
</html>
