<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instello - Join Open Mic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('authentication/css/main.css') }}">
    
</head>
<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 min-h-screen">
    <div class="flex flex-col min-h-screen justify-center items-center px-4 py-8">
        <div class="max-w-md w-full">
            <!-- Logo Section -->
            <div class="text-center mb-8 fade-in">
                <!-- <div class="inline-block gradient-bg text-white text-4xl font-bold px-6 py-3 rounded-2xl mb-4 shadow-2xl">
                    Instello
                </div> -->
                <!-- <p class="text-slate-400 text-sm">Your Gateway to Open Mic Performances</p> -->
            </div>
            
            <!-- Role Selection Screen -->
            <div id="roleSelection" class="fade-in">
                <div class="glass-effect rounded-3xl shadow-2xl p-8 md:p-10">
                    <h2 class="text-3xl font-bold text-center mb-3 text-white">Register</h2>
                    <p class="text-center text-slate-400 mb-8 text-sm">Choose your path to get started</p>
                    
                    <div class="space-y-5">
                        <!-- Artist Option -->
                        <div class="role-card bg-gradient-to-br from-slate-950 to-slate-950 border-2 border-slate-500/30 rounded-2xl p-6 cursor-pointer hover:border-slate-500" onclick="selectRole('artist')">
                            <div class="flex items-center space-x-4">
                                <div class="icon-wrapper text-5xl bg-slate-900/50 rounded-xl p-3 flex-shrink-0">
                                    🎤
                                </div>
                                <div class="flex-grow">
                                    <h3 class="font-bold text-lg mb-1 text-white">Looking for Open Mic</h3>
                                    <p class="text-sm text-slate-300">Discover and perform at amazing events</p>
                                </div>
                                <div class="text-slate-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Organizer Option -->
                        <div class="role-card bg-gradient-to-br from-slate-800 to-slate-900 border-2 border-slate-600/30 rounded-2xl p-6 cursor-pointer hover:border-slate-600" onclick="selectRole('organizer')">
                            <div class="flex items-center space-x-4">
                                <div class="icon-wrapper text-5xl bg-slate-700/50 rounded-xl p-3 flex-shrink-0">
                                    🎪
                                </div>
                                <div class="flex-grow">
                                    <h3 class="font-bold text-lg mb-1 text-white">Creating Open Mic</h3>
                                    <p class="text-sm text-slate-300">Host and manage incredible events</p>
                                </div>
                                <div class="text-slate-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 text-center">
                        <p class="text-sm text-slate-400">
                            Already have an account? 
                            <a href="#" class="text-slate-400 font-semibold hover:text-slate-300 transition-colors">Sign In</a>
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Registration Form (Hidden Initially) -->
            <div id="registrationForm" class="hidden fade-in">
                <div class="glass-effect rounded-3xl shadow-2xl p-8 md:p-10">
                    <button onclick="goBack()" class="mb-6 text-slate-400 hover:text-white flex items-center space-x-2 transition-colors group">
                        <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span class="font-medium">Back</span>
                    </button>
                    
                    <div class="text-center mb-8">
                        <div id="roleIcon" class="text-6xl mb-3">🎤</div>
                        <h2 class="text-3xl font-bold mb-2 text-white" id="formTitle">Sign Up</h2>
                        <p class="text-slate-400 text-sm">Create your account to get started</p>
                    </div>
                    
                    <form class="space-y-4">
                        <input type="hidden" id="userRole" name="role" value="">
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Username</label>
                            <input class="input-field w-full px-4 py-3 border-2 border-slate-700 rounded-xl focus:border-slate-500 focus:outline-none transition-all text-white placeholder-slate-500" 
                                   id="username" name="username" type="text" placeholder="Choose a username" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Full Name</label>
                            <input class="input-field w-full px-4 py-3 border-2 border-slate-700 rounded-xl focus:border-slate-500 focus:outline-none transition-all text-white placeholder-slate-500" 
                                   id="name" name="name" type="text" placeholder="Enter your full name" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                            <input class="input-field w-full px-4 py-3 border-2 border-slate-700 rounded-xl focus:border-slate-500 focus:outline-none transition-all text-white placeholder-slate-500" 
                                   id="email" name="email" type="email" placeholder="your@email.com" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Password</label>
                            <input class="input-field w-full px-4 py-3 border-2 border-slate-700 rounded-xl focus:border-slate-500 focus:outline-none transition-all text-white placeholder-slate-500" 
                                   id="password" name="password" type="password" placeholder="Create a password" required>
                        </div>
                        
                        <button type="submit" id="register" class="btn-primary w-full rounded-xl py-3.5 text-white font-semibold text-lg mt-6 shadow-lg">
                            Get Started
                        </button>
                        
                        <div class="text-center mt-6">
                            <p class="text-sm text-slate-400">
                                Already have an account? 
                                <a href="#" class="text-slate-400 font-semibold hover:text-slate-300 transition-colors">Sign In</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function selectRole(role) {
            document.getElementById('userRole').value = role;
            document.getElementById('roleSelection').classList.add('hidden');
            document.getElementById('registrationForm').classList.remove('hidden');
            
            const formTitle = document.getElementById('formTitle');
            const roleIcon = document.getElementById('roleIcon');
            
            if (role === 'artist') {
                formTitle.textContent = 'Sign Up as Artist';
                roleIcon.textContent = '🎤';
            } else {
                formTitle.textContent = 'Sign Up as Organizer';
                roleIcon.textContent = '🎪';
            }
        }
        
        function goBack() {
            document.getElementById('registrationForm').classList.add('hidden');
            document.getElementById('roleSelection').classList.remove('hidden');
            document.getElementById('userRole').value = '';
        }
    </script>
   
<script>
    const URL = "{{ env('API_ROUTE_URL') }}";

    function debounce(func, delay) {
        let timeout;
        return function(...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), delay);
        };
    }

    $(document).ready(function() {
        const $username = $("#username");
        const $name = $("#name");
        const $email = $("#email");
        const $password = $("#password");
        const $userRole = $("#userRole");
        const $register = $("#register");
        const spinnerHTML = '<span class="spinner" id="usernameSpinner"></span>';

        $username.after('<p id="usernameStatus" class="text-sm mt-1"></p>');
        const $status = $("#usernameStatus");

        const checkUsername = debounce(function() {
            const username = $username.val().trim();

            $username.removeClass("error success");
            $status.removeClass("text-red-400 text-green-400 text-slate-400").text("");
            $register.addClass("disabled");

            if (username === "") {
                $register.removeClass("disabled");
                return;
            }

            $status.html("Checking availability... " + spinnerHTML).addClass("text-slate-400");
            $register.addClass("disabled");

            $.ajax({
                url: URL + '/auth/username-exists',
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}',
                    username: username
                },
                success: function(response) {
                    $("#usernameSpinner").remove();

                    if (response.data.exists) {
                        $username.removeClass("success").addClass("error");
                        $status.text("❌ Username already taken").removeClass("text-green-400").addClass("text-red-400");
                        $register.addClass("disabled");
                    } else {
                        $username.removeClass("error").addClass("success");
                        $status.text("✅ Username available!").removeClass("text-red-400").addClass("text-green-400");
                        $register.removeClass("disabled");
                    }
                },
                error: function() {
                    $status.text("⚠️ Error checking username").removeClass("text-green-400").addClass("text-red-400");
                    $register.addClass("disabled");
                }
            });
        }, 600);

        $username.on("input", checkUsername);

        // ✅ Fixed event binding
        $("#register").on("click", function(e) {
            e.preventDefault();

            if ($register.hasClass("disabled")) return;

            const username = $username.val().trim();
            const name = $name.val().trim();
            const email = $email.val().trim();
            const password = $password.val().trim();
            const role = $userRole.val();

            $.ajax({
                url: URL + '/auth/register',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    username: username,
                    name: name,
                    email: email,
                    password: password,
                    role: role
                },
                success: function(response) {
                    localStorage.removeItem('auth_token');
                    localStorage.setItem('auth_token', response.data.token);
                    window.location.href = '{{ route('home') }}';
                },
                error: function(response) {
                    // $status.text(response.responseJSON.message).removeClass("text-green-400").addClass("text-red-400");
                }
            });
        });
    });
</script>


</body>
</html>